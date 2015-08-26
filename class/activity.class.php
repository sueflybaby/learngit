<?php

/**
* 
活动积分兑换，价格$price $openid
扣除积分
检查重复
oWtYttya38cZO2NEKihK_fD7G6lo
*/
include("conn.php");
class Activity
{
	private function check($id,$keyword){
		$request_check = mysql_fetch_array(mysql_query("select * from activity_check_name where check_str like '%$keyword%'"));
		$request_jifen_name = mysql_fetch_array(mysql_query("select * from jifen where user like '%$id%'"));
		var_dump($request_check);
		var_dump($request_jifen_name);
		if(!isset($request_check['check_str'])){
			mysql_query("INSERT INTO activity_check_name (openid,check_str) VALUES('$id','$keyword')");
			if (!isset($request_jifen_name['user'])) {
				mysql_query("INSERT INTO jifen (user) VALUES('$id') ");
			}

			return TRUE;			
		}else{
			return FALSE;
		}
	}
	
	public function jiajifen($id,$score,$keyword){
		if ($this -> check($id,$keyword)) {
			//$request_check_name = mysql_fetch_array(mysql_query("select * from activity_check_name where openid like '%$id%'"));
			$request_jifen_name_another = mysql_fetch_array(mysql_query("select * from jifen where user like '%$id%'"));
			var_dump($request_jifen_name_another["join_score"]);
			$score_jifen = $request_jifen_name_another["join_score"] + $score;
			var_dump($score_jifen);
			$add = mysql_query("UPDATE jifen SET join_score='$score_jifen' WHERE user like '%$id%'");//"UPDATE jifen SET score ='20' WHERE user like '%$id%'"
			var_dump($add);
			if (mysql_affected_rows()>0) {
				# code...
				return "成功兑换积分，感谢您积极参与活动！";
			}
			
			//var_dump($this->check($id));
		}else{
			return "此序列号已兑换积分，无法重复兑换！";
		}
	}

}

?>