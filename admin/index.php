<?php session_start();?>
<?php 
	if($_SESSION["pass"] == "")
		$_SESSION["pass"] = $_POST["pass"]; 
?>
<!doctype html>
<html>
<head>
	<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/head.php"); ?>
</head>
<body>
	<?php
		if($_SESSION["pass"] !== "1a9a9a2a"){
			$_SESSION["pass"] = "";
	?>
		<form method="post">
		  <div class="form-group">
			<label>Login</label>
			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	<?php 
			exit();
		} 
	?>;
	<header>
		<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/header.php"); ?>
	</header>
	<article>
		<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/models/model_pageSwitcher.php"); ?>
	</article>
	<footer>
		<?php include($_SERVER["DOCUMENT_ROOT"]."/admin/footer.php"); ?>
	</footer>
</body>
</html>