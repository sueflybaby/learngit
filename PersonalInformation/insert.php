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
	$sql_check = "SELECT * FROM personalinformation_records where uuid like '{$_POST['uuid']}'";
	
	$sql = "INSERT INTO personalinformation_records (`id`,`uuid`, `name`, `gender`, `telephone`, `educational_background`, `academic_degree`, `academic_title`, `duty`, `office`, `profession`, `resume`,`study`,`medical`, `check`) VALUES(NULL,'{$_POST['uuid']}','{$_POST['name']}','{$_POST['gender']}','{$_POST['telephone']}','{$_POST['educational_background']}','{$_POST['academic_degree']}','{$_POST['s2']}','{$_POST['duty']}','{$_POST['keshi']}','{$_POST['profession']}','{$_POST['jianjie']}','{$_POST['study']}','{$_POST['medical']}','unchecked')";
	
	$sql_update = "UPDATE personalinformation_records SET `name` = '{$_POST['name']}', `gender`='{$_POST['gender']}', `telephone`='{$_POST['telephone']}', `educational_background`='{$_POST['educational_background']}', `academic_degree`='{$_POST['academic_degree']}',`academic_title`='{$_POST['s2']}',`duty`='{$_POST['duty']}',`office`='{$_POST['duty']}',`profession`='{$_POST['profession']}',`resume`='{$_POST['jianjie']}','{$_POST['study']}','{$_POST['medical']}' WHERE  `uuid` LIKE '{$_POST['uuid']}'";

	//echo $sql;
	include("conn.php");

	if($_POST["from"]=="fromItem"){
		$sql_update = "UPDATE personalinformation_records SET `name` = '{$_POST['name']}', `gender`='{$_POST['gender']}', `telephone`='{$_POST['telephone']}', `educational_background`='{$_POST['educational_background']}', `academic_degree`='{$_POST['academic_degree']}',`academic_title`='{$_POST['s2']}',`duty`='{$_POST['duty']}',`office`='{$_POST['duty']}',`profession`='{$_POST['profession']}',`resume`='{$_POST['jianjie']}','{$_POST['study']}','{$_POST['medical']}' `check`='checked' WHERE  `uuid` LIKE '{$_POST['uuid']}'";
		$mysqli->query($sql_update);
	}else{

		$chaxun = $mysqli->query($sql_check);
		//echo $chaxun->num_rows;
		if (!($chaxun->num_rows)) {//为空，第一次提交
			$mysqli->query($sql);
			//echo "location:index.php?name={$_POST['name']}&uuid={$_POST['uuid']}";
			echo '<script language="javascript">
   					 alert("修改成功！");
    				 window.location.href="login.html";
			</script>';
		}else{//非空，更新之
			//echo $sql_update;
			//echo "location:index.php?name={$_POST['name']}&uuid={$_POST['uuid']}";
			$mysqli->query($sql_update);
			echo '<script language="javascript">
   					 alert("修改成功！");
    				 window.location.href="login.html";
			</script>';
			//sleep(3);
			//header("location:index.php?name={$_COOKIE['name']}&uuid={$_POST['uuid']}");
		}
	}


	$mysqli->close();
	?>
</body>
</html>