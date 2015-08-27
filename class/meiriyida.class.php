<?php

class Meiriyida 
{ 



    public function responseMsg($username) 
    { 
		$extraScore = 10;//连续答对获得10分
		
		include_once("conn.php");//导入连接文件
 
		$my_t=getdate(date("U"));//获取日期信息从 Unix 纪元（January 1 1970 00:00:00 GMT）开始至今的秒数
		//获取当前月份1-12月
		$currentMonth = date("n");
		//获取服务器存储的月份
		$month_clear = mysql_fetch_array(mysql_query("select * from day where user like 'month'"));
		$monthStoredInService = $month_clear['date'];
		//接下来判断是否匹配日期
		if ($currentMonth != $monthStoredInService){//不匹配
			//更新月份到本月
			mysql_query("UPDATE day SET date='$currentMonth' WHERE user='month'");
			//备份上月的数据 everydayOfMonthCheck
			$newTableName = "everydayOfMonthCheck_backup_".$date("Y")."_".$currentMonth;//everydayOfMonthCheck_backup_2015_8
			mysql_query("CREATE $newTableName SELECT * FROM everydayOfMonthCheck");
			//统计数据
				//01添加积分表<--判断是否连续一月答题并答对，是 加分 否 不加分 （添加临时布尔类型存储是否全部答对）只生效当月第一天
				//02同时更新月度统计表
				$getDataFrom_everydayOfMonthCheck_query = mysql_query("select * from everydayOfMonthCheck");
				while($getDataFrom_everydayOfMonthCheck = mysql_fetch_array($getDataFrom_everydayOfMonthCheck_query)){
					for ($x=1; $x<=date("t"); $x++){//遍历每行获取的数据,当月天数最大值
						$dx = "d".$x;
						$dui = 0;
						$cuo = 0;
						$weida = 0;
						if ($getDataFrom_everydayOfMonthCheck[dx] = "0"){
							$weida++;
						}else if ($getDataFrom_everydayOfMonthCheck[dx] = "1"){
							$dui++;
						}else{
							$cuo++;
						}
						
					}
					//已经遍历统计好对错及未答
					//更新everyMonthRecord
					$openid = $getDataFrom_everydayOfMonthCheck["openid"];
					mysql_query("INSERT INTO everyMonthRecord SET openid='$openid',yuefeng='$currentMonth',dui=$dui,cuo=$cuo,weida=$weida");
					//判断是否全部答对 是者更新数据到积分表 jifeng 是否全部答对:$weida
					if (!$weida){//weida为空 反之为正 表示全部答对
						$chaxunjifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$openid%'"));
						$chaxunjifen['meiyueqiandao_score'] += $extraScore;
						mysql_query("UPDATE jifen SET meiyueqiandao_score=$chaxunjifen WHERE user like '%$openid%'");
					}
				/* 	if (!$weida){//weida为空 反之为正 表示全部答对
						$strReturn = "恭喜您，在".$currentMonth."月份全部参与答题并答对了，获得".$extraScore."积分！"
					}else{
						$strReturn = "很遗憾，在".$currentMonth."月份全部参与了".($dui+$cuo)."天，答对".$dui."天，无法获得奖励积分！"
					} */
				}
			//清空数据
			mysql_query("TRUNCATE TABLE everydayOfMonthCheck");
		}
		
		
		
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