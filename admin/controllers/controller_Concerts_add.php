<?php
	
	if(isset($_POST["concertAdd"])){
		echo "ОТПРАВУКА....";
		if (!class_exists('Concerts'))	
			include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_Concerts.php");
		$Concerts = new Concerts();
		$arrResult = $Concerts->add($_POST["date"], $_POST["title"], $_POST["description"], $_FILES);
		if($arrResult["status"] !== true){
			echo $arrResult["result"];
		}
		
		//print_r($arrResult["result"]["result"]["picture"]);
		
		echo "ОТПРАВУКА....";
		if (!class_exists('News'))	
			include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_News.php");
		$News = new News();
		$arrResult = $News->addEvent(
			"Планируется концерт... ", 
			$_POST["description"], 
			"<a href='/concert/".$_POST["date"]."'>".$_POST["date"]." ".$_POST["title"]."</a>", 
			$arrResult["result"]["result"]["picture"]);
		if($arrResult["status"] !== true){
			echo $arrResult["result"];
		}
	}
?>
