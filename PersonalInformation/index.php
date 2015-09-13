<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="Description" content="登入页面" />
<meta name="Keywords" content="登入" />
<link href="login.css" rel="stylesheet" type="text/css" media="all" />
<title>个人信息录入</title>
<script type="text/javascript">
/*  
**    ====================================
**    类名：CLASS_LIANDONG_YAO  
**    功能：多级连动菜单  
**    作者：YAODAYIZI     
**/  	
  function CLASS_LIANDONG_YAO(array)
  {
   //数组，联动的数据源
  	this.array=array; 
  	this.indexName='';
  	this.obj='';
  	//设置子SELECT
	// 参数：当前onchange的SELECT ID，要设置的SELECT ID
      this.subSelectChange=function(selectName1,selectName2)
  	{
  	//try
  	//{
    var obj1=document.all[selectName1];
    var obj2=document.all[selectName2];
    var objName=this.toString();
    var me=this;
    obj1.onchange=function()
    {
    	me.optionChange(this.options[this.selectedIndex].value,obj2.id)
    }
  	}
  	//设置第一个SELECT
	// 参数：indexName指选中项,selectName指select的ID
  	this.firstSelectChange=function(indexName,selectName)  
  	{
  	this.obj=document.all[selectName];
  	this.indexName=indexName;
  	this.optionChange(this.indexName,this.obj.id)
  	}
  // indexName指选中项,selectName指select的ID
  	this.optionChange=function (indexName,selectName)
  	{
    var obj1=document.all[selectName];
    var me=this;
    obj1.length=0;
    obj1.options[0]=new Option("请选择",'');
    for(var i=0;i<this.array.length;i++)
    {	
    	if(this.array[i][1]==indexName)
    	{
    	//alert(this.array[i][1]+" "+indexName);
      obj1.options[obj1.length]=new Option(this.array[i][2],this.array[i][0]);
    	}
    }
  	}	
  }

</script>
</head>
<body>

<?php
  include("conn.php");
  $login_name = $_GET['name'];
  $sql = "SELECT * FROM PersonalInformation_Records WHERE login_name like '%{$login_name}%'";
  $check = $mysqli->query($sql);
  // 获取信息 查看是否是已经审核的内容

  //从数据库中获取该用户的信息，并自动填写相应的选项。
  //没有信息则为空
  //从login页面传递name
	
	
	if (empty($login_name)) {
		header("longin.php?action=longin");
	}
	
	if ($check) {
		$data = $check->fetch_assoc();
    //var_dump($data);
    if ($data["check"]=="checked") {
      echo "<h1>您的信息已经通过审核！</h1>";
    }else if($data["check"]=="tuihui"){
      echo "您的信息被退回！请重新修改！";
    }else{
      echo "您的信息正在审核中。。。";
    }
	}
	$mysqli->close();
?>

<div id="opi" class="page-wrapper clearfix">
<div class="full-page-holder">
<div class="full-page"> 

<div class="login-page clearfix">
<div class="full-login">
<div class="shadow">
<div class="login-panel">
<form method="post" id="loginForm" action="insert.php" focus="email">
<h1 align="center">玉环县人民医院个人信息录入</h1	>
<p class="clearfix">
<label for="email">姓名:</label>

<input type="text" name="name" tabindex="1" value="<? echo $data["name"]; ?>" id="email" class="input-text-name">

</p><p class="clearfix">
<label for="email">性别:</label>
<? 
if (intval($data["gender"])) {
	echo '<input name="gender" type="radio" value="1" checked /> 男 
<input name="gender" type="radio" value="0" /> 女';
}else{
	echo '<input name="gender" type="radio" value="1"/> 男 
<input name="gender" type="radio" value="0"  checked /> 女';
}
?>

</p><p class="clearfix">
<label for="email">电话:</label>

<input type="text" name="telephone" tabindex="1" value="<? echo $data["telephone"]; ?>" id="email" class="input-text-telephone">

</p><p class="clearfix">
<label for="email">学历:</label>
<?

switch ($data["educational_background"]) {
	case '中专':
		echo '
		<select size="1" id="select" name="educational_background">
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
		<select size="1" id="select" name="educational_background">
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
		<select size="1" id="select" name="educational_background">
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
		<select size="1" id="select" name="educational_background">
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
		<select size="1" id="select" name="educational_background">
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

</p><p class="clearfix">
<label for="email">学位:</label>
<?

switch ($data["educational_background"]) {
	case '学士':
		echo '
		<select size="1" id="select" name="academic_degree">
        <option selected="true" value="学士">学士</option>
        <option value="硕士">硕士</option>
        <option value="博士">博士</option>
		</select>
		';
		break;
	case '硕士':
		echo '
		<select size="1" id="select" name="academic_degree">
        <option value="学士">学士</option>
        <option selected="true" value="硕士">硕士</option>
        <option value="博士">博士</option>
		</select>
		';
		break;
	default:
		echo '
		<select size="1" id="select" name="academic_degree">
        <option selected="true" value="学士">学士</option>
        <option value="硕士">硕士</option>
        <option selected="true" value="博士">博士</option>
		</select>
		';
		break;
}
?>

</p><p class="clearfix">
<label for="email">职称:</label>
  	<SELECT ID="s1" NAME="s1"  >
    <OPTION selected></OPTION>
  	</SELECT>
  	<SELECT ID="s2" NAME="s2"  >
    <OPTION selected></OPTION>
  	</SELECT>
  	<br>

</p><p class="clearfix">
<label for="email">职务:</label>

<input type="text" name="duty" tabindex="1" value="" id="email" class="input-text">

</p><p class="clearfix">

<label for="email">科室:</label>
<select size="1" id="select" name="keshi">
        <option selected="true" value="内一">内一</option>
        <option value="内二">内二</option>
        <option value="内三">内三</option>
        <option value="内科门诊">内科门诊</option>
        <option value="外一">外一</option>
        <option value="外二">外二</option>
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
        <option value="B超室">B超室</option>
        <option value="放射科">放射科</option>
        <option value="检验科">检验科</option>
        <option value="麻醉科">麻醉科</option>
        <option value="手术室">手术室</option>

</select>
</p><p class="clearfix">

<label for="email">擅长:</label>

<input type="text" name="profession" tabindex="1" value="<? echo $data["profession"]; ?>" id="email" class="input-text">

</p><p class="clearfix">
<label for="email">简历:</label>

<textarea rows="8" cols="29" name="jianjie">
<? echo $data["resume"]; ?>
</textarea>
</p><p class="clearfix">

</p>
<p class="right">

<input type="hidden" name="origURL" value="#" /><input type="hidden" name="domain" value="" />
<input type="hidden" name="formName" value="" /><input type="hidden" name="method" value="" />
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
<script type="text/javascript">

//例子1-------------------------------------------------------------
//数据源
var array=new Array();
  array[0]=new Array("护理","根目录","护理"); //数据格式 ID，父级ID，名称
  array[1]=new Array("医师","根目录","医师");
  array[2]=new Array("药学","根目录","药学");
  array[3]=new Array("中药学","根目录","中药学");
  array[4]=new Array("检验","根目录","检验");

  array[5]=new Array("护士","护理","护士");
  array[6]=new Array("护师","护理","护师");
  array[7]=new Array("主管护师","护理","主管护师");
  array[8]=new Array("副主任护师","护理","副主任护师");
  array[9]=new Array("主任护师","护理","主任护师");

  array[10]=new Array("助理医师","医师","助理医师");
  array[11]=new Array("医师","医师","医师");
  array[12]=new Array("主治医师","医师","主治医师");
  array[13]=new Array("副主任医师","医师","副主任医师");
  array[14]=new Array("主任医师","医师","主任医师");

  array[15]=new Array("初级药士","药学","初级药士");
  array[16]=new Array("初级药师","药学","初级药师");
  array[17]=new Array("中级主管药师","药学","中级主管药师");
  array[18]=new Array("副主任药剂师","药学","副主任药剂师");
  array[19]=new Array("主任药剂师","药学","主任药剂师");

  array[20]=new Array("初级中药士","中药学","初级中药士");
  array[21]=new Array("初级中药师","中药学","初级中药师");
  array[22]=new Array("中级主管中药师","中药学","中级主管中药师");
  array[23]=new Array("副主任药剂师","中药学","副主任药剂师");
  array[24]=new Array("主任药剂师","中药学","主任药剂师");

  array[25]=new Array("初级检验技士","检验","初级检验技士");
  array[26]=new Array("初级检验技师","检验","初级检验技师");
  array[27]=new Array("检验主管技师","检验","检验主管技师");
  array[28]=new Array("副主任检验师","检验","副主任检验师");
  array[29]=new Array("主任检验师","检验","主任检验师");
  //--------------------------------------------
  //这是调用代码
  var liandong=new CLASS_LIANDONG_YAO(array) //设置数据源
  liandong.firstSelectChange("根目录","s1"); //设置第一个选择框
  liandong.subSelectChange("s1","s2"); //设置子级选择框
</script>



</body></html>
