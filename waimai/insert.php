<?php
//session_start();
//include_once('saestorage.class.php');
//获取提交的商店的信息
function default_post($keyword,$label){
	$default_keywords = array('author' => "小编", 'note' =>'尚无详细','ord'=>'100');
	if (empty($keyword)) {
		return $default_keywords[$label];
	}
}

$shop_name = trim($_POST['name']);//店面的名字
$shop_author = default_post($_POST['author'],'author');//提供的作者

//$shop_author = trim($_POST['author']);//提供的作者

$shop_class = trim($_POST['class']);//类别

$shop_address = trim($_POST['address']);//地址

$shop_telephone =  trim($_POST['telephone']);//电话号码

//$shop_note = trim($_POST['note']);//备注
$shop_note = default_post($_POST['note'],'note');//备注

$shop_picture = trim($_POST['picture01']);//照片1

$shop_picture02 = trim($_POST['picture02']);//照片2

//$shop_ord = intval(trim($_POST['ord']));//顺序排列
$shop_ord = intval(default_post($_POST['ord'],'ord'));//顺序排列

require_once("conn.php");
//$update_str = "UPDATE waimai SET author='$shop_author',class='$shop_class', name='$shop_name',address='$shop_address',telephone='$shop_telephone',note='$shop_note',picture='$shop_picture',picture02='$shop_picture02', ord=$shop_ord";
$insert_str = "INSERT INTO waimai SET (author,class,name,address,telephone,note,picture,picture02,ord) VALUES($shop_author,$shop_class, $shop_name,$shop_address,$shop_telephone,$shop_note,$shop_picture,$shop_picture02, $shop_ord)";

$did_insert = mysql_query($insert_str);

if ($did_insert) {
	# code...
	echo "<p>插入成功</p>";
}else{
	echo "<p>插入失败</p>";
}



?>