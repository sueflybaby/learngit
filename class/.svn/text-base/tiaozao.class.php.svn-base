<?php


class Tiaozao
{


    public function responseMsg($fromUsername)//接受用户信息并返回图文信息
    {        

				//加载图文模版
				$picTpl = "
							<Title><![CDATA[%s]]></Title>
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							";
   
					$title = "跳蚤市场·欢迎光临！";
					$data  = date('Y-m-d');
					$desription = "小伙伴们，集合你们的旧物，速速来。";
					$image = "http://t1.qpic.cn/mblogpic/688e0f9b0f3fa9374dbc/2000";
					$turl = "http://yyqn.sinaapp.com/tiaozao/index.php?class=sell&openid=".$fromUsername;
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    