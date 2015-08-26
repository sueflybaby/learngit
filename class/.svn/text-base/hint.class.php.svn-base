<?php
//include("../conn.php");
//$a=new hint();
//echo $a->responseMsg();

class Hint 
{ 

    public function responseMsg() 
    { 
    
		
		srand((double)microtime()*1000000);
		$a=rand(1,100);
		//echo "{$a}";
		$result = mysql_query("select * from hint where id = {$a}");       
		$row = mysql_fetch_assoc($result);//访问获取数据
	    //var_dump($row);
	    $resultStr = "\n\nHint ➟ ".$row['neirong'];
	    return $resultStr; 
	}         

} 

?>