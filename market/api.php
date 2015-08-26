<?php
//功能是提供商城的货物
define("TOKEN", "weixin");
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];
		
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {

		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

		if (!empty($postStr)){

              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
         		require_once('conn_shophistory.php'); 
          //获取积分
        		$result_jifen = mysql_fetch_array(mysql_query("select * from jifen where user like '{$fromUsername}'"));
       	   		$score = "您目前可兑换的积分为：".$result_jifen['score'];
          //定义商场物品
          $items = " 
\n目前提供物品如下：\n-----------------------\nA：雷亚电影券 待定\n-----------------------\nB：大剧院影券 待定\n-----------------------\nC：大转盘     2\n-----------------------\n【发送“兑换A”兑换雷亚电影券】\n【发送“兑换B”兑换大剧院影券】\n【发送“兑换C”开启大转盘】\n【发送“我的历史”获取购买历史】\n【发送“我的积分”获取当前积分】";
        	    $pa =$score.$items;
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
				if(!empty($keyword ))//用户输入的内容
                {
					$msgType = "text";
                    $contentStr = $pa;
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
                }else{
                	echo "说点什么吧!";
                }

        }else {
        	echo "请输入任意文字！";
        	exit;
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