<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/1/home', '1374810707', './wx/template/1/home');?><!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
<link rel="stylesheet" type="text/css" href="css/home.css" />
</head>

<body>
<div data-role="page">
<header data-role="header" data-tap-toggle="false" data-theme="none"></header>

<div data-role="content">
<div class="banner">
<img src="http://v5.home3d.cn/v5/v5/home/<?=$home1['imageurl']?>" id="banner_pic" />
<div class="banner_text">
<span>
<?=$home1['subject']?>
</span>
</div>
</div><!-- banner -->

<div class="menu">

<div class="menu_row" id="row1">
<a href="info.html">
<div class="menu_item" id="one">
<img src="img/arrow_right_double.png" />
<span>企业介绍</span>
</div>
</a>
<a href="product_list.html">
<div class="menu_item" id="two">
<img src="img/arrow_right_double.png" />
<span>产品列表</span>
</div>
</a>
</div>

<div class="menu_row" id="row2">
<a href="feed.html">
<div class="menu_item" id="three">
<img src="img/arrow_right_double.png" />
<span>企业动态</span>
</div>
</a>
<a href="book.html">
<div class="menu_item" id="four">
<img src="img/arrow_right_double.png" />
<span>预订预约</span>
</div>
</a>
</div>

<div class="menu_row" id="row3">
<a href="job.html">
<div class="menu_item" id="five">
<img src="img/arrow_right_double.png" />
<span>人才招聘</span>
</div>
</a>
<a href="">
<div class="menu_item" id="six">
<img src="img/arrow_right_double.png" />
<span>行业动态</span>
</div>
</a>
</div>

<div class="menu_row" id="row4">
<a href="">
<div class="menu_item" id="seven">
<img src="img/arrow_right_double.png" />
<span>不知道该</span>
</div>
</a>
<a href="">
<div class="menu_item" id="eight">
<img src="img/arrow_right_double.png" />
<span>写什么好</span>
</div>
</a>
</div>

<div class="menu_row" id="row5">
<a href="job.html">
<div class="menu_item" id="five">
<img src="img/arrow_right_double.png" />
<span>人才招聘</span>
</div>
</a>
<a href="">
<div class="menu_item" id="six">
<img src="img/arrow_right_double.png" />
<span>行业动态</span>
</div>
</a>
</div>

<div class="menu_row" id="row6">
<a href="feed.html">
<div class="menu_item" id="three">
<img src="img/arrow_right_double.png" />
<span>企业动态</span>
</div>
</a>
<a href="book.html">
<div class="menu_item" id="four">
<img src="img/arrow_right_double.png" />
<span>预订预约</span>
</div>
</a>
</div>

<div class="menu">
<div class="menu_row" id="row7">
<a href="info.html">
<div class="menu_item" id="one">
<img src="img/arrow_right_double.png" />
<span>企业介绍</span>
</div>
</a>
<a href="product_list.html">
<div class="menu_item" id="two">
<img src="img/arrow_right_double.png" />
<span>产品列表</span>
</div>
</a>
</div>


</div><!-- content -->
</div><!-- page -->
</body>
<footer data-role="footer"></footer>
</html>
<?php ob_out();?>