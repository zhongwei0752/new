<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/space_talk|template/default/header|template/default/space_talk_li|template/default/space_menu|template/default/space_talk_li|template/default/footer', '1373623056', 'template/default/space_talk');?>
<?php $_TPL['titles'] = array('在线沟通'); ?>
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
                
                <a class="logo grid_1" href="#"><img src="./template/default/image/logo.png"></a>
                <?php if($_SGLOBAL['supe_uid']) { ?>
                <a href="space.php?do=home" class="grid_2">首页</a>
                

                <?php } else { ?>
                 <a href="index.php" class="grid_2">首页</a>
                <?php } ?>
                <?php if($_SGLOBAL['supe_uid']) { ?>	
                <a class="grid_2" href="space.php?do=pm<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?>&filter=newpm<?php } ?>">消息<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?><div class="message_pawpaw"><?=$_SGLOBAL['member']['newpm']?></div><?php } ?></a>
<?php if($_SGLOBAL['member']['allnotenum']) { ?><a onmouseover="showMenu(this.id)"  href="space.php?do=notice"><div class="message_pawpaw"><?=$_SGLOBAL['member']['allnotenum']?></div></a><?php } ?>
<a href="space.php?do=friend" class="grid_2">客户列表</a>
<?php } else { ?>
<a class="grid_2" href="help.php">帮助</a>
<?php } ?>

                <?php if($_SGLOBAL['supe_uid']) { ?>
               
                <div class="grid_3"></div>
                <div class="grid_4">
                   <a href="space.php?uid=<?=$_SGLOBAL['supe_uid']?>"  style="float:left;padding-right:10px;"><?php echo avatar($_SGLOBAL[supe_uid]); ?></a>
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
                        <li class="side_header"><span class="title">基本组件</span><a href="space.php?do=menuset" class="manage_btn">管理</a></li>
                        <?php if(is_array($zhongwei)) { foreach($zhongwei as $value) { ?>
 <?php if($value['english']==$_GET['do']||$value['english']==$_GET['ac']) { ?><li class="side_option actived"><?php } else { ?><li class="side_option"><?php } ?><a href="<?=$value['url']?>"><?=$value['subject']?></a></li>
<?php } } ?>
                       <!-- <li class="side_option actived"><a href="">企业介绍</a></li>-->
                       
                        <li class="side_header"><span class="title">高级组件</span><a href="space.php?do=menuset" class="manage_btn">管理</a></li>
                        <li class="side_option"><a href="">客户管理</a></li>
                        <li class="side_option"><a href="">商品管理</a></li>
                        <li class="side_option"><a href="">订单管理</a></li>
                        <li class="side_option"><a href="">预约预定管理</a></li>
                        <li class="side_option"><a href="">焦点推荐</a></li>
                        <li class="side_option"><a href="">群发</a></li>
                        <li class="side_option"><a href="">选择手机模板</a></li>
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

<link rel="stylesheet" type="text/css" href="./template/default/jquery-mobile-fluid960.min.css">
<link rel="stylesheet" type="text/css" href="./template/default/style1.css">
<link type='text/css' href='./template/default/basic.css' rel='stylesheet' media='screen' />

<?php if(!empty($_SGLOBAL['inajax'])) { ?>
<div id="space_talk">
<h3 class="feed_header">
<a href="space.php?do=talk&view=me" class="r_option" target="_blank">一句话记录</a>
记录(共 <?=$count?> 条)
</h3><br>

<?php if($dolist) { ?>
<div class="talk_list">
<ol>
<?php if(is_array($dolist)) { foreach($dolist as $dv) { ?>
<?php $doid = $dv[doid]; ?>
<li id="dl<?=$doid?>">
<div class="talk">
<div class="talkcontent"><a href="space.php?uid=<?=$dv['uid']?>"><?=$_SN[$dv['uid']]?></a>: <span><?=$dv['message']?></span>
<span class="gray">(<?php echo sgmdate('m-d H:i',$dv[dateline],1); ?>)</span>
<?php if($dv['uid']==$_SGLOBAL['supe_uid']) { ?> <a href="cp.php?ac=talk&op=delete&doid=<?=$doid?>&id=<?=$dv['id']?>" id="talk_delete_<?=$doid?>_<?=$dv['id']?>" onclick="ajaxmenu(event, this.id)" class="re gray">删除</a> &nbsp;<?php } ?>
<a href="javascript:;" onclick="talkcomment_form(<?=$doid?>, 0);">回复</a>
</div>

<?php $list = $clist[$doid]; ?>
<div class="sub_talk" id="docomment_<?=$doid?>"<?php if(!$list) { ?> style="display:none;"<?php } ?>>
<span id="talkcomment_form_<?=$doid?>_0"></span>
<ol>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<?php if($value['uid']) { ?>
<li style="<?=$value['style']?>">
<a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a>: <?=$value['message']?> <span class="talktime">(<?php echo sgmdate('m-d H:i',$value[dateline],1); ?>)</span> 
<a href="javascript:;" onclick="talkcomment_form(<?=$value['doid']?>, <?=$value['id']?>);" class="re">回复</a>
<?php if($value['uid']==$_SGLOBAL['supe_uid'] || $dv['uid']==$_SGLOBAL['supe_uid']) { ?> <a href="cp.php?ac=talk&op=delete&doid=<?=$value['doid']?>&id=<?=$value['id']?>" id="talk_delete_<?=$value['doid']?>_<?=$value['id']?>" onclick="ajaxmenu(event, this.id)" class="gray">删除</a><?php } ?>
<span id="talkcomment_form_<?=$value['doid']?>_<?=$value['id']?>"></span>
</li>
<hr style=" height:1px;border:none;border-top:1px dashed #C0C0C0;">
<?php } ?>
<?php } } ?>
</ol>
</div>

</div>
</li>
<?php } } ?>
</ol>
<div class='pagination'><ul><?=$multi?></ul></div>
</div>
<?php } else { ?>
<div class="c_form">现在还没有记录</div>
<?php } ?>
</div><br>

<?php } else { ?>

<?php if($space['self']) { ?>

            <div class="content" style="font-size:14px;">
                 <div class="indexing">
                 <img src="<?=$wei1['image2url']?>" /><span><a href="space.php?uid=<?=$space['uid']?>"><?=$_SN[$space['uid']]?></a></span>><span>在线沟通</span>
                 </div><!-- end -->
                 <div class="bread container_12">
                     <div class="bread_actived grid_1">
                         在线沟通
                     </div>
                <a href="cp.php?ac=talk" class="btn grid_2">
                      发布
                     </a>
                 </div>

<?php } else { ?>
<?php $_TPL['spacetitle'] = "记录";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=talk&view=me\">TA的所有记录</a>"; ?>
<div class="c_header a_header">
<div class="avatar48"><a href="space.php?uid=<?=$space['uid']?>"><?php echo avatar($space[uid],small); ?></a></div>
<?php if($_SGLOBAL['refer']) { ?>
<a class="r_option" href="<?=$_SGLOBAL['refer']?>">&laquo; 返回上一页</a>
<?php } ?>
<p style="font-size:14px"><?=$_SN[$space['uid']]?>的<?=$_TPL['spacetitle']?></p>
<a href="space.php?uid=<?=$space['uid']?>" class="spacelink"><?=$_SN[$space['uid']]?>的主页</a>
<?php if($_TPL['spacemenus']) { ?>
<?php if(is_array($_TPL['spacemenus'])) { foreach($_TPL['spacemenus'] as $value) { ?> <span class="pipe">&raquo;</span> <?=$value?><?php } } ?>
<?php } ?>
</div>

<div class="h_status">按照发布时间排序</div>
<?php } ?>

<div class="content_detail_wrapper">


<?php if($dolist) { ?>

<?php if(is_array($dolist)) { foreach($dolist as $dv) { ?>
<?php $doid = $dv[doid]; ?>
<div class="content_list container_12">
<div class="grid_2">
                             <div class="list_test ">
                                  <h3><?=$_SN[$dv['uid']]?>:<?=$dv['subject']?></h3>
                                  <p><?=$dv['message']?></p> 
                          
<div class="talk">



<a href="javascript:;" onclick="docomment_form(<?=$doid?>, 0);">回复</a>
<?php if($dv['uid']==$_SGLOBAL['supe_uid']) { ?> <a href="cp.php?ac=talk&op=delete&doid=<?=$doid?>&id=<?=$dv['id']?>" id="talk_delete_<?=$doid?>_<?=$dv['id']?>" onclick="ajaxmenu(event, this.id)" class="re gray">删除</a> &nbsp;<?php } ?>

<?php $list = $clist[$doid]; ?>

<div class="sub_talk" id="talkcomment_<?=$doid?>"<?php if(!$list) { ?> style="display:none;"<?php } ?>>
<span id="docomment_form_<?=$doid?>_0"></span>
<ol>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<?php if($value['uid']) { ?>
<li style="<?=$value['style']?>">
<a href="space.php?uid=<?=$value['uid']?>"><?=$_SN[$value['uid']]?></a>: <?=$value['message']?> <span class="talktime">(<?php echo sgmdate('m-d H:i',$value[dateline],1); ?>)</span> 
<a href="javascript:;" onclick="talkcomment_form(<?=$value['doid']?>, <?=$value['id']?>);" class="re">回复</a>
<?php if($value['uid']==$_SGLOBAL['supe_uid'] || $dv['uid']==$_SGLOBAL['supe_uid']) { ?> <a href="cp.php?ac=talk&op=delete&doid=<?=$value['doid']?>&id=<?=$value['id']?>" id="talk_delete_<?=$value['doid']?>_<?=$value['id']?>" onclick="ajaxmenu(event, this.id)" class="gray">删除</a><?php } ?>
<span id="talkcomment_form_<?=$value['doid']?>_<?=$value['id']?>"></span>
</li>
<hr style=" height:1px;border:none;border-top:1px dashed #C0C0C0;">
<?php } ?>
<?php } } ?>
</ol>
</div>

</div>

                             </div>
                          </div>

<br/>

</div>

<?php } } ?>

<?php } else { ?>
<div class="c_form">
当前没有相应的信息。
</div>
<?php } ?>
</div>

<div id="sidebar">
<?php if($moodlist) { ?>
<div class="sidebox">
<h2 class="title">
<p class="r_option"><a href="space.php?uid=<?=$space['uid']?>&do=mood">全部</a></p>
跟<?php if($space['self']) { ?>我<?php } else { ?><?=$_SN[$space['uid']]?><?php } ?>同心情的朋友
</h2>
<ul class="avatar_list">
<?php if(is_array($moodlist)) { foreach($moodlist as $key => $value) { ?>
<li>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>&do=talk"><?php echo avatar($value[uid],small); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>" title="<?=$_SN[$value['uid']]?>"><?=$_SN[$value['uid']]?></a></p>
<p class="gray"><?php echo sgmdate('n月j日',$value[updatetime],1); ?></p>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>
</div>
<?php } ?>


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
<?php ob_out();?>