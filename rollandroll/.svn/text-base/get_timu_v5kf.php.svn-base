<?php
$host=getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
$port = getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
$user=getenv('HTTP_BAE_ENV_AK');
$pwd=getenv('HTTP_BAE_ENV_SK');
$dbh=@mysql_connect("{$host}:{$port}",$user,$pwd);
mysql_select_db('LMdrTWNvUiMvJzxRAxaX');   
$my_t=getdate(date("U"));
$day_clear = mysql_fetch_array(mysql_query("select * from day where user like 'day'"));
if ($day_clear['date'] != $my_t[mday]){
    $updata_day = mysql_query("UPDATE day SET date='$my_t[mday]' WHERE user='day'");//更新次数
    $clear_chisu =  mysql_query("TRUNCATE TABLE chisu");
}           

                $fromUsername = $_GET['name']; 
                $time = time();       
          //查询次数及积分，如果均为空则在数据库中初始化                
	$chaxunchisu = mysql_fetch_array(mysql_query("select * from chisu where user like '$fromUsername'"));
	$chaxunjifen = mysql_fetch_array(mysql_query("select * from jifen where user like '$fromUsername'"));
	if (empty($chaxunjifen)){
		$charu_jifen = mysql_query("INSERT INTO jifen SET score=0,user='$fromUsername'");
	}
srand((double)microtime()*1000000);
$a=rand(1,437);
$result = mysql_query("select * from timu where id like '$a'");
          
$row = mysql_fetch_array($result);//访问获取数据
$chisu_result =$chaxunchisu['data'];
if (empty($chisu_result)){
$charu_chisu = mysql_query("INSERT INTO chisu SET data=1,user='$fromUsername',timuid = '$row[id]'");
}else{
 //每获取一次题目变次数累加1次
$chisu_result =$chisu_result +1;
$updata_chisu = mysql_query("UPDATE chisu SET data='$chisu_result',timuid = '$row[0]' WHERE user='$fromUsername'");
}

                    $resultStr = "请听题：\n".$row['timu']."\n【回复“答案+选项”例如“答案A”获取答案，亲。每天1个积分，回答错误不加分！】";
                    echo $resultStr; 



?>