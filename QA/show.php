<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>玉医青年《Q&A》展示网页</title>
<link href="show.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
    //connect database
require_once('conn.php');

//define openid
//getdata for person
$result = mysql_query("SELECT * FROM questAndAnswer where didpass=1");
$num=1;
while($row = mysql_fetch_array($result))
  {
     $num +=1;
     echo '
        <div id="area">
    <h1>1</h1>
    <p id="title">标题：'.$row["title"].'</p>
    <p id="nick">'.$row["name"].'</p>
    <div id="seperate"></div>
    <p id="content">'.$row["content"].'</p>
    </div>
    <div id="seperate"></div>
    <hr/>
     ';
}
?>

</body>
</html>