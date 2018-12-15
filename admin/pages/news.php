<?php
	//print_r($_POST);
	//print_r($_FILES);
	include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_News_add.php");
?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-12 p-1 m-0">
			<h1 class="display-4">Новости</h1>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="newsAdd">
				<div class="form-group">
    				<label>Название</label>
					<input type="text" name="title" placeholder="название..."></div>
				<div class="form-group">
    				<label>Описание...</label>
					<textarea class="form-control" placeholder="Описание..." name="description" rows="3"></textarea></div>
				<div class="form-group">
    				<label>Текст статьи</label>
					<textarea class="form-control" placeholder="Текст статьи" name="text" rows="10"></textarea></div>
				<div class="form-group">
    				<label>Ссылка на источник</label>
					<input type="text" name="source" placeholder="Ссылка на источник"></div>
				<div class="form-group">
    				<label>Картинка мероприятия</label>
					<input type="file" name="picture"></div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button></div>
			</form>
		</div>
	</div>
</div>