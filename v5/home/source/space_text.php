<?php

require_once('./wx/Weixin.class.php');
	$d = new Weixin("1178411409@qq.com", "2316663");
	$info = $d->getUser();
   print_r ($info);
?>