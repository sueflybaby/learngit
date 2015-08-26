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
<h1 align="center">海山微心愿后台查看</h1>
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
$result = mysql_query("SELECT * FROM haishan_renling order by id desc");

//echo the result
echo "<table border='1' align='center' class='datalist'>
<tr>
<th>ID</th>
<th>OPENID</th>
<th>昵称</th>
<th>姓名</th>
<th>心愿</th>
<th>开始时间</th>
<th>完成时间</th>
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
  checkname($row['openid']);
  echo "<td>";
  xinyuan($row['id']);
  echo "</td>";
  echo "<td>" . $row['starttime'] . "</td>";
  echo "<td>" . $row['finishtime'] . "</td>";

}else{
    echo "<tr align='center' class='altrow'>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['openid'] . "</td>";

  checkname($row['openid']);

  echo "<td>";
  xinyuan($row['id']);
  echo "</td>";
  echo "<td>" . $row['starttime'] . "</td>";
  echo "<td>" . $row['finishtime'] . "</td>";

}
echo "</tr>
</table>";
}
function checkname($openid){
		//$createtime = date("d F Y ");
    $get_nickname = mysql_fetch_array(mysql_query("select * from nickname where openid like '%{$openid}%' "));
		$nickname = $get_nickname['nick'];
   		$trueName = $get_nickname['contact_name'];
		//if (!empty($get_nickname)) {
			//if(empty($nickname)){
			//	$get_nickname = mysql_fetch_assoc(mysql_query("select * from user where openid like '%$openid%' "));
			//	$nickname = $get_nickname['yes'];
			//		if(empty($nickname)){
				//		return "none</td><td>".$trueName;
			//		}else{
    echo "<td>".$nickname."</td><td>".$trueName."</td>";
			//		}
			//}else{
			//   return $nickname."</td><td>".$trueName;
		//	}
		//}else{
		//	mysql_query("insert into nickname(nick,createtime,openid) values ('','$createtime','$openid') ");
		//	return "none</td><td>".$trueName;
		//}
		

}

function xinyuan($id){
    
    $xinyuan_id = intval($id) + 1;

    $xinyuan_id_content = mysql_fetch_assoc(mysql_query("select * from haishan_xinyuan where id = '{$xinyuan_id}'")); 

    echo $xinyuan_id_content['xinyuan'];
}
?>
</body>
</html>