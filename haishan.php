<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta charset="utf-8">
  <title>玉医海山小海鸟 活动名单</title>
  
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
	margin-left: -300px;
	width: 600px;
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
<th colspan="3" class="title">玉医海山小海鸟 活动名单</th>
<tr><td colspan="3"><hr></td></tr>
<tr><td>编号</td><td>相关内容</td><td>认领姓名</td></tr>
<tr><td colspan="3"><hr></td></tr>
<?
		require_once("conn.php");
        $get_data = mysql_query("SELECT * FROM haishan_renling ORDER BY  `id`");
       // $num = 0;
        while($row = mysql_fetch_assoc($get_data)){
       // $num ++;
        	$row_openid =trim($row["openid"]);
        	//print_r($row_name."\n");
            $id = $row["id"] + 1;
        	$keyword = "select * from user where openid like '".$row_openid."';";
        	$keyword_nick = "select * from nickname where openid like '".$row_openid."';";
            $keyord_content = "select * from haishan_xinyuan where id = '".$id."';";        	//echo $keyword;
        	$get_keyword = mysql_fetch_assoc(mysql_query($keyword));
        	$get_keyword_nickname = mysql_fetch_assoc(mysql_query($keyword_nick));
            $get_keyword_content = mysql_fetch_assoc(mysql_query($keyord_content));
        	echo("<tr><td>".$row['id']."</td>");
        	if($get_keyword){
	        	echo "<td>".$get_keyword["yes"]."</td><td>".$get_keyword_content["xinyuan"]."</td></tr>";
        	}elseif($get_keyword_nickname){
        		echo "<td>".$get_keyword_nickname["contact_name"]."</td><td>".$get_keyword_content["xinyuan"]."</td></tr>";
        	}else{
	        	echo("<td>".$row_openid ."</td><td>".$get_keyword_content["xinyuan"]."</td></tr>");
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