<?php

$openid = $_GET["openid"];

if (!isset($openid)) {
	# code...
	exit("NOT NULL!!!");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>2014年度先进科室评分系统</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="sliding.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css.css">

<script> 

function validate(){
  var resualt=false;
  var a = 0;
  var num =0;
  //i 是总的题目数量
  for (var i=0;i<15;i++) {
    timuid = "timu["+i+"][timu_daan]";
    var radios = document.getElementsByName(timuid);
    for(var b=0;b<radios.length;b++) 
    {
       if (radios[b].checked) {
         num++;
         
       }
    }
   
  }
//num是总的题目数量
  if (num == 15) { 
    resualt = true;
  }else{
    alert("尚还有未完成题目！已完成"+num+"题！");
  }

  return resualt;
}
 
</script> 

</head>
<body>

<div id="title_content">
	
<h2>2014年度先进科室评分系统</h2>
</div>
<h5>制作：苏维杰 版本：0.99</h5>
<hr class='divide_head'>
<h4>注意事项</h4>
<h5>您只有1次抽奖机会</h5>
<form method='post' action='insert.php' name = "frmvote" target='_self' onsubmit = "return(validate())" >
<input type="text" name="openid" hidden="true" value="<?php echo $openid; ?>" />
<ol class="vote_list">
	<!-- 生成所有的题目 -->

<?php
//生成随机数
$i = 0;


	//生成part1 比如1-10 取出5个
	makeTimu(1,18,6,0);

	//生成part2 比如10-20
	makeTimu(19,34,4,6);

	//生成part3 比如20-30
	makeTimu(35,158,5,10);
	


	function makeTimu($min,$max,$num,$i){
		if ($num != 0 && $num > 0) {
			# code...
			$num = intval($num)+$i-1;

			$hasRan = array();

			
			while ($i <= $num) {

				srand((double)microtime()*1000000);

				$a=rand($min,$max);
				//只要是随机的生成还没有存在于数组中
				if (!in_array($a, $hasRan)) {
					# code...

					array_push($hasRan, $a);

					$mysql = new SaeMysql();//链接数据库

					$sql = "select * from zhiShiJingDa_TiKu where id = $a";

					$data = $mysql->getData($sql);
					//var_dump($data);
					//list($id,$timu,$xuanxiang01,$xuanxiang02,$xuanxiang03,$xuanxiang04,$daan) = $data[0];
					//echo $timu;
					echo '
						<li><span class="vote_title">'.$data[0]["timu"].'</span>
						<ul class="vote_item_list">
						<input name="timu['.$i.'][timu_id]" type="text" hidden="true" value="'.$data[0]["id"].'" />
						<li class="li_radio">
						  <input name="timu['.$i.'][timu_daan]" type="radio" value="A" />
						  <span>A、'.$data[0]["xuanxiang01"].'</span></li>
						
						<li class="li_radio">
						  <input name="timu['.$i.'][timu_daan]" type="radio" value="B" />
						  <span>B、'.$data[0]["xuanxiang02"].'</span></li>
						
						<li class="li_radio">
						  <input name="timu['.$i.'][timu_daan]" type="radio" value="C" />
						  <span>C、'.$data[0]["xuanxiang03"].'</span></li>

						
						</ul>
						</li>

					';	
					$i ++;
				}	
			
			}


		}

	}

?>
</ol>
<br/>
<br/>
	<input class="tijiao" type="submit" value="提交">
</form>
</div>
<hr class='divide_head'>
<A HREF="login.php?action=logout">登出</A>
<br>
<br>
</body>
</html>