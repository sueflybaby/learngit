<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="Description" content="登入页面" />
<meta name="Keywords" content="登入" />
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
<title>个人信息录入</title>
</head>
<body>
	<?php
	//var_dump($_POST);
	//echo("<br>");
	//var_dump($_GET);//$_GET["id"] $_GET["value"]
	
	$sql_update = "UPDATE personalinformation_records SET `check` = '{$_GET['value']}' WHERE `id` = {$_GET["id"]}";
	
	include_once("conn.php");

	$chaxun = $mysqli->query($sql_update);

	if ($chaxun) {//为空，第一次提交
		header("location:admin.php");
	}else{//非空，更新之
		echo "<h1>更新失败！</h1>";
	}
	$mysqli->close();
	?>
</body>
</html>