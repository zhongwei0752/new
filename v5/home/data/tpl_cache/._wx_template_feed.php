<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/feed', '1377579384', './wx/template/feed');?><!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
<link rel = "stylesheet" type = "text/css" href = "template/css/main.css">
<link rel="stylesheet" href="template/css/mobiscroll.custom-2.5.4.min.css">
<script src="js/jquery-v2.0.2.js"></script>
     	<script src="js/mobiscroll.custom-2.5.4.min.js"></script>
     	<script src="js/scrollbox.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    	<script src="template/js/mobiscroll.custom-2.5.4.min.js"></script>
     	<script src="template/js/js/jquery.query.js" type="text/javascript"></script>
     	<script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
     	<script type="text/javascript" src="template/js/feed.js"></script><!-- 时间选择插件 -->

     	<script id="detailTemplate" type="text/x-jquery-tmpl">
    	<li>
<a href = "wx.php?do=detail&id={{= <?=$_GET['idtype']?>id}}&uid={{= uid}}&idtype=<?=$_GET['idtype']?>id&type=<?=$_GET['idtype']?>&viewuid=1">
<div>
<img src = "{{= image1url}}" />
<h4>{{= subject}}</h4>
<span class = "info_span subtitle">{{= dateline}}</span>
</div>
</a>
</li>
</script>
</head>
<body> 
<div class = "navigation">
<span><?=$appname?></span>
<a href = "#" id = "show" class = "menu_btn"><img src = "./template/img/menu_btn.png" id = "show" /></a>
</div>
<ul class = "list">
<div id="detail-panel"></div>	
</ul>
<input type = "button"  onclick="getComment($('#idtype').val(), $('#uid').val(), $('#page').val(), $('#perpage').val());" value = "更多" class = "more_button"  />
 	<input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"/>
            <input type="hidden" id="idtype" name="idtype" value="<?=$_GET['idtype']?>"/>
            <input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
            <input type="hidden" id="page" name="page" value="2"/>
            <input type="hidden" id="perpage" name="perpage" value="4"/>
<div style = "display: none;">
<select name="" id="demo" class="f-dd">
<option value="wx.php?do=home&uid=<?=$_GET['uid']?>">首页</option>
    <?php if(is_array($zhongwei)) { foreach($zhongwei as $value) { ?>
                <option value="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$value['english']?>"><?=$value['subject']?></option>
                <?php } } ?>
</select>
</div>
</body>
</html><?php ob_out();?>