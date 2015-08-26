<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>投票系统</title>
</head>
<body>


<h1 align="center"><a href="admin.php">玉医团委 投票系统</a></h1>
<h6 align="center">后台统计 版本1.0 制作人：苏维杰 制作时间：2014-04-11</h6>
<table border='1' align='center'>
<tr>
<th>节目序号</th>
<th>节目名称</th>
<th>表演者</th>
<th>小组</th>
<th>刘荣</th>
<th>阮宏标</th>
<th>胡敏</th>
<th>洪伟峰</th>
<th>朱芳</th>
</tr>

<?php

//connect database

$mysql = new SaeMysql();
//mysqli_query($mysqli,"SET NAMES utf8");
$query = "select * from toupiao";
$result= $mysql->getData( $query );
//var_dump($result);
for ($i=0; $i < count($result); $i++) { 
	  $row = $result[$i];
      // var_dump($row);
      echo "<tr align='center'>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['jiemu'] . "</td>";
      echo "<td>" . $row['author'] . "</td>";
      echo "<td>" . $row['group'] . "</td>";
      echo "<td>" . $row['score_01']. "</td>";
      echo "<td>" . $row['score_02']. "</td>";
      echo "<td>" . $row['score_03']. "</td>";
      echo "<td>" . $row['score_04']. "</td>";
      echo "<td>" . $row['score_05']. "</td>";
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
