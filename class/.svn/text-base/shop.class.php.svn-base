<?php
//功能是提供商城的货物

class Shop
{


    public function responseMsg($d)
    {

         		require_once('conn.php'); 
          //获取积分
        		$result_jifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$d%'"));
        		$jifen = $result_jifen['score']+$result_jifen['join_score']+$result_jifen['meizhouyida_score']-$result_jifen["used_score"];
       	   		$score = "您目前可兑换的积分为：".$jifen;
          //定义商场物品
       	  	    $items = " 
\n目前提供物品及所需积分如下：\n-----------------------\nB：<a href='http://t3.qpic.cn/mblogpic/5b73cb9d2020ac4dfaaa/2000'>小米米键</a>       20\n-----------------------\nC：<a href='http://t1.qpic.cn/mblogpic/fb65375c44cc4abbba78/2000'>8G优盘</a>           40\n-----------------------\nD：<a href='http://t3.qpic.cn/mblogpic/9baa2bf48b36db71d374/2000'>小米电源10400</a>      110\n-----------------------\nE：<a href='http://t3.qpic.cn/mblogpic/f7be37cbde4264d0c28a/2000'>小米手环</a>         130\n-----------------------\nF：<a href='http://t3.qpic.cn/mblogpic/e277397ff53ad91533b2/2000'>全新小米活塞耳机</a>          160\n-----------------------\n-----------------------\n【发送“兑换A”（不含引号）】\n【以此类推】\n说明：\n1、点击商品可以查看实物图；\n2、用积分兑换礼品后，工作人员会尽快和您联系；\n3、礼品兑换仅限本院职工，请大家做好<a href='http://yyqn.sinaapp.com/personal/register.php?openid=".$d."'>实名登记</a>。";
        		$pa =$score.$items;
        		return $pa;


        }
    }
?>