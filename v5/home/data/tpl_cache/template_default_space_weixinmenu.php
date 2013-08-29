<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/space_weixinmenu|template/default/header|template/default/footer|template/default/footer', '1377768986', 'template/default/space_weixinmenu');?><!DOCTYPE html>
<html>
  <head>
    <title>v5v5v5v5</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <?php if(empty($_SGLOBAL['inajax'])) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?=$_SC['charset']?>" />
<meta http-equiv="x-ua-compatible" content="ie=7"/>
<title><?php if($_TPL['titles']) { ?><?php if(is_array($_TPL['titles'])) { foreach($_TPL['titles'] as $value) { ?><?php if($value) { ?><?=$value?> - <?php } ?><?php } } ?><?php } ?><?php if($_SN[$space['uid']]) { ?><?=$_SN[$space['uid']]?> - <?php } ?><?=$_SCONFIG['sitename']?> - Powered by UCenter Home</title>
 <script src="./source/jquery.js"></script>
 <script src="./source/back_top.js" ></script>
<script language="javascript" type="text/javascript" src="source/script_cookie.js"></script>
<script language="javascript" type="text/javascript" src="source/script_common.js"></script>
<script language="javascript" type="text/javascript" src="source/script_menu.js"></script>
<script language="javascript" type="text/javascript" src="source/script_ajax.js"></script>
<script language="javascript" type="text/javascript" src="source/script_face.js"></script>
<script language="javascript" type="text/javascript" src="source/script_manage.js"></script>


 <!-- Bootstrap -->
   <!--  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
<link rel="stylesheet" type="text/css" href="template/default/jquery-mobile-fluid960.min.css">
<link rel="stylesheet" type="text/css" href="template/default/style1.css">

<style type="text/css">

@import url(template/default/network.css);
@import url(template/default/style.css);
<?php if($_TPL['css']) { ?>
@import url(template/default/<?=$_TPL['css']?>.css);
<?php } ?>
<?php if(!empty($_SGLOBAL['space_theme'])) { ?>
@import url(theme/<?=$_SGLOBAL['space_theme']?>/style.css);
<?php } elseif($_SCONFIG['template'] != 'default') { ?>
@import url(template/<?=$_SCONFIG['template']?>/style.css);
<?php } ?>
<?php if(!empty($_SGLOBAL['space_css'])) { ?>
<?=$_SGLOBAL['space_css']?>
<?php } ?>
</style>
<link rel="shortcut icon" href="image/favicon.ico" />
<link rel="edituri" type="application/rsd+xml" title="rsd" href="xmlrpc.php?rsd=<?=$space['uid']?>" />
</head>
<body>

<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="header">
<?php if($_SGLOBAL['ad']['header']) { ?><div id="ad_header"><?php adshow('header'); ?></div><?php } ?>
 <div class="wrapper">
 <div class="navbar">
            <div class="navbar-inner container_36">
                
                <a class="logo grid_1" href="space.php?do=home"><img src="./template/default/image/logo.png"></a>
                <?php if($_SGLOBAL['supe_uid']) { ?>
                <a href="space.php?do=home" class="grid_2"><?php if($_GET['do']=="home") { ?><p class="nav_actived">首页</p> <?php } else { ?>首页<?php } ?></a>
                

                <?php } else { ?>
                 <a href="index.php" class="grid_2">首页</a>
                <?php } ?>
                <?php if($_SGLOBAL['supe_uid']) { ?>	
                <?php if($space['pmnum']) { ?>
<?php if($space['pmnum']) { ?><a class="grid_2" href="space.php?do=pm&filter=newpm"><p>短消息</p><a href="space.php?do=pm" alt="短消息"><div class="message_pawpaw"><?=$space['pmnum']?></div></a><?php } ?>
                 <?php } else { ?>
                <a class="grid_2" href="space.php?do=pm<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?>&filter=newpm<?php } ?>"><?php if($_GET['do']=="pm") { ?><p class="nav_actived">消息</p> <?php } else { ?>消息<?php } ?></a>

<?php } ?>
<a href="space.php?do=friend" class="grid_2"><?php if($_GET['do']=="friend") { ?><p class="nav_actived">客户列表</p> <?php } else { ?>客户列表<?php } ?></a>
<?php } else { ?>
<div class="grid_3" style="width:400px;display:inline-block;"></div>
<?php } ?>

                <?php if($_SGLOBAL['supe_uid']) { ?>
               
                <div class="grid_3"></div>
                <div class="grid_4">
                   <a href="cp.php?ac=profile"  style="float:left;padding-right:10px;"><?php echo avatar($_SGLOBAL[supe_uid]); ?></a>
                   <span class="company_name"><?=$_SN[$_SGLOBAL['supe_uid']]?></span><br/>
                   <a href="cp.php" class="header_btn setting_btn">设置</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="cp.php?ac=common&op=logout&uhash=<?=$_SGLOBAL['uhash']?>"  class="header_btn quit_btn">退出</a> 
                </div>
         <?php } else { ?>
<div class="grid_7"></div>

                <div class="grid_4">
                   <a href="do.php?ac=<?=$_SCONFIG['register_action']?>"  style="float:left;padding-right:10px;"><?php echo avatar($_SGLOBAL[supe_uid]); ?></a>
                   <span class="company_name">欢迎您</span><br/>
                   <a href="do.php?ac=<?=$_SCONFIG['login_action']?>" class="header_btn setting_btn">登录</a> &nbsp;&nbsp;&nbsp;&nbsp;<a href="do.php?ac=<?=$_SCONFIG['register_action']?>"  class="header_btn quit_btn">注册</a> 
                </div>
<?php } ?>
  </div>
         </div>


<div id="wrap" style="width:1024px;">

<div>
<div id="main">

<?php if(empty($_TPL['nosidebar'])) { ?>

<?php if($zhong1) { ?>
<div id="app_sidebar">


<?php if($_SGLOBAL['supe_uid']) { ?>

<div class="side_bar" >
              <div class="side_bar_inner" >
                    <ul>
                        <li class="side_header"><span class="title">基本组件</span><a href="space.php?do=menuset&view=me" class="manage_btn">管理</a></li>
  						
                        <?php if(is_array($zhongwei)) { foreach($zhongwei as $value) { ?>
 <?php if($value['english']==$_GET['do']||$value['english']==$_GET['ac']) { ?><li class="actived"><?php } else { ?><li class="side_option"><?php } ?><a href="<?=$value['url']?>"><?=$value['subject']?></a></li>
<?php } } ?>

                       <!-- <li class="side_option actived"><a href="">企业介绍</a></li>-->
                       
                        <li class="side_header"><span class="title">高级组件</span><a href="space.php?do=menuset&view=me" class="manage_btn">管理</a></li>
                        <?php if(is_array($zhongwei1)) { foreach($zhongwei1 as $value) { ?>
 <?php if($value['english']==$_GET['do']||$value['english']==$_GET['ac']) { ?><li class="actived"><?php } else { ?><li class="side_option"><?php } ?><a href="<?=$value['url']?>"><?=$value['subject']?></a></li>
<?php } } ?>
<!--                         <li class="side_option"><a href="">客户管理</a></li>
                        <li class="side_option"><a href="space.php?do=goods&view=me">商品管理</a></li>
                        <li class="side_option"><a href="">订单管理</a></li>
                        <li class="side_option"><a href="space.php?do=book">预约预定管理</a></li>
                        <li class="side_option"><a href="space.php?do=recommend&view=me">焦点推荐</a></li>
                        <li class="side_option"><a href="">群发</a></li>
                        <li class="side_option"><a href="space.php?do=moblie&view=all">选择手机模板</a></li> -->
                    </ul>
              </div>
         </div>

<!--<div class="app_m">
<ul>
<?php if($_SN[$_SGLOBAL['supe_uid']]=="admin") { ?>
<!--<li><img src="image/app_add.gif"><a href="cp.php?ac=menuset" class="addApp">添加应用</a></li>
<?php } ?>
<!--<li><img src="image/app_set.gif"><a href="space.php?do=menuset&view=me" class="myApp">管理应用</a></li>
</ul>
</div>-->

<?php } else { ?>
<div class="bar_text">
<form id="loginform" name="loginform" action="do.php?ac=<?=$_SCONFIG['login_action']?>&ref" method="post">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<p class="title">登录站点</p>
<p>用户名</p>
<p><input type="text" name="username" id="username" class="t_input" size="15" value="" /></p>
<p>密码</p>
<p><input type="password" name="password" id="password" class="t_input" size="15" value="" /></p>
<p><input type="checkbox" id="cookietime" name="cookietime" value="315360000" checked /><label for="cookietime">记住我</label></p>
<p>
<input type="submit" id="loginsubmit" name="loginsubmit" value="登录" class="submit" />
<input type="button" name="regbutton" value="注册" class="button" onclick="urlto('do.php?ac=<?=$_SCONFIG['register_action']?>');">
</p>
</form>
</div>
<?php } ?>

</div>
<?php } ?>
<div id="mainarea" style="margin-left:10px;margin-top:10px;width:800px;">

<?php if($_SGLOBAL['ad']['contenttop']) { ?><div id="ad_contenttop"><?php adshow('contenttop'); ?></div><?php } ?>
<?php } ?>

<?php } ?>

   <!--  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <link rel="stylesheet" type="text/css" href="./template/default/jquery-mobile-fluid960.min.css">
    <link rel="stylesheet" type="text/css" href="./template/default/style1.css">
    <link rel="stylesheet" type="text/css" href="./template/default/weixin.css">
  </head>
  <body>
    
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
          <script type='text/javascript' src='./source/jquery.simplemodal.js'></script>
          <script type="text/javascript">
          $(document).ready(function(){
            $('#weixin').attr("style", "display:none;");
            $('#weixinhome').click(function (e) {
                $("#what").append("<input type='hidden' name='type' value='frist' id='type'>");
                e.preventDefault();
                $('#weixin').modal();
                   });        
            $('#weixinhome1').click(function (e) {
                $("#what").append("<input type='hidden' name='type' value='second' id='type'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome2').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function5' id='button'><input type='hidden' name='fathernum' value='1' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome3').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function4' id='button'><input type='hidden' name='fathernum' value='1' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   }); 
            $('#weixinhome4').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function3' id='button'><input type='hidden' name='fathernum' value='1' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome5').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function2' id='button'><input type='hidden' name='fathernum' value='1' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome6').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function1' id='button'><input type='hidden' name='fathernum' value='1' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome7').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function5' id='button'><input type='hidden' name='fathernum' value='2' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome8').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function4' id='button'><input type='hidden' name='fathernum' value='2' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome9').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function3' id='button'><input type='hidden' name='fathernum' value='2' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome10').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function2' id='button'><input type='hidden' name='fathernum' value='2' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome11').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function1' id='button'><input type='hidden' name='fathernum' value='2' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome12').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function5' id='button'><input type='hidden' name='fathernum' value='3' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome13').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function4' id='button'><input type='hidden' name='fathernum' value='3' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome14').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function3' id='button'><input type='hidden' name='fathernum' value='3' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome15').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function2' id='button'><input type='hidden' name='fathernum' value='3' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome16').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='sub_function1' id='button'><input type='hidden' name='fathernum' value='3' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome17').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='function' id='button'><input type='hidden' name='fathernum' value='3' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome18').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='function' id='button'><input type='hidden' name='fathernum' value='3' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });
            $('#weixinhome19').click(function (e) {
                $("#what").append("<input type='hidden' name='button' value='function' id='button'><input type='hidden' name='fathernum' value='3' id='fathernum'>");
                e.preventDefault();
                $('#weixin').modal();
                   });                              
                   })
          </script>
         <script type="text/javascript">  
  
$(document).ready(function() {  
  //get provinces  
  $.get("./source/space_text1.php", {category:'province'},  
    function(data) {  
      $('#province').html(data);  
  });  
  
  //get citys  
  $.get("./source/space_text1.php", {category:'city'},  
    function(data) {  
      $('#city').html(data);  
    });  
  
    //province onchange  
    $('#province').change(function() {  
      var province = $(this).val();
      
      $.get("./source/space_text1.php", {category:'city',uid:<?=$space['uid']?>, province:province}, function(data) {  
        $('#city').html(data);  
      });  
    });  
  
});  
  
</script> 
         <!-- navbar end -->
        
          <!-- side_bar end -->

            <div class="content" style="width:760px;">
                 <div class="content" style="font-size:15px;width:760px;">
          
                 <div class="indexing">
                 <span><a href="space.php?do=home">首页</a></span>><span>微信自定义菜单</span>
                 </div><!-- end -->
                 <div class="bread container_12">
                     <div class="bread_actived grid_1">
                         微信自定义菜单
                     </div>
                     <a href="cp.php?ac=weixinmenu" class="btn grid_2">生成菜单</a>
                     <a href="space.php?do=weixinmenu&edit=1" class="btn grid_2">修改</a>
                 </div> 
                <?php if(empty($list)) { ?>
                 <div class="content_detail_wrapper">
                   <form method="post" action="space.php?do=weixinmenu" onkeydown="if(event.keyCode==13){return false;}">
                     <div class="left_weixin">
                        <div class="weixin_header">
                            <img src="./template/default/image/wx_header.png" alt="">
                        </div>
                        <div class="wx_body">  
                          <div class="weixin_choose">
                              <div class="wx_choose_img">
                                    <span>点击添加图片</span>
                                    <input type="file">
                              </div> 
                              
                              <input type="text" class="input_text" value="输入欢迎语" onFocus="this.value=''">
                             
                              <div class="article_choose" id="weixinhome">
                                 <span>点击选择文章</span>
                                 <img src="./template/default/image/avata1.png" alt="">
                              </div>
                                 <div class="article_choose" id="weixinhome1">
                                 <span>点击选择文章</span>
                                 <img src="./template/default/image/avata1.png" alt="">
                              </div>

                          </div>
                              <div class="erji_box_wrap">
                           <ul style="" class="erji_box" tag="1">
                                <li></li>
                                
                                <li></li>
                                <li></li>
                              <li><img src="./template/default/image/erji_add.png" class="add"></li>
                              <li><input type="text" class="erji_input" name="1sub_button1"   placeholder="请填写"/></li>
                          </ul>
                          </div>
                            <div class="erji_box_wrap">
                           <ul style="" class="erji_box" tag="2">
                                
                                <li></li>
                                <li></li>
                                <li></li>
                              <li><img src="./template/default/image/erji_add.png" class="add1"></li>
                              <li><input type="text" class="erji_input" name="2sub_button1"  placeholder="请填写"/></li>
                          </ul>
                          </div>
                          <div class="erji_box_wrap">
                           <ul style="" class="erji_box" tag="3">
                                
                                <li></li>
                                <li></li>
                                <li></li>
                              <li><img src="./template/default/image/erji_add.png" class="add2"></li>
                              <li><input type="text" class="erji_input" name="3sub_button1"  placeholder="请填写"/></li>
                          </ul>
                          </div>
                          <div class="clear"></div>
                          <div style="display:inline;">
                          <ul class="erji_menu_tips">
                                  <li><a href="javascript:;"><img src="./template/default/image/erji_menu.png" alt="" tag="1" class="tip_img"></a></li>
                                  <li><a href="javascript:;"><img src="./template/default/image/erji_menu.png" alt="" tag="2" class="tip_img"></a></li>
                                  <li><a href="javascript:;"><img src="./template/default/image/erji_menu.png" alt="" tag="3" class="tip_img"></a></li>
                          </ul>
                          
                          </div>
                        </div>
                          <div class="wx_nav">
                                <ul>
                                  <li style="border-left:1px solid #CCCCCC;"><input type="text" name="button1" placeholder="请填写" tag="1"  class="first_menu"><div id="weixinhome17" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                                  <li><input type="text" placeholder="请填写" name="button2"  tag="2" class="first_menu"><div id="weixinhome18" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                                  <li><input type="text" placeholder="请填写" tag="3"  name="button3" class="first_menu"><div id="weixinhome19" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                                </ul>
                          </div>

                     </div>
                     <div class="wx_notice_text">
                      <h3>注意事项</h3>
                      <ol>
                        <li>顶部是初次使用的推送文章</li>
                        <li> 底部是微信一级菜单和二级菜单, 一级菜单填写完成后才能继续二级菜单填写</li>
                        <li>微信自定义菜单填写完成后, 您的公众帐号出现一样的自定义内容</li>
                      </ol>
                     </div>
                          <input type="submit" class="btn grid_2">
                          <input type="hidden" name="fristsubmit" value="1">
                        
                  </form>
                 </div><!-- content_detail_wrapper end -->
            
            </div>
              
          </div><!-- content_wrapper end -->
    </div><!-- wrraper end -->

   <?php if(empty($_SGLOBAL['inajax'])) { ?>
<?php if(empty($_TPL['nosidebar'])) { ?>
<?php if($_SGLOBAL['ad']['contentbottom']) { ?><br style="line-height:0;clear:both;"/><div id="ad_contentbottom"><?php adshow('contentbottom'); ?></div><?php } ?>
</div>

<!--/mainarea-->
<?php if($zhong1) { ?>
<div id="bottom"></div>
<?php } ?>
</div>
<!--/main-->
<?php } ?>
    </div>
    </div>
      <div id="backtop">
    	<a href="">
    		<img src="./template/default/image/back_top.png">
    	</a>
    </div>
        </div>
<div class="footer">

        <div class="footer_map container_12">
           <ul class="grid_3">
                <li class="map_title"><img src="./template/default/image/ff.png">使用帮助:</li>
                <li><a href="">开通流程</a></li>
                <li><a href="">管理员手册</a></li>
                <li><a href="">用户手册</a></li>
           </ul>

            <ul class="grid_3">
                <li class="map_title"><img src="./template/default/image/ff.png">投诉与建议:</li>
                <li><a href="">在线客服</a></li>
                <li><a href="">留言板</a></li>
           </ul>

            <ul class="grid_3">
                <li class="map_title"><img src="./template/default/image/ff.png"><span>合作:</span></li>
                <li><a href="">品牌企业合作</a></li>
                <li><a href="">媒体合作</a></li>
                <li><a href="">收费细节</a></li>
           </ul>

            <ul class="grid_3">
                <li class="map_title"><img src="./template/default/image/ff.png">关于我们:</li>
                <li><a href="">企业介绍</a></li>
                <li><a href="">联系方式</a></li>
                <li><a href="">人才招聘</a></li>
           </ul>
          
        </div><!-- map end -->
        <div class="footer_info">
             版权所有：广州市宏门网络科技有限公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ICP:&nbsp;&nbsp; 粤ICP备08132436号
            


    </div>

</div>
<!--/wrap-->

    <!--<script src="js/bootstrap.min.js"></script>-->
<?php if($_SGLOBAL['appmenu']) { ?>
<ul id="ucappmenu_menu" class="dropmenu_drop" style="display:none;">
<li><a href="<?=$_SGLOBAL['appmenu']['url']?>" title="<?=$_SGLOBAL['appmenu']['name']?>" target="_blank"><?=$_SGLOBAL['appmenu']['name']?></a></li>
<?php if(is_array($_SGLOBAL['appmenus'])) { foreach($_SGLOBAL['appmenus'] as $value) { ?>
<li><a href="<?=$value['url']?>" title="<?=$value['name']?>" target="_blank"><?=$value['name']?></a></li>
<?php } } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['supe_uid']) { ?>
<ul id="membernotemenu_menu" class="dropmenu_drop" style="display:none;">
<?php $member = $_SGLOBAL['member']; ?>
<?php if($member['notenum']) { ?><li><img src="image/icon/notice.gif" width="16" alt="" /> <a href="space.php?do=notice"><strong><?=$member['notenum']?></strong> 个新通知</a></li><?php } ?>
<?php if($member['pokenum']) { ?><li><img src="image/icon/poke.gif" alt="" /> <a href="cp.php?ac=poke"><strong><?=$member['pokenum']?></strong> 个新招呼</a></li><?php } ?>
<?php if($member['addfriendnum']) { ?><li><img src="image/icon/friend.gif" alt="" /> <a href="cp.php?ac=friend&op=request"><strong><?=$member['addfriendnum']?></strong> 个好友请求</a></li><?php } ?>
<?php if($member['mtaginvitenum']) { ?><li><img src="image/icon/mtag.gif" alt="" /> <a href="cp.php?ac=mtag&op=mtaginvite"><strong><?=$member['mtaginvitenum']?></strong> 个群组邀请</a></li><?php } ?>
<?php if($member['eventinvitenum']) { ?><li><img src="image/icon/event.gif" alt="" /> <a href="cp.php?ac=event&op=eventinvite"><strong><?=$member['eventinvitenum']?></strong> 个活动邀请</a></li><?php } ?>
<?php if($member['myinvitenum']) { ?><li><img src="image/icon/userapp.gif" alt="" /> <a href="space.php?do=notice&view=userapp"><strong><?=$member['myinvitenum']?></strong> 个应用消息</a></li><?php } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['supe_uid']) { ?>
<?php if(!isset($_SCOOKIE['checkpm'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=pm&op=checknewpm&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php if(!isset($_SCOOKIE['synfriend'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=friend&op=syn&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php } ?>
<?php if(!isset($_SCOOKIE['sendmail'])) { ?>
<script language="javascript"  type="text/javascript" src="do.php?ac=sendmail&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>

<?php if($_SGLOBAL['ad']['couplet']) { ?>
<script language="javascript" type="text/javascript" src="source/script_couplet.js"></script>
<div id="uch_couplet" style="z-index: 10; position: absolute; display:none">
<div id="couplet_left" style="position: absolute; left: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<div id="couplet_rigth" style="position: absolute; right: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<script type="text/javascript">
lsfloatdiv('uch_couplet', 0, 0, '', 0).floatIt();
</script>
</div>
<?php } ?>
<?php if($_SCOOKIE['reward_log']) { ?>
<script type="text/javascript">
showreward();
</script>
<?php } ?>
</body>
</html>
<?php } ?>

    <script src="./source/placeholder.js"></script>
    <script type="text/javascript">
         $(document).ready(function(){
          $(".erji_box").hide();
           $(".first_menu").blur(
            
               function(){
                // var ke=$(this).val();
                // alert(ke);
                 if($(this).val()!="" && $(this).val()!="请填写"){
                   var q=$(this).attr("tag");
                  
                   
                  if($(".erji_box[tag=" + q + "]").is(":hidden")){
                    $("img[tag=" + q + "]").show();
                  }

                 }
                 
                  
               }             
            );
           $(".first_menu").keydown(function(){
              if(event.keyCode == 13){
                  var q=$(this).attr("tag");
                  $("img[tag=" + q + "]").show();                  
                 }
               });
            
            // 回车事件
            $(".tip_img").click(function(){
              var r=$(this).attr("tag");
              $(this).parent().hide();
              // var new_r=r+""；
              $(".erji_box[tag=" + r + "]").show();
              $(".erji_box[tag=" + r + "]").children().children(".add").hide();
              $(this).parent().parent().css({"position":"relative","z-index":"1"});
            });


             $(".erji_input").bind("blur keydown",function(){
              if(event.keyCode == 13){
                var that=$(this);
              if ($(this).val()!="") {
                $(this).parent().siblings().children(".add").show()
              };
              }
             })
          
            var a=1; 
            $(".add").click(
                function(){
                  var that=$(this);
                  var placeholder_val=$(this).parent().next().children("input").val();
                  // alert(placeholder_val);
                  a++;
                   if(placeholder_val!="" && placeholder_val!="请填写"){
                    if ($(this).parent("li").siblings().children(".add_input").length<4){
                        $(this).parent().prev("li").remove();
                        $(this).parent().after("<li><input type='text' name='1sub_button"+a+"' placeholder='请填写' class='add_input'></li>");
                         if ($(this).parent("li").siblings().children(".add_input").length==4){
                           $(this).parent().parent().parent().attr("style","margin-top:-40px;");
                             $(this).hide(); 
                     }
                    }

                            $(".add_input").bind("blur keydown",function(){
                              if(event.keyCode == 13){
                                  var that=$(this);
                    if (that.val()!="" && that.parent().siblings().children(".add_input").length<3) {
                      that.parent().siblings().children(".add").show()
                      
                    }
                    
                    if(that.val()==""){
                      that.remove();
                      
                    }
                              }
                            })
                   } 
                   that.hide();  
                }
              );
              var b=1;
               $(".add1").click(
                function(){
                  var that=$(this);
                  var placeholder_val=$(this).parent().next().children("input").val();
                  // alert(placeholder_val);
                   if(placeholder_val!="" && placeholder_val!="请填写"){
                    if ($(this).parent("li").siblings().children(".add_input").length<4){
                        $(this).parent().prev("li").remove();
                        $(this).parent().after("<li><input type='text' placeholder='请填写'  name='2sub_button"+b+"' class='add_input'></li>");
                         if ($(this).parent("li").siblings().children(".add_input").length==4){
                           $(this).parent().parent().parent().attr("style","margin-top:-40px;");
                             $(this).hide(); 
                     }
                    }

                            $(".add_input").bind("blur keydown",function(){
                              if(event.keyCode == 13){
                                  var that=$(this);
                    if (that.val()!="" && that.parent().siblings().children(".add_input").length<3) {
                      that.parent().siblings().children(".add1").show()
                      
                    }
                    
                    if(that.val()==""){
                      that.remove();
                      
                    }
                              }
                            })
                   } 
                   that.hide();  
                }
              );
              var c=1;
                 $(".add2").click(
                function(){
                  var that=$(this);
                  var placeholder_val=$(this).parent().next().children("input").val();
                  var dd="<?=$list['2']?>[sub_button"+c+"]";
                  // alert(placeholder_val);
                   if(placeholder_val!="" && placeholder_val!="请填写"){
                    if ($(this).parent("li").siblings().children(".add_input").length<4){
                        $(this).parent().prev("li").remove();
                        $(this).parent().after("<li><input type='text' placeholder='请填写'  name='3sub_button"+c+"' class='add_input'></li>");
                         if ($(this).parent("li").siblings().children(".add_input").length==4){
                           $(this).parent().parent().parent().attr("style","margin-top:-40px;");
                             $(this).hide(); 
                     }
                    }

                            $(".add_input").bind("blur keydown",function(){
                              if(event.keyCode == 13){
                                  var that=$(this);
                    if (that.val()!="" && that.parent().siblings().children(".add_input").length<3) {
                      that.parent().siblings().children(".add2").show()
                      
                    }
                    
                    if(that.val()==""){
                      that.remove();
                      
                    }
                              }
                            })
                   } 
                   that.hide();  
                }
              );

        })
    </script>
     <?php } else { ?>  
                          <div class="content_detail_wrapper">
                   <form method="post" action="space.php?do=weixinmenu" onkeydown="if(event.keyCode==13){return false;}">
                     <div class="left_weixin">
                        <div class="weixin_header">
                            <img src="./template/default/image/wx_header.png" alt="">
                        </div>
                        <div class="wx_body">  
                          <div class="weixin_choose">
                              <div class="wx_choose_img">
                                    <span>点击添加图片</span>
                                    <input type="file">
                              </div> 
                              
                              <input type="text" class="input_text" value="输入欢迎语" onFocus="this.value=''">
                             
                              <a href="#"><div class="article_choose" id="weixinhome">
                                 <span>点击选择文章</span>
                                 <img src="./template/default/image/avata1.png" alt="">
                              </div></a>
                                 <a href="#"><div class="article_choose" id="weixinhome1">
                                 <span>点击选择文章</span>
                                 <img src="./template/default/image/avata1.png" alt="">
                              </div></a>

                          </div>
                              <div class="erji_box_wrap">
                           <ul style="" class="erji_box" tag="1">
                              <li><input type="text" class="erji_input" name="1sub_button5" value="<?=$list['0']['sub_button5']?>"  placeholder="请填写"/><div id="weixinhome2" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>  
                              <li><input type="text" class="erji_input" name="1sub_button4" value="<?=$list['0']['sub_button4']?>"  placeholder="请填写"/><div id="weixinhome3" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                              <li><input type="text" class="erji_input" name="1sub_button3" value="<?=$list['0']['sub_button3']?>"  placeholder="请填写"/><div id="weixinhome4" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                              <li><input type="text" class="erji_input" name="1sub_button2" value="<?=$list['0']['sub_button2']?>"  placeholder="请填写"/><div id="weixinhome5" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                              <li><input type="text" class="erji_input" name="1sub_button1" value="<?=$list['0']['sub_button1']?>"  placeholder="请填写"/><div id="weixinhome6" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                          </ul>
                          </div>
                            <div class="erji_box_wrap">
                           <ul style="" class="erji_box" tag="2">
                                <li><input type="text" class="erji_input" name="2sub_button5" value="<?=$list['1']['sub_button5']?>" placeholder="请填写"/><div id="weixinhome7" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                                 <li><input type="text" class="erji_input" name="2sub_button4" value="<?=$list['1']['sub_button4']?>"  placeholder="请填写"/><div id="weixinhome8" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                                <li><input type="text" class="erji_input" name="2sub_button3" value="<?=$list['1']['sub_button3']?>"  placeholder="请填写"/><div id="weixinhome9" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                                <li><input type="text" class="erji_input" name="2sub_button2" value="<?=$list['1']['sub_button2']?>"  placeholder="请填写"/><div id="weixinhome10" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                                <li><input type='text' placeholder='请填写'  name='2sub_button1' class='add_input' value="<?=$list['1']['sub_button1']?>"><div id="weixinhome11" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                          </ul>
                          </div>
                          <div class="erji_box_wrap">
                           <ul style="" class="erji_box" tag="3">
                           <li><input type="text" class="erji_input" name="3sub_button5" value="<?=$list['2']['sub_button5']?>"  placeholder="请填写"/><div id="weixinhome12" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                           <li><input type="text" class="erji_input" name="3sub_button4" value="<?=$list['2']['sub_button4']?>"  placeholder="请填写"/><div id="weixinhome13" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                           <li><input type="text" class="erji_input" name="3sub_button3" value="<?=$list['2']['sub_button3']?>"  placeholder="请填写"/><div id="weixinhome14" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                            <li><input type="text" class="erji_input" name="3sub_button2" value="<?=$list['2']['sub_button2']?>"  placeholder="请填写"/><div id="weixinhome15" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                            <li><input type="text" class="erji_input" name="3sub_button1" value="<?=$list['2']['sub_button1']?>"  placeholder="请填写"/><div id="weixinhome16" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div></li>
                              
                                
                              
                              
                          </ul>
                          </div>
                          <div class="clear"></div>
                          <div style="display:inline;">
                          <ul class="erji_menu_tips">
                                  <li><a href="javascript:;"><img src="./template/default/image/erji_menu.png" alt="" tag="1" class="tip_img"></a></li>
                                  <li><a href="javascript:;"><img src="./template/default/image/erji_menu.png" alt="" tag="2" class="tip_img"></a></li>
                                  <li><a href="javascript:;"><img src="./template/default/image/erji_menu.png" alt="" tag="3" class="tip_img"></a></li>
                          </ul>
                          
                          </div>
                        </div>
                          <div class="wx_nav">
                                <ul>
                                  <li style="border-left:1px solid #CCCCCC;"><input type="text" name="button1" placeholder="请填写" tag="1" value="<?=$list['0']['button']?>" class="first_menu"><?php if(empty($list['0']['sub_button1'])) { ?><div id="weixinhome17" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div><?php } ?></li>

                                  <li><input type="text" placeholder="请填写" name="button2" value="<?=$list['1']['button']?>" tag="2" class="first_menu"><?php if(empty($list['1']['sub_button1'])) { ?><div id="weixinhome18" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div><?php } ?></li>
                                  <li><input type="text" placeholder="请填写" tag="3" value="<?=$list['2']['button']?>" name="button3" class="first_menu"><?php if(empty($list['2']['sub_button1'])) { ?><div id="weixinhome19" style="float: right;margin-left: 70px;margin-top: -45px;z-index: 999;position: absolute;"><img  src="./template/default/image/edit.png"></div><?php } ?></li>
                                </ul>
                          </div>

                     </div>
                     <div class="wx_notice_text">
                      <h3>注意事项</h3>
                      <ol>
                        <li>顶部是初次使用的推送文章</li>
                        <li> 底部是微信一级菜单和二级菜单, 一级菜单填写完成后才能继续二级菜单填写</li>
                        <li>微信自定义菜单填写完成后, 您的公众帐号出现一样的自定义内容</li>
                      </ol>
                     </div>
                          <input type="submit" style="margin-left:50px;" class="btn grid_2">
                          <input type="hidden" name="secondsubmit" value="1">
                        
                  </form>
                 </div><!-- content_detail_wrapper end -->
            
            </div>
              
          </div><!-- content_wrapper end -->
    </div><!-- wrraper end -->

   <?php if(empty($_SGLOBAL['inajax'])) { ?>
<?php if(empty($_TPL['nosidebar'])) { ?>
<?php if($_SGLOBAL['ad']['contentbottom']) { ?><br style="line-height:0;clear:both;"/><div id="ad_contentbottom"><?php adshow('contentbottom'); ?></div><?php } ?>
</div>

<!--/mainarea-->
<?php if($zhong1) { ?>
<div id="bottom"></div>
<?php } ?>
</div>
<!--/main-->
<?php } ?>
    </div>
    </div>
      <div id="backtop">
    	<a href="">
    		<img src="./template/default/image/back_top.png">
    	</a>
    </div>
        </div>
<div class="footer">

        <div class="footer_map container_12">
           <ul class="grid_3">
                <li class="map_title"><img src="./template/default/image/ff.png">使用帮助:</li>
                <li><a href="">开通流程</a></li>
                <li><a href="">管理员手册</a></li>
                <li><a href="">用户手册</a></li>
           </ul>

            <ul class="grid_3">
                <li class="map_title"><img src="./template/default/image/ff.png">投诉与建议:</li>
                <li><a href="">在线客服</a></li>
                <li><a href="">留言板</a></li>
           </ul>

            <ul class="grid_3">
                <li class="map_title"><img src="./template/default/image/ff.png"><span>合作:</span></li>
                <li><a href="">品牌企业合作</a></li>
                <li><a href="">媒体合作</a></li>
                <li><a href="">收费细节</a></li>
           </ul>

            <ul class="grid_3">
                <li class="map_title"><img src="./template/default/image/ff.png">关于我们:</li>
                <li><a href="">企业介绍</a></li>
                <li><a href="">联系方式</a></li>
                <li><a href="">人才招聘</a></li>
           </ul>
          
        </div><!-- map end -->
        <div class="footer_info">
             版权所有：广州市宏门网络科技有限公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ICP:&nbsp;&nbsp; 粤ICP备08132436号
            


    </div>

</div>
<!--/wrap-->

    <!--<script src="js/bootstrap.min.js"></script>-->
<?php if($_SGLOBAL['appmenu']) { ?>
<ul id="ucappmenu_menu" class="dropmenu_drop" style="display:none;">
<li><a href="<?=$_SGLOBAL['appmenu']['url']?>" title="<?=$_SGLOBAL['appmenu']['name']?>" target="_blank"><?=$_SGLOBAL['appmenu']['name']?></a></li>
<?php if(is_array($_SGLOBAL['appmenus'])) { foreach($_SGLOBAL['appmenus'] as $value) { ?>
<li><a href="<?=$value['url']?>" title="<?=$value['name']?>" target="_blank"><?=$value['name']?></a></li>
<?php } } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['supe_uid']) { ?>
<ul id="membernotemenu_menu" class="dropmenu_drop" style="display:none;">
<?php $member = $_SGLOBAL['member']; ?>
<?php if($member['notenum']) { ?><li><img src="image/icon/notice.gif" width="16" alt="" /> <a href="space.php?do=notice"><strong><?=$member['notenum']?></strong> 个新通知</a></li><?php } ?>
<?php if($member['pokenum']) { ?><li><img src="image/icon/poke.gif" alt="" /> <a href="cp.php?ac=poke"><strong><?=$member['pokenum']?></strong> 个新招呼</a></li><?php } ?>
<?php if($member['addfriendnum']) { ?><li><img src="image/icon/friend.gif" alt="" /> <a href="cp.php?ac=friend&op=request"><strong><?=$member['addfriendnum']?></strong> 个好友请求</a></li><?php } ?>
<?php if($member['mtaginvitenum']) { ?><li><img src="image/icon/mtag.gif" alt="" /> <a href="cp.php?ac=mtag&op=mtaginvite"><strong><?=$member['mtaginvitenum']?></strong> 个群组邀请</a></li><?php } ?>
<?php if($member['eventinvitenum']) { ?><li><img src="image/icon/event.gif" alt="" /> <a href="cp.php?ac=event&op=eventinvite"><strong><?=$member['eventinvitenum']?></strong> 个活动邀请</a></li><?php } ?>
<?php if($member['myinvitenum']) { ?><li><img src="image/icon/userapp.gif" alt="" /> <a href="space.php?do=notice&view=userapp"><strong><?=$member['myinvitenum']?></strong> 个应用消息</a></li><?php } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['supe_uid']) { ?>
<?php if(!isset($_SCOOKIE['checkpm'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=pm&op=checknewpm&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php if(!isset($_SCOOKIE['synfriend'])) { ?>
<script language="javascript"  type="text/javascript" src="cp.php?ac=friend&op=syn&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>
<?php } ?>
<?php if(!isset($_SCOOKIE['sendmail'])) { ?>
<script language="javascript"  type="text/javascript" src="do.php?ac=sendmail&rand=<?=$_SGLOBAL['timestamp']?>"></script>
<?php } ?>

<?php if($_SGLOBAL['ad']['couplet']) { ?>
<script language="javascript" type="text/javascript" src="source/script_couplet.js"></script>
<div id="uch_couplet" style="z-index: 10; position: absolute; display:none">
<div id="couplet_left" style="position: absolute; left: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<div id="couplet_rigth" style="position: absolute; right: 2px; top: 60px; overflow: hidden;">
<div style="position: relative; top: 25px; margin:0.5em;" onMouseOver="this.style.cursor='hand'" onClick="closeBanner('uch_couplet');"><img src="image/advclose.gif"></div>
<?php adshow('couplet'); ?>
</div>
<script type="text/javascript">
lsfloatdiv('uch_couplet', 0, 0, '', 0).floatIt();
</script>
</div>
<?php } ?>
<?php if($_SCOOKIE['reward_log']) { ?>
<script type="text/javascript">
showreward();
</script>
<?php } ?>
</body>
</html>
<?php } ?>
                              <script src="./source/placeholder.js"></script>
<!--   <script type="text/javascript">
         $(document).ready(function(){
    
          
            var a=<?=$count?>; 
            $(".erji_input").click(
                function(){
                  var that=$(this);
                  ++a;
   
                        $(this).parent().prev("li").remove();
                        $(this).parent().after("<li><input type='text' name='1sub_button"+a+"' placeholder='请填写' class='add_input'></li>");
                        
                           $(this).attr("style","margin-top:0px;");
                
                }
              );
             
        })
    </script>-->
      <?php } ?>
            <div id="weixin">
            <form action = "space.php?do=weixinmenu" method = "post" style="margin:0 auto;text-align:center;">
            <br/>
           <h3 style="font-size:20px;color:#44B1BA;margin-left:-10px;line-height:40px;">  
          <select name="province" id="province">  
            <option>选择组件</option>  
          </select>  
          <select name="city" id="city">  
            <option value='0'>选择文章</option>  
          </select>  
         </h3>
         <br/>
            <input type="submit" style="margin-left:250px;" class="btn grid_2" >
            <input type="hidden" name="functionweixin" value="1">
            <div id="what"></div>
            </form>
            </div>



           


  </body>

</html><?php ob_out();?>