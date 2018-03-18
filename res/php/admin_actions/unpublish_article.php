<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$unpublished = $obj->unpublishArticle($_POST['art_id']);

	echo $unpublished;
?>