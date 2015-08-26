
<!DOCTYPE html> 
<html> 
    <head> 
        <title>个人中心</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta charset="utf-8">
<script>
            function save() {
                var contact_user = document.getElementById("name").value;
                if (contact_user == '') {
                    alert('昵称为必填项');
                    return false;
                }
            }
        </script>
        <style type="text/css">
        body{
            background-color: #f9f5d7;
            margin: 0px;
            padding: 0;
            text-align: center;
        }
        .personal_cen{
            text-align: center;
        }
       #endpart{
			width:100%;
			position: fixed;
			bottom: 0;
			line-height:20px;
			color:#bababa;
			text-align:center;
			height: 25px;
			font-size:14px;
			border-top:1px dashed #CCC;
			background: red;
		}
		#beizu{
			font-size: 10px;
			color: gray;

		}
        </style>
    </head> 
    <body> 
<?php
$openid = check_input(trim($_GET['openid']));
if (isset($openid)) {
    # code...
    include("conn.php");
    $check = mysql_query("select * from nickname where openid like '%$openid%'");
    if (mysql_num_rows($check)>0) {
        $val = mysql_fetch_array($check);
    }
}
?>
                <h2 align="center">院内个人信息登记</h2>
                <span id="beizu">感谢您加入本平台，亲请速速扩散。</span>

                <div class="admin">
            <div class="personal_cen">

                <form action="insert.php" method="post" onsubmit="return save()">

                    <p>昵称：<input  id="name" class="name" name="nickname" type="text" value="<? echo $val["nick"]; ?>" ></p>


                    <p>姓名：<input name="contact_user" type="text" value="<? echo $val["contact_name"]; ?>"></p>
                    
                    <p>手机：<input name="contact_telephone" type="text" value="<? echo $val["contact_telephone"]; ?>"></p>

                    <p>科室：<input name="contact_keshi" type="text" value="<? echo $val["contact_keshi"]; ?>"></p>

                    <input type="text" hidden="true" name="openid" value="<? echo $openid; ?>" />
                    <input type="text" hidden="true" name="does" value="1" />
                    <p><input type="submit" value="提交"  /></p>
                </dl>
                </form>
                <div style="clear:both"></div>

                         </div>
               </div>
                <div id="endpart">玉医青年·团委</div>
    </body>
</html>
<?php
function check_input($value)
{
    // 去除斜杠
    if (get_magic_quotes_gpc())
    {
        $value = stripslashes($value);
    }
    // 如果不是数字则加引号
    //if (!is_numeric($value))
   // {
   //     $value = “‘” . mysql_real_escape_string($value) . “‘”;
   // }
    return $value;
}
?>