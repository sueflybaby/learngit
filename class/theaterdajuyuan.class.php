<?php 
//大剧院的影讯
class TheaterDaJuYuan{ 
   
    public function responseMsg() 
    { 
                             //初始化curl  
		$ch = curl_init() or die (curl_error());  
		//设置URL参数  
		curl_setopt($ch,CURLOPT_URL,"http://theater.mtime.com/China_Zhejiang_Province_Taizhou_Yuhuanxian/3186/");  
		//要求CURL返回数据  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
		//执行请求  
		$result = curl_exec($ch) or die (curl_error());  
		//取得返回的结果，并显示  
		//echo $result;  
		//echo curl_error($ch);  
		//关闭CURL  
		curl_close($ch);  
		$pa = '%<h3 class="yahei fl px20 lh15 normal"*?>(.*?)<!--time list end -->%si';
		preg_match_all($pa,$result,$match);
		$result = $match[1]; 
		$data=array();
		if(!empty($result)){
		foreach($result as $val){
			$after=$this->pregstring($val);
		    $last = $last.$after."\n";
		
		}}
		        
		 $textTpl = "玉环大剧院\n咨询电话：87207650\n短号：657355\n\n【影讯】\n".$last ."\n注：Array则提示当日影讯为空。";  
		 return $textTpl;            
		   
	}         

	  public function pregstring($data){
	  $str=trim($data);
	  $str=preg_replace("/<(em.*?)>(.*?)<(\/em.*?)>/si","",$str);
	  $str=eregi_replace("</*[^<>]*>", '', $str);//去掉html格式符号
	  $str=str_replace("&nbsp;", '', $str);//去掉空格替换换行符
	    $str=preg_replace("/\s{2}/", " ", $str);
	     return $str;
	     }
	
	 public function del($data){
	  $data=preg_replace("/[Array]/", "", $data);
	  return $data;
	  }


} 

?>