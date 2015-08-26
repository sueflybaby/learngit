<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>物品查看</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>

<?php
	require_once("conn.php");
	$num = $_GET["id"];
	//$openid = $_GET["openid"];//获取评论者openid
	$raw_data = mysql_fetch_array(mysql_query("select * from tiaozao_items_request where id = $num"));//item的表
	$raw = $raw_data['openid'];
	$raw_nickname = mysql_fetch_array(mysql_query("select * from nickname where openid like '%$raw%'"));//用户表

	function existpic($a){ //判断是否提供了内容
		if(!empty($a)){
			echo "<img src='".$a."' onload='if(this.width>320){this.width=320}'>";
		}else{
	      echo "尚未提供图片";
		}
	}
?>

	<div class="head">
<?php 
if ($raw_data["status"]) {//真`红色
	echo "<span id='name'>".$raw_data["name"]."</span><br/>";
}else{//假·灰色
	echo "<span style='color:grey'><del>".$raw_data["name"]."</del></span> <span style='font-size:10px; color:red'>已下架</span>";
}
?>
	</div>
	<hr>
	<div class="content_title">
		<table class="table_title">
			<tr>
				<td align="left">发布者
				<?php echo "<span style='color:blue'>".$raw_nickname["nick"]."</span>"; ?>
				</td>
				<td align="right">联系方式
				<?php echo "<span style='color:blue'>".$raw_nickname["contact_telephone"]."</span>"; ?>
				</td>
			</tr>
		</table>
	</div>
	<hr>
	<div class="content_details">
	<h3>描述</h3>
	<p>
		<?php echo $raw_data["details"]; ?>
	</p>
	</div>
	<br>
	<div class="content_pics">
	
				<div class="content_pics_text">
				<?php 
				existpic($raw_data['picture01']); 
				?>
				</div>
			
	</div>
	<br>
	<div class="discuss">
	</div>
	<hr>
	<div class="copyright">
		玉医青年·团委
	</div>
	</body>
</html>