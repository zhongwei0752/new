<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/space_menuset_list|template/default/header|template/default/space_menu|template/default/footer', '1370774545', 'template/default/space_menuset_list');?><?php $_TPL['titles'] = array('应用'); ?>
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


<?php if(!empty($_SGLOBAL['inajax'])) { ?>
<div id="space_menuset" class="feed">
<h3 class="feed_header">
<a href="cp.php?ac=menuset" class="r_option" target="_blank">发表应用</a>
应用(共 <?=$count?> 篇)
</h3>
<?php if($count) { ?>
<ul class="line_list">
<?php if(is_array($list)) { foreach($list as $value) { ?>
<li>
<span class="gray r_option"><?php echo sgmdate('m-d H:i',$value[dateline],1); ?></span>
<h4><a href="space.php?uid=<?=$space['uid']?>&do=menuset&id=<?=$value['menusetid']?>" target="_blank" <?php if($value['magiccolor']) { ?> class="magiccolor<?=$value['magiccolor']?>"<?php } ?>><?=$value['subject']?></a></h4>
<div class="detail">
<?=$value['message']?>
</div>
</li>
<?php } } ?>
</ul>
<?php if($pricount) { ?>
<div class="c_form">本页有 <?=$pricount?> 篇应用因作者的隐私设置而隐藏</div>
<?php } ?>
<div class="page"><?=$multi?></div>
<?php } else { ?>
<div class="c_form">还没有相关的应用。</div>
<?php } ?>
</div>
<?php } else { ?>

<?php if($space['self']) { ?>
<?php if($zhong1) { ?>
<div class="searchbar floatright">
<form method="get" action="space.php">
<input name="searchkey" value="" size="15" class="t_input" type="text">
<input name="searchsubmit" value="搜索应用" class="submit" type="submit">
<input type="hidden" name="searchmode" value="1" />
<input type="hidden" name="do" value="menuset" />
<input type="hidden" name="view" value="all" />
<input type="hidden" name="orderby" value="dateline" />
</form>
</div>

<h2 class="title"><img src="image/app/blog.gif" />应用</h2>
<div class="tabs_header">
<ul class="tabs">
<?php if($space['friendnum']) { ?><li<?=$actives['we']?>><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=we"><span>好友最新应用</span></a></li><?php } ?>
<li<?=$actives['all']?>><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=all"><span>大家的应用</span></a></li>
<li<?=$actives['me']?>><a href="space.php?uid=<?=$space['uid']?>&do=<?=$do?>&view=me"><span>我的应用</span></a></li>
<?php if($_SN[$_SGLOBAL['supe_uid']]=='admin') { ?><li class="null"><a href="cp.php?ac=menuset">发表新应用</a></li><?php } ?>
</ul>
</div>	
<?php } ?>	
<?php } else { ?>
<?php $_TPL['spacetitle'] = "应用";
	$_TPL['spacemenus'][] = "<a href=\"space.php?uid=$space[uid]&do=$do&view=me\">TA的所有应用</a>"; ?>
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
<?php if($zhong1) { ?>
<div id="content" style="width:640px;">
<?php } else { ?>
<div id="content" style="width:640px;margin:0 auto;float:center;">
<?php } ?>
<?php if($_GET['orderby'] && $_GET['orderby'] != 'dateline') { ?>
<div class="h_status">
排行时间范围：
<a href="space.php?do=menuset&view=all&orderby=<?=$_GET['orderby']?>"<?=$day_actives['0']?>>全部</a><span class="pipe">|</span>
<a href="space.php?do=menuset&view=all&orderby=<?=$_GET['orderby']?>&day=1"<?=$day_actives['1']?>>最近一天</a><span class="pipe">|</span>
<a href="space.php?do=menuset&view=all&orderby=<?=$_GET['orderby']?>&day=2"<?=$day_actives['2']?>>最近两天</a><span class="pipe">|</span>
<a href="space.php?do=menuset&view=all&orderby=<?=$_GET['orderby']?>&day=7"<?=$day_actives['7']?>>最近七天</a><span class="pipe">|</span>
<a href="space.php?do=menuset&view=all&orderby=<?=$_GET['orderby']?>&day=30"<?=$day_actives['30']?>>最近三十天</a><span class="pipe">|</span>
<a href="space.php?do=menuset&view=all&orderby=<?=$_GET['orderby']?>&day=90"<?=$day_actives['90']?>>最近三个月</a><span class="pipe">|</span>
<a href="space.php?do=menuset&view=all&orderby=<?=$_GET['orderby']?>&day=120"<?=$day_actives['120']?>>最近六个月</a>
</div>
<?php } ?>

<?php if($searchkey) { ?>
<div class="h_status">以下是搜索应用 <span style="color:red;font-weight:bold;"><?=$searchkey?></span> 结果列表</div>
<?php } ?>

<?php if($count) { ?>
<div class="entry_list">
<ul>
<form action = "space.php?do=menuset" method = "post">

<?php if(is_array($list)) { foreach($list as $value) { ?>
<li>
<div class="avatardiv">
<div class="avatar48"><img src="<?=$value['image1url']?>"/></div>
<?php if($value['hot']) { ?><div class="digb"><?=$value['hot']?></div><?php } ?>
</div>

<div class="title">

<h4><a href="space.php?uid=<?=$value['uid']?>&do=<?=$do?>&id=<?=$value['menusetid']?>" <?php if($value['magiccolor']) { ?> class="magiccolor<?=$value['magiccolor']?>"<?php } ?>><?=$value['subject']?></a></h4><br/><?php if($value['money']) { ?>单价:<?=$value['money']?>元/月<?php } else { ?>单价:免费<?php } ?><?php if($_GET['view']!='me') { ?><?php if($value['money']) { ?><input type="checkbox" id="num<?=$value['menusetid']?>" name="<?=$value['subject']?>" value ="<?=$value['menusetid']?>"/><?php } else { ?><input type="checkbox" id="num<?=$value['menusetid']?>" name="<?=$value['subject']?>" value ="<?=$value['menusetid']?>"  <?php if(!$zhongwei) { ?>checked<?php } ?>/><?php if(!$zhongwei) { ?><div id="numh<?=$value['menusetid']?>">你要订购<input type='text' name='<?=$value['menusetid']?>' value='1' style='width:20px;' />月</div><?php } ?><?php } ?><div id="numh<?=$value['menusetid']?>"></div><?php $value1=$value['wei']; ?><?php if($value1['num']==$value['menusetid']) { ?>（已订购<?=$value1['month']?>个月）<br/>有效期至:<?php echo sgmdate('Y-m-d H:i:s',$value1[endtime]); ?><?php } ?><?php } ?>

<div>

<?php if($value['friend']) { ?>
<span class="r_option locked gray"><a href="<?=$theurl?>&friend=<?=$value['friend']?>" class="gray"><?=$friendsname[$value['friend']]?></a></span>
<?php } ?>
<span class="gray"><?php if($_GET['view']=='me') { ?><br/>有效期:<?php echo sgmdate('Y-m-d H:i',$value[dateline],1); ?>--<?php echo sgmdate('Y-m-d H:i:s',$value[endtime]); ?><?php } ?></span>
</div>
</div>
<div class="detail image_right l_text s_clear" id="menuset_article_<?=$value['menusetid']?>">
<?php if($value['pic']) { ?><p class="image"><a href="space.php?uid=<?=$value['uid']?>&do=menuset&id=<?=$value['menusetid']?>"><img src="<?=$value['pic']?>" alt="<?=$value['subject']?>" /></a></p><?php } ?>
<?=$value['message']?>
</div>
<div class="gray">

</div>
</li>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
$(document).ready(function()
{
    		
$("#num<?=$value['menusetid']?>").click(function(){
if($("#num<?=$value['menusetid']?>").attr("checked")==true){
    		$("#numh<?=$value['menusetid']?>").html("你要订购<input type='text' name='<?=$value['menusetid']?>' value='1' style='width:20px;' />月");
    	}else{
    		$("#numh<?=$value['menusetid']?>").html("");
    	}
 				});
});
</script>
<?php } } ?>
<?php if($_GET['view']!='me') { ?>
<input type="submit" value="提交" >
<?php } ?>
</form>
<?php if($pricount) { ?>
<li>
<div class="title">本页有 <?=$pricount?> 篇应用因作者的隐私设置而隐藏</div>
</li>
<?php } ?>
</ul>
</div>

<div class="page"><?=$multi?></div>

<?php } else { ?>
<div class="c_form">还没有相关的应用。</div>
<?php } ?>

</div>

<div id="sidebar" style="width:150px;">

<?php if($userlist) { ?>
<div class="cat">
<h3>按好友查看</h3>
<ul class="post_list line_list">
<li>
选择好友:<br>
<select name="fuidsel" onchange="fuidgoto(this.value);">
<option value="">全部好友</option>
<?php if(is_array($userlist)) { foreach($userlist as $value) { ?>
<option value="<?=$value['fuid']?>"<?=$fuid_actives[$value['fuid']]?>><?=$_SN[$value['fuid']]?></option>
<?php } } ?>
</select>
</li>
</ul>
</div>
<?php } ?>

<?php if($classarr) { ?>
<div class="cat">
<h3>应用分类</h3>
<ul class="post_list line_list">
<li<?php if(!$_GET['classid']) { ?> class="current"<?php } ?>><a href="space.php?uid=<?=$space['uid']?>&do=menuset&view=me">全部应用</a></li>
<?php if(is_array($classarr)) { foreach($classarr as $classid => $classname) { ?>
<li<?php if($_GET['classid']==$classid) { ?> class="current"<?php } ?>>
<?php if($space['self']) { ?>
<a href="cp.php?ac=class&op=edit&classid=<?=$classid?>" id="c_edit_<?=$classid?>" onclick="ajaxmenu(event, this.id)" class="c_edit">编辑</a>
<a href="cp.php?ac=class&op=delete&classid=<?=$classid?>" id="c_delete_<?=$classid?>" onclick="ajaxmenu(event, this.id)" class="c_delete">删除</a>
<?php } ?>
<a href="space.php?uid=<?=$space['uid']?>&do=menuset&classid=<?=$classid?>&view=me"><?=$classname?></a>
</li>
<?php } } ?>
</ul>
</div>
<?php } ?>



</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
function fuidgoto(fuid) {
window.location.href = "space.php?do=menuset&view=we&fuid="+fuid;
}

$(document).ready(function()
{
    $("#numhidden<?=$value['menusetid']?>").hide();
$("#num").click(function(){
    $("#numhidden").hide();
 	});
});
</script>
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
<?php } ?><?php ob_out();?>