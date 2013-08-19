<?php
	/*
	 * 在线沟通组件
	 * 这里处理两个页面：All dialog list    Dialog in detail and chat 
	 * ?do=communicate       ?do=communicate&dialog=
	 * 
	 * */
	 
	 //处理   URL 信息
	 $do = $_GET['do'];
	 $dialogid = empty($_GET['dialog'])?0:intval($_GET['dialog']);
	 
	 
	 //alias
	 $DB = $_SGLOBAL['db'];
	 //var_dump($dialogid);
	 $not_in_space = 0;
	 //处理主要页面逻辑
	 if ($dialogid) {
		//Dialog in detail and chat
		$query = $DB->query("SELECT * FROM ".tname("dialog")." d where d.dialogid=$dialogid order by dateline desc");
		
		while ($value = $DB->fetch_array($query)) {
			if($space['uid'] != $value['uid']&&$space['uid']!=$value['rid']) {$not_in_space = 1;break;}	
			$rid = $value['uid']==$space['uid']?$value['rid']:$value['uid'];
			$value['dateline']=  date("Y-m-d H:i",$value['dateline']);
			$dialoglist[]=$value;
		}
		if($not_in_space) showmessage('no_privilege');
		else {
		$query = $DB->query("SELECT * FROM ".tname("space")." d where d.uid=$rid");
		$res = $DB->fetch_array($query);
		$ruser = $res;
	
		$list = $dialoglist;	
		//var_dump($ruser);
		include_once template("space_dialog_view");
		}
	 }else {
	 	//All dialog list
	 	//var_dump($dialogid);
	 	$summarylen = 180;
	 	$cnt = $DB->result($DB->query("SELECT COUNT(DISTINCT dialogid) FROM ".tname("dialog")." d where d.uid='$space[uid]' or d.rid='$space[uid]'"));
	 	if($cnt) {
	 		$query = $DB->query("SELECT distinct dialogid FROM ".tname("dialog")." d where d.uid='$space[uid]' or d.rid='$space[uid]'");
			while ($value = $DB->fetch_array($query)) {
					$dialogidarr[]=$value['dialogid'];
			}
			for($i = 0;$i < $cnt;$i ++){
				$did = $dialogidarr[$i];
				$query = $DB->query("select * from ".tname("dialog")." AS d where d.dialogid = $did order by d.dateline desc limit 0,1");
				$value = $DB->fetch_array($query);
				
				if($value['uid'] == $space['uid']) $value['cid'] = $value['rid'];
				else $value['cid'] = $value['uid'];
				
				$query = $DB->query("select username from ".tname("space")." d where d.uid = '$value[cid]'");
				$name = $DB->fetch_array($query);
				//var_dump($name);
				$value['username'] = $name['username'];
				
				$list[] = $value;
			}
			//var_dump($list);
			
	 	}else{
	 		//showmessage('view_to_info_did_not_exist');
	 	}
	 	include_once template("space_dialog_list");
	 }
	 
?>