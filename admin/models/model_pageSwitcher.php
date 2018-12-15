<?php
	switch($_GET["p"]){
		case "about":
		case "":
			include($_SERVER["DOCUMENT_ROOT"]."/admin/pages/about.php");
			break;
		case "concerts":
			include($_SERVER["DOCUMENT_ROOT"]."/admin/pages/concerts.php");
			break;
		case "videos":
			include($_SERVER["DOCUMENT_ROOT"]."/admin/pages/videos.php");
			break;
		case "news":
			include($_SERVER["DOCUMENT_ROOT"]."/admin/pages/news.php");
			break;
		default:
			
	}
?>