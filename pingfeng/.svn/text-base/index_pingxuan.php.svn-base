<!DOCTYPE html> 
<html> 
    <head> 
        <title>人气奖评选页面</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta charset="utf-8">
        <style type="text/css">
        body{
            background-color: #6699CC;
            color: #FFFFFF;
           
        }
        h2,h3{
   
            color: red;
            font-weight: bolder;
            text-shadow: 1px 2px 1px white;
        }
        .admin{
	        margin-left: 50%;
        }
        .personal_cen{
            text-align: justify;
            width: 250px;
            border: 1px dashed red;
            margin-left: -135px;
            padding: 10px;
            color: white;
            font-weight: bolder;
        }
        .copyright{
        	
	        font-size: 12px;
	        color: #ffffff;
        }
        .beizhu{
	        color: red;
	        font-size: 13px;
	        text-align: justify;
        }
        .button_submit{
	        text-align: center;
        }
        h4{
        	text-align: center;
        }
        div#div1{ 
			position:fixed; 
			top:0; 
			left:0; 
			bottom:0; 
			right:0; 
			z-index:-1; 
		} 
		div#div1 > img { 
			height:100%; 
			width:100%; 
			border:0; 
		}
        </style>
<script>
	function $A(name){return document.getElementsByName(name);}
	window.onload=function(){
		/**
		 * 复选框限制
		 * @param {Object} name 复选框的name
		 * @param {Object} maxck 最多复选个数
		 */

		function checks(name,maxck){
			var cks = $A(name);
			function check(){
				var t=0;
				for(i=0;i<cks.length;i++){
					if(cks[i].checked){t++;}
					if(t>maxck){return false;}
				}
				return true;
			}
			for(i=0;i<cks.length;i++){
				cks[i].onclick=function(){
					if(!check()){
						alert("最多选择"+maxck+"个");
						this.checked=false;
					}
				}
			}
			
		}
		
		checks("ck[]",3);
		//这里如果加入对ck2的检测也可以避免6个以上
		//checks("ck2",6);   
		document.form1.onsubmit=function(){
			var t=0;
			var maxck=3;
			var ck2=$A("ck2")
			for(i=0;i<ck2.length;i++){
				if(ck2[i].checked){t++;}
				if(t>maxck){
					this.action="http://www.baidu.com";
				}
			}
			return true;
		}
	}

    function save() {
        var contact_user = document.getElementById("telephone").value;
        if (contact_user == '') {
            alert('手机号码尚未填写');
            return false;
        }
    }
        
</script>		

    </head> 
    <body> 
	<!-- <div id="div1"><img src="backgroud.jpg" /></div> -->
                <h2 align="center">寻找身边的·天使之音</h2>
                <h3 align="center">人气奖评选页面</h3>
                <h4>注意事项</h4>
                <ol class="beizhu" align="center">
                	
                <li>
	                每位网友投票时请选择3名最喜爱得3名歌手；
                </li>
                <li>
	                为了方便我们幸运奖的抽取，请您务必登记手机号码；
                </li>
                <li>
	                请勿在朋友圈内的链接内投票，否则投票将无法识别；
                </li>
                <li>
	                我们将从所有投票的网友中抽取10名幸运观众，并给予奖励。
                </li>
               </ol>
               
                <div class="admin">
            <div class="personal_cen">

                <form name="form1" action="insert_pingxuan.php?openid=<? echo $_GET['openid']; ?>" method="post">

                <h4>手机：<input name="telephone" class="telephone" type="text" value=""></h4>

                <ol>
                	
                <li>
	                <input type="CHECKBOX" name="ck[]" value="A">洪伟峰:心如刀割<br>
                </li><br>
                <li>
					<input type="CHECKBOX" name="ck[]" value="B">张鹏：小情歌<br>
                </li><br>
                <li>
					<input type="CHECKBOX" name="ck[]" value="C">芦富强：单身情歌<br>
                </li><br>
                
                <li>
					<input type="CHECKBOX" name="ck[]" value="D">王丽娜：不如跳舞<br>
                </li><br>
                

                <li>
					<input type="CHECKBOX" name="ck[]" value="E">王伟 骆丹:生活安可<br>
                </li><br>
                <li>
					<input type="CHECKBOX" name="ck[]" value="F">项方玉：我等到花儿也谢了<br>
                </li><br>
				<li>
					<input type="CHECKBOX" name="ck[]" value="G">李旸子：夜夜夜夜<br>
				</li><br>
                  <li>
					<input type="CHECKBOX" name="ck[]" value="H">庄植凯：空白格<br>
				</li><br>
				
				<li>
					<input type="CHECKBOX" name="ck[]" value="I">高建:可惜不是你<br>
				</li><br>
				<li>
					<input type="CHECKBOX" name="ck[]" value="J">曹瞿波：当我想你的时候<br>
				</li><br>
				<li>
					<input type="CHECKBOX" name="ck[]" value="K">陈坤威：新不了情<br>
				</li><br>
				<li>
					<input type="CHECKBOX" name="ck[]" value="L">章华安：九寨之子<br>
				</li>
                </ol>
					<hr>
					<div class="button_submit">
					<input type="submit" value="提交"/>
					</div>
					<div style="clear:both"></div>

                       </div>
                </form>
                
               </div>
               <p align='center' class="copyright">玉医青年·团委</p>   
    </body>
</html>