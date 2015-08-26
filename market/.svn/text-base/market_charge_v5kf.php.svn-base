<?php
//功能是提供购买使用

$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{
	
    public function responseMsg()
    {

		$keyword = $_GET['duihuan'];
		$fromUsername =$_GET['name'];
		if (!empty($keyword)){
		
          require_once('conn_shophistory.php'); 
          //创建时间记录
           $t=time();
       	   $datestamp = date("Y-m-d H:i:s",$t);
           $get_date =idate("s").idate("H").idate("i").idate("y").idate("m").idate("d");
      	   $last4words = substr($fromUsername, 0, 3);
      	   $secret_id = $last4words.$get_date;  
          //获取积分 
           $result_jifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
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
          //判定是否有足够积分消费，否则不予购买
          if($abc=="a" || $abc == "b"){//判断输入的是ab中的一项再进行消费，否则提示无购买选项
          if(intval($score) >= $price)
          {
           mysql_query("INSERT INTO shop_history (openid, secret, item, chargetime, used, price) VALUES ('$fromUsername', '$secret_id', '$item', '$datestamp','$used',$price)");
          //使用积分并记录
          	$score_left =intval($score) - $price;
          $result_used_score = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
          $usedscore = $result_used_score["used_score"]+$price; 
            $ps = "物品：".$item."\n数目：1"."\n密码：\n".$secret_id."\n购买时间:".$datestamp."\n剩余可用积分：".$score_left."\n在购买时请出示；\n联系人:苏维杰\n联系电话：13858625391 666526";
            mysql_query("UPDATE jifen SET score = '{$score_left}',used_score = '{$usedscore}' WHERE user like '%$fromUsername%'");
          }else{
            $score_left=$score;
            $ps = "积分不足，无法购买";
          }
          }else{
            $ps = "无购买选项，亲请查证后再购买。";
          }

				if(!empty($abc))//用户输入的内容
                {
                  if($type == "text"){
                    $contentStr = $ps;
                	$resultStr = $contentStr;
                  }elseif($type == "news"){
					$desription = '[vs_function]CreateNews(玉医大转盘，越转越给力, http://t1.qpic.cn/mblogpic/d7e7feadcd4b5190e6f6/2000, http://yyqnapi.duapp.com/rollandroll/index.html?openid='.$fromUsername.', 2分积分换取一次机会，重复摇会继续扣取，别乱点哦！中奖后会提示购买码，请小心收藏，如果忘记了可以发送“购买历史”查看。)[/vs_function]';
                	$resultStr = $desription;
                }
                    echo $resultStr;
                }else{
                    $contentStr = "无法购买,请输入正确的购买编码！";
                	$resultStr = $contentStr;
                	echo $resultStr;
                }

        }else {
        	echo "请输入任意文字！";
        	exit;
        }
    }
	}

?>