<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$delete = $obj->deleteSlider($_POST['art_id']);

	echo $delete;
?>