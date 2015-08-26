<?php


class Waimai
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
   
					$title = "玉医青年外卖查询";
					$data  = date('Y-m-d');
					$desription = "玉医青年外卖查询系统，以提供最为方便的查询方式。";
					$image = "http://t1.qpic.cn/mblogpic/ae362048a08ad5f41a5e/2000";
					$turl = "http://yyqn.sinaapp.com/waimai/index.html";
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
                
        }
    }
	


?>    