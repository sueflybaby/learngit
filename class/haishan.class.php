<?php

/**
* 编号	开始时间	拥有者openid	状态（已认领1/未认领0）			完成时间
*id	starttime	openid	statue		finishtime
*
*openid id(数字)
*/
include("conn.php");

//$a = new haishan("jdshakdhsjad","我的20");

//$a->renling();

//$a->chakanrenling();

//$a->wanchengrenling();

//$a->quxiaorenling();

class haishan
{
	private $openid;

	private $id;

	private $time;
	
	function __construct($openid,$keyword)//初始化赋值
	{

		preg_match_all("/[0-9]+/",$keyword,$match01);

		//var_dump($keyword);
		//var_dump($match01);

		$keyword_final=$match01[0][0]; 

		//var_dump($keyword_final);

		$this->openid = $openid;

		$this->id = $keyword_final;

		$this->time = date("dS \of F Y h:i:s A");

		//echo "{$this->id} \n {$this->openid} \n {$this->time}";
	}

	public function admin($words){
		$check_name = mysql_query("select * from nickname where openid like '%$this->openid%'");

		if (mysql_num_rows($check_name)) {
			# code...
			if (strstr($words, "取消")) {
				return $this->quxiaorenling();
			}else if (strstr($words, "完成")) {
				return $this->wanchengrenling();
			}else if (strstr($words, "查看")) {
				if (empty($this->id)) {
					# code...
					return $this->xinyuan();

				}else{

					return $this->select_xinyuan();

				}
				
			}else if (strstr($words, "认领")) {
				return $this->renling();
			}else if (strstr($words, "管理")){
				return $this->chakanrenling();
				
			}
		}else{

			return "<a href='http://yyqn.sinaapp.com/personal/register.php?openid=".$this->openid."'>认领前请您先“点击本条信息”进行实名注册，然后再次认领！</a>";

		}

	}

	public function renling(){

		$check_id = mysql_fetch_assoc(mysql_query("select * from haishan_renling where id = '{$this->id}'"));

		if (!isset($check_id['openid']) && ($this->id >=1)) {

			mysql_query("insert into haishan_renling (id, starttime, openid, statue) values('{$this->id}','{$this->time}','{$this->openid}',1)");
		
			return "您对于 {$this->id}号微心愿 认领成功！感谢您对海山小海鸟的关怀。\n[取消方式]：例如发送“取消微心愿1”即可取消1号微心愿。\n[查看自己的微心愿]：发送“管理微心愿”。 ";//认领成功
		
		}else{

			return "您选择的 {$this->id}号微心愿 已被他人认领。还有其它的小海鸟，需要您的关怀。";//已被他人认领
		
		}

	}

	public function quxiaorenling(){
		if(!isset($this->id)){
			return "没有这样的心愿哦，请查证！";
		}else{
			$check_id = mysql_fetch_assoc(mysql_query("select * from haishan_renling where id = '{$this->id}'"));

			if (($this->id == $check_id['id']) && ($this->openid == $check_id['openid'])) {
				
				mysql_query("DELETE FROM haishan_renling WHERE id = '{$this->id}' LIMIT 1");

				return "您对于 {$this->id}号微心愿 的认领已取消。我们的小海鸟希望能飞得更高、更远。";//取消成功

			}else{

				return "取消操作无效，请核对。";
				//无效取消
			}			
		}


	}

	public function wanchengrenling(){

		$check_id = mysql_fetch_assoc(mysql_query("select * from haishan_renling where id = '{$this->id}'"));

		if (($this->id == $check_id['id']) || ($this->openid == $check_id['openid'])) {
			
			mysql_query("UPDATE haishan_renling SET finishtime = '{$this->time}' WHERE id = '{$this->id}'");

			return "感谢您对小海鸟的支持。他们的未来因您而更加美好。";//完成提交

		}else{
			
			return "未成功提交。";

		}
	}

	public function chakanrenling(){

		$check_id = mysql_query("select * from haishan_renling where openid like '%{$this->openid}%'");

		$str = "";

		if (mysql_num_rows($check_id)) {

			while ($val = mysql_fetch_assoc($check_id)) {

				$xinyuan_id = intval($val['id']) + 1;

				$xinyuan_id_content = mysql_fetch_assoc(mysql_query("select * from haishan_xinyuan where id = '{$xinyuan_id}'")); 


				//if ($val['finishtime']) {

					$str .= '微心愿：'.$val['id']." 【".$xinyuan_id_content['xinyuan']."】  开始于".$val['starttime'];

				//}else{

				//	$str .= '微心愿：'.$val['id']." 【".$xinyuan_id_content['xinyuan']."】  开始于".$val['starttime']." 尚未完成！\n\n";

				//}
				
			}

		}else{

			$str = "您尚未认领微心愿！小海鸟们真的很伤心。";
			
		}

		return $str;

	}

	public function xinyuan(){

		$num = mysql_fetch_assoc(mysql_query("select * from haishan_xinyuan where id = '1'"));

		$num_add = intval($num['xinyuan']);

		$num_add += 1;

		if ($num_add > 121) {
			$num_add = 1;
		}
		$num_add_renling = $num_add - 1;
        
		//确定是不是已经被认领，已认领则跳过
		$check_xinyuan = mysql_fetch_assoc(mysql_query("select * from haishan_renling where id = '{$num_add_renling}'"));

		if (!empty($check_xinyuan['id'])) {
            
			mysql_query("update haishan_xinyuan set xinyuan='{$num_add}' where id = '1'");
            
            return $this->xinyuan();
		}else{

			$num_xinyuan = mysql_fetch_assoc(mysql_query("select * from haishan_xinyuan where id = '{$num_add}'"));

			mysql_query("update haishan_xinyuan set xinyuan='{$num_add}' where id = '1'");

			return "微心愿".($num_add-1).":\n".$num_xinyuan['xinyuan']."\n\n1、继续发送“查看微心愿”查看更多心愿。\n2、定向查看请在‘查看微心愿’后面加上数字如‘查看微心愿2’。\n3、【认领方式】：发送’认领微心愿‘+几号，无需引号；";	
		}

	}
	
	private function select_xinyuan(){

		$num = intval($this->id)+1;

		if ($num<=120) {

			$num_xinyuan = mysql_fetch_assoc(mysql_query("select * from haishan_xinyuan where id = '{$num}'"));

			return "目前总数为120条微心愿。\n当前".($num-1)."号微心愿 :\n".$num_xinyuan['xinyuan']."\n\n1、继续发送“查看微心愿”查看更多心愿。\n2、定向查找请在‘查看微心愿’后面加上数字如‘查看微心愿2’；";
		}else{
			return "没有哦，看看别的吧！";
		}

	}

	public function canjiaxiaohaoniao($open_id){

		$num_of_canjia = mysql_query("select * from haishan_go where openid like '%{$open_id}%'");

		if (mysql_num_rows($num_of_canjia)) {
			return "您已参加了牵手小海鸟活动，等待我们的通知！";
		}else{
			mysql_query("insert into haishan_go (openid) values('{$open_id}')");
			return "感谢您参加牵手小海鸟活动，世界因您而美丽！";
		}
	}
}

?>