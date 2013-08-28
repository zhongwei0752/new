<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/feedcontent', '1377575393', './wx/template/feedcontent');?><!DOCTYPE html>
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
     	<h3>
     			<?=BLOCK_TAG_START?>if industry<?=BLOCK_TAG_END?>
                 <p> {{= industry.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                  <?=BLOCK_TAG_START?>if branch<?=BLOCK_TAG_END?>
                 <p> {{= branch.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                    <?=BLOCK_TAG_START?>if development<?=BLOCK_TAG_END?>
                 <p> {{= development.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if product<?=BLOCK_TAG_END?>
                 <p> {{= product.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if introduce<?=BLOCK_TAG_END?>
                 <p> {{= introduce.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if cases<?=BLOCK_TAG_END?>
                 <p> {{= cases.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if talk<?=BLOCK_TAG_END?>
                 <p> {{= branch.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if job<?=BLOCK_TAG_END?>
                 <p> {{= job.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if goods<?=BLOCK_TAG_END?>
                 <p> {{= goods.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 </h3>
<span class = "info_content_span subtitle">
<?=BLOCK_TAG_START?>if industry<?=BLOCK_TAG_END?>
                 <p> {{= industry.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                  <?=BLOCK_TAG_START?>if branch<?=BLOCK_TAG_END?>
                 <p> {{= branch.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                    <?=BLOCK_TAG_START?>if development<?=BLOCK_TAG_END?>
                 <p> {{= development.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if product<?=BLOCK_TAG_END?>
                 <p> {{= product.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if introduce<?=BLOCK_TAG_END?>
                 <p> {{= introduce.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if cases<?=BLOCK_TAG_END?>
                 <p> {{= cases.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if talk<?=BLOCK_TAG_END?>
                 <p> {{= branch.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if job<?=BLOCK_TAG_END?>
                 <p> {{= job.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if goods<?=BLOCK_TAG_END?>
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
<div class = "article_content">
<?=$message?>
</div>
</div>
<div class = "comment">
<div class = "comment_add">
<textarea placeholder = "写下你的评论..." class = "comment_area" id="review"></textarea>
<input type = "button" class = "submit_btn btn" value = "发表" onclick="cpComment($('#idtype').val(), $('#id').val(), $('#review').val())"/>
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
</body>
</html><?php ob_out();?>