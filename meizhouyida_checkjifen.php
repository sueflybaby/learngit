<?php

include_once("conn.php");

$daan = "a";//定义答案

$score = 3;//定义加分分值

$n = 0;//计数

$get_user = mysql_query("select user from meizhouyida_chisu where xuanze = '$daan'");

//var_dump("获取所有正确答案的列表：".$get_user);

if (mysql_num_rows($get_user)>0) {	//判断是否有人答对题目

	while ($row = mysql_fetch_array($get_user)) {
		
		$value = $row["user"];
		
		echo("获得答案列表中的openid：".$value."<br>");

		echo "他/她的姓名为：";
		echo checkname($value)."<br>";

		$jifen = mysql_query("select * from jifen where user like '%$value%' limit 1");

		if (mysql_num_rows($jifen)>0) {

			while ($val = mysql_fetch_array($jifen)) {

				$jifen_result = intval($val['meizhouyida_score']) + $score;

				mysql_query("UPDATE jifen SET meizhouyida_score='$jifen_result' WHERE user like '%$value%'");

				$n++;

				echo "正在添加第".$n."次积分！<br><br>";

			}
		}else{
			$n++;
			mysql_query("INSERT INTO jifen(user,meizhouyida_score) VALUES('$value','$score')");
			echo "在第{$n}次的时候创建了{$value}的积分！<br>";
		}

	}

		echo "总共执行了".$n."次添加！";

}else{

		echo "<p>没有一人答对题目。</p>";

}

function checkname($openid){
		$createtime = date("d F Y ");
		$get_nickname = mysql_fetch_row(mysql_query("select nick from nickname where openid like '%$openid%' "));
		$nickname = $get_nickname[0];
		if (!empty($get_nickname)) {
			if(empty($nickname)){
				$get_nickname = mysql_fetch_row(mysql_query("select yes from user where openid like '%$openid%' "));
				$nickname = $get_nickname[0];
					if(empty($nickname)){
						echo "none";
					}else{
						echo $nickname;
					}
			}else{
			echo $nickname;
			}
		}else{
			mysql_query("insert into nickname(nick,createtime,openid) values ('','$createtime','$openid') ");
			echo "none";
		}
		

}

?>