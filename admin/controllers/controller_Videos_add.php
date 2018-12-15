<?php
	
	if(isset($_POST["videoAdd"])){
		echo "ОТПРАВУКА....";
		if (!class_exists('Videos'))	
			include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_Videos.php");
		$Videos = new Videos();
		$arrResult = $Videos->add($_POST["title"], $_POST["description"], $_POST["text"], $_POST["youtube_link"], $_POST["id_concert"]);
		if($arrResult["status"] !== true){
			echo $arrResult["result"];
		}
		
		echo "ОТПРАВУКА....";
		
		if (!class_exists('News'))	
			include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_News.php");
		include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts.php");
		$Concerts_selectById_arrResult = $Concerts->selectById($arrResult["result"]["id_concert"]);
		
		$News = new News();
		$arrResult = $News->addEvent(
			"Новое видео... ", 
			$_POST["description"], 
			"<a href='/video/".$arrResult["result"]["result"]["id"]."'>Смотреть видео...</a>", 
			"https://img.youtube.com/vi/".$_POST["youtube_link"]."/hqdefault.jpg"
		);
		if($arrResult["status"] !== true){
			echo $arrResult["result"];
		}
	}
?>