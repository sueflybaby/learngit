
<!DOCTYPE html> 
<html> 
    <head> 
        <title>报名申请</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta charset="utf-8">
      </head>
          <body>
<?php
$name = $_GET['name'];
$num = $_GET['num'];
$telephone = $_GET['contact'];
include_once('conn.php');
$query = mysql_fetch_array(mysql_query("select * from yuandan where name like '%$name%'"));
if (!empty($query)) {
	echo "<script>alert('已添加');</script>";
	echo '<script>window.location="'.$_SERVER["HTTP_REFERER"].'"</script>';
	exit();
}else{
$insert = mysql_query("insert into yuandan(name,num,telephone) values('$name','$num','$telephone')");
if($insert){
	echo "<script>alert('保存成功,感谢您参与到活动中来！');</script>";
	echo '<script>window.location="'.$_SERVER["HTTP_REFERER"].'"</script>';

}else{
	echo "<script>alert('保存失败，请重新尝试添加！');</script>";
	echo '<script>window.location="'.$_SERVER["HTTP_REFERER"].'"</script>';
}
}
?>
</body>
</html>