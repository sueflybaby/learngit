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

$name =  trim($_POST['name']);//接受传递的name 如果同名则不行 需要一个唯一的id识别号码
$secret = trim($_POST['secret']);//接受传递的secret

//echo isset($name);

if(isset($name)>0){
  clearCookies();
  include("conn.php");

  //查询数据库并验证
	$sql = "SELECT * FROM `personalinformation_users` WHERE `user` LIKE '{$name}'";
	//echo $sql;
	//查看是否有同等的用户
	$data = $mysqli->query($sql);

	if($data->num_rows>0){
        //echo "111";
		$data_uuid = $data->fetch_assoc();

		$uuid_user = $data_uuid["uuid"];
	}
    //echo $uuid_user;
    //var_dump(isset($uuid_user));
	if(!empty($uuid_user)){
		$guid = $uuid_user;
	}else{
		$guid = guid();
	}
//echo $guid;
			if ($data_uuid["secret"]=$secret)
			{
				//echo "111";
			    setcookie('name',$name,time()+60*60*1);
			    setcookie('islogin','1',time()+60*60*1);
                //header("location:login.php?action=login");
				header("location:index.php?name={$name}&uuid={$guid}");
				exit();
			}else{
                exit();
            }
		
	
	//s$data->free();
	$mysqli->close();
}else{
		clearCookies();
}
?>