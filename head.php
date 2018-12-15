<?php 
	include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_Config.php"); 
	$Config = new Config();
	$Config->initialisation();

	define(BRAND, 'ВИА Зеркало им. Я. Свердлова');
	define(SHORT_BRAND, 'ВИА Зеркало');
	define(DESCRIPTION, 'Вока́льно-инструмента́льный анса́мбль Зеркало им. Я. Свердлова - забористая интерпретация ритм-н-блюза в живом исполнении.');
?>