<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>医院Q&A</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
</head>
<body>
<h2 align="center">
<?php
//标题：title_text_content 内容：post_text_content 身份识别：openid

$title = trim($_POST['title_text_content']);

$details = trim($_POST['post_text_content']);

$didpass = 0;//默认审核未通过

$openid =  trim($_POST['openid']);

//

require_once("conn.php");


$t=time();

$datestamp = date("m-d",$t);

$check_user = mysql_query("select * from nickname where openid like '%$openid%'");

//先判断是否为注册用户 ￥openid
if (mysql_num_rows($check_user)>0) {
	$check_user_data = mysql_fetch_array($check_user);
	$nickname = $check_user_data["nick"];
//上传数据包
	$updateString = mysql_query("INSERT INTO  questAndAnswer (id,openid,name,time,title,content,didpass,answer) values ('', '$openid', '$nickname','$datestamp', '$title','$details','$didpass','')");
//判断是否成功
	if ($updateString) {
		echo "<script>alert('感谢您的提问，我们将尽快做出回复！');window.location='index.php?openid=".$openid."'</script>";

	}else{
		echo "<script>alert('提交失败，请重新提交！');window.location='index.php?openid=".$openid."'</script>";
	}
}

?>
</h2>
</body>
</html>