<!DOCTYPE html manifest="/m.manifest">
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>商店发布</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" type="text/css" href="style/style01.css" />
<script type="text/javascript" src="js/jquery.1.9.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script src="js/jquery.pjax.js"></script>
<script src="js/weixin.js"></script>
<style type="text/css">
.copyright{
  text-align:center;font-size:12px;color:#666;
}
</style>
</head>
<body>
<div id="ui-header">
    <div class="fixed">
        <a class="ui-title" id="popmenu">商店发布</a>
    </div>
</div>  
<div class="container">

    <div class="form_apply">  
    <form id="FormNewEvent" name="FormNewEvent"  action="insert.php" target="_self" method="post" enctype="multipart/form-data" onsubmit="return save()">

    <div class="form-group">

             <label for="item_name">店名：</label>
              <input class="form-control input-lg" type="text"  name="name" id="name" value=""  placeholder="严禁使用英文标点及空格">
        </div>
        <div class="form-group">

            <label for="item_name">提供者：</label>
            <input class="form-control input-lg" type="text"  name="author" id="author" value=""  placeholder="严禁使用英文标点及空格">
        </div>

        <div data-role="form-group">
           <label for="slider2">类别:</label>
                  <select name="class" id="class" class="form-control input-lg" >
                        <option value="hezuo">合作</option>
                        <option value="biandang">便当</option>
                        <option value="mianshi">面食</option>
                        <option value="fanshi">饭食</option>
                        <option value="huoguo">火锅</option>
                        <option value="cafei">咖啡</option>
                        <option value="yangsheng">养生</option>
                        <option value="xiaochi">小吃</option>
                        <option value="caiping">菜品</option>
                  </select>          
        </div>

        <div class="form-group">
             <label for="item_name">电话号码：</label>
              <input class="form-control input-lg" type="text" name="telephone" id="telephone" value="">
        </div>

        <div class="form-group">
             <label for="item_name">排序：</label>
              <input class="form-control input-lg" type="text" name="order" id="order" value="100">
        </div>

        <div class="form-group">
               <label for="item_desc">地址：</label>
             <textarea class="form-control input-lg" style="height:150px;" name="address" id="address" value="" ></textarea>
        </div>  

        <div class="form-group">
               <label for="item_desc">描述详情：</label>
             <textarea class="form-control input-lg" style="height:150px;" name="note" id="note" value="" ></textarea>
        </div>  
        <div class="form-group">
               <label for="item_desc">照片01：</label>
             <textarea class="form-control input-lg" style="height:150px;" name="picture01" id="picture01" value="" ></textarea>
        </div>  
        <div class="form-group">
               <label for="item_desc">照片02:</label>
             <textarea class="form-control input-lg" style="height:150px;" name="picture02" id="picture02" value="" ></textarea>
        </div>  

         <button type="submit" class="btn btn-success btn-lg btn-block" id="btn" style="margin-top:20px;">发布</button>
           </form>

    </div>
    <div class="copyright">
    玉医青年·团委
  </div>
  </div>
</div>

</body>
</html>