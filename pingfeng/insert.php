<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>玉医评分系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<style type="text/css">
	body{
		text-align: center;
	}
	p{
		font-size: 20px;
		font-weight: bolder;
	}
</style>
<script type="text/javascript">
	function home(){

    	window.location='index.php?jiemu=<?php echo (intval($_POST['jiemu'])+1); ?> ';

	}
</script>
</head>
<body>


<?php
/*
*post args 
*		$pingwei_id $jiemu_id $jiemu_score
*insert the data into tables named 'toupiao';if success return
*string of 'thanks for vote' else echo 'wrong voted again'
*
*as a class file 
*/
$score_zhidu = 10;

if (!isset($_POST['pingwei'])) {
	$pingwei = "null";
}else{
	$pingwei = $_POST['pingwei'];
}

if (!isset($_POST['jiemu'])) {
	$jiemu = 0;
}else{
	$jiemu = intval($_POST['jiemu']);
}

if (!isset($_POST['score'])) {
	$score = 0;
}else{
	$score = $_POST['score'];

}

//echo $score;

if($score > $score_zhidu || $score < 0){
	echo "<h2 align='center'>数值不正确！请重新评分。</h2>";
}else{
	if($pingwei!='null' && $jiemu !=0){

		$insert_score = new insert_data($pingwei,$jiemu,$score);

		$insert_score->update();

	}
}
//echo $jiemu,$pingwei,$score;

class insert_data
{
	private $pingwie;
	private $jiemu;
	private $score;
	function __construct($pingwei_id,$jiemu_id,$jiemu_score)
	{
		$this -> pingwei = $pingwei_id;
		$this -> score = $jiemu_score;
		$this -> jiemu = $jiemu_id;
		//echo $this->pingwei,$this->jiemu,$this->score;
	}

	public function update(){
		$check_caozuo = "select caozuo from toupiao where id ={$this->jiemu}";
		$query = "update toupiao set {$this->pingwei} = {$this->score} where id = {$this->jiemu}";
		//echo $query;
		$mysql = new SaeMysql();
		$mysql_caozuo = new SaeMysql();
		$result_check= $mysql_caozuo->getData( $check_caozuo );
		//var_dump($result_check);
		if ($result_check[0]['caozuo'] == "1") {
			# code...		
			$result= $mysql->runSql( $query );
				if($result){
					$this->show_success();
				}else{
					$this->show_fail();
				}
		}else{
			$this->show_error();
		}

		//$result->free();
		//$mysqli->close();
	}

	private function show_success(){
		echo '
		<div>
		<p>评分成功！</p>
		<input type="button" value="返回" onclick="home(); return false;" />
		</div>';
		echo "<script>window.location='index.php?jiemu=".intval(($this -> jiemu)+1)."'</script>";

	}

	private function show_fail(){
		echo '
		<div>
		<p>评分失败！</p>
		<input type="button" value="返回" onclick="home(); return false;" />
		</div>';
		//echo "<script>window.location='index.php?jiemu=1'</script>";

	}

	private function show_error(){
		echo '
		<div>
		<p>无法再评分！</p>
		<input type="button" value="返回" onclick="home(); return false;" />
		</div>';
		//echo "<script>window.location='index.php?jiemu=1'</script>";

	}
}
?>
</body>
</html>
