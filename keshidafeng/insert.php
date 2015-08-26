<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>2014年度先进科室评分系统</title>
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

<? 

	if (!isset($_POST['pingwei'])) {
		$pingwei = "null";
	}else{
		$pingwei = $_POST['pingwei'];
	}

	$keshi_name = array('nei_1','nei_2','nei_3','icu','erke','ganranke','wai_1','naowaike','guke','fuke','shoushushi','jizhenke','kouqiangkou','yanke','erbiyanhouke','zhongyike','pifuke','tijianzhongxin','xiyaofang','zhongyaofang','jianyanke','yingxiangke','tejianke','binglike','xuetoushi','meishatongmenzhen');
	foreach ($keshi_name as $name) {
		# code...
		$name_score = intval($_POST[$name]);
		//echo $name_score;

		$insert_score = new insert_data($pingwei,$name,$name_score);

		$insert_score->update();

	}
		$mysql = new SaeMysql();
		$query_submit = "select didSubmit from score_pingwei where score like '{$pingwei}'";
		$resultOfQuery_submit = $mysql->getData($query_submit);
		
		if ($resultOfQuery_submit[0]["didSubmit"] < 2) {
			//var_dump($resultOfQuery_submit[0]["didSubmit"]);
			$didSubmit_plus = intval($resultOfQuery_submit[0]["didSubmit"])+1;
			$query_update_submit = "update score_pingwei set didSubmit = $didSubmit_plus where score like '$pingwei'";
			$mysql->runSql( $query_update_submit );
		}

//echo $jiemu,$pingwei,$score;

class insert_data
{
	private $pingwie;
	private $jiemu;
	private $score;
	function __construct($pingwei_id,$name,$name_score)
	{
		$this -> pingwei = $pingwei_id;
		$this -> score = $name_score;
		$this -> jiemu = $name;
		//echo $this->pingwei,$this->jiemu,$this->score;
	}

	public function update(){
		$query = "update toupiao set {$this->pingwei} = {$this->score} where keshi_name = '{$this->jiemu}'";
		//echo $query;
		$mysql = new SaeMysql();
		$query_submit = "select didSubmit from score_pingwei where score like '{$this->pingwei}'";
		$resultOfQuery_submit = $mysql->getData($query_submit);
		//var_dump($this->pingwei);
		//var_dump($resultOfQuery_submit);
		if ($resultOfQuery_submit[0]["didSubmit"] > 1 || ($this -> score>100)|| ($this -> score<75)) {
			# code...

			$this->show_error();
			
		}else{
			

			$mysql->runSql( $query );
			$mysql->closeDb();
			$this->show_success();
					}
			
	}



	private function show_success(){
		echo '
		<div>
		<p>评分成功！</p>
		<input type="button" value="返回" onclick="home(); return false;" />
		</div>';

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
		<p>无法评分！</p>
		<input type="button" value="返回" onclick="home(); return false;" />
		</div>';
		//echo "<script>window.location='index.php?jiemu=1'</script>";

	}
}
?>
</body>
</html>
