<?php


	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('comment')." WHERE id='$_REQUEST[id]' AND idtype='$_REQUEST[idtype]'"), 0);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE id='$_REQUEST[id]' AND idtype='$_REQUEST[idtype]' ORDER BY dateline DESC LIMIT $_REQUEST[page],$_REQUEST[perpage]");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			$value['author'] = capi_realname($value['authorid']);
			$value["authoravatar"] = capi_avatar($value["authorid"]);
		    $value["message"] = capi_fhtml($value["message"]);
			$list[]=$value;

	}
	capi_showmessage_by_data("rest_success", 0, array('comment'=>$list, 'commentcount'=>$count));
?>