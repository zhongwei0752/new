<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_industry.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//检查信息
$industryid = empty($_GET['industryid'])?0:intval($_GET['industryid']);
$op = empty($_GET['op'])?'':$_GET['op'];

$industry = array();
if($industryid) {
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('industry')." b 
		LEFT JOIN ".tname('industryfield')." bf ON bf.industryid=b.industryid 
		WHERE b.industryid='$industryid'");
	$industry = $_SGLOBAL['db']->fetch_array($query);
}

//权限检查
if(empty($industry)) {
	if(!checkperm('allowindustry')) {
		ckspacelog();
		showmessage('no_authority_to_add_log');
	}
	
	//实名认证
	ckrealname('industry');
	
	//视频认证
	ckvideophoto('industry');
	
	//新用户见习
	cknewuser();
	
	//判断是否发布太快
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	
	//接收外部标题
	$industry['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$industry['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $industry['uid'] && !checkperm('manageindustry')) {
		showmessage('no_authority_operation_of_the_log');
	}
}

//添加编辑操作
if(submitcheck('industrysubmit')) {

	if(empty($industry['industryid'])) {
		$industry = array();
	} else {
		if(!checkperm('allowindustry')) {
			ckspacelog();
			showmessage('no_authority_to_add_log');
		}
	}
	
	//验证码
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}

	include_once(S_ROOT.'./source/function_industry.php');
	if($newindustry = industry_post($_POST, $industry)) {
		if(empty($industry) && $newindustry['topicid']) {
			$url = 'space.php?do=topic&topicid='.$newindustry['topicid'].'&view=industry';
		} else {
			$url = 'space.php?uid='.$newindustry['uid'].'&do=industry&id='.$newindustry['industryid'];
		}
		showmessage('do_success', $url, 0);
	} else {
		showmessage('that_should_at_least_write_things');
	}
}

if($_GET['op'] == 'delete') {
	//删除
	if(submitcheck('deletesubmit')) {
		include_once(S_ROOT.'./source/function_delete.php');
		if(deleteindustrys(array($industryid))) {
			showmessage('do_success', "space.php?uid=$industry[uid]&do=industry&view=me");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
	
} elseif($_GET['op'] == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('industry', array('industryid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=industry&id=$id", 0);
	
} elseif($_GET['op'] == 'edithot') {
	//权限
	if(!checkperm('manageindustry')) {
		showmessage('no_privilege');
	}
	
	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		updatetable('industry', array('hot'=>$_POST['hot']), array('industryid'=>$industry['industryid']));
		if($_POST['hot']>0) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($industry['industryid'], 'industryid');
		} else {
			updatetable('feed', array('hot'=>$_POST['hot']), array('id'=>$industry['industryid'], 'idtype'=>'industryid'));
		}
		
		showmessage('do_success', "space.php?uid=$industry[uid]&do=industry&id=$industry[industryid]", 0);
	}
	
} else {

	//添加编辑
	//获取个人分类
	$classarr = $industry['uid']?getclassindustryarr($industry['uid']):getclassindustryarr($_SGLOBAL['supe_uid']);
	//获取相册

	$albums = getalbums($_SGLOBAL['supe_uid']);
	
	$tags = empty($industry['tag'])?array():unserialize($industry['tag']);
	$industry['tag'] = implode(' ', $tags);
	
	$industry['target_names'] = '';
	
	$friendarr = array($industry['friend'] => ' selected');
	
	$passwordstyle = $selectgroupstyle = 'display:none';
	if($industry['friend'] == 4) {
		$passwordstyle = '';
	} elseif($industry['friend'] == 2) {
		$selectgroupstyle = '';
		if($industry['target_ids']) {
			$names = array();
			$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('space')." WHERE uid IN ($industry[target_ids])");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$names[] = $value['username'];
			}
			$industry['target_names'] = implode(' ', $names);
		}
	}
	
	
	$industry['message'] = str_replace('&amp;', '&amp;amp;', $industry['message']);
	$industry['message'] = shtmlspecialchars($industry['message']);
	
	$allowhtml = checkperm('allowhtml');
	
	//好友组
	$groups = getfriendgroup();
	
	//参与热点
	$topic = array();
	$topicid = $_GET['topicid'] = intval($_GET['topicid']);
	if($topicid) {
		$topic = topic_get($topicid);
	}
	if($topic) {
		$actives = array('industry' => ' class="active"');
	}
	
	//菜单激活
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_industry");

?>