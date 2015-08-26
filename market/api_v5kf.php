<?php
//功能是提供商城的货物
$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{


    public function responseMsg()
    {


                $fromUsername = $_GET['name'];
         		require_once('conn_shophistory.php'); 
          //获取积分
        		$result_jifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
       	   		$score = "您目前可购买的积分为：".$result_jifen['score'];
          //定义商场物品
          $items = " 
\n目前提供物品如下：\n-----------------------\nA：雷亚电影券 待定\n-----------------------\nB：大剧院影券 待定\n-----------------------\nC：大转盘     2\n-----------------------\n【发送“购买A”购买雷亚电影券】\n【发送“购买B”购买大剧院影券】\n【发送“购买C”开启大转盘】\n【发送“个人中心”获取详情】";
        	     $pa =$score.$items;
             $contentStr = $pa;
             echo $contentStr;


        }
    }
?>