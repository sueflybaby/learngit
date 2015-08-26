<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>快乐大转盘</title>

</head>
<body>
<?
		require_once("conn.php");

        	$row_name = "oFzm9jsh3zeHX2-UttZS_todAdkI";
        	//print_r($row_name);
        	$keyword = mysql_query("select * from user where openid = '$row_name'");
        	$get_keyword = mysql_fetch_array($keyword);
        	
        	print_r($get_keyword);

        
        
        
	    echo($list);//Array ( [0] => 苏维杰 )
        
?>
</body>
</html>