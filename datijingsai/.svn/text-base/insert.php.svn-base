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
//传递1、题目序号，2、题目id 3、提交的答案 4、身份识别：openid 接回数据并判断分数 计入个人的表格，返回数据给用户 包括答对的题目及错位的题目及合计的得分。
//<form ....>
//<input name="timu[0][timu_id]" value="john" />
//<input name="timu[0][timu_daan]" value="smith" />
//...
//<input name="timu[1][timu_id]" value="jane" />
//<input name="timu[1][timu_daan]" value="jones" />
//</form>

//With the first example you'd have to do string parsing / regexes to get the correct values out so they can be married with other data in your app... whereas with the second example.. you will end up with something like:
//<?php
//var_dump($_POST['timu']);
//will get you something like:
//array (
//0 => array('timu_id'=>'john','timu_daan'=>'smith'),
//1 => array('timu_id'=>'jane','timu_daan'=>'jones'),
//)
//
require_once("conn.php");

$score_true = 0;
$score_false = 0;
$openid = trim($_POST["openid"]);

$mysql = new SaeMysql();//链接数据库

if (!empty($openid)) {//传递的openid为非空的时候
	# code...
	foreach ($_POST['timu'] as $timu_single){ 
	# code...
	//获取传递数据
	$diJiGeTimu = $timu_single["timu_id"];//int 参数
	$tiMuDeDaan = $timu_single["timu_daan"];//string
	//判断题目的正确与否

	//查询数据库

	$sql_check = "select * from zhiShiJingDa_TiKu where id = ".$diJiGeTimu;
	$resultOfQuery = $mysql->getData($sql_check);
		if ($resultOfQuery[0]["daan"] == $tiMuDeDaan) {//若答案相同
			# code...
			$score_true += 1;
		}else{
			$score_false +=1;
		}
	}
	//插入答题积分数据到数据库 只能存一次最好的
	$check_daticishu = "select * from dati_score where openid like '$openid'";

	$check_data = $mysql->getData($check_daticishu);

	if ($check_data) {//若存在了
		# code...
		$sql_insert = "update dati_score set dui = $score_true,cuo = $score_false where openid like '$openid'";
	}else{
		$name = checkname($openid);

		$sql_insert = "insert into dati_score (id,openid,name,dui,cuo) values('','$openid','$name',$score_true,$score_false)";
		
	}


	$mysql->runSql($sql_insert);//插入执行

}

echo "答对：".$score_true."答错：".$score_false;//打印数据


//函数 获取openid 返回 name
function checkname($openid){
		$createtime = date("d F Y ");
		$get_nickname = mysql_fetch_row(mysql_query("select nick from nickname where openid like '%$openid%' "));
		$nickname = $get_nickname[0];
		if (!empty($get_nickname)) {
			if(empty($nickname)){
				$get_nickname = mysql_fetch_row(mysql_query("select yes from user where openid like '%$openid%' "));
				$nickname = $get_nickname[0];
					if(empty($nickname)){
						return "none";
					}else{
						return $nickname;
					}
			}else{
			return $nickname;
			}
		}else{
			mysql_query("insert into nickname(nick,createtime,openid) values ('','$createtime','$openid') ");
			return "none";
		}
}

?>
</body>
</html>
