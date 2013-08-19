<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/space_index|template/default/header|template/default/space_status|template/default/space_feed_li|template/default/footer', '1376885885', 'template/default/space_index');?><?php $_TPL['nosidebar']=1; ?>
<?php if(empty($_SGLOBAL['inajax'])) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?=$_SC['charset']?>" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title><?php if($_TPL['titles']) { ?><?php if(is_array($_TPL['titles'])) { foreach($_TPL['titles'] as $value) { ?><?php if($value) { ?><?=$value?> - <?php } ?><?php } } ?><?php } ?><?php if($_SN[$space['uid']]) { ?><?=$_SN[$space['uid']]?> - <?php } ?><?=$_SCONFIG['sitename']?> - Powered by UCenter Home</title>
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
                        <li class="side_option"><a href="">客户管理</a></li>
                        <li class="side_option"><a href="space.php?do=goods&view=me">商品管理</a></li>
                        <li class="side_option"><a href="">订单管理</a></li>
                        <li class="side_option"><a href="space.php?do=book">预约预定管理</a></li>
                        <li class="side_option"><a href="space.php?do=recommend&view=me">焦点推荐</a></li>
                        <li class="side_option"><a href="">群发</a></li>
                        <li class="side_option"><a href="space.php?do=moblie&view=all">选择手机模板</a></li>
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


<?php if($narrowlist || $widelist) { ?>
<script type="text/javascript" src="source/script_swfobject.js"></script>
<?php } ?>
 <script type="application/javascript" src="./template/default/awesomechart.js"> </script>

    <head>

        <style>
        
            body{
                background: #fff;
                color: #333;
            }
            
            a, a:visited, a:link, a:active{
                color: #333;
            }
            
            a:hover{
                color: #00f;
            }
        
            .charts_container{
                width: 900px;
                height: 420px;
                margin: 10px auto;
            }
            
            .chart_container_centered{
                text-align: center;
                width: 900px;
                height: 420px;
                margin: 10px auto;
            }
            
            .chart_container{
                width: 400px;
                height: 400px;
                margin: 0px 25px;
                float: left;
            }
            
            .footer{
                font-size: small;
                text-align: right;
            }
        </style>
    </head>
    <body>

        

     	  



<div id="content" style="width:1024px;">

<div class="content_detail_wrapper">
<div id="space_page" >
<br/>
<div id="ubar">

<div id="space_avatar">
<?php if($space['magicstar'] && $space['magicexpire']>$_SGLOBAL['timestamp']) { ?>
<div class="magicstar">
<object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,45,0" width="200" height="250">
<param name="movie" value="image/magic/star/<?=$space['magicstar']?>.swf" />
<param name="quality" value="high" />
<param NAME="wmode" value="transparent">
<embed src="image/magic/star/<?=$space['magicstar']?>.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"  wmode="transparent" width="200" height="250"></embed>
</object>
</div>

<div class="magicavatar"><?php } else { ?><div><?php } ?><?php echo avatar($space[uid],big); ?></div>

</div>



<br />

<div id="space_mymenu">
<h2>个人菜单</h2>
<ul class="line_list">
<li>
<?php if($space['self']) { ?>
<a href="cp.php?ac=introduce" class="r_option" target="_blank">发表</a>
<?php } ?>
<img src="image/icon/doing.gif"><a href="javascript:;" onclick="getindex('introduce');">企业介绍</a><?php if($space['doingnum']) { ?><em>(<?=$space['doingnum']?>)</em><?php } ?>
</li>
<li>
<?php if($space['self']) { ?>
<a href="cp.php?ac=product" class="r_option" target="_blank">发表</a>
<?php } ?>
<img src="image/icon/blog.gif"><a href="javascript:;" onclick="getindex('product');">产品介绍</a><?php if($space['blognum']) { ?><em>(<?=$space['blognum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=development" class="r_option" target="_blank">发表</a>
<?php } ?>
<img src="image/icon/album.gif"><a href="javascript:;" onclick="getindex('development');">企业动态</a><?php if($space['albumnum']) { ?><em>(<?=$space['albumnum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=thread" class="r_option" target="_blank">发表</a>
<?php } ?>
<img src="image/icon/thread.gif"><a href="javascript:;" onclick="getindex('industry');">行业动态</a><?php if($space['threadnum']) { ?><em>(<?=$space['threadnum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=branch" class="r_option" target="_blank">发起</a>
<?php } ?>
<img src="image/icon/poll.gif"><a href="javascript:;" onclick="getindex('branch');">分支机构</a><?php if($space['pollnum']) { ?><em>(<?=$space['pollnum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=job" class="r_option" target="_blank">发起</a>
<?php } ?>
<img src="image/icon/event.gif"><a href="javascript:;" onclick="getindex('job');">人才招聘</a><?php if($space['eventnum']) { ?><em>(<?=$space['eventnum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=cases" class="r_option" target="_blank">发布</a>
<?php } ?>
<img src="image/icon/share.gif"><a href="javascript:;" onclick="getindex('share');">成功案例</a><?php if($space['sharenum']) { ?><em>(<?=$space['sharenum']?>)</em><?php } ?></li>
<li><?php if($space['self']) { ?>
<a href="cp.php?ac=friend&op=search" class="r_option" target="_blank">寻找</a>
<?php } ?>
<img src="image/icon/friend.gif"><a href="javascript:;" onclick="getindex('friend');">客户</a><?php if($space['friendnum']) { ?><em>(<?=$space['friendnum']?>)</em><?php } ?></li>
</ul>
</div>

<?php if($guidelist) { ?>
<div id="space_app_guide">
<h2>应用菜单</h2>
<ul class="line_list">
<?php if(is_array($guidelist)) { foreach($guidelist as $value) { ?>
<li id="space_app_profilelink_<?=$value['appid']?>">
<?php if($space['self']) { ?>
<a href="cp.php?ac=space&op=delete&appid=<?=$value['appid']?>&type=profilelink" id="user_app_profile_<?=$value['appid']?>" class="r_option float_del" style="position: static;" onclick="ajaxmenu(event, this.id)" title="删除">删除</a>
<?php } ?>
<img src="http://appicon.manyou.com/icons/<?=$value['appid']?>"><?php eval($value[profilelink]); ?>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if(is_array($narrowlist)) { foreach($narrowlist as $value) { ?>
<div id="space_app_<?=$value['appid']?>">
<h2>
<?php if($space['self']) { ?>
<a href="cp.php?ac=space&op=delete&appid=<?=$value['appid']?>" id="user_app_<?=$value['appid']?>" class="r_option float_del" onclick="ajaxmenu(event, this.id)" title="删除">删除</a>
<?php } ?>
<a href="<?=$value['appurl']?>"><?=$value['appname']?></a>
</h2>
<?php if($value['myml']) { ?>
<div class="box">
<?php eval($value[myml]); ?>
</div>
<?php } ?>
</div>
<?php } } ?>

</div>

<div id="content">

<h3 id="spaceindex_name">
<?php if($_SCONFIG['realname']) { ?>
<?php if($space['name']) { ?><a href="space.php?uid=<?=$space['uid']?>"<?php g_color($space[groupid]); ?>><?=$space['name']?></a><?php } else { ?>未填写实名<?php } ?>
&nbsp;<em>(用户名: <?=$space['username']?>)</em>
<?php } else { ?>
<a href="space.php?uid=<?=$space['uid']?>"<?php g_color($space[groupid]); ?>><?=$space['username']?></a>
<?php if($space['name']) { ?>&nbsp;<em>(姓名: <?=$space['name']?>)</em><?php } ?>
<?php } ?>

<?php if($_SCONFIG['realname']) { ?>
<?php if($space['namestatus']) { ?>
&nbsp;<img src="image/realname_yes.gif" align="absmiddle" alt="已通过实名认证">
<?php } else { ?>
&nbsp;<img src="image/realname_no.gif" align="absmiddle" alt="未通过实名认证"> <span class="gray">实名未认证</span>
<?php } ?>
<?php } ?>

<?php if($_SCONFIG['videophoto']) { ?>	
<?php if($space['videostatus']) { ?>
&nbsp;<img src="image/videophoto_yes.gif" align="absmiddle" alt="已通过视频认证"> <a id="a_space_videophoto" href="space.php?uid=<?=$space['uid']?>&do=videophoto" onclick="ajaxmenu(event, this.id, 1)"><span style="color:red;font-weight:bold;font-size:12px;">查看视频认证照</span></a>
<?php } else { ?>
&nbsp; <img src="image/videophoto_no.gif" align="absmiddle" alt="未通过视频认证"> <span class="gray"><a href="cp.php?ac=videophoto">视频未认证</a></span>
<?php } ?>
<?php } ?>
</h3>


<div id="spaceindex_note">
<a href="cp.php?ac=share&type=space&id=<?=$space['uid']?>" class="a_share" id="a_share" onclick="ajaxmenu(event, this.id, 1)">分享</a>
<a href="rss.php?uid=<?=$space['uid']?>" id="i_rss" title="订阅 RSS">订阅</a>

<ul class="note_list">
<li>已有 <?=$space['viewnum']?> 人次访问, <?=$space['credit']?> 个积分, <?=$space['experience']?> 个经验 <?=$space['star']?></li>
<li>用户组别：<a href="cp.php?ac=credit&op=usergroup"><?=$_SGLOBAL['grouptitle'][$space['groupid']]['grouptitle']?></a> <?php g_icon($space[groupid]); ?></li>
<li>主页地址：<a href="<?=$space['domainurl']?>" onclick="javascript:setCopy('<?=$space['domainurl']?>');return false;" class="spacelink domainurl"><?=$space['domainurl']?></a></li>

</ul>

<?php if($space['self']) { ?>
<div id="mood_mystatus">
<?=$space['spacenote']?>
</div>

<div id="mood_form">
<form method="post" action="cp.php?ac=doing" id="mood_addform">
<div id="mood_statusinput" class="statusinput"><textarea name="message" id="mood_message" onclick="statusFace();" onkeydown="if(event.keyCode == 13 ){ event.returnValue=false;event.cancel = true;$('mood_add').click();$('mood_message').value='';this.blur(); };" >你可以更新状态, 让好友们知道你在做什么...</textarea></div>
<div class="statussubmit">
<input type="button" id="mood_add" name="add" value="更新" class="submit" style="display:none;" onclick="ajaxpost('mood_addform', 'reloadMood');$('mood_message').value='';" />
<input type="hidden" name="addsubmit" value="true" />
<input type="hidden" name="spacenote" value="true" />
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</div>

</form>
</div>


<script type="text/javascript">
function statusFace() {
if($('mood_message').value == '你可以更新状态, 让好友们知道你在做什么...'){
$('mood_message').value = '';
}
$('mood_statusinput').style.zIndex = '20005';
$('mood_statusinput').className = 'statusinput2';
$('mood_add').style.display = 'block';


var div = $('mood_face_bg');
if(div) {
div.parentNode.removeChild(div);
}
div = document.createElement('div');
div.id = 'mood_face_bg';
div.style.position = 'absolute';
div.style.left = div.style.top = '0px';
div.style.width = '100%';
div.style.height = document.body.scrollHeight + 'px';
div.style.backgroundColor = '#000';
div.style.zIndex = 10000;
div.style.display = 'none';
div.style.filter = 'alpha(opacity=0)';
div.style.opacity = 0;
div.onclick = function() {
hiddenstatus();
}
$('append_parent').appendChild(div);


if($('mood_message_menu') != null) {
$('mood_message_menu').style.display = '';
$('mood_add').style.display = '';
} else {
var faceDiv = document.createElement("div");
faceDiv.id = 'mood_message_menu';
faceDiv.className = 'facebox';
faceDiv.style.position = 'absolute';
var faceul = document.createElement("ul");
for(i=1; i<31; i++) {
getStatusFace(i, faceul);	
}
faceDiv.appendChild(faceul);
$('append_parent').appendChild(faceDiv);
}
//定位菜单
setMenuPosition('mood_message', 0);
div.style.display = '';
}

function hiddenstatus() {
$('mood_message_menu').style.display = 'none';
$('mood_face_bg').style.display = 'none';
$('mood_add').style.display = 'none';
$('mood_statusinput').className = 'statusinput';
if($('mood_message').value == ''){
$('mood_message').value = '你可以更新状态, 让好友们知道你在做什么...';
}
$('mood_statusinput').style.zIndex = '1';
}

function getStatusFace(i, faceul) {
var faceli = document.createElement("li");
faceli.innerHTML = '<img src="image/face/'+i+'.gif" style="cursor:pointer; position:relative;" />';
faceli.getElementsByTagName('img').item(0).onclick = function(){var faceText = '[em:'+i+':]'; if($('mood_message') != null) { insertContent('mood_message', faceText); }};
faceul.appendChild(faceli);
}

function reloadMood(showid, result) {
var x = new Ajax();
x.get('cp.php?ac=doing&op=getmood', function(s){
$('mood_mystatus').innerHTML = s;
});
//提示获得积分
showreward();
hiddenstatus();
}
</script>
<?php } ?>
</div>

<div id="maincontent">


<h3 class="feed_header">
<?php if($space['name']) { ?><?=$space['name']?><?php } else { ?><?=$space['username']?><?php } ?>评论统计
</h3>

 <div class="charts_container">
            <div class="chart_container">
            
                <canvas id="chartCanvas1" width="520" height="400" style="text-align:center;margin:0 auto;">
                    Your web-browser does not support the HTML 5 canvas element.
                </canvas>
                
            </div>
            

        </div>

<?php if($cba=="1") { ?>
<h3 class="feed_header">
<?php if($space['name']) { ?><?=$space['name']?><?php } else { ?><?=$space['username']?><?php } ?>组件使用统计
</h3>
<div class="charts_container">
  <div class="chart_container">
            
                <canvas id="chartCanvas2" width="520" height="400" style="text-align:center;margin:0 auto;">
                    Your web-browser does not support the HTML 5 canvas element.
                </canvas>
                
            </div>
               </div>
<?php } ?>	

<?php if($feedlist) { ?>
<?php $_TPL['hidden_hot']=1; ?>
<div id="space_feed" class="feed">
<h3 class="feed_header">
<span class="entry-title">最新动态</span>
</h3>
<div class="box_content">
<ul>
<?php if(is_array($feedlist)) { foreach($feedlist as $value) { ?>
<li class="s_clear <?=$value['magic_class']?>" id="feed_<?=$value['feedid']?>_li" onmouseover="feed_menu(<?=$value['feedid']?>,1);" onmouseout="feed_menu(<?=$value['feedid']?>,0);">
<div style="width:100%;overflow:hidden;" <?=$value['style']?>>
<?php if($value['uid'] && empty($_TPL['hidden_more'])) { ?>
<a href="cp.php?ac=feed&op=menu&feedid=<?=$value['feedid']?>" class="float_more" id="a_feed_menu_<?=$value['feedid']?>"  onmouseover="feed_menu(<?=$value['feedid']?>,1);" onmouseout="feed_menu(<?=$value['feedid']?>,0);" onclick="ajaxmenu(event, this.id)" title="显示更多选项" style="display:none;">菜单</a>
<?php } ?>
<a class="type" href="space.php?uid=<?=$_GET['uid']?>&do=feed&view=<?=$_GET['view']?>&appid=<?=$value['appid']?>&icon=<?=$value['icon']?>" title="只看此类动态"><img src="<?=$value['icon_image']?>" /></a>
<?=$value['title_template']?> 

<?php if(empty($_TPL['hidden_time'])) { ?>
<span class="gray"><?php echo sgmdate('m-d H:i',$value[dateline],1); ?></span>
<?php } ?>

<?php if(empty($_TPL['hidden_menu'])) { ?>
<?php if($value['idtype']=='doid') { ?>
(<a href="javascript:;" onclick="docomment_get('docomment_<?=$value['id']?>', 1);" id="do_a_op_<?=$value['id']?>">回复</a>)
<?php } elseif(in_array($value['idtype'], array('blogid','picid','sid','pid','eventid'))) { ?>
(<a href="javascript:;" onclick="feedcomment_get(<?=$value['feedid']?>);" id="feedcomment_a_op_<?=$value['feedid']?>">评论</a>)
<?php } ?>
<?php } ?>

<div class="feed_content">

<?php if(empty($_TPL['hidden_hot']) && $value['hot']) { ?>
<div class="hotspot"><a href="cp.php?ac=feed&feedid=<?=$value['feedid']?>"><?=$value['hot']?></a></div>
<?php } ?>	

<?php if($value['image_1']) { ?>
<a href="<?=$value['image_1_link']?>"<?=$value['target']?>><img src="<?=$value['image_1']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($value['image_2']) { ?>
<a href="<?=$value['image_2_link']?>"<?=$value['target']?>><img src="<?=$value['image_2']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($value['image_3']) { ?>
<a href="<?=$value['image_3_link']?>"<?=$value['target']?>><img src="<?=$value['image_3']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($value['image_4']) { ?>
<a href="<?=$value['image_4_link']?>"<?=$value['target']?>><img src="<?=$value['image_4']?>" class="summaryimg" /></a>
<?php } ?>

<?php if($value['body_template']) { ?>
<div class="detail"<?php if($value['image_3']) { ?> style="clear: both;"<?php } ?>>
<?=$value['body_template']?>
</div>
<?php } ?>

<?php if($value['thisapp'] && !empty($value['body_data']['flashvar'])) { ?>
<div class="media">
<img src="image/vd.gif" alt="点击播放" onclick="javascript:showFlash('<?=$value['body_data']['host']?>', '<?=$value['body_data']['flashvar']?>', this, '<?=$value['feedid']?>');" style="cursor:pointer;" />
</div>
<?php } elseif($value['thisapp'] && !empty($value['body_data']['musicvar'])) { ?>
<div class="media">
<img src="image/music.gif" alt="点击播放" onclick="javascript:showFlash('music', '<?=$value['body_data']['musicvar']?>', this, '<?=$value['feedid']?>');" style="cursor:pointer;" />
</div>
<?php } elseif($value['thisapp'] && !empty($value['body_data']['flashaddr'])) { ?>
<div class="media">
<img src="image/flash.gif" alt="点击查看" onclick="javascript:showFlash('flash', '<?=$value['body_data']['flashaddr']?>', this, '<?=$value['feedid']?>');" style="cursor:pointer;" />
</div>
<?php } ?>

<?php if($value['body_general']) { ?>
<div class="quote"><span class="q"><?=$value['body_general']?></span></div>
<?php } ?>
</div>
</div>

<?php if($value['idtype']=='doid') { ?>
<div id="docomment_<?=$value['id']?>" style="display:none;"></div>
<?php } elseif($value['idtype']) { ?>
<div id="feedcomment_<?=$value['feedid']?>" style="display:none;"></div>
<?php } ?>

<?php if(!empty($hiddenfeed_num[$value['icon']])) { ?>
<div id="appfeed_open_<?=$value['feedid']?>"><a href="javascript:;" id="feed_a_more_<?=$value['feedid']?>" onclick="feed_more_show('<?=$value['feedid']?>');">&raquo; 更多动态(<?=$hiddenfeed_num[$value['icon']]?>)</a></div>
<div id="feed_more_<?=$value['feedid']?>" style="display:none;">
<ol>
<?php if(is_array($hiddenfeed_list[$value['icon']])) { foreach($hiddenfeed_list[$value['icon']] as $appvalue) { ?>
<?php $appvalue = mkfeed($appvalue); ?>
<li>
<?=$appvalue['title_template']?>
<div class="feed_content" style="width:100%;overflow:hidden;">
<?php if($appvalue['image_1']) { ?>
<a href="<?=$appvalue['image_1_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_1']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['image_2']) { ?>
<a href="<?=$appvalue['image_2_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_2']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['image_3']) { ?>
<a href="<?=$appvalue['image_3_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_3']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['image_4']) { ?>
<a href="<?=$appvalue['image_4_link']?>"<?=$appvalue['target']?>><img src="<?=$appvalue['image_4']?>" class="summaryimg" /></a>
<?php } ?>
<?php if($appvalue['body_template']) { ?>
<div class="detail"<?php if($appvalue['image_3']) { ?> style="clear: both;"<?php } ?>>
<?=$appvalue['body_template']?>
</div>
<?php } ?>
<?php if($appvalue['body_general']) { ?>
<div class="quote"><span class="q"><?=$appvalue['body_general']?></span></div>
<?php } ?>
</div>
</li>
<?php } } ?>
</ol>
</div>
<?php } ?>
</li>
<?php } } ?>
</ul>
</div>
</div>
<?php } ?>



<?php if(is_array($widelist)) { foreach($widelist as $value) { ?>
<?php if($value['myml']) { ?>
<div id="space_app_<?=$value['appid']?>" class="appbox">
<h3 class="feed_header">
<?php if($space['self']) { ?>
<a href="cp.php?ac=space&op=delete&appid=<?=$value['appid']?>" id="user_app_<?=$value['appid']?>" class="r_option float_del" onclick="ajaxmenu(event, this.id)" title="删除">删除</a>
<?php } ?>
<a href="<?=$value['appurl']?>"><?=$value['appname']?></a>
</h3>
<div class="box" style="margin: 0 0 20px;">
<?php eval($value[myml]); ?>
</div>
</div>
<?php } ?>
<?php } } ?>

</div>


</div>

<div id="obar">
<?php if(!$space['self']) { ?>

<?php if($space['magiccredit']) { ?>
<div class="magichongbao" id="div_magic_gift">
<a id="a_magic_gift" href="cp.php?&ac=magic&op=receive&uid=<?=$space['uid']?>" onclick="ajaxmenu(event, this.id)">送你 <span><?=$space['magiccredit']?></span> 积分大红包</a>
</div>
<?php } ?>

<?php if($_SGLOBAL['magic']['viewmagiclog'] || $_SGLOBAL['magic']['viewmagic'] || $_SGLOBAL['magic']['viewvisitor']) { ?>
<div class="indexmagic">
<?php if(is_array(array('viewmagiclog','viewmagic','viewvisitor'))) { foreach(array('viewmagiclog','viewmagic','viewvisitor') as $mid) { ?>
<?php if($_SGLOBAL['magic'][$mid]) { ?>
<a id="a_magic_<?=$mid?>" href="magic.php?mid=<?=$mid?>&idtype=uid&id=<?=$space['uid']?>" onclick="ajaxmenu(event,this.id,1)">
<img src="image/magic/<?=$mid?>.small.gif" title="<?=$_SGLOBAL['magic'][$mid]?>" alt="<?=$_SGLOBAL['magic'][$mid]?>">
</a>
<?php } ?>
<?php } } ?>
</div>
<?php } ?>
<?php } else { ?>
<?php if($_SGLOBAL['magic']['gift']) { ?>
<div class="magichongbao" id="div_magic_gift">				
<?php if($space['magiccredit']) { ?>
<a id="a_magic_retrieve" href="cp.php?ac=magic&op=retrieve" onclick="ajaxmenu(event,this.id)">回收埋下的积分</a>
<?php } else { ?>
<a id="a_magic_gift" href="magic.php?mid=gift" onclick="ajaxmenu(event,this.id,1)">给来访者埋个红包</a>
<?php } ?>				
</div>
<?php } ?>
<?php } ?>


<?php if($visitorlist) { ?>
<div class="sidebox">
<h2 class="title">
<a href="space.php?uid=<?=$space['uid']?>&do=friend&view=visitor" class="r_option">全部</a>
最近来访
<?php if(!$space['self'] && $_SGLOBAL['magic']['anonymous']) { ?>
<span class="gray"><img title="<?=$_SGLOBAL['magic']['anonymous']?>" src="image/magic/anonymous.small.gif"/><a id="a_magic_anonymous" href="magic.php?mid=anonymous&idtype=uid&id=<?=$space['uid']?>" onclick="ajaxmenu(event,this.id,1)">匿名</a></span>
<?php } ?>
</h2>
<ul class="avatar_list">
<?php if(is_array($visitorlist)) { foreach($visitorlist as $key => $value) { ?>
<li>
<?php if($value['vusername'] == '') { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" alt="匿名" /></div>
<p>匿名</p>
<p class="gray"><?php echo sgmdate('n月j日',$value[dateline],1); ?></p>
<?php } else { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['vuid']?>"><?php echo avatar($value[vuid],small); ?></a></div>
<p<?php if($ols[$value['vuid']]) { ?> class="online_icon_p"<?php } ?>><a href="space.php?uid=<?=$value['vuid']?>" title="<?=$_SN[$value['vuid']]?>"><?=$_SN[$value['vuid']]?></a></p>
<p class="gray"><?php echo sgmdate('n月j日',$value[dateline],1); ?></p>
<?php } ?>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>


<?php if($friendlist) { ?>
<div class="sidebox">
<h2 class="title">
<span class="r_option">
<a href="space.php?uid=<?=$space['uid']?>&do=friend&view=me" class="action">全部(<?=$space['friendnum']?>)</a>
</span>
客户
</h2>
<ul class="avatar_list">
<?php if(is_array($friendlist)) { foreach($friendlist as $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['fuid']?>"><?php echo avatar($value[fuid],small); ?></a></div>
<p<?php if($ols[$value['fuid']]) { ?> class="online_icon_p"<?php } ?>><a href="space.php?uid=<?=$value['fuid']?>"><?=$_SN[$value['fuid']]?></a></p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>

</div>
</div>
</div>
</div>

<?php if($_GET['theme']) { ?><div class="nn">您是否想使用这款个性风格?<br /><a href="cp.php?ac=theme&op=use&dir=<?=$_GET['theme']?>">[应用]</a><a href="cp.php?ac=theme">[取消]</a></div><?php } ?>

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
             版权所有：广州市宏门网络科技有限公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ICP:&nbsp;&nbsp; 粤ICP备08132436号
            
<a href="javascript:;" onclick="window.scrollTo(0,0);" id="a_top" title="TOP" style="position:relative;left:280px;top:0;"><img src="image/top.gif" alt="" style="padding: 5px 6px 6px;" /></a>

    </div>

</div>
<!--/wrap-->
    <script src="js/jquery.js"></script>
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

<script>
function getindex(type) {
var plus = '';
if(type == 'event') plus = '&type=self';
ajaxget('space.php?uid=<?=$space['uid']?>&do=development&view=me'+plus+'&ajaxdiv=maincontent', 'maincontent');
}

//彩虹炫
var elems = selector('div[class~=magicflicker]'); 
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}

</script>


        <script type="application/javascript">
        
            var chart1 = new AwesomeChart('chartCanvas1');
            chart1.title ="";
            chart1.data = [<?php if(is_array($myself)) { foreach($myself as $value) { ?><?=$b[$value['english']]?>,<?php } } ?>];
            chart1.labels = [<?php if($myself1['0']['subject']) { ?>"<?=$myself1['0']['subject']?>",<?php } ?><?php if($myself1['1']['subject']) { ?>"<?=$myself1['1']['subject']?>",<?php } ?><?php if($myself1['2']['subject']) { ?>"<?=$myself1['2']['subject']?>",<?php } ?><?php if($myself1['3']['subject']) { ?>"<?=$myself1['3']['subject']?>",<?php } ?><?php if($myself1['4']['subject']) { ?>"<?=$myself1['4']['subject']?>",<?php } ?><?php if($myself1['5']['subject']) { ?>"<?=$myself1['5']['subject']?>",<?php } ?><?php if($myself1['6']['subject']) { ?>"<?=$myself1['6']['subject']?>",<?php } ?><?php if($myself1['7']['subject']) { ?>"<?=$myself1['7']['subject']?>",<?php } ?><?php if($myself1['8']['subject']) { ?>"<?=$myself1['8']['subject']?>",<?php } ?>];
            chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
            chart1.randomColors = true;
            chart1.animate = true;
            chart1.animationFrames = 30;
            chart1.draw();
             var chart2 = new AwesomeChart('chartCanvas2');
            chart2.title = "";
            chart2.data = [<?php if($myself1['0']['subject']) { ?><?=$a[$myself1['0']['english']]?>,<?php } ?><?php if($myself1['1']['subject']) { ?><?=$a[$myself1['1']['english']]?>,<?php } ?><?php if($myself1['2']['subject']) { ?><?=$a[$myself1['2']['english']]?>,<?php } ?><?php if($myself1['3']['subject']) { ?><?=$a[$myself1['3']['english']]?>,<?php } ?><?php if($myself1['4']['subject']) { ?><?=$a[$myself1['4']['english']]?>,<?php } ?><?php if($myself1['5']['subject']) { ?><?=$a[$myself1['5']['english']]?>,<?php } ?><?php if($myself1['6']['subject']) { ?><?=$a[$myself1['6']['english']]?>,<?php } ?><?php if($myself1['7']['subject']) { ?><?=$a[$myself1['7']['english']]?>,<?php } ?>];
            chart2.labels = [<?php if($myself1['0']['subject']) { ?>"<?=$myself1['0']['subject']?>",<?php } ?><?php if($myself1['1']['subject']) { ?>"<?=$myself1['1']['subject']?>",<?php } ?><?php if($myself1['2']['subject']) { ?>"<?=$myself1['2']['subject']?>",<?php } ?><?php if($myself1['3']['subject']) { ?>"<?=$myself1['3']['subject']?>",<?php } ?><?php if($myself1['4']['subject']) { ?>"<?=$myself1['4']['subject']?>",<?php } ?><?php if($myself1['5']['subject']) { ?>"<?=$myself1['5']['subject']?>",<?php } ?><?php if($myself1['6']['subject']) { ?>"<?=$myself1['6']['subject']?>",<?php } ?><?php if($myself1['7']['subject']) { ?>"<?=$myself1['7']['subject']?>",<?php } ?><?php if($myself1['8']['subject']) { ?>"<?=$myself1['8']['subject']?>",<?php } ?>];
            chart2.barFillStyle = chart1.colors[0];
            chart2.labelFillStyle = chart1.colors[0];
            chart2.randomColors = true;
            chart2.animate = true;
            chart2.animationFrames = 30;
            chart2.draw();
            
          
        </script>
 <?php ob_out();?>