<?php
if(!isset($_POST['sum_value'])){
    $value = 0;
  }else{
    $value = intval($_POST['sum_value']);
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>固话打分</title>
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
<?php
if ($value!=0) {
  $mysql = new SaeMysql();
  for ($i=($value-4); $i <= $value; $i++) { 
     $query = "update toupiao set caozuo = '0' where id = $i";
    $result= $mysql->runSql( $query );
  }
}
?>
<body>
    <img  src="backgroud.jpg"  width="100%"  height="100%"  style="position:absolute;top:0;left:0;z-index:-1">
  
<p><a href="admin.php"><img src="title.png" /></a></p>
<h2 align="center">固话打分</h2>
<div class='admin'>
  <div class='fengsu'>
  <form action="admin_dafeng.php" method="post">
<select name="sum_value">
<option value="5">5</option>
<option value="10">10</option>
<option value="15">15</option>
<option value="20">20</option>
<option value="25">25</option>
</select>
  &nbsp;&nbsp;
<input class="orange button" type="submit" value="确认" />
  </form>
</div>
  </div>
 </body>
</html>