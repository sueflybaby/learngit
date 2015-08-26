<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>玉医跳蚤市场</title>
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
 <div id="todayList">
<ul  class="todayList">



<?php
require_once("conn.php");

$openid = $_GET['openid'];

$get_data =mysql_query("select * from tiaozao_items where openid like '%$openid%' ORDER BY id DESC");//查询

$numoflist =mysql_num_rows($get_data);

if(!isset($_GET['limit'])){$limitHead =0;}else{ $limitHead=$_GET['limit'];};//如果没有传递参数 那么初始化为0

$limitHead1_sum_head = $limitHead +1;

$limitHead1_sum_end = $limitHead +11;

//若相加的大于总数则等于总数

if ($limitHead1_sum_end > $numoflist) {
	# code...
	$limitHead1_sum_end = $numoflist;
}

//显示全部条数目
echo('
<div align="center">
目前总数：'.$numoflist.'条  目前显示：'.$limitHead1_sum_head.' - '.$limitHead1_sum_end.' </div>
');

echo('
<li class="only4">
<a href="register.php?openid='.$openid.'"><h2>登记物品</h2></a>
</li>
');

//$class = $_GET["class"];//传递类别

if($numoflist<=10){	//如果总数小于等于10则全部生成

	makeList($get_data);

}else{//总数大于10则分页
	
	$limitEnd = $limitHead +10;
	if($limitEnd>=$numoflist){$limitEnd=$numoflist;$limitEndmore=$limitHead;}else{$limitEndmore = $limitEnd +1;}//若大于总数则归为总数,再传递值仍然为前10位,否则下一页值加1（无限循环末尾）
	$limitEndless = $limitEndmore-11;
	if($limitEndless<0){$limitEndless=0;}//如果上一页的初始化值小于0则归为0
	$get_data_limit =mysql_query("select * from tiaozao_items where openid like %$openid% ORDER BY id DESC limit $limitHead,$limitEnd");//查询
	
	makeList($get_data_limit);

	if($limitHead!==0){
		echo('
		<li class="only4">
		<a href="list_admin.php?limit='.$limitEndless.'"><h2>上一页</h2></a>
		</li>
		');
	}

	if($limitEnd!==$numoflist){
		echo('
			<li class="only4">
			<a href="list_admin.php?limit='.$limitEndmore.'"><h2>下一页</h2></a>
			</li>');
	}

}


function makeList($data){
	while ($val =  mysql_fetch_array($data)){//编列列表
	//传递店面名，name
		echo('
		<li class="only4">
		<a href="items_admin.php?id='.$val['id'].'&openid='.$val['openid'].'">
		<div class="img"><img src="item.jpg" ></div>
		<h2>'.$val['name'].'</h2>
		<p class="onlyheight">'.author($val['openid']).statue($val['status']).'</p>
		<span class="icon">&nbsp;</span>
		<div class="clr"></div>
		</a>
		</li>
		');
}
}

function author($a){
	$nickname = mysql_fetch_array(mysql_query("select nick from nickname where openid like '%$a%'"));
	if(!empty($nickname)){
		return "由<span style='color:red'>".$nickname["nick"]."</span>提供货品";
	}else{
		return " 尚未登记";
	}
}

function statue($a){
	if ($a) {
		# code...
		return "<span style='color:red'>上架中</span>";
	}else{
		return "<span style='color:blue'>已下架</span>";
	}
}

?>
</ul>
</div>
  <div class="copyright"  >玉医青年·团委</div> 
   </body>
</html>