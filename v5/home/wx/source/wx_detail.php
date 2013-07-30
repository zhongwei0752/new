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
chdir ('../');

$type=$_GET['type'];
$typeid=$type."id";
$field=$type."field";
$typepic=$type."pic";
$uid=$_GET['uid'];
$id=$_GET['id'];



if($_GET['type']=="job"){
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('job')." b LEFT JOIN ".tname('jobfield')." bf ON bf.jobid=b.jobid WHERE b.jobid='$id' AND b.uid='$uid'");
	$zhong = $_SGLOBAL['db']->fetch_array($query);
		include_once template("./wx/template/detailcontent");
}elseif($_GET['type']=="talk"){
		include_once template("./wx/template/detailcontent");
}else{
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname($type)." b LEFT JOIN ".tname($field)." bf ON bf.$typeid=b.$typeid WHERE b.$typeid='$id' AND b.uid='$uid'");
	$wei = $_SGLOBAL['db']->fetch_array($query);
	$message=$wei['message1'];
	if($wei['pic']){
	$typepic="<img src='../attachment/$wei[pic]'>";
}else{
	$typepic="";
}
if($_GET['moblieclicknum']){
		include_once template("./wx/template/$_GET[moblieclicknum]/feedcontent");
	}else{
	include_once template("./wx/template/feedcontent");
}
}

?>