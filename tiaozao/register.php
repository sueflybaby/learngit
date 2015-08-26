<?php
  require_once("conn.php");
  if (isset($_GET['id'])) {
    $num = $_GET['id'];
  }
  if (isset($_GET['openid'])) {
    $openid = $_GET['openid'];
  }else{
    $openid='';
  }
  //echo $id;
  if (isset($num)) {
    $raw_data = mysql_fetch_array(mysql_query("select * from tiaozao_items where id = $num"));//item的表
    $name = $raw_data['name'];
    $price = $raw_data['price'];
    $details = $raw_data['details'];
    $stat = $raw_data['status'];
  }else{
    $name = '';
    $details = '';
    $stat = 1;
    $price = '';
  }

?>
<!DOCTYPE html manifest="/m.manifest">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>物品发布</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" type="text/css" href="style/style01.css" />
<script type="text/javascript" src="js/jquery.1.9.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script src="js/jquery.pjax.js"></script>
<script src="js/weixin.js"></script>
    <script>
        function save() {
          document.getElementById("btn").disabled = true;
            var contact_user = document.getElementById("name").value;
            var nickname = document.getElementById("price").value;
            if (isNaN(nickname)){
        alert('价格非法');
        return false;
      }
            if (nickname == '' || contact_user == '') {
                alert('有未填项');
                return false;
            }
        }
    </script>
<style type="text/css">
.copyright{
  text-align:center;font-size:12px;color:#666;
}
</style>
</head>
<body>
<div id="ui-header">
    <div class="fixed">
        <a class="ui-title" id="popmenu">物品发布</a>
        <a class="ui-btn-left_pre" href="javascript:history.back(-1);"></a>
        <a class="ui-btn-right_home"  href="index.php?class=sell&openid=<?php echo $openid; ?>"></a>
             </div>
</div>	
<div class="container">

		<div class="form_apply">  
		<form id="FormNewEvent" name="FormNewEvent"  action="insert.php" target="_self" method="post" enctype="multipart/form-data" onsubmit="return save()">

		<div class="form-group">
        
        <input type="text" name="openid" hidden ="true" value="<?php echo $openid; ?>" />
        
        <input type="text" name="id" hidden='true' value="
        <?php  if (isset($num)) {
          echo $num; 
        } 
        ?>" />

           	 <label for="item_name">物品：</label>
              <input class="form-control input-lg" type="text"  name="name" id="name" value="<?php echo $name; ?>"  placeholder="严禁使用英文标点及空格">
        </div>
        
        <div class="form-group">
           	 <label for="item_name">价格：</label>
              <input class="form-control input-lg" type="text" name="price" id="price" value="<?php echo $price; ?>" placeholder="价格">
        </div>
        
        <div class="form-group">
               <label for="item_desc">描述详情：</label>
             <textarea class="form-control input-lg" style="height:150px;" name="details" id="details" value="" placeholder="建议在有WIFI下上传图片。安卓系统请先拍照。" ><?php echo $details; ?></textarea>
        </div>	

				
					   
				   <div data-role="form-group">
				   <label for="slider2">是否上架:</label>
                   <select name="select" id="select" class="form-control input-lg" >
                        <option value="1">上架</option>
                        <option value="0" <?php if (!$stat) {echo "selected = 'selected'";} ?>>下架</option> 
                   </select>					
				</div>
				   
			<div data-role="fieldcontain" style="margin-top:20px;">
                
	       <input class="btn btn-default btn-lg btn-block" style="margin-top:20px;" type = "file" name="myfile" size="20" value="上传图片" />
         <input type="hidden" name="MAX_FILE_SIZE" value="3000000">

				   <div class="div_tishi" id="e_EventMobile"></div></div>
			   <button type="submit" class="btn btn-success btn-lg btn-block" id="btn" style="margin-top:20px;">发布</button>
           </form>
           <a href="<?php 
    if (isset($_GET['openid'])) {
      $openid = $_GET['openid'];
      echo "http://yyqn.sinaapp.com/personal/register.php?openid=".$openid; 
    }
    
  ?>"><button type="button" class="btn btn-default btn-lg btn-block">实名登记</button></a>
		    
		</div>
    <div class="copyright">
    玉医青年·团委
  </div>
	</div>
</div>

</body>
</html>