<?php
       //creat change_ID formated by date and last 4 words of openid
       $get_date =idate("s").idate("H").idate("i").idate("y").idate("m").idate("d");

$res['randomnum'] = $randomnum = $_POST['id'];
$res['openid'] = $openid = $_POST['openid'];


$res['words'] = "再接再厉，";
$response = "hello this is response".$_POST['id'];


require_once("conn.php");//刷新一次扣2点积分，

$jifen_score = mysql_query("SELECT * FROM jifen WHERE user like '{$openid}'");
$jifen = mysql_fetch_array($jifen_score);
if ($jifen['score']>=2) {//积分大于2进行扣除，并存储激活码，小于2直接提示无法抽取
$jifen['score'] =$jifen['score'] - 2;
$usedscore = $jifen["used_score"]+2; 
mysql_query("UPDATE jifen SET score = {$jifen['score']},used_score = '{$usedscore}' WHERE user = '{$openid}'");//更新积分，在使用积分里累计积分
  //create stamp for record
  $t=time();
$datestamp = date("Y-m-d H:i:s",$t);       
$item = "幸运大转盘";
$used = "NO";
$price = 2;
if ($randomnum <=30) {//如果符合中奖区间，存储激活码，打印激活码用于显示
       $secret_id = "roll04".$get_date;//激活码
       //save all data
       mysql_query("INSERT INTO shop_history (openid, secret, item, chargetime, used, price) VALUES ('$openid', '$secret_id', '$item', '$datestamp','$used',$price)");

}elseif($randomnum<60){
  	   $secret_id = "roll01".$get_date;//激活码
}elseif($randomnum<=90){
	   $secret_id = "roll01".$get_date;//激活码
       mysql_query("INSERT INTO shop_history (openid, secret, item, chargetime, used, price) VALUES ('$openid', '$secret_id', '$item', '$datestamp','$used',$price)");
}elseif($randomnum<150){
}elseif($randomnum<=180){
	   $secret_id = "roll04".$get_date;//激活码
       mysql_query("INSERT INTO shop_history (openid, secret, item, chargetime, used, price) VALUES ('$openid', '$secret_id', '$item', '$datestamp','$used',$price)");
}elseif($randomnum<240){
}elseif($randomnum<=270){
	   $secret_id = "roll01".$get_date;//激活码
       mysql_query("INSERT INTO shop_history (openid, secret, item, chargetime, used, price) VALUES ('$openid', '$secret_id', '$item', '$datestamp','$used',$price)");
}elseif($randomnum<300){
}elseif($randomnum<=330){
	   $secret_id = "roll01".$get_date;//激活码
       mysql_query("INSERT INTO shop_history (openid, secret, item, chargetime, used, price) VALUES ('$openid', '$secret_id', '$item', '$datestamp','$used',$price)");
}

}else {
      $res['words'] = "你的分值已见底，无效！";

}
$res['secret_id'] = $secret_id;
echo json_encode($res);

?>
