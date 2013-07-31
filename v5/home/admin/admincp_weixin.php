<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: admincp_space.php 13174 2009-08-14 08:41:39Z zhengqingpeng $
*/

if(!defined('IN_UCHOME') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
if(submitcheck('submit')) {
	$setarr = array(
			
			'wxkey'=>getstr($_POST['wxkey'], 60, 1, 1),
			'username'=>getstr($_POST['username'], 60, 1, 1),
			'password'=>getstr($_POST['password'], 60, 1, 1),
			'cheakid'=>getstr($_POST['cheakid'], 60, 1, 1),
			


		);
	if($setarr) {
		inserttable('weixin', $setarr);
	}
		cpmessage("录入成功");
	
}


	include template('admin/tpl/weixin');


?>