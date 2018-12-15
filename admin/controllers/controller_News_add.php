<?php
	
	if(isset($_POST["newsAdd"])){
		echo "ОТПРАВУКА....";
		if (!class_exists('News'))	
			include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_News.php");
		$News = new News();
		$arrResult = $News->add($_POST["title"], $_POST["description"], $_POST["text"], $_POST["source"], $_FILES);
		if($arrResult["status"] !== true){
			echo $arrResult["result"];
		}
	}
?>
