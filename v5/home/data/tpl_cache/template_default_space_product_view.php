<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/space_product_view|template/default/header|template/default/space_menu|template/default/space_click|template/default/space_comment_li|template/default/footer', '1370750970', 'template/default/space_product_view');?><?php $_TPL['titles'] = array($product['subject'], '企业介绍'); ?>
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
<div class="headerwarp">
<h1 class="logo"><a href="index.php"><img src="template/<?=$_SCONFIG['template']?>/image/logo.gif" alt="<?=$_SCONFIG['sitename']?>" /></a></h1>
<ul class="menu">
<?php if($_SGLOBAL['supe_uid']) { ?>
<li><a href="space.php?do=home">首页</a></li>
<li><a href="space.php?do=home">企业主页</a></li>
<li><a href="space.php?do=friend">粉丝列表</a></li>
<?php } else { ?>
<li><a href="index.php">首页</a></li>

<?php } ?>	
<?php if($_SGLOBAL['supe_uid']) { ?>
<li><a href="space.php?do=pm<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?>&filter=newpm<?php } ?>">消息<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?>(新)<?php } ?></a></li>
<?php if($_SGLOBAL['member']['allnotenum']) { ?><li class="notify" id="membernotemenu" onmouseover="showMenu(this.id)"><a href="space.php?do=notice"><?=$_SGLOBAL['member']['allnotenum']?>个提醒</a></li><?php } ?>
<?php } else { ?>
<li><a href="help.php">帮助</a></li>
<?php } ?>
</ul>

<div class="nav_account">
<?php if($_SGLOBAL['supe_uid']) { ?>
<a href="space.php?uid=<?=$_SGLOBAL['supe_uid']?>" class="login_thumb"><?php echo avatar($_SGLOBAL[supe_uid]); ?></a>
<a href="space.php?uid=<?=$_SGLOBAL['supe_uid']?>" class="loginName"><?=$_SN[$_SGLOBAL['supe_uid']]?></a>
<?php if($_SGLOBAL['member']['credit']) { ?>
<a href="cp.php?ac=credit" style="font-size:11px;padding:0 0 0 5px;"><img src="image/credit.gif"><?=$_SGLOBAL['member']['credit']?></a>
<?php } ?>
<br />
<?php if(empty($_SCONFIG['closeinvite'])) { ?>
<a href="cp.php?ac=invite">邀请</a> 
<?php } ?>
<a href="cp.php?ac=task">任务</a> 
<a href="cp.php?ac=magic">道具</a>
<a href="cp.php">设置</a> 
<a href="cp.php?ac=common&op=logout&uhash=<?=$_SGLOBAL['uhash']?>">退出</a>
<?php } else { ?>
<a href="do.php?ac=<?=$_SCONFIG['register_action']?>" class="login_thumb"><?php echo avatar($_SGLOBAL[supe_uid]); ?></a>
欢迎您<br>
<a href="do.php?ac=<?=$_SCONFIG['login_action']?>">登录</a> | 
<a href="do.php?ac=<?=$_SCONFIG['register_action']?>">注册</a>
<?php } ?>
</div>
</div>
</div>

<div id="wrap">

<div>
<?php if(empty($_TPL['nosidebar'])) { ?>

<?php if($zhong1) { ?>
<div id="main">

<div id="app_sidebar">
<?php if($_SGLOBAL['supe_uid']) { ?>
<ul class="app_list" id="default_userapp">
<li>基本组件</li>

<?php if(is_array($zhongwei)) { foreach($zhongwei as $value) { ?>
<li><img src="<?=$value['image2url']?>"><a href="<?=$value['url']?>"><?=$value['subject']?></a></li>

<?php } } ?>
<li>高级组件</li>
<li><img src="image/app/blog.gif"><a href="space.php?do=blog">客户管理</a></li>
<li><img src="image/app/blog.gif"><a href="space.php?do=blog">商品管理</a></li>
<li><img src="image/app/blog.gif"><a href="space.php?do=blog">订单管理</a></li>
<li><img src="image/app/blog.gif"><a href="space.php?do=blog">预约预订管理</a></li>
<li><img src="image/app/blog.gif"><a href="space.php?do=blog">焦点推荐</a></li>
<li><img src="image/app/blog.gif"><a href="space.php?do=blog">群发</a></li>
<li><img src="image/app/blog.gif"><a href="space.php?do=menuset&view=me">应用管理</a></li>
<li><img src="image/app/blog.gif"><a href="space.php?do=blog">选择手机模块</a></li>
</ul>

<ul class="app_list topline" id="my_defaultapp">
<?php if($_SCONFIG['my_status']) { ?>
<?php if(is_array($_SGLOBAL['userapp'])) { foreach($_SGLOBAL['userapp'] as $value) { ?>
<li><img src="http://appicon.manyou.com/icons/<?=$value['appid']?>"><a href="userapp.php?id=<?=$value['appid']?>"><?=$value['appname']?></a></li>
<?php } } ?>
<?php } ?>
</ul>

<?php if($_SCONFIG['my_status']) { ?>
<ul class="app_list topline" id="my_userapp">
<?php if(is_array($_SGLOBAL['my_menu'])) { foreach($_SGLOBAL['my_menu'] as $value) { ?>
<li id="userapp_li_<?=$value['appid']?>"><img src="http://appicon.manyou.com/icons/<?=$value['appid']?>"><a href="userapp.php?id=<?=$value['appid']?>" title="<?=$value['appname']?>"><?=$value['appname']?></a></li>
<?php } } ?>
</ul>
<?php } ?>

<?php if($_SGLOBAL['my_menu_more']) { ?>
<p class="app_more"><a href="javascript:;" id="a_app_more" onclick="userapp_open();" class="off">展开</a></p>
<?php } ?>

<?php if($_SCONFIG['my_status']) { ?>
<div class="app_m">
<ul>
<li><img src="image/app_add.gif"><a href="cp.php?ac=userapp&my_suffix=%2Fapp%2Flist" class="addApp">添加应用</a></li>
<li><img src="image/app_set.gif"><a href="cp.php?ac=userapp&op=menu" class="myApp">管理应用</a></li>
</ul>
</div>
<?php } ?>

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
<?php if($zhong1) { ?>
<div id="mainarea">
<?php } else { ?>
<div id="mainarea" style="width:970px;">
<?php } ?>

<?php if($_SGLOBAL['ad']['contenttop']) { ?><div id="ad_contenttop"><?php adshow('contenttop'); ?></div><?php } ?>
<?php } ?>

<?php } ?>


<?php if($space['self']) { ?>
<h2 class="title"><img src="image/app/blog.gif" /><?=$_SN[$space['uid']]?>>企业介绍</h2>

<?php } else { ?>
<?php $_TPL['spacetitle'] = "企业介绍";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=$do&view=me\">TA的所有企业介绍</a>";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=product&id=$product[productid]\">查看企业介绍</a>"; ?>
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
<h1<?php if($product['magiccolor']) { ?> class="magiccolor<?=$product['magiccolor']?>"<?php } ?>><?=$product['subject']?></h1>
<a href="cp.php?ac=product" class="r_option" style="padding: 0 5px; height: 24px; border: none; background: #FF8901; color: #FFF; line-height: 20px; letter-spacing: 1px; cursor: pointer; ">发布</a>
<?php if($product['order']) { ?><a href="cp.php?ac=product" class="r_option" style="padding: 0 5px; height: 24px; border: none; background: #FF8901; color: #FFF; line-height: 20px; letter-spacing: 1px; cursor: pointer;margin-right:20px; ">预订/预约</a><?php } ?>
<?php if($product['friend']) { ?>
<span class="r_option locked gray"><?=$friendsname[$product['friend']]?></span>
<?php } ?>
<?php if($product['hot']) { ?><span class="hot"><em>热</em><?=$product['hot']?></span><?php } ?>
<?php if($product['friend']) { ?>
<span class="r_option locked gray">
<a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=me&friend=<?=$product['friend']?>" class="gray"><?=$friendsname[$value['friend']]?></a>
</span>
<?php } ?>
<?php if($product['viewnum']) { ?><span class="gray">已有 <?=$product['viewnum']?> 次阅读</span><?php } ?>
&nbsp; <span class="gray"><?php echo sgmdate('Y-m-d H:i',$product[dateline],1); ?></span>
<?php if($product['tag']) { ?>
&nbsp;标签:
<?php if(is_array($product['tag'])) { foreach($product['tag'] as $tagid => $tagname) { ?>
<a href="#"><?=$tagname?></a>&nbsp;|
<?php } } ?>
<?php } ?>
<?php if($product['money']) { ?>
价格:<a href="#" ><?=$product['money']?></a>&nbsp;
<?php } ?>
</div>

<a href="#" class="r_option">预约/预定</a>

<div id="product_article" class="article <?php if($product['magicpaper']) { ?> magicpaper<?=$product['magicpaper']?><?php } ?>">
<div class="resizeimg">
<div class="resizeimg2">
<div class="resizeimg3">
<div class="resizeimg4">
<?php if($_SGLOBAL['ad']['rightside']) { ?>
<div style="float: right; padding:5px;"><?php adshow('rightside'); ?></div>
<?php } ?>
<?=$product['message']?>
</div>
</div>
</div>
</div>
</div>
</div>

<div style="padding:0 0 10px;">
<div style="text-align: right; padding-top:10px; ">




<?php if($_SGLOBAL['supe_uid'] == $product['uid'] || checkperm('manageproduct')) { ?>

<a href="cp.php?ac=product&productid=<?=$product['productid']?>&op=edit">编辑</a><span class="pipe">|</span>
<a href="cp.php?ac=product&productid=<?=$product['productid']?>&op=delete" id="blog_delete_<?=$product['productid']?>" onclick="ajaxmenu(event, this.id)">删除</a>
<?php } ?>

</div>

</div>

<div id="content" style="width:810px;">

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
<?php if(!$product['noreply']) { ?>
<a href="#quickcommentform_<?=$id?>" class="r_option">发表评论</a>
<?php } ?>
评论 (<span id="comment_replynum"><?=$product['replynum']?></span> 个评论)</h2>
<div class="page"><?=$multi?></div>
<div class="comments_list" id="comment">
<?php if($cid) { ?>
<div class="notice">
当前只显示与你操作相关的单个评论，<a href="space.php?uid=<?=$product['uid']?>&do=product&id=<?=$product['productid']?>">点击此处查看全部评论</a>
</div>
<?php } ?>
<ul id="comment_ul">
<?php if(is_array($list)) { foreach($list as $value) { ?>
<?php if(empty($ajax_edit)) { ?><li id="comment_<?=$value['cid']?>_li"><?php } ?>
<?php if($value['author']) { ?>
<div class="avatar48"><a href="space.php?uid=<?=$value['authorid']?>"><?php echo avatar($value[authorid],small); ?></a></div>
<?php } else { ?>
<div class="avatar48"><img src="image/magic/hidden.gif" class="avatar" /></div>
<?php } ?>
<div class="title">
<div class="r_option">

<?php if($value['authorid'] != $_SGLOBAL['supe_uid'] && $value['author'] == "" && $_SGLOBAL['magic']['reveal']) { ?>
<a id="a_magic_reveal_<?=$value['cid']?>" href="magic.php?mid=reveal&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id,1)"><img src="image/magic/reveal.small.gif" class="magicicon"><?=$_SGLOBAL['magic']['reveal']?></a>
<span class="pipe">|</span>
<?php } ?>

<?php if($value['authorid']==$_SGLOBAL['supe_uid']) { ?>
<?php if($_SGLOBAL['magic']['anonymous']) { ?>
<img src="image/magic/anonymous.small.gif" class="magicicon">
<a id="a_magic_anonymous_<?=$value['cid']?>" href="magic.php?mid=anonymous&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['anonymous']?></a>
<span class="pipe">|</span>
<?php } ?>
<?php if($_SGLOBAL['magic']['flicker']) { ?>
<img src="image/magic/flicker.small.gif" class="magicicon">
<?php if($value['magicflicker']) { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="cp.php?ac=magic&op=cancelflicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id)">取消<?=$_SGLOBAL['magic']['flicker']?></a>
<?php } else { ?>
<a id="a_magic_flicker_<?=$value['cid']?>" href="magic.php?mid=flicker&idtype=cid&id=<?=$value['cid']?>" onclick="ajaxmenu(event,this.id, 1)"><?=$_SGLOBAL['magic']['flicker']?></a>
<?php } ?>
<span class="pipe">|</span>
<?php } ?>

<a href="cp.php?ac=comment&op=edit&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_edit" onclick="ajaxmenu(event, this.id, 1)">编辑</a>
<?php } ?>
<?php if($value['authorid']==$_SGLOBAL['supe_uid'] || $value['uid']==$_SGLOBAL['supe_uid'] || checkperm('managecomment')) { ?>
<a href="cp.php?ac=comment&op=delete&cid=<?=$value['cid']?>" id="c_<?=$value['cid']?>_delete" onclick="ajaxmenu(event, this.id)">删除</a>
<?php } ?>
<?php if($value['authorid']!=$_SGLOBAL['supe_uid'] && ($value['idtype'] != 'uid' || $space['self'])) { ?>
<a href="cp.php?ac=comment&op=reply&cid=<?=$value['cid']?>&feedid=<?=$feedid?>" id="c_<?=$value['cid']?>_reply" onclick="ajaxmenu(event, this.id, 1)">回复</a>
<?php } ?>
<a href="cp.php?ac=common&op=report&idtype=comment&id=<?=$value['cid']?>" id="a_report_<?=$value['cid']?>" onclick="ajaxmenu(event, this.id, 1)">举报</a>
</div>

<?php if($value['author']) { ?>
<a href="space.php?uid=<?=$value['authorid']?>" id="author_<?=$value['cid']?>"><?=$_SN[$value['authorid']]?></a> 
<?php } else { ?>
匿名
<?php } ?>
<span class="gray"><?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?></span>

</div>

<div class="detail<?php if($value['magicflicker']) { ?> magicflicker<?php } ?>" id="comment_<?=$value['cid']?>"><?=$value['message']?></div>

<?php if(empty($ajax_edit)) { ?></li><?php } ?>
<?php } } ?>
</ul>
</div>
<div class="page"><?=$multi?></div>

<?php if(!$product['noreply']) { ?>
<form id="quickcommentform_<?=$id?>" name="quickcommentform_<?=$id?>" action="cp.php?ac=comment" method="post" class="quickpost">

<table cellpadding="0" cellspacing="0">
<tr>
<td>
<a href="###" id="comment_face" title="插入表情" onclick="showFace(this.id, 'comment_message');return false;"><img src="image/facelist.gif" align="absmiddle" /></a>
<?php if($_SGLOBAL['magic']['doodle']) { ?>
<a id="a_magic_doodle" href="magic.php?mid=doodle&showid=comment_doodle&target=comment_message" onclick="ajaxmenu(event, this.id, 1)"><img src="image/magic/doodle.small.gif" class="magicicon" />涂鸦板</a>
<?php } ?>
<br />
<textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="5" style="width:690px;height:75px;float:left;"></textarea>
<input type="button" style=" margin: 0 10px 0; width: 80px; height: 80px; border: none; background: url(template/default/image/post_button.jpg); text-indent: -300px; overflow: hidden; cursor: pointer;" id="commentsubmit_btn" name="commentsubmit_btn" class="submit" value="评论" onclick="ajaxpost('quickcommentform_<?=$id?>', 'comment_add')" />
</td>
</tr>
<tr>
<td>
<input type="hidden" name="refer" value="space.php?uid=<?=$product['uid']?>&do=<?=$do?>&id=<?=$id?>" />
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="idtype" value="productid">
<input type="hidden" name="commentsubmit" value="true" />

<div id="__quickcommentform_<?=$id?>"></div>
</td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" /></form>
<br />
<?php } ?>
</div>

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
resizeImg('product_article','700');
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
<div class="footerbar">
<div class="fbtop"></div>
<div class="nbox_c">
<div class="foobox">
<div class="fbox">
<h2 class="ntitle">使用帮助</h2>
<ul>
<li><a href="#">开通流程</a></li>
<li><a href="#">管理员手册</a></li>
<li><a href="#">用户手册</a></li>
</ul>
</div>
<div class="fbox">
<h2 class="ntitle">投诉与建议</h2>
<ul>
<li><a href="#">在线客服</a></li>
<li><a href="#">留言板</a></li>
</ul>
</div>
<div class="fbox">
<h2 class="ntitle">合作</h2>
<ul>
<li><a href="#">品牌企业合作</a></li>
<li><a href="#">媒体合作</a></li>
<li><a href="#">收费细则</a></li>
</ul>
</div>
</div>
</div>
<div class="nbox_s">
<h2 class="ntitle">关于我们</h2>
<ul>
<li><a href="cp.php?ac=invite">企业介绍</a></li>
<li><a href="cp.php?ac=invite">联系方式</a></li>
<li><a href="cp.php?ac=invite">人才招聘</a></li>
</ul>
</div>
<div class="fbbottom"></div>
</div>

</div>
<div id="footer">
<?php if($_TPL['templates']) { ?>
<div class="chostlp" title="切换风格"><img id="chostlp" src="<?=$_TPL['default_template']['icon']?>" onmouseover="showMenu(this.id)" alt="<?=$_TPL['default_template']['name']?>" /></div>
<ul id="chostlp_menu" class="chostlp_drop" style="display: none">
<?php if(is_array($_TPL['templates'])) { foreach($_TPL['templates'] as $value) { ?>
<li><a href="cp.php?ac=common&op=changetpl&name=<?=$value['name']?>" title="<?=$value['name']?>"><img src="<?=$value['icon']?>" alt="<?=$value['name']?>" /></a></li>
<?php } } ?>
</ul>
<?php } ?>

<p class="r_option">
<a href="javascript:;" onclick="window.scrollTo(0,0);" id="a_top" title="TOP"><img src="image/top.gif" alt="" style="padding: 5px 6px 6px;" /></a>
</p>

<?php if($_SGLOBAL['ad']['footer']) { ?>
<p style="padding:5px 0 10px 0;"><?php adshow('footer'); ?></p>
<?php } ?>

<?php if($_SCONFIG['close']) { ?>
<p style="color:blue;font-weight:bold;">
提醒：当前站点处于关闭状态
</p>
<?php } ?>

<p>
版权所有:广州市宏门网络科技有限公司 ICP:粤A-XXXXXXXX
</p>
<?php if($_SCONFIG['debuginfo']) { ?>
<p><?php echo debuginfo(); ?></p>
<?php } ?>
</div>
</div>
<!--/wrap-->

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