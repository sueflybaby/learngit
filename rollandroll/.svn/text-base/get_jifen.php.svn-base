<?php
$host=getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
$port = getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
$user=getenv('HTTP_BAE_ENV_AK');
$pwd=getenv('HTTP_BAE_ENV_SK');
$dbh=@mysql_connect("{$host}:{$port}",$user,$pwd);
mysql_select_db('LMdrTWNvUiMvJzxRAxaX');   
//关闭连接
define("TOKEN", "weixin"); 
$wechatObj = new wechatCallbackapiTest(); 
//$wechatObj->valid();
$wechatObj->responseMsg(); 
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
        //extract post data 
        if (!empty($postStr)){ 


  
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA); 
                $fromUsername = $postObj->FromUserName; 
                $toUsername = $postObj->ToUserName; 
                $keyword = trim($postObj->Content); 
                $time = time();
          		$msgType = "text"; 
                $textTpl = "<xml> 
                            <ToUserName><![CDATA[%s]]></ToUserName> 
                            <FromUserName><![CDATA[%s]]></FromUserName> 
                            <CreateTime>%s</CreateTime> 
                            <MsgType><![CDATA[%s]]></MsgType> 
							<Content><![CDATA[%s]]></Content> 
                            <FuncFlag>0</FuncFlag> 
                            </xml>";      
          $chaxunjifen = mysql_fetch_array(mysql_query("select * from jifen where user like '{$fromUsername}'"));
          $jifen_result =$chaxunjifen['score'];//访问获取数据
          $wrong_result =$chaxunjifen['wrong'];
          $total = intval($jifen_result) + intval($wrong_result);
          $lost = ((strtotime("today")-strtotime("13 November 2013"))/60/60/24 +1)-$total;
          if(!empty($chaxunjifen)){      
		  $contentStr = "亲，您一共参与了".$total."道题目的作答。\n答对".$jifen_result."题！\n答错".$wrong_result."题！\n错过了".$lost."次积分机会。\n您目前《每日一答》的活动积分是".$jifen_result."\n亲，可别忘记了兑换商城里的货品哦！";
			}else{
		  $contentStr = "您还没参与到我们的活动中来，快快发送“每日一答”来参与答题！";
			}
          $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
          echo $resultStr; 
          
        }else { 
            echo "none"; 
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