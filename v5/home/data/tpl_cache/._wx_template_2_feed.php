<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/2/feed', '1375238994', './wx/template/2/feed');?><!DOCTYPE html>
<html>
<head>
<title><?=$appname?></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
<link rel="stylesheet" href="template/2/css/mobiscroll.custom-2.5.4.min.css" /> <!-- 插件所需 --> 
<script type="text/javascript" src="template/2/js/jquery-v2.0.2.js"></script> <!-- select插件要先load jQuery --> 
<script type="text/javascript" src="template/2/js/mobiscroll.custom-2.5.4.min.js"></script> <!-- 插件所需 --> 
<link rel="stylesheet" type="text/css" href="template/2/css/info.css" />
<script type="text/javascript" src="template/2/js/myAll.js"></script>
<script src="template/js/js/jquery.query.js" type="text/javascript"></script>
     <script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
     <script type="text/javascript" src="template/js/feed.js"></script>
<script type="text/javascript">
$(function() {
$('#nav').mobiscroll().select( {
theme: 'android-ics',
lang: 'zh',
display: 'bottom',
mode: 'scroller',
inputClass: 'i-txt',
width: 200
});
$('#show').click(function() {
$('#nav').mobiscroll('show');
return false;
});

$('#clearSelect').click(function() {
$('#nav').val(1).change();
$('#nav'+'_dummy').val(' ');
return false;
});
});
</script>
<script id="detailTemplate" type="text/x-jquery-tmpl">
    <a href="wx.php?do=detail&id={{= <?=$_GET['idtype']?>id}}&uid={{= uid}}&idtype=<?=$_GET['idtype']?>id&type=<?=$_GET['idtype']?>&moblieclicknum=<?=$bac['moblieclicknum']?>">
<table>
<tr>
<td class="info_img">
<img src="{{= image1url}}" alt="" />
</td>
<td class="info_text">
<div class="list_item_text">
<span class="list_item_title">{{= subject}}</span>
<br />
<span class="list_item_time">{{= dateline}}</span>
</div>
</td>
</tr>
</table><!-- one -->
</a>


<div class="split">
<br />
</div>
  
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#nav'+'_dummy').hide();
});
</script>
</head>

<body>
<div data-role="page">
<header data-role="header" data-tag-toggle="false" data-theme="none">
</header>

<div data-role="content">
<div class="tag_menu">
<a href="#" id="show"><img src="template/2/img/tag_menu.png" alt="menu tag" id="tag_menu"
 onmouseover="showMenu()" onmouseout="tagUp()" />
</div><!-- tag_menu -->

<div class="info_list_table">
<div id="detail-panel"></div>

 
 <a href="#" class="more_btn_link">
             <a href="javascript:;" class="more_btn"   onclick="getComment($('#idtype').val(), $('#uid').val(), $('#page').val(), $('#perpage').val());" id="colorButton" style="text-align:center;"> <div class="more_btn" >
                更多
              </div></a>



           </a>
            <input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"/>
            <input type="hidden" id="idtype" name="idtype" value="<?=$_GET['idtype']?>"/>
            <input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
            <input type="hidden" id="page" name="page" value="2"/>
            <input type="hidden" id="perpage" name="perpage" value="4"/>

            <select name="navigation" id="nav" class="f-dd" onchange="top.location=this.value;" >
                <option value="wx.php?do=home&uid=<?=$_GET['uid']?>">首页</option>
              <?php if(is_array($zhongwei)) { foreach($zhongwei as $value) { ?>
                <option value="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$value['english']?>"><?=$value['subject']?></option>
                <?php } } ?>
            </select>


<div class="split">
<br />
</div>
</div><!-- content -->
</div><!-- page -->
</body>
</html>
<?php ob_out();?>