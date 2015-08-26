
<!DOCTYPE HTML>

<head>
<title>result</title>
<meta charset="utf-8">
<meta name="author" content="苏维杰" />
</head>
<body>
<?php
$userid =$_GET["openid"];
$username = $_GET["nameid"];
$master = mysql_connect(SAE_MYSQL_HOST_M .':'. SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS);

mysql_select_db("app_yyqn",$master);
mysql_query("INSERT INTO `user` (`openid`, `yes`) VALUES ('$userid', '$username')");
echo "okay！ 已插入ID："."".$userid.""."。 姓名："."".$username.""."。";
?>
</body>
</html>