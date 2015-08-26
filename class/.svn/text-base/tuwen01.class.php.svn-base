<?php


class Tuwen01
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
   
					$title = "【每周读片】第十期结果及解析";
					$data  = date('Y-m-d');
					$desription = "您答对了吗？";
					$image = "http://mmbiz.qpic.cn/mmbiz/K3GWhOep26e2yIVbTBzDdiciaxwMXfgZZsjJlT4umrz7tS9bdZpBUziaJuQUbQja682MibTZBAiaNIVl6wOTODp3PoQ/0";
					$turl = "http://mp.weixin.qq.com/s?__biz=MjM5NDc2NTU5MQ==&mid=200239440&idx=1&sn=15f276a8561cab91720932672c5854e0#rd";
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    