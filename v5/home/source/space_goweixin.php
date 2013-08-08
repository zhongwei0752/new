<?php
require_once('./wx/Weixin.class.php');
if($_POST["alreadyweixin"]=="1"){
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$d = new Weixin("$username", "$password");
	$info = $d->getUser();	

	updatetable("space", array('fakeid'=>$info,'weixinusername'=>$username,'weixinpassword'=>$password),array('uid'=>$_SGLOBAL['supe_uid']));
	
}
if($_POST["newweixin"]=="1"){

		$username=$_POST['username'];
		$password=$_POST['password'];
		$fakeid=$_POST['fakeid'];
		$wxkey=$_POST['wxkey'];
		$id=$_POST['id'];
		updatetable("space", array('weixinusername'=>$username,'weixinpassword'=>$password,'fakeid'=>$fakeid,'wxkey'=>$wxkey),array('uid'=>$_SGLOBAL['supe_uid']));
		updatetable("weixin", array('cheakid'=>'0'),array('id'=>$id));
}
		showmessage("提交成功","space.php?do=menuset");

?>