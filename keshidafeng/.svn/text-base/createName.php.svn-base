<?php
//insert into score_pingwei (login_name,score) values("5555","score_3");
for ($i=1; $i < 81 ; $i++) { 
	# code...
	$score_name = 'score_'.$i;


	srand((double)microtime()*1000000);//create a random number feed.


		$authnum=mt_rand(100000,999999); // 10+26;

	
	//echo $authnum;//随机六位数

	echo "insert into score_pingwei (login_name,score) values('".$authnum."','".$score_name."');";

}
for ($i=1; $i < 81 ; $i++) { 
	# code...


	echo "<br>";

	echo "update toupiao set score_".$i." = 0;";


}
for ($i=60; $i < 81 ; $i++) { 
	# code...


	echo "<br>";

	echo "ALTER TABLE  `toupiao` ADD  `score_".$i."` INT NOT NULL DEFAULT  '0';";
}
?>
