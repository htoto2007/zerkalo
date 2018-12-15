	<nav class="nav flex-column flex-sm-row">
		<a class="
				flex-sm-fill 
				accordion 
				text-sm-center 
				nav-link
				<?php if($_GET['p'] == 'about') echo 'active';?>
				<?php if($_GET['p'] == '') echo 'active';?>" 
		 href="?p=about">Главная</a>
		<a class="
				flex-sm-fill 
				text-sm-center 
				nav-link 
				<?php if($_GET['p'] == 'concerts') echo 'active';?>" 
		 href="?p=concerts">Предстоящие концерты</a>
		<a class="
				flex-sm-fill 
				text-sm-center 
				nav-link 
				<?php if($_GET['p'] == 'news') echo 'active';?>" 
		 href="?p=news">Новости</a>
		<a class="
				flex-sm-fill 
				text-sm-center 
				nav-link 
				<?php if($_GET['p'] == 'videos') echo 'active';?>" 
		 href="?p=videos">Видео</a>
	</nav>