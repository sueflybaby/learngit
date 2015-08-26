<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>玉医跳蚤市场</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
</head>
<body>
<h2 align="center">
<?php
if (isset($_POST['id'])) {
	$num = $_POST['id'];
}else{
	$num = 0;
}

$name = $_POST['name'];
//$price = $_POST['price'];
$details = $_POST['details'];
$select = $_POST['select'];
$openid =  $_POST['openid'];

require_once("conn.php");
$t=time();
$datestamp = date("m-d",$t);
$check_user = mysql_query("select * from nickname where openid like '%$openid%'");

//先判断是否为注册用户 ￥openid
//再判断是否已含有此项物品 ￥num

if (mysql_num_rows($check_user)>0) {

	if ($num==0) {

		mysql_query("insert into tiaozao_items_buy SET name = '$name', time='$datestamp', picture02 = '1', details = '$details',openid= '$openid', status = '$select'");

		echo "<script>alert('发布成功！');window.location='index.php?class=buy&openid=".$openid."'</script>";

	}else{

		mysql_query("UPDATE tiaozao_items_buy SET name = '$name',details = '$details', status = '$select' WHERE id = $num");

		echo "<script>alert('修改成功！');window.location='index.php?class=buy&openid=".$openid."'</script>";
		
	}

}else{

		echo "<script>alert('尚未登记！');window.location='index.php?class=buy&openid=".$openid."'</script>";

}

?>
</h2>
</body>
</html>