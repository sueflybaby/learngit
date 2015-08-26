<?php

class Personal
{
	public function responseMsg($keyword){
				//加载图文模版
				$picTpl = "
							<Title><![CDATA[%s]]></Title>
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							";
   
					$title = "个人中心";
					$data  = date('Y-m-d');
					$desription = "玉医青年个人中心，设置昵称后重新打开即可。";
					$image = "http://t1.qpic.cn/mblogpic/78112dc179007cec340c/2000";
					$turl = "http://yyqn.sinaapp.com/personal/index.php?openid=".$keyword;
                	$resultStr = sprintf($picTpl, $title,$desription,$image,$turl);
                	return $resultStr;
	}
}

?>