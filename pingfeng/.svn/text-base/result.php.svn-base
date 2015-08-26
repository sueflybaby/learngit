<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微信投票结果页面</title>
<meta name="author" content="苏维杰" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
</head>
<style>
body{
	text-align: center;
    background-color: rgba(255,0,18,0.92);
    color: #f8e414;
    text-shadow: 1px 2px 1px black;
}
.admin{
	margin-left: 50%;
}
.jieguo{
	text-align: center;
	width: 300px;
	margin-left: -150px;;
}
</style>
<body>
<h1>2014年青哥赛·结果公布</h1>
<h4><a href="random.php" target="_blank">随机抽取10位参与者</a></h4>

<?

function getname($a){
	$mulu = array(	"A"=>"洪伟峰:心如刀割",
					"B"=>"张鹏：小情歌",    
					"C"=>"芦富强：单身情歌",       
					"D"=>"王丽娜：不如跳舞",
					"E"=>"王伟 骆丹:生活安可",          
					"F"=>"项方玉：我等到花儿也谢了",           
					"G"=>"李旸子：夜夜夜夜",           
					"H"=>"庄植凯：空白格",
					"I"=>"高建:可惜不是你",
					"J"=>"曹瞿波：当我想你的时候",
					"K"=>"陈坤威：暗香",
					"L"=>"章华安：九寨之子");
	return $mulu[$a];
	
}


include("conn.php");
$check = mysql_query("select * from chunwan_tickts order by sum DESC");
echo "<div class ='admin' ><table class='jieguo'>
<tr>
<td>序列</td><td>节目名</td><td>选票</td>
</tr>
";
$num = 1;
$total_sum = 0;
$jiemu_list = array();
while($row = mysql_fetch_array($check)){
	echo("<tr><td>".$num."</td><td>".getname($row['jiemu'])."</td><td>".$row['sum']."</td></tr>");
	$total_sum = $total_sum + $row['sum'];
	array_push($jiemu_list,$row['jiemu']);
	$num ++;
}
$first_jiemu = $jiemu_list[0];
echo "</table></div>";
echo "<p>节目《".getname($first_jiemu)."》获得了最高的选票！</p>";
?>
</body>
</html>