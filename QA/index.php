<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>玉医Q&A</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link href="canvas.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
	function check(){
	var name=document.getElementById('inp_name').value;//用户名
	   if(name==""){
            alert('不能为空');
			document.baseForm.name.focus(); 
        }else{
             document.baseForm.submit();
         }
	}
</script>

<title>医院青年Q&A</title>
</head>
<body id="cate4">
<div id="todayList">

<?php
//链接数据库
require_once("conn.php");

//确定openid非空
if (!empty($_GET['openid'])) { $openid = $_GET['openid']; }

//先判断是否为注册用户 $openid 不然则返回注册页面
$check_user = mysql_query("select * from nickname where openid like '%$openid%'");

if (mysql_num_rows($check_user)>0 && !empty($openid)) {

	//显示评论页面
	echo('   
		<h1>医院青年QA</h1>

<!-- 传递了  title_text_content   post_text_content  openid  -->
<form id="baseForm" name="baseForm" 
         action="insert.php" method="post"
         onkeydown="javascript: if (event.keyCode == 13){return check();}">
	<ul class="input_test">
	<li>
		<label for="inp_name">标题：</label>
		<!-- 控制输入特殊符号 -->
			<p><input id="inp_name" class="input_out" name="title_text_content" type="text" onfocus="this.className="input_on";this.onmouseout="" onblur="this.className="input_off";this.onmouseout=function(){this.className="input_out"};" onmousemove="this.className="input_move"" onmouseout="this.className="input_out"" onKeypress="if ((event.keyCode > 32 && event.keyCode < 48) || (event.keyCode > 57 && event.keyCode < 65) || (event.keyCode > 90 && event.keyCode < 97)) event.returnValue = false;"/></p>
		<span></span>
	</li>

	<li>
		<label>内容：</label>
		<!-- 控制输入特殊符号 -->
			<p><textarea rows="10" cols="30" name="post_text_content" onKeypress="if ((event.keyCode > 32 && event.keyCode < 48) || (event.keyCode > 57 && event.keyCode < 65) || (event.keyCode > 90 && event.keyCode < 97)) event.returnValue = false;"> </textarea></p>
		<span>不少于20个字。</span>
	</li>
	<p>
');

echo "<input name='openid' hidden ='true' value='".$openid."' />";

echo ('</ul>

	<input class="button_submit"  type="button" onclick="check();" value="提交"/>
</form>
<hr class="hr_class" />
  ');

}else{
	//注册页面
	echo "<script>alert('尚未实名登记！');window.location='http://yyqn.sinaapp.com/personal/register.php?openid=".$openid."'</script>";

}

?>

</div>
   </body>
</html>