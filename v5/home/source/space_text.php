<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: do_inputpwd.php 10298 2008-11-28 07:57:44Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}
if(!empty($_GET['xml'])) {
	$xaxis = '';
	$graph = array();
	$count = 1;
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('userstatus')." ORDER BY daytime");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$xaxis .= "<value xid='$count'>".substr($value['daytime'], 4, 4)."</value>";
		
			$graph['hot'] .= "<value xid='$count'>".$value['hot']."</value>";
		
		$count++;
	}
	$xml = '';
	$xml .= '<'."?xml version=\"1.0\" encoding=\"utf-8\"?>";
	$xml .= '<chart><xaxis>';
	$xml .= $xaxis;
	$xml .= "</xaxis><graphs>";
	$count = 0;
	foreach ($graph as $key => $value) {
		$xml .= "<graph gid='$count' title='".siconv(cplang("do_stat_$key"), 'utf8')."'>";
		$xml .= $value;
		$xml .= '</graph>';
		$count++;
	}
	$xml .= '</graphs></chart>';
	
	@header("Expires: -1");
	@header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", FALSE);
	@header("Pragma: no-cache");
	@header("Content-type: application/xml; charset=utf-8");
	echo $xml;
	exit();
}

$siteurl = getsiteurl();
$statuspara = "path=&settings_file=data/stat_setting.xml&data_file=".urlencode("space.php?do=text&xml=1&type=$type");

$actives = array($type => ' style="font-weight:bold;"');

include template('space_text');

?>