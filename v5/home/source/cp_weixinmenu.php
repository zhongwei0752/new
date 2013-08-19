<?php
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('weixinmenu')."  WHERE uid='$_SGLOBAL[supe_uid]' order by fathernum ASC");
while ($value = $_SGLOBAL['db']->fetch_array($query)) {
    $list[]=$value;
    }
    $name1=$list[0]['button'];
    $wei1=$list[0]['sub_button1'];
    $wei2=$list[0]['sub_button2'];
    $wei3=$list[0]['sub_button3'];
    $wei4=$list[0]['sub_button4'];
    $wei5=$list[0]['sub_button5'];
    if(empty($wei1)&&empty($wei2)&&empty($wei3)&&empty($wei4)&&empty($wei5)){
        $zhong="1";
    }else{
        $zhong="0";
    }
    if($zhong="1"){
    $zhong=array(
                "type"=>"click",
                "name"=>"$name1",
                "key"=>"key301"
                );
    }
   
if($wei1){
    $arraywei1=array(
                            "type"=>"click",
                            "name"=>"$wei1",
                            "key"=>"key101"
                            );
}
if($wei2){
    $arraywei2=array(
                            "type"=>"click",
                            "name"=>"$wei2",
                            "key"=>"key101"
                            );
}
if($wei3){
    $arraywei3=array(
                            "type"=>"click",
                            "name"=>"$wei3",
                            "key"=>"key101"
                            );
}
if($wei4){
    $arraywei4=array(
                            "type"=>"click",
                            "name"=>"$wei4",
                            "key"=>"key101"
                            );
}
if($wei5){
    $arraywei5=array(
                            "type"=>"click",
                            "name"=>"$wei5",
                            "key"=>"key101"
                            );
}


    $wei13.=array(

                    $arraywei1,
                     );
     $wei13.=array(

                    $arraywei2,
                     );
    

     $zhong=array(
                "name"=>'楼市',
                "sub_button" =>$wei13,

                );
$menu_ary   = array(
    "button"=>array(
            //左边第一个菜单
            $zhong,
            //中间的菜单
            array(
                "name"=>'新房',
                "sub_button" => array(
                        array(
                            "type"=>"click",
                            "name"=>"预售",
                            "key"=>"key201"
                            ),
                        array(
                            "type"=>"click",
                            "name"=>"热销",
                            "key"=>"key202"
                            ),
                        array(
                            "type"=>"click",
                            "name"=>"全部",
                            "key"=>"key203"
                            ),
                    ),
                ),
            //右边的菜单
            array(
                "type"=>"click",
                "name"=>"地图",
                "key"=>"key301"
                ),
        )
    );
print_r($menu_ary);
require 'creatmenu.php';
$Weixin = new WeixinOp("wxa0d273ea3847e691" , "1dbb2e5c32a611b8e2975372b46ca6d4");
var_dump($Weixin->creatMenu($menu_ary));
?>
