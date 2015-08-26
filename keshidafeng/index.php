<?php
if(!(isset($_COOKIE['name']) && $_COOKIE['islogin'] == '1')){
   header("location:login.php?action=login");
   exit();
 }else{
 	 //如果传入的name在评委数据库中没有查到 就提示查无此人 及返回重新登入，如果正确则获取相对应的score值
	
	 $mysql = new SaeMysql();
	 $check_pingwei = "select * from score_pingwei where login_name ='".$_COOKIE['name']."';";
	 $result_check= $mysql->getData($check_pingwei);
			//var_dump($result_check);
			if (!empty($result_check)) {//未提交
				$score_pingwei = $result_check[0]['score'];
				//echo $score_pingwei;//检验
			}else{
				header("location:login.php?action=logout&loginName=0");
				

				
	   			exit();
			}
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
    function $(x){
        return document.getElementById(x);
    }
    var sel=$("c_select");
    var wrap=$("sel_wrap");
    var result=wrap.getElementsByTagName("span");
    wrap.onmouseover=function(){
        this.style.backgroundColor="#fff";
    }
    wrap.onmouseout=function(){
        this.style.backgroundColor="#fafafa";
    }
    sel.onchange=function(){
        var opt=this.getElementsByTagName("option");
        var len=opt.length;
        for(i=0;i<len;i++){
            if(opt[i].selected==true){
                x=opt[i].innerHTML;
            }
        }
        result[0].innerHTML=x;
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
<h5>您拥有两次提交的机会</h5>
<form method='post' action='insert.php' target='_self'>
<input type="text" name="pingwei" hidden="true" value="<?php echo $score_pingwei; ?>" />
<?php
	$pingwei = $_POST["name"];



	$keshi_name_01 = array('nei_1'=>'内一科','nei_2'=>'内二科','nei_3'=>'内三科','icu'=>'ICU','erke'=>'儿科','ganranke'=>'感染科','wai_1'=>'外一科','naowaike'=>'脑外科','guke'=>'骨科','fuke'=>'妇科','shoushushi'=>'手术室（麻醉科）' );
	$keshi_name_02 = array('jizhenke'=>'急诊科','kouqiangkou'=>'口腔科','yanke'=>'眼科','erbiyanhouke'=>'耳鼻咽喉科','zhongyike'=>'中医科','pifuke'=>'皮肤科','tijianzhongxin'=>'体检中心','xiyaofang'=>'西药房','zhongyaofang'=>'中药房','jianyanke'=>'检验科','yingxiangke'=>'影像科','tejianke'=>'特检科','binglike'=>'病理科','xuetoushi'=>'血透室','meishatongmenzhen'=>'美沙酮门诊');

	foreach ($keshi_name_01 as $keShiDaiMa => $keShiName) {
		# 内外科系统
		echo "
		<p>$keShiName</p>
		 <div class='sel_wrap' id='sel_wrap'>
		
		<select name='$keShiDaiMa'  class='select' id='c_select' style='height:30px;' size=2>
			 ";
			 echo "<option value ='100' selected>100</option>";
			foreach (range(99,75) as $i) { 
	 			echo "<option value ='$i'>$i</option>";
	 		}
	 	echo "</select><br><hr width=300 style='dashed;'>
                            </div>";
	}
	foreach ($keshi_name_02 as $keShiDaiMa => $keShiName) {
		# 医技系统
		echo "
		<p>$keShiName</p>
		 <div class='sel_wrap' id='sel_wrap'>
		
		<select name='$keShiDaiMa'  class='select' id='c_select' style='height:30px;' size=2>
			 ";
			 echo "<option value ='100' selected>100</option>";
			foreach (range(99,75) as $i) { 
	 			echo "<option value ='$i'>$i</option>";
	 		}
	 	echo "</select><br><hr width=300 style='dashed;'>
                            </div>";	}

?>
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