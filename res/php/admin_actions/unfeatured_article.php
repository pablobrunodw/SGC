<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$unpublished = $obj->unFeaturedArticle($_POST['art_id']);

	echo $unpublished;
?>