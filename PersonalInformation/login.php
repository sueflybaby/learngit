<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <meta name="Description" content="登入页面" />
    <meta name="Keywords" content="登入" />
    <link href="login.css" rel="stylesheet" type="text/css" media="all" />
    <title>玉环县人民医院医师信息录入系统 登录</title>
</head>
<body>
<?php
//error_reporting(E_ALL^E_NOTICE^E_WARNING);
//var_dump($_POST['name']);

function clearCookies(){
	setcookie('name','',time()-3600);
	setcookie('islogin','',time()-3600);
}

function guid(){
	if (function_exists('com_create_guid')){
		return com_create_guid();
	}else{
		mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uuid = chr(123)// "{"
			.substr($charid, 0, 8).$hyphen
			.substr($charid, 8, 4).$hyphen
			.substr($charid,12, 4).$hyphen
			.substr($charid,16, 4).$hyphen
			.substr($charid,20,12)
			.chr(125);// "}"
		return $uuid;
	}
}

$gonghao =  strtoupper(trim($_POST['name']));//接受传递的name 如果同名则不行 需要一个唯一的id识别号码
$secret = trim($_POST['secret']);//接受传递的secret

//echo isset($name);

if(isset($gonghao)){
  clearCookies();
 // require_once("conn.php");
	$mysql = new SaeMysql();
  //查询数据库并验证
	$sql = "SELECT * FROM `personalinformation_users` WHERE `gonghao` LIKE '{$gonghao}'";
	//echo $sql;
	//查看是否有同等的用户
	//$data = $mysqli->query($sql);
	$data = $mysql->getData($sql);
	//var_dump($data);
//echo $data->num_rows;
	if(count($data)){
       // echo "111";
		$uuid_user = $data[0]['uuid'];

		//$uuid_user = $data_uuid["uuid"];
	}

	if(!empty($uuid_user)){
		$guid = $uuid_user;
	}else{
		$guid = guid();
	}
//echo $guid;

	if ($data[0]['secret']==$secret)
	{

		setcookie('name',$gonghao,time()+60*60*1);
		setcookie('islogin','1',time()+60*60*1);
		//header("location:index.php?name={$name}&uuid={$guid}");
		echo '<script language="javascript">
			 window.location.href="index.php?name='.$gonghao.'&uuid='.$guid.'";
			  </script>';
		exit();
	}else{

		echo '<script language="javascript">
			 alert("用户名或者密码错误！");
			 window.location.href="login.html";
			  </script>';

	}
	//s$data->free();
	//$mysqli->close();
	$mysql->closeDb();
}else{
		clearCookies();
	//echo "XXXX";
}
?>
</body>
</html>