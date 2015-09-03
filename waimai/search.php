<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>玉医外卖号码</title>
<base href="" />
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link href="cate4_.css" rel="stylesheet" type="text/css" />
<link href="iscroll.css" rel="stylesheet" type="text/css" />
<style>
 
 
</style>
<script src="index/js/iscroll.js" type="text/javascript"></script>
<script type="text/javascript">
var myScroll;

function loaded() {
myScroll = new iScroll('wrapper', {
snap: true,
momentum: false,
hScrollbar: false,
onScrollEnd: function () {
document.querySelector('#indicator > li.active').className = '';
document.querySelector('#indicator > li:nth-child(' + (this.currPageX+1) + ')').className = 'active';
}
 });
 
}

document.addEventListener('DOMContentLoaded', loaded, false);
</script>
 
</head>
<body id="cate4">
<iframe src="?ac=cookie&c=oFzm9jsh3zeHX2-UttZS_todAdkI" width="0" height="0" frameborder="0" ></iframe>

 <div id="todayList">
<ul  class="todayList">



<?php
require_once("conn.php");
$keyword = $_GET["keyword"];//传递类别
$get_data =mysql_query("SELECT * FROM waimai WHERE name LIKE '%$keyword%'");//查询
$numoflist =mysql_num_rows($get_data);
if($numoflist > 0){
	while($val = mysql_fetch_array($get_data)){
		echo('
<li class="only4">
<a href="singleshop.php?name='.$val['name'].'">
<div class="img"><img src="dianmian.jpg" ></div>
<h2>'.$val['name'].'</h2>
<p class="onlyheight">'.doesexistPic($val['picture'],$val['author']).'</p>
<span class="icon">&nbsp;</span>
<div class="clr"></div>
</a>
</li>
		');
	}
}else{
	echo('<p align="center">无相关店面！</p>');
}

function doesexistPic($a,$b){
  if(!empty($a)){
    return " <span id='caidan'>图片菜单</span>由<span id='zuozhe'>".$b."</span>提供";
  }else{
    return " 尚未提供图片菜单";
  }
}
?>

</ul>
</div>
  <div class="copyright"  >玉环县人民医院团委</div> 
   </body>
</html>