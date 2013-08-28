<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_app.php 13003 2009-08-05 06:46:06Z liguode $
	用户购买应用数据输出
*/	
	
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf $f_index
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$_REQUEST[uid]' and bf.appstatus='1' and b.style='1'
				ORDER BY bf.orderid ASC ");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			
			$list[]=$value;

	}
	$query1 = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf $f_index
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$_REQUEST[uid]' and bf.appstatus='1' and b.english='goods'
				ORDER BY bf.orderid ASC ");
	while ($value1 = $_SGLOBAL['db']->fetch_array($query1)) {
			
			$list1[]=$value1;

	}
	$count =count($list);
	capi_showmessage_by_data("rest_success", 0, array('app'=>$list,'highapp'=>$list1, 'count'=>$count));
?>