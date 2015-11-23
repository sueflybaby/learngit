<?php
if(!(isset($_COOKIE['name']) && ($_COOKIE['islogin'] == '1'))){
    //echo "111";
    header("location:login.html");
    //exit();
}else{
    //如果传入的name在评委数据库中没有查到 就提示查无此人 及返回重新登入，如果正确则获取相对应的score值
    //include("conn.php");
    $mysql = new SaeMysql();
    $check_pingwei = "SELECT * FROM `personalinformation_users` WHERE `gonghao` like '%".$_COOKIE['name']."%'";
    //$result_check= $mysqli->query($check_pingwei);
    $result_check = $mysql->getData($check_pingwei);
    ///var_dump($result_check);
    //echo "222";
    if (empty($result_check)) {
        header("location:login.html");
        exit();
    }
}
error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="Description" content="登入页面" />
<meta name="Keywords" content="登入" />
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
<title>个人信息录入</title>
    <script src='jquery-1.11.1.min.js'></script>
    <script>

        $(document).ready(function(){
            var txt0 = "<input type='text' name='jianli0[]' value='' size='3' />年<input type='text' name='jianli0[]' " +
                "value='' size='3' />月至<input type='text' name='jianli0[]' value='' size='3' />年<input type='text' " +
                "name='jianli0[]' value='' size='3' />月，就读于<input type='text' name='jianli0[]' value='' size='8' " +
                "/>学校，获得<input type='text' name='jianli0[]' value='' size='3' />学位。<p></p>";
            var txt1 = "<input type='text' name='jianli1[]' value='' size='3' />年<input type='text' name='jianli1[]' " +
                "value='' size='3' />月至<input type='text' name='jianli1[]' value='' size='3' />年<input type='text' " +
                "name='jianli1[]' value='' size='3' />月，就职于<input type='text' name='jianli1[]' value='' size='8' " +
                "/>医院，<input type='text' name='jianli1[]' value='' size='3' />科室。<p></p>";
            var txt2 = "<input type='text' name='lunwen[]' value='' size='3' />年，在《<input type='text' name='lunwen[]' value='' size='10'/>》杂志，第<input type='text' name='lunwen[]' value='' size='1' />期发表论文《<input type='text' name='lunwen[]' value=''  size='20'/>》。<p></p>";
            var txt3 = "<input type='text' name='huojiang[]' value='' size='3' />年，荣获《<input type='text' name='huojiang[]' value='' size='10'/>》。<p></p>";
            $('#btn0').click(function(){

                $(this).before(txt0);
            });
            $('#btn1').click(function(){

                $(this).before(txt1);
            });
            $('#btn2').click(function(){

                $(this).before(txt2);
            });
            $('#btn3').click(function(){

                $(this).before(txt3);
            });
        });
         /*
         **弹出弹窗提示
         */

        alert("此表涉及的信息将对外公布，请您认真如实的填写。");


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

<?php
//var_dump($_POST);
  $gonghao = $login_name = $_COOKIE['name'];
  
  if (empty($login_name)) {
    header("login.html");
  }
  //$gonghao = $_GET["gonghao"];
  $uuid = $_GET["uuid"];
  
  $sql = "SELECT * FROM personalinformation_records WHERE gonghao like '{$gonghao}'";
  $sql_update_uuid = "UPDATE personalinformation_users SET uuid='{$uuid}' WHERE  gonghao LIKE '{$_COOKIE['name']}'";//更新uuid、在user注册表里
//echo $sql;
$mysql->runSql($sql_update_uuid);
//$mysqli->query($sql_update_uuid);
  $check = $mysql->getData($sql);
  // 获取信息 查看是否是已经审核的内容

  //从数据库中获取该用户的信息，并自动填写相应的选项。
  //没有信息则为空
  //从login页面传递name
	//statusOfEdit 0表示均可以编辑 1表示只能编辑进一步的信息 无法修改基本信息 2表示均无法修改
  $statusOfEdit = 0;
	if (isset($check)) {
		$data = $check[0];

    //var_dump($data);
    if ($data["check_rsk"]=="checked") {
      $statusOfEdit = 1;
      if ($data["check_ywk"]=="checked") {
        echo "<div class='head_title' >您的信息已经通过审核！</div>";
        $statusOfEdit = 2;
      }else if($data["check_ywk"]=="tuihui") {
        echo "<div class='head_title' >您的信息未通过医务科审核！</div>";
      }else{
        echo "<div class='head_title' >您的信息正在医务科审核中！</div>";
      }
    }else if($data["check_rsk"]=="tuihui"){
      echo "<div class='head_title' >您的信息被退回！请重新修改！</div>";
    }else{
      echo "<div class='head_title' >您的信息正在人事科审核中！</div>";
    }
	}
	$mysql->closeDb();
?>
<div id="opi" class="page-wrapper clearfix">
<div class="full-page-holder">
<div class="full-page"> 

<div class="login-page clearfix">
<div class="full-login">
<div class="shadow">
<div class="login-panel">
<form method="post" id="loginForm" action="insert.php" focus="email">
<h1 align="center">玉环县人民医院医师信息录入系统</h1>
<p class="clearfix">

<?php
if($statusOfEdit = 1){//基本信息不能编辑
  echo '<label for="email">姓名:</label>
    <span style="color: crimson;">'.$data["name"].'</span>
</p><p class="clearfix">
<label for="email">性别:</label>

';
if ($data["gender"]=="0") {
    echo '<span style="color: crimson;">男</span>';
  }else{
    echo '<span style="color: crimson;">女</span>';
  }
echo '</p><p class="clearfix">';
}else{//基本信息不能编辑
  echo '<label for="email">姓名:</label>

<input type="text" name="name" tabindex="1" value="'.$data["name"].'" id="email" class="input-text-name">
    <span style="color: crimson;">(*)</span>
    <label for="email">性别:</label>
</p><p class="clearfix">';

  if ($data["gender"]=="0") {
    echo '<input name="gender" type="radio" value="1" /> 男
  <input name="gender" type="radio" value="0" checked /> 女';
  }else{
    echo '<input name="gender" type="radio" value="1" checked/> 男
  <input name="gender" type="radio" value="0" /> 女';
  }

  echo '</p><p class="clearfix">';
};


?>
<label for="email">学历:</label>
<?php

switch ($data["xueli"]) {
	case '中专':
		echo '
		<select size="1" id="select" name="xueli">
        <option value="中专" selected="true" >中专</option>
        <option value="大专">大专</option>
        <option value="本科">本科</option>
        <option value="研究生">研究生</option>
        <option value="博士">博士</option>

		</select>
		';
		break;
	case '大专':
		echo '
		<select size="1" id="select" name="xueli">
        <option value="中专" >中专</option>
        <option value="大专" selected="true" >大专</option>
        <option value="本科">本科</option>
        <option value="研究生">研究生</option>
        <option value="博士">博士</option>

		</select>
		';
		break;
	case '研究生':
			echo '
		<select size="1" id="select" name="xueli">
        <option value="中专">中专</option>
        <option value="大专">大专</option>
        <option value="本科">本科</option>
        <option value="研究生" selected="true" >研究生</option>
        <option value="博士">博士</option>

		</select>
		';
		break;
	case '博士':
			echo '
		<select size="1" id="select" name="xueli">
        <option value="中专">中专</option>
        <option value="大专">大专</option>
        <option value="本科">本科</option>
        <option value="研究生">研究生</option>
        <option value="博士" selected="true" >博士</option>

		</select>
		';
		break;
	default:
		echo '
		<select size="1" id="select" name="xueli">
        <option value="中专">中专</option>
        <option value="大专">大专</option>
        <option value="本科" selected="true" >本科</option>
        <option value="研究生">研究生</option>
        <option value="博士">博士生</option>

		</select>
		';
		break;
}
?>
        <span style="color: crimson;">(*)</span>
</p><p class="clearfix">
<label for="email">学位:</label>
<?php

switch ($data["xuewei"]) {
	case '博士':
		echo '
		<select size="1" id="select" name="xuewei">
        <option selected="true" value="学士">学士</option>
        <option value="硕士">硕士</option>
        <option value="博士">博士</option>
		</select>
		';
		break;
	case '硕士':
		echo '
		<select size="1" id="select" name="xuewei">
        <option value="学士">学士</option>
        <option selected="true" value="硕士">硕士</option>
        <option value="博士">博士</option>
		</select>
		';
		break;
	default:
		echo '
		<select size="1" id="select" name="xuewei">
        <option selected="true" value="学士">学士</option>
        <option value="硕士">硕士</option>
        <option value="博士">博士</option>
		</select>
		';
		break;
}
?>
        <span style="color: crimson;">(*)</span>
</p><p class="clearfix">
<label for="email">职称:</label>
        <?php
        if(!empty($data["zhicheng"])){
            echo $data["zhicheng"];
        }else{
            echo '<input type="text" name="zhicheng" value="" size="5" />';
        }
        ?>
  	<br>

</p><p class="clearfix">
<label for="email">职务:</label>

<input type="text" name="duty" tabindex="1" value="" id="email" class="input-text-duty">
        <span style="color: crimson;">(*)</span>
</p>
    <p class="clearfix">

<label for="email">专科:</label>
<select size="1" id="select" name="keshi">
    <option value="放射科">放射科</option>
    <option value="B超室">B超室</option>
    <option value="检验科">检验科</option>
    <option value="麻醉科">麻醉科</option>
    <option value="手术室">手术室</option>
    <option value="心血管内科">心血管内科</option>
    <option value="消化内科">消化内科</option>
    <option value="神经内科">神经内科</option>
    <option value="呼吸内科">呼吸内科</option>
    <option value="内分泌科">内分泌科</option>
    <option value="重症医学科">重症医学科</option>
    <option value="普通外科">普通外科</option>
    <option value="肛肠外科">肛肠外科</option>
    <option value="泌尿外科">泌尿外科</option>
    <option value="神经外科">神经外科</option>
    <option value="骨科">骨科</option>
    <option value="妇科">妇科</option>
    <option value="儿科">儿科</option>
    <option value="ICU">ICU</option>
    <option value="感染科">感染科</option>
    <option value="体检中心">体检中心</option>
    <option value="急诊">急诊</option>
    <option value="血透室">血透室</option>
    <option value="皮肤科">皮肤科</option>
    <option value="病理科">病理科</option>
    <option value="口腔科">口腔科</option>
    <option value="耳鼻咽喉科">耳鼻咽喉科</option>
    <option value="眼科">眼科</option>
    <option value="中医科">中医科</option>
    <option value="针灸推拿科">针灸推拿科</option>
    <option value="康复科">康复科</option>
    <option value="西药房">西药房</option>
    <option value="中药房">中药房</option>
</select>

</p>
    <p class="clearfix">

<label for="email">擅长:</label>

<!-- <input type="text" name="profession" placeholder="60字以内。例如：新生儿疾病" value="<?php echo $data["profession"]; ?>" id="email" class="input-text">
 -->
 <textarea rows="15" cols="55" name="profession" placeholder="60字以内。例如：普外科各种常见疾病的诊治。
 甲状腺癌、乳腺癌、胃癌及大肠癌根治术；
 肝胆管复杂性结石处理；肝切除；
 腹腔镜下各种微创手术等。"><?php echo $data["profession"]; ?>
</textarea>
</p><p class="clearfix">
<label for="email">个人简历<span style="color: crimson;">(*)</span>:</label>
    <ol>
        <li>
            <input type='text' name='jianli0[]' value='' size='3' />年<input type='text' name='jianli0[]' value=''
                                                                            size='3' />月至<input type='text'
                                                                                                name='jianli0[]'
                                                                                                value='' size='3'
                />年<input type='text' name='jianli0[]' value='' size='3' />月，就读于<input type='text' name='jianli0[]'
                                                                                       value='' size='8' />学校，获得<input type='text' name='jianli0[]' value='' size='3' />学位。
        </li>
        <button id='btn0'>增加一行</button>
        <li>
            <input type='text' name='jianli1[]' value='' size='3' />年<input type='text' name='jianli1[]' value=''
                                                                            size='3' />月至<input type='text'
                                                                                                name='jianli1[]'
                                                                                                value='' size='3'
                />年<input type='text' name='jianli1[]' value='' size='3' />月，就职于<input type='text' name='jianli1[]'
                                                                                       value='' size='8' />医院，<input type='text' name='jianli1[]' value='' size='3' />科室。
        </li>
        <button id='btn1'>增加一行</button>
    </ol>
</p><p class="clearfix">
        <label for="email">研究方向:</label>

<textarea rows="7" cols="55" name="jianjie" placeholder="要求：填写科研课题或晋升晋级论文方向。
举例：心脏起搏和电生理、冠心病与相关基因多态性关系的研究。
">
<?php echo $data["resume"]; ?>
</textarea>


    </p><p class="clearfix">
        <label for="email">发表论文:</label>
    <ol>
        <li>
            <input type='text' name='lunwen[]' value='' size='3' />年，在《<input type='text' name='lunwen[]' value='' size='10'/>》杂志，第<input type='text' name='lunwen[]' value='' size='1' />期发表论文《<input type='text' name='lunwen[]' value=''  size='20'/>》。
        </li>
    </ol>
    <button id='btn2'>增加一行</button>
    </p><p class="clearfix">
        <label for="email">获奖情况（请填写县级以上荣誉）:</label>
    <ol>
        <li>
            <input type='text' name='huojiang[]' value='' size='3' />年，荣获《<input type='text' name='huojiang[]' value='' size='10'/>》。
        </li>
    </ol>
    <button id='btn3'>增加一行</button>
    </p><p class="clearfix">


</p>
<p class="right">

<input type="hidden" name="uuid" value="<?php echo $uuid; ?>" />
    <input type="hidden" name="from" value="fromIndex" />
<input type="hidden" name="isplogin" value="true" />
<input type="submit" id="login" tabindex="4" name="submit" class="input-submit large" value="提交" />
</p>
<div class="separator"></div>
<p class="no-account">巨石工作室 苏维杰</p>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body></html>
