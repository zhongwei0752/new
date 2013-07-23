<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/home', '1374478307', './wx/template/home');?><!DOCTYPE html>
<html>
  <head>
  	 <title></title>
  	 <meta charset="utf-8">
  	 <meta name="viewport" content="width=device-width, initial-scale=1">
  	 <link rel="stylesheet" type="text/css" href="template/css/style.css">
  	<!--  <link rel="stylesheet" href="css/jquery.mobile-1.3.1.min.css">
  	 
  	 <script src="js/jquery-v2.0.2.js"></script>
  	 <script type="text/javascript">
        $(document).bind("mobileinit", function() {
// disable ajax nav,全局的禁止ajax跳转;所有的初始化的设置都需要放在jquery.mobile-xxx.min.js引入之前
$.mobile.ajaxEnabled=false
});
  	 </script>
  	 <script src="js/jquery.mobile-1.3.1.min.js"></script>
  	 <script type="text/javascript">
  	   $.mobile.buttonMarkup.hoverDelay = "false";
  	 </script><!-- 按钮按下/划过的状态感觉反应有些迟缓 --> 
     
  </head>

  <body>
    <div data-role="page">
        <header data-role="header" data-tap-toggle="false" data-theme="none"></header><!-- header end -->
        <div data-role="content">
             <div class="banner_pic">
                <img src="http://v5.home3d.cn/v5/v5/home/<?=$god['logourl']?>">
             </div>
             <div class="banner_text">
                 <span><?=$name?></span>
             </div>
             <div class="menu_wrapper">
              <?php if(is_array($zhongwei)) { foreach($zhongwei as $value) { ?>
              <a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$value['english']?>">
             	<table class="menu">
                   <tr>
                       <td class="menu_icon">
                           <img src="http://v5.home3d.cn/v5/v5/home/<?=$value['image1url']?>">
                       </td>
                       <td><?=$value['subject']?></td>
                       <td>
                          <img src="template/img/arrow_right.png" class="arrow">
                       </td>
                   </tr>
             	</table>
              </a>
             	 <div class="split"></div><!-- 第一个menu END -->
               <?php } } ?>
            
             
             </div>
        </div>
        <footer data-role="footer" data-tap-toggle="false" data-theme="none"></footer>
    </div>
    
  </body>
</html><?php ob_out();?>