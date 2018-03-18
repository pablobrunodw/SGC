<?php 
	//Cargo archivo inicial
	require '../res/php/app_top_admin.php'; 

?>

<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Panel de Control</title>

	<link rel="stylesheet" type="text/css" href="../res/semantic/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="../res/css/style.css">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../res/css/grilla.css">
	<link rel="stylesheet" type="text/css" href="../res/css/grilla-prod.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	
</head>
<body class="admin-body">
	<?php 
		if (isset($_SESSION['admin'])) {
			require '../views/nav/main_admin_nav.php'; 
		}
	?>

	<?php 
		if (!isset($_SESSION['admin'])) {
			require '../views/admin/log-in.php';
		}elseif (
			isset($_SESSION['admin']) && 
			!isset($_GET['section'])
		) {
			require '../views/admin/main.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "articles"
		) {
			require '../views/admin/articles.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "add-article"
		) {
			require '../views/admin/add-article.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "categories"
		) {
			require '../views/admin/categories.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "add-category"
		) {
			require '../views/admin/add-category.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "sliders"
		) {
			require '../views/admin/sliders.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "add-slider"
		) {
			require '../views/admin/add-slider.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "users"
		) {
			require '../views/admin/users.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "pages"
		) {
			require '../views/admin/pages.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "add-page"
		) {
			require '../views/admin/add-page.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "edit-page"
		) {
			require '../views/admin/edit-page.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "edit-article"
		) {
			require '../views/admin/edit-article.php';
		}elseif (
			isset($_SESSION['admin']) && 
			isset($_GET['section']) &&
			$_GET['section'] == "configs"
		) {
			require '../views/admin/configs.php';
		}

	 ?>


<!--<script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>-->

<script src="../res/ckeditor/ckeditor.js"/>


<script type="text/javascript" src="../res/semantic/semantic.min.js"></script>
<script type="text/javascript" src="../res/js/admin.js"></script>


</body>
</html>