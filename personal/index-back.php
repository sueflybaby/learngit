<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<meta name="author" content="苏维杰" />

<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="cate4_.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--
头部分的盒子
-->
<div id="headpart">
<div id="pic">

</div>
<div class="seperate"></div>
<div id="admin_jifen">
<?php
$openid = $_GET['name'];
include_once("conn.php");
$createtime = date("d F Y ");
$get_nickname = mysql_fetch_row(mysql_query("select nick from nickname where openid = '$openid' "));
$nickname = $get_nickname[0];
if (!empty($get_nickname)) {
	if(empty($nickname)){
		echo "<a href='register.php?openid=".$openid."'>点我设置昵称！</a>";
	}else{
	echo "<a href='register.php?openid=".$openid."'>".$nickname."</a>";
	}
}else{
	mysql_query("insert into nickname(nick,createtime,openid) values ('','$createtime','$openid') ");
	echo "<a href='register.php?openid=".$openid."'>点我设置昵称！</a>";
}

?>
<br>
<?
$get_jifen = mysql_fetch_row(mysql_query("select * from jifen where user = '$openid'"));
//var_dump($get_jifen);
$jifen_score = $get_jifen[1];
$jife_usedscore = $get_jifen[4];

if (!empty($get_jifen)) {
	echo "您积分为:".$jifen_score."   已使用:".$jife_usedscore;//您目前的积分为：80 已使用积分：0
}else{
	echo "您尚未获得积分";
}
?>

</div>
</div>
<!--
水平
-->
<div class="seperate"></div>
<!--
商店中心的盒子
-->

<div>
<table class="lanmu">
<tr>
<td>
<a href="#">商城</a>
</td>
<td>
<a href="#">历史</a>
</td>
</tr>
<tr>
<td>
<a href="#">积分</a>
</td>
<td>
待开放
</td>
</tr>
</table>
</div>

</body>
</html>