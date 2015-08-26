<!DOCTYPE html> 
<html> 
    <head> 
        <title>微信最受观众喜爱节目评选页面</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta charset="utf-8">
        <style type="text/css">
        body{
            background-color: rgba(255,0,18,0.92);
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
        }
        .copyright{
        	
	        font-size: 12px;
	        color: #ffffff;
        }
        .beizhu{
	        color: red;
	        font-size: 13px;
        }
        .button_submit{
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
			var maxck=6;
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
</script>		

    </head> 
    <body> 
	<div id="div1"><img src="backgroud.jpg" /></div> 
                <h2 align="center">寻找身边的·天使之音</h2>
                <h3 align="center">最受观众喜爱节目评选</h3>
                <p class="beizhu" align="center">注：选满3个节目。</p>
                <div class="admin">
            <div class="personal_cen">

                <form name="form1" action="insert_pingxuan.php?openid=<? echo $_GET['openid']; ?>" method="post" >
                <ol>
                <li>
	                <input type="CHECKBOX" name="ck[]" value="J">领导班子：医者心声<br>
                </li>
                <li>
					<input type="CHECKBOX" name="ck[]" value="A">第一工会：家和万事兴<br>
                </li>
                <li>
					<input type="CHECKBOX" name="ck[]" value="M">嘉&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp宾：日月凌空<br>
                </li>
                <li>
					<input type="CHECKBOX" name="ck[]" value="B">第六工会：如此广告<br>
                </li>
                <li>
					<input type="CHECKBOX" name="ck[]" value="C">第四工会：好心分手<br>
                </li>
                <li>
					<input type="CHECKBOX" name="ck[]" value="D">团&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp委：欢快的跳吧<br>
                </li>
				<li>
					<input type="CHECKBOX" name="ck[]" value="E">第七工会：后来<br>
				</li>
                  <li>
					<input type="CHECKBOX" name="ck[]" value="N">嘉&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp宾：盘妻索妻<br>
				</li>
				<li>
					<input type="CHECKBOX" name="ck[]" value="F">第五工会：我为玉医多多做贡献<br>
				</li>
				<li>
					<input type="CHECKBOX" name="ck[]" value="L">嘉&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp宾：雪山春晓<br>
				</li>
				<li>
					<input type="CHECKBOX" name="ck[]" value="G">第三工会：产房门前<br>
				</li>
				<li>
					<input type="CHECKBOX" name="ck[]" value="K">嘉&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp宾：精忠报国<br>
				</li>
				<li>
					<input type="CHECKBOX" name="ck[]" value="H">第二工会：年年有余<br>
				</li>
				<li>
					<input type="CHECKBOX" name="ck[]" value="I">第八工会：明天会更好<br>
				</li>
                </ol>
					<hr>
					<div class="button_submit">
					<input type="submit" value="提交" />
					</div>
					<div style="clear:both"></div>

                       </div>
                </form>
                
               </div>
               <p align='center' class="copyright">玉医青年·团委</p>   
    </body>
</html>