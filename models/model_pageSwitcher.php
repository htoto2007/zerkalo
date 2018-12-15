<?php
	switch($_GET["section"]){
		case "home":
		case "":
			include($_SERVER["DOCUMENT_ROOT"]."/pages/home.php");
			break;
		case "concerts":
			include($_SERVER["DOCUMENT_ROOT"]."/pages/concerts.php");
			break;
		case "concert":
			include($_SERVER["DOCUMENT_ROOT"]."/pages/concert.php");
			break;
		case "contacts":
			include($_SERVER["DOCUMENT_ROOT"]."/pages/contacts.php");
			break;
		case "videos":
			include($_SERVER["DOCUMENT_ROOT"]."/pages/videos.php");
			break;
		case "video":
			include($_SERVER["DOCUMENT_ROOT"]."/pages/video.php");
			break;
		case "history":
			include($_SERVER["DOCUMENT_ROOT"]."/pages/history.php");
			break;
		case "news":
			include($_SERVER["DOCUMENT_ROOT"]."/pages/news.php");
			break;
		case "news-more":
			include($_SERVER["DOCUMENT_ROOT"]."/pages/news_more.php");
			break;
		default:
			include($_SERVER["DOCUMENT_ROOT"]."/pages/404.php");
	}
?>
		