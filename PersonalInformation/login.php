<?php
function clearCookies(){
	setcookie('name','',time()-3600);
	setcookie('islogin','',time()-3600);
}

$name =  trim($_POST['name']);//接受传递的name 如果同名则不行 需要一个唯一的id识别号码
$secret = trim($_POST['secret']);//接受传递的secret
//$mysqli = new mysqli("localhost", "root", "", "app_yyqn");
//echo $name,$secret;
if(($_GET['action']=='login') && (isset($name))){
  clearCookies();
  include("conn.php");

  //查询数据库并验证
	$sql = "SELECT * FROM `PersonalInformation_Users` WHERE user like '%".$name."%'";
	//查看是否有同等的用户
	$data = $mysqli->query($sql);
	var_dump($data);
		while($data_result = $data->fetch_assoc()){
			//echo "<p>".$data_result["secret"]."</p>	";
			
			if ($data_result["secret"]==$secret)
			{
			    setcookie('name',$name,time()+60*60*1);
			//setcookie('islogin','1',time()+60*60*1);
				header("location:index.php?name={$name}");
			}else{
				//echo "string";
				header("location:login.php?action=login");

			}
		}
		
	
	$data->free();
	$mysqli->close();
}else{
		clearCookies();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="Description" content="登入页面" />
<meta name="Keywords" content="登入" />
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
<title>登录</title>
</head>
<body>
	<div id="opi" class="page-wrapper clearfix">
<div class="full-page-holder">
<div class="full-page"> 

<div class="login-page clearfix">
<div class="full-login">
<div class="shadow">
<div class="login-panel">
<form method="post" id="loginForm" action="login.php?action=login" focus="email">
<h2>登录网站</h2>
<p class="clearfix">
<label for="email">帐号:</label>

<input type="text" name="name" tabindex="1" value="" id="email" class="input-text">

</p><p class="clearfix">
<label for="password">密码:</label>
<input type="password" id="password" name="secret" class="input-text" tabindex="2" />
</p>
<p class="right"><span class="float-right"><a tabindex="5" href='#'>取回密码</a></span>
</p>
<p class="right">

<input type="hidden" name="origURL" value="#" /><input type="hidden" name="domain" value="" />
<input type="hidden" name="formName" value="" /><input type="hidden" name="method" value="" />
<input type="hidden" name="isplogin" value="true" />
<input type="submit" id="login" tabindex="4" name="submit" class="input-submit large" value="登录" />
</p>
<div class="separator"></div>
<p class="no-account">巨石工作室</p>
</form>
</div>
</div>
</div>

</div>
</div>
</div>
</div>