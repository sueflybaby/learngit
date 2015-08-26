<?php
if(!(isset($_COOKIE['islogin']) && $_COOKIE['islogin'] == '1')){
   header("location:login.php");
   exit();
 }

if(!isset($_GET['jiemu'])){
	$jiemu = 1;
}else{
	$jiemu = $_GET['jiemu'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>玉医团委 评分系统</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="sliding.css" type="text/css" media="screen" />
</head>
<body>
	<div id="div1"><img src="backgroud.jpg" /></div> 
<div>
	<p><img src="title.png" /></p>
</div>
<hr class='divide_head'>
<div>
	<table>
		<tr>
		<?php
			$mysql = new SaeMysql();
			$query = "select * from toupiao";
			$result= $mysql->getData( $query );
			$num = count($result);

			for ($i=1; $i <= $num ; $i++) { 
				if (($i == 6) || ($i == 11) || ($i==16) || ($i==21)) {
					echo "</tr><tr>";
				}
			//$array_score = array('score_01','score_02','score_03','score_04');
				if ($result[($i-1)][$_COOKIE['name']]) {
					echo '<td><ul class="blue"><li><a href="index.php?jiemu='.$i.'" title="home" class="current">'.$i.'号<span>'.$result[($i-1)][$_COOKIE['name']].'</span></a></li></ul></td>';
				}else{
					echo '<td><ul class="blue"><li><a href="index.php?jiemu='.$i.'" title="home" class="current"><span></span>'.$i.'号</a></li></ul></td>';
				}
			}
			
		?>
		</tr>
	</table>
</div>
<hr class='divide_head'>
<div id="title_content">
	
	<?php
	if ($jiemu>$num) {
		# code...
		$jiemu = $num;
	}//若传递的节目id大于总数则自动归位总数

		$query_jiemu = "select * from toupiao where id = '{$jiemu}'";
		$result_jiemu = $mysql->getData($query_jiemu);
		//var_dump($result_jiemu);
	  				$row = $result_jiemu[0];
					$author = $row['author'];
					$jiemu_str = $row['jiemu'];
					$group = $row['group'];	
					$id = $row['id'];
		
			//$result_jiemu->free();
			//$mysqli->close();
		echo "
			<h2>您正在为<span style='color:red;font-weight:bolder;font-size:30px;'>{$id}</span>号节目打分</h2>
			<span id='jiemu'>{$jiemu_str}</span>
			<br><br>
			<span id='author'>{$author}</span>
			<br><br>
			<span id='group'>{$group}</span>";
	?>
	<!-- <h5><a  style='color:red' href="my_score.php">查看我的评分</a></h5> -->
	<br />
	<br />
</div>
<div>

<form method="post" action="insert.php" target="_self">
	<select name="score" class="fenshu">
<?php
	foreach (range(9.9, 9.0, 0.01) as $i) { 
	 	echo "<option value ='$i'>$i</option>";
	 }
	
?>
	</select>
	<!-- <input type="text" name="score" class="fenshu" /> -->
	<input type="text" name="pingwei" hidden="true" value="<?php echo $_COOKIE['name']; ?>" />
	<input type="text" name="jiemu" hidden="true" value="<?php echo $jiemu; ?>" />
	<br>
	<br>
	<input class="tijiao" type="submit" value="打分">
</form>
</div>
<br>
<br>
<hr>
<div class="copyright">玉医团委 苏维杰</div>
</body>
</html>