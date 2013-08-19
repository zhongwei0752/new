<?php
$uid = $_POST['uid'];
$rid = $_POST['rid'];
$mes = $_POST['message'];
$dialogid = $_POST['dialogid'];
$dateline = $_SGLOBAL['timestamp'];

$ip = getonlineip();


$dialogArr['uid'] = $uid;
$dialogArr['rid'] = $rid;
$dialogArr['message'] = $mes;
$dialogArr['dialogid'] = $dialogid;
$dialogArr['dateline'] = $dateline;
$dialogArr['ip'] = $ip;

inserttable("dialog",$dialogArr);

echo '<span style = "color:#23aaf1;font-size:14px">回复成功</span>';

?>