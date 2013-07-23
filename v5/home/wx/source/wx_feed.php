<?php
	
 $m_auth = getAuth();

 	$uid=$_GET['uid'];
	$table=$_GET['idtype'];
$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('menuset')."
				WHERE english='$table'");
$value1 = $_SGLOBAL['db']->fetch_array($query1);
$appname=$value1['subject'];
	
$zhong = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf 
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$uid' and bf.appstatus='1'
				ORDER BY bf.orderid ASC ");
while ($wei = $_SGLOBAL['db']->fetch_array($zhong)) {
	$zhongwei[]=$wei;

}
	include_once template("./wx/template/feed");
?>