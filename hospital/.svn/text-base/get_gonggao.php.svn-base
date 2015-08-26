<?php 
/** 
  * 官方例子，张兴栋修改版 
  */
function pregstring($data){
  $str=trim($data);
  $str=preg_replace("/<(em.*?)>(.*?)<(\/em.*?)>/si","",$str);
  $str=eregi_replace("</*[^<>]*>", '', $str);//去掉html格式符号
  $str=str_replace("&nbsp;", '', $str);//去掉空格替换换行符
    $str=preg_replace("/\s{2}/", " ", $str);
     return $str;
}
function del($data){
  $data=preg_replace("/[Array]/", "", $data);
  return $data;
}
//define your token 
define("TOKEN", "weixin"); 
$wechatObj = new wechatCallbackapiTest(); 
//$wechatObj->valid();
$wechatObj->responseMsg(); 
   
class wechatCallbackapiTest 
{ 
    public function valid() 
    { 
        $echoStr = $_GET["echostr"]; 
   
        //valid signature , option 
        if($this->checkSignature()){ 
            echo $echoStr; 
            exit; 
        } 
    } 
   
    public function responseMsg() 
    { 
        //get post data, May be due to the different environments 
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"]; 
      
      
        //extract post data 
        if (!empty($postStr)){ 

                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA); 
                $fromUsername = $postObj->FromUserName; 
                $toUsername = $postObj->ToUserName; 
                $keyword = trim($postObj->Content); 
                $time = time(); 
          //查询网站内容，并赋值
                             //初始化curl  
$ch = curl_init() or die (curl_error());  
//设置URL参数  
curl_setopt($ch,CURLOPT_URL,"http://122.226.139.162:9090/oa/cms/"); 
//要求CURL返回数据  
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
//执行请求  
$result = curl_exec($ch) or die (curl_error());  
//取得返回的结果，并显示  
//echo $result;  
//echo curl_error($ch);  
//关闭CURL  
curl_close($ch);  
$pa = '%<div class="flow_top"*?>(.*?)<div class="flow_bottom">%si';
preg_match_all($pa,$result,$match);
$result = $match[1]; 
$data=array();
foreach($result as $val){
	$after=pregstring($val);
    $data.= ($after).'    ';
}
          //   $lastresult=del($data).$today;
          //   echo($data);
$textTpl = "<xml> 
                            <ToUserName><![CDATA[%s]]></ToUserName> 
                            <FromUserName><![CDATA[%s]]></FromUserName> 
                            <CreateTime>%s</CreateTime> 
                            <MsgType><![CDATA[%s]]></MsgType> 
<Content><![CDATA[医院最新公告\n %s END]]></Content> 
                            <FuncFlag>0</FuncFlag> 
                            </xml>";              
 
            if(!empty($postStr)) 
                { 
                    $msgType = "text"; 
 
                  $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, del($data)); 
                    echo $resultStr; 
                }else{ 
                    echo "none"; 
                } 
   
}else {
  echo "none";
  exit;
}
}         
  
    private function checkSignature() 
    { 
        $signature = $_GET["signature"]; 
        $timestamp = $_GET["timestamp"]; 
        $nonce = $_GET["nonce"];     
                   
        $token = TOKEN; 
        $tmpArr = array($token, $timestamp, $nonce); 
        sort($tmpArr); 
        $tmpStr = implode( $tmpArr ); 
        $tmpStr = sha1( $tmpStr ); 
           
        if( $tmpStr == $signature ){ 
            return true; 
        }else{ 
            return false; 
        } 
    } 
} 

?>