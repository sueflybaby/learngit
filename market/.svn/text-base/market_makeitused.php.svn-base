<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title></title>

</head>
<body>


<?php
//connect database
require_once('conn_shophistory.php');

//getdata
$secret =$_GET["list"];

//creat timestamp for record
$t=time();
$datestamp = date("Y-m-d H:i:s",$t);

//getdata for person
mysql_query("UPDATE shop_history SET used = 'YES', usedtime='{$datestamp}' WHERE secret = '{$secret}'");

//echo result
//getdata for person
$result = mysql_query("SELECT * FROM shop_history WHERE secret = '{$secret}'");

//echo the result
echo "<table border='1'>
<tr>
<th>购买日期</th>
<th>物品</th>
<th>价格</th>
<th>密码</th>
<th>是否使用</th>
<th>兑换日期</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  
  echo "<tr align='center'>";
  echo "<td>" . $row['chargetime'] . "</td>";
  echo "<td>" . $row['item'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['secret'] . "</td>";
  echo "<td>" . $row['used'] . "</td>";
  echo "<td>" . $row['usedtime'] . "</td>";

  }
echo "</tr>
    </table>";
  echo "<script>windows.location('/market/market_admin.php')</script>";
?>
</body>
</html>
