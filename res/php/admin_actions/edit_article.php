<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$article = $obj->editArticle($_POST['art_id']);

	$_SESSION['page'] = $article;

	echo print_r($article);
?>