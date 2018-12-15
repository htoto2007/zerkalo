<?php
		if (!class_exists('Concerts'))	
			include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_Concerts.php");
		$Concerts = new Concerts();
		$Concerts_selectEnded_arrResult = $Concerts->selectEnded();
?>
