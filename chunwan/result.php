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
<?

function getname($a){
	$mulu = array("A"=>"歌伴舞：家和万事兴",
					
					"B"=>"相声：如此广告",
					"C"=>"对唱：好心分手",
					"D"=>"舞蹈：欢快的跳吧",
					"E"=>"独唱：后来",
					"F"=>"快板：我为玉医多多做贡献",
					"G"=>"小品：产房门前",
					"H"=>"舞蹈：年年有余",
					"I"=>"合唱：明天会更好",
                 "J"=>"领导班子：医者心声",
                 "K"=>"嘉宾：精忠报国",
                 "L"=>"嘉宾：雪山春晓",
                 "M"=>"嘉宾：日月凌空",
                 "N"=>"嘉宾：盘妻索妻");
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