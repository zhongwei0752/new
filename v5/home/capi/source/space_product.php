<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_product.php 13208 2009-08-20 06:31:35Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$minhot = $_SCONFIG['feedhotmin']<1?3:$_SCONFIG['feedhotmin'];

$page = empty($_REQUEST['page'])?1:intval($_REQUEST['page']);
if($page<1) $page=1;
$id = empty($_REQUEST['id'])?0:intval($_REQUEST['id']);
$classid = empty($_REQUEST['classid'])?0:intval($_REQUEST['classid']);

//��̬����
@include_once(S_ROOT.'./data/data_click.php');
$clicks = empty($_SGLOBAL['click']['productid'])?array():$_SGLOBAL['click']['productid'];

if($id) {

	//��ȡ��־
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('product')." b LEFT JOIN ".tname('productfield')." bf ON bf.productid=b.productid WHERE b.productid='$id' AND b.uid='$space[uid]'");
	$product = $_SGLOBAL['db']->fetch_array($query);
	//��־������
	if(empty($product)) {
		capi_showmessage_by_data('view_to_info_did_not_exist');
	}

	//������Ȩ��
	if(!ckfriend($product['uid'], $product['friend'], $product['target_ids'])) {
		//û��Ȩ��
		include template('space_privacy');
		exit();
	} elseif(!$space['self'] && $product['friend'] == 4) {
		//������������
		$cookiename = "view_pwd_product_$product[productid]";
		$cookievalue = empty($_SCOOKIE[$cookiename])?'':$_SCOOKIE[$cookiename];
		if($cookievalue != md5(md5($product['password']))) {
			$invalue = $product;
			include template('do_inputpwd');
			exit();
		}
	}

	//����
	$product['tag'] = empty($product['tag'])?array():unserialize($product['tag']);

	//������Ƶ��ǩ
	include_once(S_ROOT.'./source/function_product.php');

	$product['message'] = product_bbcode($product['message']);

	$otherlist = $newlist = array();

	//��Ч��
	if($_SCONFIG['uc_tagrelatedtime'] && ($_SGLOBAL['timestamp'] - $product['relatedtime'] > $_SCONFIG['uc_tagrelatedtime'])) {
		$product['related'] = array();
	}
	if($product['tag'] && empty($product['related'])) {
		@include_once(S_ROOT.'./data/data_tagtpl.php');

		$b_tagids = $b_tags = $product['related'] = array();
		$tag_count = -1;
		foreach ($product['tag'] as $key => $value) {
			$b_tags[] = $value;
			$b_tagids[] = $key;
			$tag_count++;
		}
		if(!empty($_SCONFIG['uc_tagrelated']) && $_SCONFIG['uc_status']) {
			if(!empty($_SGLOBAL['tagtpl']['limit'])) {
				include_once(S_ROOT.'./uc_client/client.php');
				$tag_index = mt_rand(0, $tag_count);
				$product['related'] = uc_tag_get($b_tags[$tag_index], $_SGLOBAL['tagtpl']['limit']);
			}
		} else {
			//����TAG
			$tag_productids = array();
			$query = $_SGLOBAL['db']->query("SELECT DISTINCT productid FROM ".tname('tagproduct')." WHERE tagid IN (".simplode($b_tagids).") AND productid<>'$product[productid]' ORDER BY productid DESC LIMIT 0,10");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$tag_productids[] = $value['productid'];
			}
			if($tag_productids) {
				$query = $_SGLOBAL['db']->query("SELECT uid,username,subject,productid FROM ".tname('product')." WHERE productid IN (".simplode($tag_productids).")");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					realname_set($value['uid'], $value['username']);//ʵ��
					$value['url'] = "space.php?uid=$value[uid]&do=product&id=$value[productid]";
					$product['related'][UC_APPID]['data'][] = $value;
				}
				$product['related'][UC_APPID]['type'] = 'UCHOME';
			}
		}
		if(!empty($product['related']) && is_array($product['related'])) {
			foreach ($product['related'] as $appid => $values) {
				if(!empty($values['data']) && $_SGLOBAL['tagtpl']['data'][$appid]['template']) {
					foreach ($values['data'] as $itemkey => $itemvalue) {
						if(!empty($itemvalue) && is_array($itemvalue)) {
							$searchs = $replaces = array();
							foreach (array_keys($itemvalue) as $key) {
								$searchs[] = '{'.$key.'}';
								$replaces[] = $itemvalue[$key];
							}
							$product['related'][$appid]['data'][$itemkey]['html'] = stripslashes(str_replace($searchs, $replaces, $_SGLOBAL['tagtpl']['data'][$appid]['template']));
						} else {
							unset($product['related'][$appid]['data'][$itemkey]);
						}
					}
				} else {
					$product['related'][$appid]['data'] = '';
				}
				if(empty($product['related'][$appid]['data'])) {
					unset($product['related'][$appid]);
				}
			}
		}
		updatetable('productfield', array('related'=>addslashes(serialize(sstripslashes($product['related']))), 'relatedtime'=>$_SGLOBAL['timestamp']), array('productid'=>$product['productid']));//����
	} else {
		$product['related'] = empty($product['related'])?array():unserialize($product['related']);
	}

	//���ߵ�����������־
	$otherlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('product')." WHERE uid='$space[uid]' ORDER BY dateline DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['productid'] != $product['productid'] && empty($value['friend'])) {
			$otherlist[] = $value;
		}
	}

	//���µ���־
	$newlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('product')." WHERE hot>=3 ORDER BY dateline DESC LIMIT 0,6");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		if($value['productid'] != $product['productid'] && empty($value['friend'])) {
			realname_set($value['uid'], $value['username']);
			$newlist[] = $value;
		}
	}

	//����
	$perpage = 30;
	$perpage = mob_perpage($perpage);
	
	$start = ($page-1)*$perpage;

	//��鿪ʼ��
	ckstart($start, $perpage);

	$count = $product['replynum'];

	$list = array();
	if($count) {
		$cid = empty($_REQUEST['cid'])?0:intval($_REQUEST['cid']);
		$csql = $cid?"cid='$cid' AND":'';

		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('comment')." WHERE $csql id='$id' AND idtype='productid' ORDER BY dateline LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			realname_set($value['authorid'], $value['author']);//ʵ��
			$list[] = $value;
		}
	}

	//��ҳ
	$multi = multi($count, $perpage, $page, "space.php?uid=$product[uid]&do=$do&id=$id", '', 'content');

	//����ͳ��
	if(!$space['self'] && $_SCOOKIE['view_productid'] != $product['productid']) {
		$_SGLOBAL['db']->query("UPDATE ".tname('product')." SET viewnum=viewnum+1 WHERE productid='$product[productid]'");
		inserttable('log', array('id'=>$space['uid'], 'idtype'=>'uid'));//�ӳٸ���
		ssetcookie('view_productid', $product['productid']);
	}

	//��̬
	$hash = md5($product['uid']."\t".$product['dateline']);
	$id = $product['productid'];
	$idtype = 'productid';

	foreach ($clicks as $key => $value) {
		$value['clicknum'] = $product["click_$key"];
		$value['classid'] = mt_rand(1, 4);
		if($value['clicknum'] > $maxclicknum) $maxclicknum = $value['clicknum'];
		$clicks[$key] = $value;
	}

	//����
	$clickuserlist = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('clickuser')."
		WHERE id='$id' AND idtype='$idtype'
		ORDER BY dateline DESC
		LIMIT 0,18");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		realname_set($value['uid'], $value['username']);//ʵ��
		$value['clickname'] = $clicks[$value['clickid']]['name'];
		$clickuserlist[] = $value;
	}

	//�ȵ�
	$topic = topic_get($product['topicid']);

	//ʵ��
	realname_get();

	$_TPL['css'] = 'product';
	include_once template("space_product_view");

} else {
	//��ҳ
	$perpage = 10;
	$perpage = mob_perpage($perpage);
	
	$start = ($page-1)*$perpage;

	//��鿪ʼ��
	ckstart($start, $perpage);

	//ժҪ��ȡ
	$summarylen = 300;

	$classarr = array();
	$list = array();
	$userlist = array();
	$count = $pricount = 0;

	$ordersql = 'b.dateline';

	if(empty($_REQUEST['view']) && ($space['friendnum']<$_SCONFIG['showallfriendnum'])) {
		$_REQUEST['view'] = 'me';//Ĭ����ʾ
	}

	//�����ѯ
	$f_index = '';
	if($_REQUEST['view'] == 'click') {
		//�ȹ�����־
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

		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('clickuser')." c WHERE c.uid='$space[uid]' AND c.idtype='productid' $wheresql"),0);
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT b.*, bf.message, bf.target_ids, bf.magiccolor FROM ".tname('clickuser')." c
				LEFT JOIN ".tname('product')." b ON b.productid=c.id
				LEFT JOIN ".tname('productfield')." bf ON bf.productid=c.id
				WHERE c.uid='$space[uid]' AND c.idtype='productid' $wheresql
				ORDER BY c.dateline DESC LIMIT $start,$perpage");
		}
	} else {
		
		if($_REQUEST['view'] == 'all') {
			//��ҵ���־
			$wheresql = '1';

			$actives = array('all'=>' class="active"');

			//����
			$orderarr = array('dateline','replynum','viewnum','hot');
			foreach ($clicks as $value) {
				$orderarr[] = "click_$value[clickid]";
			}
			if(!in_array($_REQUEST['orderby'], $orderarr)) $_REQUEST['orderby'] = '';

			//ʱ��
			$_REQUEST['day'] = intval($_REQUEST['day']);
			$_REQUEST['hotday'] = 7;

			if($_REQUEST['orderby']) {
				$ordersql = 'b.'.$_REQUEST['orderby'];

				$theurl = "space.php?uid=$space[uid]&do=product&view=all&orderby=$_REQUEST[orderby]";
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
				//�鿴���˵�
				$wheresql = "b.uid='$space[uid]'";
				$theurl = "space.php?uid=$space[uid]&do=$do&view=me";
				$actives = array('me'=>' class="active"');
				//��־����
				$query = $_SGLOBAL['db']->query("SELECT classid, classname FROM ".tname('classproduct')." WHERE uid='$space[uid]' or uid='0'");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					$classarr[$value['classid']] = $value['classname'];
				}
			} else {
				$wheresql = "b.uid IN ($space[feedfriend])";
				$theurl = "space.php?uid=$space[uid]&do=$do&view=we";
				$f_index = 'USE INDEX(dateline)';
	
				$fuid_actives = array();
	
				//�鿴ָ�����ѵ�
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
	
				//�����б�
				$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('friend')." WHERE uid='$space[uid]' AND status='1' ORDER BY num DESC, dateline DESC LIMIT 0,500");
				while ($value = $_SGLOBAL['db']->fetch_array($query)) {
					realname_set($value['fuid'], $value['fusername']);
					$userlist[] = $value;
				}
			}
		}

		//����
		if($classid) {
			$wheresql .= " AND b.classid='$classid'";
			$theurl .= "&classid=$classid";
		}

		//����Ȩ��
		$_REQUEST['friend'] = intval($_REQUEST['friend']);
		if($_REQUEST['friend']) {
			$wheresql .= " AND b.friend='$_REQUEST[friend]'";
			$theurl .= "&friend=$_REQUEST[friend]";
		}

		//����
		if($searchkey = stripsearchkey($_REQUEST['searchkey'])) {
			$wheresql .= " AND b.subject LIKE '%$searchkey%'";
			$theurl .= "&searchkey=$_REQUEST[searchkey]";
			cksearch($theurl);
		}

		$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('product')." b WHERE $wheresql"),0);
		//����ͳ��
		if($wheresql == "b.uid='$space[uid]'" && $space['productnum'] != $count) {
			updatetable('space', array('productnum' => $count), array('uid'=>$space['uid']));
		}
		if($count) {
			$query = $_SGLOBAL['db']->query("SELECT bf.message, bf.target_ids, bf.magiccolor, b.* FROM ".tname('product')." b $f_index
				LEFT JOIN ".tname('productfield')." bf ON bf.productid=b.productid
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

	//��ҳ
	$multi = multi($count, $perpage, $page, $theurl);
	capi_showmessage_by_data("rest_success", 0, array('product'=>$list, 'count'=>$count));

	//ʵ��
	realname_get();

	$_TPL['css'] = 'product';
	include_once template("space_product_list");
}

?>