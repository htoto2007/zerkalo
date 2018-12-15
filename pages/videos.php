<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title><?=SHORT_BRAND;?> - Видео</title>
<meta name="Description" content='<?=DESCRIPTION;?>'>
<meta property="og:title" content="<?=BRAND;?> - Видео"/>
<meta property="og:description" content="<?=DESCRIPTION;?>"/>
<meta property="og:image" content="https://thezerkalo.ru/img/zerkalo_logo.png"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content= "https://thezerkalo.ru/<?=$_GET["section"];?>" />
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageStart.php"); ?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-9 p-1 m-0">
			<h1 class="display-4">Видео</h1>
			<?php 
				include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Videos.php");
				$Videos_select_arrResult = $Videos->select("LIMIT 5");
				include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts.php");
				foreach($Videos_select_arrResult["result"] as $video){ 
					$Concerts_selectById_arrResult = $Concerts->selectById($video["id_concert"]);
			?>
					<div class="card  ">
						<div class="card-body">	
							<h3 class="card-title"><?=$video["title"];?> - <a href="/concert/<?=$Concerts_selectById_arrResult["result"]["date"];?>"><?=$Concerts_selectById_arrResult["result"]["title"];?></a></h3>
							<div class="video">			
								<iframe src="https://www.youtube.com/embed/<?=$video["youtube_link"];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
							<p class="card-text bg-dark"><?=$video["text"];?></p>
						</div>
					</div>
			<?php } ?>
		</div>
		<div class="col-md-3 p-2 m-0 rightMenu">
			<h1 class="display-5 text-light">Прошедшие</h1>
			<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts_selectEnded.php"); ?>
			<?php
				foreach($Concerts_selectEnded_arrResult["result"] as $concert){?>
					<div class="card bg-black ">
						<h5 class="card-title"><a href="/concert/<?=$concert["date"];?>" title="<?=$concert["title"];?>"><?=$concert["date"];?>  <?=$concert["title"];?></a></h5>
						<img class="card-img-top" src="<?=$concert["picture"];?>" alt="Card image cap">
						<div class="card-body">
							<p class="card-text bg-dark"><?=substr($concert["description"] , 0 , 500);?>
								<a href="/concert/<?=$concert["date"];?>" title="<?=$concert["title"];?>">...</a>
							</p>
						</div>
					</div>
				<?php } ?>
		</div>
	</div>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageEnd.php"); ?>