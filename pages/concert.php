<?php 
	include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts_selectCurrent.php");
	$Concerts_getByDate_arrResult = $Concerts->getByDate($_GET["subsection"]);
	if(!isset($Concerts_getByDate_arrResult["result"]["id"])) {
		include($_SERVER["DOCUMENT_ROOT"]."/pages/404.php");
		
	}
?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title><?=SHORT_BRAND;?> - <?=$Concerts_getByDate_arrResult["result"]["title"];?></title>
<meta name="Description" content='<?=$Concerts_getByDate_arrResult["result"]["date"];?>'>
<meta property="og:title" content="<?=SHORT_BRAND;?> - <?=$Concerts_getByDate_arrResult["result"]["title"];?>"/>
<meta property="og:description" content="<?=$Concerts_getByDate_arrResult["result"]["date"];?> "/>
<meta property="og:image" content="https://thezerkalo.ru<?=$Concerts_getByDate_arrResult["result"]["picture"];?>"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content= "https://thezerkalo.ru/<?=$_GET["section"];?>/<?=$_GET["subsection"];?>/" />
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageStart.php"); ?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-9 p-1 m-0">
			<h1 class="display-4"><?=$Concerts_getByDate_arrResult["result"]["title"];?></h1>
			<div class="card bg-black ">
				<img class="card-img-top" 
					 src="<?=$Concerts_getByDate_arrResult["result"]["picture"];?>" 
					 alt="<?=$Concerts_getByDate_arrResult["result"]["title"];?> <?=$Concerts_getByDate_arrResult["result"]["date"];?>">
				<div class="card-body">
					<p class="card-text bg-dark"><?=$Concerts_getByDate_arrResult["result"]["description"];?></p>
				</div>
			</div>
			<div class="row">
			<?php
				foreach($Concerts_getByDate_arrResult["result"]["videos"]["result"] as $video){ 
			?>
					<div class="col-md-4">	
						<h4><?=$video["title"];?></h4>
						<div class="video">			
							<iframe src="https://www.youtube.com/embed/<?=$video["youtube_link"];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
			<?php } ?>
			</div>
		</div>
		<div class="col-md-3 p-2 m-0 rightMenu">
			<h1 class="display-5 text-light">Концерты</h1>
			<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts_selectCurrent.php"); ?>
			<?php
				$Concerts_selectCurrent_arrResult = $Concerts->selectCurrent("");
				foreach($Concerts_selectCurrent_arrResult["result"] as $concert){?>
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