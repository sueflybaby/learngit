<?php
//功能是提供大转盘的兑换，目前是加积分2，且只有一个奖项

$wechatObj = new wechatCallbackapiTest();
$wechatObj->responseMsg();
class wechatCallbackapiTest
{

    public function responseMsg()
    {


                $keyword = trim($_GET['quan']);
                $fromUsername =$_GET['name'];
         		require_once('conn.php'); 
           preg_match_all("/[A-Za-z0-9]/",$keyword,$match01);
		   $select=$match01[0]; 
		   foreach($select as $val){
  			  $abc.=$val;
			}
          $item = substr($abc, 4, 2);
          //创建时间记录
           $t=time();
       	   $datestamp = date("Y-m-d H:i:s",$t);
          //更新历史列表
          $checklist = mysql_fetch_array(mysql_query("select * from shop_history where secret = '{$abc}'"));
          if(!empty($checklist) && $checklist['used']=="NO"){
          mysql_query("UPDATE shop_history SET used = 'YES', usedtime='{$datestamp}' WHERE secret = '{$abc}'");
          //获取积分
          $result_jifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
            if($item == "04"){
            $score_changed = $result_jifen['score'] + 4;//增加积分量
            }elseif($item == "01"){
            $score_changed = $result_jifen['score'] + 1;//增加积分量
            }
       	  $score = "\n您原有积分为：".$result_jifen['score']."\n现有可兑换积分为：".$score_changed;
            mysql_query("UPDATE jifen SET score ='{$score_changed}' WHERE user like '%$fromUsername%'");//更新已增加积分
          //定义
          $items = "您已成功兑换！";
		  $pa =$items.$score;

          }elseif(empty($checklist)){
            $pa = "您输入的兑换码有误！";
          }elseif($checklist['used']=="YES"){
            $pa = "您的兑换码已兑换！";
          }
          $contentStr = $pa;
          $resultStr = $contentStr;
          echo $resultStr;
        }

}
?>