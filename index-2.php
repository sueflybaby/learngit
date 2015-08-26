<?php
    function __autoload($className){
	    include "class".DIRECTORY_SEPARATOR.strtolower($className).".class.php";
    }

		//---------- 接 收 数 据 ---------- //

		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"]; //获取POST数据
		

		//用SimpleXML解析POST过来的XML数据
		$postObj = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);

		$fromUsername = $postObj->FromUserName; //获取发送方帐号（OpenID）
		$toUsername = $postObj->ToUserName; //获取接收方账号
        $messagetype = $postObj->MsgType; //获取信息类型
        $event = $postObj->Event;//获取事件类型（关注还是非关注）
        $eventKey = $postObj->EventKey;//获取qrscene参数
		$keyword = trim($postObj->Content); //获取消息内容
		$time = time(); //获取当前时间戳

        //导入HINT末尾
        include("conn.php");
        $hint = new Hint();
        $hint_str = $hint->responseMsg();


		//---------- 返 回 数 据 ---------- //
		$textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					<FuncFlag>0</FuncFlag>
					</xml>";
		//加载图文模版
				$picTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							%s
							</item>
							</Articles>
							<FuncFlag>1</FuncFlag>
							</xml> ";
		//加载图片模版
				$picTure = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[image]]></MsgType>
					<Image>
					<MediaId><![CDATA[%s]]></MediaId>
					</Image>
					</xml>";
						
				//格式化消息模板
				if($event == "scan"){
					$contentStr = "您扫瞄了二维码";
			        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
		        	echo $resultStr_text; //输出结果
		        	exit;
				}elseif($messagetype == "event" && $event == "subscribe"){
					$contentStr = "玉环县人民医院团委感谢您的关注！更多特色服务，详查下方导航栏。";
                    /*$contentStr_backup = "玉环县人民医院团委感谢您的关注！Bravo！\n目前开展活动及功能如下：\n
／＊＊＊积分服务＊＊＊／\n
每日一答-请输入：“每日一答”（以下均不含引号）直接获取题目；\n
每周读片-请关注：请持续关注我们的图文信息；\n
玉医小店-请输入：“市场”查看并兑换积分；\n
／＊＊＊查询服务＊＊＊／\n
随身通讯录-请输入：（需要验证）格式“张三电话”或“@zs”；\n
外卖号码-请输入：输入“外卖”查询；\n
医院电话-请输入：科室名称或病区；\n
快递电话-请输入：输入“快递”即可； \n
跳蚤市场-请输入：输入“跳蚤”访问；\n
影讯查询－请输入：“雷亚”、“大剧院”、“凯伦”、“环亚”查询当日影讯；\n
专家信息-请输入：专家名字或“某科专家”，如“外科专家“；\n
／＊＊＊＊＊＊／\n
功能不断添加中，请大家多提建议，希望《玉医青年》对您有所帮助。";//图片id
*/
			        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
		        	echo $resultStr_text; //输出结果
		        	exit;
                }else{

            		$dictionary = array("@","电话");	
                    $shopKeyWords = array("小店","商城","商场","商店");
                    $activityNames = array("XBRZsh","XBRZhr","XBRZff");
                        if(strstr($keyword, "每日一答")||($eventKey =="每日一答")){  
                        	$d = new Meiriyida();
                        	$contentStr = $d->responseMsg($fromUsername);
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	exit;

                        }else if(strstr($keyword, "答案")){ 
                        	$e = new Daan();
                        	$contentStr = $e->responseMsg($fromUsername,$keyword).$hint_str;
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;

                        }else if(strstr($keyword, "@")||strstr($keyword, "电话")){  //若关键字为“@ 或 电话”就查询电话号码
                            $keyword = str_replace($dictionary, "", $keyword);
                            $a = new telephone();
                	        $contentStr = $a->responseMsg($keyword,$fromUsername);
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                	        echo $resultStr_text; //输出结果
                	                	exit;

                        }else if(strstr($keyword, "雷亚")){
                        	$b = new TheaterLeiYa();
                        	$contentStr = $b->responseMsg();
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;

                        }else if(strstr($keyword, "大剧院")){
                        	$a = new TheaterDaJuYuan();
                        	$contentStr = $a->responseMsg();
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;

                        }else if(strstr($keyword, "凯伦")){
                        	$a = new TheaterkaiLun();
                        	$contentStr = $a->responseMsg();
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;

                        }else if(strstr($keyword, "环亚")){
                        	$a = new TheaterHuanYa();
                        	$contentStr = $a->responseMsg();
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;

                        }else if(strstr($keyword, "积分")){
                        	$c = new Personal();
                        	$result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg($fromUsername));
                        	echo($result);
                        	        	exit;

                        }else if(strstr($keyword, "外卖")){
                        	$c = new Waimai();
                        	$result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg());
                        	echo($result);
                        	        	exit;
                        }else if(strstr($keyword, "排行榜")||($eventKey =="排行榜")){
                        	$c = new Paihang();
                        	$result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg($fromUsername));
                        	echo($result);
                        	        	exit;
                        }else if(strstr($keyword, "获取")){
                        	$contentStr = $fromUsername;
                        	$result = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo($result);
                        	        	exit;
                        }else if(in_array($keyword, $shopKeyWords)||($eventKey =="小店")){
                        	$a = new Shop();
                        	$contentStr = $a->responseMsg($fromUsername);
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;
                        }else if(strstr($keyword, "兑换")){
                        	$a = new ShopCharge();
                        	$contentStr = $a->responseMsg($fromUsername,$keyword).$hint_str;//"非常抱歉，目前暂停兑换。"; //
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;
                        }else if(strstr($keyword, "人气奖")||($eventKey =="人气")){
                           // $contentStr = "投票已结束，感谢您的参与！";
                            //$resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                            //echo $resultStr_text; //输出结果
                             //           exit;
                        	   $c = new Toupiao();
                            $result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg($fromUsername));
                            echo($result);
                            exit;
                        }else if(strstr($keyword, "通讯录")||($eventKey =="通讯录")){
                        	$c = new Tongxunlu();
                        	$contentStr = $c->responseMsg();
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;
                        }else if(in_array($keyword, $activityNames)){//活动添加积分功能
                        	$c = new Activity();
                        	$contentStr = $c->jiajifen($fromUsername,'20',$keyword).$hint_str;
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;
                        }else if(strstr($keyword, "XBRZcyl")){//活动加积分使用
                            $c = new Activity();
                            $contentStr = $c->jiajifen($fromUsername,'5',$keyword).$hint_str;
                            $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                            echo $resultStr_text; //输出结果
                                        exit;
                        }else if(strstr($keyword, "test")||strstr($keyword, "活动")||($eventKey =="test")){
                        	$contentStr = "即将推出".$hint_str;
                	        $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果
                        	        	exit;
                        }else if(strstr($keyword, "跳蚤市场")||($eventKey =="跳蚤")){
                            $c = new Tiaozao();
                            $result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg($fromUsername));
                            echo($result);
                                        exit;
                        }else if(strstr($keyword, "个人")||($eventKey =="个人")){
                  		 	$c = new Personal();
                        	$result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg($fromUsername));
                        	echo($result);
                        	        	exit;
                        	
                        //}else if(strstr($keyword,"微心愿")){
                        //    $c = new haishan($fromUsername,$keyword);
                        //    $contentStr = $c->admin($keyword);
                        //    $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        //    echo $resultStr_text; //输出结果
                        //                exit;
                            
                        //}else if(strstr($keyword,"牵手")){
                        //   $c = new haishan();
                        //    $contentStr = $c->canjiaxiaohaoniao($fromUsername);
                        //    $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        //    echo $resultStr_text; //输出结果
                        //                exit;
                            
                        //}else if($eventKey == "点评"){
                       //     $contentStr = "        是高富帅，还是矮挫穷？\n        是天籁之音还是乌鸦嗓？
                       // 评委点评给力吗？麻辣吗？
                       // 如果你觉得意犹未尽，也想点评几句，可以直接将你想说的话发到微信平台。

                       // 一旦你的点评被录用，将获得由爪哇精品咖啡赞助，价值100元的代金券。";
                        //    $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        //    echo $resultStr_text; //输出结果
                        //                exit;
                        }else if(strstr($keyword, "历史")){
                        	$c = new ChargeHistory();
                            $contentStr = $c->responseMsg($fromUsername);
                            $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                            echo $resultStr_text; //输出结果
                        	        	exit;
                        }else if(strstr($keyword, "登记")||($eventKey =="登记")){
                     		$c = new Register();
                        	$result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg($fromUsername));
                        	echo($result);
                        	        	exit;
                        }else if(($eventKey =="tuwen01")){
                     		$c = new Tuwen01();
                        	$result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg());
                        	echo($result);
                        	        	exit;
                        }else if(($eventKey =="tuwen02")){
                            $c = new Tuwen02();
                            $result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg());
                            echo($result);
                                        exit;
                        }else if(($eventKey =="tuwen03")){
                            $c = new Tuwen03();
                            $result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg());
                            echo($result);
                                        exit;
                        }else if(($eventKey =="tuwen04")){
                            $c = new Tuwen04();
                            $result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg());
                            echo($result);
                                        exit;
                        }else if(($eventKey =="tuwen05")){
                            $c = new Tuwen05();
                            $result = sprintf($picTpl, $fromUsername, $toUsername, $time, "news", $c->responseMsg());
                            echo($result);
                                        exit;
                        }else if($eventKey =="9625"){//获取积分的方法
                        	$c = new GetJifenMethod();
                            $contentStr = $c->responseMsg();
                            $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                            echo $resultStr_text; //输出结果
                        	        	exit;
                         }else if(strstr($keyword, "每周读片")){//获取积分的方法
                             $c = new MeiZhouYiDa();
                             $contentStr = $c->responseMsg($fromUsername,$keyword).$hint_str;
                             $resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                             echo $resultStr_text; //输出结果
                                        exit;
                        }else if (!empty($keyword)) {
                	        $f = new Reply();
                			$contentStr = $f->responseMsg($keyword); //返回消息内容
                			$resultStr_text = sprintf($textTpl,$fromUsername,$toUsername,$time,"text",$contentStr);
                        	echo $resultStr_text; //输出结果

                		}else{
                            exit();
                        }
                }
            


?>