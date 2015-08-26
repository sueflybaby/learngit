<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<meta name="author" content="苏维杰" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
</head>
<body>
<?php
$nickname = check_input(trim($_POST['nickname']));
$nickname_user = check_input(trim($_POST['contact_user']));
$nickname_keshi = check_input(trim($_POST['contact_keshi']));
$nickname_telephone = check_input(trim($_POST['contact_telephone']));

if (isset($_POST["openid"])) {
	# code...
	$user_openid = check_input(trim($_POST['openid']));
	$does_yuannei = check_input($_POST['does']);
	$time = date("l dS \of F Y h:i:s A");
	include_once('conn.php');
	$check_name = mysql_query("select * from nickname where openid like '%$user_openid%' limit 1");
	if(mysql_num_rows($check_name) > 0 ){
		$insert = mysql_query("UPDATE nickname SET nick = '{$nickname}',  contact_name = '{$nickname_user}',contact_telephone= '{$nickname_telephone}', yes = '{$does_yuannei}', contact_keshi = '{$nickname_keshi}' WHERE openid like '%{$user_openid}%'  limit 1");
	}else{
		$insert = mysql_query("INSERT INTO nickname (nick,createtime,contact_name,contact_telephone,contact_keshi,openid,yes) VALUES ('$nickname', '$time', '$nickname_user','$nickname_telephone','$nickname_keshi','$user_openid','$does_yuannei')");

	}
	//var_dump($check_name);
	if($insert){
		echo "<script>alert('保存成功！');window.location='index.php?openid=".$user_openid."'</script>";
	}else{
		echo "<script>alert('保存失败！');window.location='index.php?openid='".$user_openid."</script>";
	}
}

function check_input($value)
{
	if(preg_match("/[ '.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$value)){
    echo '不要包含些特殊符号！';
    exit();
  }
    // 去除斜杠
    if (get_magic_quotes_gpc())
    {
        $value = stripslashes($value);
    }
    // 如果不是数字则加引号
    //if (!is_numeric($value))
   // {
   //     $value = “‘” . mysql_real_escape_string($value) . “‘”;
   // }
    return $value;
}
?>
</body>
</html>