<?php
	//print_r($_POST);
	include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Videos_add.php");
	include($_SERVER["DOCUMENT_ROOT"]."/admin/controllers/controller_Concerts_selectEnded.php");
?>
<div class="container shadow-lg pl-3 mb-0">
	<div class="row">
		<div class="col-md-12 p-1 m-0">
			<h1 class="display-4">Видео</h1>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="videoAdd">
				<div class="form-group">
    				<label>Название</label>
					<input type="text" name="title" placeholder="название..."></div>
				<div class="form-group">
    				<label>Описание...</label>
					<textarea class="form-control" placeholder="Описание..." name="description" rows="3"></textarea></div>
				<div class="form-group">
    				<label>Текст комментария</label>
					<textarea class="form-control" placeholder="Текст комментария" name="text" rows="5"></textarea></div>
				<div class="form-group">
    				<label>Идентификатор видео на Youtube</label>
					<input type="text" name="youtube_link" placeholder="Ссылка на источник"></div>
				<div class="form-group">
    				<label>К какому концерту относится?</label>
					<select name="id_concert">
						<option> - выберите концерт - </option>
						<?php foreach($Concerts_selectEnded_arrResult["result"] as $concert){ ?>
							<option value="<?=$concert["id"];?>"><?=$concert["date"];?> <?=$concert["title"];?></option>
						<?php } ?>
					</select>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button></div>
			</form>
		</div>
	</div>
</div>