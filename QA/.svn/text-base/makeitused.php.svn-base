<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title></title>

</head>
<body>


<?php
//connect database
require_once('conn.php');

//getdata
$id =$_GET["list"];

//creat timestamp for record
$t=time();
$datestamp = date("Y-m-d H:i:s",$t);

//getdata for person
mysql_query("UPDATE questAndAnswer SET didpass = 1 WHERE id = '{$id}'");

//echo result
//getdata for person
$result = mysql_query("SELECT * FROM questAndAnswer WHERE id = '{$id}'");

//echo the result
echo "<table border='1'>
<tr>
<th>ID</th>
<th>OPENID</th>
<th>昵称</th>
<th>日期</th>
<th>标题</th>
<th>内容</th>
<th>回答</th>
<th>选择</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  
  echo "<tr align='center'>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['openid'] . "</td>";
  echo "<td>" . $row['openid'] . "</td>";
  echo "<td>" . $row['time'] . "</td>";
  echo "<td>" . $row['title'] . "</td>";
  echo "<td>" . $row['content'] . "</td>";
  echo "<td>" . $row['answer'] . "</td>";

  }
echo "</tr>
    </table>";
  echo "<script>windows.location('admin.php')</script>";
?>
</body>
</html>
