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
<!-- Begin Stylesheets -->
<link rel="stylesheet" href="stylesheets/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="stylesheets/coda-slider-2.0.css" type="text/css" media="screen" />
<!-- End Stylesheets -->
<!-- Begin JavaScript -->
<script type="text/javascript" src="javascripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="javascripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="javascripts/jquery.coda-slider-2.0.js"></script>
<script type="text/javascript">
			$().ready(function() {
				$('#coda-slider-1').codaSlider();
			});
		 </script>
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
<!-- End JavaScript -->
</head>
<body class="coda-slider-no-js">
<h1>答题竞赛</h1>
<noscript>
<div>
  <p>Unfortunately your browser does not hava JavaScript capabilities which are required to exploit full functionality of our site. This could be the result of two possible scenarios:</p>
  <ol>
    <li>You are using an old web browser, in which case you should upgrade it to a newer version. We recommend the latest version of <a href="http://www.getfirefox.com">Firefox</a>.</li>
    <li>You have disabled JavaScript in you browser, in which case you will have to enable it to properly use our site. <a href="http://www.google.com/support/bin/answer.py?answer=23852">Learn how to enable JavaScript</a>.</li>
  </ol>
</div>
</noscript>
<form method='post' action='insert.php' name = "frmvote" target='_self' onsubmit = "return(validate())" >
<input type="text" name="openid" hidden="true" value="<?php echo $openid; ?>" />
<div class="coda-slider-wrapper">
  <div class="coda-slider preload" id="coda-slider-1">


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



             <div class="panel">
      <div class="panel-wrapper">
        <h2 class="title">第'.($i+1).'题</h2>
        <p>
            <span class="vote_title">'.$data[0]["timu"].'</span>
            
            <input name="timu['.$i.'][timu_id]" type="text" hidden="true" value="'.$data[0]["id"].'" />
           <br/>
           <br/>
              <input name="timu['.$i.'][timu_daan]" type="radio" value="A" />
              <span>A、'.$data[0]["xuanxiang01"].'</span></li>
           <br/>
            
              <input name="timu['.$i.'][timu_daan]" type="radio" value="B" />
              <span>B、'.$data[0]["xuanxiang02"].'</span></li>
           <br/>
            
              <input name="timu['.$i.'][timu_daan]" type="radio" value="C" />
              <span>C、'.$data[0]["xuanxiang03"].'</span>

            
           
        </p>
      </div>

          ';  
          $i ++;
        } 
      
      }


    }

  }

?>

<br/>
<br/>
  <input class="tijiao" type="submit" value="提交">
</form>
<br/>
<br/>
<br/>
<br/>
</div>
<hr class='divide_head'>

<!-- .coda-slider-wrapper -->

<div style="width:550px;margin:20px auto;">

</div>

</body>
</html>