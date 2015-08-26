
<!DOCTYPE html> 
<html> 
    <head> 
        <title>报名申请</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta charset="utf-8">
        <style type="text/css">
        body{
            background-color:rgba(218,190,76,0.62);
        }
        .personal_cen{
            text-align: center;
        }
        #tips{
	        font-size: 12px;
	        text-align: center;
        }
#copyright{
	font-weight:bolder;
	font-size: 12px; 
}
          #beizu{
            font-size: 8px;
            text-align: center;
          }

        </style>
        
        <script>
            function save() {
                var contact_user = document.getElementById("name").value;
                var nickname = document.getElementById("telephone").value;
                if (nickname == '' || contact_user == '') {
                    alert('有未填项');
                    return false;
                }
            }
        </script>
    </head> 
    <body> 

                <h2 align="center">元旦爬山申请表</h2>
                <div class="admin">
            <div class="personal_cen">

                <form action="insert.php" method="get" onsubmit="return save()">


                    <p>姓名(*)：<input id="name" class="name" name="name" type="text" value=""></p>

                    <p>携带人员：<input name="num" type="text" value=""></p>
                  <p id="beizu">注：若有携带人员请填写具体姓名，以便统计。</p>

                    <p>电话(*)：<input id="telephone" class="telephone" name="contact" type="text" value=""></p>


                    <p><input type="submit" value="确认提交"  /></p>
                </form><div id ='tips'>
                出发时间：2014-1-1 凌晨5：20<br>
集合地点：玉环县中医院急诊室门口<hr style="border:1px dashed" />
              <div id ="beizu">PS：参加活动人员均可获得《玉医青年》5个积分点。积分点可在未来推出的商城中兑换礼品。</div>
                </div>
                <div style="clear:both"></div>

               <div id='copyright'><hr>玉医青年·团委           </div>
               </div>
    </body>
</html>