<?php


class Tuwen02
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
   
					$title = "「微福利」bango!酸奶冰激凌优惠";
					$data  = date('Y-m-d');
					$desription = "亲们，经过小编和bango酸奶冰激凌商家的洽谈，在炎炎夏日，特推出以下微福利。";
					$image = "http://mmbiz.qpic.cn/mmbiz/K3GWhOep26ceLicpOia0q29fwLIibAatkY7W8R7IYia0VyicaapYQAKm3TcibK1E5cILJ2h2pCRgqvvQN1IU78nqqIAQ/0";
					$turl = "http://mp.weixin.qq.com/s?__biz=MjM5NDc2NTU5MQ==&mid=200308520&idx=1&sn=d0fc870b425f100d9b44adcaae13a600#rd";
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    