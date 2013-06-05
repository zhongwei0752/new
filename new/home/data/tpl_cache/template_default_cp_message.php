<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/cp_message|template/default/header|template/default/cp_header|template/default/footer', '1370402962', 'template/default/cp_message');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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

<h2 class="title"><img src="image/icon/profile.gif">企业设置</h2>
<div class="tabs_header">
<a href="cp.php?ac=advance" class="r_option">&raquo; 高级管理</a>
<ul class="tabs">
<li<?=$actives['profile']?>><a href="cp.php?ac=profile"><span>实名认证</span></a></li>
<li<?=$actives['message']?>><a href="cp.php?ac=message"><span>企业资料</span></a></li>
<li<?=$actives['avatar']?>><a href="cp.php?ac=avatar"><span>企业头像</span></a></li>
<?php if($_SCONFIG['videophoto']) { ?>
<li<?=$actives['videophoto']?>><a href="cp.php?ac=videophoto"><span>视频认证</span></a></li>
<?php } ?>
<?php if($_SCONFIG['allowdomain'] && $_SCONFIG['domainroot'] && checkperm('domainlength')) { ?>
<li<?=$actives['domain']?>><a href="cp.php?ac=domain"><span>我的域名</span></a></li>
<?php } ?>
<?php if($_SCONFIG['sendmailday']) { ?>
<li<?=$actives['sendmail']?>><a href="cp.php?ac=sendmail"><span>邮件提醒</span></a></li>
<?php } ?>
</ul>
</div>



<?php $farr = array(0=>'全用户','1'=>'仅好友','3'=>'仅自己'); ?>
<form method="post" action="<?=$theurl?>&ref&namechange=<?=$_GET['namechange']?>" class="c_form" enctype="multipart/form-data">

<?php if($_GET['op'] == 'base') { ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th style="width:10em;">微信公众号:</th>
<td>
<?php if($space['weixin'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?=$space['weixin']?></span>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的微信公众号一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<label for="weixin"><input id="weixin" type="text" value="<?=$space['weixin']?>" name="weixin" /></label> 
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<th style="width:10em;">企业名称:</th>
<td>
<?php if($space['businessname'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?=$space['businessname']?></span>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的企业名称一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<label for="businessname"><input id="businessname" type="text" value="<?=$space['businessname']?>" name="businessname" /></label> 
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<th style="width:10em;">企业地址:</th>
<td>
<?php if($space['businessaddress'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?=$space['businessaddress']?></span>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的企业地址一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<label for="businessaddress"><input id="businessaddress" type="text" value="<?=$space['businessaddress']?>" name="businessaddress" /></label> 
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<th style="width:10em;">行业:</th>
<td>
<?php if($space['business'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?=$space['business']?></span>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的企业地址一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<label for="business"><input id="business" type="text" value="<?=$space['business']?>" name="business" /></label> 
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>

<tr>
<th>运营地区:</th>
<?php if($space['resideprovince'] && empty($_GET['namechange']) && $space['residecity']) { ?>
<td>
<span style="font-weight:bold;"><?=$space['resideprovince']?> - <?=$space['residecity']?></span>
</td>
<?php } else { ?>
<td id="residecitybox">
<script type="text/javascript" src="source/script_city.js"></script>
<script type="text/javascript">
<!--
showprovince('resideprovince', 'residecity', '<?=$space['resideprovince']?>', 'residecitybox');
showcity('residecity', '<?=$space['residecity']?>', 'resideprovince', 'residecitybox');
//-->
</script>
</td>
<?php } ?>
</tr>
<tr>
<th style="width:10em;">固话:</th>
<td>
<?php if($space['telephone'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?=$space['telephone']?></span>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的固话一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<label for="telephone"><input id="telephone" type="text" value="<?=$space['telephone']?>" name="telephone" /></label> 
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>

<tr>
<th style="width:10em;">手机:</th>
<td>
<?php if($space['businesstelephone'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?=$space['businesstelephone']?></span>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的手机一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<label for="businesstelephone"><input id="businesstelephone" type="text" value="<?=$space['businesstelephone']?>" name="businesstelephone" /></label> 
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<th style="width:10em;">QQ:</th>
<td>
<?php if($space['businessqq'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?=$space['businessqq']?></span>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的QQ一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<label for="businessqq"><input id="businessqq" type="text" value="<?=$space['businessqq']?>" name="businessqq" /></label> 
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<th style="width:10em;">邮箱:</th>
<td>
<?php if($space['businessemail'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?=$space['businessemail']?></span>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的邮箱一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<label for="businessemail"><input id="businessemail" type="text" value="<?=$space['businessemail']?>" name="businessemail" /></label> 
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<th style="width:10em;">企业LOGO:</th>
<td>
<?php if($space['smalllogourl'] && empty($_GET['namechange'])) { ?>
<img src="<?=$space['smalllogourl']?>"/>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的企业LOGO一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<img src="<?=$space['smalllogourl']?>"/><input type="file"  name="file" />
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<th style="width:10em;">企业介绍:</th>
<td>
<?php if($space['companyintroduce'] && empty($_GET['namechange'])) { ?>
<span style="font-weight:bold;"><?=$space['companyintroduce']?></span>
<?php } else { ?>
<?php if(empty($_SCONFIG['namechange'])) { ?>您的邮箱一经确认，将不再允许再次修改，请真实填写。<br><?php } ?>
<label for="companyintroduce"><textarea name="companyintroduce" rows="3" cols="50"><?=$space['companyintroduce']?></textarea></label> 
<?php } ?>
</td>
<td>&nbsp;</td>
</tr>


<tr>
<th style="width:10em;">&nbsp;</th>
<td>
<input type="submit" name="nextsubmit" value="继续下一项" class="submit" />
<input type="submit" name="messagesubmit" value="保存" class="submit" />
<br/>
<?php if($_SCONFIG['namechange']) { ?>[<a href="<?=$theurl?>&namechange=1">修改</a>]<?php } ?>
<?php if($space['namestatus']) { ?>[<font color="red">认证通过</font>]<br/><?php } else { ?><br>等待验证中，您目前将只能使用用户名，并且一些操作可能会受到限制<?php } ?>
<?php if($_SCONFIG['namecheck']) { ?>您填写/修改内容后，需要等待我们认证后才能有效，在认证通过之前，您将只能使用部分操作，并且一些操作可能会受到限制。<br><?php } ?>
</td>
<td>&nbsp;</td>
</tr>
</table>

<?php } elseif($_GET['op'] == 'contact') { ?>

<table cellspacing="0" cellpadding="0" class="formtable">

<?php if($_GET['editemail']) { ?>
</table>

<div class="borderbox">
<table cellspacing="0" cellpadding="0" class="formtable">
<tbody>
<tr>
<th style="width:10em;">本网站的登录密码:</th>
<td>
<input type="password" id="password" name="password" value="" class="t_input" />
<br>为了您的账号安全，更换新邮箱的时候，需要输入您在本网站的密码。
</td>
<td></td>
</tr>
<tr>
<th style="width:10em;">新邮箱:</th>
<td>
<input type="text" id="email" class="t_input" name="email" value="<?=$space['email']?>" />
<?php if($space['emailcheck']) { ?>
<br>注意：新填写的邮箱只有在验证激活之后，才可以生效。
<?php } ?>
</td>
<td></td>
</tr>
</tbody>
</table>
</div><br>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php } else { ?>
<?php if(!$space['email']) { ?>
<tr>
<th style="width:10em;">本网站的登录密码:</th>
<td>
<input type="password" id="password" name="password" value="" class="t_input" />
<br>为了您的账号安全，填写邮箱的时候，需要输入您在本网站的密码。
</td>
<td></td>
</tr>
<?php } ?>
<tr>
<th style="width:10em;">常用邮箱:</th>
<td>
<?php if($space['email']) { ?>
<?=$space['email']?><br>
<?php if($space['emailcheck']) { ?>
当前邮箱已经验证激活 (<a href="<?=$theurl?>&editemail=1">更换</a>)
<?php } else { ?>
邮箱等待验证中...<br>
系统已经向该邮箱发送了一封验证激活邮件，请查收邮件，进行验证激活。<br>
如果没有收到验证邮件，您可以<a href="<?=$theurl?>&editemail=1">更换一个邮箱</a>，或者<a href="<?=$theurl?>&resend=1">重新接收验证邮件</a>
<?php } ?>
<?php } else { ?>
<input type="text" id="email" class="t_input" name="email" value="" />
<br>请准确填写，取回密码、获取通知的时候都会发送到该邮箱。
<br>系统同时会向该邮箱发送一封验证激活邮件，请注意查收。<br>
<?php } ?>
<?php if($space['newemail']) { ?>
<p>您要更换的新邮箱：<strong><?=$space['newemail']?></strong> 需要激活后才能替换当前邮箱并生效。<br>
如果没有收到验证邮件，您可以<a href="<?=$theurl?>&resend=1">重新接收验证邮件</a></p>
<?php } ?>
</td>
<td></td>
</tr>
<?php } ?>
<tr>
<th style="width:10em;">手机:</th>
<td>
<input type="text" class="t_input" name="mobile" value="<?=$space['mobile']?>" /> 
</td>
<td>
<select name="friend[mobile]">
<option value="0"<?=$friendarr['mobile']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['mobile']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['mobile']['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<tr>
<th style="width:10em;">QQ:</th>
<td>
<input type="text" class="t_input" name="qq" value="<?=$space['qq']?>" /> 
</td>
<td>
<select name="friend[qq]">
<option value="0"<?=$friendarr['qq']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['qq']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['qq']['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<tr>
<th>MSN:</th>
<td>
<input type="text" class="t_input" name="msn" value="<?=$space['msn']?>" /> 
</td>
<td>
<select name="friend[msn]">
<option value="0"<?=$friendarr['msn']['0']?>>全用户可见</option>
<option value="1"<?=$friendarr['msn']['1']?>>仅好友可见</option>
<option value="3"<?=$friendarr['msn']['3']?>>仅自己可见</option>
</select>
</td>
</tr>

<tr>
<th style="width:10em;">&nbsp;</th>
<td>
<input type="submit" name="nextsubmit" value="继续下一项" class="submit" />
<input type="submit" name="profilesubmit" value="保存" class="submit" />
</td>
<td>&nbsp;</td>
</tr>
</table>

<?php } elseif($_GET['op'] == 'edu') { ?>

<?php if($list) { ?>
<table cellspacing="0" cellpadding="0" class="listtable">
<tr class="title">
<td>学校/班级或院系</td>
<td>入学年份</td>
<td>隐私设置</td>
<td>操作</td>
</tr>
<?php if(is_array($list)) { foreach($list as $key => $value) { ?>
<?php if($key%2==1) { ?><tr class="line"><?php } else { ?><tr><?php } ?>
<td><?=$value['title']?><br><?=$value['subtitle']?></td>
<td><?=$value['startyear']?></td>
<td><?=$farr[$value['friend']]?></td>
<td><a href="<?=$theurl?>&subop=delete&infoid=<?=$value['infoid']?>">删除信息</a><br><a href="cp.php?ac=friend&op=search&searchmode=1&type=edu&title=<?=$value['title_s']?>" target="_blank">寻找同学</a></td>
</tr>
<?php } } ?>
</table>
<br>
<?php } ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php if($list) { ?>
<caption>
<h2>添加新学校</h2>
</caption>
<?php } ?>
<tbody id="oldtbody">
<tr>
<th style="width:10em;">学校名称:</th>
<td>
<input type="text" name="title[]" value="" class="t_input">
</td>
</tr>
<tr>
<th>班级或院系:</th>
<td>
<input type="text" name="subtitle[]" value="" class="t_input">
</td>
</tr>
<tr>
<th>入学年份:</th>
<td>
<select name="startyear[]">
<?=$yearhtml?>
</select> 年
</td>
</tr>
<tr>
<th>隐私设置:</th>
<td>
<select name="friend[]">
<option value="0">全用户可见</option>
<option value="1">仅好友可见</option>
<option value="3">仅自己可见</option>
</select>
</td>
</tr>
</tbody>

<tbody id="newtbody"></tbody>

<tr>
<th style="width:10em;">&nbsp;</th>
<td><a href="javascript:;" onclick="add_tbody();">添加新的学校信息</a></td>
</tr>
<tr>
<th style="width:10em;">&nbsp;</th>
<td>
<input type="submit" name="nextsubmit" value="继续下一项" class="submit" />
<input type="submit" name="profilesubmit" value="保存" class="submit" /></td>
</tr>
</table>

<?php } elseif($_GET['op'] == 'work') { ?>


<?php if($list) { ?>
<table cellspacing="0" cellpadding="0" class="listtable">
<tr class="title">
<td>公司或机构/部门</td>
<td>工作时间</td>
<td>隐私设置</td>
<td>操作</td>
</tr>
<?php if(is_array($list)) { foreach($list as $key => $value) { ?>
<?php if($key%2==1) { ?><tr class="line"><?php } else { ?><tr><?php } ?>
<td><?=$value['title']?><br><?=$value['subtitle']?></td>
<td>
<?=$value['startyear']?>年<?=$value['startmonth']?>月 ~ 
<?php if($value['endyear']) { ?><?=$value['endyear']?>年<?php } ?>
<?php if($value['endmonth']) { ?><?=$value['endmonth']?>月<?php } ?>
<?php if(!$value['endyear'] && !$value['endmonth']) { ?>现在<?php } ?>
</td>
<td><?=$farr[$value['friend']]?></td>
<td><a href="<?=$theurl?>&subop=delete&infoid=<?=$value['infoid']?>">删除信息</a><br><a href="cp.php?ac=friend&op=search&searchmode=1&type=work&title=<?=$value['title_s']?>" target="_blank">寻找同事</a></td>
</tr>
<?php } } ?>
</table>
<br>
<?php } ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php if($list) { ?>
<caption>
<h2>添加新公司或机构</h2>
</caption>
<?php } ?>
<tbody id="oldtbody">
<tr>
<th style="width:10em;">公司或机构:</th>
<td>
<input type="text" name="title[]" value="" class="t_input">
</td>
</tr>
<tr>
<th>部门:</th>
<td>
<input type="text" name="subtitle[]" value="" class="t_input">
</td>
</tr>
<tr>
<th>工作时间:</th>
<td>
<select name="startyear[]">
<?=$yearhtml?>
</select> 年
<select name="startmonth[]">
<?=$monthhtml?>
</select> 月 ~ 
<select name="endyear[]">
<option value="">现在</option>
<?=$yearhtml?>
</select> 年
<select name="endmonth[]">
<option value=""></option>
<?=$monthhtml?>
</select>月
</td>
</tr>
<tr>
<th>隐私设置:</th>
<td>
<select name="friend[]">
<option value="0">全用户可见</option>
<option value="1">仅好友可见</option>
<option value="3">仅自己可见</option>
</select>
</td>
</tr>
</tbody>

<tbody id="newtbody"></tbody>

<tr>
<th style="width:10em;">&nbsp;</th>
<td><a href="javascript:;" onclick="add_tbody();">添加新的公司或机构</a></td>
</tr>
<tr>
<th style="width:10em;">&nbsp;</th>
<td>
<input type="submit" name="nextsubmit" value="继续下一项" class="submit" />
<input type="submit" name="profilesubmit" value="保存" class="submit" /></td>
</tr>
</table>

<?php } elseif($_GET['op'] == 'info') { ?>

<table cellspacing="0" cellpadding="0" class="formtable">
<?php $infoarr = array(
	'trainwith' => '我想结交',
	'interest' => '兴趣爱好',
	'book' => '喜欢的书籍',
	'movie' => '喜欢的电影',
	'tv' => '喜欢的电视',
	'music' => '喜欢的音乐',
	'game' => '喜欢的游戏',
	'sport' => '喜欢的运动',
	'idol' => '偶像',
	'motto' => '座右铭',
	'wish' => '最近心愿',
	'intro' => '我的简介'
); ?>
<tr>
<th>栏目</th>
<td>内容</td>
<td>隐私设置</td>
</tr>

<?php if(is_array($infoarr)) { foreach($infoarr as $key => $value) { ?>
<tr>
<th><?=$value?>:</th>
<td>
<textarea name="info[<?=$key?>]" rows="3" cols="50"><?=$list[$key]['title']?></textarea>
</td>
<td>
<select name="info_friend[<?=$key?>]">
<option value="0"<?=$friends[$key]['0']?>>全用户可见</option>
<option value="1"<?=$friends[$key]['1']?>>仅好友可见</option>
<option value="3"<?=$friends[$key]['3']?>>仅自己可见</option>
</select>
</td>
</tr>
<?php } } ?>

<tr>
<th style="width:10em;">&nbsp;</th>
<td><input type="submit" name="profilesubmit" value="保存" class="submit" /></td>
</tr>
</table>
<?php } ?>


<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>

<script>
function add_tbody() {
for(i=0; i<$("oldtbody").rows.length; i++) {
newnode = $("oldtbody").rows[i].cloneNode(true);
$("newtbody").appendChild(newnode);
}
}
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
<?php } ?><?php ob_out();?>