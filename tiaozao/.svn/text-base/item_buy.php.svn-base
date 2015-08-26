<?php
	require_once("conn.php");
	$num = $_GET["id"];
	//$openid = $_GET["openid"];//获取评论者openid
	$raw_data = mysql_fetch_array(mysql_query("select * from tiaozao_items_buy where id = $num"));//item的表
	$raw = $raw_data['openid'];
	$raw_nickname = mysql_fetch_array(mysql_query("select * from nickname where openid like '%$raw%'"));//用户表
?>
<!DOCTYPE html manifest="/m.manifest">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>需求详情</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" type="text/css" href="style/style01.css" />
<link rel="stylesheet" type="text/css" href="../style/normal.css" />
<script type="text/javascript" src="../js/jquery.1.9.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script src="../js/jquery.pjax.js"></script>
<script src="../js/weixin.js"></script>
</head>
<body>
<div id="ui-header">
    <div class="fixed">
        <a class="ui-title" id="popmenu">需求详情</a>
        <a class="ui-btn-left_pre" href="javascript:history.back(-1);"></a>
            </div>
</div>	
<div class="container">
		  
<style>
#bg{width:100%; height:100%; top:0; left:0; position:absolute; filter: Alpha(opacity=8); opacity:0.8; display:none; background: url(http://www.tongdaohui.com/public/themes/newstyle/sharing.png) no-repeat #000 center 80px;}
h3{ border-bottom:1px solid #ddd; line-height:25px; font-size:16px; font-weight:normal;}
tr{ height:15px;}
.roadshow_body{ background:#f9f9f9; padding:10px; border-radius:5px;}
.roadshow_body h2{ margin-bottom:10px; color:#000; font-weight:normal;} 
.roadshow_body p{ line-height:180%; word-wrap:break-word;}
.roadshow_body img{ max-width:100%; text-align:center; margin-bottom:2px;}
.clr{ clear:both; height:0; overflow:hidden;}
.apply_button, .post_button, .post_button2, .post_button3, .manage_button{width:100%; height:36px; line-height:36px; display:block; margin: 0 auto; border: solid 1px #ddd;  font-size:16px; -moz-border-radius: 5px;-webkit-border-radius: 5px; border-radius:5px; background:#5cb248; border:solid 1px #459830; color:#fff; text-align:center; text-shadow:none;}
.common_button, .common_button2{width:100%; height:36px; line-height:36px; display:inline-block; border: solid 1px #ddd;  font-size:16px; -moz-border-radius: 5px;-webkit-border-radius: 5px; border-radius:5px; background:#5cb248; border:solid 1px #459830; color:#fff; text-align:center; text-shadow:none;}
.common_button2{background:#63a2cf; border-color:#2373a5; width:46%;}
.post_button, .post_button2, .btn_weixin_share, .manage_button{ color:#fff; background:#ff9933; border:solid 1px #dd8405; margin-top:10px;}
.post_button2{background:#63a2cf; border-color:#2373a5;}
.btn_weixin_share{ background:#5cb248; border-color:#459830;}
.manage_button{ background:#63a2cf; border-color:#2373a5;}

#join_bar a{ display:inline-block; padding:10px 15px; background:#5cb248; border:solid 1px #459830; color:#fff; text-align:center; text-shadow:none;}
#join_bar a.one{ width:80%;}
#join_bar a.fl, #join_bar a.fr{ width:35%;}
#join_bar a.fl{ float:left; margin-left:10px;}
#join_bar a.fr{ float:right; margin-right:10px;}
.title_wrap{ /*position:relative;*/}
.reward_sign{display:block; background: url(http://www.tongdaohui.com/public/themes/newstyle/mobile/images/reward_sign.png) 0 0 no-repeat; width:93px; height:55px; /*position:absolute; right:0; top:0;*/}
.reward_tip{ text-align:center; padding:0; margin:0;}
/*.reward_sign a{ width:93px; height:55px; }*/
.copyright{
  text-align:center;font-size:12px;color:#666;
}
</style>

	<div class="roadshow_body">
<h3>
    <?php 

  echo "<h1>".$raw_data["name"]."</h1><br>";

?>

</h3>          
<div><div class="roadshow_service">
  发布者：
<?php echo "<span style='color:blue'>".$raw_nickname["nick"]."</span>"; ?>
</div></div>
<div><div class="roadshow_service">
联系方式：
<?php echo "<span style='color:blue'>".$raw_nickname["contact_telephone"]."</span>"; ?>
</div></div>
<p></p>
  <p></p>


		          <div id="content_act">      
         <h3>详细介绍</h3>
		<p>
    <p>
     &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $raw_data["details"]; ?>
		 
</p>
<p>
	<br />
</p>		</p>
                </div>
        	                                    
        <div id="join_panel" style="text-align:center; width:100%; margin:10px 0;">
                   
            </div>

              <p></p>	</div>
              <p></p> 
              <p></p> 
<div class="copyright">
    玉医青年·团委
  </div>
</body>

</html>
