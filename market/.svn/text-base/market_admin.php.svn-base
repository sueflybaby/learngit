<!DOCTYPE html>

<html>
<head>

<meta charset="UTF-8">
<title></title>
<style>
#unused{
    color: blue;
}
#used{
	color: red;
}

.datalist{  
    border:1px solid #0058a3;   /* 表格边框 */  
    font-family:Arial;  
    border-collapse:collapse;   /* 边框重叠 */  
    background-color:#eaf5ff;   /* 表格背景色 */  
    font-size:14px;  
    text-align: center;
}  


.datalist td{  
    border:1px solid #0058a3;   /* 单元格边框 */  
    padding-top:4px; padding-bottom:4px;  
    padding-left:10px; padding-right:10px;  
}  
.datalist tr.altrow{  
    background-color:#c7e5ff;   /* 隔行变色 */  
}  
-->   
</style>
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
<h1 align="center">玉医青年《每日一答》兑换系统</h1>
<h6 align="center">后台控制 版本1.0 制作人：<a href="market_admin_repick.php">苏维杰</a> 制作时间：2013-11-19</h6>
<h6 align="center"><a href="checkopenid.php">根据OPENID查询</a></h6>

<?php


//creat timestamp for record
$t=time();
$datestamp = date("Y-m-d H:i",$t);
echo "<h6 align='center'>现在时间：".$datestamp."</h6>";


//connect database
require_once('conn_shophistory.php');

//define openid
//getdata for person
$result = mysql_query("SELECT * FROM shop_history order by id desc");

//echo the result
echo "<table border='1' align='center' class='datalist'>
<form name='input' action='market_makeitused.php' target='_blank' method='get'> 
<tr>
<th>ID</th>
<th>OPENID</th>
<th>昵称</th>
<th>购买日期</th>
<th>物品</th>
<th>价格</th>
<th>密码</th>
<th>兑换日期</th>
<th>是否使用</th>
<th>选择</th>
</tr>";
echo "<tr>
<td colspan='10' align='center'>
<input type='submit' value='使用' onclick=‘refresh()’/>
</td>
</tr>";
$num=1;
while($row = mysql_fetch_array($result))
  {
  $num +=1;
 	 if ($num%2==0)
 	 {
  echo "<tr align='center'>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['openid'] . "</td>";
  echo "<td>";
  checkname($row['openid']);
  echo "</td>";
  echo "<td>" . $row['chargetime'] . "</td>";
  echo "<td>" . $row['item'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['secret'] . "</td>";
  echo "<td>" . $row['usedtime'] . "</td>";
  if ($row['used']=="YES")
  {
	  echo "<td>" . "<input type='button' id='used' value='{$row['used']}'/>"  . "</td>";  	  
  }else{
	  echo "<td>" . "<input type='button' id='unused' value='{$row['used']}'/>"  . "</td>";  	  	
	  echo "<td>" . "<input type='radio' name='list' value='{$row['secret']}'/>" . "</td>";
  }

}else{
  echo "<tr align='center' class='altrow'>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['openid'] . "</td>";
  echo "<td>";
  checkname($row['openid']);
  echo "</td>";
  echo "<td>" . $row['chargetime'] . "</td>";
  echo "<td>" . $row['item'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td>" . $row['secret'] . "</td>";
  echo "<td>" . $row['usedtime'] . "</td>";
  if ($row['used']=="YES")
  {
	  echo "<td>" . "<input type='button' id='used' value='{$row['used']}'/>"  . "</td>";  	  
  }else{
	  echo "<td>" . "<input type='button' id='unused' value='{$row['used']}'/>"  . "</td>";  	  	
	  echo "<td>" . "<input type='radio' name='list' value='{$row['secret']}'/>" . "</td>";
  }	
}
echo "</tr>";
}
echo "
</form>
</table>";

function checkname($openid){
		$createtime = date("d F Y ");
		$get_nickname = mysql_fetch_row(mysql_query("select nick from nickname where openid like '%$openid%' "));
		$nickname = $get_nickname[0];
		if (!empty($get_nickname)) {
			if(empty($nickname)){
				$get_nickname = mysql_fetch_row(mysql_query("select yes from user where openid like '%$openid%' "));
				$nickname = $get_nickname[0];
					if(empty($nickname)){
						echo "none";
					}else{
						echo $nickname;
					}
			}else{
			echo $nickname;
			}
		}else{
			mysql_query("insert into nickname(nick,createtime,openid) values ('','$createtime','$openid') ");
			echo "none";
		}
		

}
?>
</body>
</html>
