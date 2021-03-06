<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title><?=SHORT_BRAND;?> - История появления</title>
<meta name="Description" content='<?=DESCRIPTION;?>'>
<meta property="og:title" content="<?=BRAND;?>"/>
<meta property="og:description" content="<?=DESCRIPTION;?>"/>
<meta property="og:image" content="https://thezerkalo.ru/img/zerkalo_logo.png"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content= "https://thezerkalo.ru/<?=$_GET["section"];?>" />
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageStart.php"); ?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-9 p-1 m-0">
			<h1 class="display-4">О нас!</h1>
			<p>Группа "Зеркало" была образована 16 апреля 2005 года, когда только что пришедший из армии гитарист Евгений Скачков собрал на репетиционной студии двух таких же молодых да ранних басиста Алексея Петрова и барабанщика Валерия Метлюкова. За неимением на тот момент вокалиста за микрофон пришлось встать самому основателю коллектива. Так родилась на свет группа «Зеркало».</p><p>
			И сразу в бой. Первое выступление состоялось буквально через две – три недели на площадке металлургического факультета Уральского Политехнического Института, института где начинал свой жизненный путь небезызвестный всем Борис Николаевич Ельцин. В течении двух лет был записан первый альбом «Завтра всё будет так же», на девяносто процентов состоящий из песен лидера коллектива Евгения Скачкова, и отражающий эпоху молодости мировозрений музыкантов группы, выдержанный в стиле советского подпольного рока. В это время «Зеркало» активно гастролирует по рок – фестивалям Свердловской области, а так же малоизвестным рок клубам. </p><p>
			Интересно это время может быть читателю и тем, что в это время группа экспериментирует с составом. В коллектив приходят клавишник Иван Осенков и гитарист Дмитрий Ткаченко. Оба в течении года покидают команду, по весьма любопытным обстоятельствам. Клавишник ломает руку в гримёрке перед выходом на сцену ДК Гагарина после конфликта с барабанщиком, а гитарист спустя какое – то время уходит по религиозным соображениям.</p><p>
			Коллектив, снова оставшись втроём успешно выступает на фестивале «Урал рок» и садиться за написание второго альбома под названием «Бесполезный альбом», который веет сухостью музыки и жёсткостью текстов. Так протекали первые годы группы «Зеркало».
			Второй период группы начинается в 2009 году со смены музыкантов. По причине переезда на Север группу покидает барабанщик, а по причине ухода в армию басист. Вот так вокалист Евгений Скачков находит двух новых соратников, басиста Сергея Берсенёва и барабанщика Вячеслава Матухно. С приходом этих музыкантов «Зеркало» становиться, как выразился один из поклонников «блюзовой группой, играющей рок». В течении года коллектив работает над старыми песнями, сыгрывается, даёт концерты. На непродолжительное время в Санкт – Петербург улетает Евгений Скачков, где пишутся подавляющее большинство песен со следующего альбома, за запись которого группа принимается в 2010 году, и который носит прямой блюзовый оттенок. Название альбома символично - «Витебский вокзал», взятый по названию первого вокзала Российской Империи построенного в Санкт – Петербурге. </p><p>
			Записав альбом, коллектив перебирается в город на Неве, где активно гастролирует по клубам, ищет новые знакомства и впечатления. Насытившись этим и по зову поклонников «Зеркало» возвращается в родные пенаты, в Екатеринбург. И начинается перерыв.
			Устав от творчества, концертов и переездов группа уходит в продолжительный отпуск. Команду покидает басист и уезжает жить не тужить под солнцем в Анапу. Евгений Скачков немного отойдя от электричества играет акустику по клубам и квартирникам города, а так же параллельно записывает акустический сольный альбом, с символическим опять же названием «Одинокий альбом». Пишутся новые песни. И так продолжается до 2012 года, пока в группу не приходит новый музыкант, басист Евгений Подгорбунских. И коллектив начинает свой третий этап истории, который ознаменован выступлениями по всему уральскому региону. В 2015 году группа буднично празднует десятилетие, как вдруг...
			Летом 2016 вокально - инструментальный ансамбль "Зеркало" им. Я. Свердлова, в лице Евгения Скачкова переезжает в город на Неве. С места в карьер в коллектив приходят басист Андрей Антропов и барабанщик Владимир Рыжов. Четвёртый этап истории начинается с записи двух альбомов, под названием "Бардак", и "Концерт у Обводного". На дворе 2018 год...</p>
		</div>
		<div class="col-md-3 p-2 m-0 rightMenu">
			<h1 class="display-5 text-light">Концерты</h1>
			<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts_selectCurrent.php"); ?>
			<?php
				$Concerts_selectCurrent_arrResult = $Concerts->selectCurrent("LIMIT 2");
				foreach($Concerts_selectCurrent_arrResult["result"] as $concert){?>
					<div class="card bg-black ">
						<h5 class="card-title"><a href="/concert/<?=$concert["date"];?>" title="<?=$concert["title"];?>"><?=$concert["date"];?>  <?=$concert["title"];?></a></h5>
						<img class="card-img-top" src="<?=$concert["picture"];?>" alt="Card image cap">
						<div class="card-body">
							<p class="card-text"><?=substr($concert["description"] , 0 , 500);?>
								<a href="/concert/<?=$concert["date"];?>" title="<?=$concert["title"];?>">...</a>
							</p>
						</div>
					</div>
				<?php } ?>
		</div>
	</div>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageEnd.php"); ?>