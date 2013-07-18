<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/feed', '1374122072', './wx/template/feed');?><!DOCTYPE html>
<html>
  <head>
  	 <title>企业介绍</title>
  	 <meta charset="utf-8">
  	 <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="template/css/mobiscroll.custom-2.5.4.min.css"><!-- 时间选择插件 -->
     <link rel="stylesheet" type="text/css" href="template/css/style.css">
   
    
  
  	    <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
     <script src="template/js/mobiscroll.custom-2.5.4.min.js"></script>
     <script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
     <script type="text/javascript" src="template/js/feed.js"></script><!-- 时间选择插件 -->
  	 <script type="text/javascript">
  	   $.mobile.buttonMarkup.hoverDelay = "false";
  	 </script><!-- 按钮按下/划过的状态感觉反应有些迟缓 -->
     <script type="text/javascript">
         $(function(){
    $('#demo').mobiscroll().select({
        theme: 'android-ics light',
        lang: 'zh',
        display: 'bottom',
        mode: 'mixed',
        inputClass: 'i-txt',
        width: 200
    });
    $('#show').click(function () {
        $('#demo').mobiscroll('show'); 
        return false;
    });

    $('#clearSelect').click(function () {
        $('#demo').val(1).change();
        $('#demo'+'_dummy').hide();
        return false;
    });
});
     </script>
     <script type="text/javascript">
$(document).ready(function(){
  $('#demo'+'_dummy').hide();
});
</script>

<script id="detailTemplate" type="text/x-jquery-tmpl">
    
   <a href="wx.php?do=detail&id={{= introduceid}}&uid={{= uid}}&idtype=<?=$_GET['idtype']?>" class="list" data-role="none">
              <table style="width:100%;border-spacing: 0;">
               <tr>
                  <td>
                      <table>
                          <tr><td><span class="title"><b>{{= subject}}</b></span></td></tr>
                          <tr><td><span class="time">{{= dateline}}</span></td></tr>
                      </table>
                  </td>
                  <td style="float:right;">
                       <img src="../{{= image1url}}" class="list_pic"> 
                  </td>
               </tr>
            </table>
            </a>
</script>
            
</script>
  </head>

  <body>
    <div data-role="page">
        <header data-role="header" data-tap-toggle="false" data-theme="none" class="header">
            <span class="menu_title"><b>企业动态</b></span>
            <a href="#" data-theme="none" data-role="none" class="menu_btn" id="show"><img src="./template/img/menu_btn.png"></a>
        </header><!-- header end -->
        <div data-role="content">
          <div id="detail-panel"></div>
          <a href="#" class="more_btn_link">
              <div class="more_btn">
                  更多
              </div>
           </a>
            <select name="City" id="demo" class="f-dd" onchange="top.location=this.value;" >
                <option value="v5_a_index.html">首页</option>
                <option value="info.html">企业介绍</option>
                <option value="product_list.html">产品列表</option>
                <option value="feed.html" selected="selected">企业动态</option>
                <option value="book.html">预订预约</option>
                <option value="job.html">人才招聘</option>
            </select>
<!-- 
<a href="#" id="clearSelect" class="btn btn-blue"><span class="btn-i">Clear</span></a>
<a href="#" id="show" class="btn btn-blue"><span class="btn-i">Show</span></a> -->
        </div>
        <footer data-role="footer" data-tap-toggle="false" data-theme="none"></footer>
  
    </div>


  </body>
</html><?php ob_out();?>