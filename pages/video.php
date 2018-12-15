<?php 
	include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Videos.php");
	$Videos_selectById_arrResult = $Videos->selectById($_GET["subsection"]);
	if(!isset($Videos_selectById_arrResult["result"]["id"])) {
		include($_SERVER["DOCUMENT_ROOT"]."/pages/404.php");
	}
	include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts.php");

	$Concerts_selectById_arrResult = $Concerts->selectById($Videos_selectById_arrResult["result"]["id_concert"]);
?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title><?=$Videos_selectById_arrResult["result"]["title"];?> <?=$Concerts_selectById_arrResult["result"]["title"];?></title>
<meta name="Description" content='<?=DESCRIPTION;?>'>
<meta property="og:title" content="<?=$Videos_selectById_arrResult["result"]["title"];?> <?=$Concerts_selectById_arrResult["result"]["title"];?>"/>
<meta property="og:description" content="<?=$Videos_selectById_arrResult["result"]["description"];?>"/>
<meta property="og:image" content="https://img.youtube.com/vi/".<?=$Videos_selectById_arrResult["result"]["youtube_link"];?>."/hqdefault.jpg"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content= "https://thezerkalo.ru/<?=$_GET["section"];?>" />
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageStart.php"); ?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-9 p-1 m-0">
			<h1 class="display-4"><?=$Videos_selectById_arrResult["result"]["title"];?></h1>
			
					<div class="card  ">
						<div class="card-body">	
							<h3 class="card-title"><a href="/concert/<?=$Concerts_selectById_arrResult["result"]["date"];?>"><?=$Concerts_selectById_arrResult["result"]["title"];?></a></h3>
							<div class="video">			
								<iframe src="https://www.youtube.com/embed/<?=$Videos_selectById_arrResult["result"]["youtube_link"];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
							<p class="card-text bg-dark"><?=$Videos_selectById_arrResult["result"]["text"];?></p>
						</div>
					</div>
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