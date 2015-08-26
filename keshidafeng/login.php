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
		header("location:index.php");
  }

}elseif($_GET['action']=='logout'){
		clearCookies();
}

if ($_GET["loginName"]==0 && $_GET['action']=='logout') {
  # code...
  echo '<script type="text/javascript">
  alert("未正确的用户名！")
    </script>';
}

?>
<!DOCTYPE html>
<html>
<head>
<title>2014年度先进科室评分系统</title>
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
.orange.button {
    width:76px;
    height:30px;
    font-size: 20px;
    font-weight: bold;
} 

p{
  text-align: center;
}
</style>
</head>
<body>
<br>
<br>
<br>
  <div align="justify">

<h2 align="center">登入</h2>

<form action="login.php?action=login" method="post">
<input style="margin-left: 0px;padding-left:-15px%;padding-left: -150px;padding-left: 0px;width: 100%;height: 40px;" type="text" name="name" value="">  &nbsp;&nbsp;
  <p>
<input class="orange button" type="submit" value="确认" /></p>
  </form>

  </div>
 </body>
</html>