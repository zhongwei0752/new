<?php

/*$m_auth = getAuth();


if(empty($m_auth)){
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE wxkey='$_GET[wxkey]'");

	if ($value=$_SGLOBAL['db']->fetch_array($query)){
		updatetable('space', array('wxkey'=>''), array('uid'=>$value['uid']));
	}
	wxshowmessage('login_failure_please_re_login',  'wx.php?do=bind&wxkey='.$_GET['wxkey']);
}
*/


$type=$_GET['type'];
$typeid=$type."id";
$field=$type."field";
$typepic=$type."pic";
$uid=$_GET['uid'];
$id=$_GET['id'];
$viewuid=$_SGLOBAL['supe_uid'];
$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('menuset')." WHERE english='$type'");
$appsubject = $_SGLOBAL['db']->fetch_array($query1);
	if($_COOKIE["uchome_view_".$typeid]!= $typeid) {
include_once(S_ROOT.'./source/function_feed.php');
feed_publish($type, 'viewid',$viewuid,$uid,$id);
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('credit')."  WHERE uid=$_SGLOBAL[supe_uid] AND fatheruid='$uid'");
$value = $_SGLOBAL['db']->fetch_array($query);
if($value){
	$value['credit']=$value['credit']+"10";
	updatetable("credit",array('credit'=>$value['credit']),array('uid'=>$_SGLOBAL['supe_uid'],'fatheruid'=>$uid));	
}else{
	inserttable("credit",array('credit'=>"10",'uid'=>$_SGLOBAL['supe_uid'],'fatheruid'=>$uid));
}
ssetcookie("view_$typeid",$typeid);
}

if($_GET['type']=="job"){
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('job')." b LEFT JOIN ".tname('jobfield')." bf ON bf.jobid=b.jobid WHERE b.jobid='$id' AND b.uid='$uid'");
	$zhong = $_SGLOBAL['db']->fetch_array($query);
		include_once template("./wx/template/detailcontent");
}elseif($_GET['type']=="talk"){
		include_once template("./wx/template/detailcontent");
}elseif($_GET['type']=="goods"){
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname($type)." b LEFT JOIN ".tname($field)." bf ON bf.$typeid=b.$typeid WHERE b.$typeid='$id' AND b.uid='$uid'");
	$wei = $_SGLOBAL['db']->fetch_array($query);
	$message=$wei['message1'];
	$message = preg_replace("'width[^>]*?;'si", "", $message);
	$message = preg_replace("'height[^>]*?;'si", "", $message);
	$query1 = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('space')." b LEFT JOIN ".tname('spacefield')." bf ON bf.uid=b.uid WHERE  b.uid='$uid'");
	$space = $_SGLOBAL['db']->fetch_array($query1);
	if($_GET['moblieclicknum']=="2"){
		include_once template("./wx/template/$_GET[moblieclicknum]/goodscontent");
	}else{
	include_once template("./wx/template/goodscontent");
}

}else{
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname($type)." b LEFT JOIN ".tname($field)." bf ON bf.$typeid=b.$typeid WHERE b.$typeid='$id' AND b.uid='$uid'");
	$wei = $_SGLOBAL['db']->fetch_array($query);
	$message=$wei['message1'];
	$message = preg_replace("'width[^>]*?;'si", "", $message);
	$message = preg_replace("'height[^>]*?;'si", "", $message);
	if($wei['pic']){
	$typepic="<img src='../attachment/$wei[pic]'>";
}else{
	$typepic="";
}

if($_GET['moblieclicknum']=="2"){
		include_once template("./wx/template/$_GET[moblieclicknum]/feedcontent");
	}else{
	include_once template("./wx/template/feedcontent");
}
}

?>