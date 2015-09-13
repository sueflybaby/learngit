<!DOCTYPE html>

<html>
<head>

<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="admin.css">
<script>
<!--
function refresh(){
window.location.reload();   
}
//--> 
</script>

</head>
<body>

<!--插入查询功能-->
<h1 align="center">玉环县人民医院 个人信息审核系统</h1>
<h6 align="center">后台控制 版本1.0 制作人：<a href="market_admin_repick.php">苏维杰</a> 制作时间：2015-09-10</h6>


<?php


//creat timestamp for record
$t=time();
$datestamp = date("Y-m-d H:i",$t);
echo "<h6 align='center'>现在时间：".$datestamp."</h6>";


//connect database
require_once('conn.php');

//define openid
//getdata for person
$sql = "SELECT * FROM PersonalInformation_Records ORDER BY id DESC";

//echo the result
echo "<table border='1' align='center' class='datalist'>

<tr>
<th>ID</th>
<th>姓名</th>
<th>性别</th>
<th>电话</th>
<th>学历</th>
<th>学位</th>
<th>职称</th>
<th>职务</th>
<th>科室</th>
<th>擅长</th>
<th>简历</th>
<th>状态</th>

</tr>";

$num=0;
$query_sql = $mysqli->query($sql);
while ($row = $query_sql->fetch_assoc()) {
  
  $num +=1;
 	 if ($num%2==0)
 	 {
     echo "<tr align='center'>";
   }else{
     echo "<tr align='center' class='altrow'>";
   }
  echo "
  <form name='input' action='check.php' target='_self' method='get'>";
  echo "<td>" . $num . "</td>";
  echo "<td><a href='item.php?id=".$row['id']."'>" . $row['name'] . "</a></td>";
  echo "<td>" . gender($row['gender']) . "</td>";
  echo "<td>" . $row['telephone'] . "</td>";
  echo "<td>" . $row['educational_background'] . "</td>";
  echo "<td>" . $row['academic_degree'] . "</td>";
  echo "<td>" . $row['academic_title'] . "</td>";
  echo "<td>" . $row['duty'] . "</td>";
  echo "<td>" . $row['office'] . "</td>";
  echo "<td>" . $row['profession'] . "</td>";
  echo "<td>" . $row['resume'] . "</td>";
  echo "<input type='text' name='id' hidden='true' value='{$row['id']}'/>";
  if ($row['check']=="checked")
  {
	  echo "<td>" . "<input type='submit' id='checked' value='通过'/>"  . "</td>";

    echo "<input type='text' name='value' hidden='true' value='uncheck' />";
  }else if($row['check']=="tuihui"){
    echo "<td>" . "<input type='submit' id='checked' value='撤销退回'/>"  . "</td>";
    echo "<input type='text' name='value' hidden='true' value='uncheck' />";
  }else{
	  echo "<td>" . "<input type='submit' id='uncheck' value='未审核'/>"  . "</td>";
    echo "<input type='text' name='value' hidden='true' value='checked' />";
    echo "</form>";
    echo "
  <form name='input' action='check.php' target='_self' method='get'>";
    echo "<input type='text' name='id' hidden='true' value='{$row['id']}'/>";
    echo "<td>" . "<input type='submit' id='uncheck' value='退回'/>"  . "</td>";
    echo "<input type='text' name='value' hidden='true' value='tuihui' />";
	}
  
  echo "</form>";
  echo "</tr>";
}
$query_sql->free();
$mysqli->close();

echo "
</table>";

function gender($gender){
  if ($gender) {
    return "男";
  }else{
    return "女";
  }
}
?>
</body>
</html>
