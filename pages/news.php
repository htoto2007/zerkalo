<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title><?=SHORT_BRAND;?> - Новости</title>
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
			<h1 class="display-4">Новости</h1>
			<?php 
				include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_News.php");
				$News_select_arrResult = $News->select("LIMIT 5");
				foreach($News_select_arrResult["result"] as $news){ 
			?>
					<div class="card  ">	
						<h3 class="card-title"><a href="/news-more/<?=date("Y-m-d-H-i-s", strtotime ($news["date"]));?>"><?=$news["date"];?> <?=$news["title"];?></a></h3>
						<img class="card-img-top" src="<?=$news["picture"];?>" alt="Card image cap">
						<div class="card-body">
							<p class="card-text"><?=$news["text"];?></p>
						</div>
						<?php if(!empty($news["source"])){?>
						<p class="card-text bg-dark">Источник: <a href="<?=$news["source"];?>"><?=$news["source"];?></a></p>
						<?php } ?>
					</div>
			<?php } ?>
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