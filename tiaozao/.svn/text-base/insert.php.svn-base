<?php
session_start();
include_once('saestorage.class.php');
?>
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
</head>
<body>
<h2 align="center">
<?php

$name = check_input(trim($_POST['name']));

$price = trim($_POST['price']);

$details = trim($_POST['details']);

$select = trim($_POST['select']);

$openid =  trim($_POST['openid']);

if (isset($_POST['id'])) {

	$num = $_POST['id'];

}else{

	$num = 0;

}

require_once("conn.php");

$domain="itemsimage";

$file_name = $_FILES["myfile"]["name"];

$temp_arr = explode(".", $file_name);

$file_ext = array_pop($temp_arr);

$file_ext = trim($file_ext);

$file_ext = strtolower($file_ext);

$s = new SaeStorage();

$f = new SaeFetchurl();


if ($new_data === false) {
	# code...
	var_dump($img->errno(),$img->errmsg());
}
//只是实现了首次上传照片功能，1、无检查重复照片 和 2、二次修改照片后更新地址 3、无加入判定上传文件是否为照片功能 4、首次上传的照片将无id=null
//5、尚未判断照片是否有上传
$t=time();

$datestamp = date("m-d",$t);

$check_user = mysql_query("select * from nickname where openid like '%$openid%'");

//先判断是否为注册用户 ￥openid
//再判断是否已含有此项物品 ￥num
if (mysql_num_rows($check_user)>0) {

	if ($num==0) {//首次上传,创建条目

		$new_file_name = date("YmdHis") . '_' .$openid.'.'.$file_ext;
//文件名的唯一性

		$new_file_name_nail = 'nail.'.$new_file_name;
		//判断照片是否有上传,有 上传 无 地址为空
		if ($file_name) {
			//$s->upload( 'imagefile',$_FILES["myfile"]["name"],$_FILES["myfile"]["name"]);
			$aimage = $s->upload( 'itemsimage',$new_file_name,$_FILES["myfile"]["tmp_name"]);

			if ($aimage) {//如果上传成功返回地址栏，非false
				# code...
				$dose_complete = create_nails($new_file_name,$new_file_name_nail,$s,$f,$domain,$aimage);//创建nail文件

			}else{

				echo "<script>alert('图片上传失败！创建失败！');window.location='index.php?class=sell&openid=".$openid."'</script>";
				
				exit();

			}
		}

		if ($dose_complete) {
		
			$isDoneSuccess = mysql_query("INSERT INTO tiaozao_items (name,time,price,picture01,details,openid,status) values ('$name', '$datestamp', '$price','$aimage', '$details','$openid','$select')");
//插入图片项
		}else{

			$isDoneSuccess = mysql_query("INSERT INTO tiaozao_items (name,time,price,details,openid,status) values ('$name', '$datestamp', '$price', '$details','$openid','$select')");
//无插入图片项
		}

		if ($isDoneSuccess) {

			echo "<script>alert('发布成功！');window.location='index.php?class=sell&openid=".$openid."'</script>";
		
		}else{

			echo "<script>alert('发布失败！');window.location='index.php?class=sell&openid=".$openid."'</script>";

		}

	}else{//更新条目
		//判定是否已经包含了图片链接，包含就取出原本已存文件名，
		$check_image =mysql_fetch_array(mysql_query("select * from tiaozao_items where id = '$num'"));

		//var_dump($check_image);
		
		if (!empty($file_name)) {
			# code...
				if (!empty($check_image["picture01"])) {//原有已上传了图片
					# code...
					$file_name_url = explode("/", $check_image["picture01"]);

					//var_dump($file_name_url);

					$file_name_url = explode(".", $file_name_url[count($file_name_url)-1]);

					//var_dump($file_name_url);

					$new_file_name = $file_name_url[0].'.'.$file_ext;

					$new_file_name_nail = 'nail.'.$new_file_name;

				//$s->upload( 'imagefile',$_FILES["myfile"]["name"],$_FILES["myfile"]["name"]);
					$aimage=$s->upload('itemsimage',$new_file_name,$_FILES["myfile"]["tmp_name"]);
						if ($aimage) {
							# code...
							$dose_complete = create_nails($new_file_name,$new_file_name_nail,$s,$f,$domain,$aimage);
						}else{
							$dose_complete = false;
						}
					
					
					if ($dose_complete) {
						mysql_query("UPDATE tiaozao_items SET name = '$name',  price = '$price',details = '$details', status = '$select' WHERE id = '$num'");
					}else{
						echo "<script>alert('图片上传失败！');window.location='index.php?class=sell&openid=".$openid."'</script>";
						exit();

					}


				}else{//原有未上传图片

					$new_file_name = date("YmdHis") . '_' .$openid.'.'.$file_ext;//文件名的唯一性

					$new_file_name_nail = 'nail.'.$new_file_name;
					
					$aimage=$s->upload( 'itemsimage',$new_file_name,$_FILES["myfile"]["tmp_name"]);

					if ($aimage) {
						# code...
						$dose_complete = create_nails($new_file_name,$new_file_name_nail,$s,$f,$domain,$aimage);

					}else{

						$dose_complete = false;

					}
					
					if ($dose_complete) {

						mysql_query("UPDATE tiaozao_items SET picture01='$aimage', name = '$name',  price = '$price',details = '$details', status = '$select' WHERE id = '$num'");
					
					}else{

						echo "<script>alert('修改失败！');window.location='index.php?class=sell&openid=".$openid."'</script>";
						
						exit();

					}

				}

		}else{

				mysql_query("UPDATE tiaozao_items SET name = '$name',  price = '$price',details = '$details', status = '$select' WHERE id = '$num'");

		}

		echo "<script>alert('修改成功！');window.location='index.php?class=sell&openid=".$openid."'</script>";
		//echo $new_file_name."\n".$file_name_url;
		//var_dump($aimage);

	}


}else{

		echo "<script>alert('尚未实名登记！');window.location='index.php?class=sell&openid=".$openid."'</script>";

}

function create_nails($name,$name_nail,$s,$f,$domain,$aimage){

	$s = new SaeStorage();

	$f = new SaeFetchurl();

	$img_data = $f->fetch($aimage);

	$img = new SaeImage();

	$img->setData($img_data);

	$img->resize(400);

	$new_data = $img->exec('jpg');

	if ($new_data){

		$success = $s->write($domain,$name,$new_data);//写入用于显示的图片

	}

	if ($success) {//如果写入成功
		# code...
			$s_nail = new SaeStorage();

			$img_nail = new SaeImage();

			$img_nail->setData($img_data);

			$img_nail->resize(100);

			$new_data_nail = $img_nail->exec('jpg');

			$success_nail = $s_nail->write($domain,$name_nail,$new_data_nail);

			if ($success && $success_nail){//如果写入同时成功

				$result = true;

			}else{

				$result = false;

			}

	}

	return $result;


}

function check_input($value)
{
	if(preg_match("/[ '.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$value)){
    echo '不要包含些特殊符号！';
    exit();
  }
    // 去除斜杠
    if (get_magic_quotes_gpc())
    {
        $value = stripslashes($value);
    }
    // 如果不是数字则加引号
    //if (!is_numeric($value))
   // {
   //     $value = “‘” . mysql_real_escape_string($value) . “‘”;
   // }
    return $value;
}
?>
</h2>
</body>
</html>