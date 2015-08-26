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
		echo "<br><a href='register.php?openid=".$openid."'>点我设置昵称！</a>";
	}else{
	echo "<br><a href='register.php?openid=".$openid."'>".$nickname."</a>";
	}
}else{
	mysql_query("insert into nickname(nick,createtime,openid) values ('','$createtime','$openid') ");
	echo "<br><a href='register.php?openid=".$openid."'>点我设置昵称！</a>";
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
<br>
<div style="margin-left:50%">
	<table class="per_table">
		<tr>
			<td><a href="jifen.php?openid=<?php echo $openid;?>" ><div id="pic_jifen" ></div></a>积分详情</td>
			<td><span><a href="shop.php?openid=<?php echo $openid;?>" ><div id="pic_shop" ></div></a></span><div>玉医小店</div></td>
		</tr>

		<tr>
			<td><span><a href="history.php?openid=<?php echo $openid;?>" ><div id="pic_history" ></div></a></span><div>购买历史</div></td>
			<td><span>敬请期待</span></td>
		</tr>
	</table>
</div>

</div>
<!--
水平
-->
<div class="seperate">
</div>
<!--
尾部分的盒子
-->
<div id="endpart">
玉医青年·团委
</div>


</body>
</html>
