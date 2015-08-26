<?php
//功能是提供兑换使用
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
          //创建时间记录
           $t=time();
       	   $datestamp = date("Y-m-d H:i:s",$t);
           $get_date =idate("s").idate("H").idate("i").idate("y").idate("m").idate("d");
      	   $last4words = substr($fromUsername, 0, 3);
      	   $secret_id = $last4words.$get_date;  
          //获取积分 
           $result_jifen = mysql_fetch_array(mysql_query("select * from jifen where user like '{$fromUsername}'"));
       	   $score = $result_jifen["score"]; 
          //定义输入值
           preg_match_all("/[a-cA-C]/",$keyword,$match01);
		   $select=$match01[0]; 
		   foreach($select as $val){
  			  $abc.=$val;
			}
          //获取定价及物品名
          $abc = strtolower($abc);
          if($abc == "a"){
            $price = 100;
            $item = "雷亚电影券";
            $type = "text";
          }elseif($abc == "b"){
          	$price = 100;
            $item = "大剧院电影券";
            $type = "text";
          } elseif($abc == "c"){
          	$price = 0;
            $item = "大转盘";
            $type = "news";
          }
          $used = "NO";
          //判定是否有足够积分消费，否则不予兑换
          if($abc=="a" || $abc == "b"){//判断输入的是ab中的一项再进行消费，否则提示无兑换选项
          if(intval($score) >= $price)
          {
           mysql_query("INSERT INTO shop_history (openid, secret, item, chargetime, used, price) VALUES ('$fromUsername', '$secret_id', '$item', '$datestamp','$used',$price)");
          //使用积分并记录
          	$score_left =intval($score) - $price;
          $result_used_score = mysql_fetch_array(mysql_query("select * from jifen where user like '{$fromUsername}'"));
          $usedscore = $result_used_score["used_score"]+$price; 
            $ps = "物品：".$item."\n数目：1"."\n密码：\n".$secret_id."\n兑换时间:".$datestamp."\n剩余可用积分：".$score_left."\n在兑换时请出示；\n兑换联系人:苏维杰\n联系电话：13858625391 666526";
            mysql_query("UPDATE jifen SET score = '{$score_left}',used_score = '{$usedscore}' WHERE user = '{$fromUsername}'");
          }else{
            $score_left=$score;
            $ps = "积分不足，无法兑换";
          }
          }else{
            $ps = "无兑换选项，亲请查证后再兑换。";
          }
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s ]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
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
				if(!empty($abc))//用户输入的内容
                {
                  if($type == "text"){
					$msgType = "text";
                    $contentStr = $ps;
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                  }elseif($type == "news"){
              		$msgType = "news";
					$title = "玉医大转盘，越转越给力";
					$data  = date('Y-m-d');
					$desription = "2分积分换取一次机会，重复摇会继续扣取，别乱点哦！中奖后会提示兑换码，请小心收藏，如果忘记了可以发送“购买历史”查看。";
					$image = "http://t1.qpic.cn/mblogpic/d7e7feadcd4b5190e6f6/2000";
					$turl = "http://yyqnapi.duapp.com/rollandroll/index.html?openid=".$fromUsername;
                	$resultStr = sprintf($picTpl, $fromUsername, $toUsername, $time, $msgType, $title,$desription,$image,$turl);
                }
                    echo $resultStr;

                }else{
                	$msgType = "text";
                    $contentStr = "无法兑换,请输入正确的兑换编码！";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
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