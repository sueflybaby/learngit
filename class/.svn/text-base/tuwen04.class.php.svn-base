<?php


class Tuwen04
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
   
					$title = "【每周读片】第六期 （正确者获3个积分，并抽取2个幸运奖）";
					$data  = date('Y-m-d');
					$desription = "";
					$image = "http://mmbiz.qpic.cn/mmbiz/K3GWhOep26fxqHnUwGTjjDibjslkd5nNzfhjtTEA6m4ibbMDiaOnTelFAYib9B9uYayGwlDOBfbQhmS2yxWdAMYJzg/0";
					$turl = "http://mp.weixin.qq.com/s?__biz=MjM5NDc2NTU5MQ==&mid=200160439&idx=3&sn=cf0fea071d1d556d862928a8dcba3334#rd";
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    