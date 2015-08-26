<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta charset="utf-8">
  <title>玉医积分排行榜</title>
  
<style type="text/css">
body{
	background-color: #ffae00;
}
#link{
	font-size: 22px;
}
.personal_cen{
    text-align: center;
    margin-left: 50%;
    padding: 0px;
}
.content{
	margin-left: -100px;
	width: 200px;
	text-align: center;
	padding: 0px;
	
	
}
.title{
	font-size: 20px;
	font-weight: bolder;
	text-shadow: 1px 1px 0px black;
	color: red;
	
}
td{
	text-shadow: 1px 0px 1px white;
}
</style>
</head>
<body>
<div class="personal_cen">
<table class="content">
<th colspan="3" class="title">玉医积分</th>
<tr><td colspan="3"><hr></td></tr>
<tr><td>排名</td><td>姓名</td><td>积分</td></tr>
<tr><td colspan="3"><hr></td></tr>
<?
		require_once("conn.php");
        $get_jifen = mysql_query("SELECT * FROM jifen");
        //$num = 0;
        $array_score = array();
        while($row = mysql_fetch_assoc($get_jifen)){
            //$num ++;
            $score_row = $row['score']+$row['join_score']+$row['meizhouyida_score'];//no used_score
        	$row_name =trim($row["user"]);

            $array_score[$row_name] = $score_row;//add end line
           // var_dump($array_score);

            }
        arsort($array_score);
      //  var_dump($array_score);
        $num = 1;
       while ($val = current($array_score)) {
            //print_r($row_name."\n");
            $val_name = key($array_score);
            $keyword = "select * from user where openid like '".$val_name."';";
            $keyword_nick = "select * from nickname where openid like '".$val_name."';";
            //echo $keyword;
            $get_keyword = mysql_fetch_assoc(mysql_query($keyword));
            $get_keyword_nickname = mysql_fetch_assoc(mysql_query($keyword_nick));
            echo("<tr><td>".$num."</td>");
            if($get_keyword){
                echo "<td>".$get_keyword["yes"]."</td><td>".$val."</td></tr>";
            }elseif($get_keyword_nickname){
                echo "<td>".$get_keyword_nickname["contact_name"]."</td><td>".$val."</td></tr>";
            }else{
                echo("<td>未知</td><td>".$val."</td></tr>");
            }
               
            next($array_score);
            $num ++;
        }

       
?>
<tr><td colspan="3"><hr></td></tr>
<tr><td colspan="3"><a id='link' href='./personal/register.php?openid=<? echo $_GET['openid']; ?>'>点我登记</a></td></tr>
</table>

</div>
<p align="center">玉医青年·团委</p>
</body>
</html>