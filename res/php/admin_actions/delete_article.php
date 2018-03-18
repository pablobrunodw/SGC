<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$delete = $obj->deleteArticle($_POST['art_id']);

	echo $delete;
?>