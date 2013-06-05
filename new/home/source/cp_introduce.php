<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_introduce.php 13026 2009-08-06 02:17:33Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//�����Ϣ
$introduceid = empty($_GET['introduceid'])?0:intval($_GET['introduceid']);
$op = empty($_GET['op'])?'':$_GET['op'];


$introduce = array();
if($introduceid) {
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('introduce')." b 
		LEFT JOIN ".tname('introducefield')." bf ON bf.introduceid=b.introduceid 
		WHERE b.introduceid='$introduceid'");
	$introduce = $_SGLOBAL['db']->fetch_array($query);
}

//Ȩ�޼��
if(empty($introduce)) {
	if(!checkperm('allowintroduce')) {
		ckspacelog();
		showmessage('no_authority_to_add_log');
	}
	
	//ʵ����֤
	ckrealname('introduce');
	
	//��Ƶ��֤
	ckvideophoto('introduce');
	
	//���û���ϰ
	cknewuser();
	
	//�ж��Ƿ񷢲�̫��
	$waittime = interval_check('post');
	if($waittime > 0) {
		showmessage('operating_too_fast','',1,array($waittime));
	}
	
	//�����ⲿ����
	$introduce['subject'] = empty($_GET['subject'])?'':getstr($_GET['subject'], 80, 1, 0);
	$introduce['message'] = empty($_GET['message'])?'':getstr($_GET['message'], 5000, 1, 0);
	
} else {
	
	if($_SGLOBAL['supe_uid'] != $introduce['uid'] && !checkperm('manageintroduce')) {
		showmessage('no_authority_operation_of_the_log');
	}
}

//��ӱ༭����
if(submitcheck('introducesubmit')) {

	if(empty($introduce['introduceid'])) {
		$introduce = array();
	} else {
		if(!checkperm('allowintroduce')) {
			ckspacelog();
			showmessage('no_authority_to_add_log');
		}
	}
	
	//��֤��
	if(checkperm('seccode') && !ckseccode($_POST['seccode'])) {
		showmessage('incorrect_code');
	}
	
	include_once(S_ROOT.'./source/function_introduce.php');
	if($newintroduce = introduce_post($_POST, $introduce)) {
		if(empty($introduce) && $newintroduce['topicid']) {
			$url = 'space.php?do=topic&topicid='.$newintroduce['topicid'].'&view=introduce';
		} else {
			$url = 'space.php?uid='.$newintroduce['uid'].'&do=introduce&id='.$newintroduce['introduceid'];
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
		if(deleteintroduces(array($introduceid))) {
			showmessage('do_success', "space.php?uid=$introduce[uid]&do=introduce&view=me");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}
	
} elseif($_GET['op'] == 'goto') {
	
	$id = intval($_GET['id']);
	$uid = $id?getcount('introduce', array('introduceid'=>$id), 'uid'):0;

	showmessage('do_success', "space.php?uid=$uid&do=introduce&id=$id", 0);
	
} elseif($_GET['op'] == 'edithot') {
	//Ȩ��
	if(!checkperm('manageintroduce')) {
		showmessage('no_privilege');
	}
	
	if(submitcheck('hotsubmit')) {
		$_POST['hot'] = intval($_POST['hot']);
		updatetable('introduce', array('hot'=>$_POST['hot']), array('introduceid'=>$introduce['introduceid']));
		if($_POST['hot']>0) {
			include_once(S_ROOT.'./source/function_feed.php');
			feed_publish($introduce['introduceid'], 'introduceid');
		} else {
			updatetable('feed', array('hot'=>$_POST['hot']), array('id'=>$introduce['introduceid'], 'idtype'=>'introduceid'));
		}
		
		showmessage('do_success', "space.php?uid=$introduce[uid]&do=introduce&id=$introduce[introduceid]", 0);
	}
	
} else {
	//��ӱ༭
	//��ȡ���˷���
	$classarr = $introduce['uid']?getclassintroducearr($introduce['uid']):getclassintroducearr($_SGLOBAL['supe_uid']);
	//��ȡ���
	$albums = getalbums($_SGLOBAL['supe_uid']);
	
	$tags = empty($introduce['tag'])?array():unserialize($introduce['tag']);
	$introduce['tag'] = implode(' ', $tags);
	
	$introduce['target_names'] = '';
	
	$friendarr = array($introduce['friend'] => ' selected');
	
	$passwordstyle = $selectgroupstyle = 'display:none';
	if($introduce['friend'] == 4) {
		$passwordstyle = '';
	} elseif($introduce['friend'] == 2) {
		$selectgroupstyle = '';
		if($introduce['target_ids']) {
			$names = array();
			$query = $_SGLOBAL['db']->query("SELECT username FROM ".tname('space')." WHERE uid IN ($introduce[target_ids])");
			while ($value = $_SGLOBAL['db']->fetch_array($query)) {
				$names[] = $value['username'];
			}
			$introduce['target_names'] = implode(' ', $names);
		}
	}
	
	
	$introduce['message'] = str_replace('&amp;', '&amp;amp;', $introduce['message']);
	$introduce['message'] = shtmlspecialchars($introduce['message']);
	
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
		$actives = array('introduce' => ' class="active"');
	}
	
	//�˵�����
	$menuactives = array('space'=>' class="active"');
}

include_once template("cp_introduce");

?>