<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/network|template/default/footer', '1374174373', 'template/default/network');?><script>
  function register(id, result) {
    if(result) {
      $('registersubmit').disabled = true;
      window.location.href = "<?=$jumpurl?>";
    } else {
      updateseccode();
    }
  }
</script>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>微伍v5</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- Bootstrap -->
   <!--  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <link rel="stylesheet" type="text/css" href="./template/default/jquery-mobile-fluid960.min.css">
    <link rel="stylesheet" type="text/css" href="./template/default/style1.css">
    <style type="text/css">
        .companies .grid_3 span img{
             max-width:71px;max-height:71px;min-width:71px;min-height:71px;
          } 
        .companies .grid_4 img{
             max-width:172px;max-height:53px;min-width:172px;min-height:53px;
        }
             </style>
  </head>
  <body>
    
    <div class="wrapper">
        <div class="navbar">
            <div class="navbar-inner container_36">
                <a class="logo grid_1" href="#" style="background:none;"><img src="./template/default/image/logo.png"></a>
                <a href="#" class="grid_5" style="float:right;color:#BDBEBF;padding-right:18px;">帮助</a>
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
                     <li style="padding-left:60px;" id="btna"><span style="margin-right:8px;">登陆</span><img src="./template/default/image/login_btn.png" style="vertical-align:-3px;" id="btna"></li>
                  </ul>
                 <form id="registerform" name="registerform" action="do.php?ac=<?=$_SCONFIG['register_action']?>&<?=$url_plus?>&ref" method="post" >
                  <input type="text" id="username" name="username" value="" placeholder="用户名"  onBlur="checkUserName()" tabindex="2" />&nbsp;<span id="checkusername">&nbsp;</span>
                  <input type="text" id="email" name="email" placeholder="邮箱"  tabindex="5" /><span>&nbsp;&nbsp;</span>
                    <input type="password" name="password" id="tx" placeholder="密码"  onBlur="checkPassword()" onkeyup="checkPwd(this.value);" tabindex="3" />&nbsp;<span id="checkpassword">&nbsp;</span>
                    <input name="" type="password" style="display:none;" id="pwd" />
                    <input type="hidden" name="refer" value="cp.php?ac=profile" />
                    <input type="submit" id="registersubmit" name="registersubmit" value="注册微伍" class="sign_btn" onclick="<?php if($register_rule) { ?>if(!checkClause()){return false;}<?php } ?>ajaxpost('registerform', 'register');" tabindex="6" />
                    <input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
                 </form>
            </div>
             <div class="grid_2 sign_window" id="sign" style="positon:relative;right:-300px;margin-top:-278px;">
                  <ul>
                     <li style="float:left">登陆账号</li>
                     <li style="padding-left:60px;" id="btnb"><span style="margin-right:8px;">注册</span><img src="./template/default/image/login_btn.png" style="vertical-align:-3px;" id=""></li>
                  </ul>
                
         <form name="loginform" action="do.php?ac=<?=$_SCONFIG['login_action']?>&<?=$url_plus?>&ref" method="post">
        <input type="text" name="username" id="username"  value="<?=$membername?>" />
        <input type="password" name="password" id="password"  />
        <p class="submitrow">
          <input type="hidden" name="refer" value="space.php?do=home" />
          <input type="submit" id="loginsubmit" class="sign_btn" name="loginsubmit" value="登录" class="submit" />
          <input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
        </p>
      </form>
            </div>
         </div>

          <p class="login_page_company_title"><span><b>已经开通企业</b></span><span class="more"><a href="">更多</a></span></p>
          <div class="companies_wrapper">
          <div class="companies container_12">
            <?php if(is_array($openlist)) { foreach($openlist as $key => $value) { ?>
            <div class="grid_3">
                   <span style="float:left;padding-right:10px;max-width:71px;max-height:71px;min-width:71px;min-height:71px;overflow:hidden;margin-bottom:20px;"><?php echo avatar($value[uid],middle); ?></span>
                   <span class="company_name"><?=$_SN[$value['uid']]?></span><br>
                    <span><a href="space.php?uid=<?=$value['uid']?>&do=blog&id=<?=$value['blogid']?>" class="fans"><?=$value['friendnum']?>客户</a></span> 
              </div>
       
      <?php } } ?>
             
            
          </div>
    
      </div><!-- 无类div结束 -->

<script type="text/javascript">
<!--
  $('username').focus();
  var lastUserName = lastPassword = lastEmail = lastSecCode = '';
  function checkUserName() {
    var userName = $('username').value;
    if(userName == lastUserName) {
      return;
    } else {
      lastUserName = userName;
    }
    var cu = $('checkusername');
    var unLen = userName.replace(/[^\x00-\xff]/g, "**").length;

    if(unLen < 3 || unLen > 150) {
      warning(cu, unLen < 3 ? '用户名小于3个字符' : '用户名超过 15 个字符');
      return;
    }
    ajaxresponse('checkusername', 'op=checkusername&username=' + (is_ie && document.charset == 'utf-8' ? encodeURIComponent(userName) : userName));
  }
  function checkPassword(confirm) {
    var password = $('password').value;
    if(!confirm && password == lastPassword) {
      return;
    } else {
      lastPassword = password;
    }
    var cp = $('checkpassword');
    if(password == '' || /[\'\"\\]/.test(password)) {
      warning(cp, '密码空或包含非法字符');
      return false;
    } else {
      cp.style.display = '';
      cp.innerHTML = '<img src="image/check_right.gif" width="13" height="13">';
      if(!confirm) {
        checkPassword2(true);
      }
      return true;
    }
  }
  </script>

      <p class="login_page_company_title"><span><b>品牌合作企业</b></span><span class="more"><a href="">更多</a></span></p>
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