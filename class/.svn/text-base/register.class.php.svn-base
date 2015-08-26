<?php


class Register
{


    public function responseMsg($openid)//接受用户信息并返回图文信息
    {        

				//加载图文模版
				$picTpl = "
							<Title><![CDATA[%s]]></Title>
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							";
   
					$title = "个人登记";
					$data  = date('Y-m-d');
					$desription = "亲们，请积极登记。方便我们日后发放奖品及参与跳蚤市场。";
					$image = "http://t1.qpic.cn/mblogpic/78112dc179007cec340c/2000";
					$turl = "http://yyqn.sinaapp.com/personal/register.php?openid=".$openid;
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    