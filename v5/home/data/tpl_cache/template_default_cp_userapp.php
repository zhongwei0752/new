<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/cp_userapp|template/default/header|template/default/footer', '1370762162', 'template/default/cp_userapp');?><?php $_TPL['titles'] = array('管理我的应用'); ?>
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


<div class="app_m">
<ul>
<li><img src="image/app_add.gif"><a href="cp.php?ac=userapp&my_suffix=%2Fapp%2Flist" class="addApp">添加应用</a></li>
<li><img src="image/app_set.gif"><a href="cp.php?ac=userapp&op=menu" class="myApp">管理应用</a></li>
</ul>
</div>


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


<?php if($_GET['op'] == 'menu') { ?>

<h2 class="title"><img src="image/app/setting.gif">管理我的应用</h2>
<div class="tabs_header">
<ul class="tabs">
<li class="active"><a href="cp.php?ac=userapp&op=menu"><span>管理我的应用</span></a></li>
<li class="null"><a href="cp.php?ac=userapp&my_suffix=%2Fapp%2Flist">添加新应用</a></li>
</ul>
</div>

<div id="content">
<style type="text/css">
.DragBox {
 height:20px;padding: 7px; z-index:9999; border-bottom:1px dotted #CDCDCD; width:500px;padding-left:30px;background:url(image/drag.gif) no-repeat 7px 8px;
}
.l_option{float:left;}

.OverDragBox {
height:20px;padding: 7px;  cursor: move;border-bottom:1px dotted #CDCDCD;width:500px;padding-left:30px;background:#efefef url(image/drag.gif) no-repeat 7px 8px;
}

.DragDragBox {
height:20px;padding: 7px; cursor:move; opacity: 0.5;filter: alpha(opacity=50); border:1px dashed #BDD6FB;width:500px; color:#666; padding-left:30px;background:#efefef url(image/drag.gif) no-repeat 7px 8px;
}

</style>
<?php if($my_default_userapp) { ?>
<div class="DragBox mt15" style="padding-left:30px;padding-bottom:0px;background:none;">
<div class="l_option" style="width:350px;">默认应用</div>
<div class="l_option" style="width:100px;">&nbsp;</div>
<div class="l_option" style="width:50px;">&nbsp;</div>
</div>
<div>
<?php if(is_array($my_default_userapp)) { foreach($my_default_userapp as $value) { ?>
<div class="DragBox mt15" style="padding-left:30px;padding-bottom:0px;background:none;">
<div class="l_option" style="width:350px;"><img src="http://appicon.manyou.com/icons/<?=$value['appid']?>"> <a href="userapp.php?id=<?=$value['appid']?>"><?=$value['appname']?></a></div>
<div class="l_option" style="width:100px;"><a href="cp.php?ac=userapp&amp;my_suffix=%2Fuserapp%2FmodifyPrivacy%3FappId%3D<?=$value['appid']?>">编辑设置</a></div>
<div class="l_option" style="width:50px;">
<a href="cp.php?ac=userapp&op=deleteapp&appid=<?=$value['appid']?>" id="del_default_app_<?=$value['appid']?>" onclick="ajaxmenu(event, this.id)">移除</a>
</div>
</div>
<?php } } ?>
</div>
<br />
<?php } ?>

<?php if($my_userapp) { ?>

<script language="javascript" type="text/javascript" src="source/script_drag.js"></script>


<div class="DragBox mt15" style="padding-left:30px;padding-bottom:0px;background:none;">
<div class="l_option" style="width:350px;">我的应用</div>
<div class="l_option" style="width:100px;">&nbsp;</div>
<div class="l_option" style="width:50px;">&nbsp;</div>
</div>

<form id="userappform" name="userappform" method="post" action="cp.php?ac=userapp&op=menu">
<fieldset id="Drags0" style="border:none;">
<div id="DragContainer0">
<?php if(is_array($my_userapp)) { foreach($my_userapp as $key => $value) { ?>
<div class="DragBox" overclass="OverDragBox"  dragclass="DragDragBox" id="<?=$key?>" style="padding-bottom:0;">
<div class="l_option" style="width:350px;">
<img src="http://appicon.manyou.com/icons/<?=$value['appid']?>"> <a href="userapp.php?id=<?=$value['appid']?>"><?=$value['appname']?></a>(<a href="cp.php?ac=userapp&my_suffix=%2Fuserapp%2Fabout%3FappId%3D<?=$value['appid']?>" target="_blank">介绍</a>)
<input type="hidden" name="order[]" value="<?=$value['appid']?>">
</div>
<div class="l_option" style="width:100px;">
<a href="cp.php?ac=userapp&amp;my_suffix=%2Fuserapp%2FmodifyPrivacy%3FappId%3D<?=$value['appid']?>">编辑设置</a>
</div>
<div class="l_option" style="width:50px;">
<a href="cp.php?ac=userapp&op=deleteapp&appid=<?=$value['appid']?>" id="del_app_<?=$value['appid']?>" onclick="ajaxmenu(event, this.id)">移除</a>
</div>
</div>
<?php } } ?>
</div>
</fieldset>
<script type="text/javascript">init_drag2();</script>


<center>
<br>
左侧菜单显示个性应用的数量
<select name="menunum">
<option value="5"<?=$menunum['5']?>>5</option>
<option value="10"<?=$menunum['10']?>>10</option>
<option value="15"<?=$menunum['15']?>>15</option>
<option value="20"<?=$menunum['20']?>>20</option>
<option value="25"<?=$menunum['25']?>>25</option>
<option value="30"<?=$menunum['30']?>>30</option>
<option value="999"<?=$menunum['999']?>>全部</option>
</select> &nbsp;
<input type="submit" name="ordersubmit" value="保存设置" class="submit" /></center>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
<?php } else { ?>
<div class="c_form">还没有可以自定义的应用菜单，请先<a href="cp.php?ac=userapp&my_suffix=%2Fapp%2Flist">添加新应用</a></div>
<?php } ?>
</div>

<div id="sidebar">
<div class="c_mgs"><div class="ye_r_t"><div class="ye_l_t"><div class="ye_r_b"><div class="ye_l_b">
<strong>使用助手</strong>：
<br>1.您可以自由拖拽 <img src="image/drag.gif" /> 排列应用顺序；
<br>2.排列越上面的应用在菜单中显示的越靠前；
<br>3.您可以管理您已经添加的应用，可以设置某个应用的权限、移除某个应用；
<br>4.如果您要管理您的空间、日志、相册等隐私，请到您的空间隐私设置；
<br>5.默认应用只能进行相关设置与移除，但移除后仍然会显示在你的左侧菜单中。
</div></div></div></div></div>
</div>

<?php } elseif($_GET['op'] == 'deleteapp') { ?>

<h1>移除应用</h1>
<a href="javascript:hideMenu();" class="float_del" title="关闭">关闭</a>
<div class="popupmenu_inner" id="<?=$_GET['appId']?>">
<form id="reportform" name="reportform" method="post" action="cp.php?ac=userapp&my_suffix=%2Fuserapp%2Funinstall%3FappId%3D<?=$_GET['appid']?>">
<p>移除后，您的个人主页、开始菜单、管理我的应用<br/>将不会显示此应用，您以后需要重新添加才能使用。<br>确定继续吗？</p>
<p class="btn_line">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>" />
<input type="submit" name="delappsubmit" value="确定" class="submit" />
</p>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>
<?php } else { ?>

<script language="JavaScript" src="source/script_cookie.js"></script>
<script type="text/javascript" src="http://static.manyou.com/scripts/my_iframe.js"></script>
<script language="javascript">
var prefixURL = "<?=$my_prefix?>";
var suffixURL = "<?=$my_suffix?>";
var queryString = '';
var url = "<?=$url?>";
var oldHash = null;
var timer = null;
var server = new MyXD.Server("ifm0");
server.registHandler('iframeHasLoaded');
server.registHandler('setTitle');
server.start();

function iframeHasLoaded(ifm_id) {
        MyXD.Util.showIframe(ifm_id);
        //document.getElementById(ifm_id).style.display = '';
        document.getElementById('loading').style.display = 'none';
}

function  htmlspecialchars_decode(string) {
string = string.toString();
string = string.replace(/&amp;/g, '&');
string = string.replace(/&lt;/g, '<');
string = string.replace(/&gt;/g, '>');
string = string.replace(/&quot;/g, '"');
string = string.replace(/&#039;/g, "'");
return string;

}

function setTitle(x) {
<?php $my_site_name=htmlspecialchars($_SCONFIG['sitename'], ENT_QUOTES); ?>
var my_site_name = htmlspecialchars_decode('<?=$my_site_name?>');

x = htmlspecialchars_decode(x);
document.title = x + ' - <?php if($space) { ?><?php echo saddslashes($_SN[$space[uid]]) ?> - <?php } ?>' + my_site_name + ' - Powered by UCenter Home';
}

</script>
<iframe id="ifm0" frameborder="0" width="810" scrolling="no" height="810" style="position:absolute; top:-5000px; left:-5000px;" src="<?=$url?>"></iframe>


<div id="mx2note" style="display:none; padding:150px 0 150px 0; margin:1px; text-align:center; background-color:#FFFFBF;  font-size:12px; line-height:14px; color:#DB0000; letter-spacing:1px;">
本页面暂时不支持遨游2浏览器, 请您使用IE或Firefox, 我们对由此给您带来的不便深表歉意
</div>
<div id="loading" style="display:block; padding:100px 0 100px 0;text-align:center;color:#999999;font-size:12px;">
<img src="image/my/loading.gif" alt="loading..." style="position:relative;top:11px;"/>  页面加载中...
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