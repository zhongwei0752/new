<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/space_menuset_view|template/default/header|template/default/space_menu|template/default/space_click|template/default/space_comment_li|template/default/footer', '1373622679', 'template/default/space_menuset_view');?><?php $_TPL['titles'] = array($menuset['subject'], '应用'); ?>
<?php $friendsname = array(1 => '仅好友可见',2 => '指定好友可见',3 => '仅自己可见',4 => '凭密码可见'); ?>
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


<?php if($space['self']) { ?>
<h2 class="title"><img src="image/app/menuset.gif" />应用</h2>
<div class="tabs_header">
<ul class="tabs">
<?php if($space['friendnum']) { ?><li<?=$actives['we']?>><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=we"><span>好友最新应用</span></a></li><?php } ?>
<li class="active"><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=me"><span>我的应用</span></a></li>
<li><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=all"><span>大家的应用</span></a></li>
<?php if($_SN[$_SGLOBAL['supe_uid']]=='admin') { ?><li class="null"><a href="cp.php?ac=menuset">发表新应用</a></li><?php } ?>
</ul>
<?php if($_SGLOBAL['refer']) { ?>
<div class="r_option">
<a  href="<?=$_SGLOBAL['refer']?>">&laquo; 返回上一页</a>
</div>
<?php } ?>
</div>
<?php } else { ?>
<?php $_TPL['spacetitle'] = "应用";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=$do&view=me\">TA的所有应用</a>";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=menuset&id=$menuset[menusetid]\">查看应用</a>"; ?>
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

<?php } ?>

<script type="text/javascript" charset="<?=$_SC['charset']?>" src="source/script_calendar.js"></script>

<div class="entry" style="padding:0 0 10px;">

<div class="title">
<h1<?php if($menuset['magiccolor']) { ?> class="magiccolor<?=$menuset['magiccolor']?>"<?php } ?>><?=$menuset['subject']?></h1>
<?php if($menuset['friend']) { ?>
<span class="r_option locked gray"><?=$friendsname[$menuset['friend']]?></span>
<?php } ?>

<?php if($menuset['hot']) { ?><span class="hot"><em>热</em><?=$menuset['hot']?></span><?php } ?>
<?php if($menuset['friend']) { ?>
<span class="r_option locked gray">
<a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=me&friend=<?=$menuset['friend']?>" class="gray"><?=$friendsname[$value['friend']]?></a>
</span>
<?php } ?>
<?php if($menuset['viewnum']) { ?><span class="gray">已有 <?=$menuset['viewnum']?> 次阅读</span><?php } ?>
&nbsp; <span class="gray"><?php echo sgmdate('Y-m-d H:i',$menuset[dateline],1); ?></span>
<?php if($menuset['tag']) { ?>
&nbsp; <a href="space.php?uid=<?=$menuset['uid']?>&do=tag">标签</a>:&nbsp;
<?php if(is_array($menuset['tag'])) { foreach($menuset['tag'] as $tagid => $tagname) { ?>
<a href="space.php?uid=<?=$menuset['uid']?>&do=tag&id=<?=$tagid?>"><?=$tagname?></a>&nbsp;
<?php } } ?>
<?php } ?>
</div>


<div id="menuset_article" class="article <?php if($menuset['magicpaper']) { ?> magicpaper<?=$menuset['magicpaper']?><?php } ?>">
<div class="resizeimg">
<div class="resizeimg2">
<div class="resizeimg3">
<div class="resizeimg4">
<?php if($_SGLOBAL['ad']['rightside']) { ?>
<div style="float: right; padding:5px;"><?php adshow('rightside'); ?></div>
<?php } ?>
<?=$menuset['message']?>
</div>
</div>
</div>
</div>
</div>
</div>
<?php if($_SN[$_SGLOBAL['supe_uid']]=='admin') { ?>
<div style="padding:0 0 10px;">
<div style="text-align: right; padding-top:10px; ">
<a href="cp.php?ac=menuset&menusetid=<?=$menuset['menusetid']?>&op=edit">編輯</a><span class="pipe">|</span>
<a href="cp.php?ac=menuset&menusetid=<?=$menuset['menusetid']?>&op=delete" id="menuset_delete_<?=$menuset['menusetid']?>" onclick="ajaxmenu(event, this.id)">删除</a>
</div>
</div>
<?php } ?>
<div id="content">
<?php if($menuset['money']) { ?>单价:<?=$menuset['money']?>元/月<?php } else { ?>单价:免费<?php } ?><br/><?php if($menuset['money']) { ?>
<a href="cp.php?ac=menuset&menusetid=<?=$menuset['menusetid']?>&op=buy&money=<?=$menuset['money']?>" id="menuset_buy_<?=$menuset['menusetid']?>" onclick="ajaxmenu(event, this.id)">购买</a><?php } ?>
<div id="click_div">

<div class="digc">
<table>
<tr>
<?php $clicknum = 0; ?>
<?php if(is_array($clicks)) { foreach($clicks as $value) { ?>
<?php $clicknum = $clicknum + $value['clicknum']; ?>
<?php $value['height'] = $maxclicknum?intval($value['clicknum']*50/$maxclicknum):0; ?>
<td valign="bottom"><a href="cp.php?ac=click&op=add&clickid=<?=$value['clickid']?>&idtype=<?=$idtype?>&id=<?=$id?>&hash=<?=$hash?>" id="click_<?=$idtype?>_<?=$id?>_<?=$value['clickid']?>" onclick="ajaxmenu(event, this.id, 0, 2000, 'show_click')"><?php if($value['clicknum']) { ?><div class="digcolumn"><div class="digchart dc<?=$value['classid']?>" style="height:<?=$value['height']?>px;"><em><?=$value['clicknum']?></em></div></div><?php } ?><div class="digface"><img src="image/click/<?=$value['icon']?>" alt="" /><br /><?=$value['name']?></div></a></td>
<?php } } ?>
</tr>
</table>
</div>

<?php if($clickuserlist) { ?>
<div class="trace" style="padding-bottom: 10px;">

<div>
<h2>
刚表态过的朋友 (<a href="javascript:;" onclick="show_click('click_<?=$idtype?>_<?=$id?>_<?=$value['clickid']?>')"><?=$clicknum?> 人</a>)
<?php if($_SGLOBAL['magic']['anonymous']) { ?>
<img src="image/magic/anonymous.small.gif" class="magicicon" />
<a id="a_magic_anonymous" href="magic.php?mid=anonymous&idtype=<?=$idtype?>&id=<?=$id?>" onclick="ajaxmenu(event,this.id, 1)" class="gray"><?=$_SGLOBAL['magic']['anonymous']?></a>
<?php } ?>					
</h2>
</div>
<div id="trace_div">
<ul class="avatar_list" id="trace_ul">
<?php if(is_array($clickuserlist)) { foreach($clickuserlist as $value) { ?>
<li>
<?php if($value['username']) { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['uid']?>" target="_blank" title="<?=$value['clickname']?>"><?php echo avatar($value[uid], 'small'); ?></a></div>
<p><a href="space.php?uid=<?=$value['uid']?>"  title="<?=$_SN[$value['uid']]?>" target="_blank"><?=$_SN[$value['uid']]?></a></p>
<?php } else { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" alt="<?=$value['clickname']?>" class="avatar" /></div>
<p>匿名</p>
<?php } ?>
</li>
<?php } } ?>
</ul>
</div>
</div>
<?php } ?>

<?php if($click_multi) { ?><div class="page"><?=$click_multi?></div><?php } ?>

</div>

<div class="comments" id="div_main_content">
<h2>
<?php if(!$menuset['noreply']) { ?>
<a href="#quickcommentform_<?=$id?>" class="r_option">发表评论</a>
<?php } ?>
评论 (<span id="comment_replynum"><?=$menuset['replynum']?></span> 个评论)</h2>
<div class="page"><?=$multi?></div>
<div class="comments_list" id="comment">
<?php if($cid) { ?>
<div class="notice">
当前只显示与你操作相关的单个评论，<a href="space.php?uid=<?=$menuset['uid']?>&do=menuset&id=<?=$menuset['menusetid']?>">点击此处查看全部评论</a>
</div>
<?php } ?>
<ul id="comment_ul">
<?php if(is_array($list)) { foreach($list as $value) { ?>
<div class="comment_list container_12" style="margin-left:60px;">
<?php if($value['author']) { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['authorid']?>"><?php echo avatar($value[authorid],small); ?></a></div>
<?php } else { ?>
 <img src="image/magic/hidden.gif" class="grid_1">
<?php } ?>
     <div class="grid_2">
                                      <h6><span class="commenter">
                                      	<?php if($value['author']) { ?>
<a href="space.php?uid=<?=$value['authorid']?>" id="author_<?=$value['cid']?>"><?=$_SN[$value['authorid']]?></a> 
<?php } else { ?>
匿名
<?php } ?>:</span>
<span class="comment_text"><?=$value['message']?></span></h6>
        <span class="comment_time"><?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?></span>
        </div>
 </div> <br/>


<?php } } ?>
</ul>
</div>
<div class="page"><?=$multi?></div>

<?php if(!$menuset['noreply']) { ?>
<form id="quickcommentform_<?=$id?>" name="quickcommentform_<?=$id?>" action="cp.php?ac=comment" method="post" class="quickpost">

<table cellpadding="0" cellspacing="0">
<tr>
<td>
<a href="###" id="comment_face" title="插入表情" onclick="showFace(this.id, 'comment_message');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<?php if($_SGLOBAL['magic']['doodle']) { ?>
<a id="a_magic_doodle" href="magic.php?mid=doodle&showid=comment_doodle&target=comment_message" onclick="ajaxmenu(event, this.id, 1)"><img src="image/magic/doodle.small.gif" class="magicicon" />涂鸦板</a>
<?php } ?>
<br />
<textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="5" style="width:500px;"></textarea>
</td>
</tr>
<tr>
<td>
<input type="hidden" name="refer" value="space.php?uid=<?=$menuset['uid']?>&do=<?=$do?>&id=<?=$id?>" />
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="idtype" value="menusetid">
<input type="hidden" name="commentsubmit" value="true" />
<input type="button" id="commentsubmit_btn" name="commentsubmit_btn" class="submit" value="评论" onclick="ajaxpost('quickcommentform_<?=$id?>', 'comment_add')" />
<div id="__quickcommentform_<?=$id?>"></div>
</td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" /></form>
<br />
<?php } ?>
</div>

</div>


<div id="sidebar" style="padding-top:20px;">

<?php if($topic) { ?>
<div class="affiche">
<img src="image/app/topic.gif" align="absmiddle">
<strong>凑个热闹</strong>：
<a href="space.php?do=topic&topicid=<?=$topic['topicid']?>"><?=$topic['subject']?></a>
</div>
<?php } ?>

<?php if($otherlist) { ?>
<!--
<div class="sidebox">
<h2 class="title">
<a href="space.php?uid=<?=$menuset['uid']?>&do=menuset&view=me" class="r_option">全部</a>
作者的其他最新应用
</h2>
<ul class="news_list">
<?php if(is_array($otherlist)) { foreach($otherlist as $value) { ?>
<!--<li style="height:auto;"><a href="space.php?uid=<?=$value['uid']?>&do=menuset&id=<?=$value['menusetid']?>"><?=$value['subject']?></a></li>
<?php } } ?>
<!--</ul>
</div>
<?php } ?>

<?php if($newlist) { ?>
<div class="sidebox">
<h2 class="title">热门应用导读</h2>
<ul class="news_list">
<?php if(is_array($newlist)) { foreach($newlist as $value) { ?>
<li style="height:auto;"><a href="space.php?uid=<?=$value['uid']?>" style="font-weight:bold;"><?=$_SN[$value['uid']]?></a>: <a href="space.php?uid=<?=$value['uid']?>&do=menuset&id=<?=$value['menusetid']?>"><?=$value['subject']?></a></li>
<?php } } ?>
</ul>
</div>
<?php } ?>

<?php if($menuset['related']) { ?>
<?php if(is_array($menuset['related'])) { foreach($menuset['related'] as $appid => $values) { ?>
<div class="sidebox">
<h2 class="title">您可能感兴趣的<?php if($_SGLOBAL['app'][$appid]['name']) { ?>(<?=$_SGLOBAL['app'][$appid]['name']?>)<?php } ?></h2>
<ul class="news_list">
<?php if(is_array($values['data'])) { foreach($values['data'] as $value) { ?>
<li style="height:auto;"><?=$value['html']?></li>
<?php } } ?>
</ul>
</div>
<?php } } ?>
<?php } ?>

</div>


<script type="text/javascript">
<!--
function closeSide2(oo) {
if($('sidebar').style.display == 'none'){
$('content').style.cssText = '';
$('sidebar').style.display = 'block';
oo.innerHTML = '&raquo; 关闭侧边栏';
}
else{
$('content').style.cssText = 'margin: 0pt; width: 810px;';
$('sidebar').style.display = 'none';
oo.innerHTML = '&laquo; 打开侧边栏';
}
}
function addFriendCall(){
var el = $('friendinput');
if(!el || el.value == "")	return;
var s = '<input type="checkbox" name="fusername[]" value="'+el.value+'" id="'+el.value+'" checked>';
s += '<label for="'+el.value+'">'+el.value+'</label>';
s += '<br />';
$('friends').innerHTML += s;
el.value = '';
}
resizeImg('menuset_article','700');
resizeImg('div_main_content','450');

//彩虹炫
var elems = selector('div[class~=magicflicker]'); 
for(var i=0; i<elems.length; i++){
magicColor(elems[i]);
}

-->
</script>


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