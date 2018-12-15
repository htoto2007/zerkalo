<?php header("HTTP/1.0 404 Not Found"); ?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title>Страница не найдена!</title>
<meta name="Description" content='<?=DESCRIPTION;?>'>
<meta property="og:title" content="Страница не найдена!"/>
<meta property="og:description" content="Страница не найдена! 404"/>
<meta property="og:image" content="https://thezerkalo.ru/img/zerkalo_logo.png"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content= "https://thezerkalo.ru/<?=$_GET["section"];?>" />
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageStart.php"); ?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-9 p-1 m-0">
			<h1 class="display-4">404</h1>
			<div class="card bg-black ">
				<div class="card-body">
					<p class="card-text">
						К сожалению такая страница не найдена!
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 p-2 m-0 rightMenu">
			<h1 class="display-5 text-light">Уже скоро!</h1>
			<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts_selectCurrent.php"); ?>
			<?php
				$Concerts_selectCurrent_arrResult = $Concerts->selectCurrent("LIMIT 1");
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
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageEnd.php"); exit(); ?>