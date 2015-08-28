<?php
class Daan
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
			//查询数据库内容，并赋值
			//echo %$fromUsername%."<br>". $keyword."<br>". $abc;
			$jieguo = mysql_fetch_array(mysql_query("select * from chisu WHERE user like '%$fromUsername%'"));

			$chisu_result = $jieguo['data'];
			$tihao = $jieguo['timuid'];

			$chaxun_daan = mysql_fetch_array(mysql_query("select * from timu WHERE id like '$tihao'"));
			$huida = strtolower($chaxun_daan['daan']);
			$chaxunchisu = mysql_fetch_array(mysql_query("select * from chisu where user like '%$fromUsername%'"));
			//$chaxunMonthScore = mysql_fetch_array(mysql_query("select * from chisu where user like '%$fromUsername%'"));
			$chisu_result =$chaxunchisu['data'];
			$chisu_result =$chisu_result +1;
			          //次数累加
			$chaxunjifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
			$updata_chisu = mysql_query("UPDATE chisu SET data='$chisu_result' WHERE user like '%$fromUsername%'");//更新次数

			$numberOfDayOfMonth = "d".date("j");//当前为当月的天数，dx d1 d2 d3
			if($chisu_result > 2){
            	$contentStr = "您好，今天次数已满！明天别忘了哦。";
            	return $contentStr;
			}elseif(($chisu_result <=2) && ($huida == $abc)){
				$jifen_result =$chaxunjifen['score']+1;//若正确则正积分累计一分
              	$updata_jifen = mysql_query("UPDATE jifen SET score='$jifen_result' WHERE user like '%$fromUsername%'");//更新次数
                //更新everydayOfMonthCheck积分
               
                mysql_query("UPDATE everydayOfMonthCheck SET '$numberOfDayOfMonth' = '1' WHERE openid like '%$fromUsername%'");//为空则自动插

            	$contentStr = "答对了，亲！真厉害，感谢青们的不离不弃！《玉医小店》货品定期更新哦。";
            	return $contentStr;

            }elseif(($chisu_result <=2) && ($huida != $abc)){
            	$wrong_result = $chaxunjifen['wrong']+1;//若错误则错误记录累计一次
              	mysql_query("UPDATE jifen SET wrong='$wrong_result' WHERE user like '%$fromUsername%'");//更新错误次数
                mysql_query("UPDATE everydayOfMonthCheck SET '$numberOfDayOfMonth' = '2' WHERE openid like '%$fromUsername%'");//为空则自动插
                $contentStr = "答错了亲，明天继续努力哟！"."正确答案是：".strtoupper($huida)."。\n若您发现有答案错误,请告知我们！"; 
                return $contentStr; 
  			}
		}else{
			return "答案为空，类似格式“答案A”（不含引号）。";
		}
}
}
?>