<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/space_menuset_listnull|template/default/footer', '1373621739', 'template/default/space_menuset_listnull');?><!DOCTYPE html>
<html>
  <head>
    <title>v5v5v5v5</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <!-- Bootstrap -->
   <!--  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
    <link rel="stylesheet" type="text/css" href="./template/default/jquery-mobile-fluid960.min.css">
    <link rel="stylesheet" type="text/css" href="./template/default/style1.css">
    <link rel="stylesheet" type="text/css" href="./template/default/file_beauty.css">
    <link type='text/css' href='./template/default/basic_chosen.css' rel='stylesheet' media='screen' />
    <style type="text/css">
       h3{color: #727272;margin-top: 20px;font-weight:normal;}
       .selected{ -webkit-box-shadow: 3px 3px 3px;
  -moz-box-shadow: 3px 3px 3px;
  box-shadow: 3px 3px 3px;}
  
      .bg1{ background: url("./template/default/image/chosen_bg.png");}
      .open{ background: url("./template/default/image/chosen_bg2.png")!important;}
      .open .price{color:#3EB2B8!important;}
    </style>
  </head>

  <body>

    <div class="wrapper">
        <div class="navbar">
            <div class="navbar-inner container_36">
                <a class="logo grid_1" href="#" style="background:none;"><img src="./template/default/image/logo.png"></a>
                <a href="#" class="grid_5" style="float:right;color:#BDBEBF;padding-right:10px;">帮助</a>
             </div>
         </div>
         <!-- navbar end -->
         <form action = "space.php?do=menuset" method = "post">
          <div class="content_wrapper" style="margin-left:auto;margin-right:auto;width:925px;">
            <div class="content" style="width:925px;">
             
                <img src="./template/default/image/guide_chosen.png" style="margin:20px 110px;">

                 <div class="content_detail_wrapper" style="color:#939393;">
                      <div class="container_12 assembly">
                           
                           
                           
                            
                            <?php if(is_array($list)) { foreach($list as $value) { ?>
                          <div class="grid_6">
                            <div class="assembly_inner  bg1" id="<?=$value['menusetid']?>" >
                               <div class="assembly_title" id='basic-modal'>
                                 <a href="space.php?uid=<?=$value['uid']?>&do=<?=$do?>&id=<?=$value['menusetid']?>" class="view_detail basic">查看详情>></a>
                                   <a href="space.php?uid=<?=$value['uid']?>&do=<?=$do?>&id=<?=$value['menusetid']?>"><span class="title"><?=$value['subject']?></span><br/><div></a>
                                   <span><?php if($_GET['view']!='me') { ?><?php if($value['money']) { ?><input type="checkbox" id="num<?=$value['menusetid']?>" /><?php } else { ?> <?php if($value['cheak']!='1') { ?><?php if($value['appstatus']!='1') { ?><input type="checkbox" id="" checked/><?php } ?><div id="numh<?=$value['menusetid']?>"><input type='hidden' name='<?=$value['menusetid']?>' value='1' style='width:20px;' /></div><?php } ?><?php } ?><?php } ?></div></span><div id="numh<?=$value['menusetid']?>"></div>
                                  
                               </div>
                               <div class="assembly_produce">
                                    <img src="<?=$value['image1url']?>">
                                    <div class="produce_choice">
                                        <p class="produce_text">13</p>
                                    </div>
                                    <p class="price"><?php if($value['money']) { ?>单价:<?=$value['money']?>元/月<?php } else { ?>单价:免费<?php } ?></p>
                               </div>
                              </div>
                           </div>
          
             <script src="./source/jquery.js"></script>
    <script type='text/javascript' src='./source/jquery.simplemodal.js'></script>
   <script type='text/javascript' src='./source/basic.js'></script>
   <script>
      $(document).ready(function()
        {
        
      $("#num<?=$value['menusetid']?>").click(function(){
      if($("#num<?=$value['menusetid']?>").attr("checked")==true){
        $("#numh<?=$value['menusetid']?>").html("你要订购<input type='text' name='<?=$value['menusetid']?>' value='1' style='width:20px;' />月");
      }else{
        $("#numh<?=$value['menusetid']?>").html("");
      }
        });
      });
      </script>
                  
                     <?php } } ?> 
                       
                
                     <div class="confirm_btn container_12" style="padding-left:400px;">
                           <input type="submit" class="btn grid_2"></a>
                      </div>
                 </div><!-- content_detail_wrapper end -->
               
                </form>
            </div>
              
          </div><!-- content_wrapper end -->
    </div><!-- wrraper end -->
 

 
   
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
            
<a href="javascript:;" onclick="window.scrollTo(0,0);" id="a_top" title="TOP"><img src="image/top.gif" alt="" style="padding: 5px 6px 6px;" /></a>

    </div>

</div>
<!--/wrap-->
    <script src="js/jquery_v1.10.2.js"></script>
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
<?php } ?>
   

</div>
    
    
    <!--<script src="./source/bootstrap.min.js"></script>-->
  </body>
</html><?php ob_out();?>