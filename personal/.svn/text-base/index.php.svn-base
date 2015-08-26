<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<meta name="author" content="苏维杰" />
<meta name="generator" content="玉医青年">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<link rel="stylesheet" type="text/css" href="index.css">
</head>
  
<body>
    <div class="gwd-div-k4ur">
    <div class="name">
<?php

if(!empty($_GET['openid'])) {
	$openid = $_GET['openid'];
		
	include_once("conn.php");
	$createtime = date("d F Y ");
	$get_nickname = mysql_fetch_row(mysql_query("select nick from nickname where openid like '%$openid%' limit 1"));
	$nickname = $get_nickname[0];
	if (!empty($get_nickname)) {
		if(empty($nickname)){
			$get_nickname = mysql_fetch_row(mysql_query("select yes from user where openid like '%$openid%' limit 1"));
			$nickname = $get_nickname[0];
				if(empty($nickname)){
					echo "<a href='register.php?openid=".$openid."'>点我登记！</a>";
				}else{
					echo "<a href='register.php?openid=".$openid."'>".$nickname."(修改)</a>";
				}
		}else{
			echo "<a href='register.php?openid=".$openid."'>".$nickname."(修改)</a>";
		}
	}else{
		//mysql_query("insert into nickname(nick,createtime,openid) values ('','$createtime','$openid') ");
		echo "<a href='register.php?openid=".$openid."'>点我登记！</a>";
	}
}else{
	echo("NULL");
	$openid = "错误";
}
?>
    
    </div>
    <div class="jifen">
<?
$get_jifen = mysql_fetch_row(mysql_query("select * from jifen where user like '%$openid%' limit 1"));
//var_dump($get_jifen);
//积分尚未修改
$jifen_score = $get_jifen[1]+$get_jifen[4]+$get_jifen[6]-$get_jifen[5];
$jife_usedscore = $get_jifen[5];

if (!empty($get_jifen)) {
	echo "您目前的积分为:".$jifen_score."分<br>您在【每日一答】中获得:".$get_jifen[1]."分。<br>参与【活动】获得了:           ".$get_jifen[4]."分。<br>参与【每周读片】获得了:".$get_jifen[6]."分。<br>您已【使用】:".$jife_usedscore."分。";//您目前的积分为：80 已使用积分：0
}else{
	echo "您尚未获得积分";
}
?>
    </div>
    </div>
        <!--商品
        -->
    <div class="gwd-div-u101">
	    <ul class="todayList">
	    <li class="only4"><div class="img"><img src="http://t1.qpic.cn/mblogpic/197778ed3af55b32a696/2000" ></div><div class="shop_item">
	    马克杯 20积分</div>
	    </li>
	    
	    <li class="only4"><div class="img"><img src="http://t1.qpic.cn/mblogpic/fb65375c44cc4abbba78/2000" ></div><div class="shop_item">
	    8G优盘 40积分</div>
	    </li>
	    
	    <li class="only4"><div class="img"><img src="http://t3.qpic.cn/mblogpic/5b73cb9d2020ac4dfaaa/2000" ></div><div class="shop_item">
	    米键 20积分</div>
	    </li>

	    <li class="only4"><div class="img"><img src="http://t3.qpic.cn/mblogpic/9baa2bf48b36db71d374/2000" ></div><div class="shop_item">
	    小米电源10400mAh <span>110积分</span></div>
	    </li>
	    
	    <li class="only4"><div class="img"><img src="http://t3.qpic.cn/mblogpic/f7be37cbde4264d0c28a/2000" ></div><div class="shop_item">
	    小米手环 <span>130积分</span></div>
	    </li>
	    
	    <li class="only4"><div class="img"><img src="http://t3.qpic.cn/mblogpic/e277397ff53ad91533b2/2000" ></div><div class="shop_item">
	    全新小米活塞耳机 <span>160积分</span></div>
	    </li>
	    	    
	    </ul>
    </div>
    
    
    <div class="gwd-div-km6q"><a href="history.php?openid=<?php echo $openid; ?>" > <div class="history">购<br>买<br>历<br>史</div></a></div>
    
    
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