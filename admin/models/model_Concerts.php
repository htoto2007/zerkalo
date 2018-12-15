<?php
	class Concerts{
		
		public function add($date, $title, $description, $picture){
			$extension = pathinfo($picture['picture']['name']);
			$extension = $extension['extension'];
			$destination = "../upload/pic/".$date."-".time().".".$extension;
			$fileName = $picture['picture']['tmp_name'];
			if(!move_uploaded_file($fileName, $destination)){
				return array(
					"act" => __METHOD__." ".__LINE__,
					"status" => false,
					"result" => "Файл не загружен. (".$fileName." to ".$destination
				);
			}
			
			$url = '@(http(s)?)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
			$description = preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">$0</a>', $description);
			
			mysql_query("
				INSERT INTO tb_concerts 
				SET 
					date = '".$date."', 
					title = '".mysql_real_escape_string($title)."', 
					description = '".mysql_real_escape_string (nl2br($description))."', 
					picture = '".trim($destination, "..")."'"
			) or die(mysql_error());
			
			$arr = $this->selectById(mysql_insert_id());
			
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => $arr
			);
		}
		
		public function selectCurrent($limit){
			
			$query = mysql_query("
				SELECT * 
				FROM tb_concerts 
				WHERE 
					date >= '".date("Y-m-d", time())."' 
				ORDER BY date 
				".$limit) or die(mysql_error());
			
			$arr = array();
			for($i = 0; $i < mysql_num_rows($query); $i++){
				$arr[$i] = mysql_fetch_array($query);
			}
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => $arr
			);
		}
		
		public function selectById($id){
			
			$query = mysql_query("
				SELECT * 
				FROM tb_concerts 
				WHERE 
					id = '".$id."' "
				) or die(mysql_error());
			
			$arr = array();
			$arr = mysql_fetch_array($query);
			
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => $arr
			);
		}
		
		public function selectEnded(){
			
			$query = mysql_query("
				SELECT * 
				FROM tb_concerts 
				WHERE 
					date < '".date("Y-m-d", time())."' 
				ORDER BY date DESC"
			) or die(mysql_error());
			
			
			
			$arr = array();
			for($i = 0; $i < mysql_num_rows($query); $i++){
				$arr[$i] = mysql_fetch_array($query);
				
			}
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => $arr
			);
		}
		
		public function getByDate($date){
			
			$query = mysql_query("
				SELECT * 
				FROM tb_concerts 
				WHERE 
					date = '".$date."' 
				") or die(mysql_error());
			
			include("model_Videos.php");
			$Videos = new Videos();
			
			$arr = mysql_fetch_array($query);
			$arr["videos"] = $Videos->selectByIdConcert($arr["id"]);
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => $arr
			);
		}
	}
?>