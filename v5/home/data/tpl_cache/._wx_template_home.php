<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/home', '1377578584', './wx/template/home');?><!DOCTYPE html>
<html>
<head>
  	 	<meta charset="utf-8" />
  	 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
<link rel = "stylesheet" type = "text/css" href = "./template/css/main.css" />
</head>
<body>
<div class = "banner_pic"><img src = "http://v5.home3d.cn/v5/v5/home/<?=$home1['imageurl']?>"/></div>
<div class = "banner_text">
<span><?=$home1['subject']?><span>
</div>
<div>
<ul class = "menu">
<?php if(is_array($zhongwei)) { foreach($zhongwei as $value) { ?>
<li>
<a href = "wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$value['english']?>"> 
<div>
<img class = "menu_item" src = "http://v5.home3d.cn/v5/v5/home/wx/template/img/<?=$value['icon']?>" />
<span><?=$value['subject']?></span>
<img class = "menu_arrow" src = "template/img/arrow_right.png" />
</div>
</a>
</li>
<?php } } ?>
        <?php if($zhongwei1) { ?>
        <?php if(is_array($zhongwei1)) { foreach($zhongwei1 as $value1) { ?>
        <li>
          <a href = "wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$value1['english']?>"> 
            <div>
              <img class = "menu_item" src = "http://v5.home3d.cn/v5/v5/home/wx/template/img/<?=$value1['icon']?>" />
              <span><?=$value1['subject']?></span>
              <img class = "menu_arrow" src = "template/img/arrow_right.png" />
            </div>
          </a>
        </li>
        <?php } } ?>
<?php } ?>
</ul>
</div>
</body>
</html><?php ob_out();?>