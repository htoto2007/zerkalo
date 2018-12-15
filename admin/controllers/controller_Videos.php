<?php
		if (!class_exists('Videos'))	
			include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_Videos.php");
		$Videos = new Videos();
?>
