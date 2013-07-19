<?php
	
 $m_auth = getAuth();


	$table=$_GET['idtype'];
$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('menuset')."
				WHERE english='$table'");
$value1 = $_SGLOBAL['db']->fetch_array($query1);
$appname=$value1['subject'];
	

	include_once template("./wx/template/feed");
?>