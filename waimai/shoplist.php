<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>玉医外卖列表</title>
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
$class = $_GET["class"];//传递类别
$get_data =mysql_query("select * from waimai where class='{$class}' ORDER BY ord DESC");//查询
$numoflist =mysql_num_rows($get_data);
if($numoflist<=10){	//如果总数小于等于10则全部生成
	makeList($get_data);
}else{//总数大于10则分页
	if(!isset($_GET['limit'])){$limitHead =0;}else{ $limitHead=$_GET['limit'];};//如果没有传递参数 那么初始化为0
	$limitEnd = $limitHead +10;
	if($limitEnd>=$numoflist){$limitEnd=$numoflist;$limitEndmore=$limitHead;}else{$limitEndmore = $limitEnd +1;}//若大于总数则归为总数,再传递值仍然为前10位,否则下一页值加1（无限循环末尾）
	$limitEndless = $limitEndmore-11;
	if($limitEndless<0){$limitEndless=0;}//如果上一页的初始化值小于0则归为0
	$get_data_limit =mysql_query("select * from waimai where class='{$class}' ORDER BY ord DESC limit $limitHead,$limitEnd");//查询
	makeList($get_data_limit);
if($limitHead!==0){
echo('
<li class="only4">
<a href="shoplist.php?class='.$class.'&limit='.$limitEndless.'"><h2>上一页</h2></a>
</li>
');
}
	if($limitEnd!==$numoflist){
	echo('
<li class="only4">
<a href="shoplist.php?class='.$class.'&limit='.$limitEndmore.'"><h2>下一页</h2></a>
</li>');
}
}
function makeList($data){
while ($val =  mysql_fetch_array($data)){//编列列表
//传递店面名，name
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