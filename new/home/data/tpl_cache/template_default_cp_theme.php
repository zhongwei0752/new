<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/cp_theme|template/default/header|template/default/cp_header|template/default/cp_header|template/default/footer', '1370244928', 'template/default/cp_theme');?><?php if(empty($_SGLOBAL['inajax'])) { ?>
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

<?php if($op=='diy') { ?>
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
<div class="h_status"><a href="cp.php?ac=theme">返回主页风格列表</a></div>

<div class="d_content">

<form method="post" action="cp.php?ac=theme" class="c_form">

<?php if(!empty($_GET['view'])) { ?>
<div class="notice">最后保存时间：<?php echo sgmdate('H:i:s',$_SGLOBAL[timestamp]); ?>，<a href="space.php" target="_blank">新窗口预览个人主页</a></div>
<?php } ?>

<table cellspacing="6" cellpadding="0" width="100%">
<?php if($allowcss) { ?>
<tr>
<td>自己设计个人主页风格，这需要你了解一定的CSS知识<br>
CSS内容:<br>
<textarea name="css" style="width:98%;" rows="20"><?=$space['css']?></textarea></td>
</tr>
<?php } else { ?>
<tr>
<td>您当前不能自定义CSS风格，您可以设置屏蔽他人风格，或者<a href="cp.php?ac=theme">返回主页风格列表</a>选择系统的风格。</td>
</tr>
<?php } ?>
<tr>
<td>
<input type="checkbox" name="nocss" value="1"<?php if($space['nocss']) { ?> checked<?php } ?>> <strong>屏蔽其他人风格</strong>
<br>
别人美化不当可能会造成查看其个人主页时出现问题。你可以勾选此选项，则查看所有人的个人主页将显示默认效果。
</td>
</tr>
<tr>
<td><input type="submit" name="csssubmit" id="csssubmit" value="保存修改" class="submit" /> 
</td>
</tr>
</table>

<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<?php } else { ?>
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
<div class="c_form">
<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>主页风格</h2>
<p>
选择自己喜欢的个人主页风格。
<?php if(checkperm('admin')) { ?><a href="http://u.discuz.net/theme">作为站长，您可以来这里下载更多的风格提供给站内用户选择使用。</a><?php } ?>
</p>
</caption>
<tr>
<?php $i=0; ?>
<?php if(is_array($themes)) { foreach($themes as $key => $value) { ?>
<td align="center">
<div style="border: 1px solid #CCC; padding: 2px; width: 110px; ">
<?php if($value['dir']!='uchomediy') { ?>
<a href="space.php?theme=<?=$value['dir']?>" target="_blank"><?php if($value['pic']) { ?><img src="<?=$value['pic']?>" alt="<?=$value['name']?>" style="width: 110px; height: 120px" /><?php } else { ?><img src="theme/<?=$value['dir']?>/preview.jpg" alt="<?=$value['name']?>" style="width: 110px; height: 120px" /><?php } ?></a>
<?php } else { ?>
<a href="cp.php?ac=theme&op=diy"><img src="<?=$value['pic']?>" alt="<?=$value['name']?>" /></a>
<?php } ?>
</div>

<div style="padding: 10px;">
<?php if($value['dir']=='uchomediy') { ?>
<a href="cp.php?ac=theme&op=diy"><strong><?=$value['name']?></strong></a>
<?php } else { ?>
<a href="space.php?theme=<?=$value['dir']?>" target="_blank"><strong><?=$value['name']?></strong></a>
<?php } ?>
<br>
<?php if($value['dir']=='uchomediy') { ?>
<a href="cp.php?ac=theme&op=diy">进入设置界面</a>
<?php } else { ?>
<a href="space.php?theme=<?=$value['dir']?>" target="_blank">预览</a> | <a href="cp.php?ac=theme&op=use&dir=<?=$value['dir']?>">启用</a>
<?php } ?>
</div>

</td>
<?php if($i%4==3) { ?></tr><tr><?php } ?>
<?php $i++; ?>
<?php } } ?>
</tr>
</table>

<form method="post" action="cp.php?ac=theme">
<table cellspacing="0" cellpadding="0" class="formtable">
<caption>
<h2>我的时区</h2>
<p>如果发现当前显示的时间与你本地时间相差几个小时，那么你需要更改自己的时区设置。</p>
</caption>
<tr>
<tr>
<th width="120">
当前时间
</th>
<td>
<?php echo sgmdate('Y-m-d H:i',$_SGLOBAL[timestamp]); ?>
</td>
</tr>
<tr>
<th>
我的时区
</th>
<td>
<select name="timeoffset">
<option value="">使用系统默认</option>
<option value="-12" <?=$toselect['-12']?>>(GMT -12:00) Eniwetok, Kwajalein</option>
<option value="-11" <?=$toselect['-11']?>>(GMT -11:00) Midway Island, Samoa</option>
<option value="-10" <?=$toselect['-10']?>>(GMT -10:00) Hawaii</option>
<option value="-9" <?=$toselect['-9']?>>(GMT -09:00) Alaska</option>
<option value="-8" <?=$toselect['-8']?>>(GMT -08:00) Pacific Time (US &amp; Canada), Tijuana</option>
<option value="-7" <?=$toselect['-7']?>>(GMT -07:00) Mountain Time (US &amp; Canada), Arizona</option>
<option value="-6" <?=$toselect['-6']?>>(GMT -06:00) Central Time (US &amp; Canada), Mexico City</option>
<option value="-5" <?=$toselect['-5']?>>(GMT -05:00) Eastern Time (US &amp; Canada), Bogota, Lima, Quito</option>
<option value="-4" <?=$toselect['-4']?>>(GMT -04:00) Atlantic Time (Canada), Caracas, La Paz</option>
<option value="-3.5" <?=$toselect['-3.5']?>>(GMT -03:30) Newfoundland</option>
<option value="-3" <?=$toselect['-3']?>>(GMT -03:00) Brassila, Buenos Aires, Georgetown, Falkland Is</option>
<option value="-2" <?=$toselect['-2']?>>(GMT -02:00) Mid-Atlantic, Ascension Is., St. Helena</option>
<option value="-1" <?=$toselect['-1']?>>(GMT -01:00) Azores, Cape Verde Islands</option>
<option value="0"  <?=$toselect['0']?>>(GMT) Casablanca, Dublin, Edinburgh, London, Lisbon, Monrovia</option>
<option value="1" <?=$toselect['1']?>>(GMT +01:00) Amsterdam, Berlin, Brussels, Madrid, Paris, Rome</option>
<option value="2" <?=$toselect['2']?>>(GMT +02:00) Cairo, Helsinki, Kaliningrad, South Africa</option>
<option value="3" <?=$toselect['3']?>>(GMT +03:00) Baghdad, Riyadh, Moscow, Nairobi</option>
<option value="3.5" <?=$toselect['3.5']?>>(GMT +03:30) Tehran</option>
<option value="4" <?=$toselect['4']?>>(GMT +04:00) Abu Dhabi, Baku, Muscat, Tbilisi</option>
<option value="4.5" <?=$toselect['4.5']?>>(GMT +04:30) Kabul</option>
<option value="5" <?=$toselect['5']?>>(GMT +05:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
<option value="5.5" <?=$toselect['5.5']?>>(GMT +05:30) Bombay, Calcutta, Madras, New Delhi</option>
<option value="5.75" <?=$toselect['5.75']?>>(GMT +05:45) Katmandu</option>
<option value="6" <?=$toselect['6']?>>(GMT +06:00) Almaty, Colombo, Dhaka, Novosibirsk</option>
<option value="6.5" <?=$toselect['6.5']?>>(GMT +06:30) Rangoon</option>
<option value="7" <?=$toselect['7']?>>(GMT +07:00) Bangkok, Hanoi, Jakarta</option>
<option value="8" <?=$toselect['8']?>>(GMT +08:00) Beijing, Hong Kong, Perth, Singapore, Taipei</option>
<option value="9" <?=$toselect['9']?>>(GMT +09:00) Osaka, Sapporo, Seoul, Tokyo, Yakutsk</option>
<option value="9.5" <?=$toselect['9.5']?>>(GMT +09:30) Adelaide, Darwin</option>
<option value="10" <?=$toselect['10']?>>(GMT +10:00) Canberra, Guam, Melbourne, Sydney, Vladivostok</option>
<option value="11" <?=$toselect['11']?>>(GMT +11:00) Magadan, New Caledonia, Solomon Islands</option>
<option value="12" <?=$toselect['12']?>>(GMT +12:00) Auckland, Wellington, Fiji, Marshall Island</option>
</select>
</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="submit" name="timeoffsetsubmit" value="提交" class="submit" /></td>
</tr>
</table>
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
</form>
</div>

<?php } ?>

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