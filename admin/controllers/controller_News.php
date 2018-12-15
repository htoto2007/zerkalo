<?php
		if (!class_exists('News'))	
			include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_News.php");
		$News = new News();
?>
