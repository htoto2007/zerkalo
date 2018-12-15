<?php 
	include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_News.php");
	$News_select_arrResult = $News->getByDate($_GET["subsection"]);
	if(!isset($News_select_arrResult["result"]["id"])) {
		include($_SERVER["DOCUMENT_ROOT"]."/pages/404.php");
		
	}
?>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title><?=$News_select_arrResult["result"]["title"];?></title>
<meta name="Description" content='<?=$News_select_arrResult["result"]["description"];?>'>
<meta property="og:title" content="Ближайшие концерты <?=BRAND;?>"/>
<meta property="og:description" content="<?=$News_select_arrResult["result"]["description"];?>"/>
<meta property="og:image" content="https://thezerkalo.ru<?=$News_select_arrResult["result"]["picture"];?>"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content= "https://thezerkalo.ru/<?=$_GET["section"];?>/<?=$_GET["subsection"];?>" />
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageStart.php"); ?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-9 p-1 m-0">
			<h1 class="display-4"><?=$News_select_arrResult["result"]["title"];?></h1>
			
				<div class="card  ">
					<div class="card-body">	
						<img 
							 class="card-img-top" 
							 src="<?=$News_select_arrResult["result"]["picture"];?>" 
							 alt="<?=$News_select_arrResult["result"]["date"];?> <?=$News_select_arrResult["result"]["title"];?>">
						<div class="card-body">
							<p class="card-text"><?=$News_select_arrResult["result"]["text"];?></p>
						</div>
						<?php if(!empty($News_select_arrResult["result"]["source"])){?>
						<p class="card-text bg-dark">Источник: <a href="<?=$News_select_arrResult["result"]["source"];?>"><?=$News_select_arrResult["result"]["source"];?></a></p>
						<?php } ?>
					</div>
				</div>
		</div>
		<div class="col-md-3 p-2 m-0 rightMenu">
			<h1 class="display-5 text-light">Новости</h1>
			<?php 
				include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_News.php");
				$News_select_arrResult = $News->select("LIMIT 5");
				foreach($News_select_arrResult["result"] as $news){ 
			?>
					<div class="card  ">
						<h5 class="card-title"><a href="/news-more/<?=date("Y-m-d-H-i-s", strtotime ($news["date"]));?>"><?=$news["date"];?> <?=$news["title"];?></a></h5>
						<div class="card-body">	
							<img class="card-img-top" src="<?=$news["picture"];?>" alt="Card image cap">
							<div class="card-body">
								<p class="card-text bg-dark"><?=substr($news["text"] , 0 , 500);?></p>
							</div>
						</div>
					</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageEnd.php"); ?>