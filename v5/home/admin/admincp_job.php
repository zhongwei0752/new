<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: admincp_job.php 12568 2009-07-08 07:38:01Z zhengqingpeng $
*/

if(!defined('IN_UCHOME') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}

//Ȩ��
if(!$allowmanage = checkperm('managejob')) {
	$_GET['uid'] = $_SGLOBAL['supe_uid'];//ֻ�ܲ������˵�
	$_GET['username'] = '';
}

if(submitcheck('batchsubmit')) {
	include_once(S_ROOT.'./source/function_delete.php');
	if(!empty($_POST['ids']) && deletejobs($_POST['ids'])) {
		cpmessage('do_success', $_POST['mpurl']);
	} else {
		cpmessage('the_correct_choice_to_delete_the_log');
	}
}

$mpurl = 'admincp.php?ac=job';

//��������
$intkeys = array('uid', 'friend', 'jobid');
$strkeys = array('username');
$randkeys = array(array('sstrtotime','dateline'), array('intval','viewnum'), array('intval','replynum'), array('intval','hot'));
$likekeys = array('subject');
$results = getwheres($intkeys, $strkeys, $randkeys, $likekeys, 'b.');
$wherearr = $results['wherearr'];
$mpurl .= '&'.implode('&', $results['urls']);

//��������2
$intkeys = array();
$strkeys = array('postip');
$randkeys = array();
$likekeys = array('message');
$results = getwheres($intkeys, $strkeys, $randkeys, $likekeys, 'bf.');
$wherearr2 = $results['wherearr'];
$mpurl .= '&'.implode('&', $results['urls']);

$wheresql = empty($wherearr)?'1':implode(' AND ', $wherearr);
$wheresql2 = empty($wherearr2)?'':implode(' AND ', $wherearr2);

//����
$orders = getorders(array('dateline', 'viewnum', 'replynum', 'hot'), 'jobid', 'b.');
$ordersql = $orders['sql'];
if($orders['urls']) $mpurl .= '&'.implode('&', $orders['urls']);
$orderby = array($_GET['orderby']=>' selected');
$ordersc = array($_GET['ordersc']=>' selected');

$perpage = empty($_GET['perpage'])?0:intval($_GET['perpage']);
if(!in_array($perpage, array(20,50,100,1000))) $perpage = 20;

$page = empty($_GET['page'])?1:intval($_GET['page']);
if($page<1) $page = 1;
$start = ($page-1)*$perpage;
//��鿪ʼ��
ckstart($start, $perpage);

//��ʾ��ҳ
if($perpage > 100) {
	$count = 1;
	$selectsql = 'b.jobid';
} else {
	if($wheresql2) {
		$csql = "SELECT COUNT(*) FROM ".tname('job')." b, ".tname('jobfield')." bf WHERE $wheresql AND bf.jobid=b.jobid AND $wheresql2";
	} else {
		$csql = "SELECT COUNT(*) FROM ".tname('job')." b WHERE $wheresql";
	}
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query($csql), 0);
	$selectsql = '*';
}
$mpurl .= '&perpage='.$perpage;
$perpages = array($perpage => ' selected');

$managebatch = checkperm('managebatch');
$allowbatch = true;
$list = array();
$multi = '';

if($wheresql2) {
	$qsql = "SELECT $selectsql FROM ".tname('job')." b, ".tname('jobfield')." bf WHERE $wheresql AND bf.jobid=b.jobid AND $wheresql2 ORDER BY b.jobid DESC LIMIT $start,$perpage";
} else {
	$qsql = "SELECT $selectsql FROM ".tname('job')." b WHERE $wheresql $ordersql LIMIT $start,$perpage";
}
if($count) {
	$query = $_SGLOBAL['db']->query($qsql);
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if(!$managebatch && $value['uid'] != $_SGLOBAL['supe_uid']) {
			$allowbatch = false;
		}
		$list[] = $value;
	}
	$multi = multi($count, $perpage, $page, $mpurl);
}

//��ʾ��ҳ
if($perpage > 100) {
	$count = count($list);
}

?>