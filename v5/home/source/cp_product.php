<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_product.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//�����Ϣ
$productid = empty($_GET['productid'])?0:intval($_GET['productid']);
$op = empty($_GET['op'])?'':$_GET['op'];

$product = array();
if($productid) {
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('product')." b 
		LEFT JOIN ".tname('productfield')." bf ON bf.productid=b.productid 
		WHERE b.productid='$productid'");
	$product = $_SGLOBAL['db']->fetch_array($query);
}

//Ȩ�޼��
if(empty($product)) {
	if(!checkperm('allowproduct')) {
		ckspacelog();
		showmessage('no_authority_to_add_log');
	}
	
	//ʵ����֤
	ckrealname('product');
	
	//��Ƶ��֤
	ckvideophoto('product');
	
	//���û���ϰ
	cknewuser();
	
	//�ж��Ƿ񷢲�̫��
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	
	//�����ⲿ����
	$product['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$product['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $product['uid'] && !checkperm('manageproduct')) {
		showmessage('no_authority_operation_of_the_log');
	}
}

//��ӱ༭����
if(submitcheck('productsubmit')) {

	if(empty($product['productid'])) {
		$product = array();
	} else {
		if(!checkperm('allowproduct')) {
			ckspacelog();
			showmessage('no_authority_to_add_log');
		}
	}
	
	//��֤��
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}
	
	include_once(S_ROOT.'./source/function_product.php');
	if($newproduct = product_post($_POST, $product)) {
		if(empty($product) && $newproduct['topicid']) {
			$url = 'space.php?do=topic&topicid='.$newproduct['topicid'].'&view=product';
		} else {
			$url = 'space.php?uid='.$newproduct['uid'].'&do=product&id='.$newproduct['productid'];
		}
		showmessage('do_success', $url, 0);
	} else {
		showmessage('that_should_at_least_write_things');
	}
}

if($_GET['op'] == 'delete') {
	//ɾ��
	if(submitcheck('deletesubmit')) {
		include_once(S_ROOT.'./source/function_delete.php');
		if(deleteproducts(array($productid))) {
			showmessage('do_success', "space.php?uid=$product[uid]&do=product&view=me");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
	
} elseif($_GET['op'] == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('product', array('productid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=product&id=$id", 0);
	
} elseif($_GET['op'] == 'edithot') {
	//Ȩ��
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
	//��ӱ༭
	//��ȡ���˷���
	$classarr = $product['uid']?getclassproductarr($product['uid']):getclassproductarr($_SGLOBAL['supe_uid']);
	//��ȡ���
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
	
	
	$product['message'] = str_replace('&amp;', '&amp;amp;', $product['message']);
	$product['message'] = shtmlspecialchars($product['message']);
	
	$allowhtml = checkperm('allowhtml');
	
	//������
	$groups = getfriendgroup();
	
	//�����ȵ�
	$topic = array();
	$topicid = $_GET['topicid'] = intval($_GET['topicid']);
	if($topicid) {
		$topic = topic_get($topicid);
	}
	if($topic) {
		$actives = array('product' => ' class="active"');
	}
	
	//�˵�����
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_product");

?>