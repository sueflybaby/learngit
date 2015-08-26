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




<?php
require_once("conn.php");


if (!empty($_GET['openid'])) {

	$openid = $_GET['openid'];

	if ($_GET['class']=="sell") {
		# code...
		$get_data_str ="select * from tiaozao_items where status = 1 ORDER BY id DESC";//查询 仍在上架的物品
	}else if ($_GET['class']=="buy") {
		# code...
		$get_data_str ="select * from tiaozao_items_buy where status = 1 ORDER BY id DESC";//查询  仍在上架的需求
	}

	$get_data = mysql_query($get_data_str);

	$numoflist = mysql_num_rows($get_data);


	if(!isset($_GET['limit'])){$limitHead =0;}else{ $limitHead=$_GET['limit'];};//如果没有传递参数 那么初始化为0

	$limitHead1_sum_head = $limitHead + 1;

	$limitHead1_sum_end = $limitHead + 10;

	//若相加的大于总数则等于总数

	if ($limitHead1_sum_end >= $numoflist) {
		# code...
		$limitHead1_sum_end = $numoflist;
	}
	echo('
	<div align="center"><h1>玉医青年·跳蚤市场</h1></div>
	');
	echo('
	<div align="center">
	<table id="table_bar">
	<tr>
	<td>
	<a id="button_bar" href="register.php?openid='.$openid.'">
		<div class="demo_con">
		<button type="button" class="button yellow">发布物品</button>
		</div>
	</a>
	</td>
		<td>
	<a id="button_bar" href="register_request.php?openid='.$openid.'">
		<div class="demo_con">
		<button type="button" class="button yellow">发布需求</button>
		</div>
	</a>
	</td>
	<td>
	<a id="button_bar" href="items_admin.php?openid='.$openid.'">
		<div class="demo_con">
		<button type="button" class="button yellow">管理发布</button>
		</div>
	</a>
	</td>
	</tr>
	</table>
	</div>
	');
	if ($_GET["class"]=="sell") {
		# code...
			echo('
				<div>
				<table id="table_fenlei">

				<tr>
				<td id="lanmu_button_checked"><a href="index.php?class=sell&openid='.$openid.'">售卖区</a></td>
				<td id="lanmu_button" ><a href="index.php?class=buy&openid='.$openid.'">求购区</a></td>
				</tr>

				</table>
				</div>
				<ul class="todayList">
				');
	}else{
			echo('
				<div>
				<table id="table_fenlei">

				<tr>
				<td id="lanmu_button" ><a href="index.php?class=sell&openid='.$openid.'">售卖区</a></td>
				<td id="lanmu_button_checked" ><a href="index.php?class=buy&openid='.$openid.'">求购区</a></td>
				</tr>

				</table>
				</div>
				<ul class="todayList">
				');
	}

	//$class = $_GET["class"];//传递类别

	if($numoflist<=10){	//如果总数小于等于10则全部生成

		makeList($get_data,$_GET["class"]);//打印出列表

	}else{//总数大于10则分页
		
		$limitEnd = $limitHead + 10;
		if($limitEnd>=$numoflist){$limitEnd=$numoflist;$limitEndmore=$limitHead;}else{$limitEndmore = $limitEnd;}//若大于总数则归为总数,再传递值仍然为前10位,否则下一页值加1（无限循环末尾）
		$limitEndless = $limitEndmore-11;
		if($limitEndless<0){$limitEndless=0;}//如果上一页的初始化值小于0则归为0
		$get_data_limit_str = $get_data_str." limit ".$limitHead.",".$limitEnd;
		$get_data_limit =mysql_query($get_data_limit_str);//查询

		makeList($get_data_limit,$_GET["class"]);//打印出列表

		if($limitHead!==0){

			if ($_GET['class']=="sell") {
				echo('
					<li class="only4">
					<a href="index.php?class=sell&limit='.$limitEndless.'&openid='.$openid.'"><h2>上一页</h2></a>
					</li>
					');
			}else if ($_GET['class']=="buy") {
				echo('
					<li class="only4">
					<a href="index.php?class=buy&limit='.$limitEndless.'&openid='.$openid.'"><h2>上一页</h2></a>
					</li>
					');
			}

		}

		if($limitEnd!==$numoflist){

			if ($_GET['class']=="sell") {
				echo('
					<li class="only4">
					<a href="index.php?class=sell&limit='.$limitEndmore.'&openid='.$openid.'"><h2>下一页</h2></a>
					</li>');
			}else if ($_GET['class']=="buy") {
				echo('
					<li class="only4">
					<a href="index.php?class=buy&limit='.$limitEndmore.'&openid='.$openid.'"><h2>下一页</h2></a>
					</li>');
			}

		}

	}
		//显示全部条数目
	echo('
	<div align="center">
	总数：'.$numoflist.'条  当前：'.$limitHead1_sum_head.' - '.$limitHead1_sum_end.' </div>
	');

}
function makeList($data,$class){
	while ($val =  mysql_fetch_array($data)){//编列列表
	//传递店面名，name
		echo('
		<li class="only4">');

			if ($_GET['class']=="sell") {

				echo('<a href="item.php?id='.$val['id'].'">');
				echo('
						<div class="img">'.picicon($val['picture01']).'</div>
						<h2>'.$val['name'].'</h2>
						<p class="onlyheight">此货品'.statue($val['status']).' 发布于:'.$val['time'].'</p>
						<span class="icon"></span>
						</a>
						</li>
						');

			}else if ($_GET['class']=="buy") {

				echo('<a href="item_buy.php?id='.$val['id'].'">');
				echo('
						<div class="img">'.picicon($val['picture01']).'</div>
						<h2>'.$val['name'].'</h2>
						<p class="onlyheight">此货品'.statue_buy($val['status']).' 发布于:'.$val['time'].'</p>
						<span class="icon"></span>
						</a>
						</li>
						');				

			}
}
}
function picicon($a){
	if (!empty($a)) {

		$file_name_url = explode("/", $a);

		//var_dump($file_name_url);

		$file_name_url = $file_name_url[count($file_name_url)-1];

		//var_dump($file_name_url);

		$new_file_name = 'nail.'.$file_name_url;

		$a = 'http://yyqn-itemsimage.stor.sinaapp.com/'.$new_file_name;

		return "<img src='".$a."' >";
	}else{
		return "<img src='item.jpg' >";
	}
}

function statue($a){
	if ($a) {
		# code...
		return "<span style='color:red'>正在销售</span>";
	}else{
		return "<span style='color:blue'>已下架</span>";
	}
}
function statue_buy($a){
	if ($a) {
		# code...
		return "<span style='color:red'>正在招募</span>";
	}else{
		return "<span style='color:blue'>已取消</span>";
	}
}
?>
</ul>
</div>
  <div class="copyright"  >玉医青年·团委 || 和谐环境·你我共创</div> 
   </body>
</html>