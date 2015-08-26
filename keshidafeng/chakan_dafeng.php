<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台查看</title>
<style>  
      body{
            
            font-weight: bolder;
      }
      p{
        text-align: center;
      }
</style>
</head>
<body>
<h1 align='center'>2014年度先进科室评分结果</h1>
<h6 align="center">制作人：苏维杰 制作时间：2015-04-11</h6>
<br>
<!-- <h6 align="center"><a href="admin_personal.php">查看评委打分</a> || <a href="admin_dafeng.php">固化打分</a></h6> -->
<table border='1' align='center'>
<tr>
<th>序号</th>
<th>科室名称</th>
<th>总分</th>
<th>平均分</th>
<th>加权分</th>
<th>最后得分</th>

</tr>

<?php

//connect database

$mysql = new SaeMysql();
//mysqli_query($mysqli,"SET NAMES utf8");
$query = "select * from toupiao";
$result= $mysql->getData( $query );
//var_dump($result);
    foreach (array_slice($result[0],3) as $key => $value) {
      # code...
      //echo "$key:$value";
      if ($value == 0) {
        $num ++;
        # code...
      }
    }
      $keshi_name = array('nei_1'=>'内一科','nei_2'=>'内二科','nei_3'=>'内三科','icu'=>'ICU','erke'=>'儿科','ganranke'=>'感染科','wai_1'=>'外一科','naowaike'=>'脑外科','guke'=>'骨科','fuke'=>'妇科','shoushushi'=>'手术室（麻醉科）' ,'jizhenke'=>'急诊科','kouqiangkou'=>'口腔科','yanke'=>'眼科','erbiyanhouke'=>'耳鼻咽喉科','zhongyike'=>'中医科','pifuke'=>'皮肤科','tijianzhongxin'=>'体检中心','xiyaofang'=>'西药房','zhongyaofang'=>'中药房','jianyanke'=>'检验科','yingxiangke'=>'影像科','tejianke'=>'特检科','binglike'=>'病理科','xuetoushi'=>'血透室','meishatongmenzhen'=>'美沙酮门诊');
      $last_result_by_pingjun_jiaquan = array();
for ($i=0; $i < count($result); $i++) { 
	  $row = $result[$i];
      // var_dump($row);

    
      $num_child_row = count($row) - 3;//60个打分评委
      $array_score = array_slice($row, 3);//去掉前3个参数id 0 keshi_name 1 erwai 2(计入平均分)
     // sort($array_score);
      $total_score = array_sum($array_score);//每个科室分数的总和
      if ($total_score !=0) {
        # code...
        $total_pingjun_score = $total_score/(80-$num);//计算平均分
      }
      
      //$array_keshi_fensshu[] = $total_pingjun_score;
      //记录所有的科室代码 和 平均分 方便组合数组
      $last_result_by_pingjun_jiaquan[$keshi_name[$row["keshi_name"]]]=number_format(($total_pingjun_score+$row["erwai"]),2);
    //var_dump(number_format($delete_pingjun_score,2));
      echo "<tr align='center'>";
      echo "<td>" . ($row['id']-1) . "</td>";
      echo "<td>" . $keshi_name[$row["keshi_name"]] . "</td>";
      echo "<td>" . $total_score . "</td>";
      echo "<td bgcolor='pink'>" . number_format($total_pingjun_score,2) . "</td>";//小数点后两位
      echo "<td bgcolor='red'>" . $row["erwai"]. "</td>";//小数点后两位
      echo "<td bgcolor='pink'>" . number_format(($total_pingjun_score+$row["erwai"]),2) . "</td>";//小数点后两位
      echo "</tr>";
  }
echo "</table>";
echo "<p>打分人数：".(80-$num)."/"."80</p>";
arsort($last_result_by_pingjun_jiaquan);
//var_dump($last_result_by_pingjun_jiaquan);
echo "<hr><br><br>";
echo "<table border='1' align='center'>
<tr>
<th>排名</th>
<th>科室名称</th>
<th>最后得分</th>
</tr>";
foreach ($last_result_by_pingjun_jiaquan as $key => $value) {
  # code...
  $b++;
  echo "<tr align='center'>";
  echo "<td>" . $b . "</td>";
  echo "<td>" . $key . "</td>";
  echo "<td>" . $value . "</td>";
  echo "</tr>";
}
echo "</table>";
//$result->free();
//$mysqli->close();

?>
<hr>
<p align="center">玉医青年 团委</p>

</body>
</html>
