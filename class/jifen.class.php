<?php
include("conn.php");
//关闭连接
class JiFen 
{ 
   
    public function responseMsg($fromUsername) 
    { 
  
    
          $chaxunjifen = mysql_fetch_array(mysql_query("select * from jifen where user like '%$fromUsername%'"));
          $jifen_result =$chaxunjifen['score'];//访问获取数据
          $wrong_result =$chaxunjifen['wrong'];
          $join_score = $chaxunjifen['join_score'];
          $meizhouyida_score = $chaxunjifen['meizhouyida_score'];//获取每周一答的积分信息
          $total = intval($jifen_result) + intval($wrong_result);
          $lost = ((strtotime("today")-strtotime("13 November 2013"))/60/60/24 +1)-$total;
          $total_score = intval($jifen_result) + intval($join_score) + intval($meizhouyida_score) - intval($chaxunjifen['used_score']);
          if(!empty($chaxunjifen)){      
		  $contentStr = "亲！您目前【总积分】是".$total_score."\n您在【每日一答】活动中：\n答对".$jifen_result."题！\n答错".$wrong_result."题。\n参与【活动】获得了".$join_score."个积分。\n参与【每周读片】获得了".$meizhouyida_score."个积分。\n您已【使用】".$chaxunjifen['used_score']."分。\n亲！\n1、参加微信平台上发布的各项活动，获取相应积分；\n2、通过每日一答获取积分；\n3、向微信平台投稿并录用，获取积分。";
			}else{
		  $contentStr = "您还没参与到我们的活动中来，快快发送“每日一答”来参与答题！\n1、参加微信平台上发布的各项活动，获取相应积分；\n2、通过每日一答获取积分；\n3、通过每周读片获取积分；\n4、向微信平台投稿并录用，获取积分。";
			}
          return $contentStr; 
      }
          

}         
?>