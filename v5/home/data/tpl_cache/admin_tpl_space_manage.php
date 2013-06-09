<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('admin/tpl/space_manage|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/default/header|template/default/footer', '1370771857', 'admin/tpl/space_manage');?><?php $_TPL['menunames'] = array(
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

<?php if($uid) { ?>
<form method="post" action="admincp.php?ac=space&uid=<?=$uid?>" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">
<div class="title">
<h3><?=$member['username']?> 基本信息</h3>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr><th style="width:12em;">用户名</th>
<td><a href="space.php?uid=<?=$member['uid']?>" target="_blank"><?=$member['username']?></a></td></tr>


<tr><th>开通时间</th><td><?php echo sgmdate('Y-m-d H:i',$member[dateline]); ?></td></tr>
<tr><th>更新时间</th><td><?php if($member['updatetime']) { ?><?php echo sgmdate('Y-m-d H:i',$member[updatetime]); ?><?php } else { ?>-<?php } ?></td></tr>
<tr><th>上次登录</th><td><?php echo sgmdate('Y-m-d H:i',$member[lastlogin]); ?></td></tr>
<tr><th>注册IP</th><td><?=$member['regip']?></td></tr>
<tr><th>好友数</th><td><?=$member['friendnum']?></td></tr>
<tr><th>查看数</th><td><?=$member['viewnum']?></td></tr>
<tr><th>批量管理</th>
<td>
<a href="admincp.php?ac=introduce&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">企业介绍(<?=$member['introducenum']?>)</a> | 
<a href="admincp.php?ac=product&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">产品介绍(<?=$member['productnum']?>)</a> | 
<a href="admincp.php?ac=development&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">企业动态(<?=$member['developmentnum']?>)</a> | 
<a href="admincp.php?ac=industry&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">行业动态(<?=$member['industrynum']?>)</a> | 
<a href="admincp.php?ac=cases&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">成功案例(<?=$member['casesnum']?>)</a> | 
<a href="admincp.php?ac=branch&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">分支机构(<?=$member['branchnum']?>)</a> | 
<a href="admincp.php?ac=job&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">人才招聘(<?=$member['jobnum']?>)</a> | 
<a href="admincp.php?ac=talk&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">在线沟通(<?=$member['talknum']?>)</a> | 
<a href="admincp.php?ac=pic&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">图片</a> | 
<a href="admincp.php?ac=comment&authorid=<?=$member['uid']?>&searchsubmit=1" target="_blank">评论</a> | 
<a href="admincp.php?ac=post&uid=<?=$member['uid']?>&searchsubmit=1" target="_blank">回帖</a>
</td></tr>

<tr><th>&nbsp;</th>
<td>

<?php if($member['flag'] != 1 && checkperm('managedelspace')) { ?>
<a href="admincp.php?ac=space&op=close&uid=<?=$member['uid']?>" <?php if($member['flag']!=-1) { ?> onclick="return confirm('锁定后该空间将被禁止访问，确认锁定吗？');" <?php } ?> class="submit"><?php if($member['flag']!=-1) { ?>锁定空间(不会删除数据)<?php } else { ?>解除锁定状态<?php } ?></a> &nbsp;
<a href="admincp.php?ac=space&op=delete&uid=<?=$member['uid']?>" onclick="return confirm('危险，这将删除该空间所有数据，并且本操作不可恢复，确认删除？');">删除该空间(删除数据并不可恢复)</a>&nbsp;&nbsp;&nbsp;
<?php } else { ?>
本用户被保护，不能删除、不能锁定
<?php } ?>
</td>
</tr>

</table>
</div>
<?php if($managespaceinfo) { ?>
<br>
<div class="bdrcontent">
<div class="title">
<h3><?=$member['username']?> 实名验证</h3>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr><th style="width:12em;">姓名</th><td><input type="text" class="t_input" name="name" value="<?=$member['name']?>">
<input type="radio" name="namestatus" value="0"<?php if($member['namestatus']==0) { ?> checked<?php } ?>> 认证失败
<input type="radio" name="namestatus" value="1"<?php if($member['namestatus']==1) { ?> checked<?php } ?>> 认证通过
</td></tr>
<tr><th style="width:12em;">头像</th><td><a href="space.php?uid=<?=$member['uid']?>" target="_blank"><?php echo avatar($member[uid],big); ?></a>
<br>[<a href="admincp.php?ac=space&op=deleteavatar&uid=<?=$uid?>">删除头像</a>]
</td></tr>

<?php if($_SCONFIG['videophoto']) { ?>
<tr><th>视频认证</th><td>
<p>
<input type="radio" name="videostatus" value="0"<?=$videostatusarr['0']?>>未通过
<input type="radio" name="videostatus" value="1"<?=$videostatusarr['1']?>>已通过(需要有视频照片)
</p>
<?php if($videopic) { ?><img src="<?=$videopic?>" width="400"><br><?php } ?>
上传一张该用户照片，更新视频认证照片:<br>
<input type="file" name="newvideopic" value="">
</td></tr>
<?php } ?>

<tr>
<th style="width:12em;">常用邮箱</th>
<td>
<input type="text" id="email" class="t_input" name="email" value="<?=$member['email']?>" />
<input type="radio" name="emailcheck" value="0"<?php if($member['emailcheck']==0) { ?> checked<?php } ?>> 未激活
<input type="radio" name="emailcheck" value="1"<?php if($member['emailcheck']==1) { ?> checked<?php } ?>> 已经验证激活
</td>
</tr>
<?php if($_SCONFIG['allowdomain'] && $_SCONFIG['domainroot']) { ?>
<tr><th style="width:12em;">二级域名</th><td><input type="text" class="t_input" name="domain" value="<?=$member['domain']?>" size="10">.<?=$_SCONFIG['domainroot']?></td></tr>
<?php } ?>
<tr><th style="width:12em;">额外好友数</th><td><input type="text" class="t_input" name="addfriend" value="<?=$member['addfriend']?>" size="10"> 个</td></tr>


<tr><th>清空自定义CSS</th><td>
<input type="radio" name="clearcss" value="0" checked> 不处理
<input type="radio" name="clearcss" value="1"> 清空
<p>用户自定义的CSS如果存在恶意代码，可以选择清空。</p>
</td></tr>
<tr><th style="width:12em;">联系人</th><td><input type="text" class="t_input" name="linkman" value="<?=$member['linkman']?>" size="10"></td></tr>
<tr><th style="width:12em;">联系人身份证</th><td><input type="text" class="t_input" name="idcard" value="<?=$member['idcard']?>" size="30"></td></tr>
<tr><th style="width:12em;">身份证扫描件</th><td><img src="<?=$member['image1url']?>"/></td></tr>
<tr>
<tr><th style="width:12em;">营业执照注册号</th><td><input type="text" class="t_input" name="businessnum" value="<?=$member['businessnum']?>" size="30"></td></tr>
<tr><th style="width:12em;">营业执照扫描件</th><td><img src="<?=$member['image4url']?>"/></td></tr>
<tr><th style="width:12em;">公司名称</th><td><input type="text" class="t_input" name="companyname" value="<?=$member['companyname']?>" size="30"></td></tr>
<tr><th style="width:12em;">联系人电话</th><td><input type="text" class="t_input" name="mobile" value="<?=$member['mobile']?>" size="30"></td></tr>
<tr>
<th>QQ</th>
<td>
<input type="text" class="t_input" name="qq" value="<?=$member['qq']?>" /> 
</td>
</tr>
<tr>


<?php if(is_array($profilefields)) { foreach($profilefields as $value) { ?>
<tr>
<th><?=$value['title']?><?php if($value['required']) { ?>*<?php } ?></th>
<td>
<?=$value['formhtml']?>
<?php if($value['note']) { ?><br><?=$value['note']?><?php } ?>
</td>
</tr>
<?php } } ?>



</table>
</div>
<?php } ?>
<?php if($managename) { ?>
<br>
<div class="bdrcontent">
<div class="title">
<h3><?=$member['username']?> 企业资料</h3>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr><th style="width:12em;">微信公众号</th><td><input type="text" class="t_input" name="weixin" value="<?=$member['weixin']?>" size="20"></td></tr>
<tr><th style="width:12em;">企业名称</th><td><input type="text" class="t_input" name="businessname" value="<?=$member['businessname']?>" size="40"></td></tr>
<tr><th style="width:12em;">企业地址</th><td><input type="text" class="t_input" name="businessaddress" value="<?=$member['businessaddress']?>" size="60"></td></tr>
<tr><th style="width:12em;">行业</th><td><input type="text" class="t_input" name="business" value="<?=$member['business']?>" size="10"></td></tr>
<tr><th style="width:12em;">运营地区</th><td><input type="text" class="t_input" name="resideprovince" value="<?=$member['resideprovince']?>" size="10">-<input type="text" class="t_input" name="residecity" value="<?=$member['residecity']?>" size="10"></td></tr>
<tr><th style="width:12em;">固话</th><td><input type="text" class="t_input" name="telephone" value="<?=$member['telephone']?>" size="20"></td></tr>
<tr><th style="width:12em;">手机</th><td><input type="text" class="t_input" name="businesstelephone" value="<?=$member['businesstelephone']?>" size="20"></td></tr>
<tr><th style="width:12em;">QQ</th><td><input type="text" class="t_input" name="businessqq" value="<?=$member['businessqq']?>" size="20"></td></tr>
<tr><th style="width:12em;">邮箱</th><td><input type="text" class="t_input" name="businessemail" value="<?=$member['businessemail']?>" size="20"></td></tr>
<tr><th style="width:12em;">企业logo</th><td><img src="<?=$member['smalllogourl']?>"></td></tr>
<tr><th style="width:12em;">企业介绍</th><td><textarea rows="4" cols="100" name="companyintroduce"><?=$member['companyintroduce']?></textarea></td></tr>
</table>
</div>
<?php } ?>
<?php if($managespacecredit) { ?>
<br>
<div class="bdrcontent">
<div class="title">
<h3><?=$member['username']?> 积分、经验值、空间大小管理</h3>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr><th style="width:12em;">额外空间大小</th><td><input type="text" class="t_input" name="addsize" value="<?=$member['addsize']?>" size="10"> M</td></tr>
<tr><th>积分数</th><td><input type="text" name="credit" class="t_input" value="<?=$member['credit']?>" size="10"></td></tr>
<tr><th>经验值</th><td><input type="text" class="t_input" name="experience" value="<?=$member['experience']?>" size="10"></td></tr>
</table>
</div>
<?php } ?>
<?php if($managespacegroup) { ?>
<br>
<div class="bdrcontent">
<div class="title">
<h3><?=$member['username']?> 保护信息</h3>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">

<tr><th style="width:12em;">用户组</th><td>
<select name="groupid" onchange="showDateSet(this.value);">
<option value="0">普通用户组</option>
<?php $show=true; ?>
<?php if(is_array($usergroups)) { foreach($usergroups as $value) { ?>
<?php if($groupidarr[$value['gid']]) { ?><?php $show=false; ?><?php } ?>
<option value="<?=$value['gid']?>"<?=$groupidarr[$value['gid']]?>><?=$value['grouptitle']?></option>
<?php } } ?>
</select>
<p>普通用户组，会自动根据用户经验数目的多少进行自动升级/降级<br>系统用户组，用户的身份不受经验值影响</p></td></tr>
<tr id="expirationtr" <?php if($show) { ?>style="display:none;"<?php } ?>><th>用户组过期时间</th><td>
<input type="text" class="t_input" name="expiration" value="<?=$member['expiration']?>" size="20">(格式：2009-8-8 00:00)
<p>为空则永久有效</p>
</td></tr>
<?php if($member['flag'] != -1) { ?>
<tr><th>删除保护</th><td>
<input type="radio" name="flag" value="0"<?php if($member['flag']==0) { ?> checked<?php } ?>> 不保护
<input type="radio" name="flag" value="1"<?php if($member['flag']==1) { ?> checked<?php } ?>> 保护
<p>保护状态下，该用户将不能够在UCenter、以及本应用中删除。</p>
</td></tr>
</td></tr>
<?php } ?>
</table>
<script type="text/javascript">
function showDateSet(val) {
var expObj = $("expirationtr");
expObj.style.display = parseInt(val) ? '' : 'none';
}
</script>
</div>
<?php } ?>

<div class="footactions">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="usergroupsubmit" value="提交" class="submit">
</div>
</form>
<?php } elseif($_POST['optype'] == 4) { ?>

<form method="post" action="<?=$url?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">
<div class="title">
<h3>批量发送邮件</h3>
<p>您可以对选定的用户进行批量发送邮件。注意，本操作将会增加服务器负载。</p>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th style="width:8em;">收件人(UID)</th>
<td><input type="text" name="uids" value="<?=$uids?>" size="60"> 多个UID间用 "," 分隔</td>
</tr>
<tr>
<th>邮件标题</th>
<td><input type="text" name="subject" value="" size="60"></td>
</tr>
<tr>
<th>邮件内容</th>
<td><textarea name="message" cols="80" rows="10"></textarea><br>邮件内容支持html代码</td>
</tr>
</table>
</div>

<div class="footactions">		
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="sendemailsubmit" value="发送邮件" class="submit">
</div>
</form>

<?php } elseif($_POST['optype'] == 5) { ?>

<form method="post" action="<?=$url?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">
<div class="title">
<h3>批量打招呼</h3>
<p>您可以对选定的用户进行批量打招呼，以对其简单说明一些事情。注意，本操作将会增加服务器负载。</p>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th style="width:8em;">收件人(UID)</th>
<td><input type="text" name="uids" value="<?=$uids?>" size="60"> 多个UID间用 "," 分隔</td>
</tr>
<tr>
<th>招呼内容</th>
<td><input type="text" name="note" value="" size="60"> （不要超过50个字符）</td>
</tr>
</table>
</div>

<div class="footactions">		
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="pokesubmit" value="打招呼" class="submit">
</div>
</form>	

<?php } elseif($_POST['optype'] == 7) { ?>

<form method="post" action="<?=$url?>" onsubmit="return checkPresent()">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">
<div class="title">
<h3>批量赠送道具</h3>
<p>您可以给选定的用户批量赠送道具。注意，本操作将会增加服务器负载。</p>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th style="width:8em;">受赠者(UID)</th>
<td><input type="text" name="uids" value="<?=$uids?>" size="60"> 多个UID间用 "," 分隔</td>
</tr>
<tr>
<th>赠送道具</th>
<td>
<select id="newmagicaward">
<?php if(is_array($_SGLOBAL['magic'])) { foreach($_SGLOBAL['magic'] as $key => $value) { ?>
<option value="<?=$key?>"><?=$value?></option>
<?php } } ?>
</select>
<input type="text" id="newmagicawardnum" value="1" />
<input class="button" type="button" onclick="addMagicAward()" value="添加" />
<ul id="magicawards"></ul>
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
function checkPresent(){
if($('magicawards').getElementsByTagName("li").length) {
return true;
} else {
alert('请至少选择一种道具并点击“添加”按钮');
return false;
}
}
</script>
</td>
</tr>
</table>
</div>

<div class="footactions">
<input type="hidden" name="refer" value="<?=$_SGLOBAL['refer']?>">
<input type="submit" name="magicsubmit" value="赠送道具" class="submit">
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