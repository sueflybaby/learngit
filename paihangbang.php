<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta charset="utf-8">
  <title>玉医积分排行榜</title>
  
<style type="text/css">
body{
	background-color: #ffae00;
}
#link{
	font-size: 22px;
}
.personal_cen{
    text-align: center;
    margin-left: 50%;
    padding: 0px;
}
.content{
	margin-left: -100px;
	width: 200px;
	text-align: center;
	padding: 0px;
	
	
}
.title{
	font-size: 20px;
	font-weight: bolder;
	text-shadow: 1px 1px 0px black;
	color: red;
	
}
td{
	text-shadow: 1px 0px 1px white;
}
</style>
</head>
<body>
<div class="personal_cen">
<table class="content">
<th colspan="3" class="title">玉医《每日一答》积分排行榜</th>
<tr><td colspan="3"><hr></td></tr>
<tr><td>排名</td><td>姓名</td><td>积分</td></tr>
<tr><td colspan="3"><hr></td></tr>
<?
		require_once("conn.php");
        $get_jifen = mysql_query("SELECT * FROM jifen ORDER BY  `score` DESC LIMIT 0 , 10");
        $num = 0;
        while($row = mysql_fetch_array($get_jifen)){
        $num ++;
        	$row_name =trim($row["user"]);
        	//print_r($row_name."\n");
        	$keyword = "select * from user where openid like '".$row_name."';";
        	$keyword_nick = "select * from nickname where openid like '".$row_name."';";
        	//echo $keyword;
        	$get_keyword = mysql_fetch_array(mysql_query($keyword));
        	$get_keyword_nickname = mysql_fetch_array(mysql_query($keyword_nick));
        	echo("<tr><td>".$num."</td>");
        	if($get_keyword){
	        	echo "<td>".$get_keyword["yes"]."</td><td>".$row["score"]."</td></tr>";
        	}elseif($get_keyword_nickname){
        		echo "<td>".$get_keyword_nickname["contact_name"]."</td><td>".$row["score"]."</td></tr>";
        	}else{
	        	echo("<td>未知</td><td>".$row["score"]."</td></tr>");
        	}
	       	   
	       	
        }
       
?>
<tr><td colspan="3"><hr></td></tr>
<tr><td colspan="3"><a id='link' href='./personal/register.php?openid=<? echo $_GET['openid']; ?>'>点我登记</a></td></tr>
</table>

</div>
<p align="center">玉医青年·团委</p>
</body>
</html>