<!DOCTYPE HTML>

<head>
<title>result</title>
<meta charset="utf-8">
<meta name="author" content="苏维杰" />
<style type="text/css">
	body{
		text-align: center;
	}
</style>
</head>
<body>
<form action="checkopenid.php" method="get">
	OpenID:<input type="text" name="openid" value="" />
	<input type="submit" value="查询" />
</form>
<br/>
<?php

$openid = $_GET["openid"];
//var_dump($openid);
include("conn.php");
if (!empty($openid)) {
	$get_result = mysql_query("SELECT * FROM  `nickname` WHERE  `openid` LIKE  '%$openid%'");
  //var_dump($get_result);
	while ($val = mysql_fetch_array($get_result)) {
      //var_dump($val);
		echo "<p>openid:".$val['openid']."<br>name:".$val['contact_name']."<br>nickname:".$val['nick']."<br>department:".$val['contact_keshi']."<br>telephone:".$val['contact_telephone']."<br>院内:";
		echo does($val['yes']);
		echo "</p>";
	}
}
function does($a){
	if ($a == 1) {
		return "是";
	}else{
		return "否";
	}
}
?>
</body>
</html>