<?php
class MeiZhouYiDa
{


    public function responseMsg($username,$daan)//接受用户信息并返回信息
    {
    
	    include_once("conn.php");

		$fromUsername = $username;
		$keyword = trim($daan);
		preg_match_all("/[a-eA-E]/",$keyword,$match01);
		$rematch01=$match01[0]; 
			foreach($rematch01 as $val){
			    $abc.=$val;
			}
		if(!empty($abc)){
				$abc = strtolower($abc);
				$jieguo = mysql_query("select * from meizhouyida_chisu WHERE user like '%$fromUsername%'");
			if (mysql_num_rows($jieguo)==0) {
					# code...
					mysql_query("INSERT INTO meizhouyida_chisu SET user='$fromUsername',xuanze = '$abc'");
					return "感谢您的参与，我们将在下期公布答案！";
			}else{
					return "您已提交了答案。无法重复提交。";
			}

		}else{
			return "您的选项不能为空。";
		}
}
}
?>