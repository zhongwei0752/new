<?php
/**
  * wechat php test
  */

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
		$dbname = "otMiuQJTEljOpXYLilOj";
		$ip = getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
		$port = getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
		$host = $ip.":".$port;
		$user = getenv('HTTP_BAE_ENV_AK'); 
		$pass = getenv('HTTP_BAE_ENV_SK');
      	//extract post data
		if (!empty($postStr)){
                
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";             
				if(!empty( $keyword ))
                {	
                  	$con = mysql_connect("$host","$user","$pass");
					if (!$con)
					  {
					  die('Could not connect: ' . mysql_error());
					  }
					mysql_select_db("$dbname", $con);						
                  	$result = mysql_query("SELECT * FROM uchome_space WHERE wxkey='".$fromUsername."'");
                  	mysql_query("set names 'utf8'");
                  	if($row = mysql_fetch_array($result))
						{
                          $contentStr = "你好！欢迎关注".$row['name'].",请按指示选择功能:
•回复【1】——查看大赢家竞猜；
•回复【2】——查看我的好友排行榜；
•回复【3】——登陆大赢家；";
                        }else{
                          $contentStr = "配置出错！请与客服联系！";
                        }
              		$msgType = "text";
                	
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                        
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