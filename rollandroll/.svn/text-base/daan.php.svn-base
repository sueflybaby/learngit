<?php
$host=getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
$port = getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
$user=getenv('HTTP_BAE_ENV_AK');
$pwd=getenv('HTTP_BAE_ENV_SK');
$dbh=@mysql_connect("{$host}:{$port}",$user,$pwd);
mysql_select_db('LMdrTWNvUiMvJzxRAxaX');   

define("TOKEN", "weixin");//与管理平台的TOKEN设置一致
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();

class wechatCallbackapiTest
{


    public function responseMsg()//接受用户信息并返回信息
    {

		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

		if (!empty($postStr)){
              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
							
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $keyword = trim($postObj->Content);
                $time = time();
                preg_match_all("/[a-eA-E]/",$keyword,$match01);
$rematch01=$match01[0]; 
foreach($rematch01 as $val){
    $abc.=$val;
}
if(empty($abc)){
    $abc="x";
}
$abc = strtolower($abc);
//查询数据库内容，并赋值

$jieguo = mysql_fetch_array(mysql_query("select * from chisu WHERE user like '{$fromUsername}'"));
$chisu_result = $jieguo['data'];
$tihao = $jieguo['timuid'];
$chaxun_daan = mysql_fetch_array(mysql_query("select * from timu WHERE id like '{$tihao}'"));
$huida = strtolower($chaxun_daan['daan']);
$chaxunchisu = mysql_fetch_array(mysql_query("select * from chisu where user like '$fromUsername'"));
$chisu_result =$chaxunchisu['data'];
$chisu_result =$chisu_result +1;
          //次数累加
$chaxunjifen = mysql_fetch_array(mysql_query("select * from jifen where user like '$fromUsername'"));
$jifen_result =$chaxunjifen['score']+1;
$wrong_result = $chaxunjifen['wrong']+1;
$updata_chisu = mysql_query("UPDATE chisu SET data='$chisu_result' WHERE user='$fromUsername'");//更新次数
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
/*加载图文模版
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
*/
				if($chisu_result > 2)
				{
					$msgType = "text";
                	$contentStr = "您好，今天次数已满！明天别忘了哦。";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
				}elseif(($chisu_result <=2) && ($huida == $abc))//用户输入的内容
                {
                  $updata_jifen = mysql_query("UPDATE jifen SET score='$jifen_result' WHERE user='$fromUsername'");//更新次数
                  
                  	$msgType = "text";
                	$contentStr = "答对了，亲！真厉害，您目前的积分是".$jifen_result."，感谢青蟹们的配合。";
                	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
/*以下是回复图文信息时的代码
                  //$msgType = "news";
                  //$title = "恭喜，答对了！";
                  //$data  = date('Y-m-d');
                  //$desription = "答对了，亲！真厉害，您目前的积分是%s，感谢青蟹们的配合。",$jifen_result;
                  //$image = "http://t1.qpic.cn/mblogpic/d7e7feadcd4b5190e6f6/2000";
                  //$turl = "http://1.yyqnapi.duapp.com/rollandroll/rollandroll.php?username=".$fromUsername;
                  //$resultStr = sprintf($picTpl, $fromUsername, $toUsername, $time, $msgType, $title,$desription,$image,$turl);
                  //echo $resultStr;
*/
                }elseif(($chisu_result <=2) && ($huida != $abc))
                {
                  mysql_query("UPDATE jifen SET wrong='$wrong_result' WHERE user='$fromUsername'");//更新错误次数
                    $msgType = "text"; 
                    $contentStr = "答错了亲，明天继续努力哟！"."正确答案是：".strtoupper($huida)."。\n若您发现有答案错误,请告知我们！"; 
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr); 
                    echo $resultStr; 
                 }else {
        	echo "出错了！亲！";
        	exit;
        }

    }
      
	}
}

?>