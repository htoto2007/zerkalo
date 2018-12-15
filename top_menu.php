	<nav class="nav flex-column flex-sm-row">
	<a 
		 class="
				flex-sm-fill 
				accordion 
				text-sm-center 
				nav-link
				<?php if($_GET['section'] == 'home') echo 'active';?>
				<?php if($_GET['section'] == '') echo 'active';?>" 
		 href="/home">Главная</a>
	<a class="
				flex-sm-fill 
				text-sm-center 
				nav-link 
				<?php if($_GET['section'] == 'history') echo 'active';?>" href="/history">История группы</a>
	<a class="
				flex-sm-fill 
				text-sm-center 
				nav-link 
				<?php if($_GET['section'] == 'concerts') echo 'active';?>" href="/concerts">Предстоящие концерты</a>
	<a class="
				flex-sm-fill 
				text-sm-center 
				nav-link 
				<?php if($_GET['section'] == 'news') echo 'active';?>" href="/news">Новости</a>
	<a class="
				flex-sm-fill 
				text-sm-center 
				nav-link 
				<?php if($_GET['section'] == 'videos') echo 'active';?>" href="/videos">Видео</a>
	<a class="
			flex-sm-fill 
			text-sm-center 
			nav-link 
			<?php if($_GET['section'] == 'contacts') echo 'active';?>" href="/contacts">Контакты</a>
	</nav>