<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('template/default/space_text', '1377744598', 'template/default/space_text');?>﻿<head>
<META http-equiv="content-type" content="text/html;charset=utf-8" >
</head><select name="collegeid" id="collegeid">
        <option value="0">请选择院系</option>
        <?php if(is_array($list)) { foreach($list as $value) { ?>
        <option value="<?=$value['english']?>"><?=$value['subject']?></option>
        <?php } } ?>
     
         </select>
        //这地方的span标签可以换成div
          <div id="professional">
         <select name="professionalid" id="professionalid">
        <option value="0">请选择专业</option>
         </select>
         </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>
<script language="javascript">
$( 
  function(){
  $("#collegeid").change( 
     function(){        
              $("#professional").load("./source/space_text1.php?college="+$("#collegeid").val()); 
          }
               );
    }
);
</script><?php ob_out();?>