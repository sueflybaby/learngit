<?php
//功能是为提供用户查询购买的历史记录用
class ChargeHistory
{
	
    public function responseMsg($openid)//接受用户信息并返回图文信息
    {
	      $fromUsername = $openid;
          require_once('conn.php'); 
//读取用户的购买纪录及积分，若为非空则输出，空报空记录。
		  $result = mysql_query("SELECT * FROM shop_history WHERE openid like '%$fromUsername%'");
          $num = 1;
            while($val = mysql_fetch_array($result)){
              $num =2;
             $content_result .= "购买日期：" .$val['chargetime'] ."\n物品：". $val['item'] ."\n价格：". $val['price'] ."\n密码：\n".$val['secret'] ."\n是否使用：". $val['used'] . "。\n联系人：\n苏维杰：13858625391 666526";
            }
          if ($num == 1){
            $content_result = "您目前没有购买历史记录。";
          }


                	return $content_result;
    }
}


?>
