<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人历史</title>
<meta name="author" content="苏维杰" />

<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="cate4_.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<br>
<div style="text-align:left">
<?php
$openid = $_GET['openid'];
include_once("conn.php");

$get_from_history = mysql_query("select * from shop_history where openid like '%$openid%'");
if (mysql_num_rows($get_from_history)>0) {
	while ($val = mysql_fetch_array($get_from_history)) {
		echo "<p>购买日期：" .$val['chargetime'] ."<br>物品：". $val['item'] ."<br>价格：". $val['price'] ."<br>密码：".$val['secret'] ."<br>是否使用：". $val['used'] . "。</p><br>";
	}
}else{
	echo "<p>您还没有兑换记录！</p>";
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

