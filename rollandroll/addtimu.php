
<!DOCTYPE HTML>

<head>
<title>result</title>
<meta charset="utf-8">
<meta name="author" content="苏维杰" />
</head>
<body>
<?php
$timu =$_GET["timu"];
$daan = $_GET["daan"];
if (empty($timu) or emptu($daan)){
  echo "不能有空";
  break;
}
$host=getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
$port = getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
$user=getenv('HTTP_BAE_ENV_AK');
$pwd=getenv('HTTP_BAE_ENV_SK');
$dbh=@mysql_connect("{$host}:{$port}",$user,$pwd);mysql_query("SET NAMES 'gbk'");
mysql_select_db('LMdrTWNvUiMvJzxRAxaX',$dbh);
mysql_query("INSERT INTO `LMdrTWNvUiMvJzxRAxaX`.`timu` (`timu`, `daan`) VALUES ('$timu', '$daan')");
echo "okay！ 已插入题干："."".$timu.""."。 答案："."".$daan.""."。";
mssql_close($dbh);
?>
</body>
</html>