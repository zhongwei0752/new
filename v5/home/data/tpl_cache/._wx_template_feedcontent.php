<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/feedcontent', '1374207987', './wx/template/feedcontent');?><!DOCTYPE html>
<html>
  <head>
  	 <title></title>
  	 <meta charset="utf-8">
  	 <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="./template/css/jquery-mobile-fluid960.min.css">
     <link rel="stylesheet" type="text/css" href="./template/css/style.css">

   <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

  
      <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
     <script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
     <script type="text/javascript" src="template/js/detail.js"></script>
     <style type="text/css">
          body{background: #fff;}
     </style>

     <script id="detailTemplate" type="text/x-jquery-tmpl">

 <header class="content_header_width">
  
     
         

        </header><!-- header end -->
        <div>
          <div class="normal_wrapper_width">
           <div class="content_pic">
           

             </div>

             <div class="content_text">
             
                  
                 <p> {{= development.message}}</p>
                  
                
             </div>

</script>
   <script id="commentTemplate" type="text/x-jquery-tmpl">
 <div class="split"></div><!-- 这个是分割线 -->
            <div class="normal_wrapper_width comments"><span class="commenter">{{= author}}:</span> {{= message}}</div>
             
</script>
 
  </head>

  <body>
    <div data-role="page">
       <div id="detail-panel">

       </div>
       
          </div>
          <div class="split"></div>
          <div style="background:#f0f0f0">
             <div class="normal_wrapper_width container_12">
                <div class="comment_wrapper grid_8">
                   <textarea placeholder="写下你的评论..." class="comment_text_box" id="review"></textarea>
                </div>
                <a href="#"  class="comment_btn grid_3" onclick="cpComment($('#idtype').val(), $('#id').val(), $('#review').val())">
                   发表
                </a>
            </div>
            <div id="comment-panel">

       </div>
             

          </div>
    <input type="hidden" id="wxkey" name="wxkey" value="<?=$_GET['wxkey']?>"/>
    <input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"/>
    <input type="hidden" id="idtype" name="idtype" value="<?=$_GET['idtype']?>"/>
    <input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
    <input type="hidden" id="page" name="page" value="0"/>
    <input type="hidden" id="perpage" name="perpage" value="5"/>
        </div>
        <footer></footer>
    </div>
   
  </body>
</html><?php ob_out();?>