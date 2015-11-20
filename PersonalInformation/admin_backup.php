<!DOCTYPE html>
<!-- 人事科 审核基本信息＼再提交医务科 -->
<html>
<head>

<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" type="text/css" href="admin.css">
<script>
<!--
function refresh(){
window.location.reload();   
}
//--> 
</script>

</head>
<body>

<!--插入查询功能-->
<h1 align="center">玉环县人民医院医师信息审核系统</h1>
<h6 align="center">后台控制 版本1.0 制作人：<a href="market_admin_repick.php">苏维杰</a> 制作时间：2015-09-10</h6>

<h1 align="center">人事科后台</h1>
<?php


//creat timestamp for record
$t=time();
$datestamp = date("Y-m-d H:i",$t);
echo "<h6 align='center'>现在时间：".$datestamp."</h6>";


//connect database
require_once('conn.php');

//define openid
//getdata for person
$sql = "SELECT * FROM personalinformation_records ORDER BY id DESC";
$mysql = new SaeMysql();
//echo the result

echo "<table border='1' align='center' class='datalist'>";
$num=0;

$query_sql = $mysql->getData($sql);
$numoflist = count($query_sql);
//$get_data =mysql_query("select * from waimai where class='{$class}' ORDER BY ord DESC");//查询
if($numoflist<=10){	//如果总数小于等于10则全部生成
 // makeList($get_data);
}else{//总数大于10则分页
  if(!isset($_GET['limit'])){$limitHead =0;}else{ $limitHead=$_GET['limit'];};//如果没有传递参数 那么初始化为0
  $limitEnd = $limitHead +10;
  if($limitEnd>=$numoflist){$limitEnd=$numoflist;$limitEndmore=$limitHead;}else{$limitEndmore = $limitEnd;}//若大于总数则归为总数,再传递值仍然为前10位,否则下一页值加1（无限循环末尾）
  $limitEndless = $limitEndmore-11;
  if($limitEndless<0){$limitEndless=0;}//如果上一页的初始化值小于0则归为0
  $sql ="select * from personalinformation_records ORDER BY id DESC limit $limitHead,$limitEnd";//查询
  //makeList($get_data_limit);
  if($limitHead!==0){
    echo('<td colspan="7" class="only4-left">
<a href="admin.php?limit='.$limitEndless.'"><h2>上一页</h2></a>
</td>
');
  }
  if($limitEnd!==$numoflist){
    echo('
<td colspan="7" class="only4-left">
<a href="admin.php?limit='.$limitEndmore.'"><h2>下一页</h2></a>
</li></td>');
  }
}
echo "

<tr>
<th>ID</th>
<th>姓名</th>
<th>性别</th>
<th>电话</th>
<th>学历</th>
<th>学位</th>
<th>职称</th>
<th>职务</th>
<th>专科</th>
<th>擅长</th>
<th>个人简历</th>
<th>研究方向</th>
<th>医疗成果</th>
<th>状态</th>

</tr>";

//$query_sql = $mysqli->query($sql);
foreach($query_sql as $row){
  $num +=1;
  if ($num%2==0){
     echo "<tr align='center'>";
  }else{
     echo "<tr align='center' class='altrow'>";
  }

  echo "
  <form name='input' action='check.php' target='_self' method='get'>";
  echo "<td>" . $num . "</td>";
  echo "<td><a href='item.php?id=".$row['id']."'>" . $row['name'] . "</a></td>";
  echo "<td>" . gender($row['gender']) . "</td>";
  echo "<td>" . $row['telephone'] . "</td>";
  echo "<td>" . $row['educational_background'] . "</td>";
  echo "<td>" . $row['academic_degree'] . "</td>";
  echo "<td>" . $row['academic_title'] . "</td>";
  echo "<td>" . $row['duty'] . "</td>";
  echo "<td>" . $row['office'] . "</td>";
  echo "<td>" . $row['profession'] . "</td>";
  echo "<td>" . $row['resume'] . "</td>";
  echo "<td>" . $row['study'] . "</td>";
  echo "<td>" . $row['medical'] . "</td>";

  echo "<input type='text' name='id' hidden='true' value='{$row['id']}'/>";
  if ($row['check']=="checked")
  {
	  echo "<td>" . "<input type='submit' id='checked' value='通过'/>"  . "</td>";

    echo "<input type='text' name='value' hidden='true' value='uncheck' />";
  }else if($row['check']=="tuihui"){
    echo "<td>" . "<input type='submit' id='checked' style='color:red;' value='撤销退回'/>"  . "</td>";
    echo "<input type='text' name='value' hidden='true' value='uncheck' />";
  }else{
	  echo "<td>" . "<input type='submit' id='uncheck' value='未审核'/>"  . "</td>";
    echo "<input type='text' name='value' hidden='true' value='checked' />";
    echo "</form>";
    echo "
  <form name='input' action='check.php' target='_self' method='get'>";
    echo "<input type='text' name='id' hidden='true' value='{$row['id']}'/>";
    echo "<td>" . "<input type='submit' id='uncheck' style='color:red;'value='退回'/>"  . "</td>";
    echo "<input type='text' name='value' hidden='true' value='tuihui' />";
	}
  
  echo "</form>";
  echo "</tr>";
}


$mysql->closeDb();

echo "
</table>";

function gender($gender){
  if ($gender) {
    return "男";
  }else{
    return "女";
  }
}
?>
</body>
</html>
