<?php
require_once("conn.php");
$name = $_GET["name"];//传递店面
$name =urldecode($name);//纠正编码，中文可以显示。
$get_data =mysql_query("select * from waimai where name like '{$name}'");//查询
$val =  mysql_fetch_array($get_data);//编列列表
echo "<title>".$val['name']." 号码由玉环县人民医院团委提供</title>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<base href="http://yyqn.sinaapp.com/waimai/" />
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0;">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta charset="utf-8">
<style>
#main{
	position: absolute;
	left:50%;
}
#subview{
	position: relative;
	margin-left: -50%;
}
.copyright{
padding:8px;text-align:center;font-size:14px;color:#666;
	position: relative;
	margin-left: -100%;
}
.icon{
	color: blue;
	font-weight: bold;
}
.img{
    width:30%;
    height:30%;
}
.title{
	text-shadow: 1px 0px 3px black;
	color: red;
}
.line{
	border: 1px dashed rgba(0,0,0,0.62);
}

</style>
</head>
<body>
 <div id="main">

<?php
//传递店面名，name
echo('
<div id="subview">
<h2 class="title">'.$val['name'].'</h2>
<hr class="line">
<p>详细资料</p>
<span class="icon">电话：</span><span>'.exist($val['telephone']).'</span><br>
<div><span class="icon">地址</span>：'.exist($val['address']).'</div><br>
<div><span class="icon">备注</span>：'.exist($val['note']).'</div>
<hr class="line">
<p class="onlyheight">图文菜单：</p>
<div><img src="'.existpic($val['picture']).'" onload="if(this.width>320){this.width=320}" ></div>
<div><img src="'.existpic($val['picture02']).'" onload="if(this.width>320){this.width=320}" ></div>
</div>
		');

function exist($a){ //判断是否提供了内容
	if(!empty($a)){
		return $a;
	}else{
		return "未提供！";
	}
}
function existpic($a){ //判断是否提供了内容
	if(!empty($a)){
		return $a;
	}else{
      return "none.jpg";
	}
}
?>

  <div class="copyright"  >玉环县人民医院团委</div> 
 </div>
 </body>
</html>

