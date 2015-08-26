<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>感谢您投票</title>
<meta name="author" content="苏维杰" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<style type="text/css">
        body{
            background-color: rgba(255,0,18,0.92);
            color: #f8e414;
            text-shadow: 1px 2px 1px black;
        }
</style>
</head>
<body>
<?
$selected = $_POST["ck"];
//var_dump($selected);
$name = $_GET["openid"];
include("conn.php");
$check_exist = mysql_fetch_array(mysql_query("select * from chunwan_check_name where openid like '$name'"));
if(count($selected)==3){
if(!empty($check_exist)){
	echo("<h1 align='center'>无法重复投票！</h1>");
}else{
	mysql_query("insert into chunwan_check_name set openid = '$name'");
	foreach($selected as $row){
			$jiemu = mysql_fetch_array(mysql_query("select * from chunwan_tickts where jiemu like '$row'"));
			//var_dump($jiemu);
			$sum_num = $jiemu['sum'];
			//var_dump($sum_num);
			$sum_num =$sum_num+1;
			//var_dump($sum_num);
			mysql_query("update chunwan_tickts set sum = '$sum_num' where jiemu like '$row'");
	}
	
		echo("<h1 align='center'>投票成功，感谢您的参与！</h1>");
	
}
}else{
		echo("<h1 align='center'>选择节目数量不足，无法投票</h1>");
	}
?>
</body>
</html>