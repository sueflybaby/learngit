<?php


class Tuwen05
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
   
					$title = "玉医讲堂：一图读懂（全身疾病的手部体征）";
					$data  = date('Y-m-d');
					$desription = "";
					$image = "http://mmbiz.qpic.cn/mmbiz/K3GWhOep26fxqHnUwGTjjDibjslkd5nNznHxOLwiaaqYl0TyVia75HCFZaNVmQL44MfsshGbSNU0d1lrGQK76ibe4Q/0";
					$turl = "http://mp.weixin.qq.com/s?__biz=MjM5NDc2NTU5MQ==&mid=200160439&idx=4&sn=055cd5d2e6ab30a6cd6f5e1d754a7bff#rd";
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    