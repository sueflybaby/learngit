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
	    <div id="part">
	    <br>
	    <a target="_self" href="admin_pingfeng.php" >评分系统</a>
	    </div>
	    <div style="clear:both"><br><br></div>
	    <div id="part">
	    <br>
	    <a target="_self" href="admin_jifeng.php" >积分系统</a>
	    </div>
	    <div style="clear:both"></div>
		<div id="endpart">玉医青年·团委</div>
    </body>
</html>