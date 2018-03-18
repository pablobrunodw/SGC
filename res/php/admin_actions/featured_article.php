<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$published = $obj->featuredArticle($_POST['art_id']);

	echo $published;
?>