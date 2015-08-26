<?php

class Reply
{
	public function responseMsg($keyword){
		$keyword = trim($keyword);
		include_once("conn.php");  
        $postStr0 = "select * from reply WHERE z1 like '%$keyword%'";//查询语句
        $sql = mysql_query($postStr0);//获取数组类型结果
        while($row = mysql_fetch_array($sql)){
		          $data .= $row['z2'];
		     }  
		return $data;
	}
}

?>