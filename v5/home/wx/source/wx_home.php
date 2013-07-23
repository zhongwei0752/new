<?php
	$uid=$_GET['uid'];
	$god1=$_SGLOBAL['db']->query("SELECT s.* ,sf.* FROM ".tname('space')." s LEFT JOIN ".tname('spacefield')." sf ON s.uid=sf.uid WHERE s.uid='$uid'");
	$god=$_SGLOBAL['db']->fetch_array($god1);
	 if($god['name']){
                        $name=$god['name'];
                      }else{
                        $name=$god['username'];
                      }
	$zhong = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf 
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$uid' and bf.appstatus='1'
				ORDER BY bf.orderid ASC ");
while ($wei = $_SGLOBAL['db']->fetch_array($zhong)) {
	$zhongwei[]=$wei;

}
	include_once template("./wx/template/home");
?>