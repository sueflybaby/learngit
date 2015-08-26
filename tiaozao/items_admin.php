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
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" type="text/css" href="style/style01.css" />
<script type="text/javascript" src="js/jquery.1.9.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script src="js/jquery.pjax.js"></script>
<script src="js/weixin.js"></script>
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
 <div id="ui-header">
    <div class="fixed">
        <a class="ui-title" id="popmenu">我的发布</a>
        <a class="ui-btn-left_pre" href="javascript:history.back(-1);"></a>
             </div>
</div>	
 <div id="todayList">
<ul  class="todayList">



<?php
require_once("conn.php");

if (!empty($_GET["openid"])) {

	$openid = $_GET["openid"];

	//echo $openid;

	$get_data =mysql_query("select * from tiaozao_items where openid like '%$openid%' ORDER BY id DESC");//查询

	$get_data_buy =mysql_query("select * from tiaozao_items_buy where openid like '%$openid%' ORDER BY id DESC");//查询

	$list0fitems = array();

	while ($val = mysql_fetch_array($get_data)) {
		# code...
		array_push($val, "sell");
		array_push($list0fitems, $val);

	}

	while ($val = mysql_fetch_array($get_data_buy)) {
		# code...
		if ($val["picture02"]==1) {
			# code...
			array_push($val, "request");
		}else{
			array_push($val, "buy");
		}
			array_push($list0fitems, $val);

	}


	//print_r($list0fitems);

	$numoflist = count($list0fitems);

	//echo $numoflist;
	if ($numoflist) {

		//显示全部条数目
		echo('
		<div align="center">
		目前总数：'.$numoflist.'条</div>
		');


			for ($i=0; $i < ($numoflist); $i++) { 
				if (array_search("sell", $list0fitems[$i])) {
					# code...
				echo('
					<li class="only4">
					<a href="register.php?id='.$list0fitems[$i]['id'].'&openid='.$list0fitems[$i]['openid'].'">
					<div class="img"><img src="item.jpg" ></div>
					<h2>'.$list0fitems[$i]['name'].'</h2>
					<p class="onlyheight">'.statue($list0fitems[$i]['status']).' '.picicon($list0fitems[$i]['picture01']).'</p>
					<span class="icon">&nbsp;</span>
					<div class="clr"></div>
					</a>
					</li>
				');

			}
				if (array_search("buy", $list0fitems[$i])) {
					# code...
				echo('
					<li class="only4">
					<a href="register_buy.php?id='.$list0fitems[$i]['id'].'&openid='.$list0fitems[$i]['openid'].'">
					<div class="img"><img src="item.jpg" ></div>
					<h2>'.$list0fitems[$i]['name'].'</h2>
					<p class="onlyheight">'.statue($list0fitems[$i]['status']).' '.picicon($list0fitems[$i]['picture01']).'</p>
					<span class="icon">&nbsp;</span>
					<div class="clr"></div>
					</a>
					</li>
				');

			}
				if (array_search("request", $list0fitems[$i])) {
					# code...
				echo('
					<li class="only4">
					<a href="register_request.php?id='.$list0fitems[$i]['id'].'&openid='.$list0fitems[$i]['openid'].'">
					<div class="img"><img src="item.jpg" ></div>
					<h2>'.$list0fitems[$i]['name'].'</h2>
					<p class="onlyheight">'.statue($list0fitems[$i]['status']).' '.picicon($list0fitems[$i]['picture01']).'</p>
					<span class="icon">&nbsp;</span>
					<div class="clr"></div>
					</a>
					</li>
				');

			}
		}

	}else{
		echo "<h2 align='center'>没有条目</h2>";
	}
}
function picicon($a){
	if (!empty($a)) {
		return "<span style='color:red'>含有图片</span>";
	}else{
		return "<span style='color:grey'>不含图片</span>";
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