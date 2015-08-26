<?php


class Toupiao
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
   
					$title = "玉环县卫生系统《寻找身边的·天使之音》最佳人气奖评选";
					$data  = date('Y-m-d');
					$desription = "寻找身边的·天使之音，最佳人气奖评选页面。";
					$image = "http://mmbiz.qpic.cn/mmbiz/K3GWhOep26dPBVZSKdFAYplTM8lGcJhDrNcMzxibJXfQrjjjMamDStfN1wS6Y7rUcibiaOicMUZbyWCSmwLXibnricXw/0";
					$turl = "http://yyqn.sinaapp.com/pingfeng/index_pingxuan.php?openid=".$openid;
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    