<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/detailcontent', '1377575861', './wx/template/detailcontent');?><!DOCTYPE html>
<html>
    <head>
<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
<link rel = "stylesheet" type = "text/css" href = "./template/css/main.css">
</head>
<body> 
<div class = "article">
<h3><?=$zhong['subject']?></h3>
<span class = "info_content_span subtitle"><?php echo sgmdate('m-d H:i',$zhong[dateline],1); ?></span>
<!-- <span class = "job_content_span subtitle">评论（37）</span> -->
<span class = "job_content_span subtitle">阅读（<?=$zhong['viewnum']?>）</span>
<div class = "article_content">
职位描述:  <?=$zhong['message']?><br/>
    		 	资格要求:  <?=$zhong['messagecomment']?><br/>
     			电话:  <?=$zhong['telephone']?><br/>
     			邮箱:  <?=$zhong['email']?><br/>
     			待遇:  <?=$zhong['money']?><br/>
     			其它:  <?=$zhong['othermessage']?><br/>
<!-- 职位性质： 全职<br /> 
专业要求： 不限 <br />
招聘日期： 2013.5.24 ～ 2014.6.2<br />
工作地点： 广东-东莞市<br />
外语要求： 无<br /> 
更新日期： 2013.5.29<br />
工作经验： 五年以上<br /> 
职称要求： 中级<br />
学历要求： 不限<br />
工资待遇： 10000～14999 元/月<br /> 
招聘人数： 4人<br />
任职资格：<br />
1、1-2年以上男装设计工作经验<br />
2、熟练应用计算机软件Photoshop、CorelDraw 等绘图知识<br />
3、具有较强的审美能力和扎实的手绘服装设计基础<br />
4、具有一定的人际能力、沟通能力和计划与执行能力<br />
联系人： 汪小姐<br />
地　址： 东莞市虎门镇大宁社区麒麟东路15号<br />
邮　编： 823523<br />
电　话： 0769-8015<br />
网　址： http://www.meilife.com -->
</div>
<input type = "button" class = "buy_btn btn" value = "一键拔号" />
</div>
<!-- 		<div class = "comment">
<div class = "comment_add">
<textarea placeholder = "写下你的评论..." class = "comment_area" ></textarea>
<input type = "button" class = "submit_btn btn" value = "发表" />
</div>
<ul class = "comment_list">
<li>
<span>CT626: </span>
美丽人的衣服很好看啊~而且这个品牌很有内涵的说~
</li>
<li>
<span>游虾: </span>
喜欢美丽人生~
</li>
<li>
<span>天降之屎: </span>
美丽人生很垃圾很垃圾~
</li>
</ul>
</div> -->
</body>
</html><?php ob_out();?>