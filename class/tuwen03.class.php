<?php


class Tuwen03
{


    public function responseMsg()//接受用户信息并返回图文信息
    {        

				//加载图文模版
				$picTpl = "
							<Title><![CDATA[%s]]></Title>
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							";
   
					$title = "「微公告」“周五”市民卡“网上银行、手机银行”业务办理通知";
					$data  = date('Y-m-d');
					$desription = "玉环农村合作银行市民卡、丰收卡“网上银行”、“手机银行”在我院的开通业务办理情况非常火爆，经研究决定，特增加本周五继续为我院职工办理此项业务，再送大家一天的福利。";
					$image = "http://mmbiz.qpic.cn/mmbiz/K3GWhOep26ejTa1UQFIh7OZJDdnnIlibWDLklKx6NTpRPric4CBf91wkrcDTzV4eMgQ56vtjnhMtSL07CARtQlvQ/0";
					$turl = "http://mp.weixin.qq.com/s?__biz=MjM5NDc2NTU5MQ==&mid=200312172&idx=1&sn=1abfb13871a26bb18ad505ddc936ae3a#rd";
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    