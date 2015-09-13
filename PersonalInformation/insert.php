v<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
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
	$sql_check = "SELECT * FROM PersonalInformation_Records where name like '{$_POST['name']}'";
	
	$sql = "INSERT INTO PersonalInformation_Records (`id`, `name`, `gender`, `telephone`, `educational_background`, `academic_degree`, `academic_title`, `duty`, `office`, `profession`, `resume`, `check`) VALUES(NULL,'{$_POST['name']}','{$_POST['gender']}','{$_POST['telephone']}','{$_POST['educational_background']}','{$_POST['academic_degree']}','{$_POST['s2']}','{$_POST['duty']}','{$_POST['keshi']}','{$_POST['profession']}','{$_POST['jianjie']}','unchecked')";
	
	$sql_update = "UPDATE PersonalInformation_Records SET name={$_POST['name']}, gender=={$_POST['gender']}, telephone={$_POST['telephone']}, educational_background={$_POST['educational_background']}, academic_degree={$_POST['academic_degree']},academic_title={$_POST['s2']},duty={$_POST['duty']},office={$_POST['duty']},profession={$_POST['profession']},resume={$_POST['jianjie']} WHERE  name like '{$_POST['name']}'";
	
	include_once("conn.php");

	$chaxun = $mysqli->query($sql_check);
	if (!$chaxun) {//为空，第一次提交
		$mysqli->query($sql);
	}else{//非空，更新之
		$mysqli->query($sql_update);
	}
	?>
</body>
</html>