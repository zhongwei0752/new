<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp.php 13003 2009-08-05 06:46:06Z liguode $
*/

//Í¨ÓÃÎÄ¼þ
include_once('./common.php');
include_once(S_ROOT.'./source/function_cp.php');
include_once(S_ROOT.'./source/function_magic.php');

//ÔÊÐíµÄ·½·¨
$acs = array('space', 'doing', 'upload', 'comment', 'blog', 'album', 'relatekw', 'common', 'class',
	'swfupload', 'thread', 'mtag', 'poke', 'friend',
	'avatar', 'profile', 'theme', 'import', 'feed', 'privacy', 'pm', 'share', 'advance', 'invite','sendmail',
	'userapp', 'task', 'credit', 'password', 'domain', 'event', 'poll', 'topic',
	'click','magic', 'top', 'videophoto','introduce','product','development','industry','text','cases','branch','job','talk','menuset','message','recommend','moblie');
$ac = (empty($_GET['ac']) || !in_array($_GET['ac'], $acs))?'profile':$_GET['ac'];
$op = empty($_GET['op'])?'':$_GET['op'];

//È¨ÏÞÅÐ¶Ï
if(empty($_SGLOBAL['supe_uid'])) {
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		ssetcookie('_refer', rawurlencode($_SERVER['REQUEST_URI']));
	} else {
		ssetcookie('_refer', rawurlencode('cp.php?ac='.$ac));
	}
	showmessage('to_login', 'do.php?ac='.$_SCONFIG['login_action']);
}

//»ñÈ¡¿Õ¼äÐÅÏ¢
$space = getspace($_SGLOBAL['supe_uid']);
if(empty($space)) {
	showmessage('space_does_not_exist');
}

//ÊÇ·ñ¹Ø±ÕÕ¾µã
if(!in_array($ac, array('common', 'pm'))) {
	checkclose();
	//¿Õ¼ä±»Ëø¶¨
	if($space['flag'] == -1) {
		showmessage('space_has_been_locked');
	}
	//½ûÖ¹·ÃÎÊ
	if(checkperm('banvisit')) {
		ckspacelog();
		showmessage('you_do_not_have_permission_to_visit');
	}
	//ÑéÖ¤ÊÇ·ñÓÐÈ¨ÏÞÍæÓ¦ÓÃ
	if($ac =='userapp' && !checkperm('allowmyop')) {
		showmessage('no_privilege');
	}
}
$zhong = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf $f_index
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$space[uid]' and bf.appstatus='1'
				ORDER BY b.dateline ASC ");
while ($wei = $_SGLOBAL['db']->fetch_array($zhong)) {
	$zhongwei[]=$wei;

}
//隐藏侧边栏
	$query4 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('appset')." WHERE uid='$space[uid]' and appstatus='1'");
	$value4 = $_SGLOBAL['db']->fetch_array($query4);
	$zhong1=$value4;
//²Ëµ¥
$actives = array($ac => ' class="active"');

include_once(S_ROOT.'./source/cp_'.$ac.'.php');

?>