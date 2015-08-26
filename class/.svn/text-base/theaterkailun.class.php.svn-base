<?php
//凯伦剧院的影讯
class TheaterkaiLun{ 
   
    public function responseMsg() 
    { 
                             //初始化curl  
	$ch = curl_init () or die (curl_error());  
//echo "error1";  
//设置URL参数  
curl_setopt($ch,CURLOPT_URL,"http://www.yhkailun.com/?C=ShowTimes");  
//要求CURL返回数据  
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
//执行请求  
$result = curl_exec($ch) or die (curl_error());  
//取得返回的结果，并显示  javascript:void(0);
//echo $result;  
//echo curl_error($ch);  
//关闭CURL  
curl_close($ch);

$pa = '%<div class="showTimesItem"*?>(.*?)<div id="footerHolderBar"*?>%si';

		preg_match_all($pa,$result,$match);
		$result = $match[1]; 
		$data=array();
		if(!empty($result)){
		foreach($result as $val){
			$after=$this->pregstring($val);
		    $last = $last.$after."\n";
		
		}}
		        
		 $textTpl = "<a href='http://www.yhkailun.com/?C=ShowTimes'>楚门凯伦</a>\n咨询电话：81717555\n\n【影讯】\n".$last ."\n";  
		 return $textTpl;            
		   
	}         

	    public function pregstring($data){
			$str=trim($data);
		    $str=preg_replace("/\s+/", " ", $str);//去掉多余回车
		    $str=preg_replace('/<(li.*?)>(.*?)"/si',"",$str);
			$str=preg_replace('/<(span class="director".*?)>(.*?)<(\/span.*?)>/si',"",$str);
			$str=preg_replace('/<(span class="starts".*?)>(.*?)<(\/span.*?)>/si',"",$str);
			$str=preg_replace('/<(span class="showtimes".*?)>(.*?)<(\/span.*?)>/si',"",$str);

			  $str=eregi_replace("</*[^<>]*>", '', $str);//去掉html格式符号
			  $str=str_replace("&nbsp;", '', $str);//去掉空格替换换行符
			  $str=str_replace("&yen;", '', $str);//去掉空格替换换行
			  
			  $str=str_replace(">", "\n", $str);//去掉多余回车
		    $str=str_replace("2D", "", $str);//去掉多余回车
		    $str=str_replace("3D", "", $str);//去掉多余回车
		    $str=str_replace("4D", "", $str);//去掉多余回车

        return $str;
}
	 public function del($data){
	  $data=preg_replace("/[Array]/", "", $data);
	  return $data;
	  }


} 

?>