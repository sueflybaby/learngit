<?php
//功能是提供购买使用

class ShopCharge
{
	
    public function responseMsg($fromUsername,$keyword)
    {

		if (!empty($keyword)){
		
          require_once('conn.php'); 
          //创建时间记录
          $t=time();
       	  $datestamp = date("Y-m-d H:i:s",$t);
          $get_date =idate("s").idate("H").idate("i").idate("y").idate("m").idate("d");
      	  $last4words = substr($fromUsername, 0, 3);
      	  $secret_id = $last4words.$get_date;  
         //获取积分 
          $result_jifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
          //获取总共可用积分
       	  $score = $result_jifen["score"]+$result_jifen["join_score"]+$result_jifen['meizhouyida_score']-$result_jifen["used_score"]; 
          //定义输入值
          preg_match_all("/[b-fB-F]/",$keyword,$match01);
		      $select=$match01[0]; 
		     
          foreach($select as $val){
  			      $abc.=$val;
		      }
          
          //获取定价及物品名
          $abc = strtolower($abc);
          
          if($abc == "b"){
            $price = 20;//价格
            $item = "米键";
            $type = "text";
            $secret_id .="XIAOMI_MIJIAN";

          } else if($abc == "c"){
          	$price = 40;//价格
            $item = "8G优盘";
            $type = "text";
            $secret_id .="UPAN";
          } else if($abc == "d"){
          	$price = 110;//价格
            $item = "小米电源10400";
            $type = "text";
            $secret_id .="XIAOMI_DIANYUAN";
          } else if($abc == "e"){
          	$price = 130;//价格
            $item = "小米手环";
            $type = "text";
            $secret_id .="XIAOMI_SHOUHUAN";
          } else if($abc == "f"){
          	$price = 160;//价格
            $item = "全新活塞耳机";
            $type = "text";
            $secret_id .="XIAOMI_ERJI";
          }

          $used = "NO";
          
          $xuanxiang = array('b','c','d','e','f');

          //判定是否有足够积分消费，否则不予购买
          if(in_array($abc, $xuanxiang)){//判断输入的是ab中的一项再进行消费，否则提示无购买选项
            if(intval($score) >= $price){
              mysql_query("INSERT INTO shop_history (openid, secret, item, chargetime, used, price) VALUES ('$fromUsername', '$secret_id', '$item', '$datestamp','$used',$price)");
              //使用积分并记录
            	$score_left =intval($score) - $price;
              $result_used_score = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
              $usedscore = $result_used_score["used_score"]+$price; 
              $ps = "物品：".$item."\n数目：1"."\n密码：\n".$secret_id."\n购买时间:".$datestamp."\n剩余可用积分：".$score_left."\n在兑换时请出示；\n联系人:苏维杰\n联系电话：13858625391 665391";
              mysql_query("UPDATE jifen SET used_score = '{$usedscore}' WHERE user like '%$fromUsername%'");
            }else{
              $score_left=$score;
              $ps = "积分不足，无法购买";
            }
          }else{
            $ps = "无效兑换选项。";
          }

				if(!empty($abc))//用户输入的内容
                {
                    return $ps;
                }else{
                    $contentStr = "无法购买,请输入正确的购买编码！";
                	$resultStr = $contentStr;
                	return $resultStr;
                }

        }else {
        	echo "请输入任意文字！";
        	exit;
        }
    }
	}

?>