<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('admin/tpl/usergroup|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/default/header|template/default/footer', '1369882755', 'admin/tpl/usergroup');?><?php $_TPL['menunames'] = array(
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

<?php if($_SGLOBAL['appmenu']) { ?>
<?php if($_SGLOBAL['appmenus']) { ?>
<li class="dropmenu" id="ucappmenu" onclick="showMenu(this.id)">
<a href="javascript:;">站内导航</a>
</li>
<?php } else { ?>
<li><a target="_blank" href="<?=$_SGLOBAL['appmenu']['url']?>" title="<?=$_SGLOBAL['appmenu']['name']?>"><?=$_SGLOBAL['appmenu']['name']?></a></li>
<?php } ?>
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

<div id="mainarea">

<?php if($_SGLOBAL['ad']['contenttop']) { ?><div id="ad_contenttop"><?php adshow('contenttop'); ?></div><?php } ?>
<?php } ?>

<?php } ?>


<style type="text/css">
@import url(admin/tpl/style.css);
</style>

<div id="cp_content">


<div class="mainarea">
<div class="maininner">

<div class="tabs_header">
<ul class="tabs">
<li<?=$actives['view']?>><a href="admincp.php?ac=usergroup"><span>浏览用户组</span></a></li>
<li class="null"><a href="admincp.php?ac=usergroup&op=add">添加新用户组</a></li>
</ul>
</div>

<?php if($list ) { ?>
<form method="post" action="admincp.php?ac=usergroup">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">

<div class="title">
<h3>普通用户组</h3>
<p>普通用户组的用户级别，随着其经验值的变化而自动升级或者降级</p>
</div>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th>组头衔</th>
<td>经验值大于</td>
<td width="100">操作</td>
</tr>
<?php if(is_array($list['0'])) { foreach($list['0'] as $value) { ?>
<tr>
<th><span<?php g_color($value[gid]); ?>><?=$value['grouptitle']?></span><?php g_icon($value[gid]); ?></th>
<?php if($value['explower'] == -999999999) { ?>
<td><input type="text" size="15" value="<?=$value['explower']?>" name="explower[<?=$value['gid']?>]" readonly></td>
<?php } else { ?>
<td><input type="text" size="15" value="<?=$value['explower']?>" name="explower[<?=$value['gid']?>]"></td>
<?php } ?>
<td width="100">
<a href="admincp.php?ac=usergroup&op=edit&gid=<?=$value['gid']?>">编辑</a>
<a href="admincp.php?ac=usergroup&op=copy&gid=<?=$value['gid']?>">复制</a>
<a href="admincp.php?ac=usergroup&op=delete&gid=<?=$value['gid']?>">删除</a>
</td>
</tr>
<?php } } ?>
</table>
</div>
<div class="footactions">
<input type="submit" name="updatesubmit" value="提交更新" class="submit">
</div>
</form>

<div class="bdrcontent">
<br />
<div class="title">
<h3>特殊用户组</h3>
<p>归属于特殊用户组的用户级别身份，不受经验值的影响，始终保持不变</p>
</div>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php if(is_array($list['1'])) { foreach($list['1'] as $value) { ?>
<tr>
<th><span<?php g_color($value[gid]); ?>><?=$value['grouptitle']?></span><?php g_icon($value[gid]); ?></th>
<td width="100">
<a href="admincp.php?ac=usergroup&op=edit&gid=<?=$value['gid']?>">编辑</a>
<a href="admincp.php?ac=usergroup&op=copy&gid=<?=$value['gid']?>">复制</a>
<a href="admincp.php?ac=usergroup&op=delete&gid=<?=$value['gid']?>">删除</a>
</td>
</tr>
<?php } } ?>
</table>

<br />
<div class="title">
<h3>系统用户组</h3>
<p>系统内置，用户组不能被编辑或删除；用户级别身份，不受经验值的变化的影响</p>
</div>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php if(is_array($list['-1'])) { foreach($list['-1'] as $value) { ?>
<tr>
<th><span<?php g_color($value[gid]); ?>><?=$value['grouptitle']?></span><?php g_icon($value[gid]); ?></th>
<td width="80">
<a href="admincp.php?ac=usergroup&op=edit&gid=<?=$value['gid']?>">编辑</a> |
<a href="admincp.php?ac=usergroup&op=copy&gid=<?=$value['gid']?>">复制</a>
</td>
</tr>
<?php } } ?>
</table>
</div>


<?php } ?>
<?php if($_GET['op']=='copy') { ?>
<form method="post" action="admincp.php?ac=usergroup&gid=<?=$gid?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">

<div class="title">
<h3>权限复制</h3>
<p>这里可以把目标用户组权限应用给选中的用户组</p>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th style="width:12em;">源用户组</th>
<td><?=$from?></td>
</tr>
<tr>
<th>目标用户组</th>
<td>
<select name="aimgroup[]" size="10" multiple="multiple" style="width: 80%">
<?php if(is_array($grouparr)) { foreach($grouparr as $key => $value) { ?>
<option value="<?=$value['gid']?>"><?=$value['grouptitle']?></option>
<?php } } ?>
</select>
<p>选择要将源用户组权限复制到哪些目标用户组，可以按住 CTRL 多选</p>
</td>
</tr>
</table>
</div>

<div class="footactions">
<input type="hidden" name="gid" value="<?=$gid?>">
<input type="submit" name="copysubmit" value="提交" class="submit">
</div>

</form>
<?php } ?>
<?php if($thevalue) { ?>
<script type="text/javascript">
function credisshow(value) {
if(value=='0') {
document.getElementById('tr_credit').style.display = '';
} else {
document.getElementById('tr_credit').style.display = 'none';
}
}
</script>
<?php $_TPL['discount'] = array(
		'0' => '不打折',
		'1' => '1折',
		'2' => '2折',
		'3' => '3折',
		'4' => '4折',
		'5' => '5折',
		'6' => '6折',
		'7' => '7折',
		'8' => '8折',
		'9' => '9折',
		'-1' => '免费'
	); ?>
<form method="post" action="admincp.php?ac=usergroup&gid=<?=$thevalue['gid']?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />

<div class="bdrcontent">

<div class="title">
<h3><?=$thevalue['grouptitle']?> 空间权限</h3>
<p>这里设置该用户组成员对自己的个人空间的操作权限许可</p>
</div>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr><th style="width:12em;">名称</th><td><input type="text" name="set[grouptitle]" value="<?=$thevalue['grouptitle']?>"></td></tr>

<?php if(!isset($thevalue['system'])) { ?>
<tr>
<th>用户组类型</th>
<td>
<input type="radio" name="set[system]" value="0" onclick="credisshow(0)" checked> 普通用户组
<input type="radio" name="set[system]" value="1" onclick="credisshow(1)"> 特殊用户组 (不受经验值限制)
</td>
</tr>
<?php } ?>
<tr>
<th>禁止访问</th>
<td>
<input type="radio" name="set[banvisit]" value="0"<?php if($thevalue['banvisit']!=1) { ?> checked<?php } ?>> 允许访问
<input type="radio" name="set[banvisit]" value="1"<?php if($thevalue['banvisit']==1) { ?> checked<?php } ?>> 禁止访问
</td>
</tr>
<?php if(empty($thevalue['system'])) { ?>
<tr id="tr_credit"><th>经验值下限</th><td>
<?php if($thevalue['explower'] > -999999999) { ?>
<input type="text" name="set[explower]" value="<?=$thevalue['explower']?>" size="20">
<?php } else { ?>
<input type="hidden" name="set[explower]" value="<?=$thevalue['explower']?>" size="20">
<?=$thevalue['explower']?> (系统默认最低分，不能修改)
<?php } ?>
成为本用户组的最低积分</td></tr>
<?php } ?>

<tr><th>用户名显示颜色</th><td><input type="text" name="set[color]" value="<?=$thevalue['color']?>" size="10"> 例如：#FF0000</td></tr>
<tr><th>用户身份识别图标</th><td><input type="text" name="set[icon]" value="<?=$thevalue['icon']?>" size="40"> 填写URL地址，大小 20*20 最佳，会显示在用户名的后面，作为身份识别</td></tr>

<tr><th>上传空间大小</th><td><input type="text" name="set[maxattachsize]" value="<?=$thevalue['maxattachsize']?>" size="10"> 单位:M, 0为无限</td></tr>
<tr><th>最多好友数</th><td><input type="text" name="set[maxfriendnum]" value="<?=$thevalue['maxfriendnum']?>" size="10"> 0为无限</td></tr>
<tr>
<th>两次发布操作间隔</th>
<td><input type="text" name="set[postinterval]" value="<?=$thevalue['postinterval']?>" size="10"> 单位:秒 , 0为不限制，包括日志/评论/留言/话题/回帖等发布操作</td>
</tr>
<tr>
<th>发布操作需填验证码</th>
<td>
<input type="radio" name="set[seccode]" value="0"<?php if($thevalue['seccode']!=1) { ?> checked<?php } ?>> 不需要验证码
<input type="radio" name="set[seccode]" value="1"<?php if($thevalue['seccode']==1) { ?> checked<?php } ?>> 填写验证码
<br>包括记录/日志/话题/分享的发布操作，开启验证码可以防止灌水机等，但会增加用户操作易用度。
</td>
</tr>
<tr>
<th>两次搜索操作间隔</th>
<td><input type="text" name="set[searchinterval]" value="<?=$thevalue['searchinterval']?>" size="10"> 单位:秒 , 0为不限制</td>
</tr>
<tr>
<th>是否免费搜索</th>
<td>
<input type="radio" name="set[searchignore]" value="1"<?php if($thevalue['searchignore']==1) { ?> checked<?php } ?>> 免费搜索
<input type="radio" name="set[searchignore]" value="0"<?php if($thevalue['searchignore']!=1) { ?> checked<?php } ?>> 搜索要扣积分
</td>
</tr>

<tr>
<th>二级域名最短长度</th>
<td><input type="text" name="set[domainlength]" value="<?=$thevalue['domainlength']?>" size="10"> 0为禁止使用二级域名，在站点开启二级域名时有效</td>
</tr>
<tr>
<th>防灌水限制</th>
<td>
<input type="radio" name="set[spamignore]" value="0"<?php if($thevalue['spamignore']!=1) { ?> checked<?php } ?>> 受限制
<input type="radio" name="set[spamignore]" value="1"<?php if($thevalue['spamignore']==1) { ?> checked<?php } ?>> 不受灌水限制
</td>
</tr>

<tr>
<th>发表记录</th>
<td>
<input type="radio" name="set[allowdoing]" value="1"<?php if($thevalue['allowdoing']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowdoing]" value="0"<?php if($thevalue['allowdoing']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>发表日志</th>
<td>
<input type="radio" name="set[allowblog]" value="1"<?php if($thevalue['allowblog']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowblog]" value="0"<?php if($thevalue['allowblog']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>上传图片</th>
<td>
<input type="radio" name="set[allowupload]" value="1"<?php if($thevalue['allowupload']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowupload]" value="0"<?php if($thevalue['allowupload']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>发布分享</th>
<td>
<input type="radio" name="set[allowshare]" value="1"<?php if($thevalue['allowshare']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowshare]" value="0"<?php if($thevalue['allowshare']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>发表留言/评论</th>
<td>
<input type="radio" name="set[allowcomment]" value="1"<?php if($thevalue['allowcomment']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowcomment]" value="0"<?php if($thevalue['allowcomment']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>允许表态</th>
<td>
<input type="radio" name="set[allowclick]" value="1"<?php if($thevalue['allowclick']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowclick]" value="0"<?php if($thevalue['allowclick']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>创建新群组</th>
<td>
<input type="radio" name="set[allowmtag]" value="1"<?php if($thevalue['allowmtag']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowmtag]" value="0"<?php if($thevalue['allowmtag']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>发表群组话题</th>
<td>
<input type="radio" name="set[allowthread]" value="1"<?php if($thevalue['allowthread']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowthread]" value="0"<?php if($thevalue['allowthread']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>编辑话题附加编辑记录</th>
<td>
<input type="radio" name="set[edittrail]" value="1"<?php if($thevalue['edittrail']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[edittrail]" value="0"<?php if($thevalue['edittrail']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>发表群组回帖</th>
<td>
<input type="radio" name="set[allowpost]" value="1"<?php if($thevalue['allowpost']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowpost]" value="0"<?php if($thevalue['allowpost']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>发起投票</th>
<td>
<input type="radio" name="set[allowpoll]" value="1"<?php if($thevalue['allowpoll']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowpoll]" value="0"<?php if($thevalue['allowpoll']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>发布活动</th>
<td>
<input type="radio" name="set[allowevent]" value="1"<?php if($thevalue['allowevent']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowevent]" value="0"<?php if($thevalue['allowevent']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>发表的活动需要审核</th>
<td>
<input type="radio" name="set[verifyevent]" value="1"<?php if($thevalue['verifyevent']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[verifyevent]" value="0"<?php if($thevalue['verifyevent']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>允许发短消息</th>
<td>
<input type="radio" name="set[allowpm]" value="1"<?php if($thevalue['allowpm']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowpm]" value="0"<?php if($thevalue['allowpm']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>允许打招呼</th>
<td>
<input type="radio" name="set[allowpoke]" value="1"<?php if($thevalue['allowpoke']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowpoke]" value="0"<?php if($thevalue['allowpoke']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>允许加好友</th>
<td>
<input type="radio" name="set[allowfriend]" value="1"<?php if($thevalue['allowfriend']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowfriend]" value="0"<?php if($thevalue['allowfriend']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>视频认证限制</th>
<td>
<input type="radio" name="set[videophotoignore]" value="1"<?php if($thevalue['videophotoignore']==1) { ?> checked<?php } ?>> 不受视频认证限制
<input type="radio" name="set[videophotoignore]" value="0"<?php if($thevalue['videophotoignore']!=1) { ?> checked<?php } ?>> 受限制
</td>
</tr>
<tr>
<th>允许查看视频认证</th>
<td>
<input type="radio" name="set[allowviewvideopic]" value="1"<?php if($thevalue['allowviewvideopic']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowviewvideopic]" value="0"<?php if($thevalue['allowviewvideopic']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>允许使用应用</th>
<td>
<input type="radio" name="set[allowmyop]" value="1"<?php if($thevalue['allowmyop']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowmyop]" value="0"<?php if($thevalue['allowmyop']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>允许使用道具</th>
<td>
<input type="radio" name="set[allowmagic]" value="1"<?php if($thevalue['allowmagic']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowmagic]" value="0"<?php if($thevalue['allowmagic']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>
<tr>
<th>购买道具折扣</th>
<td>
<select name="set[magicdiscount]">
<?php if(is_array($_TPL['discount'])) { foreach($_TPL['discount'] as $key => $val) { ?>
<option value="<?=$key?>" <?php if($thevalue['magicdiscount'] == $key) { ?> selected<?php } ?>><?=$val?></option>
<?php } } ?>
</select>
</td>
</tr>
<tr>
<th>添加新的热闹</th>
<td>
<input type="radio" name="set[allowtopic]" value="1"<?php if($thevalue['allowtopic']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowtopic]" value="0"<?php if($thevalue['allowtopic']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>

<tr>
<th>允许自定义CSS</th>
<td>
<input type="radio" name="set[allowcss]" value="1"<?php if($thevalue['allowcss']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowcss]" value="0"<?php if($thevalue['allowcss']!=1) { ?> checked<?php } ?>> 否
&nbsp;谨慎允许，允许自定义CSS可能会造成javascript脚本引起的不安全因素
</td>
</tr>
<tr>
<th>日志全HTML标签支持</th>
<td>
<input type="radio" name="set[allowhtml]" value="1"<?php if($thevalue['allowhtml']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowhtml]" value="0"<?php if($thevalue['allowhtml']!=1) { ?> checked<?php } ?>> 否
&nbsp;谨慎允许，支持所有html标签可能会造成javascript脚本引起的不安全因素
</td>
</tr>

<tr>
<th>允许查看趋势统计</th>
<td>
<input type="radio" name="set[allowstat]" value="1"<?php if($thevalue['allowstat']==1) { ?> checked<?php } ?>> 是
<input type="radio" name="set[allowstat]" value="0"<?php if($thevalue['allowstat']!=1) { ?> checked<?php } ?>> 否
</td>
</tr>

<tr>
<th>站点关闭和IP屏蔽</th>
<td>
<input type="radio" name="set[closeignore]" value="1"<?php if($thevalue['closeignore']==1) { ?> checked<?php } ?>> 不受站点关闭和IP屏蔽限制
<input type="radio" name="set[closeignore]" value="0"<?php if($thevalue['closeignore']!=1) { ?> checked<?php } ?>> 受限制
</td>
</tr>
<tr>
<th>升级奖励道具</th>
<td>
<select id="newmagicaward">
<?php if(is_array($_SGLOBAL['magic'])) { foreach($_SGLOBAL['magic'] as $key => $value) { ?>
<option value="<?=$key?>"><?=$value?></option>
<?php } } ?>				
</select>
<input type="text" id="newmagicawardnum" value="1" />
<input class="button" type="button" onclick="addMagicAward()" value="添加" />
<ul id="magicawards">
<?php if(is_array($thevalue['magicaward'])) { foreach($thevalue['magicaward'] as $value) { ?>
<li id="magicaward_<?=$value['mid']?>">
<input type="hidden" name="magicaward[]" value="<?=$value['mid']?>,<?=$value['num']?>">
<?=$_SGLOBAL['magic'][$value['mid']]?> &nbsp;&nbsp; 
<?=$value['num']?> &nbsp;&nbsp; 
<a href="#" onclick="removeMagicAward(this);return false;">删除</a>
</li>
<?php } } ?>
</ul>
<script type="text/javascript">
function addMagicAward(){
var mid = $('newmagicaward').value;
var id = "magicaward_" + mid;
var num = $('newmagicawardnum').value;
var name = $('newmagicaward').options[$('newmagicaward').selectedIndex].text;
if($(id)) {
removeMagicAward($(id).getElementsByTagName("a")[0]);
}
var s = '<li id="' + id + '">';
s += '<input type="hidden" name="magicaward[]" value="' + mid + ',' + num + '" />';
s += name + ' &nbsp;&nbsp;' + "\n";
s += num + ' &nbsp;&nbsp;' + "\n";
s += '<a href="#" onclick="removeMagicAward(this);return false;">删除</a>';
s += '</li>';
$('magicawards').innerHTML += s;
}
function removeMagicAward(o) {
$('magicawards').removeChild(o.parentNode);
}
</script>
</td>
</tr>
</table>

<?php if($thevalue['system']) { ?>
<br />
<div class="title">
<h3><?=$thevalue['grouptitle']?> 管理权限</h3>
<p>设置该用户组成员是否拥有站点管理权限，这可能会影响到站点数据安全，请谨慎选择</p>
</div>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th style="width:12em;">管理员身份</th>
<td>
<input type="radio" name="set[manageconfig]" value="1"<?php if($thevalue['manageconfig']==1) { ?> checked<?php } ?>> 拥有管理员身份
<input type="radio" name="set[manageconfig]" value="0"<?php if($thevalue['manageconfig']!=1) { ?> checked<?php } ?>> 禁止
<br>注意，该用户组成员拥有管理员身份后，将不再受下面权限设置，将自动拥有全部权限
</td>
</tr>
<tr>
<th>批量管理操作</th>
<td>
<input type="radio" name="set[managebatch]" value="1"<?php if($thevalue['managebatch']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managebatch]" value="0"<?php if($thevalue['managebatch']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>标签</th>
<td>
<input type="radio" name="set[managetag]" value="1"<?php if($thevalue['managetag']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managetag]" value="0"<?php if($thevalue['managetag']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>群组</th>
<td>
<input type="radio" name="set[managemtag]" value="1"<?php if($thevalue['managemtag']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managemtag]" value="0"<?php if($thevalue['managemtag']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>活动</th>
<td>
<input type="radio" name="set[manageevent]" value="1"<?php if($thevalue['manageevent']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageevent]" value="0"<?php if($thevalue['manageevent']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>动态(feed)</th>
<td>
<input type="radio" name="set[managefeed]" value="1"<?php if($thevalue['managefeed']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managefeed]" value="0"<?php if($thevalue['managefeed']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>记录</th>
<td>
<input type="radio" name="set[managedoing]" value="1"<?php if($thevalue['managedoing']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managedoing]" value="0"<?php if($thevalue['managedoing']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>分享</th>
<td>
<input type="radio" name="set[manageshare]" value="1"<?php if($thevalue['manageshare']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageshare]" value="0"<?php if($thevalue['manageshare']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>日志</th>
<td>
<input type="radio" name="set[manageblog]" value="1"<?php if($thevalue['manageblog']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageblog]" value="0"<?php if($thevalue['manageblog']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>相册</th>
<td>
<input type="radio" name="set[managealbum]" value="1"<?php if($thevalue['managealbum']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managealbum]" value="0"<?php if($thevalue['managealbum']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>评论</th>
<td>
<input type="radio" name="set[managecomment]" value="1"<?php if($thevalue['managecomment']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managecomment]" value="0"<?php if($thevalue['managecomment']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>话题</th>
<td>
<input type="radio" name="set[managethread]" value="1"<?php if($thevalue['managethread']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managethread]" value="0"<?php if($thevalue['managethread']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>投票</th>
<td>
<input type="radio" name="set[managepoll]" value="1"<?php if($thevalue['managepoll']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managepoll]" value="0"<?php if($thevalue['managepoll']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>道具记录</th>
<td>
<input type="radio" name="set[managemagiclog]" value="1"<?php if($thevalue['managemagiclog']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managemagiclog]" value="0"<?php if($thevalue['managemagiclog']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>随便看看</th>
<td>
<input type="radio" name="set[managenetwork]" value="1"<?php if($thevalue['managenetwork']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managenetwork]" value="0"<?php if($thevalue['managenetwork']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>用户组</th>
<td>
<input type="radio" name="set[manageusergroup]" value="1"<?php if($thevalue['manageusergroup']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageusergroup]" value="0"<?php if($thevalue['manageusergroup']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>积分规则</th>
<td>
<input type="radio" name="set[managecredit]" value="1"<?php if($thevalue['managecredit']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managecredit]" value="0"<?php if($thevalue['managecredit']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>用户栏目</th>
<td>
<input type="radio" name="set[manageprofilefield]" value="1"<?php if($thevalue['manageprofilefield']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageprofilefield]" value="0"<?php if($thevalue['manageprofilefield']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>群组栏目</th>
<td>
<input type="radio" name="set[manageprofield]" value="1"<?php if($thevalue['manageprofield']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageprofield]" value="0"<?php if($thevalue['manageprofield']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>活动分类</th>
<td>
<input type="radio" name="set[manageeventclass]" value="1"<?php if($thevalue['manageeventclass']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageeventclass]" value="0"<?php if($thevalue['manageeventclass']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>词语屏蔽</th>
<td>
<input type="radio" name="set[managecensor]" value="1"<?php if($thevalue['managecensor']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managecensor]" value="0"<?php if($thevalue['managecensor']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>广告设置</th>
<td>
<input type="radio" name="set[managead]" value="1"<?php if($thevalue['managead']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managead]" value="0"<?php if($thevalue['managead']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>举报管理</th>
<td>
<input type="radio" name="set[managereport]" value="1"<?php if($thevalue['managereport']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managereport]" value="0"<?php if($thevalue['managereport']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>缓存更新</th>
<td>
<input type="radio" name="set[managecache]" value="1"<?php if($thevalue['managecache']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managecache]" value="0"<?php if($thevalue['managecache']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>多产品/应用</th>
<td>
<input type="radio" name="set[manageapp]" value="1"<?php if($thevalue['manageapp']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageapp]" value="0"<?php if($thevalue['manageapp']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>数据调用</th>
<td>
<input type="radio" name="set[manageblock]" value="1"<?php if($thevalue['manageblock']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageblock]" value="0"<?php if($thevalue['manageblock']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>模板编辑</th>
<td>
<input type="radio" name="set[managetemplate]" value="1"<?php if($thevalue['managetemplate']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managetemplate]" value="0"<?php if($thevalue['managetemplate']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>数据备份</th>
<td>
<input type="radio" name="set[managebackup]" value="1"<?php if($thevalue['managebackup']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managebackup]" value="0"<?php if($thevalue['managebackup']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>统计更新</th>
<td>
<input type="radio" name="set[managestat]" value="1"<?php if($thevalue['managestat']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managestat]" value="0"<?php if($thevalue['managestat']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>计划任务</th>
<td>
<input type="radio" name="set[managecron]" value="1"<?php if($thevalue['managecron']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managecron]" value="0"<?php if($thevalue['managecron']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>IP设置</th>
<td>
<input type="radio" name="set[manageip]" value="1"<?php if($thevalue['manageip']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageip]" value="0"<?php if($thevalue['manageip']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>推荐成员设置</th>
<td>
<input type="radio" name="set[managehotuser]" value="1"<?php if($thevalue['managehotuser']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managehotuser]" value="0"<?php if($thevalue['managehotuser']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>默认好友设置</th>
<td>
<input type="radio" name="set[managedefaultuser]" value="1"<?php if($thevalue['managedefaultuser']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managedefaultuser]" value="0"<?php if($thevalue['managedefaultuser']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>删除用户</th>
<td>
<input type="radio" name="set[managedelspace]" value="1"<?php if($thevalue['managedelspace']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managedelspace]" value="0"<?php if($thevalue['managedelspace']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>实名认证</th>
<td>
<input type="radio" name="set[managename]" value="1"<?php if($thevalue['managename']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managename]" value="0"<?php if($thevalue['managename']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>视频认证</th>
<td>
<input type="radio" name="set[managevideophoto]" value="1"<?php if($thevalue['managevideophoto']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managevideophoto]" value="0"<?php if($thevalue['managevideophoto']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>用户保护信息</th>
<td>
<input type="radio" name="set[managespacegroup]" value="1"<?php if($thevalue['managespacegroup']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managespacegroup]" value="0"<?php if($thevalue['managespacegroup']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>用户基本信息</th>
<td>
<input type="radio" name="set[managespaceinfo]" value="1"<?php if($thevalue['managespaceinfo']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managespaceinfo]" value="0"<?php if($thevalue['managespaceinfo']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>用户积分</th>
<td>
<input type="radio" name="set[managespacecredit]" value="1"<?php if($thevalue['managespacecredit']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managespacecredit]" value="0"<?php if($thevalue['managespacecredit']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>向用户发通知</th>
<td>
<input type="radio" name="set[managespacenote]" value="1"<?php if($thevalue['managespacenote']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managespacenote]" value="0"<?php if($thevalue['managespacenote']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>有奖任务</th>
<td>
<input type="radio" name="set[managetask]" value="1"<?php if($thevalue['managetask']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managetask]" value="0"<?php if($thevalue['managetask']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>道具设置</th>
<td>
<input type="radio" name="set[managemagic]" value="1"<?php if($thevalue['managemagic']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managemagic]" value="0"<?php if($thevalue['managemagic']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>表态动作设置</th>
<td>
<input type="radio" name="set[manageclick]" value="1"<?php if($thevalue['manageclick']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[manageclick]" value="0"<?php if($thevalue['manageclick']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>热闹管理</th>
<td>
<input type="radio" name="set[managetopic]" value="1"<?php if($thevalue['managetopic']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managetopic]" value="0"<?php if($thevalue['managetopic']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
<tr>
<th>管理记录</th>
<td>
<input type="radio" name="set[managelog]" value="1"<?php if($thevalue['managelog']==1) { ?> checked<?php } ?>> 可管理
<input type="radio" name="set[managelog]" value="0"<?php if($thevalue['managelog']!=1) { ?> checked<?php } ?>> 禁止
</td>
</tr>
</table>
<?php } ?>

</div>

<div class="footactions">
<input type="hidden" name="set[gid]" value="<?=$thevalue['gid']?>">
<input type="submit" name="thevaluesubmit" value="提交" class="submit">
</div>

</form>

<?php } ?>

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
<div id="bottom"></div>
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