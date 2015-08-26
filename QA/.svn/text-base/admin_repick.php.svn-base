<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>玉医青年《Q&A》后台返还</title>
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
span{
	color: red;
}
.big{
	width: 100px;
	text-align: center;
	text-shadow: 19px 40px 28px black;
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
<h1 align="center">玉医青年《Q&A》后台</h1>
<h6 align="center">版本1.0 苏维杰 制作时间：2013-11-19</h6>


<?php


//creat timestamp for record
$t=time();
$datestamp = date("Y-m-d H:i",$t);
echo "<h6 align='center'>现在时间：".$datestamp."</h6>";


//connect database
require_once('conn.php');

//define openid
//getdata for person
$result = mysql_query("SELECT * FROM questAndAnswer order by id desc");

//echo the result
echo "<table border='1' align='center' class='datalist'>
<form name='input' action='makeit_unused.php' target='_blank' method='get'> 
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
$num=1;
while($row = mysql_fetch_array($result))
  {
    $num +=1;

 	 if ($num%2==0){
 	 	echo "<tr align='center'>";
	}else{
		echo "<tr align='center' class='altrow'>";
	}

    if ($row['didpass']==1)
  	{

	  echo "<td>" . $row['id'] . "</td>";
	  echo "<td>" . $row['openid'] . "</td>";
	  echo "<td>";
	  checkname($row['openid']);
	  echo "</td>";
	  echo "<td>" . $row['chargetime'] . "</td>";
	  echo "<td>" . $row['title'] . "</td>";
	  echo "<td>" . $row['content'] . "</td>";
	  echo "<td>" . $row['answer'] . "</td>";
	  echo "<td>" . "<input type='button' id='used' value='通过'/>"  . "</td>";  	
	  echo "<td>" . "<input type='radio' name='list' value='{$row['id']}'/>" . "</td>";  	
  }
    echo "</tr>";

}
echo "<tr>
<td colspan='10' align='center'>
<input type='submit' class='big' value='返还' onclick='refresh()'/>
</td>
</tr>
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
