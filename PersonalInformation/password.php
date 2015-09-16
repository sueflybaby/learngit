<?php
//error_reporting(E_ALL^E_NOTICE^E_WARNING);
$user =  trim($_POST['name']);//接受传递的name 如果同名则不行 需要一个唯一的id识别号码
$old_password = trim($_POST['oldpassword']);//接受传递的secret
$new_password = trim($_POST['newpassword']);//接受传递的secret

if(isset($user)>0){

  include("conn.php");

  //查询数据库并验证
	$sql = "SELECT * FROM `personalinformation_users` WHERE `user` LIKE '{$user}'";
	//echo $sql;
	//查看是否有同等的用户
	$data = $mysqli->query($sql);

	if($data->num_rows>0) {
		//echo "111";
		$data_result = $data->fetch_assoc();

		if (($data_result['user'] == $user) && ($old_password == $data_result['secret'])) {
			$sql_update_password_str = "UPDATE personalinformation_users SET `secret` = '{$new_password}' WHERE  user LIKE '{$user}'";
			$update_password = $mysqli->query($sql_update_password_str);
			if($update_password){
				echo '<script language="javascript">
   					 alert("修改成功！请登入。");
    				 window.location.href="login.html?action=longin";
			</script>';
				exit();
			}else {
				echo '<script language="javascript">
   					 alert("修改失败，请重试或者联系管理员！");
    				 window.location.href="login.html?action=longin";
			</script>';
			}
		}else{
			echo '<script language="javascript">
   					 alert("用户名及原始密码错误！");
    				 window.location.href="login.html?action=longin";
			</script>';
		}
	}else{
		echo '<script language="javascript">
   					 alert("查无此人，请重试或者联系管理员！");
    				 window.location.href="login.html?action=longin";
			</script>';
	}

	$mysqli->close();
}
?>