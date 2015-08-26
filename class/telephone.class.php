<?php
class Telephone
{
//---------- 调 用 查 询 通 讯 录 函 数 ---------- //
	public function responseMsg($keyword,$fromUsername){
          include_once("conn.php");  
          if ($this->Chkch($keyword)){
        $postStr0 = "select * from txl WHERE name like '%$keyword%'";//查询语句
          }else{
            $postStr0 = "select * from txl WHERE py like '%$keyword%' limit 0,20";//查询语句
          }
        $sel = "select * from user WHERE openid like '%$fromUsername%'";
        $sl = mysql_query($sel);
        $sql = mysql_query($postStr0);//获取数组类型结果
        $sa = mysql_fetch_array($sl);
	      if(!empty($sa)){
	      		
	          while($row = mysql_fetch_array($sql)){
              
		          $data .= $row['dep']."\n".$row['name']."\n".$row['long_tel']."\n".$row['short_tel']."\n";
  		    }
  		    if (empty($data)) {
  		        	$data = "未查询到此人，帮助我们完善，直接发送当事人、号码或科室。";
  		    }
     	  }else{
          	$data = "您尚未验证为本院人员。详情请直接联系管理员。";
          }
           
          
              
      return $data;
      }
      
      
  	private function Chkch($str){
	if (preg_match("/^[\x7f-\xff]+$/", $str)) {
	     return true;
	 }else{
	     return false;
	 }
	}
}
?>