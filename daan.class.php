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
			if(empty($abc)){
			    $abc="x";
			}
$abc = strtolower($abc);
//查询数据库内容，并赋值
//echo %$fromUsername%."<br>". $keyword."<br>". $abc;
$jieguo = mysql_fetch_array(mysql_query("select * from chisu WHERE user like '%$fromUsername%'"));

$chisu_result = $jieguo['data'];
$tihao = $jieguo['timuid'];

$chaxun_daan = mysql_fetch_array(mysql_query("select * from timu WHERE id like '$tihao'"));
$huida = strtolower($chaxun_daan['daan']);
$chaxunchisu = mysql_fetch_array(mysql_query("select * from chisu where user like '%$fromUsername%'"));
$chisu_result =$chaxunchisu['data'];
$chisu_result =$chisu_result +1;
          //次数累加
$chaxunjifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
$jifen_result =$chaxunjifen['score']+1;
$wrong_result = $chaxunjifen['wrong']+1;
$updata_chisu = mysql_query("UPDATE chisu SET data='$chisu_result' WHERE user like '%$fromUsername%'");//更新次数


				if($chisu_result > 2){
                	$contentStr = "您好，今天次数已满！明天别忘了哦。";
                	return $contentStr;
				}elseif(($chisu_result <=2) && ($huida == $abc)){
                  $updata_jifen = mysql_query("UPDATE jifen SET score='$jifen_result' WHERE user like '%$fromUsername%'");//更新次数
                	$contentStr = "答对了，亲！真厉害，您目前的积分是".$jifen_result."，感谢青蟹们的配合。";
                	return $contentStr;

                }elseif(($chisu_result <=2) && ($huida != $abc)){
                  mysql_query("UPDATE jifen SET wrong='$wrong_result' WHERE user like '%$fromUsername%'");//更新错误次数
                    $contentStr = "答错了亲，明天继续努力哟！"."正确答案是：".strtoupper($huida)."。\n若您发现有答案错误,请告知我们！"; 
                    return $contentStr; 
      
	}
	}
}

?>