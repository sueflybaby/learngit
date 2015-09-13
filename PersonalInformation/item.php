<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="Description" content="个人信息查看" />
<meta name="Keywords" content="个人信息查看" />
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
<title>个人信息查看</title>
</head>
<body>

<?php
  //从admin页面获取ID值查询。
  //显示详情页面
  //可以修改或者直接提交
	include("conn.php");
	$name = "2";// $_POST['id']="2";//for test
	if (empty($name)) {
		header("longin.php?action=longin");
	}
	$sql = "SELECT * FROM PersonalInformation_Records WHERE id like {$name}";
	$check = $mysqli->query($sql);
	if ($check) {
		$data = $check->fetch_assoc();
	}
 // var_dump($data);
	$mysqli->close();
?>

<div id="opi" class="page-wrapper clearfix">
<div class="full-page-holder">
<div class="full-page"> 

<div class="login-page clearfix">
<div class="full-login">
<div class="shadow">
<div class="login-panel">
<form method="post" id="loginForm" action="insert.php" focus="email">
<h1 align="center">玉环县人民医院个人信息录入</h1	>
<p class="clearfix">
<label for="email">姓名:</label>

<input type="text" name="name" tabindex="1" value="<? echo $data["name"]; ?>" id="email" class="input-text-name">

</p><p class="clearfix">
<label for="email">性别:</label>
<? 
if (intval($data["gender"])) {
	echo '<input name="gender" type="radio" value="1" checked /> 男 
<input name="gender" type="radio" value="0" /> 女';
}else{
	echo '<input name="gender" type="radio" value="1"/> 男 
<input name="gender" type="radio" value="0"  checked /> 女';
}
?>

</p><p class="clearfix">
<label for="email">电话:</label>

<input type="text" name="telephone" tabindex="1" value="<? echo $data["telephone"]; ?>" id="email" class="input-text-telephone">

</p><p class="clearfix">
<label for="email">学历:</label>
<?

switch ($data["educational_background"]) {
  case '中专':
    echo '
    <select size="1" id="select" name="educational_background">
        <option value="中专" selected="true" >中专</option>
        <option value="大专">大专</option>
        <option value="本科">本科</option>
        <option value="研究生">研究生</option>
        <option value="博士">博士</option>

    </select>
    ';
    break;
  case '大专':
    echo '
    <select size="1" id="select" name="educational_background">
        <option value="中专" >中专</option>
        <option value="大专" selected="true" >大专</option>
        <option value="本科">本科</option>
        <option value="研究生">研究生</option>
        <option value="博士">博士</option>

    </select>
    ';
    break;
  case '研究生':
      echo '
    <select size="1" id="select" name="educational_background">
        <option value="中专">中专</option>
        <option value="大专">大专</option>
        <option value="本科">本科</option>
        <option value="研究生" selected="true" >研究生</option>
        <option value="博士">博士</option>

    </select>
    ';
    break;
  case '博士':
      echo '
    <select size="1" id="select" name="educational_background">
        <option value="中专">中专</option>
        <option value="大专">大专</option>
        <option value="本科">本科</option>
        <option value="研究生">研究生</option>
        <option value="博士" selected="true" >博士</option>

    </select>
    ';
    break;
  default:
    echo '
    <select size="1" id="select" name="educational_background">
        <option value="中专">中专</option>
        <option value="大专">大专</option>
        <option value="本科" selected="true" >本科</option>
        <option value="研究生">研究生</option>
        <option value="博士">博士生</option>

    </select>
    ';
    break;
}
?>

</p><p class="clearfix">
<label for="email">学位:</label>
<?

switch ($data["educational_background"]) {
  case '学士':
    echo '
    <select size="1" id="select" name="academic_degree">
        <option selected="true" value="学士">学士</option>
        <option value="硕士">硕士</option>
        <option value="博士">博士</option>
    </select>
    ';
    break;
  case '硕士':
    echo '
    <select size="1" id="select" name="academic_degree">
        <option value="学士">学士</option>
        <option selected="true" value="硕士">硕士</option>
        <option value="博士">博士</option>
    </select>
    ';
    break;
  default:
    echo '
    <select size="1" id="select" name="academic_degree">
        <option selected="true" value="学士">学士</option>
        <option value="硕士">硕士</option>
        <option selected="true" value="博士">博士</option>
    </select>
    ';
    break;
}
?>


</p><p class="clearfix">
<label for="email">职称:</label>

<input type="text" name="name" tabindex="1" value="<? echo $data["academic_title"]; ?>" id="email" class="input-text-name">

  	<br>

</p><p class="clearfix">
<label for="email">职务:</label>

<input type="text" name="duty" tabindex="1" value="<? echo $data["duty"]; ?>" id="email" class="input-text">

</p><p class="clearfix">
<label for="email">科室:</label>

<input type="text" name="keshi" tabindex="1" value="<? echo $data["office"]; ?>" id="email" class="input-text">

</p><p class="clearfix">

<label for="email">擅长:</label>

<input type="text" name="profession" tabindex="1" value="<? echo $data["profession"]; ?>" id="email" class="input-text">

</p><p class="clearfix">
<label for="email">简历:</label>

<textarea rows="8" cols="29" name="jianjie">
<? echo $data["resume"]; ?>
</textarea>
</p><p class="clearfix">

</p>
<p class="right">

<input type="hidden" name="origURL" value="#" /><input type="hidden" name="domain" value="" />
<input type="hidden" name="formName" value="" /><input type="hidden" name="method" value="" />
<input type="hidden" name="isplogin" value="true" />
<input type="submit" id="login" tabindex="4" name="submit" class="input-submit large" value="提交" /></p>
<a href="admin.php"><input type="buttun" tabindex="5" class="input-submit" value="返回" /></a>
</p>
<div class="separator"></div>
<p class="no-account">巨石工作室 苏维杰</p>
</form>
</div>
</div>
</div>

</div>
</div>
</div>
</div>

</body></html>
