<?php
  if(!isset($_COOKIE['name']))
  {
    header("location:login.php");
    exit;
 }
 ?>
 <!DOCTYPE html> 
<html> 
    <head> 
        <title>后台</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
    </head> 
<body>
	<a href="../score_all.php"><h2>全部积分排行</h2></a>
	<br>
	<a href="../market/market_admin.php"><h2>兑换管理</h2></a>  
	<br>
	<a href="../yanzheng.html"><h2>用户添加</h2></a>    	
</body>
</html>