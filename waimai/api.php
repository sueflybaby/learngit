<?php
/**
	微信公众平台

	开发者模式

	默认用户输入任何文字，均返回同一个图文信息，链接地址为手机站;

	可以根据变量$keyword，即用户输入的信息，进行判断，从而返回相应的信息;

*/


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
				//加载图文模版
				$picTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[%s]]></Title>
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>
							</Articles>
							<FuncFlag>1</FuncFlag>
							</xml> ";
				if(!empty($keyword ))//用户输入的内容
                {
              		$msgType = "news";
					$title = "玉医青年外卖查询";
					$data  = date('Y-m-d');
					$desription = "玉医青年外卖查询系统，以提供最为方便的查询方式。";
					$image = "http://www.hoolo.tv/liv_loadfile/news/folder194/fold56/1363589063_61580400.jpg";
					$turl = "http://yyqnapi.duapp.com/waimai/index.html";
                	$resultStr = sprintf($picTpl, $fromUsername, $toUsername, $time, $msgType, $title,$desription,$image,$turl);
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