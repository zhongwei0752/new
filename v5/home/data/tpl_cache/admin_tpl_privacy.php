<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('admin/tpl/privacy|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/default/header|template/default/footer', '1370770163', 'admin/tpl/privacy');?><?php $_TPL['menunames'] = array(
		'index' => '管理首页',
		'config' => '站点设置',
		'privacy' => '隐私设置',
		'usergroup' => '用户组',
		'credit' => '积分规则',
		'profilefield' => '用户栏目',
		'profield' => '群组栏目',
		'eventclass' => '活动分类',
		'magic' => '道具设置',
		'task' => '有奖任务',
		'spam' => '防灌水设置',
		'censor' => '词语屏蔽',
		'ad' => '广告设置',
		'userapp' => 'MYOP应用',
		'app' => 'UCenter应用',
		'network' => '随便看看',
		'cache' => '缓存更新',
		'log' => '系统log记录',
		'space' => '用户管理',
		'feed' => '动态(feed)',
		'share' => '分享',
		'blog' => '日志',
		'album' => '相册',
		'pic' => '图片',
		'comment' => '评论/留言',
		'thread' => '话题',
		'post' => '回帖',
		'doing' => '记录',
		'tag' => '标签',
		'mtag' => '群组',
		'poll' => '投票',
		'event' => '活动',
		'magiclog' => '道具记录',
		'report' => '举报',
		'block' => '数据调用',
		'template' => '模板编辑',
		'backup' => '数据备份',
		'stat' => '统计更新',
		'cron' => '系统计划任务',
		'click' => '表态动作',
		'ip' => '访问IP设置',
		'hotuser' => '推荐成员设置',
		'defaultuser' => '默认好友设置',
		'introduce' => '企业介绍',
		'product' => '产品介绍',
		'development' => '企业动态',
		'industry' => '行业动态',
		'cases' => '成功案例',
		'branch' => '分支机构',
		'job' => '人才招聘',
		'talk' => '在线沟通'
	); ?>
<?php $_TPL['nosidebar'] = 1; ?>
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


<style type="text/css">
@import url(admin/tpl/style.css);
</style>

<div id="cp_content">


<div class="mainarea">
<div class="maininner">

<form method="post" action="admincp.php?ac=privacy">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />

<div class="bdrcontent">

<div class="title">
<h3>系统开放程度</h3>
<p>可以根据自己的需求，决定系统的内容开放程度。</p>
</div>

<table class="formtable">
<tr>
<th style="width:12em;">游客开放浏览</th>
<td>
<input type="radio" name="config[networkpublic]" value="1"<?php if($configs['networkpublic'] == 1) { ?> checked<?php } ?>>是
<input type="radio" name="config[networkpublic]" value="0"<?php if($configs['networkpublic'] == 0) { ?> checked<?php } ?>>否
<br>用户不需要登录也能浏览随便看看、未设置隐私的个人空间，同时，站内的信息也可以被搜索引擎收录。</td>
</tr>
</table>
<br>

<div class="title">
<h3>新用户默认隐私设置</h3>
<p>新用户将采用站内的默认隐私设置。用户可以修改自己的隐私设置，以下设置只对其他用户访问个人主页生效</p>
</div>

<table class="formtable">
<tr>
<th style="width:12em;">空间首页</th>
<td><select name="privacy[view][index]">
<option value="0"<?=$sels['view']['index']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['index']['1']?>>仅好友可见</option>
<option value="2"<?=$sels['view']['index']['2']?>>仅自己可见</option>
</select></td>
</tr>
<tr>
<th>好友列表</th>
<td><select name="privacy[view][friend]">
<option value="0"<?=$sels['view']['friend']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['friend']['1']?>>仅好友可见</option>
<option value="2"<?=$sels['view']['friend']['2']?>>仅自己可见</option>
</select></td>
</tr>
<tr>
<th>留言板</th>
<td><select name="privacy[view][wall]">
<option value="0"<?=$sels['view']['wall']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['wall']['1']?>>仅好友可见</option>
<option value="2"<?=$sels['view']['wall']['2']?>>仅自己可见</option>
</select></td>
</tr>
<tr>
<th>个人动态</th>
<td><select name="privacy[view][feed]">
<option value="0"<?=$sels['view']['feed']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['feed']['1']?>>仅好友可见</option>
</select></td>
</tr>
<tr>
<th>群组</th>
<td><select name="privacy[view][mtag]">
<option value="0"<?=$sels['view']['mtag']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['mtag']['1']?>>仅好友可见</option>
<option value="2"<?=$sels['view']['mtag']['2']?>>仅自己可见</option>
</select>

</td>
</tr>
<tr>
<th>活动</th>
<td><select name="privacy[view][event]">
<option value="0"<?=$sels['view']['event']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['event']['1']?>>仅好友可见</option>
</select>
</td>
</tr>
<tr>
<th>记录</th>
<td><select name="privacy[view][doing]">
<option value="0"<?=$sels['view']['doing']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['doing']['1']?>>仅好友可见</option>
</select><br/>
在全站的记录列表中可能会出现记录信息。 
</td>
</tr>
<tr>
<th>日志</th>
<td><select name="privacy[view][blog]">
<option value="0"<?=$sels['view']['blog']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['blog']['1']?>>仅好友可见</option>
</select><br/>
相关浏览权限需要在每篇日志中单独设置方可完全生效。
</td>
</tr>
<tr>
<th>相册</th>
<td><select name="privacy[view][album]">
<option value="0"<?=$sels['view']['album']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['album']['1']?>>仅好友可见</option>
</select><br/>
相关浏览权限需要在每个相册中单独设置方可完全生效。
</tr>
<tr>
<th>分享</th>
<td><select name="privacy[view][share]">
<option value="0"<?=$sels['view']['share']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['share']['1']?>>仅好友可见</option>
</select><br/>
在全站的分享列表中可能会出现分享信息。 
</td>
</tr>
<tr>
<th>投票</th>
<td><select name="privacy[view][poll]">
<option value="0"<?=$sels['view']['poll']['0']?>>全站用户可见</option>
<option value="1"<?=$sels['view']['poll']['1']?>>仅好友可见</option>
</select><br/>
在全站的投票列表中可能会出现投票信息。 
</td>
</tr>
</table>

<br>

<div class="title">
<h3>默认动态发布设置</h3>
<p>设置系统默认将哪些动作发布到个人动态里面。用户可以修改这些默认设置。</p>
</div>
<table class="formtable">
<tr>
<th style="width:12em;">&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][doing]" value="1"<?=$sels['feed']['doing']?>>记录</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][blog]" value="1"<?=$sels['feed']['blog']?>>撰写日志</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][upload]" value="1"<?=$sels['feed']['upload']?>>上传图片</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][share]" value="1"<?=$sels['feed']['share']?>>添加分享</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][poll]" value="1"<?=$sels['feed']['poll']?>>发起投票</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][joinpoll]" value="1"<?=$sels['feed']['joinpoll']?>>参与投票</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][thread]" value="1"<?=$sels['feed']['thread']?>>发起话题</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][post]" value="1"<?=$sels['feed']['post']?>>对话题回复</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][mtag]" value="1"<?=$sels['feed']['mtag']?>>加入群组</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][event]" value="1"<?=$sels['feed']['event']?>>组织活动</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][join]" value="1"<?=$sels['feed']['join']?>>参加活动</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][friend]" value="1"<?=$sels['feed']['friend']?>>添加好友</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][comment]" value="1"<?=$sels['feed']['comment']?>>发表评论/留言</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][show]" value="1"<?=$sels['feed']['show']?>>竞价排名</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][credit]" value="1"<?=$sels['feed']['credit']?>>积分消费</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][spaceopen]" value="1"<?=$sels['feed']['spaceopen']?>>新空间开通</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][invite]" value="1"<?=$sels['feed']['invite']?>>邀请好友</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][task]" value="1"<?=$sels['feed']['task']?>>完成任务</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][profile]" value="1"<?=$sels['feed']['profile']?>>更新个人资料</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="checkbox" name="privacy[feed][click]" value="1"<?=$sels['feed']['click']?>>对日志/图片/话题表态</td>
</tr>
</table>

</div>

<div class="footactions">
<input type="submit" name="thevaluesubmit" value="提交" class="submit">
</div>

</form>
</div>
</div>

<div class="side">
<?php if($menus['0']) { ?>
<div class="block style1">
<h2>基本设置</h2>
<ul class="folder">
<?php if(is_array($acs['0'])) { foreach($acs['0'] as $value) { ?>
<?php if($menus['0'][$value]) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } ?>
<?php } } ?>
</ul>
</div>
<?php } ?>

<div class="block style1">
<h2>批量管理</h2>
<ul class="folder">
<?php if(is_array($acs['4'])) { foreach($acs['4'] as $value) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } } ?>
<?php if(is_array($acs['1'])) { foreach($acs['1'] as $value) { ?>
<?php if($menus['1'][$value]) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } ?>
<?php } } ?>
</ul>
</div>

<?php if($menus['2']) { ?>
<div class="block style1">
<h2>高级设置</h2>
<ul class="folder">
<?php if(is_array($acs['2'])) { foreach($acs['2'] as $value) { ?>
<?php if($menus['2'][$value]) { ?>
<?php if($ac==$value) { ?><li class="active"><?php } else { ?><li><?php } ?><a href="admincp.php?ac=<?=$value?>"><?=$_TPL['menunames'][$value]?></a></li>
<?php } ?>
<?php } } ?>
<?php if($menus['0']['config']) { ?><li><a href="<?=UC_API?>" target="_blank">UCenter</a></li><?php } ?>
</ul>
</div>
<?php } ?>
</div>

</div>

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