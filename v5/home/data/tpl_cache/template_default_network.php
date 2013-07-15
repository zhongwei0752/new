<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/network|template/default/footer', '1373852134', 'template/default/network');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>v5v5v5v5</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- Bootstrap -->
   <!--  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <link rel="stylesheet" type="text/css" href="./template/default/jquery-mobile-fluid960.min.css">
    <link rel="stylesheet" type="text/css" href="./template/default/style1.css">
  </head>
  <body>
    
    <div class="wrapper">
        <div class="navbar">
            <div class="navbar-inner container_36">
                <a class="logo grid_1" href="#" style="background:none;"><img src="./template/default/image/logo.png"></a>
                <a href="#" class="grid_5" style="float:right;color:#BDBEBF;padding-right:10px;">帮助</a>
             </div>
         </div>
         <!-- navbar end -->
         <div class="login_wrapper container_12">
            <div class="grid_1">
                 <img src="./template/default/image/login_pic.png">
            </div>
            <div class="grid_2 sign_window" id="log">
                  <ul>
                     <li style="float:left">注册账号</li>
                     <li style="padding-left:80px;" id="btna"><span>登陆</span><img src="./template/default/image/login_btn.png" style="vertical-align:-3px;" id="btna"></li>
                  </ul>
                  <form class="">
                    <input type="text" name="" placeholder="用户名" />
                 </form>
                  <form class="">
                    <input type="text" name="" placeholder="邮箱" />
                 </form>
                  <form class="">
                    <input name="" type="text" value="密码" id="tx"/>
                    <input name="" type="password" style="display:none;" id="pwd" />
                 </form>
                 <a href="#" class="sign_btn">注册微伍</a>
            </div>
             <div class="grid_2 sign_window" id="sign" style="positon:relative;right:-300px;margin-top:-278px;">
                  <ul>
                     <li style="float:left">登陆账号</li>
                     <li style="padding-left:80px;" id="btnb"><span>注册</span><img src="./template/default/image/login_btn.png" style="vertical-align:-3px;" id=""></li>
                  </ul>
                
         <form name="loginform" action="do.php?ac=<?=$_SCONFIG['login_action']?>&<?=$url_plus?>&ref" method="post">
        <input type="text" name="username" id="username"  value="<?=$membername?>" />
        <input type="password" name="password" id="password" value="<?=$password?>" />
        <p class="submitrow">
          <input type="hidden" name="refer" value="space.php?do=home" />
          <input type="submit" id="loginsubmit" class="sign_btn" name="loginsubmit" value="登录" class="submit" />
          <input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
        </p>
      </form>
            </div>
         </div>

          <p class="login_page_company_title"><span>已经开通企业</span><span class="more"><a href="">更多</a></span></p>
          <div class="companies_wrapper">
          <div class="companies container_12">
            <?php if(is_array($openlist)) { foreach($openlist as $key => $value) { ?>
            <div class="grid_3">
                   <span style="float:left;padding-right:10px;width:71px;height:71px;overflow:hidden;margin-bottom:20px;"><?php echo avatar($value[uid],middle); ?></span>
                   <span class="company_name"><?=$_SN[$value['uid']]?></span><br>
                    <span><a href="space.php?uid=<?=$value['uid']?>&do=blog&id=<?=$value['blogid']?>" class="fans"><?=$value['friendnum']?>粉丝</a></span> 
              </div>
       
      <?php } } ?>
             
            
          </div>
    
      </div><!-- 无类div结束 -->
      <p class="login_page_company_title"><span>品牌合作企业</span><span class="more"><a href="">更多</a></span></p>
               <div class="companies_wrapper">
          <div class="companies container_12">
              <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
               <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
               <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
               <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
               <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
               
          </div>
          
            <div class="companies container_12">
               <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
               <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
               <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
               <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
               <div class="grid_4">
                  <img src="./template/default/image/example3.png">
              </div>
          </div>
      </div><!-- 无类div结束 -->
    </div><!-- wrraper end -->


     <script src="./source/jquery_v1.10.2.js"></script>
    <script type="text/javascript">
   $('#btna').click(function(){
    $('#log').animate({ opacity: '0'
},200);  
     $('#sign').animate({right:'0'
},200);  
    // $('#log').slideToggle("medium","linear");
    // $('#sign').slideToggle("medium","linear");
   });
    $('#btnb').click(function(){
    $('#sign').animate({ right:'-300px'
},200);  
     $('#log').animate({opacity: '1'
},200);  
    // $('#log').slideToggle("medium","linear");
    // $('#sign').slideToggle("medium","linear");
   })
</script>
    <script type="text/javascript" src="./source/placeholder.js"></script>
    <script type="text/javascript">
var tx = document.getElementById("tx"), pwd = document.getElementById("pwd");
tx.onfocus = function(){
if(this.value != "密码") return;
this.style.display = "none";
pwd.style.display = "";
pwd.value = "";
pwd.focus();
}
pwd.onblur = function(){
if(this.value != "") return;
this.style.display = "none";
tx.style.display = "";
tx.value = "密码";
}

</script>
<!-- 以上为ie不兼容placeholder而写的 -->

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
             版权所有：广州市宏门网络科技有限公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ICP:&nbsp;&nbsp; 粤AXXXXXXXXXXXXX
            
<a href="javascript:;" onclick="window.scrollTo(0,0);" id="a_top" title="TOP"><img src="image/top.gif" alt="" style="padding: 5px 6px 6px;" /></a>

    </div>

</div>
<!--/wrap-->
    <script src="js/jquery_v1.10.2.js"></script>
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
    <!--<script src="js/bootstrap.min.js"></script>-->
<?php ob_out();?>