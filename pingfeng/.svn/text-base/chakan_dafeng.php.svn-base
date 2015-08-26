<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>投票系统</title>
<style>  
      body{
            
            font-weight: bolder;
      }
      p{
        text-align: center;
      }
</style>
</head>
<body>
<img  src="backgroud.jpg"  width="100%"  height="100%"  style="position:absolute;top:0;left:0;z-index:-1">
<p><img src="title.png" /></p>
<h6 align="center">后台统计 版本1.0 制作人：苏维杰 制作时间：2014-05-15</h6>
<br>
<!-- <h6 align="center"><a href="admin_personal.php">查看评委打分</a> || <a href="admin_dafeng.php">固化打分</a></h6> -->
<table border='1' align='center'>
<tr>
<th>节目序号</th>
<th>节目名称</th>
<th>表演者</th>
<th>小组</th>
<th>总分</th>
<th>平均分</th>
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
      $num_child_row = count($row) - 5;
      $array_score = array_slice($row, 5);//off 5 argues
      sort($array_score);
      $total_score = array_sum($array_score);
      $total_pingjun_score = $total_score/$num_child_row;
      array_pop($array_score);
      array_shift($array_score);
      $delete_score = array_sum($array_score);
      $delete_pingjun_score = $delete_score/($num_child_row-2);
    //var_dump(number_format($delete_pingjun_score,2));
      echo "<tr align='center'>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['jiemu'] . "</td>";
      echo "<td>" . $row['author'] . "</td>";
      echo "<td>" . $row['group'] . "</td>";
      echo "<td>" . $total_score. "</td>";
     // echo "<td bgcolor='yellow'>" . number_format($total_pingjun_score,2). "</td>";
//      echo "<td>" . $delete_score . "</td>";
      echo "<td bgcolor='pink'>" . number_format($delete_pingjun_score,2) . "</td>";
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
