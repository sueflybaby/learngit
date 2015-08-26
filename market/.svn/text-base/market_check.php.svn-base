<?php
//功能是为提供用户查询购买的历史记录用
define("TOKEN", "weixin");//与管理平台的TOKEN设置一致
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	public function valid()//验证接口用，管理平台后台设置的时候请调用此方法进行验证
    {
        $echoStr = $_GET["echostr"];
		
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()//接受用户信息并返回图文信息
    {

		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

		if (!empty($postStr)){

              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
          
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
          require_once('conn_shophistory.php'); 
//读取用户的购买纪录及积分，若为非空则输出，空报空记录。
		  $result = mysql_query("SELECT * FROM shop_history WHERE openid like '{$fromUsername}'");
          $num = 1;
            while($val = mysql_fetch_array($result)){
              $num =2;
             $content_result .= "\n购买日期：" .$val['chargetime'] ."\n物品：". $val['item'] ."\n价格：". $val['price'] ."\n密码：\n".$val['secret'] ."\n是否使用：". $val['used'] . "。\n";
            }
          if ($num == 1){
            $content_result = "您目前没有购买历史记录。";
          }

//回复函数（由于微信字数限制，只提供未使用兑换物品查询。\n）
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";

					$msgType = "text";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content_result);
                	echo $resultStr;
    }
}
	//封装的验证
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
