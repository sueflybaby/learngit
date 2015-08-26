<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title>投票系统</title>
</head>
<body>


<h1 align="center">我的评分</h1>
<h4 align="center"><a href="index.php">点我返回评分</a></h4>
<table border='1' align='center'>
<tr>
<th>节目序号</th>
<th>节目名称</th>
<th>表演者</th>
<!-- <th>所在小组</th> -->
<th>评分</th>
</tr>

<?php

//connect database
$mysql = new SaeMysql();

$query = "select * from toupiao";
$result= $mysql->getData( $query );

for ($i=0; $i < count($result); $i++) { 
	  $row = $result[$i];
      echo "<tr align='center'>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['jiemu'] . "</td>";
      echo "<td>" . $row['author'] . "</td>";
      //echo "<td>" . $row['group'] . "</td>";
      echo "<td>" . $row[$_COOKIE['name']]. "</td>";
      echo "</tr>";
  }


echo "</table>";
//$result->free();
//$mysqli->close();
?>
<hr>
<p align="center">玉医青年 团委</p>

</body>
</html>
