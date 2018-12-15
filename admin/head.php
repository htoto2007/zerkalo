	<meta charset="utf-8">
	<?php 
		include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_Config.php"); 
		$Config = new Config();
		$Config->initialisation();
	?>
	<?php
		define(BRAND, 'ВИА "Зеркало" им. Я. Свердлова');
		define(SHORT_BRAND, 'ВИА "Зеркало"');
		define(DESCRIPTION, 'Вока́льно-инструмента́льный анса́мбль "Зеркало" им. Я. Свердлова - забористая интерпретация ритм-н-блюза в живом исполнении.');
	?>
	<title><?=BRAND;?></title>
	<meta name="Description" content='<?=DESCRIPTION;?>'>
	<meta name="yandex-verification" content="413368c290a28c6d" />

	<meta property="og:title" content="<?=BRAND;?>"/>
	<meta property="og:description" content="<?=DESCRIPTION;?>"/>
	<meta property="og:image" content="https://thezerkalo.ru/img/zerkalo_logo.png"/>
	<meta property="og:type" content="profile"/>
	<meta property="og:url" content= "https://thezerkalo.ru/" />

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link href="/admin/style.css" rel="stylesheet" type="text/css">