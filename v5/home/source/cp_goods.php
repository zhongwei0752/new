<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_product.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//¼ì²éÐÅÏ¢
$goodsid = empty($_GET['goodsid'])?0:intval($_GET['goodsid']);
$op = empty($_GET['op'])?'':$_GET['op'];

//各模块小logo
$ac=$_GET['ac'];
$query4 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('menuset')." WHERE english='$ac'");
$value4 = $_SGLOBAL['db']->fetch_array($query4);
$wei1=$value4;
//判断是否购买
$query5 = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf $f_index
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$_SGLOBAL[supe_uid]' and bf.appstatus='1' and b.english='$ac'
				ORDER BY b.dateline ASC");
$value5 = $_SGLOBAL['db']->fetch_array($query5);
$zhong2=$value5;
//if(empty($zhong2)){
//	showmessage("未购买应用，请购买后再使用！","space.php?do=menuset&view=all");
//}

$product = array();
if($goodsid) {
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('goods')." b 
		LEFT JOIN ".tname('goodsfield')." bf ON bf.goodsid=b.goodsid 
		WHERE b.goodsid='$goodsid'");
	$goods = $_SGLOBAL['db']->fetch_array($query);
}

//È¨ÏÞ¼ì²é
if(empty($goods)) {
	//if(!checkperm('allowproduct')) {
		//ckspacelog();
		//showmessage('no_authority_to_add_log');
	//}
	
	//ÊµÃûÈÏÖ¤
	ckrealname('product');
	
	//ÊÓÆµÈÏÖ¤
	ckvideophoto('product');
	
	//ÐÂÓÃ»§¼ûÏ°
	cknewuser();
	
	//ÅÐ¶ÏÊÇ·ñ·¢²¼Ì«¿ì
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	
	//½ÓÊÕÍâ²¿±êÌâ
	$goods['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$goods['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $goods['uid'] && !checkperm('managegoods')) {
		showmessage('no_authority_operation_of_the_log');
	}
}


//Ìí¼Ó±à¼­²Ù×÷
//var_dump($_POST);
if(submitcheck('goodssubmit')) {

	if(empty($goods['goodsid'])) {
		$goods = array();
	} else {
		if(!checkperm('allowproduct')) {
			ckspacelog();
			showmessage('no_authority_to_add_log');
		}
	}
	
	//ÑéÖ¤Âë
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}
	
	include_once(S_ROOT.'./source/function_goods.php');
	//var_dump($goods);
	//var_dump($_POST);
	//var_dump($goods);
	if($newproduct = goods_post($_POST, $goods)) {
		if(empty($product) && $newproduct['topicid']) {
			$url = 'space.php?do=topic&topicid='.$newproduct['topicid'].'&view=goods';
		} else {
			$url = 'space.php?uid='.$newproduct['uid']."&do=$ac&id=".$newproduct['goodsid'];
		}
		showmessage('do_success', $url, 0);
	} else {
		showmessage('that_should_at_least_write_things');
	}
}

if($_GET['op'] == 'delete') {
	//É¾³ý
	if(submitcheck('deletesubmit')) {
		include_once(S_ROOT.'./source/function_delete.php');
		if(deletegoods(array($goodsid))) {
			showmessage('do_success', "space.php?uid=$goods[uid]&do=goods&view=me");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
	
} elseif($_GET['op'] == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('product', array('productid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=product&id=$id", 0);
	
} elseif($_GET['op'] == 'edithot') {
	//È¨ÏÞ
	if(!checkperm('manageproduct')) {
		showmessage('no_privilege');
	}
	
	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		updatetable('product', array('hot'=>$_POST['hot']), array('productid'=>$product['productid']));
		if($_POST['hot']>0) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($product['productid'], 'productid');
		} else {
			updatetable('feed', array('hot'=>$_POST['hot']), array('id'=>$product['productid'], 'idtype'=>'productid'));
		}
		
		showmessage('do_success', "space.php?uid=$product[uid]&do=product&id=$product[productid]", 0);
	}
	
} else {
	//Ìí¼Ó±à¼­
	//»ñÈ¡¸öÈË·ÖÀà
	$classarr = $product['uid']?getclassproductarr($product['uid']):getclassproductarr($_SGLOBAL['supe_uid']);
	//»ñÈ¡Ïà²á
	$albums = getalbums($_SGLOBAL['supe_uid']);
	
	$tags = empty($product['tag'])?array():unserialize($product['tag']);
	$product['tag'] = implode(' ', $tags);
	
	$product['target_names'] = '';
	
	$friendarr = array($product['friend'] => ' selected');
	
	$passwordstyle = $selectgroupstyle = 'display:none';
	if($product['friend'] == 4) {
		$passwordstyle = '';
	} elseif($product['friend'] == 2) {
		$selectgroupstyle = '';
		if($product['target_ids']) {
			$names = array();
			$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('space')." WHERE uid IN ($product[target_ids])");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$names[] = $value['username'];
			}
			$product['target_names'] = implode(' ', $names);
		}
	}
	
	
	$goods['message'] = str_replace('&amp;', '&amp;amp;', $goods['message']);
	$goods['message'] = shtmlspecialchars($goods['message']);
	
	$allowhtml = checkperm('allowhtml');
	
	//ºÃÓÑ×é
	$groups = getfriendgroup();
	
	//²ÎÓëÈÈµã
	$topic = array();
	$topicid = $_GET['topicid'] = intval($_GET['topicid']);
	if($topicid) {
		$topic = topic_get($topicid);
	}
	if($topic) {
		$actives = array('product' => ' class="active"');
	}
	
	//²Ëµ¥¼¤»î
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_goods");

?>