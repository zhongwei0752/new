<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('admin/tpl/block|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/default/header|template/default/footer', '1375111625', 'admin/tpl/block');?><?php $_TPL['menunames'] = array(
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
                
                <a class="logo grid_1" href="space.php?do=home"><img src="./template/default/image/logo.png"></a>
                <?php if($_SGLOBAL['supe_uid']) { ?>
                <a href="space.php?do=home" class="grid_2"><?php if($_GET['do']=="home") { ?><p class="nav_actived">首页</p> <?php } else { ?>首页<?php } ?></a>
                

                <?php } else { ?>
                 <a href="index.php" class="grid_2">首页</a>
                <?php } ?>
                <?php if($_SGLOBAL['supe_uid']) { ?>	
                <?php if($space['pmnum']) { ?>
<?php if($space['pmnum']) { ?><a class="grid_2" href="space.php?do=pm&filter=newpm"><p>短消息</p><a href="space.php?do=pm" alt="短消息"><div class="message_pawpaw"><?=$space['pmnum']?></div></a><?php } ?>
                 <?php } else { ?>
                <a class="grid_2" href="space.php?do=pm<?php if(!empty($_SGLOBAL['member']['newpm'])) { ?>&filter=newpm<?php } ?>"><?php if($_GET['do']=="pm") { ?><p class="nav_actived">消息</p> <?php } else { ?>消息<?php } ?></a>

<?php } ?>
<a href="space.php?do=friend" class="grid_2"><?php if($_GET['do']=="friend") { ?><p class="nav_actived">客户列表</p> <?php } else { ?>客户列表<?php } ?></a>
<?php } else { ?>
<div class="grid_3" style="width:400px;display:inline-block;"></div>
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
                        <li class="side_header"><span class="title">基本组件</span><a href="space.php?do=menuset&view=me" class="manage_btn">管理</a></li>
                        <?php if(is_array($zhongwei)) { foreach($zhongwei as $value) { ?>
 <?php if($value['english']==$_GET['do']||$value['english']==$_GET['ac']) { ?><li class="actived"><?php } else { ?><li class="side_option"><?php } ?><a href="<?=$value['url']?>"><?=$value['subject']?></a></li>
<?php } } ?>
                       <!-- <li class="side_option actived"><a href="">企业介绍</a></li>-->
                       
                        <li class="side_header"><span class="title">高级组件</span><a href="space.php?do=menuset&view=me" class="manage_btn">管理</a></li>
                        <li class="side_option"><a href="">客户管理</a></li>
                        <li class="side_option"><a href="">商品管理</a></li>
                        <li class="side_option"><a href="">订单管理</a></li>
                        <li class="side_option"><a href="">预约预定管理</a></li>
                        <li class="side_option"><a href="space.php?do=recommend&view=me">焦点推荐</a></li>
                        <li class="side_option"><a href="">群发</a></li>
                        <li class="side_option"><a href="space.php?do=moblie&view=all">选择手机模板</a></li>
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


<style type="text/css">
@import url(admin/tpl/style.css);
</style>

<div id="cp_content">


<div class="mainarea">
<div class="maininner">

<div class="tabs_header">
<ul class="tabs">
<li<?=$actives['view']?>><a href="admincp.php?ac=block"><span>浏览全部模块</span></a></li>
<li class="null"><a href="admincp.php?ac=block&op=add">添加新模块</a></li>
</ul>
</div>

<?php if(empty($_GET['op'])) { ?>

<div class="bdrcontent">
<p>数据调用，会将站内的数据，通过你编写的查询SQL语句，进行查询并读取出来，生成一段调用代码。
你将调用代码(模板内嵌，或者JS调用都可以)放置到站点页面上便可以将相应的查询结果展示给访客了，
从而可以实现站内任意数据的显示调用。</p>
</div>
<br />
<div class="bdrcontent">

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th>名称</th>
<th width="220">调用代码</th>
<th width="180">操作</th>
</tr>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<tr>
<td><?=$value['blockname']?></td>
<td><a href="<?=$turl?>&op=tpl&id=<?=$value['bid']?>">模块内嵌代码</a> | <a href="<?=$turl?>&op=js&id=<?=$value['bid']?>">Javascript调用代码</a></td>
<td><a href="<?=$turl?>&op=blocksql&id=<?=$value['bid']?>">编辑SQL</a> | 
<a href="<?=$turl?>&op=code&id=<?=$value['bid']?>">参数设置</a> | 
<a href="<?=$turl?>&op=delete&id=<?=$value['bid']?>">删除</a></td>
</tr>
<?php } } ?>
<tr><td colspan="3"><div class="pages"><?=$multi?></div></td></tr>
</table>
</div>

<?php } elseif($_GET['op'] == 'add' || $_GET['op'] == 'blocksql') { ?>

<form method="post" action="<?=$turl?>" id="sqlform">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">
<div class="tabs_header"id="sqlGuide" style="display:none;">
<ul class="tabs">
<li id="li_<?php echo tname('blog'); ?>"><a id="a_select_<?php echo tname('blog'); ?>" href="javascript:void(0);" onclick="javascript:showSQLDiv('<?php echo tname('blog'); ?>');"><span>日志</span></a></li>
<li id="li_<?php echo tname('album'); ?>"><a id="a_select_<?php echo tname('album'); ?>" href="javascript:void(0);" onclick="javascript:showSQLDiv('<?php echo tname('album'); ?>');"><span>相册</span></a></li>
<li id="li_<?php echo tname('thread'); ?>"><a id="a_select_<?php echo tname('thread'); ?>" href="javascript:void(0);" onclick="javascript:showSQLDiv('<?php echo tname('thread'); ?>');"><span>话题</span></a></li>
<li id="li_<?php echo tname('feed'); ?>"><a id="a_select_<?php echo tname('feed'); ?>" href="javascript:void(0);" onclick="javascript:showSQLDiv('<?php echo tname('feed'); ?>');"><span>动态</span></a></li>
<li id="li_<?php echo tname('space'); ?>"><a id="a_select_<?php echo tname('space'); ?>" href="javascript:void(0);" onclick="javascript:showSQLDiv('<?php echo tname('space'); ?>');"><span>用户</span></a></li>
<li id="li_<?php echo tname('pic'); ?>"><a id="a_select_<?php echo tname('pic'); ?>" href="javascript:void(0);" onclick="javascript:showSQLDiv('<?php echo tname('pic'); ?>');"><span>照片</span></a></li>
<li id="li_<?php echo tname('mtag'); ?>"><a id="a_select_<?php echo tname('mtag'); ?>" href="javascript:void(0);" onclick="javascript:showSQLDiv('<?php echo tname('mtag'); ?>');"><span>群组</span></a></li>
<li id="li_sqlDiy"><a id="a_select_sqlDiy" href="javascript:void(0);" onclick="javascript:showSQLDiv('sqlDiy');"><span>手写SQL</span></a></li>
</ul>
</div>
<table cellspacing="0" cellpadding="0" class="formtable">
<tr><th style="width:10em;">模块名称</th><td><input type="text" name="blockname" value="<?=$block['blockname']?>"></td></tr>
</table>
<table cellspacing="0" cellpadding="0" class="formtable" id="<?=$sqlTables['blog']?>" style="display:none;">
<tr><th style="width:10em;">过滤设置</th><td></td></tr>
<tr><th>指定日志blogid</th><td>
<input type="radio" name="sqluseid_<?=$sqlTables['blog']?>" value="0" onclick="javascript:setRadioValue('<?=$sqlTables['blog']?>_where', '<?=$sqlTables['blog']?>_ids');" checked />不指定
<input type="radio" name="sqluseid_<?=$sqlTables['blog']?>" value="1" onclick="javascript:setRadioValue('<?=$sqlTables['blog']?>_ids', '<?=$sqlTables['blog']?>_where');" />指定
<input type="hidden" id="<?=$sqlTables['blog']?>_id" value="blogid" />
</td></tr>
<tbody id="<?=$sqlTables['blog']?>_ids" style="display:none;">
<tr><th>日志blogid</th><td><input type="text" id="<?=$sqlTables['blog']?>_where_blogid" value="" /> 多个日志的 blogid 请用“,”格开</td></tr>
</tbody>
<tbody id="<?=$sqlTables['blog']?>_where">
<tr><th>指定作者uid</th><td><input type="text" id="<?=$sqlTables['blog']?>_where_uid" value="" /> 多个用户的 uid 请用“,”格开</td></tr>
<tr><th>查看数范围</th><td><input type="text" id="<?=$sqlTables['blog']?>_where_viewnum_min" value="" /> ~ <input type="text" id="<?=$sqlTables['blog']?>_where_viewnum_max" value="" /></td></tr>
<tr><th>回复数范围</th><td><input type="text" id="<?=$sqlTables['blog']?>_where_replynum_min" value="" /> ~ <input type="text" id="<?=$sqlTables['blog']?>_where_replynum_max" value="" /></td></tr>
<tr><th>发布时间</th><td><select id="<?=$sqlTables['blog']?>_where_dateline">
<option value="0" selected>---不限制---</option>
<option value="86400">一天以来</option>
<option value="172800">两天以来</option>
<option value="604800">一周以来</option>
<option value="1209600">两周以来</option>
<option value="2592000">一个月以来</option>
<option value="7948800">三个月以来</option>
<option value="15897600">六个月以来</option>
<option value="31536000">一年以来</option>
</select></td></tr>
<tr><th>是否有图片</th><td><select id="<?=$sqlTables['blog']?>_where_picflag">
<option value="null">全部</option>
<option value="1">有图片</option>
</select></td></tr>
<tr><th>隐私范围</th><td><select id="<?=$sqlTables['blog']?>_where_friend">
<option value="0">全站用户可见</option>
<option value="null">全部</option>
</select></td></tr>
</tbody>
<tr><th>排序设置</th><td></td></tr>
<tr><th>第一排序</th><td><select id="<?=$sqlTables['blog']?>_order_key_1">
<option value="null">请选择</option>
<option value="viewnum">查看数</option>
<option value="replynum">回复数</option>
<option value="dateline">发布时间</option>
</select>
<select id="<?=$sqlTables['blog']?>_order_value_1">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr>
<tr><th>第二排序</th><td><select id="<?=$sqlTables['blog']?>_order_key_2">
<option value="null">请选择</option>
<option value="viewnum">查看数</option>
<option value="replynum">回复数</option>
<option value="dateline">发布时间</option>
</select>
<select id="<?=$sqlTables['blog']?>_order_value_2">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr>
<tr><th>第三排序</th><td><select id="<?=$sqlTables['blog']?>_order_key_3">
<option value="null">请选择</option>
<option value="viewnum">查看数</option>
<option value="replynum">回复数</option>
<option value="dateline">发布时间</option>
</select>
<select id="<?=$sqlTables['blog']?>_order_value_3">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr></table>

<table cellspacing="0" cellpadding="0" class="formtable" id="<?=$sqlTables['album']?>" style="display:none;">
<tr><th style="width:10em;">过滤设置</th><td></td></tr>
<tr><th>指定相册albumid</th><td>
<input type="radio" name="sqluseid_<?=$sqlTables['album']?>" value="0" onclick="javascript:setRadioValue('<?=$sqlTables['album']?>_where', '<?=$sqlTables['album']?>_ids');" checked />不指定
<input type="radio" name="sqluseid_<?=$sqlTables['album']?>" value="1" onclick="javascript:setRadioValue('<?=$sqlTables['album']?>_ids', '<?=$sqlTables['album']?>_where');" />指定
<input type="hidden" id="<?=$sqlTables['album']?>_id" value="albumid" />
</td></tr>
<tbody id="<?=$sqlTables['album']?>_ids" style="display:none;">
<tr><th>相册albumid</th><td><input type="text" id="<?=$sqlTables['album']?>_where_albumid" value="" /> 多个相册的 albumid 请用“,”格开</td></tr>
</tbody>
<tbody id="<?=$sqlTables['album']?>_where">
<tr><th>指定作者uid</th><td><input type="text" id="<?=$sqlTables['album']?>_where_uid" value="" /> 多个用户的 uid 请用“,”格开</td></tr>
<tr><th>照片数量范围</th><td><input type="text" id="<?=$sqlTables['album']?>_where_picnum_min" value="" /> ~ <input type="text" id="<?=$sqlTables['album']?>_where_picnum_max" value="" /></td></tr>
<tr><th>发布时间</th><td><select id="<?=$sqlTables['album']?>_where_dateline">
<option value="0" selected>---不限制---</option>
<option value="86400">一天以来</option>
<option value="172800">两天以来</option>
<option value="604800">一周以来</option>
<option value="1209600">两周以来</option>
<option value="2592000">一个月以来</option>
<option value="7948800">三个月以来</option>
<option value="15897600">六个月以来</option>
<option value="31536000">一年以来</option>
</select></td></tr>
<tr><th>更新时间</th><td><select id="<?=$sqlTables['album']?>_where_updatetime">
<option value="0" selected>---不限制---</option>
<option value="86400">一天以来</option>
<option value="172800">两天以来</option>
<option value="604800">一周以来</option>
<option value="1209600">两周以来</option>
<option value="2592000">一个月以来</option>
<option value="7948800">三个月以来</option>
<option value="15897600">六个月以来</option>
<option value="31536000">一年以来</option>
</select></td></tr>
<tr><th>是否有图片</th><td><select id="<?=$sqlTables['album']?>_where_picflag">
<option value="1">有图片</option>
<option value="null">全部</option>
</select></td></tr>
<tr><th>隐私范围</th><td><select id="<?=$sqlTables['album']?>_where_friend">
<option value="0">全站用户可见</option>
<option value="null">所有</option>
</select></td></tr>
</tbody>
<tr><th>排序设置</th><td></td></tr>
<tr><th>第一排序</th><td><select id="<?=$sqlTables['album']?>_order_key_1">
<option value="null">请选择</option>
<option value="picnum">照片数量</option>
<option value="updatetime">更新时间</option>
<option value="dateline">创建时间</option>
</select>
<select id="<?=$sqlTables['album']?>_order_value_1">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr>
<tr><th>第二排序</th><td><select id="<?=$sqlTables['album']?>_order_key_2">
<option value="null">请选择</option>
<option value="picnum">照片数量</option>
<option value="updatetime">更新时间</option>
<option value="dateline">创建时间</option>
</select>
<select id="<?=$sqlTables['album']?>_order_value_2">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr>
<tr><th>第三排序</th><td><select id="<?=$sqlTables['album']?>_order_key_3">
<option value="null">请选择</option>
<option value="picnum">照片数量</option>
<option value="updatetime">更新时间</option>
<option value="dateline">创建时间</option>
</select>
<select id="<?=$sqlTables['album']?>_order_value_3">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr></table>

<table cellspacing="0" cellpadding="0" class="formtable" id="<?=$sqlTables['thread']?>" style="display:none;">
<tr><th style="width:10em;">过滤设置</th><td></td></tr>
<tr><th>话题threadid</th><td>
<input type="radio" name="sqluseid_<?=$sqlTables['thread']?>" value="0" onclick="javascript:setRadioValue('<?=$sqlTables['thread']?>_where', '<?=$sqlTables['thread']?>_ids');" checked />不指定
<input type="radio" name="sqluseid_<?=$sqlTables['thread']?>" value="1" onclick="javascript:setRadioValue('<?=$sqlTables['thread']?>_ids', '<?=$sqlTables['thread']?>_where');" />指定
<input type="hidden" id="<?=$sqlTables['thread']?>_id" value="tid" />
</td></tr>
<tbody id="<?=$sqlTables['thread']?>_ids" style="display:none;">
<tr><th>话题threadid</th><td><input type="text" id="<?=$sqlTables['thread']?>_where_tid" value="" /> 多个话题的 threadid 请用“,”格开</td></tr>
</tbody>
<tbody id="<?=$sqlTables['thread']?>_where">
<tr><th>指定作者uid</th><td><input type="text" id="<?=$sqlTables['thread']?>_where_uid" value="" /> 多个用户的 uid 请用“,”格开</td></tr>
<tr><th>指定群组tagid</th><td><input type="text" id="<?=$sqlTables['thread']?>_where_tagid" value="" /> 多个群组的 tagid 请用“,”格开</td></tr>
<tr><th>话题查看数范围</th><td><input type="text" id="<?=$sqlTables['thread']?>_where_viewnum_min" value="" /> ~ <input type="text" id="<?=$sqlTables['thread']?>_where_viewnum_max" value="" /></td></tr>
<tr><th>话题回复数范围</th><td><input type="text" id="<?=$sqlTables['thread']?>_where_replynum_min" value="" /> ~ <input type="text" id="<?=$sqlTables['thread']?>_where_replynum_max" value="" /></td></tr>
<tr><th>发布时间</th><td><select id="<?=$sqlTables['thread']?>_where_dateline">
<option value="0" selected>---不限制---</option>
<option value="86400">一天以来</option>
<option value="172800">两天以来</option>
<option value="604800">一周以来</option>
<option value="1209600">两周以来</option>
<option value="2592000">一个月以来</option>
<option value="7948800">三个月以来</option>
<option value="15897600">六个月以来</option>
<option value="31536000">一年以来</option>
</select></td></tr>
<tr><th>是否置顶</th><td><select id="<?=$sqlTables['thread']?>_where_displayorder">
<option value="null">全部</option>
<option value="1">置顶</option>
</select></td></tr>
<tr><th>是否精华话题</th><td><select id="<?=$sqlTables['thread']?>_where_digest">
<option value="null">全部</option>
<option value="1">精华</option>
</select></td></tr>
</tbody>
<tr><th>排序设置</th><td></td></tr>
<tr><th>第一排序</th><td><select id="<?=$sqlTables['thread']?>_order_key_1">
<option value="null">请选择</option>
<option value="viewnum">查看数</option>
<option value="replynum">回复数</option>
<option value="dateline">发布时间</option>
</select>
<select id="<?=$sqlTables['thread']?>_order_value_1">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr>
<tr><th>第二排序</th><td><select id="<?=$sqlTables['thread']?>_order_key_2">
<option value="null">请选择</option>
<option value="viewnum">查看数</option>
<option value="replynum">回复数</option>
<option value="dateline">发布时间</option>
</select>
<select id="<?=$sqlTables['thread']?>_order_value_2">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr>
<tr><th>第三排序</th><td><select id="<?=$sqlTables['thread']?>_order_key_3">
<option value="null">请选择</option>
<option value="viewnum">查看数</option>
<option value="replynum">回复数</option>
<option value="dateline">发布时间</option>
</select>
<select id="<?=$sqlTables['thread']?>_order_value_3">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr></table>

<table cellspacing="0" cellpadding="0" class="formtable" id="<?=$sqlTables['feed']?>" style="display:none;">
<tr><th style="width:10em;">过滤设置</th><td></td></tr>
<tbody id="<?=$sqlTables['feed']?>_where">
<tr><th>动态feedid</th><td><input type="text" id="<?=$sqlTables['feed']?>_where_feedid" value="" /> 多个动态的 feedid 请用“,”格开</td></tr>
<tr><th>动态类型</th><td><select id="<?=$sqlTables['feed']?>_where_appid">
<option value="null">全部</option>
<option value="0">站内</option>
<option value="1">应用</option>
</select></td></tr>
<tr><th>隐私范围</th><td><select id="<?=$sqlTables['feed']?>_where_friend">
<option value="0">全站用户可见</option>
<option value="null">全部</option>
</select></td></tr>
</tbody>
<tr><th>排序设置</th><td></td></tr>
<tr><th>第一排序</th><td><select id="<?=$sqlTables['feed']?>_order_key_1">
<option value="null">请选择</option>
<option value="dateline">产生时间</option>
</select>
<select id="<?=$sqlTables['feed']?>_order_value_1">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr></table>

<table cellspacing="0" cellpadding="0" class="formtable" id="<?=$sqlTables['space']?>" style="display:none;">
<tr><th style="width:10em;">过滤设置</th><td></td></tr>
<tr><th>指定用户uid</th><td>
<input type="radio" name="sqluseid_<?=$sqlTables['space']?>" value="0" onclick="javascript:setRadioValue('<?=$sqlTables['space']?>_where', '<?=$sqlTables['space']?>_ids');" checked />不指定
<input type="radio" name="sqluseid_<?=$sqlTables['space']?>" value="1" onclick="javascript:setRadioValue('<?=$sqlTables['space']?>_ids', '<?=$sqlTables['space']?>_where');" />指定
<input type="hidden" id="<?=$sqlTables['space']?>_id" value="uid" />
</td></tr>
<tbody id="<?=$sqlTables['space']?>_ids" style="display:none;">
<tr><th>用户uid</th><td><input type="text" id="<?=$sqlTables['space']?>_where_uid" value="" /> 多个用户的 uid 请用“,”格开</td></tr>
</tbody>
<tbody id="<?=$sqlTables['space']?>_where">
<tr><th>积分数范围</th><td><input type="text" id="<?=$sqlTables['space']?>_where_credit_min" value="" /> ~ <input type="text" id="<?=$sqlTables['space']?>_where_credit_max" value="" /></td></tr>
<tr><th>指定用户组</th><td>
<table cellpadding="0" cellspacing="0" class="formtable"><tr>
<?php $i = 0; ?>
<?php if(is_array($usergrouparr)) { foreach($usergrouparr as $gid => $value) { ?>
<?php if(!empty($i) && 0 == $i % 3) { ?></tr><tr><?php } ?>
<td><input type="checkbox" name="<?=$sqlTables['space']?>_where_groupid_<?=$gid?>" value="<?=$gid?>" id="<?=$sqlTables['space']?>_where_groupid_<?=$gid?>" /> <label for="<?=$sqlTables['space']?>_where_groupid_<?=$gid?>" style="cursor:pointer;"><?=$value['grouptitle']?></label></td>
<?php $i ++; ?>
<?php } } ?>
</tr></table>
</td></tr>
<tr><th>查看数范围</th><td><input type="text" id="<?=$sqlTables['space']?>_where_viewnum_min" value="" /> ~ <input type="text" id="<?=$sqlTables['space']?>_where_viewnum_max" value="" /></td></tr>
<tr><th>好友数范围</th><td><input type="text" id="<?=$sqlTables['space']?>_where_friendnum_min" value="" /> ~ <input type="text" id="<?=$sqlTables['space']?>_where_friendnum_max" value="" /></td></tr>
<tr><th>是否实名认证</th><td><select id="<?=$sqlTables['space']?>_where_namestatus">
<option value="null">全部</option>
<option value="1">已认证</option>
</select></td></tr>
<tr><th>建立时间</th><td><select id="<?=$sqlTables['space']?>_where_dateline">
<option value="0" selected>---不限制---</option>
<option value="86400">一天以来</option>
<option value="172800">两天以来</option>
<option value="604800">一周以来</option>
<option value="1209600">两周以来</option>
<option value="2592000">一个月以来</option>
<option value="7948800">三个月以来</option>
<option value="15897600">六个月以来</option>
<option value="31536000">一年以来</option>
</select></td></tr>
<tr><th>更新时间</th><td><select id="<?=$sqlTables['space']?>_where_updatetime">
<option value="0" selected>---不限制---</option>
<option value="86400">一天以来</option>
<option value="172800">两天以来</option>
<option value="604800">一周以来</option>
<option value="1209600">两周以来</option>
<option value="2592000">一个月以来</option>
<option value="7948800">三个月以来</option>
<option value="15897600">六个月以来</option>
<option value="31536000">一年以来</option>
</select></td></tr>
<tr><th>是否有头像</th><td><select id="<?=$sqlTables['space']?>_where_avatar">
<option value="null">全部</option>
<option value="1">有</option>
</select></td></tr>
<tr><th>用户性别</th><td><select id="<?=$sqlTables['space']?>_where_sex">
<option value="null">全部</option>
<option value="1">男</option>
<option value="2">女</option>
</select></td></tr>
</tbody>
<tr><th>排序设置</th><td></td></tr>
<tr><th>第一排序</th><td><select id="<?=$sqlTables['space']?>_order_key_1">
<option value="null">请选择</option>
<option value="viewnum">查看数</option>
<option value="friendnum">好友数</option>
<option value="updatetime">最后更新</option>
<option value="lastlogin">最后登录时间</option>
<option value="credit">积分数</option>
<option value="dateline">开通时间</option>
</select>
<select id="<?=$sqlTables['space']?>_order_value_1">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr>
<tr><th>第二排序</th><td><select id="<?=$sqlTables['space']?>_order_key_2">
<option value="null">请选择</option>
<option value="viewnum">查看数</option>
<option value="friendnum">好友数</option>
<option value="updatetime">最后更新</option>
<option value="lastlogin">最后登录时间</option>
<option value="credit">积分数</option>
<option value="dateline">开通时间</option>
</select>
<select id="<?=$sqlTables['space']?>_order_value_2">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr>
<tr><th>第三排序</th><td><select id="<?=$sqlTables['space']?>_order_key_3">
<option value="null">请选择</option>
<option value="viewnum">查看数</option>
<option value="friendnum">好友数</option>
<option value="updatetime">最后更新</option>
<option value="lastlogin">最后登录时间</option>
<option value="credit">积分数</option>
<option value="dateline">开通时间</option>
</select>
<select id="<?=$sqlTables['space']?>_order_value_3">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr></table>

<table cellspacing="0" cellpadding="0" class="formtable" id="<?=$sqlTables['mtag']?>" style="display:none;">
<tr><th style="width:10em;">过滤设置</th><td></td></tr>
<tr><th>指定群组tagid</th><td>
<input type="radio" name="sqluseid_<?=$sqlTables['mtag']?>" value="0" onclick="javascript:setRadioValue('<?=$sqlTables['mtag']?>_where', '<?=$sqlTables['mtag']?>_ids');" checked />不指定
<input type="radio" name="sqluseid_<?=$sqlTables['mtag']?>" value="1" onclick="javascript:setRadioValue('<?=$sqlTables['mtag']?>_ids', '<?=$sqlTables['mtag']?>_where');" />指定
<input type="hidden" id="<?=$sqlTables['mtag']?>_id" value="tagid" />
</td></tr>
<tbody id="<?=$sqlTables['mtag']?>_ids" style="display:none;">
<tr><th>群组tagid</th><td><input type="text" id="<?=$sqlTables['mtag']?>_where_tagid" value="" /> 多个群组的 tagid 请用“,”格开</td></tr>
</tbody>
<tbody id="<?=$sqlTables['mtag']?>_where">
<tr><th>群组人数</th><td><input type="text" id="<?=$sqlTables['mtag']?>_where_membernum_min" value="" /> ~ <input type="text" id="<?=$sqlTables['mtag']?>_where_membernum_max" value="" /></td></tr>
<tr><th>群组分类</th><td>
<table cellpadding="0" cellspacing="0" class="formtable"><tr>
<?php $i = 0; ?>
<?php if(is_array($list)) { foreach($list as $value) { ?>
<?php if(!empty($i) && 0 == $i % 3) { ?></tr><tr><?php } ?>
<td><input type="checkbox" name="<?=$sqlTables['mtag']?>_where_fieldid_<?=$value['fieldid']?>" value="<?=$value['fieldid']?>" id="<?=$sqlTables['mtag']?>_where_fieldid_<?=$value['fieldid']?>" /> <label for="<?=$sqlTables['mtag']?>_where_fieldid_<?=$value['fieldid']?>" style="cursor:pointer;"><?=$value['title']?></label></td>
<?php $i ++; ?>
<?php } } ?>
</tr></table>
</td></tr>
<tr><th>群组权限</th><td><select id="<?=$sqlTables['mtag']?>_where_joinperm">
<option value="null">全部</option>
<option value="1">允许所有人可加入</option>
</select></td></tr>
</tbody>
<tr><th>排序设置</th><td></td></tr>
<tr><th>第一排序</th><td><select id="<?=$sqlTables['mtag']?>_order_key_1">
<option value="null">请选择</option>
<option value="membernum">群组人数</option>
</select>
<select id="<?=$sqlTables['mtag']?>_order_value_1">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr></table>

<table cellspacing="0" cellpadding="0" class="formtable" id="<?=$sqlTables['pic']?>" style="display:none;">
<tr><th style="width:10em;">过滤设置</th><td></td></tr>
<tbody id="<?=$sqlTables['pic']?>_where">
<tr><th>相册albumid</th><td><input type="text" id="<?=$sqlTables['pic']?>_where_albumid" value="" /> 多个相册的 albumid 请用“,”格开</td></tr>
<tr><th>用户uid</th><td><input type="text" id="<?=$sqlTables['pic']?>_where_uid" value="" /> 多个用户的 uid 请用“,”格开</td></tr>
</tbody>
<tr><th>排序设置</th><td></td></tr>
<tr><th>第一排序</th><td><select id="<?=$sqlTables['pic']?>_order_key_1">
<option value="null">请选择</option>
<option value="dateline">上传时间</option>
</select>
<select id="<?=$sqlTables['pic']?>_order_value_1">
<option value="null">请选择</option>
<option value="ASC">递增</option>
<option value="DESC">递减</option>
</select></td></tr></table>

<table cellspacing="0" cellpadding="0" class="formtable" id="sqlDiy" style="display:none;">
<tr><th style="width:10em;">数据调用SQL</th><td><textarea id="blocksql" name="blocksql" style="width:98%;" rows="6"><?=$block['blocksql']?></textarea>
<br />本功能需要你掌握一定的SQL编写知识。
<br />本数据调用只支持编写 SELECT 开头的查询SQL。
<br />SQL语句中需要使用完整的表名。如果想调用非本程序数据库中的表，在表名前面增加数据库名即可。例如：
<br />1. 查询读取最新的日志 (假如表名前缀为默认的 uchome_)
<br />SELECT * FROM uchome_blog ORDER BY dateline DESC
<br />2. 查询读取论坛的最新帖子 (假如论坛安装在discuz数据库，表名前缀为 cdb_)
<br />SELECT * FROM discuz.cdb_threads ORDER BY dateline DESC
</td></tr>
</table>
</div>

<div class="footactions">
<input type="hidden" name="bid" value="<?=$block['bid']?>">
<input type="submit" name="valuesubmit" value="提交" class="submit">
</div>

<script language="javascript" type="text/javascript">
var curMod = '';
var tableFields = ['uid', 'feedid', 'tagid', 'albumid'];
var sqls = [];
var tablePre = '<?=$_SC['tablepre']?>';
<?php if(is_array($sqls)) { foreach($sqls as $key => $value) { ?>
sqls['<?=$key?>'] = '<?=$value?>';
<?php } } ?>
$('sqlform').onsubmit = function() {
var frmObj = $('sqlform');
var eLen = frmObj.elements.length;
var whereArr = [];
var orderKeys = [];
var orderValues = [];
var orderArr = [];
var tmpArr = [];
var groupidArr = [];
var fieldidArr = [];
var preReg = new RegExp(tablePre, 'ig');
var tableName = curMod.replace(preReg, '');
var timeFields = ['dateline', 'updatetime'];
var str = '';
var whereOrder = '';
if('' == curMod || 'undefined' == typeof(sqls[tableName])) {
return;
}
var tReg = new RegExp('_([a-zA-Z0-9]*)', 'ig');
for(var i = 0; i < eLen; i ++) {
if('' == frmObj.elements[i].value || 'null' == frmObj.elements[i].value) {
continue;
}
tmpArr.length = 0;
str = (frmObj.elements[i].id).replace(curMod, '');
if(frmObj.elements[i].id != str) {
str.replace(tReg, function($0, $1) {
tmpArr[tmpArr.length] = $1;
});
if('where' == tmpArr[0]) {
if('min' == tmpArr[2]) {
minv = parseInt(frmObj.elements[i].value);
if(isNaN(minv)) {
continue;
}
whereArr.push("`" + tableName + "`.`" + tmpArr[1] + "`>'" + minv + "'");
} else if('max' == tmpArr[2]) {
maxv = parseInt(frmObj.elements[i].value);
if(isNaN(maxv)) {
continue;
}
whereArr.push("`" + tableName + "`.`" + tmpArr[1] + "`<'" + maxv + "'");
} else {
if(-1 != in_array(tmpArr[1], tableFields)) {
whereArr.push("`" + tableName + "`.`" + tmpArr[1] + "` in ('" + ((frmObj.elements[i].value).split(',')).join("','") + "')");
} else if('groupid' == tmpArr[1]) {
groupid = parseInt(tmpArr[2]);
if(isNaN(groupid) || !frmObj.elements[i].checked) {
continue;
}
groupidArr.push(tmpArr[2]);
} else if('fieldid' == tmpArr[1]) {
fieldid = parseInt(tmpArr[2]);
if(isNaN(fieldid) || !frmObj.elements[i].checked) {
continue;
}
fieldidArr.push(tmpArr[2]);
} else if('appid' == tmpArr[1]) {
appid = parseInt(frmObj.elements[i].value);
if(isNaN(appid)) {
continue;
}
if(0 == appid) {
whereArr.push("`" + tableName + "`.`" + tmpArr[1] + "`='0'");
} else {
whereArr.push("`" + tableName + "`.`" + tmpArr[1] + "`>'0'");
}
} else if('sex' == tmpArr[1]) {
whereArr.push("`spacefield`.`sex`='" + parseInt(frmObj.elements[i].value) + "'");
} else if(-1 != in_array(tmpArr[1], timeFields)) {
if(0 < frmObj.elements[i].value) {
whereArr.push("`" + tableName + "`.`" + tmpArr[1] + "`>'[" + frmObj.elements[i].value + "]'");
}
} else {
whereArr.push("`" + tableName + "`.`" + tmpArr[1] + "`='" + frmObj.elements[i].value + "'");
}
}
} else if('order' == tmpArr[0]) {
if('key' == tmpArr[1]) {
orderKeys[frmObj.elements[i].value] = tmpArr[2];
} else if('value' == tmpArr[1]) {
orderValues[tmpArr[2]] = frmObj.elements[i].value;
}
}
}
}
if(0 < groupidArr.length) {
whereArr.push("`" + tableName + "`.`groupid` in ('" + groupidArr.join("','") + "')");
}
if(0 < fieldidArr.length) {
whereArr.push("`" + tableName + "`.`fieldid` in ('" + fieldidArr.join("','") + "')");
}
for(var i in orderKeys) {
if(null != orderValues[orderKeys[i]]) {
orderArr.push("`" + tableName + "`.`" + i + "` " + orderValues[orderKeys[i]]);
}
}
// 如果是只使用了ID，则把where清空
if($(curMod + '_ids') && 'none' != $(curMod + '_ids').style.display) {
whereArr.length = 0;
var whereId = $(curMod + '_where_' + $(curMod + '_id').value).value;
if('' != whereId) {
whereArr.push("`" + tableName + "`.`" + $(curMod + '_id').value + "` in ('" + (whereId.split(",")).join("','") + "')");
}
}
if(0 < whereArr.length) {
whereOrder += ' WHERE ' + whereArr.join(' AND ');
}
if(0 < orderArr.length) {
whereOrder += " ORDER BY " + orderArr.join(", ");
}
$('blocksql').value = sqls[tableName].replace(/WHEREORDER/g, whereOrder);
}
function in_array(ineedle, haystack, caseinsensitive) {
var needle = new String(ineedle);
if(needle.Length == 0) return -1;
if(caseinsensitive) {
needle = needle.toLowerCase();
for(var i in haystack)	{
if(haystack[i].toLowerCase() == needle) {
return i;
}
}
} else {
for(var i in haystack)	{
if(haystack[i] == needle) {
return i;
}
}
}
return -1;
}
function setRadioValue(showid, hiddenid) {
if($(showid)) {
$(showid).style.display = '';
}
if($(hiddenid)) {
$(hiddenid).style.display = 'none';
}
}
function showSQLDiv(sid) {
var sObj = $(sid);
if('' != curMod) {
$(curMod).style.display = 'none';
$('li_' + curMod).className = '';
}
$('li_' + sid).className = 'active';
sObj.style.display = '';
curMod = sid;
}
<?php if('blocksql' == $_GET['op']) { ?>
$('sqlDiy').style.display = '';
<?php } else { ?>
$('sqlGuide').style.display = '';
showSQLDiv('<?=$sqlTables['blog']?>');
<?php } ?>
</script>
</form>

<br />
<div class="bdrcontent">
<div class="title">
<h3>数据字典参考</h3>
<p>以下是本程序的数据库的数据表名以及字段列表，供你编写查询语句的时候参考。每个字段的具体含义，请参考程序包中的《数据字典》文档</p>
</div>

<?php if(is_array($tables)) { foreach($tables as $key => $value) { ?>
<br />
<ul class="listcol list4col">
<b><?=$key?></b>
<?php if(is_array($value)) { foreach($value as $subkey => $subvalue) { ?>
<li><?=$subvalue?></li>
<?php } } ?>
</ul>
<?php } } ?>

</div>

<?php } elseif($_GET['op'] == 'code') { ?>

<form method="post" action="<?=$turl?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />
<div class="bdrcontent">

<table cellspacing="0" cellpadding="0" class="formtable">
<tr><th style="width:10em;">查询SQL语句</th><td>
<?=$block['blocksql']?>
<br />[<a href="<?=$turl?>&op=blocksql&id=<?=$block['bid']?>">编辑SQL</a>]
</td></tr>

<tr><th>变量名</th><td><?=$phptag?>_SBLOCK['<input type="text" name="cachename" id="cachename" value="<?=$block['cachename']?>" style="width: 60px;">']</td></tr>
<tr><th>缓存时间</th><td><input type="text" name="cachetime" value="<?=$block['cachetime']?>" size="5"> 秒
<br />设置一个缓存时间间隔，该模块数据将自动在指定的时间间隔内更新数据。
<br />缓存时间设置越大，对服务器的负载就越小，但数据的及时性就不够。
<br />设置为0，则不使用缓存，实时更新，这样会严重增加服务器负载。</td></tr>
<tr><th>获取数目</th><td>
<input id="ra_start_num" name="num_option" type="radio" onclick="show_num_option()"<?php if(!$block['perpage']) { ?> checked="checked"<?php } ?>><label for="ra_start_num">获取满足条件的部分数据</label>
&nbsp;&nbsp;
<input id="ra_perpage" name="num_option" type="radio" onclick="show_num_option()"<?php if($block['perpage']) { ?> checked="checked"<?php } ?>><label for="ra_perpage">获取全部数据，分页显示</label><br />
<p id="op_start_num"<?php if($block['perpage']) { ?> style="display:none"<?php } ?>>
获取满足条件的第<input type="text" name="startnum" value="<?=$block['startnum']?>" size="5"> 至 <input type="text" name="num" value="<?=$block['num']?>" size="5"> 条数据
</p>
<p id="op_perpage"<?php if(!$block['perpage']) { ?> style="display:none"<?php } ?>>
每页显示 <input type="text" name="perpage" value="<?=$block['perpage']?>" size="5"> 条
</p>
</td></tr>
<tr><th>数据显示HTML代码</th><td>
<textarea name="htmlcode" id="htmlcode" style="width:98%;" rows="10"><?=$block['htmlcode']?></textarea>
<br />用html语言，编写数据的显示样式。
<br />获取到的数据存放在数组 <?=$phptag?>_SBLOCK[变量名] 中(将“变量名”替换为你在上面设定的变量名)，可以使用 loop 语法对该数组变量进行循环展示。请参考程序包中《数据调用》文档。
</td></tr>

<?php if($colnames) { ?>
<tr><th>数据预览</th><td>
<input type="button" class="submit" id="preview" name="preview" value="预览" />
<div id="previewBlock" style="border:1px solid #BBB;padding:2px;margin-top:3px;">数据预览</div></td></tr>

<tr><th>可调用字段实例</th>
<td>
<table cellspacing="1" cellpadding="0" bgcolor="#CCCCCC">
<tr bgcolor="#F3F3F3"><th>&nbsp;字段名 </th><th>&nbsp;数据实例&nbsp;</th></tr>
<?php if(is_array($colnames)) { foreach($colnames as $key => $value) { ?>
<tr><td bgcolor="#F5F5F5">&nbsp;<?=$key?>&nbsp;</td><td bgcolor="#FFFFFF">&nbsp;<?=$value?>&nbsp;</td></tr>
<?php } } ?>
</table>
</td></tr>
<?php } ?>

</table>
</div>

<div class="footactions">
<input type="hidden" name="bid" value="<?=$block['bid']?>">
<input type="submit" name="codesubmit" value="提交" class="submit">
</div>

</form>
<script language="javascript" type="text/javascript">
$('cachename').onkeyup = function() {
var blockReg = new RegExp('\\$\\_SBLOCK\\[(.*?)\\]', 'ig');
var cname = $('cachename').value;
var htmvalue = $('htmlcode').value;
htmvalue = htmvalue.replace(blockReg, function($0, $1) {
$1 = cname;
return '$' + '_SBLOCK[' + $1 + ']';
});
$('htmlcode').value = htmvalue;
}
<?php if($colnames) { ?>
var colname = {};
<?php if(is_array($colnames)) { foreach($colnames as $key => $value) { ?>
colname['<?=$key?>'] = '<?php echo addcslashes($value, '\'\\'); ?>';
<?php } } ?>
$('preview').onclick = function() {
var html = $('htmlcode').value;
var loopReg2 = /\<\!\-\-\{loop\s+(\S+)\s+\$(\S+)\}\-\-\>/ig;
var loopReg3 = /\<\!\-\-\{loop\s+(\S+)\s+\$(\S+)\s+\$(\S+)\}\-\-\>/ig;
var varReg = /\$(([a-zA-Z_]+)(\[[a-zA-Z0-9_\-\.\"\'\[\]\$]+\])*)/ig;
var reg = '';
html = html.replace(loopReg2, function($0, $1, $2) {
reg = $2;
return '';
});
if('' == reg) {
html = html.replace(loopReg3, function($0, $1, $2, $3) {
reg = $3;
return '';
})
}
eval(reg + ' = colname');
html = html.replace(varReg, function($0, $1, $2, $3) {
key = $3['match'](/(\w+)/ig);
return eval($2 + '["' + key + '"]');
});
$('previewBlock').innerHTML = html;
}
<?php } ?>

function show_num_option(){
if($('ra_perpage').checked) {
var inputs = $('op_start_num').getElementsByTagName('input');
for(var i = 0, L=inputs.length; i < L; i++) {
inputs[i].value = '0';
}
$('op_perpage').style.display = "";
$('op_start_num').style.display = "none";
} else {
var inputs = $('op_perpage').getElementsByTagName('input');
for(var i = 0, L=inputs.length; i < L; i++) {
inputs[i].value = '0';
}
$('op_perpage').style.display = "none";
$('op_start_num').style.display = "";	
}
}

</script>

<?php } elseif($_GET['op'] == 'tpl') { ?>
<div class="bdrcontent">
<div class="title"><h3>模版调用代码</h3></div>

<table cellspacing="0" cellpadding="0" width="100%">
<tr><td>请将以下代码复制，放到站点模板的任意页面的指定位置即可。</td></tr>
<tr><td><input type="text" name="blockcode" value="<?=$code?>" size="80"></td></tr>
</table>
</div>

<?php } elseif($_GET['op'] == 'js') { ?>

<div class="bdrcontent">
<div class="title"><h3>Javascript调用代码</h3></div>

<table cellspacing="0" cellpadding="0" width="100%">
<tr><td><textarea name="blockcode" style="width:98%;" rows="5"><?=$code?></textarea></td></tr>
</table>
</div>
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
            
<a href="javascript:;" onclick="window.scrollTo(0,0);" id="a_top" title="TOP" style="position:relative;left:280px;top:0;"><img src="image/top.gif" alt="" style="padding: 5px 6px 6px;" /></a>

    </div>

</div>
<!--/wrap-->
    <script src="js/jquery.js"></script>
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
<?php } ?><?php ob_out();?>