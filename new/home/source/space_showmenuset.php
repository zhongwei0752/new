<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_menuset.php 13208 2009-08-20 06:31:35Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf 
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid WHERE bf.uid=$_SGLOBAL[supe_uid] and b.money!='0'");
	while($value = $_SGLOBAL['db']->fetch_array($query)){
		if($value['appstatus']=='0'){
			$value['cost']=$value['month']*$value['money'];		
			$allcost1[]=$value['month']*$value['money'];
		}else{
			$value['cost']=$value['addmonth']*$value['money'];		
			$allcost1[]=$value['addmonth']*$value['money'];
		}
			$list[]=$value;

	}

	if($_POST['cancel']){
		$query = $_SGLOBAL['db']->query("delete  FROM ".tname('appset')." WHERE appstatus='0' and uid=$_SGLOBAL[supe_uid]");
		$value = $_SGLOBAL['db']->fetch_array($query);
		$query1 = $_SGLOBAL['db']->query("delete  FROM ".tname('appset')." WHERE appstatus='1' and addmonth!='0' and uid=$_SGLOBAL[supe_uid]");
		$value1 = $_SGLOBAL['db']->fetch_array($query1);
		showmessage("正在为你跳转到首页","space.php?do=home");
	}

	include_once template("space_showmenuset");

?>