<?php
	class Videos{
		public function add($title, $description, $text, $youtubeLink, $idConcert){
			
			if(empty($title)) return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => false,
				"result" => "title пуст"
			);
			
			if(empty($description)) return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => false,
				"result" => "description пуст"
			);
			
			if(empty($youtubeLink)) return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => false,
				"result" => "youtubeLink пуст"
			);
			
			if(empty($idConcert)) return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => false,
				"result" => "idConcert пуст"
			);
			
			$url = '@(http(s)?)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
			$text = preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
			
			mysql_query("
				INSERT INTO tb_videos 
				SET 
					title = '".mysql_real_escape_string($title)."', 
					description = '".mysql_real_escape_string ($description)."',
					text = '".mysql_real_escape_string (nl2br($text))."',
					youtube_link = '".mysql_real_escape_string ($youtubeLink)."',
					id_concert = '".$idConcert."'"
			) or die(mysql_error());
			
			$arr = $this->selectById(mysql_insert_id());
			
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => $arr
			);
		}
		
		public function selectById($id){
			
			$query = mysql_query("
				SELECT * 
				FROM tb_videos 
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
		
		public function selectByIdConcert($idConcert){
			
			$query = mysql_query("
				SELECT * 
				FROM tb_videos 
				WHERE 
					id_concert = '".$idConcert."' "
				) or die(mysql_error());
			
			$arr = array();
			for($i = 0; $i < mysql_num_rows($query); $i++)
				$arr[$i] = mysql_fetch_array($query);
			
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => $arr
			);
		}
		
		public function select($limit){
			
			$query = mysql_query("
				SELECT * 
				FROM tb_videos  
				ORDER BY id DESC
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
	}
?>