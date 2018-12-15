<?php include($_SERVER["DOCUMENT_ROOT"]."/pagePreStart.php"); ?>
<title><?=SHORT_BRAND;?> - Контакты</title>
<meta name="Description" content='<?=DESCRIPTION;?>'>
<meta property="og:title" content="<?=BRAND;?> - Контакты"/>
<meta property="og:description" content="Здесь вы сможете найти наиболее полную информацию как связаться с <?=BRAND;?>"/>
<meta property="og:image" content="https://thezerkalo.ru/img/zerkalo_logo.png"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content= "https://thezerkalo.ru/<?=$_GET["section"];?>" />
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageStart.php"); ?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-9 p-1 m-0">
			<h1 class="display-4">Контакты</h1>
			<p>
				<span itemprop="name"><?=BRAND;?></span> - 
				<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
					Группа находится в городе 
					<span itemprop="addressLocality">Санкт-Петербург</span>. 
					По всем вопросам, относительно нашего творчества и выступлений, вы можете обратиться по следующим контактам: <br>
					<span itemprop="telephone"> 
						<a href="tel:+7(921)845-75-44">+7 (921) 845-75-44</a>
					</span> 
					<a href="https://vk.com/im?sel=3891563" title="Евгений | ВКонтакте">
						<img src="/img/icons8-vk-48.png" style="width: 32px; height: auto;" alt="Евгений | ВКонтакте"/></a><br>
					<span itemprop="telephone">
						<a href="tel:+7(999)203-77-15">+7 (999) 203-77-15</a>
					</span> 
					<a href="https://vk.com/im?sel=171405715" title="Виталий | ВКонтакте">
						<img src="/img/icons8-vk-48.png" style="width: 32px; height: auto;" alt="Виталий | ВКонтакте"/></a>
				</span>
			</p>
			<p>
				С вопросами по поводу сайта заоните <span itemprop="telephone">
						<a href="tel:+7(999)203-77-15">+7 (999) 203-77-15</a>
					</span> 
					<a href="https://vk.com/im?sel=171405715" title="Виталий | ВКонтакте">
						<img src="/img/icons8-vk-48.png" style="width: 32px; height: auto;" alt="Виталий | ВКонтакте"/>
					</a>
			</p>
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
<?php include($_SERVER["DOCUMENT_ROOT"]."/pageEnd.php"); ?>