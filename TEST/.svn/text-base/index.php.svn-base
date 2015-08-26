<?php
session_start();
include_once('saestorage.class.php');

?>

<html>

	<body>
		<form action="index.php" method="post" enctype="multipart/form-data">
			<input type = "file" name="myfile" size="100" /><br>
			<input type = "submit" value= "upload" / >
		</form>
	</body>
</html>

<?php
$domain="itemsimage";
$file_name = $_FILES["myfile"]["name"];
$temp_arr = explode(".", $file_name);
$file_ext = array_pop($temp_arr);
$file_ext = trim($file_ext);
$file_ext = strtolower($file_ext);
$new_file_name = date("YmdHis") . '_' . rand(10000, 99999).'.'.$file_ext;
$s = new SaeStorage();
//$s->upload( 'imagefile',$_FILES["myfile"]["name"],$_FILES["myfile"]["name"]);
echo $aimage=$s->upload( 'itemsimage',$new_file_name,$_FILES["myfile"]["tmp_name"]);
echo md5("123456");
?>