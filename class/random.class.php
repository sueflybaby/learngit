<?php

class rand_user{

	private $table;//取哪个表

	private $user_str; //取哪个指针

	public function __construct($mysql_table='nickname',$str='nick'){
		$this->table = $mysql_table;
		$this->user_str = $str;
	}

	public function getrandom(){
		
		include_once("../conn.php");

		$random_user_str = "select {$this->user_str} from {$this->table}";

		$random_user = mysql_query($random_user_str);

		$count = mysql_num_rows($random_user);

		srand((double)microtime()*1000000);

		$a=rand(0,($count-1));

		$rand_str = "select {$this->user_str} from {$this->table} where id like {$a}";

		$rand = mysql_fetch_assoc(mysql_query($rand_str));

		echo "在{$this->table}中随机诞生的是".$rand['user']."<br>";	
	}
}


$a = new rand_user('meizhouyida_chisu','user');

$a->getrandom();

$a->getrandom();
?>