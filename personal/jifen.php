<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人积分</title>
<meta name="author" content="苏维杰" />

<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="cate4_.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<br>
<div style="text-align:center">
<?php
$openid = $_GET['openid'];
include_once("conn.php");

$get_from_user = mysql_fetch_array(mysql_query("select * from user where openid like '%$openid%'"));
$name = $get_from_user["yes"];
//var_dump($get_from_user);
if(empty($name)){
	$get_from_user = mysql_fetch_array(mysql_query("select * from nickname where openid like '%$openid%'"));
	$name = $get_from_user["nick"];
	if(empty($name)){
		$name = "<a href='register.php?openid=".$openid."'>请设置昵称</a>";
	}
	//var_dump($name);
}


$get_from_mysql = mysql_fetch_array(mysql_query("select * from jifen where user like '%$openid%' "));
$jifen_get_score = $get_from_mysql['score']+$get_from_mysql['join_score']+$get_from_mysql['meizhouyida_score'];
$jifen_used_score = $get_from_mysql['used_score'];
if (empty($jifen_get_score)) {
	echo "<p>您还没参与到我们的活动中来！</p><br><a href='register.php?openid=".$openid."'>点我设置昵称！</a>";
}else{
	echo '<table class="per_jifen">
	<th style="text-align:center" colspan="2">您好：'.$name.'</th>
	<tr><td colspan="2"><hr /></td></tr>
	<tr><td>【每日一答】</td><td>'.$get_from_mysql["score"].'</td></tr>
	<tr><td>【每周读片】</td><td>'.$get_from_mysql["meizhouyida_score"].'</td></tr>
	<tr><td>【活动积分】</td><td>'.$get_from_mysql["join_score"].'</td></tr>
	<tr><td colspan="2"><hr /></td></tr>
	<tr><td>【已使用】</td><td>'.$jifen_used_score.'</td></tr>
	<tr><td colspan="2"><hr /></td></tr>
	<tr><td>【总积分】</td><td>'.$jifen_get_score.'</td></tr>
	</table>';
}

?>
</div>
<!--
水平
-->
<div class="seperate"></div>
<!--
尾部分的盒子
-->
<div id="endpart">
玉医青年·团委
</div>


</body>
</html>

