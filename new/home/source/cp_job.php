<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_job.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//检查信息
$jobid = empty($_GET['jobid'])?0:intval($_GET['jobid']);
$op = empty($_GET['op'])?'':$_GET['op'];

$job = array();
if($jobid) {
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('job')." b 
		LEFT JOIN ".tname('jobfield')." bf ON bf.jobid=b.jobid 
		WHERE b.jobid='$jobid'");
	$job = $_SGLOBAL['db']->fetch_array($query);
}

//权限检查
if(empty($job)) {
	if(!checkperm('allowjob')) {
		ckspacelog();
		showmessage('no_authority_to_add_log');
	}
	
	//实名认证
	ckrealname('job');
	
	//视频认证
	ckvideophoto('job');
	
	//新用户见习
	cknewuser();
	
	//判断是否发布太快
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	
	//接收外部标题
	$job['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$job['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $job['uid'] && !checkperm('managejob')) {
		showmessage('no_authority_operation_of_the_log');
	}
}

//添加编辑操作
if(submitcheck('jobsubmit')) {

	if(empty($job['jobid'])) {
		$job = array();
	} else {
		if(!checkperm('allowjob')) {
			ckspacelog();
			showmessage('no_authority_to_add_log');
		}
	}
	
	//验证码
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}
	
	include_once(S_ROOT.'./source/function_job.php');
	if($newjob = job_post($_POST, $job)) {
		if(empty($job) && $newjob['topicid']) {
			$url = 'space.php?do=topic&topicid='.$newjob['topicid'].'&view=job';
		} else {
			$url = 'space.php?uid='.$newjob['uid'].'&do=job&id='.$newjob['jobid'];
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
		if(deletejobs(array($jobid))) {
			showmessage('do_success', "space.php?uid=$job[uid]&do=job&view=me");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
	
} elseif($_GET['op'] == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('job', array('jobid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=job&id=$id", 0);
	
} elseif($_GET['op'] == 'edithot') {
	//权限
	if(!checkperm('managejob')) {
		showmessage('no_privilege');
	}
	
	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		updatetable('job', array('hot'=>$_POST['hot']), array('jobid'=>$job['jobid']));
		if($_POST['hot']>0) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($job['jobid'], 'jobid');
		} else {
			updatetable('feed', array('hot'=>$_POST['hot']), array('id'=>$job['jobid'], 'idtype'=>'jobid'));
		}
		
		showmessage('do_success', "space.php?uid=$job[uid]&do=job&id=$job[jobid]", 0);
	}
	
} else {

	//添加编辑
	//获取个人分类
	$classarr = $job['uid']?getclassjobarr($job['uid']):getclassjobarr($_SGLOBAL['supe_uid']);
	//获取相册

	$albums = getalbums($_SGLOBAL['supe_uid']);
	
	$tags = empty($job['tag'])?array():unserialize($job['tag']);
	$job['tag'] = implode(' ', $tags);
	
	$job['target_names'] = '';
	
	$friendarr = array($job['friend'] => ' selected');
	
	$passwordstyle = $selectgroupstyle = 'display:none';
	if($job['friend'] == 4) {
		$passwordstyle = '';
	} elseif($job['friend'] == 2) {
		$selectgroupstyle = '';
		if($job['target_ids']) {
			$names = array();
			$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('space')." WHERE uid IN ($job[target_ids])");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$names[] = $value['username'];
			}
			$job['target_names'] = implode(' ', $names);
		}
	}
	
	
	$job['message'] = str_replace('&amp;', '&amp;amp;', $job['message']);
	$job['message'] = shtmlspecialchars($job['message']);
	
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
		$actives = array('job' => ' class="active"');
	}
	
	//菜单激活
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_job");

?>