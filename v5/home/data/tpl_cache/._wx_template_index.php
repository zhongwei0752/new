<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/index', '1374175282', './wx/template/index');?>﻿<!DOCTYPE html> 
<html> 
<head> 
   <meta name="viewport" content="width=device-width,initial-scale=1" />   
   <meta http-equiv="content-type"content="text/html; charset=UTF-8"/> 
   <title>betit</title> 

   <link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
    <link rel="stylesheet" href="template/css/jquery.css" />
      <link rel="stylesheet" type="text/css" href="template/css/www.css">
   <link rel="stylesheet" href="template/css/jquery-mobile-fluid960.min.css"> 
   <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
   <script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
   <script src="template/js/js/jquery.query.js" type="text/javascript"></script>
   <script src="template/js/less.js" type="text/javascript"></script>
     <script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
 <script type="text/javascript" src="template/js/index.js"></script>
   <style type="text/css">
        
   </style>
   
<script id="detail1Template" type="text/x-jquery-tmpl">
<div class="feed">

            <div class="feed_title">
                <div class="title">
                  <a href="#">
                     <img src="{{= avatar}}">
                  </a>
                 
                  <div class="username">{{= username}}:<span class="bet_title"><a href="wx.php?do=feed&id={{= quizid}}&uid={{= uid}}" rel="external">{{= subject}}</a></span><br/><span class="bet_time">{{= dateline}}</span>
                  </div>
                 </div>
                <div class="feed_bg_middle">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
              </div>
              

              <div class="feed_content">
                <ul class="ui-grid-b" style="text-align:center;padding:0;">
                   <li class="ui-block-a left_pic" ><img src="{{= options[0].pic}}!210x210"></li>
                   <li class="ui-block-b" style="margin-top:20px;">
                      <span style="margin-top:20px;display:block;">{{= totalcost}}</span><img src="template/css/images/img/vs.png" class="vs"></li>
                 
                   <li class="ui-block-c left_pic"><img src="{{= options[1].pic}}!210x210"></li>
                </ul>
                  
                <ul class="ui-grid-b" style="text-align:center;padding:0;position:relative;top:-33px;color:white;" >
                  <li class="ui-block-a"class="bet_bg"><div class="bet_option_bg">{{= options[0].option}}</div></li>
                  <li class="ui-block-b" style="margin:0 auto;"></li>
                  <li class="ui-block-c"class="bet_bg"><div class="bet_option_bg">{{= options[1].option}}</div></li>
                </ul>
                  
                <ul class="ui-grid-b" style="text-align:center;padding:0;position:relative;top:-33px;color:white;" >
                  <li class="ui-block-a"class="bet_bg">
                    <div style="width:100px;margin:5px auto 0;text-align:left;color:black;"><img src="template/css/images/img/left_hand.png"><span style="color:red;">{{= options[0].votenum}}</span>
                    </div></li>
                  <li class="ui-block-b" style="margin:0 auto;"></li>
                  <li class="ui-block-c"class="bet_bg"><div style="width:100px;margin:5px auto 0;text-align:right;color:red;">{{= options[1].votenum}}<img src="template/css/images/img/right_hand.png"></div></li>
                </ul>
               
              </div>

               <div class="feed_bg_middle" style="margin-top:-20px;">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
               <?=BLOCK_TAG_START?>if comments<?=BLOCK_TAG_END?>
              <?=BLOCK_TAG_START?>if comments[0]<?=BLOCK_TAG_END?>
              <div class="feed_bottom">
                <a href="#"  class="second_avatar">
                     <img src="{{= comments[0].authoravatar}}">
                  </a>
                   <div class="username">{{= comments[0].author}}:<span>{{= comments[0].message}}</span><br/><span style="color:gray;font-size:10px;">{{= comments[0].dateline}}</span></div>
              </div><br/>
              <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                <?=BLOCK_TAG_START?>if comments[1]<?=BLOCK_TAG_END?>
               <div class="feed_bg_middle" style="margin-top:-20px;">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
              <div class="feed_bottom">
                <a href="#"  class="second_avatar">
                     <img src="{{= comments[1].authoravatar}}">
                  </a>
                   <div class="username">{{= comments[1].author}}:<span>{{= comments[1].message}}</span><br/><span style="color:gray;font-size:10px;">{{= comments[1].dateline}}</span></div>
              </div><br/>
               <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
              <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
        </div> 
</script>
<script id="detailTemplate" type="text/x-jquery-tmpl">
<div class="feed">

            <div class="feed_title">
                <div class="title">
                  <a href="#">
                     <img src="{{= avatar}}">
                  </a>
                 
                  <div class="username">{{= username}}:<span class="bet_title"><a href="wx.php?do=feed&id={{= id}}&uid={{= uid}}" rel="external">{{= title_data.subject}}</a></span><br/><span class="bet_time">{{= dateline}}</span>
                  </div>
                 </div>
                <div class="feed_bg_middle">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
              </div>
              

              <div class="feed_content">
                <ul class="ui-grid-b" style="text-align:center;padding:0;">
                   <li class="ui-block-a left_pic" ><img src="{{= body_data.option[0].pic}}!210x210"></li>
                   <li class="ui-block-b" style="margin-top:20px;">
                      <span style="margin-top:20px;display:block;">{{= body_data.totalcost}}</span><img src="template/css/images/img/vs.png" class="vs"></li>
                 
                   <li class="ui-block-c left_pic"><img src="{{= body_data.option[1].pic}}!210x210"></li>
                </ul>
                  
                <ul class="ui-grid-b" style="text-align:center;padding:0;position:relative;top:-33px;color:white;" >
                  <li class="ui-block-a"class="bet_bg"><div class="bet_option_bg">{{= body_data.option[0].option}}</div></li>
                  <li class="ui-block-b" style="margin:0 auto;"></li>
                  <li class="ui-block-c"class="bet_bg"><div class="bet_option_bg">{{= body_data.option[1].option}}</div></li>
                </ul>
                  
                <ul class="ui-grid-b" style="text-align:center;padding:0;position:relative;top:-33px;color:white;" >
                  <li class="ui-block-a"class="bet_bg">
                    <div style="width:100px;margin:5px auto 0;text-align:left;color:black;"><img src="template/css/images/img/left_hand.png"><span style="color:red;">{{= body_data.option[0].votenum}}</span>
                    </div></li>
                  <li class="ui-block-b" style="margin:0 auto;"></li>
                  <li class="ui-block-c"class="bet_bg"><div style="width:100px;margin:5px auto 0;text-align:right;color:red;">{{= body_data.option[1].votenum}}<img src="template/css/images/img/right_hand.png"></div></li>
                </ul>
               
              </div>

               <div class="feed_bg_middle" style="margin-top:-20px;">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
              <?=BLOCK_TAG_START?>if comments<?=BLOCK_TAG_END?>
               <?=BLOCK_TAG_START?>if comments[0]<?=BLOCK_TAG_END?>
              <div class="feed_bottom">
                <a href="#"  class="second_avatar">
                     <img src="{{= comments[0].authoravatar}}">
                  </a>
                   <div class="username">{{= comments[0].author}}:<span>{{= comments[0].message}}</span><br/><span style="color:gray;font-size:10px;">{{= comments[0].dateline}}</span></div>
              </div><br/>
              <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                <?=BLOCK_TAG_START?>if comments[1]<?=BLOCK_TAG_END?>
               <div class="feed_bg_middle" style="margin-top:-20px;">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
              <div class="feed_bottom">
                <a href="#"  class="second_avatar">
                     <img src="{{= comments[1].authoravatar}}">
                  </a>
                   <div class="username">{{= comments[1].author}}:<span>{{= comments[1].message}}</span><br/><span style="color:gray;font-size:10px;">{{= comments[1].dateline}}</span></div>
              </div><br/>
               <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
              <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
        </div> 
</script>
</head>
<body>

    <div data-role="page" data-theme="none" data-fullscreen="true" class="bet_bg">
       <div data-role="header">
         <!--  <div class="ui-grid-c" style="text-align:center;">
            <div class="ui-block-a" style="margin-top:10px;"><img src="img/logo.png"></div>
            <div class="ui-block-b"><img src="img/bet2.png"></div>
            <div class="ui-block-c"><img src="img/billboard.png"></div>
            <div class="ui-block-d"><img src="img/login.png"></div>
          </div> -->
       <!--    <div class="segmented-control ui-bar-d">
             <div data-role="controlgroup" data-type="horizontal">
               <a href="#" data-role="button" class="ui-control-active" ><img src="img/logo.png"></a>
               <a href="#" data-role="button" class="ui-control-inactive"><img src="img/bet2.png"></a>
               <a href="#" data-role="button" class="ui-control-inactive"><img src="img/billboard.png"></a>
               <a href="#" data-role="button" class="ui-control-inactive"><img src="img/login.png"></a>
             </div>

          </div> -->

           <div class="head-nav" data-role="navbar">
                <ul>
                   <li class="logo"><a href="wx.php?do=index" rel="external" data-role="button" class="ui-control-inactive"style="height:72px;"><img src="template/css/images/img/logo.png"></a></li>
                   <li><a href="wx.php?do=index" data-role="button" rel="external" style="background:url(template/css/images/img/btn_bottom.png)bottom repeat-x"><img src="template/css/images/img/bet2.png"></a></li>
                   <li><a href="wx.php?do=billboard" rel="external" data-role="button" class="ui-control-inactive"><img src="template/css/images/img/billboard.png"></a></li>
                   <li><a href="wx.php?do=login" rel="external" data-role="button" class="ui-control-inactive"><img src="template/css/images/img/login.png"></a></li>
                </ul>
           </div><!-- 头部导航栏 -->
      </div>

      <div data-role="content" class="content" style="font-family:微软雅黑;color:black;text-shadow:none;">
       <div data-theme="e" class="allsort">
          <ul class="container_16 sort_1">
            <li class="grid_3" ><a href="#" >全部：</a></li>
            <li class="grid_3"><a href="wx.php?do=index&type=new" rel="external" >最新</a></li>
            <li class="grid_3"><a href="wx.php?do=index&type=hot" rel="external" >最热</a></li>
            <li class="grid_7"><a href="wx.php?do=index&type=open" rel="external" >即将开奖</a></li>
          </ul>

          <ul class="container_16 sort_2">
            <li class="grid_3"><a href="#">分类:</a></li>
            <li class="grid_3"><a href="wx.php?do=index&type=sports" rel="external" >体育</a></li>
            <li class="grid_3"><a href="wx.php?do=index&type=gossip" rel="external" >娱乐</a></li>
            <li class="grid_3"><a href="wx.php?do=index&type=technews" rel="external" >科技</a></li>
            <li class="grid_4"><a href="wx.php?do=index&type=other" rel="external" >其他</a></li>
          </ul>
        </div>
<!-- all_sort_end -->

   <div id="wei"></div>

   
<!-- 竞猜二开始 -->
        <!--<div class="feed">

            <div class="feed_title">
                <div class="title">
<div id="avatar2">
                     <img src="">
                  </div>
                  <div class="username"><div id="wei2"></div><span class="bet_time"><div id="dateline2"></div></span>
                  </div>
                 </div>
                <div class="feed_bg_middle">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
              </div>
           

              <div class="feed_content">
                <ul class="ui-grid-b" style="text-align:center;padding:0;">
                   <li class="ui-block-a left_pic" ><div id="pic20"><img src=""></div></li>
                   <li class="ui-block-b" style="margin-top:20px;">
                      <span style="margin-top:20px;display:block;"><div id="money2"></div></span><img src="img/vs.png" class="vs"></li>
                 
                   <li class="ui-block-c left_pic"><div id="pic21"><img src=""></div></li>
                </ul>
                  <!--  这个ul组是竞猜图片区的图片布局 -->
               <!-- <ul class="ui-grid-b" style="text-align:center;padding:0;position:relative;top:-33px;color:white;" >
                  <li class="ui-block-a"class="bet_bg"><div class="bet_option_bg"><div id="option20"></div></div></li>
                  <li class="ui-block-b" style="margin:0 auto;"></li>
                  <li class="ui-block-c"class="bet_bg"><div class="bet_option_bg"><div id="option21"></div></div></li>
                </ul>
                  <!-- 这个ul组是竞猜图片下方的选项内容的半透明背景 -->
               <!-- <ul class="ui-grid-b" style="text-align:center;padding:0;position:relative;top:-33px;color:white;" >
                  <li class="ui-block-a"class="bet_bg">
                    <div style="width:100px;margin:5px auto 0;text-align:left;color:red;"><img style="float:left;" src="img/left_hand.png"><div id="votenum20" style="padding-top:10px;padding-left:35px;"></div>
                    </div></li>
                  <li class="ui-block-b" style="margin:0 auto;"></li>
                  <li class="ui-block-c"class="bet_bg"><div style="width:100px;margin:5px auto 0;text-align:right;color:red;"><img style="float:right;" src="img/right_hand.png"><div style="padding-top:10px;padding-right:35px;" id="votenum21"></div></div></li>
                </ul>
                <!-- 左右手指 -->
             <!-- </div>

               <div class="feed_bg_middle" style="margin-top:-20px;">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
              <!-- 分割线 -->
              <!--<div class="feed_bottom">
                <a href="#"  class="second_avatar"> <div id="commentavatar2">
                     <img src=""></div>
                  </a>
                   <div class="username"><div id="comment2"></div><span style="color:gray;font-size:10px;"><div id="commentdateline2"></div></span></div>

              </div>


      
<!-- 竞猜二完 -->
<!-- 竞猜三开始 -->
      <!--  <div class="feed">

            <div class="feed_title">
                <div class="title">
<div id="avatar3">
                     <img src="">
                  </div>
                  <div class="username"><div id="wei3"></div><span class="bet_time"><div id="dateline3"></div></span>
                  </div>
                 </div>
                <div class="feed_bg_middle">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
              </div>
           

              <div class="feed_content">
                <ul class="ui-grid-b" style="text-align:center;padding:0;">
                   <li class="ui-block-a left_pic" ><div id="pic30"><img src=""></div></li>
                   <li class="ui-block-b" style="margin-top:20px;">
                      <span style="margin-top:20px;display:block;"><div id="money3"></div></span><img src="img/vs.png" class="vs"></li>
                 
                   <li class="ui-block-c left_pic"><div id="pic31"><img src=""></div></li>
                </ul>
                  <!--  这个ul组是竞猜图片区的图片布局 -->
             <!--   <ul class="ui-grid-b" style="text-align:center;padding:0;position:relative;top:-33px;color:white;" >
                  <li class="ui-block-a"class="bet_bg"><div class="bet_option_bg"><div id="option30"></div></div></li>
                  <li class="ui-block-b" style="margin:0 auto;"></li>
                  <li class="ui-block-c"class="bet_bg"><div class="bet_option_bg"><div id="option31"></div></div></li>
                </ul>
                  <!-- 这个ul组是竞猜图片下方的选项内容的半透明背景 -->
               <!-- <ul class="ui-grid-b" style="text-align:center;padding:0;position:relative;top:-33px;color:white;" >
                  <li class="ui-block-a"class="bet_bg">
                    <div style="width:100px;margin:5px auto 0;text-align:left;color:red;"><img style="float:left;" src="img/left_hand.png"><div id="votenum30" style="padding-top:10px;padding-left:35px;"></div>
                    </div></li>
                  <li class="ui-block-b" style="margin:0 auto;"></li>
                  <li class="ui-block-c"class="bet_bg"><div style="width:100px;margin:5px auto 0;text-align:right;color:red;"><img style="float:right;" src="img/right_hand.png"><div style="padding-top:10px;padding-right:35px;" id="votenum31"></div></div></li>
                </ul>
                <!-- 左右手指 -->
            <!--  </div>

               <div class="feed_bg_middle" style="margin-top:-20px;">
                    <div class="feed_bg_left"></div>
                    <div class="feed_bg_right"></div>
              </div>
              <!-- 分割线 -->
             <!-- <div class="feed_bottom">
                <a href="#"  class="second_avatar"> <div id="commentavatar3">
                     <img src=""></div>
                  </a>
                   <div class="username"><div id="comment3"></div><span style="color:gray;font-size:10px;"><div id="commentdateline3"></div></span></div>

              </div>


        </div> 
<!-- 竞猜三完 -->

<!-- feed_content_end -->

        



       <div data-position="fixed" style="margin-bottom:50px;" ><img src="template/css/images/img/bet_icon.png"></div>
       <div id="zhong"> <a href="" data-role="button" data-theme="c">下10条竞猜</a></div>
        
     </div><!-- content_end -->
   
  <!--  <div data-role="footer" class="ui-grid-c">
    <div class="ui-block-a"><span class="ui-btn-inner">联系我们</span></div>
     <div class="ui-block-b">联系我们</div>
      <div class="ui-block-c">联系我们</div>
       <div class="ui-block-d">联系我们</div>
   </div>
 -->
<!--   <div class="foot-nav" data-role="navbar">
    <ul>
      <li><a href="#">使用帮助</a></li>
      <li><a href="#">下载</a></li>
      <li><a href="#">媒体合作</a></li>
      <li><a href="#">关于我们</a></li>
      
    </ul>
  </div> -->

    

       <div data-role="c​​ontrolgroup" data-type="horizo​​ntal"  style="text-align:center;font-family:微软雅黑;" >
  
      <a href="#">使用帮助</a>
      <a href="#">下载</a>
      <a href="#">媒体合作</a>
      <a href="#">关于我们</a>
      
  
  </div>


   </div>

</body>
</html> <?php ob_out();?>