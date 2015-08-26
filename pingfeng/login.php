<?php
function clearCookies(){
	setcookie('name','',time()-3600);
	setcookie('islogin','',time()-3600);
}
if($_GET['action']=='login'){
  clearCookies();
  	if(isset($_POST['name'])){
		setcookie('name',$_POST['name'],time()+60*60*5);
		setcookie('islogin','1',time()+60*60*5);
		header("location:index.php?jiemu=1");
  }else{
  	die("不能为空");
  	}
}elseif($_GET['action']=='logout'){
		clearCookies();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>用户登入</title>
<meta charset="utf-8">
<meta name="author" content="苏维杰" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
      <style>  
a:link,a:visited{
 text-decoration:none;  /*超链接无下划线*/
 font-size: 16px;
}
a:hover{
 text-decoration:underline;  /*鼠标放上去有下划线*/
}
option{
	text-align: center;
	font-size: 14px;
}
select{
    width:100px;
    height:30px;
    font-size: 20px;
}
.orange.button {
    width:60px;
    height:30px;
} 
.admin{
  margin-left: 50%;
}
.fengsu{
  width: 200px;
  margin-left: -100px;
}
</style>
</head>
<body>
    <img  src="backgroud.jpg"  width="100%"  height="100%"  style="position:absolute;top:0;left:0;z-index:-1">
  <div align="justify">

<h2 align="center">评委请确定身份</h2>
<div class='admin'>
  <div class='fengsu'>
<form action="login.php?action=login" method="post">
<select name="name">
<option value="score_01">刘荣</option>
<option value="score_02">阮宏标</option>
<option value="score_03">胡敏</option>
<option value="score_04">洪伟峰</option>
<option value="score_05">朱芳</option>
</select>
  &nbsp;&nbsp;
<input class="orange button" type="submit" value="确认" />
  </form>
  </div>
  </div>
  </div>
 </body>
</html>