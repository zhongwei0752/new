<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_product.php 13208 2009-08-20 06:31:35Z liguode $
*/

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
		//showmessage($baseUrl);
		return $baseUrl;
	}

	// ÓÃÓÚ´æ´¢µÄ±¾µØÎÄ¼þ¼Ð£¨Î²²¿ÓÐÒ»¸ö DIRECTORY_SEPARATOR£©
	private function getBasePath()
	{
		$basePath = $_SERVER['SCRIPT_FILENAME'];
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
		$tmpPath = $this->getBasePath() . "../upload/space" . DIRECTORY_SEPARATOR . "{$uid}";
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
		$tmpUrl = $this->getBaseUrl() . "../upload/space/{$uid}";
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
		$bigavatarfile    = $this->getBasePath() . "../upload/space" . DIRECTORY_SEPARATOR . "{$uid}_big.jpg";
		$middleavatarfile = $this->getBasePath() . "../upload/space" . DIRECTORY_SEPARATOR . "{$uid}_middle.jpg";
		$smallavatarfile  = $this->getBasePath() . "../upload/space" . DIRECTORY_SEPARATOR . "{$uid}_small.jpg";
		
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
		$tmpPath = $this->getBasePath() . "../upload/space" . DIRECTORY_SEPARATOR . "{$uid}";
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

$uid = intval($_GET['uid']);
$urlAvatarBig    = $au->getAvatarUrl( $uid, 'big' );
$urlAvatarMiddle = $au->getAvatarUrl( $uid, 'middle' );
$urlAvatarSmall  = $au->getAvatarUrl( $uid, 'small' );
$urlCameraFlash = $au->renderHtml( $uid );
//include_once template("space_text1");
?>
<script type="text/javascript">
function updateavatar() {
	window.location.reload();
}
</script>