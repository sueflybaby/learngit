<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="Description" content="登入页面" />
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
<title>个人信息录入</title>
</head>
<body>
	<?php
//##########################################################################################

	//接收传入“个人简历”-jianli0[]-就读于 jianli1[]就职于 论文-lunwen[] 获奖huojiang[] 连接成句子
	//检验传入的数据jianli0-1[]-就读于  6 个参数 前4个为 年 月 年 月 学校 学位

	var_dump($_POST['jianli0']);
	$jianli0 = $_POST['jianli0'];
	$jianli1 = $_POST['jianli1'];

	for ($x=0; $x < count($jianli0); $x += 6){
		$str_jianli0 .= $jianli0[$x]."年".$jianli0[$x+1]."月 至 ".$jianli0[$x+2]."年".$jianli0[$x+3]."月，就读于"
		.$jianli0[$x+4]
			."学校，获得了"
			.$jianli0[$x+5]
			."学位。\n";
	}
	for ($x=0; $x < count($jianli1); $x += 6){
		$str_jianli1 .= $jianli1[$x]."年".$jianli1[$x+1]."月 至 ".$jianli1[$x+2]."年".$jianli1[$x+3]."月，就职于"
			.$jianli1[$x+4]
			."医院，担任"
			.$jianli1[$x+5]
			."职位。\n";
	}
	$str_jianli = $str_jianli0+$str_jianli1;

	//论文-lunwen[]
	$lunwen = $_POST['lunwen'];
	//?年，在《?》杂志，第期发表论文《?》。
	if(!empty($lunwen)){
		for ($x=0; $x < count($lunwen); $x += 3){
			$str_lunwen .= $lunwen[$x]."年，在《".$lunwen[$x+1]."》杂志，第期发表论文《".$lunwen[$x+2]."》。\n";
		}
	}

	//获奖huojiang[]
	$huojiang = $_POST['huojiang'];
	//?年，荣获《?》。
	if(!empty($huojiang)){
		for ($x=0; $x < count($huojiang); $x += 2){
			$str_huojiang .= $huojiang[$x]."年，荣获《".$huojiang[$x+1]."》。\n";
		}
	}
	$chenguo = $str_lunwen +$str_huojiang;
//##########################################################################################


	$sql_check = "SELECT * FROM personalinformation_records where gonghao like '{$_POST['gonghao']}'";
	
	$sql = "INSERT INTO personalinformation_records (`uuid`, `gonghao`,`name`, `gender`, `xueli`,
`zhicheng`, `xuewei`, `zhiwu`, `zhanke`, `shanchang`, `jianli`,`yanjue`,`chengguo`, `check_rsk`, `check_ywk` )
VALUES('{$_POST['uuid']}','{$_POST['gonghao']}','{$_POST['name']}','{$_POST['gender']}','{$_POST['xueli']}',
'{$_POST['zhicheng']}','{$_POST['xuewei']}','{$_POST['zhiwu']}','{$_POST['zhanke']}','{$_POST['shanchang']}',
'{$_POST['jianli']}','{$_POST['yanjue']}','{$_POST['chengguo']}','unchecked','unchecked')";
	
	$sql_update = "UPDATE personalinformation_records SET `name` = '{$_POST['name']}', `gender`='{$_POST['gender']}',
`xueli`='{$_POST['xueli']}', `zhicheng`='{$_POST['zhicheng']}',
`xuewei`='{$_POST['xuewei']}',`zhiwu`='{$_POST['zhiwu']}',`zhanke`='{$_POST['zhanke']}',
`shanchang`='{$_POST['shanchang']}',`jianli`='{$_POST['jianli']}','{$_POST['yanjue']}','{$_POST['chengguo']}' WHERE
`uuid` LIKE '{$_POST['uuid']}'";

	//echo $sql;
	//include("conn.php");
	$mysql = new SaeMysql();
	if($_POST["from"]=="fromItem"){
		$sql_update = "UPDATE personalinformation_records SET `name` = '{$_POST['name']}', `gender`='{$_POST['gender']}',
`xueli`='{$_POST['xueli']}', `zhicheng`='{$_POST['zhicheng']}',
`xuewei`='{$_POST['xuewei']}',`zhiwu`='{$_POST['zhiwu']}',`zhanke`='{$_POST['zhanke']}',
`shanchang`='{$_POST['shanchang']}',`jianli`='{$_POST['jianli']}','{$_POST['yanjue']}','{$_POST['chengguo']}' WHERE  `uuid` LIKE '{$_POST['uuid']}'";
		$mysql->runSql($sql_update);
	}else{

		$chaxun = $mysql->getData($sql_check);
		//echo $chaxun->num_rows;
		if (empty($chaxun)) {//为空，第一次提交
			$mysql->runSql($sql);
			//echo "location:index.php?name={$_POST['name']}&uuid={$_POST['uuid']}";
			echo '<script language="javascript">
   					 alert("提交成功！");
    				 window.location.href="login.html";
			</script>';
		}else{//非空，更新之
			//echo $sql_update;
			//echo "location:index.php?name={$_POST['name']}&uuid={$_POST['uuid']}";
			$mysql->runSql($sql_update);
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