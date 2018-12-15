<?php
	class News{
		public function add($title, $description, $text, $source, $picture){
			
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
			
			if(empty($text)) return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => false,
				"result" => "text пуст"
			);
			
			if(empty($source)) $source = "HTTPS://".$_SERVER["HTTP_HOST"];
			
			$destination = "";
			
			if(!empty($picture)){
				$extension = pathinfo($picture['picture']['name']);
				$extension = $extension['extension'];
				$destination = "../upload/pic/news_".date("Y-m-d-H-i-s", time()).".".$extension;
				$fileName = $picture['picture']['tmp_name'];
				if(!move_uploaded_file($fileName, $destination)){
					return array(
						"act" => __METHOD__." ".__LINE__,
						"status" => false,
						"result" => "Файл не загружен. (".$fileName." to ".$destination
					);
				}
			}elseif(!empty($pictureURL)){
				$destination = $pictureURL;
			}else{
				return array(
					"act" => __METHOD__." ".__LINE__,
					"status" => false,
					"result" => "pictureURL и picture пуст"
				);
			}
			
			$url = '@(http(s)?)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
			$text = preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">$0</a>', $text);
			
			mysql_query("
				INSERT INTO tb_news 
				SET 
					date = '".date("Y-m-d H:i:s", time())."', 
					title = '".mysql_real_escape_string($title)."', 
					description = '".mysql_real_escape_string ($description)."',
					text = '".mysql_real_escape_string (nl2br($text))."',
					source = '".$source."',
					picture = '".trim($destination, "..")."'"
			) or die(mysql_error());
			
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => ""
			);
		}
		
		public function addEvent($title, $description, $text, $pictureURL){
			
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
			
			if(empty($text)) return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => false,
				"result" => "text пуст"
			);
			
			if(empty($source)) $source = "HTTPS://".$_SERVER["HTTP_HOST"];
			
			$destination = $pictureURL;
			
			mysql_query("
				INSERT INTO tb_news 
				SET 
					date = '".date("Y-m-d H:i:s", time())."', 
					title = '".mysql_real_escape_string($title)."', 
					description = '".mysql_real_escape_string ($description)."',
					text = '".mysql_real_escape_string (nl2br($text))."',
					picture = '".$destination."'"
			) or die(mysql_error());
			
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => ""
			);
		}
		
		public function select($limit){
			
			$query = mysql_query("
				SELECT * 
				FROM tb_news  
				ORDER BY date DESC 
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
		
		
		public function getByDate($date){
			
			$query = mysql_query("
				SELECT * 
				FROM tb_news 
				WHERE 
					date = '".$date."' 
				") or die(mysql_error());
			
			$arr = mysql_fetch_array($query);
			return array(
				"act" => __METHOD__." ".__LINE__,
				"status" => true,
				"result" => $arr
			);
		}
	}
?>