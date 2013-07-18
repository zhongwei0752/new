<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_introduce.php 13208 2009-08-20 06:31:35Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$minhot = $_SCONFIG['feedhotmin']<1?3:$_SCONFIG['feedhotmin'];

$page = empty($_REQUEST['page'])?1:intval($_REQUEST['page']);
if($page<1) $page=1;
$id = empty($_REQUEST['id'])?0:intval($_REQUEST['id']);
$uid=empty($_REQUEST['uid'])?0:intval($_REQUEST['uid']);
$classid = empty($_REQUEST['classid'])?0:intval($_REQUEST['classid']);

//表态分类
@include_once(S_ROOT.'./data/data_click.php');
$clicks = empty($_SGLOBAL['click']['introduceid'])?array():$_SGLOBAL['click']['introduceid'];

if($id) {

	//读取日志
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('introduce')." b LEFT JOIN ".tname('introducefield')." bf ON bf.introduceid=b.introduceid WHERE b.introduceid='$id' AND b.uid='$uid'");
	$introduce = $_SGLOBAL['db']->fetch_array($query);
	$introduce['message']=htmlentities($introduce['message'], ENT_QUOTES);
	capi_showmessage_by_data("rest_success", 0, array('introduce'=>$introduce));
	//日志不存在
	if(empty($introduce)) {
		capi_showmessage_by_data('view_to_info_did_not_exist');
	}

	//检查好友权限
	if(!ckfriend($introduce['uid'], $introduce['friend'], $introduce['target_ids'])) {
		//没有权限
		include template('space_privacy');
		exit();
	} elseif(!$space['self'] && $introduce['friend'] == 4) {
		//密码输入问题
		$cookiename = "view_pwd_introduce_$introduce[introduceid]";
		$cookievalue = empty($_SCOOKIE[$cookiename])?'':$_SCOOKIE[$cookiename];
		if($cookievalue != md5(md5($introduce['password']))) {
			$invalue = $introduce;
			include template('do_inputpwd');
			exit();
		}
	}

	//整理
	$introduce['tag'] = empty($introduce['tag'])?array():unserialize($introduce['tag']);

	//处理视频标签
	include_once(S_ROOT.'./source/function_introduce.php');

	$introduce['message'] = introduce_bbcode($introduce['message']);

	$otherlist = $newlist = array();

	//有效期
	if($_SCONFIG['uc_tagrelatedtime'] && ($_SGLOBAL['timestamp'] - $introduce['relatedtime'] > $_SCONFIG['uc_tagrelatedtime'])) {
		$introduce['related'] = array();
	}
	if($introduce['tag'] && empty($introduce['related'])) {
		@include_once(S_ROOT.'./data/data_tagtpl.php');

		$b_tagids = $b_tags = $introduce['related'] = array();
		$tag_count = -1;
		foreach ($introduce['tag'] as $key => $value) {
			$b_tags[] = $value;
			$b_tagids[] = $key;
			$tag_count++;
		}
		if(!empty($_SCONFIG['uc_tagrelated']) && $_SCONFIG['uc_status']) {
			if(!empty($_SGLOBAL['tagtpl']['limit'])) {
				include_once(S_ROOT.'./uc_client/client.php');
				$tag_index = mt_rand(0, $tag_count);
				$introduce['related'] = uc_tag_get($b_tags[$tag_index], $_SGLOBAL['tagtpl']['limit']);
			}
		} else {
			//自身TAG
			$tag_introduceids = array();
			$query = $_SGLOBAL['db']->query("SELECT DISTINCT introduceid FROM ".tname('tagintroduce')." WHERE tagid IN (".simplode($b_tagids).") AND introduceid<>'$introduce[introduceid]' ORDER BY introduceid DESC LIMIT 0,10");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$tag_introduceids[] = $value['introduceid'];
			}
			if($tag_introduceids) {
				$query = $_SGLOBAL['db']->query("SELECT uid,username,subject,introduceid FROM ".tname('introduce')." WHERE introduceid IN (".simplode($tag_introduceids).")");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					realname_set($value['uid'], $value['username']);//实名
					$value['url'] = "space.php?uid=$value[uid]&do=introduce&id=$value[introduceid]";
					$introduce['related'][UC_APPID]['data'][] = $value;
				}
				$introduce['related'][UC_APPID]['type'] = 'UCHOME';
			}
		}
		if(!empty($introduce['related']) && is_array($introduce['related'])) {
			foreach ($introduce['related'] as $appid => $values) {
				if(!empty($values['data']) && $_SGLOBAL['tagtpl']['data'][$appid]['template']) {
					foreach ($values['data'] as $itemkey => $itemvalue) {
						if(!empty($itemvalue) && is_array($itemvalue)) {
							$searchs = $replaces = array();
							foreach (array_keys($itemvalue) as $key) {
								$searchs[] = '{'.$key.'}';
								$replaces[] = $itemvalue[$key];
							}
							$introduce['related'][$appid]['data'][$itemkey]['html'] = stripslashes(str_replace($searchs, $replaces, $_SGLOBAL['tagtpl']['data'][$appid]['template']));
						} else {
							unset($introduce['related'][$appid]['data'][$itemkey]);
						}
					}
				} else {
					$introduce['related'][$appid]['data'] = '';
				}
				if(empty($introduce['related'][$appid]['data'])) {
					unset($introduce['related'][$appid]);
				}
			}
		}
		updatetable('introducefield', array('related'=>addslashes(serialize(sstripslashes($introduce['related']))), 'relatedtime'=>$_SGLOBAL['timestamp']), array('introduceid'=>$introduce['introduceid']));//更新
	} else {
		$introduce['related'] = empty($introduce['related'])?array():unserialize($introduce['related']);
	}

	//作者的其他最新日志
	$otherlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('introduce')." WHERE uid='$space[uid]' ORDER BY dateline DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['introduceid'] != $introduce['introduceid'] && empty($value['friend'])) {
			$otherlist[] = $value;
		}
	}

	//最新的日志
	$newlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('introduce')." WHERE hot>=3 ORDER BY dateline DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['introduceid'] != $introduce['introduceid'] && empty($value['friend'])) {
			realname_set($value['uid'], $value['username']);
			$newlist[] = $value;
		}
	}

	//评论
	$perpage = 30;
	$perpage = mob_perpage($perpage);
	
	$start = ($page-1)*$perpage;

	//检查开始数
	ckstart($start, $perpage);

	$count = $introduce['replynum'];

	$list = array();
	if($count) {
		$cid = empty($_REQUEST['cid'])?0:intval($_REQUEST['cid']);
		$csql = $cid?"cid='$cid' AND":'';

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE $csql id='$id' AND idtype='introduceid' ORDER BY dateline LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['authorid'], $value['author']);//实名
			$list[] = $value;
		}
	}

	//分页
	$multi = multi($count, $perpage, $page, "space.php?uid=$introduce[uid]&do=$do&id=$id", '', 'content');

	//访问统计
	if(!$space['self'] && $_SCOOKIE['view_introduceid'] != $introduce['introduceid']) {
		$_SGLOBAL['db']->query("UPDATE ".tname('introduce')." SET viewnum=viewnum+1 WHERE introduceid='$introduce[introduceid]'");
		inserttable('log', array('id'=>$space['uid'], 'idtype'=>'uid'));//延迟更新
		ssetcookie('view_introduceid', $introduce['introduceid']);
	}

	//表态
	$hash = md5($introduce['uid']."\t".$introduce['dateline']);
	$id = $introduce['introduceid'];
	$idtype = 'introduceid';

	foreach ($clicks as $key => $value) {
		$value['clicknum'] = $introduce["click_$key"];
		$value['classid'] = mt_rand(1, 4);
		if($value['clicknum'] > $maxclicknum) $maxclicknum = $value['clicknum'];
		$clicks[$key] = $value;
	}

	//点评
	$clickuserlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('clickuser')."
		WHERE id='$id' AND idtype='$idtype'
		ORDER BY dateline DESC
		LIMIT 0,18");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username']);//实名
		$value['clickname'] = $clicks[$value['clickid']]['name'];
		$clickuserlist[] = $value;
	}

	//热点
	$topic = topic_get($introduce['topicid']);

	//实名
	realname_get();

	$_TPL['css'] = 'introduce';
	//include_once template("space_introduce_view");

} else {
	//分页
	$perpage = 10;
	$perpage = mob_perpage($perpage);
	
	$start = ($page-1)*$perpage;

	//检查开始数
	ckstart($start, $perpage);

	//摘要截取
	$summarylen = 300;

	$classarr = array();
	$list = array();
	$userlist = array();
	$count = $pricount = 0;

	$ordersql = 'b.dateline';

	if(empty($_REQUEST['view']) && ($space['friendnum']<$_SCONFIG['showallfriendnum'])) {
$_REQUEST['view'] = 'me';//默认显示
	}

	//处理查询
	$f_index = '';
	if($_REQUEST['view'] == 'click') {
		//踩过的日志
		$theurl = "space.php?uid=$space[uid]&do=$do&view=click";
		$actives = array('click'=>' class="active"');

		$clickid = intval($_REQUEST['clickid']);
		if($clickid) {
			$theurl .= "&clickid=$clickid";
			$wheresql = " AND c.clickid='$clickid'";
			$click_actives = array($clickid => ' class="current"');
		} else {
			$wheresql = '';
			$click_actives = array('all' => ' class="current"');
		}

		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('clickuser')." c WHERE c.uid='$space[uid]' AND c.idtype='introduceid' $wheresql"),0);
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT b.*, bf.message, bf.target_ids, bf.magiccolor FROM ".tname('clickuser')." c
				LEFT JOIN ".tname('introduce')." b ON b.introduceid=c.id
				LEFT JOIN ".tname('introducefield')." bf ON bf.introduceid=c.id
				WHERE c.uid='$space[uid]' AND c.idtype='introduceid' $wheresql
				ORDER BY c.dateline DESC LIMIT $start,$perpage");
		}
	} else {
		
		if($_REQUEST['view'] == 'all') {
			//大家的日志
			$wheresql = '1';

			$actives = array('all'=>' class="active"');

			//排序
			$orderarr = array('dateline','replynum','viewnum','hot');
			foreach ($clicks as $value) {
				$orderarr[] = "click_$value[clickid]";
			}
			if(!in_array($_REQUEST['orderby'], $orderarr)) $_REQUEST['orderby'] = '';

			//时间
			$_REQUEST['day'] = intval($_REQUEST['day']);
			$_REQUEST['hotday'] = 7;

			if($_REQUEST['orderby']) {
				$ordersql = 'b.'.$_REQUEST['orderby'];

				$theurl = "space.php?uid=$space[uid]&do=introduce&view=all&orderby=$_REQUEST[orderby]";
				$all_actives = array($_REQUEST['orderby']=>' class="current"');

				if($_REQUEST['day']) {
					$_REQUEST['hotday'] = $_REQUEST['day'];
					$daytime = $_SGLOBAL['timestamp'] - $_REQUEST['day']*3600*24;
					$wheresql .= " AND b.dateline>='$daytime'";

					$theurl .= "&day=$_REQUEST[day]";
					$day_actives = array($_REQUEST['day']=>' class="active"');
				} else {
					$day_actives = array(0=>' class="active"');
				}
			} else {

				$theurl = "space.php?uid=$space[uid]&do=$do&view=all";

				$wheresql .= " AND b.hot>='$minhot'";
				$all_actives = array('all'=>' class="current"');
				$day_actives = array();
			}


		} else {
			
			if(empty($space['feedfriend']) || $classid) $_REQUEST['view'] = 'me';
			
			if($_REQUEST['view'] == 'me') {
				//查看个人的
				$wheresql = "b.uid='$space[uid]'";
				$theurl = "space.php?uid=$space[uid]&do=$do&view=me";
				$actives = array('me'=>' class="active"');
				//日志分类
				$query = $_SGLOBAL['db']->query("SELECT classid, classname FROM ".tname('classintroduce')." WHERE uid='$space[uid]' or uid='0'");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$classarr[$value['classid']] = $value['classname'];
				}
			} else {
				$wheresql = "b.uid IN ($space[feedfriend])";
				$theurl = "space.php?uid=$space[uid]&do=$do&view=we";
				$f_index = 'USE INDEX(dateline)';
	
				$fuid_actives = array();
	
				//查看指定好友的
				$fusername = trim($_REQUEST['fusername']);
				$fuid = intval($_REQUEST['fuid']);
				if($fusername) {
					$fuid = getuid($fusername);
				}
				if($fuid && in_array($fuid, $space['friends'])) {
					$wheresql = "b.uid = '$fuid'";
					$theurl = "space.php?uid=$space[uid]&do=$do&view=we&fuid=$fuid";
					$f_index = '';
					$fuid_actives = array($fuid=>' selected');
				}
	
				$actives = array('we'=>' class="active"');
	
				//好友列表
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('friend')." WHERE uid='$space[uid]' AND status='1' ORDER BY num DESC, dateline DESC LIMIT 0,500");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					realname_set($value['fuid'], $value['fusername']);
					$userlist[] = $value;
				}
			}
		}

		//分类
		if($classid) {
			$wheresql .= " AND b.classid='$classid'";
			$theurl .= "&classid=$classid";
		}

		//设置权限
		$_REQUEST['friend'] = intval($_REQUEST['friend']);
		if($_REQUEST['friend']) {
			$wheresql .= " AND b.friend='$_REQUEST[friend]'";
			$theurl .= "&friend=$_REQUEST[friend]";
		}

		//搜索
		if($searchkey = stripsearchkey($_REQUEST['searchkey'])) {
			$wheresql .= " AND b.subject LIKE '%$searchkey%'";
			$theurl .= "&searchkey=$_REQUEST[searchkey]";
			cksearch($theurl);
		}

		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('introduce')." b WHERE $wheresql"),0);
		//更新统计
		if($wheresql == "b.uid='$space[uid]'" && $space['introducenum'] != $count) {
			updatetable('space', array('introducenum' => $count), array('uid'=>$space['uid']));
		}
		$wheresql="b.uid='$uid'";
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT bf.message, bf.target_ids, bf.magiccolor, b.* FROM ".tname('introduce')." b $f_index
				LEFT JOIN ".tname('introducefield')." bf ON bf.introduceid=b.introduceid
				WHERE $wheresql
				ORDER BY $ordersql DESC LIMIT $start,$perpage");
		}
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
				$list[] = $value;
			} else {
				$pricount++;
			}
		}
	}

	//分页
	$multi = multi($count, $perpage, $page, $theurl);
	capi_showmessage_by_data("rest_success", 0, array('introduce'=>$list, 'count'=>$count));
	//实名
	realname_get();

	$_TPL['css'] = 'introduce';
	//include_once template("space_introduce_list");
}

?>