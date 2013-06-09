<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_development.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//检查信息
$developmentid = empty($_GET['developmentid'])?0:intval($_GET['developmentid']);
$op = empty($_GET['op'])?'':$_GET['op'];

$development = array();
if($developmentid) {
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('development')." b 
		LEFT JOIN ".tname('developmentfield')." bf ON bf.developmentid=b.developmentid 
		WHERE b.developmentid='$developmentid'");
	$development = $_SGLOBAL['db']->fetch_array($query);
}

//权限检查
if(empty($development)) {
	if(!checkperm('allowdevelopment')) {
		ckspacelog();
		showmessage('no_authority_to_add_log');
	}
	
	//实名认证
	ckrealname('development');
	
	//视频认证
	ckvideophoto('development');
	
	//新用户见习
	cknewuser();
	
	//判断是否发布太快
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	
	//接收外部标题
	$development['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$development['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $development['uid'] && !checkperm('managedevelopment')) {
		showmessage('no_authority_operation_of_the_log');
	}
}

//添加编辑操作
if(submitcheck('developmentsubmit')) {

	if(empty($development['developmentid'])) {
		$development = array();
	} else {
		if(!checkperm('allowdevelopment')) {
			ckspacelog();
			showmessage('no_authority_to_add_log');
		}
	}
	
	//验证码
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}
	
	include_once(S_ROOT.'./source/function_development.php');
	if($newdevelopment = development_post($_POST, $development)) {
		if(empty($development) && $newdevelopment['topicid']) {
			$url = 'space.php?do=topic&topicid='.$newdevelopment['topicid'].'&view=development';
		} else {
			$url = 'space.php?uid='.$newdevelopment['uid'].'&do=development&id='.$newdevelopment['developmentid'];
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
		if(deletedevelopments(array($developmentid))) {
			showmessage('do_success', "space.php?uid=$development[uid]&do=development&view=me");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
	
} elseif($_GET['op'] == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('development', array('developmentid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=development&id=$id", 0);
	
} elseif($_GET['op'] == 'edithot') {
	//权限
	if(!checkperm('managedevelopment')) {
		showmessage('no_privilege');
	}
	
	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		updatetable('development', array('hot'=>$_POST['hot']), array('developmentid'=>$development['developmentid']));
		if($_POST['hot']>0) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($development['developmentid'], 'developmentid');
		} else {
			updatetable('feed', array('hot'=>$_POST['hot']), array('id'=>$development['developmentid'], 'idtype'=>'developmentid'));
		}
		
		showmessage('do_success', "space.php?uid=$development[uid]&do=development&id=$development[developmentid]", 0);
	}
	
} else {

	//添加编辑
	//获取个人分类
	$classarr = $development['uid']?getclassdevelopmentarr($development['uid']):getclassdevelopmentarr($_SGLOBAL['supe_uid']);
	//获取相册

	$albums = getalbums($_SGLOBAL['supe_uid']);
	
	$tags = empty($development['tag'])?array():unserialize($development['tag']);
	$development['tag'] = implode(' ', $tags);
	
	$development['target_names'] = '';
	
	$friendarr = array($development['friend'] => ' selected');
	
	$passwordstyle = $selectgroupstyle = 'display:none';
	if($development['friend'] == 4) {
		$passwordstyle = '';
	} elseif($development['friend'] == 2) {
		$selectgroupstyle = '';
		if($development['target_ids']) {
			$names = array();
			$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('space')." WHERE uid IN ($development[target_ids])");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$names[] = $value['username'];
			}
			$development['target_names'] = implode(' ', $names);
		}
	}
	
	
	$development['message'] = str_replace('&amp;', '&amp;amp;', $development['message']);
	$development['message'] = shtmlspecialchars($development['message']);
	
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
		$actives = array('development' => ' class="active"');
	}
	
	//菜单激活
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_development");

?>