<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: cp_profile.php 13149 2009-08-13 03:11:26Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

if(!in_array($_GET['op'], array('base','contact','edu','work','info'))) {
	$_GET['op'] = 'base';
}


$theurl = "cp.php?ac=profile&op=$_GET[op]";

if($_GET['op'] == 'base') {

	if(submitcheck('profilesubmit') || submitcheck('nextsubmit')) {
		
		$namechange=$_GET['namechange'];
		if($namechange=='1'){
			updatetable('space',array('namestatus'=>'0'), array('uid'=>$_SGLOBAL['supe_uid']));
		}
		if(!@include_once(S_ROOT.'./data/data_profilefield.php')) {
			include_once(S_ROOT.'./source/function_cache.php');
			profilefield_cache();
		}
		$profilefields = empty($_SGLOBAL['profilefield'])?array():$_SGLOBAL['profilefield'];

		if(empty($space['name'])){
		if(empty($_POST['name'])){
			showmessage("公司名称不能为空！");
		}
	}
		if(empty($space['linkman'])){
		if(empty($_POST['linkman'])){
			showmessage("联系人不能为空！");
		}
	}
		if(empty($space['idcard'])){
		if(empty($_POST['idcard'])){
			showmessage("联系人身份证不能为空！");
		}
	}
	if(empty($space['imageurl'])){
		if(empty($_FILES["file1"]["name"])){
			showmessage("身份证扫描件不能为空！");
		}
	}
	if(empty($space['businessnum'])){
		if(empty($_POST['businessnum'])){
			showmessage("营业执照注册号不能为空！");
		}
	}
	if(empty($space['image3url'])){
		if(empty($_FILES["file2"]["name"])){
			showmessage("营业执照扫描件不能为空！");
		}
	}
	if(empty($space['telephone'])){
		if(empty($_POST['telephone'])){
			showmessage("固话不能为空！");
		}
	}
	if(empty($space['mobile'])){
		if(empty($_POST['mobile'])){
			showmessage("联系人电话不能为空！");
		}
	}
	if(empty($space['wxkey'])){
		if(empty($_POST['wxkey'])){
			showmessage("微信公众号不能为空！");
		}
	}
	if(empty($space['businessaddress'])){
		if(empty($_POST['businessaddress'])){
			showmessage("企业地址不能为空！");
		}
	}
	if(empty($space['business'])){
		if(empty($_POST['business'])){
			showmessage("行业不能为空！");
		}
	}
	if(empty($space['resideprovince'])||empty($space['residecity'])){
		if(empty($_POST['resideprovince'])||empty($_POST['residecity'])){
			showmessage("运营地区不能为空！");
		}
	}
	if(empty($space['email'])){
		if(empty($_POST['email'])){
			showmessage("邮箱不能为空！");
		}
	}
	if(empty($space['companyintroduce'])){
		if(empty($_POST['companyintroduce'])){
			showmessage("企业介绍不能为空！");
		}
	}
	
		//Ìá½»¼ì²é

			if($_POST['qq']){
				$setarr['qq'] = getstr($_POST['qq'], 40, 1, 1);
			}
			if($_POST['idcard']){
				$setarr['idcard'] = getstr($_POST['idcard'], 60, 1, 1);
			}
			if($_POST['businessnum']){
				$setarr['businessnum'] = getstr($_POST['businessnum'], 60, 1, 1);
			}
			if($_POST['mobile']){
				$setarr['mobile'] = getstr($_POST['mobile'], 60, 1, 1);
			}
			
			if($_POST['businessaddress']){
				$setarr['businessaddress'] = getstr($_POST['businessaddress'], 60, 1, 1);
			}
			if($_POST['business']){
				$setarr['business'] = getstr($_POST['business'], 60, 1, 1);
			}
			if($_POST['resideprovince']){
				$setarr['resideprovince'] = getstr($_POST['resideprovince'], 60, 1, 1);
			}
			if($_POST['residecity']){
				$setarr['residecity'] = getstr($_POST['residecity'], 60, 1, 1);
			}
			if($_POST['telephone']){
				$setarr['telephone'] = getstr($_POST['telephone'], 60, 1, 1);
			}
			if($_POST['companyintroduce']){
				$setarr['companyintroduce'] = getstr($_POST['companyintroduce'], 800, 1, 1);
			}
			if($_POST['email']){
				$setarr['email'] = getstr($_POST['email'], 60, 1, 1);
			}
			if($_POST['emailcheck']){
				$setarr['emailcheck'] = $emailcheck;
			}

			if($setarr){
				updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
				updatetable('space',array('profilestatus'=>'1'), array('uid'=>$_SGLOBAL['supe_uid']));//更新提交状态
				updatetable('space',array('namestatus'=>'0'), array('uid'=>$_SGLOBAL['supe_uid']));
			}
		//身份证扫描件图片上传处理
			if($_FILES["file1"]["name"]){
			include("./source/upload1.class.php");
  			$image= new upload;
  			$image->upload_file($_SGLOBAL['supe_uid'],"space");
  		}

  		//营业执照扫描件图片上传处理
  			if($_FILES["file2"]["name"]){
			include("./source/upload2.class.php");
  			$image1= new upload1;
  			$image1->upload_file1($_SGLOBAL['supe_uid'],"spacefield");
  		}

  			//企业LOGO图片上传处理
			//if($_FILES["file3"]["name"]){
			//include("./source/upload3.class.php");
  		//	$image2= new upload2;
  		//	$image2->upload_file2($_SGLOBAL['supe_uid'],"spacefield");
  		//}

		//ÐÔ±ð
		$_POST['sex'] = intval($_POST['sex']);
		if($_POST['sex'] && empty($space['sex'])) $setarr['sex'] = $_POST['sex'];
	
		foreach ($profilefields as $field => $value) {
			if($value['formtype'] == 'select') $value['maxsize'] = 255;
			$setarr['field_'.$field] = getstr($_POST['field_'.$field], $value['maxsize'], 1, 1);
			if($value['required'] && empty($setarr['field_'.$field])) {
				showmessage('field_required', '', 1, array($value['title']));
			}
		}

		
		
		
		//ÒþË½
		$inserts = array();
		foreach ($_POST['friend'] as $key => $value) {
			$value = intval($value);
			$inserts[] = "('base','$key','$space[uid]','$value')";
		}
		if($inserts) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='base'");
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend)
				VALUES ".implode(',', $inserts));
		}

		
		if($_POST['name']){
				$setarr1['name'] = getstr($_POST['name'], 40, 1, 1);
				updatetable('space', $setarr1, array('uid'=>$_SGLOBAL['supe_uid']));
			}
			if($_POST['linkman']){
				$setarr1['linkman'] = getstr($_POST['linkman'], 40, 1, 1);
				updatetable('space', $setarr1, array('uid'=>$_SGLOBAL['supe_uid']));
			}
			if($_POST['wxkey']){
				$setarr1['wxkey'] = getstr($_POST['wxkey'], 40, 1, 1);
				updatetable('space', $setarr1, array('uid'=>$_SGLOBAL['supe_uid']));
			}
		
			

	
		//±ä¸ü¼ÇÂ¼
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>0), 0, true);
		}
		
		//²úÉúfeed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_base'));
		}
	
		if(submitcheck('nextsubmit')) {
			$url = './template/default/post_ok.htm';
		} else {
			$url = 'cp.php?ac=profile&op=base';
		}
		showmessage('update_on_successful_individuals', $url);
	}

	//ÐÔ±ð
	$sexarr = array($space['sex']=>' checked');
	
	//ÉúÈÕ:Äê
	$birthyeayhtml = '';
	$nowy = sgmdate('Y');
	for ($i=0; $i<100; $i++) {
		$they = $nowy - $i;
		$selectstr = $they == $space['birthyear']?' selected':'';
		$birthyeayhtml .= "<option value=\"$they\"$selectstr>$they</option>";
	}
	//ÉúÈÕ:ÔÂ
	$birthmonthhtml = '';
	for ($i=1; $i<13; $i++) {
		$selectstr = $i == $space['birthmonth']?' selected':'';
		$birthmonthhtml .= "<option value=\"$i\"$selectstr>$i</option>";
	}
	//ÉúÈÕ:ÈÕ
	$birthdayhtml = '';
	for ($i=1; $i<32; $i++) {
		$selectstr = $i == $space['birthday']?' selected':'';
		$birthdayhtml .= "<option value=\"$i\"$selectstr>$i</option>";
	}
	//ÑªÐÍ
	$bloodhtml = '';
	foreach (array('A','B','O','AB') as $value) {
		$selectstr = $value == $space['blood']?' selected':'';
		$bloodhtml .= "<option value=\"$value\"$selectstr>$value</option>";
	}
	//»éÒö
	$marryarr = array($space['marry'] => ' selected');
	
	//À¸Ä¿±íµ¥
	$profilefields = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('profilefield')." ORDER BY displayorder");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$fieldid = $value['fieldid'];
		$value['formhtml'] = '';
	
		if($value['formtype'] == 'text') {
			$value['formhtml'] = "<input type=\"text\" name=\"field_$fieldid\" value=\"".$space["field_$fieldid"]."\" class=\"t_input\">";
		} else {
			$value['formhtml'] .= "<select name=\"field_$fieldid\">";
			if(empty($value['required'])) {
				$value['formhtml'] .= "<option value=\"\"></option>";
			}
			$optionarr = explode("\n", $value['choice']);
			foreach ($optionarr as $ov) {
				$ov = trim($ov);
				if($ov) {
					$selectstr = $space["field_$fieldid"]==$ov?' selected':'';
					$value['formhtml'] .= "<option value=\"$ov\"$selectstr>$ov</option>";
				}
			}
			$value['formhtml'] .= "</select>";
		}
	
		$profilefields[$value['fieldid']] = $value;
	}
	
	if(empty($_SCONFIG['namechange'])) {
		$_GET['namechange'] = 0;//²»ÔÊÐíÐÞ¸Ä
	}
	
	//ÒþË½
	$friendarr = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='base'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$friendarr[$value['subtype']][$value['friend']] = ' selected';
	}
	
} elseif ($_GET['op'] == 'contact') {
	
	if($_GET['resend']) {
		//ÖØÐÂ·¢ËÍÓÊÏäÑéÖ¤
		$toemail = $space['newemail']?$space['newemail']:$space['email'];
		emailcheck_send($space['uid'], $toemail);
		showmessage('do_success', "cp.php?ac=profile&op=contact");
	}
	
	if(submitcheck('profilesubmit') || submitcheck('nextsubmit')) {
		//Ìá½»¼ì²é
		$setarr = array(
			'mobile' => getstr($_POST['mobile'], 40, 1, 1),
			'qq' => getstr($_POST['qq'], 20, 1, 1),
			'msn' => getstr($_POST['msn'], 80, 1, 1),
		);
		
		//ÓÊÏäÎÊÌâ
		$newemail = isemail($_POST['email'])?$_POST['email']:'';
		if(isset($_POST['email']) && $newemail != $space['email']) {
			
			//¼ì²éÓÊÏäÎ¨Ò»ÐÔ
			if($_SCONFIG['uniqueemail']) {
				if(getcount('spacefield', array('email'=>$newemail, 'emailcheck'=>1))) {
					showmessage('uniqueemail_check');
				}
			}
			
			//ÑéÖ¤ÃÜÂë
			if(!$passport = getpassport($_SGLOBAL['supe_username'], $_POST['password'])) {
				showmessage('password_is_not_passed');
			}
			
			//ÓÊÏäÐÞ¸Ä
			if(empty($newemail)) {
				//ÓÊÏäÉ¾³ý
				$setarr['email'] = '';
				$setarr['emailcheck'] = 0;
			} elseif($newemail != $space['email']) {
				//Ö®Ç°ÒÑ¾­ÑéÖ¤
				if($space['emailcheck']) {
					//·¢ËÍÓÊ¼þÑéÖ¤£¬²»ÐÞ¸ÄÓÊÏä
					$setarr['newemail'] = $newemail;
				} else {
					//ÐÞ¸ÄÓÊÏä
					$setarr['email'] = $newemail;
				}
				emailcheck_send($space['uid'], $newemail);
			}
		}
		
		updatetable('spacefield', $setarr, array('uid'=>$_SGLOBAL['supe_uid']));
		
		//ÒþË½
		$inserts = array();
		foreach ($_POST['friend'] as $key => $value) {
			$value = intval($value);
			$inserts[] = "('contact','$key','$space[uid]','$value')";
		}
		if($inserts) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='contact'");
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')." (type,subtype,uid,friend)
				VALUES ".implode(',', $inserts));
		}

		//±ä¸ü¼ÇÂ¼
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>2), 0, true);
		}
		
		//²úÉúfeed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_contact'));
		}
		
		if(submitcheck('nextsubmit')) {
			$url = 'cp.php?ac=profile&op=edu';
		} else {
			$url = 'cp.php?ac=profile&op=contact';
		}
		showmessage('update_on_successful_individuals', $url);
	}
	
	//ÒþË½
	$friendarr = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='contact'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$friendarr[$value['subtype']][$value['friend']] = ' selected';
	}
	
} elseif ($_GET['op'] == 'edu') {
	
	if($_GET['subop'] == 'delete') {
		$infoid = intval($_GET['infoid']);
		if($infoid) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE infoid='$infoid' AND uid='$space[uid]' AND type='edu'");
		}
	}
	
	if(submitcheck('profilesubmit') || submitcheck('nextsubmit')) {
		//Ìá½»¼ì²é
		$inserts = array();
		foreach ($_POST['title'] as $key => $value) {
			$value = getstr($value, 100, 1, 1);
			if($value) {
				$subtitle= getstr($_POST['subtitle'][$key], 20, 1, 1);
				$startyear = intval($_POST['startyear'][$key]);
				$friend = intval($_POST['friend'][$key]);
				$inserts[] = "('$space[uid]','edu','$value','$subtitle','$startyear','$friend')";
			}
		}
		if($inserts) {
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')."(uid,type,title,subtitle,startyear,friend) VALUES ".implode(',', $inserts));
		}
		
		//±ä¸ü¼ÇÂ¼
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>2), 0, true);
		}
		
		//²úÉúfeed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_edu'));
		}

		if(submitcheck('nextsubmit')) {
			$url = 'cp.php?ac=profile&op=work';
		} else {
			$url = 'cp.php?ac=profile&op=edu';
		}
		showmessage('update_on_successful_individuals', $url);
	}
	
	//µ±Ç°ÒÑ¾­ÉèÖÃµÄÑ§Ð£
	$list = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='edu'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['title_s'] = urlencode($value['title']);
		$list[] = $value;
	}
	
} elseif ($_GET['op'] == 'work') {
	
	
	if($_GET['subop'] == 'delete') {
		$infoid = intval($_GET['infoid']);
		if($infoid) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE infoid='$infoid' AND uid='$space[uid]' AND type='work'");
		}
	}
	
	if(submitcheck('profilesubmit') || submitcheck('nextsubmit')) {
		//Ìá½»¼ì²é
		$inserts = array();
		foreach ($_POST['title'] as $key => $value) {
			$value = getstr($value, 100, 1, 1);
			if($value) {
				$subtitle= getstr($_POST['subtitle'][$key], 20, 1, 1);
				$startyear = intval($_POST['startyear'][$key]);
				$startmonth = intval($_POST['startmonth'][$key]);
				$endyear = intval($_POST['endyear'][$key]);
				$endmonth = $endyear?intval($_POST['endmonth'][$key]):0;
				$friend = intval($_POST['friend'][$key]);
				$inserts[] = "('$space[uid]','work','$value','$subtitle','$startyear','$startmonth','$endyear','$endmonth','$friend')";
			}
		}
		if($inserts) {
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')."
				(uid,type,title,subtitle,startyear,startmonth,endyear,endmonth,friend)
				VALUES ".implode(',', $inserts));
		}

		//±ä¸ü¼ÇÂ¼
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>2), 0, true);
		}
		
		//²úÉúfeed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_work'));
		}


		if(submitcheck('nextsubmit')) {
			$url = 'cp.php?ac=profile&op=info';
		} else {
			$url = 'cp.php?ac=profile&op=work';
		}
		showmessage('update_on_successful_individuals', $url);
	}
	
	//µ±Ç°ÒÑ¾­ÉèÖÃ
	$list = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='work'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$value['title_s'] = urlencode($value['title']);
		$list[] = $value;
	}
	
} elseif ($_GET['op'] == 'info') {
	
	if(submitcheck('profilesubmit')) {
		
		$inserts = array();
		foreach ($_POST['info'] as $key => $value) {
			$value = getstr($value, 500, 1, 1);
			$friend = intval($_POST['info_friend'][$key]);
			$inserts[] = "('$space[uid]','info','$key','$value','$friend')";
		}
		
		if($inserts) {
			$_SGLOBAL['db']->query("DELETE FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='info'");
			$_SGLOBAL['db']->query("INSERT INTO ".tname('spaceinfo')."
				(uid,type,subtype,title,friend)
				VALUES ".implode(',', $inserts));
		}
	
		//±ä¸ü¼ÇÂ¼
		if($_SCONFIG['my_status']) {
			inserttable('userlog', array('uid'=>$_SGLOBAL['supe_uid'], 'action'=>'update', 'dateline'=>$_SGLOBAL['timestamp'], 'type'=>2), 0, true);
		}
		
		//²úÉúfeed
		if(ckprivacy('profile', 1)) {
			feed_add('profile', cplang('feed_profile_update_info'));
		}


		$url = 'cp.php?ac=profile&op=info';
		showmessage('update_on_successful_individuals', $url);
	}
	
	//ÒþË½
	$list = $friends = array();
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('spaceinfo')." WHERE uid='$space[uid]' AND type='info'");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$list[$value['subtype']] = $value;
		$friends[$value['subtype']][$value['friend']] = ' selected';
	}
	
}

$cat_actives = array($_GET['op'] => ' class="active"');


if($_GET['op'] == 'edu' || $_GET['op'] == 'work') {
	$yearhtml = '';
	$nowy = sgmdate('Y');
	for ($i=0; $i<50; $i++) {
		$they = $nowy - $i;
		$yearhtml .= "<option value=\"$they\">$they</option>";
	}
	
	$monthhtml = '';
	for ($i=1; $i<13; $i++) {
		$monthhtml .= "<option value=\"$i\">$i</option>";
	}
}

class AvatarUploader
{
	// ±¾´ÎÒ³ÃæÇëÇóµÄ url
	private function getThisUrl()
	{
		$thisUrl = "/v5/v5/home/source/space_text.php";
		$thisUrl = "http://{$_SERVER['HTTP_HOST']}{$thisUrl}";
		return $thisUrl;
	}

	// ±¾´ÎÒ³ÃæÇëÇóµÄ base-url£¨Î²²¿ÓÐ /£©
	private function getBaseUrl()
	{
		$baseUrl = $this->getThisUrl();
		$baseUrl = substr( $baseUrl, 0, strrpos( $baseUrl, '/' ) + 1 );
		return $baseUrl;
	}

	// ÓÃÓÚ´æ´¢µÄ±¾µØÎÄ¼þ¼Ð£¨Î²²¿ÓÐÒ»¸ö DIRECTORY_SEPARATOR£©
	private function getBasePath()
	{
		$basePath = "/v5/v5/home/upload";
		$basePath = substr( $basePath, 0, strrpos($basePath, '/' ) + 1 );
		$basePath = str_replace( '/', DIRECTORY_SEPARATOR, $basePath );
		return $basePath;
	}

	// µÚÒ»²½£ºÉÏ´«Ô­Ê¼Í¼Æ¬ÎÄ¼þ
	private function uploadAvatar( $uid )
	{
		// ¼ì²éÉÏ´«ÎÄ¼þµÄÓÐÐ§ÐÔ
		if ( empty($_FILES['Filedata']) ) {
			return -3; // No photograph be upload!
		}

		// ±¾µØÁÙÊ±´æ´¢Î»ÖÃ
		$tmpPath = $this->getBasePath() . "space" . DIRECTORY_SEPARATOR . "{$uid}";
		// Èç¹ûÁÙÊ±´æ´¢µÄÎÄ¼þ¼Ð²»´æÔÚ£¬ÏÈ´´½¨Ëü
		$dir = dirname( $tmpPath );
		if ( !file_exists( $dir ) ) {
			@mkdir( $dir, 0777, true );
		}

		// Èç¹ûÍ¬ÃûµÄÁÙÊ±ÎÄ¼þÒÑ¾­´æÔÚ£¬ÏÈÉ¾³ýËü
		if ( file_exists($tmpPath) ) {
			@unlink($tmpPath);
		}

		// °ÑÉÏ´«µÄÍ¼Æ¬ÎÄ¼þ±£´æµ½Ô¤¶¨Î»ÖÃ
		if ( @copy($_FILES['Filedata']['tmp_name'], $tmpPath) || @move_uploaded_file($_FILES['Filedata']['tmp_name'], $tmpPath)) {
			@unlink($_FILES['Filedata']['tmp_name']);
			list($width, $height, $type, $attr) = getimagesize($tmpPath);
			if ( $width < 10 || $height < 10 || $width > 3000 || $height > 3000 || $type == 4 ) {
				@unlink($tmpPath);
				return -2; // Invalid photograph!
			}
		} else {
			@unlink($_FILES['Filedata']['tmp_name']);
			return -4; // Can not write to the data/tmp folder!
		}

		// ÓÃÓÚ·ÃÎÊÁÙÊ±Í¼Æ¬ÎÄ¼þµÄ url
		$tmpUrl = $this->getBaseUrl() . "space/{$uid}";
		return $tmpUrl;
	}

	private function flashdata_decode($s) {
		$r = '';
		$l = strlen($s);
		for($i=0; $i<$l; $i=$i+2) {
			$k1 = ord($s[$i]) - 48;
			$k1 -= $k1 > 9 ? 7 : 0;
			$k2 = ord($s[$i+1]) - 48;
			$k2 -= $k2 > 9 ? 7 : 0;
			$r .= chr($k1 << 4 | $k2);
		}
		return $r;
	}

	// µÚ¶þ²½£ºÉÏ´«·Ö¸îºóµÄÈý¸öÍ¼Æ¬Êý¾ÝÁ÷
	private function rectAvatar( $uid )
	{
		// ´Ó $_POST ÖÐÌáÈ¡³öÈý¸öÍ¼Æ¬Êý¾ÝÁ÷
		$bigavatar    = $this->flashdata_decode( $_POST['avatar1'] );
		$middleavatar = $this->flashdata_decode( $_POST['avatar2'] );
		$smallavatar  = $this->flashdata_decode( $_POST['avatar3'] );
		if ( !$bigavatar || !$middleavatar || !$smallavatar ) {
			return '<root><message type="error" value="-2" /></root>';
		}

		// ±£´æÎªÍ¼Æ¬ÎÄ¼þ
		$bigavatarfile    = $this->getBasePath() . "space" . DIRECTORY_SEPARATOR . "{$uid}_big.jpg";
		$middleavatarfile = $this->getBasePath() . "space" . DIRECTORY_SEPARATOR . "{$uid}_middle.jpg";
		$smallavatarfile  = $this->getBasePath() . "space" . DIRECTORY_SEPARATOR . "{$uid}_small.jpg";

		$success = 1;
		$fp = @fopen($bigavatarfile, 'wb');
		@fwrite($fp, $bigavatar);
		@fclose($fp);

		$fp = @fopen($middleavatarfile, 'wb');
		@fwrite($fp, $middleavatar);
		@fclose($fp);

		$fp = @fopen($smallavatarfile, 'wb');
		@fwrite($fp, $smallavatar);
		@fclose($fp);

		// ÑéÖ¤Í¼Æ¬ÎÄ¼þµÄÕýÈ·ÐÔ
		$biginfo    = @getimagesize($bigavatarfile);
		$middleinfo = @getimagesize($middleavatarfile);
		$smallinfo  = @getimagesize($smallavatarfile);
		if ( !$biginfo || !$middleinfo || !$smallinfo || $biginfo[2] == 4 || $middleinfo[2] == 4 || $smallinfo[2] == 4 ) {
			file_exists($bigavatarfile) && unlink($bigavatarfile);
			file_exists($middleavatarfile) && unlink($middleavatarfile);
			file_exists($smallavatarfile) && unlink($smallavatarfile);
			$success = 0;
		}

		// É¾³ýÁÙÊ±´æ´¢µÄÍ¼Æ¬
		$tmpPath = $this->getBasePath() . "space" . DIRECTORY_SEPARATOR . "{$uid}";
		@unlink($tmpPath);

		return '<?xml version="1.0" ?><root><face success="' . $success . '"/></root>';
	}

	// ´Ó¿Í»§¶Ë·ÃÎÊÍ·ÏñÍ¼Æ¬µÄ url
	public function getAvatarUrl( $uid, $size='middle' )
	{
		return $this->getBaseUrl() . "../upload/space/{$uid}_{$size}.jpg";
	}

	// ´¦Àí HTTP Request
	// ·µ»ØÖµ£ºÈç¹ûÊÇ¿ÉÊ¶±ðµÄ request£¬´¦Àíºó·µ»Ø true£»·ñÔò·µ»Ø false¡£
	public function processRequest()
	{
		// ´Ó input ²ÎÊýÀï²ð½â³ö×Ô¶¨Òå²ÎÊý
		$arr = array();
		parse_str( $_GET['input'], $arr );
		$uid = intval($arr['uid']);

		if ( $_GET['a'] == 'uploadavatar') {

			// µÚÒ»²½£ºÉÏ´«Ô­Ê¼Í¼Æ¬ÎÄ¼þ
			echo $this->uploadAvatar( $uid );
			
			return true;

		} else if ( $_GET['a'] == 'rectavatar') {
		
			// µÚ¶þ²½£ºÉÏ´«·Ö¸îºóµÄÈý¸öÍ¼Æ¬Êý¾ÝÁ÷
			echo $this->rectAvatar( $uid );
			
			return true;
		}

		return false;
	}

	// ±à¼­Ò³ÃæÖÐ°üº¬ camera.swf µÄ HTML ´úÂë
	public function renderHtml( $uid )
	{
		// °ÑÐèÒª»Ø´«µÄ×Ô¶¨Òå²ÎÊý¶¼×é×°ÔÚ input Àï
		$input = urlencode( "uid={$uid}" );

		$baseUrl = $this->getBaseUrl();
		$uc_api = urlencode( $this->getThisUrl() );
		$urlCameraFlash = "{$baseUrl}camera.swf?ucapi={$uc_api}&input={$input}";
		$urlCameraFlash = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="447" height="477" id="mycamera" align="middle">
				<param name="allowScriptAccess" value="always" />
				<param name="scale" value="exactfit" />
				<param name="wmode" value="transparent" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#ffffff" />
				<param name="movie" value="'.$urlCameraFlash.'" />
				<param name="menu" value="false" />
				<embed src="'.$urlCameraFlash.'" quality="high" bgcolor="#ffffff" width="447" height="477" name="mycamera" align="middle" allowScriptAccess="always" allowFullScreen="false" scale="exactfit"  wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object>';
		return $urlCameraFlash;
	}
}

header("Expires: 0");
header("Cache-Control: private, post-check=0, pre-check=0, max-age=0", FALSE);
header("Pragma: no-cache");
header("Cache-Control:no-cache");



// ÏÔÊ¾±à¼­Ò³Ãæ£¬Ò³ÃæÖÐ°üº¬ camera.swf
$au = new AvatarUploader();
if ( $au->processRequest() ) {

			
	exit();
}

$uid = intval($space[uid]);
$urlAvatarBig    = $au->getAvatarUrl( $uid, 'big' );
$urlAvatarMiddle = $au->getAvatarUrl( $uid, 'middle' );
$urlAvatarSmall  = $au->getAvatarUrl( $uid, 'small' );
$urlCameraFlash = $au->renderHtml( $uid );
if($urlCameraFlash){
updatetable("spacefield", array('logourl'=>$urlAvatarBig,'smalllogourl'=>$urlAvatarMiddle ), array('uid'=>$uid));
}
include template("cp_profile");

?>
<script type="text/javascript">
function updateavatar() {
	window.location.reload();
}
</script>
