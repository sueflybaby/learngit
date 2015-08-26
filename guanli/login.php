<?php
function clearCookies(){
	setcookie('name','',time()-3600);
	setcookie('islogin','',time()-3600);
}
if(($_GET['action']=='login') && (isset($_POST['name']))){
  clearCookies();
  include_once("../conn.php");
  $name =  trim($_POST['name']);//接受传递的name
  $secret = md5($_POST['secret']);//接受传递的secret
  //查询数据库并验证
  //$mysql = new SaeMysql();

	$sql = "SELECT * FROM `guanliyuan` WHERE user like '".$name."'";
	//$data = $mysql->getData($sql);//查看是否有同等的用户
	$data = mysql_fetch_assoc(mysql_query($sql));
		if ($data["secret"]==$secret)
	{
	    setcookie('name',$name,time()+60*60*1);
		//setcookie('islogin','1',time()+60*60*1);
		header("location:index.php");
	}else{
		header("location:login.php");
		//var_dump($data);
		//echo $name."<br>".$secret."<br>".$data["secret"];
		//echo "<br>".$sql;
	}

	//$mysql->closeDb();

}else{
		clearCookies();

		//echo $secret;
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
font-family: sans-serif;
 text-decoration:none;  /*超链接无下划线*/
 font-size: 16px;
 color: #e8e846;
}
a:hover{
 text-decoration:underline;  /*鼠标放上去有下划线*/
}
option{
	text-align: center;
	font-size: 14px;
}
select{
    width:180px;
    height:30px;
    font-size: 20px;
}
#admin01{
	background-color: red;
	text-align: center;
	position: absolute;
	width: 100%;
	height: 100%;

}
#admin{
width:300px; height:410px; position:absolute; left:50%; top:50%; margin:-205px 0 0 -150px;


}
.copyright{
padding:8px;text-align:center;font-size:14px;color:#666;

}
</style>
</head>
<body id='admin01'>
    <div id='admin'>
<div>
<h2 align="center">请登入</h2>

 <br>
<br>
<form action="login.php?action=login" method="post">
用户名：<input type="text" name = "name" /><br>
密码：<input type ="password" name="secret" /><br>
  &nbsp;&nbsp;
<input type="submit" value="确认" />
  </form>
    </div>
  <br><br>
<div class='copyright'>巨石工作室</div>
    </div>
 </body>
</html>