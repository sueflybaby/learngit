<?php


class Paihang
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
   
					$title = "玉医青年《每日一答》积分排行榜";
					$data  = date('Y-m-d');
					$desription = "《每日一答》活动分值最高的前十位青们，亲您还不加把油。";
					$image = "http://epaper.hljnews.cn/shb/res/1/20110123/48001295748762466.jpg";
					$turl = "http://yyqn.sinaapp.com/paihangbang.php?openid=".$openid;
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    