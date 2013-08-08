<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('admin/tpl/magic|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/default/header|template/default/footer', '1375854400', 'admin/tpl/magic');?><?php $_TPL['menunames'] = array(
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
		'talk' => '在线沟通',
		'weixin' =>'微信录入',
		'image' =>'首页图片录入'
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
                   <a href="cp.php?ac=profile"  style="float:left;padding-right:10px;"><?php echo avatar($_SGLOBAL[supe_uid]); ?></a>
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
                        <li class="side_option"><a href="space.php?do=goods&view=me">商品管理</a></li>
                        <li class="side_option"><a href="">订单管理</a></li>
                        <li class="side_option"><a href="space.php?do=book">预约预定管理</a></li>
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

  <div class="content_detail_wrapper" style="width:880px;float:right;min-height:1003px;">
                    <div class="post_wrapper" style="width:840px;margin:0 auto;">




<div class="tabs_header">
<ul class="tabs">
<li<?=$actives['enabled']?>><a href="admincp.php?ac=magic&view=enabled"><span>已启用道具</span></a></li>
<li<?=$actives['disabled']?>><a href="admincp.php?ac=magic&view=disabled"><span>已禁用道具</span></a></li>
</ul>
</div>

<?php if("edit" == $_GET['op']) { ?>

<form method="post" action="admincp.php?ac=magic&op=<?=$_GET['op']?>&mid=<?=$_GET['mid']?>&view=<?=$_GET['view']?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />

<div class="bdrcontent">

<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th style="width:15em;">名称</th>
<td><?=$thevalue['name']?></td>
</tr>
<tr>
<th style="width:15em;">道具说明</th>
<td>
<textarea name="description" cols="80" rows="2"><?=$thevalue['description']?></textarea>					
</td>
</tr>
<tr>
<th style="width:15em;">道具单价</th>
<td>
<input type="text" name="charge" value="<?=$thevalue['charge']?>" />
购买时单个需要花费的积分值，需小于65535
</td>
</tr>
<tr>
<th style="width:15em;">经验成长</th>
<td>
<input type="text" name="experience" value="<?=$thevalue['experience']?>" />
购买单个可以增长的经验值，需小于65535
</td>
</tr>
<tr>
<th style="width:15em;">补给周期</th>
<td>
<select name="provideperoid">
<option value="0"<?php if($thevalue['provideperoid']==0) { ?> selected<?php } ?>>总是可以</option>
<option value="3600"<?php if($thevalue['provideperoid']==3600) { ?> selected<?php } ?>>间隔1小时</option>
<option value="86400"<?php if($thevalue['provideperoid']==86400) { ?> selected<?php } ?>>间隔24小时</option>
<option value="604800"<?php if($thevalue['provideperoid']==604800) { ?> selected<?php } ?>>间隔7天</option>
</select>
若道具商店中此道具已售光，在补给周期内自动补给一次
</td>
</tr>
<tr>
<th style="width:15em;">补给数目</th>
<td>
<input type="text" name="providecount" value="<?=$thevalue['providecount']?>" maxlength="6" />
若道具商店中此道具已售光，自动补给一次的数目，需小于65535
</td>
</tr>
<tr>
<th style="width:15em;">使用周期</th>
<td>
<select name="useperoid">
<option value="0"<?php if($thevalue['useperoid']==0) { ?> selected<?php } ?>>总是可以</option>
<option value="3600"<?php if($thevalue['useperoid']==3600) { ?> selected<?php } ?>>间隔1小时</option>
<option value="86400"<?php if($thevalue['useperoid']==86400) { ?> selected<?php } ?>>间隔24小时</option>
<option value="604800"<?php if($thevalue['useperoid']==604800) { ?> selected<?php } ?>>间隔7天</option>
</select>
设定用户使用此道具的使用周期
</td>
</tr>
<tr>
<th style="width:15em;">使用数目</th>
<td>
<input type="text" name="usecount" value="<?=$thevalue['usecount']?>" maxlength="6" />
设定用户在使用周期内最多能使用此道具的个数，需小于65535
</td>
</tr>
<tr>
<th style="width:15em;">禁购用户组</th>
<td>
选中的用户组不能在道具商店购买此道具（但可以接受赠与）<br />
<?php if(is_array($usergroups)) { foreach($usergroups as $groups) { ?>
<?php if(is_array($groups)) { foreach($groups as $gid => $value) { ?>
<input id="ckgid_<?=$gid?>" type="checkbox" name="forbiddengid[]" value="<?=$gid?>"<?php if(in_array($gid, $thevalue['forbiddengid'])) { ?>checked<?php } ?> />
<label for="ckgid_<?=$gid?>"><?=$value['grouptitle']?></label>
<?php } } ?>
<br />
<?php } } ?>
</td>
</tr>
<tr>
<th style="width:15em;">库存数目</th>
<td>
<input type="text" name="storage" value="<?=$thevalue['storage']?>" size="5" maxlength="5" />
</td>
</tr>
<tr>
<th style="width:15em;">显示顺序</th>
<td>
<input type="text" name="displayorder" value="<?=$thevalue['displayorder']?>" size="5" maxlength="5" />
</td>
</tr>
<tr>
<th style="width:15em;">是否禁用</th>
<td>
<input type="checkbox" id="magicclose" name="close" value="1"<?php if($thevalue['close']) { ?> checked<?php } ?> />
<label for="magicclose">禁用后页面上将不显示此道具</label>
</td>
</tr>
<?php if($_GET['mid'] == 'invisible') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">隐身时间</th>
<td>
<select name="custom[effectivetime]">
<option value="">默认</option>
<option value="86400"<?php if($thevalue['custom']['effectivetime']==86400) { ?> selected<?php } ?>>24小时</option>
<option value="259200"<?php if($thevalue['custom']['effectivetime']==259200) { ?> selected<?php } ?>>3天</option>
<option value="432000"<?php if($thevalue['custom']['effectivetime']==432000) { ?> selected<?php } ?>>5天</option>
<option value="604800"<?php if($thevalue['custom']['effectivetime']==604800) { ?> selected<?php } ?>>7天</option>
</select>
默认为 24 小时
</td>
</tr>
</table>
</td>
</tr>
<?php } elseif($_GET['mid'] == 'superstar') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">持续时间</th>
<td>
<select name="custom[effectivetime]">
<option value="">默认</option>
<option value="86400"<?php if($thevalue['custom']['effectivetime']==86400) { ?> selected<?php } ?>>24小时</option>
<option value="259200"<?php if($thevalue['custom']['effectivetime']==259200) { ?> selected<?php } ?>>3天</option>
<option value="432000"<?php if($thevalue['custom']['effectivetime']==432000) { ?> selected<?php } ?>>5天</option>
<option value="604800"<?php if($thevalue['custom']['effectivetime']==604800) { ?> selected<?php } ?>>7天</option>
</select>							
</td>
默认为 7天
</tr>
</table>
</td>
</tr>
<?php } elseif($_GET['mid'] == 'friendnum') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">增加好友数</th>
<td>
<select name="custom[addnum]">
<option value="">默认</option>
<option value="5"<?php if($thevalue['custom']['addnum']==5) { ?> selected<?php } ?>>5</option>
<option value="10"<?php if($thevalue['custom']['addnum']==10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if($thevalue['custom']['addnum']==20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if($thevalue['custom']['addnum']==50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if($thevalue['custom']['addnum']==100) { ?> selected<?php } ?>>100</option>
</select>
默认为 10
</td>
</tr>
</table>
</td>
</tr>
<?php } elseif($_GET['mid'] == 'attachsize') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">增加容量</th>
<td>
<select name="custom[addsize]">
<option value="">默认</option>
<option value="5"<?php if($thevalue['custom']['addsize']==5) { ?> selected<?php } ?>>5M</option>
<option value="10"<?php if($thevalue['custom']['addsize']==10) { ?> selected<?php } ?>>10M</option>
<option value="20"<?php if($thevalue['custom']['addsize']==20) { ?> selected<?php } ?>>20M</option>
<option value="50"<?php if($thevalue['custom']['addsize']==50) { ?> selected<?php } ?>>50M</option>
<option value="100"<?php if($thevalue['custom']['addsize']==100) { ?> selected<?php } ?>>100M</option>
</select>
默认为 10M
</td>
</tr>
</table>
</td>
</tr>
<?php } elseif($_GET['mid'] == 'visit') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">访问好友数</th>
<td>
<select name="custom[maxvisit]">
<option value="">默认</option>
<option value="5"<?php if($thevalue['custom']['maxvisit']==5) { ?> selected<?php } ?>>5</option>
<option value="10"<?php if($thevalue['custom']['maxvisit']==10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if($thevalue['custom']['maxvisit']==20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if($thevalue['custom']['maxvisit']==50) { ?> selected<?php } ?>>50</option>
</select>
默认为 10
</td>
</tr>
</table>
</td>
</tr>
<?php } elseif($_GET['mid'] == 'gift') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">每份积分最大值</th>
<td>
<select name="custom[maxchunk]">
<option value="">默认</option>
<option value="5"<?php if($thevalue['custom']['maxchunk']==5) { ?> selected<?php } ?>>5</option>
<option value="10"<?php if($thevalue['custom']['maxchunk']==10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if($thevalue['custom']['maxchunk']==20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if($thevalue['custom']['maxchunk']==50) { ?> selected<?php } ?>>50</option>
<option value="100"<?php if($thevalue['custom']['maxchunk']==100) { ?> selected<?php } ?>>100</option>
<option value="999"<?php if($thevalue['custom']['maxchunk']=='999') { ?> selected<?php } ?>>不限</option>
</select>
默认为 20
</td>
</tr>
</table>
</td>
</tr>
<?php } elseif($_GET['mid'] == 'viewmagic') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">最多查看数</th>
<td>
<select name="custom[maxview]">
<option value="">默认</option>
<option value="5"<?php if($thevalue['custom']['maxview']==5) { ?> selected<?php } ?>>5</option>
<option value="10"<?php if($thevalue['custom']['maxview']==10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if($thevalue['custom']['maxview']==20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if($thevalue['custom']['maxview']==50) { ?> selected<?php } ?>>50</option>
<option value="999"<?php if($thevalue['custom']['maxview']=='999') { ?> selected<?php } ?>>不限</option>
</select>
默认为 10
</td>
</tr>
</table>
</td>
</tr>
<?php } elseif($_GET['mid'] == 'viewvisitor') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">最多查看数</th>
<td>
<select name="custom[maxview]">
<option value="">默认</option>
<option value="5"<?php if($thevalue['custom']['maxview']==5) { ?> selected<?php } ?>>5</option>
<option value="10"<?php if($thevalue['custom']['maxview']==10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if($thevalue['custom']['maxview']==20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if($thevalue['custom']['maxview']==50) { ?> selected<?php } ?>>50</option>
</select>
默认为 10
</td>
</tr>
</table>
</td>
</tr>
<?php } elseif($_GET['mid'] == 'detector') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">最多探测数</th>
<td>
<select name="custom[maxdetect]">
<option value="">默认</option>
<option value="5"<?php if($thevalue['custom']['maxdetect']==5) { ?> selected<?php } ?>>5</option>
<option value="10"<?php if($thevalue['custom']['maxdetect']==10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if($thevalue['custom']['maxdetect']==20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if($thevalue['custom']['maxdetect']==50) { ?> selected<?php } ?>>50</option>
</select>
默认为 10
</td>
</tr>
</table>
</td>
</tr>
<?php } elseif($_GET['mid'] == 'call') { ?>
<tr>
<th style="width:15em;">自定义效果</th>
<td>
请修改道具描述和道具效果一致<br />
<table>
<tr>
<th width="100">最多点名数</th>
<td>
<select name="custom[maxcall]">
<option value="">默认</option>
<option value="5"<?php if($thevalue['custom']['maxcall']==5) { ?> selected<?php } ?>>5</option>
<option value="10"<?php if($thevalue['custom']['maxcall']==10) { ?> selected<?php } ?>>10</option>
<option value="20"<?php if($thevalue['custom']['maxcall']==20) { ?> selected<?php } ?>>20</option>
<option value="50"<?php if($thevalue['custom']['maxcall']==50) { ?> selected<?php } ?>>50</option>
</select>
默认为 10
</td>
</tr>
</table>
</td>
</tr>
<?php } ?>
</table>
</div>

<div class="footactions">
<input type="hidden" name="mid" value="<?=$thevalue['mid']?>" />
<input type="submit" name="editsubmit" value="提交" class="submit">
</div>

</form>

<?php } else { ?>
<form method="post" action="admincp.php?ac=magic&view=<?=$_GET['view']?>">
<input type="hidden" name="formhash" value="<?php echo formhash(); ?>" />

<div class="bdrcontent">
<table cellspacing="0" cellpadding="0" class="formtable">
<tr>
<th width="100">图标</th>
<th>道具</th>
<?php if($_GET['view'] != 'disabled') { ?>
<th width="80">道具单价</th>
<th width="80">显示顺序</th>
<?php } ?>
<th width="80">操作</th>
</tr>
<?php if(is_array($list)) { foreach($list as $key => $value) { ?>
<tr>
<th><img src="image/magic/<?=$value['mid']?>.gif" alt="<?=$value['name']?>" /></th>
<td>
<b><?=$value['name']?></b>
<p><?=$value['description']?></p>				
</td>
<?php if($_GET['view'] != 'disabled') { ?>
<td><input type="text" name="charge[<?=$key?>]" value="<?=$value['charge']?>" size="5" maxlength="5" /></td>
<td><input type="text" name="displayorder[<?=$key?>]" value="<?=$value['displayorder']?>" size="5" maxlength="5" /></td>
<?php } ?>
<td><a href="admincp.php?ac=magic&op=edit&mid=<?=$key?>&view=<?=$_GET['view']?>">编辑</a></td>
</tr>
<?php } } ?>
</table>
</div>

<?php if($_GET['view'] != 'disabled') { ?>
<div class="footactions">
<input type="submit" name="ordersubmit" value="更新数据" class="submit">
</div>
<?php } ?>

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
             版权所有：广州市宏门网络科技有限公司&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ICP:&nbsp;&nbsp; 粤ICP备08132436号
            
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