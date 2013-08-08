<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('admin/tpl/privacy|admin/tpl/header|admin/tpl/side|admin/tpl/footer|template/default/header|template/default/footer', '1375854218', 'admin/tpl/privacy');?><?php $_TPL['menunames'] = array(
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