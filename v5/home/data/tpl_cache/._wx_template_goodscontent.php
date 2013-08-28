<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/goodscontent', '1377577320', './wx/template/goodscontent');?><!DOCTYPE html>
<html>
    <head>
<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
<link rel = "stylesheet" type = "text/css" href = "./template/css/main.css">
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
     	<script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
     	<script type="text/javascript" src="template/js/detail.js"></script>
     <script id="detailTemplate" type="text/x-jquery-tmpl">
  			<h3><?=BLOCK_TAG_START?>if goods<?=BLOCK_TAG_END?>
                 <p> {{= goods.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?></h3>
<span class = "info_content_span subtitle"> <?=BLOCK_TAG_START?>if goods<?=BLOCK_TAG_END?>
                 <p> {{= goods.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?></span>


</script>	
 <script id="commentTemplate" type="text/x-jquery-tmpl">
 <li>

<span>{{= author}}: </span>
{{= message}}
</li>
             
</script>

</head>
<body> 
<div class = "article">
 <div id="detail-panel">

       </div>
<!-- <span class = "job_content_span subtitle">预约（87）</span> -->
<span class = "job_content_span subtitle">评论（<?=$wei['replynum']?>）</span>
<span class = "job_content_span subtitle">阅读（<?=$wei['viewnum']?>）</span>
<div class = "article_content">
                <span style = "display:block; padding-bottom: 8px;" >
                	<span>价    格:<b class="colour"> <?=$wei['curprice']?>元</b></span><br />
                	<span>联系人: <?=$space['linkman']?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>电 话: <span class = "underline colour"><?=$space['mobile']?></span></span>
                </span>
                <p>
                     <?=$message?>
                </p>
</div>
<input type = "button" onclick='gototaobao("<?=$wei['taobaourl']?>")' class = "dial_btn btn" value = "购买" />
</div>
<div class = "comment">
<div class = "comment_add">
<textarea placeholder = "写下你的评论..." class = "comment_area" id="review"></textarea>
<input type = "button" onclick="cpComment($('#idtype').val(), $('#id').val(), $('#review').val())" class = "submit_btn btn" value = "发表" />
</div>
<ul class = "comment_list">
 <div id="comment-panel">

       </div>


</ul>
</div>
<input type="hidden" id="wxkey" name="wxkey" value="<?=$_GET['wxkey']?>"/>
    	<input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"/>
    	<input type="hidden" id="idtype" name="idtype" value="<?=$_GET['idtype']?>"/>
    	<input type="hidden" id="type" name="type" value="<?=$_GET['type']?>"/>
    	<input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
    	<input type="hidden" id="page" name="page" value="0"/>
    	<input type="hidden" id="perpage" name="perpage" value="5"/>
    	 <script>

function gototaobao(url){
  window.open(url);
}
</script>
</body>
</html><?php ob_out();?>