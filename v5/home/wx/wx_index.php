<?php
/**
  * wechat php test
  */
include_once './../common.php';
include_once './wx_common.php';
include_once( 'botutil.php' );

//define your token

define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
if($_GET["echostr"]){
$wechatObj->valid();
}else{
$wechatObj->responseMsg();
}

class wechatCallbackapiTest
{   

     public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
             echo $echoStr;
             exit;
        }
    }


    public function responseMsg()
    {
          //get post data, May be due to the different environments
          $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
          $dbname = "zhongwei";
          $host = "58.215.187.8";
          $user = "zhongwei";
          $pass = "623610577";
          
           //extract post data
          if (!empty($postStr)){
               
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                //判断是否已经有帐号
                $textTpl = "<xml>
                                   <ToUserName><![CDATA[%s]]></ToUserName>
                                   <FromUserName><![CDATA[%s]]></FromUserName>
                                   <CreateTime>%s</CreateTime>
                                   <MsgType><![CDATA[%s]]></MsgType>
                                   <Content><![CDATA[%s]]></Content>
                                   <FuncFlag>0</FuncFlag>
                                   </xml>"; 

          $con = mysql_connect("$host","$user","$pass");
                              if (!$con)
                                {
                                die('Could not connect: ' . mysql_error());
                                }
                              mysql_select_db("$dbname", $con);
                              $result = mysql_query("SELECT s.*,sf.* FROM uchome_space s LEFT JOIN uchome_spacefield sf ON s.uid=sf.uid  WHERE s.wxkey='".$toUsername."' ");
                              mysql_query("SET NAMES 'utf8'");
          if($row = mysql_fetch_array($result)){
            
            
            
          $v5 = mysql_query("SELECT a.*,m.* FROM uchome_appset a LEFT JOIN uchome_menuset m ON a.num=m.menusetid WHERE a.uid='$row[uid]' and a.appstatus='1'");
                          while($v52= mysql_fetch_array($v5)){
                               $a[] = "$v52[num]";
                            $b[] = "$v52[subject]";

                          }
                         
        }else{
           $contentStr.="过期";
               $msgType = "text";
               $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
               echo $resultStr;
        }
                
       
                    if(!empty( $keyword ))
                {    
                           
                         if ($keyword=='Hello2BizUser'){                             
                
                         $contentStr.="过期的通知方式";
               
          
                         
                         
                                
                       
                        
                
                        $msgType = "text";
                    
                     $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                     echo $resultStr;
                       
                         }elseif($keyword=="z"){
                            $msgType = "text";
                           $contentStr.="$fromUsername";
                           $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                         echo $resultStr;
                         }elseif($keyword=="w"){
                            $msgType = "text";
                           $contentStr.="$toUsername";
                           $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                         echo $resultStr;
                         }else{
                      $msgType = "text";
                  $zhong = mysql_query("SELECT a.*,m.* FROM uchome_appset a LEFT JOIN uchome_menuset m ON a.num=m.menusetid WHERE a.uid='$row[uid]'and a.num='$keyword'");
                  $wei = mysql_fetch_array($zhong);
                 
                      if($wei){
                     $english=$wei['english'];
                     $jsonurl = "http://v5.home3d.cn/v5/v5/home/capi/space.php?do=$english&uid=$row[uid]";
                      $json = file_get_contents($jsonurl,0,null,null);
                      $json_output = json_decode($json);
                     
                        if($english=="product"){
                          if($json_output->data->product[0]->subject){
                        $contentStr .="产品介绍\r\n".$json_output->data->product[0]->subject."\r\n".$json_output->data->product[0]->message;
                          }else{
                        $contentStr .="没有数据";
                          }
                        }
                      
                       
                        if($english=="industry"){
                          if($json_output->data->industry[0]->subject){
                          $contentStr .="行业动态\r\n".$json_output->data->industry[0]->subject."\r\n".$json_output->data->industry[0]->message;
                          }else{
                          $contentStr .="没有数据";
                          }
                        }
                       
                       
                        if($english=="introduce"){
                         if($json_output->data->introduce[0]->subject){
                        $contentStr .="企业介绍\r\n".$json_output->data->introduce[0]->subject."\r\n".$json_output->data->introduce[0]->message;
                         }else{
                         $contentStr .="没有数据"; 
                         }
                        }
                       
                       
                        if($english=="development"){
                          if($json_output->data->development[0]->subject){
                        $contentStr .="企业动态\r\n".$json_output->data->development[0]->subject."\r\n".$json_output->data->development[0]->message;
                          }else{
                           $contentStr .="没有数据"; 
                          }
                        }
                       
                       
                        if($english=="cases"){
                          if($json_output->data->cases[0]->subject){
                        $contentStr .="成功案例\r\n".$json_output->data->cases[0]->subject."\r\n".$json_output->data->cases[0]->message;
                          }else{
                          $contentStr .="没有数据"; 
                          }
                        }
                      
                       
                       
                        if($english=="branch"){
                          if($json_output->data->branch[0]->subject){
                        $contentStr .="分支机构\r\n".$json_output->data->branch[0]->subject."\r\n".$json_output->data->branch[0]->message;
                          }else{
                           $contentStr .="没有数据"; 
                          }
                        }
                       
                      
                        if($english=="job"){
                          if($json_output->data->job[0]->subject){
                        $contentStr .="分支招聘\r\n".$json_output->data->job[0]->subject."\r\n".$json_output->data->job[0]->message;
                          }else{
                          $contentStr .="没有数据";
                          }
                        }
                       
                       
                        if($english=="talk"){
                          if($json_output->data->talk[0]->subject){
                        $contentStr .="在线沟通\r\n".$json_output->data->talk[0]->subject."\r\n".$json_output->data->talk[0]->message;
                          }else{
                          $contentStr .="没有数据";
                          }
                        }
                      

                      }else{ 
                      $msgType = "news";
                      if($row[name]){
                        $name=$row[name];
                      }else{
                        $name=$row[username];
                      }
                      $appurl = "http://v5.home3d.cn/v5/v5/home/capi/space.php?do=app&uid=$row[uid]";
                      $app = file_get_contents($appurl,0,null,null);
                      $app_output = json_decode($app);
                      $count=$app_output->data->count;
                    $url = "http://www.betit.cn/wx/wx.php?do=login&wxkey=".$toUsername;
                    $pic = "http://v5.home3d.cn/v5/v5/home/".$row[logourl];
                    $articles[] = makeArticleItem($name, $name, $pic, $url);
                      for($i=0;$i<$count;$i++){
                       $url = "http://www.betit.cn/wx/wx.php?do=login&wxkey=".$toUsername;
                       $subject=$app_output->data->app[$i]->subject;
                       $pic = "http://v5.home3d.cn/v5/v5/home/".$app_output->data->app[$i]->image1url;
                       $articles[] = makeArticleItem($subject, $subject, $pic, $url); 
                      }  
                       $url = "http://v5.home3d.cn/v5/v5/home/wx/wx.php?do=login&wxkey=".$fromUsername;
                       $subject="快速登陆/快速注册";
                       $pic = "";
                       $articles[] = makeArticleItem($subject, $subject, $pic, $url);          
          
                         
                         
                       }         
                       
                        
                
                       
                    
                      $resultStr = makeArticles($fromUsername, $toUsername, $time, $msgType, $name,$articles);  
                     echo $resultStr;
                }
        }else{
                     echo "Input something...";
                }

        }else {
             echo "";
             exit;
        }
    }
         
     private function checkSignature()
     {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];    
                 
          $token = TOKEN;
          $tmpArr = array($token, $timestamp, $nonce);
          sort($tmpArr);
          $tmpStr = implode( $tmpArr );
          $tmpStr = sha1( $tmpStr );
         
          if( $tmpStr == $signature ){
               return true;
          }else{
               return false;
          }
     }
}

?>