<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_wall.php 12880 2009-07-24 07:20:24Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
if($_POST['fristsubmit']){
	if(empty($_POST['button1'])&&empty($_POST['button2'])||empty($_POST['button2'])&&empty($_POST['button3'])||empty($_POST['button1'])&&empty($_POST['button3'])){
		showmessage("至少填写2项一级菜单");
	}
	//左侧菜单情况
	if($_POST['button1']){
	$dataarr1=array(
		'button'     => $_POST['button1'],
		'sub_button1'=> $_POST['1sub_button1'],
		'sub_button2'=> $_POST['1sub_button2'],
		'sub_button3'=> $_POST['1sub_button3'],
		'sub_button4'=> $_POST['1sub_button4'],
		'sub_button5'=> $_POST['1sub_button5'],
		'fathernum'  => '1',
		'uid'        => $_SGLOBAL['supe_uid']
	);	
	inserttable("weixinmenu",$dataarr1);
	}
	//中间菜单情况
	if($_POST['button2']){
	$dataarr2=array(
		'button'     => $_POST['button2'],
		'sub_button1'=> $_POST['2sub_button1'],
		'sub_button2'=> $_POST['2sub_button2'],
		'sub_button3'=> $_POST['2sub_button3'],
		'sub_button4'=> $_POST['2sub_button4'],
		'sub_button5'=> $_POST['2sub_button5'],
		'fathernum'  => '2',
		'uid'        => $_SGLOBAL['supe_uid']
	);	
	inserttable("weixinmenu",$dataarr2);
	}
	//右侧菜单情况
		if($_POST['button3']){
	$dataarr3=array(
		'button'     => $_POST['button3'],
		'sub_button1'=> $_POST['3sub_button1'],
		'sub_button2'=> $_POST['3sub_button2'],
		'sub_button3'=> $_POST['3sub_button3'],
		'sub_button4'=> $_POST['3sub_button4'],
		'sub_button5'=> $_POST['3sub_button5'],
		'fathernum'  => '3',
		'uid'        => $_SGLOBAL['supe_uid']
	);	
	inserttable("weixinmenu",$dataarr3);
	}
	
}

if($_POST['secondsubmit']){

	$dataarr1=array(
		'button'     => $_POST['button1'],
		'sub_button1'=> $_POST['1sub_button1'],
		'sub_button2'=> $_POST['1sub_button2'],
		'sub_button3'=> $_POST['1sub_button3'],
		'sub_button4'=> $_POST['1sub_button4'],
		'sub_button5'=> $_POST['1sub_button5']
	);	
	//中间菜单情况
	$dataarr2=array(
		'button'     => $_POST['button2'],
		'sub_button1'=> $_POST['2sub_button1'],
		'sub_button2'=> $_POST['2sub_button2'],
		'sub_button3'=> $_POST['2sub_button3'],
		'sub_button4'=> $_POST['2sub_button4'],
		'sub_button5'=> $_POST['2sub_button5']
	);	
	//右侧菜单情况
	$dataarr3=array(
		'button'     => $_POST['button3'],
		'sub_button1'=> $_POST['3sub_button1'],
		'sub_button2'=> $_POST['3sub_button2'],
		'sub_button3'=> $_POST['3sub_button3'],
		'sub_button4'=> $_POST['3sub_button4'],
		'sub_button5'=> $_POST['3sub_button5']
	);	
	updatetable("weixinmenu",$dataarr1,array('fathernum'=>'1','uid'=>$_SGLOBAL['supe_uid']));
	updatetable("weixinmenu",$dataarr2,array('fathernum'=>'2','uid'=>$_SGLOBAL['supe_uid']));
	updatetable("weixinmenu",$dataarr3,array('fathernum'=>'3','uid'=>$_SGLOBAL['supe_uid']));
	}

$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('weixinmenu')."  WHERE uid='$_SGLOBAL[supe_uid]' order by fathernum ASC");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
	$list[]=$value;
	}
include_once template("space_weixinmenu");

?>