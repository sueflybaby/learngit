<?php 
//$a = new TheaterHuanYa();
//$a -> responseMsg();
//楚门环亚的影讯
class TheaterHuanYa{ 
   
    public function responseMsg() 
    { 
                             //初始化curl  
		$ch = curl_init() or die (curl_error());  
		//设置URL参数  
		curl_setopt($ch,CURLOPT_URL,"http://www.tzcmhy.com/ch/gg.asp?id=10");  
		curl_setopt($ch, CURLOPT_HEADER, false);  
		//要求CURL返回数据  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
		//执行请求 
		$result = curl_exec($ch) or die (curl_error());  
		//取得返回的结果，并显示  
		//var_dump($result);  
		echo curl_error($ch);  
		//关闭CURL  
		curl_close($ch);  
		$pa = '%<SPAN.*?>(.*?)<\/SPAN.*?>%si';
		preg_match_all($pa,$result,$match);
		
		//var_dump($match);
		$result = $match[1]; 
		
		//var_dump($result);
		$data=array();
		if(!empty($result)){
		foreach($result as $val){
			$after=$this->pregstring($val);
		    $last = $last.$after."\n";
		
		}}
		        
		 $textTpl = "<a href='http://www.tzcmhy.com/ch/'>楚门环亚剧院</a>\n咨询电话：87497777\n【更新自环亚·2日影讯】".$last;  
		 return $textTpl;            
		   
	}         

	  public function pregstring($data){
	  $str=trim($data);
	  //$str=preg_replace("/<(em.*?)>(.*?)<(\/em.*?)>/si","",$str);
	  $str=eregi_replace("</*[^<>]*>", '', $str);//去掉html格式符号
	  $str=str_replace("&nbsp;", '', $str);//去掉空格替换换行
	  $str=iconv('gbk','utf-8', $str);
	  return $str;
	     }


} 

?>