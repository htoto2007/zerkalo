<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title><?=SHORT_BRAND;?> - Главная</title>
<meta name="Description" content='<?=DESCRIPTION;?>'>
<meta property="og:title" content="<?=BRAND;?>"/>
<meta property="og:description" content="<?=DESCRIPTION;?>"/>
<meta property="og:image" content="https://thezerkalo.ru/img/zerkalo_logo.png"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content= "https://thezerkalo.ru/<?=$_GET["section"];?>" />
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageStart.php"); ?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		
		<div class="col-md-4 p-2 m-0 rightMenu">
			<h1 class="display-5 text-light">Концерты</h1>
			<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts_selectCurrent.php"); ?>
			<?php
				$Concerts_selectCurrent_arrResult = $Concerts->selectCurrent("LIMIT 2");
				foreach($Concerts_selectCurrent_arrResult["result"] as $concert){?>
					<h5 class="card-title"><a href="/concert/<?=$concert["date"];?>" title="<?=$concert["title"];?>"><?=$concert["date"];?>  <?=$concert["title"];?></a></h5>
					<div class="card mb-3" >
						<img class="card-img-top" src="<?=$concert["picture"];?>" alt="Card image cap">
						<div class="card-body bg-dark">
							<p class="card-text "><?=substr($concert["description"] , 0 , 500);?>
								<a href="/concert/<?=$concert["date"];?>" title="<?=$concert["title"];?>">...</a>
							</p>
						</div>
					</div>
				<?php } ?>
		</div>
		
		<div class="col-md-4 p-2 m-0 rightMenu">
			<h1 class="display-5 text-light">Видео</h1>
			<?php 
				include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Videos.php");
				$Videos_select_arrResult = $Videos->select("LIMIT 5");
				include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts.php");
				foreach($Videos_select_arrResult["result"] as $video){ 
					$Concerts_selectById_arrResult = $Concerts->selectById($video["id_concert"]);
			?>
					<h5 class="card-title"><?=$video["title"];?> - <a href="/concert/<?=$Concerts_selectById_arrResult["result"]["date"];?>"><?=$Concerts_selectById_arrResult["result"]["title"];?></a></h5>
					<div class="card mb-3">
						<div class="video">
							<iframe src="https://www.youtube.com/embed/<?=$video["youtube_link"];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						<div class="card-body bg-dark">
							<p class="card-text "><?=$video["text"];?></p>
						</div>
					</div>
			<?php } ?>
		</div>
		
		<div class="col-md-4 p-2 m-0 rightMenu">
			<h1 class="display-5 text-light">Новости</h1>
			<?php 
				include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_News.php");
				$News_select_arrResult = $News->select("LIMIT 3");
				foreach($News_select_arrResult["result"] as $news){ 
			?>
					<h5 class="card-title"><a href="/news-more/<?=date("Y-m-d-H-i-s", strtotime ($news["date"]));?>"><?=$news["date"];?> <?=$news["title"];?></a></h5>
					<div class="card mb-3">
						<img class="card-img-top" src="<?=$news["picture"];?>" alt="Card image cap">
						<div class="card-body bg-dark">
							<p class="card-text bg-dark"><?=substr($news["text"] , 0 , 500);?></p>
						</div>
					</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageEnd.php"); ?>