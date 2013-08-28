<?php
	$uid=$_GET['uid'];
	$home=$_SGLOBAL['db']->query("SELECT * FROM ".tname('recommend')."  WHERE uid='$uid'");
	$home1=$_SGLOBAL['db']->fetch_array($home);
	$god1=$_SGLOBAL['db']->query("SELECT s.* ,sf.* FROM ".tname('space')." s LEFT JOIN ".tname('spacefield')." sf ON s.uid=sf.uid WHERE s.uid='$uid'");
	$god=$_SGLOBAL['db']->fetch_array($god1);
	 if($god['name']){
                        $name=$god['name'];
                      }else{
                        $name=$god['username'];
                      }
	$zhong = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf 
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$uid' and bf.appstatus='1' and b.style='1'
				ORDER BY bf.orderid ASC ");
while ($wei = $_SGLOBAL['db']->fetch_array($zhong)) {
	$wei['icon']=$wei['english'].".png";
	$zhongwei[]=$wei;

}
	$zhong1 = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf 
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$uid' and bf.appstatus='1' and b.style='2' and b.english='goods'
				ORDER BY bf.orderid ASC ");
	while ($wei1 = $_SGLOBAL['db']->fetch_array($zhong1)) {
	$wei1['icon']="goods.png";
	$zhongwei1[]=$wei1;
	}
$abc = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$uid'");
	$bac = $_SGLOBAL['db']->fetch_array($abc);
	if($bac['moblieclicknum']=="2"){
		include_once template("./wx/template/$bac[moblieclicknum]/home");
		
	}else{
	include_once template("./wx/template/home");	
}

	
?>