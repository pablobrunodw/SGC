<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$published = $obj->publishArticle($_POST['art_id']);

	echo $published;
?>