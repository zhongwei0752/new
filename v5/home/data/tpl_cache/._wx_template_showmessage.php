<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/showmessage', '1377589808', './wx/template/showmessage');?><!DOCTYPE html> 
<html> 
<head> 
   <meta name="viewport" content="width=device-width,initial-scale=1" />   
   <meta http-equiv="content-type"content="text/html; charset=UTF-8"/> 
   <title>betit</title> 

   <link rel="stylesheet" href="template/css/jquery.mobile-1.2.0.min.css" />
    <link rel="stylesheet" href="template/css/jquery.css" />
      <link rel="stylesheet" type="text/css" href="template/css/www.css">
   <link rel="stylesheet" href="template/css/jquery-mobile-fluid960.min.css"> 
   <script src="template/js/jquery-1.8.2.min.js"></script>
   <script src="template/js/jquery.mobile-1.2.0.min.js"></script>
   <script src="template/js/less.js" type="text/javascript"></script>
   <style type="text/css">
        
   </style>
</head>
<body>
    <div data-role="page" data-theme="none" data-fullscreen="true" class="bet_bg">
       <div data-role="header">

           <div class="head-nav" data-role="navbar">
                <ul>
                    <li class="logo"><a href="wx.php?do=index" rel="external" data-role="button" class="ui-control-inactive"style="height:72px;"><img src="template/css/images/img/logo.png"></a></li>
                   <li><a href="wx.php?do=index" data-role="button" rel="external" style="background:url(template/css/images/img/btn_bottom.png)bottom repeat-x"><img src="template/css/images/img/bet2.png"></a></li>
                   <li><a href="wx.php?do=billboard" rel="external" data-role="button" class="ui-control-inactive"><img src="template/css/images/img/billboard.png"></a></li>
                   <li><a href="wx.php?do=login" rel="external" data-role="button" class="ui-control-inactive"><img src="template/css/images/img/login.png"></a></li>
                </ul>
           </div><!-- 头部导航栏 -->
      </div>
      <div data-role="content">
          <div class="tips">
        <p><?=$message?></p>
        <p class="op">
        <?php if($url_forward) { ?>
          <a href="<?=$url_forward?>">页面跳转中...</a>
        <?php } else { ?>
          <a href="javascript:history.go(-1);">返回上一页</a> | 
          <a href="wx.php?do=feed&wxkey=<?=$_GET['wxkey']?>">返回首页</a>
        <?php } ?>
        </p>
      </div>

    </div>
      </div>
    </body>
    </html><?php ob_out();?>