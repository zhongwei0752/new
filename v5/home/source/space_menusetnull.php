<?php
$page = empty($_GET['page'])?1:intval($_GET['page']);
if($page<1) $page=1;
$perpage = 10;
$perpage = mob_perpage($perpage);
$ordersql="b.dateline";
	
	$start = ($page-1)*$perpage;
$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('menuset')." b WHERE b.uid='$space[uid]'"),0);
		//¸üÐÂÍ³¼Æ
		if($wheresql == "b.uid='$space[uid]'" && $space['menusetnum'] != $count) {
			updatetable('space', array('menusetnum' => $count), array('uid'=>$space['uid']));
		}
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT bf.message, bf.target_ids, bf.magiccolor, b.* FROM ".tname('menuset')." b $f_index
				LEFT JOIN ".tname('menusetfield')." bf ON bf.menusetid=b.menusetid 
				ORDER BY $ordersql ASC LIMIT $start,$perpage");
		}
		if($count) {
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if(ckfriend($value['uid'], $value['friend'], $value['target_ids'])) {
				realname_set($value['uid'], $value['username']);
				if($value['friend'] == 4) {
					$value['message'] = $value['pic'] = '';
				} else {
					$value['message'] = getstr($value['message'], $summarylen, 0, 0, 0, 0, -1);
				}
				if($value['pic']) $value['pic'] = pic_cover_get($value['pic'], $value['picflag']);
				//识别标签，只出现符合标签的应用
				$query2 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spacefield')." 
				WHERE uid='$space[uid]' ORDER BY uid  ASC LIMIT $start,$perpage");
				$value2=$_SGLOBAL['db']->fetch_array($query2);
				$a=$value2['business'];
				$wei=explode("，",$value['apptag']);
			if(in_array("$a", $wei)){
				$query1 = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf $f_index
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$space[uid]' and bf.num=$value[menusetid] and bf.appstatus='1'
				ORDER BY b.dateline ASC LIMIT $start,$perpage");
				$value1=$_SGLOBAL['db']->fetch_array($query1);
				$query2 = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf $f_index
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$space[uid]' and bf.num=$value[menusetid]
				ORDER BY b.dateline ASC LIMIT $start,$perpage");
				$value2=$_SGLOBAL['db']->fetch_array($query2);
				$value['zhong'] = $value2;
				$list[] = $value;
			}
			} else {
				$pricount++;
			}
		}
	}


	$null=$_POST][]

	include_once template("space_menuset_listnull");
	?>
