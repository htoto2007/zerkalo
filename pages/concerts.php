<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title><?=SHORT_BRAND;?> - Концерты</title>
<meta name="Description" content='<?=DESCRIPTION;?>'>
<meta property="og:title" content="Ближайшие концерты <?=BRAND;?>"/>
<meta property="og:description" content="<?=DESCRIPTION;?>"/>
<meta property="og:image" content="https://thezerkalo.ru/img/zerkalo_logo.png"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content= "https://thezerkalo.ru/<?=$_GET["section"];?>" />
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageStart.php"); ?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-9 p-1 m-0">
			<h1 class="display-4">Предстоящие концерты</h1>
			<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts_selectCurrent.php"); ?>
			<?php
				$Concerts_selectCurrent_arrResult = $Concerts->selectCurrent("LIMIT 10");
				foreach($Concerts_selectCurrent_arrResult["result"] as $concert){?>
					<div class="card bg-black ">
						<h3 class="card-title"><a href="/concert/<?=$concert["date"];?>"><?=$concert["date"];?>  <?=$concert["title"];?></a></h3>
						<img class="card-img-top" src="<?=$concert["picture"];?>" alt="Card image cap">
						<div class="card-body">
							<p class="card-text bg-dark"><?=$concert["description"];?></p>
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