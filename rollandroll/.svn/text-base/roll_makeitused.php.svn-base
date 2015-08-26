<?php
//功能是提供大转盘的兑换，目前是加积分2，且只有一个奖项
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
         		require_once('conn.php'); 
           preg_match_all("/[A-Za-z0-9]/",$keyword,$match01);
		   $select=$match01[0]; 
		   foreach($select as $val){
  			  $abc.=$val;
			}
          $item = substr($abc, 4, 2);
          //创建时间记录
           $t=time();
       	   $datestamp = date("Y-m-d H:i:s",$t);
          //更新历史列表
          $checklist = mysql_fetch_array(mysql_query("select * from shop_history where secret = '{$abc}'"));
          if(!empty($checklist) && $checklist['used']=="NO"){
          mysql_query("UPDATE shop_history SET used = 'YES', usedtime='{$datestamp}' WHERE secret = '{$abc}'");
          //获取积分
          $result_jifen = mysql_fetch_array(mysql_query("select * from jifen where user like '{$fromUsername}'"));
            if($item == "04"){
            $score_changed = $result_jifen['score'] + 4;//增加积分量
            }elseif($item == "01"){
            $score_changed = $result_jifen['score'] + 1;//增加积分量
            }
       	  $score = "\n您原有积分为：".$result_jifen['score']."\n现有可兑换积分为：".$score_changed;
            mysql_query("UPDATE jifen SET score ='{$score_changed}' WHERE user = '{$fromUsername}'");//更新已增加积分
          //定义
          $items = "您已成功兑换！";
		  $pa =$items.$score;

          }elseif(empty($checklist)){
            $pa = "您输入的兑换码有误！";
          }elseif($checklist['used']=="YES"){
            $pa = "您的兑换码已兑换！";
          }
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
		  $msgType = "text";
          $contentStr = $pa;
          $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
          echo $resultStr;
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