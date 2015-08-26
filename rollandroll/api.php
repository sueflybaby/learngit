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
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
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
				if(trim($postObj->MsgType) == "event" and trim($postObj->Event) == "subscribe")//判断是否是新关注
				{
					$msgType = "text";
                	$contentStr = "您好，欢迎您关注上海中佑肛肠医院，免费热线：400-921-3999";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				}elseif(!empty($keyword ))//用户输入的内容
                {
              		$msgType = "news";
					$title = "玉环县人民医院";
					$data  = date('Y-m-d');
					$desription = "医院地址：玉环县人民医院长乐路117号";
					$image = "http://t1.qpic.cn/mblogpic/512df9bbb16e3ed6f706/2000";
					$turl = "http://1.yyqnapi.duapp.com/rollandroll/index.html?openid=".$fromUsername;
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