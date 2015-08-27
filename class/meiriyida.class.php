<?php

class Meiriyida 
{ 



    public function responseMsg($username) 
    { 
    
		include_once("conn.php");//导入连接文件

		$my_t=getdate(date("U"));//获取日期信息
		//匹配day表格获取存储的日期参数
		$day_clear = mysql_fetch_array(mysql_query("select * from day where user like 'day'"));
		//判断日期是否匹配 不然的话更新日期并清空数据，以便继续记入数据。目前为day的参数
		if ($day_clear['date'] != $my_t[mday]){
		    $updata_day = mysql_query("UPDATE day SET date='$my_t[mday]' WHERE user='day'");//更新次数
		    $clear_chisu =  mysql_query("TRUNCATE TABLE chisu");
		}           
		//题库的操作 答题的操作＃＃＃＃＃＃＃
    $fromUsername = $username; 
    $time = time();       
          //查询次数及积分，如果均为空则在数据库中初始化                
	$chaxunchisu = mysql_fetch_array(mysql_query("select * from chisu where user like '%$fromUsername%'"));
	$chaxunjifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
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
			$updata_chisu = mysql_query("UPDATE chisu SET data='$chisu_result',timuid = '$row[0]' WHERE user like '%$fromUsername%'");
		}
		//题库的操作 答题的操作＃＃＃＃＃＃＃＃
    $resultStr = "请听题：\n".$row['timu']."\n【回复“答案+选项”例如“答案A”获取答案，每天最多1个积分，回答错误不加分！重复获取题目视为答题！】";
    return $resultStr; 


}         

} 

?>