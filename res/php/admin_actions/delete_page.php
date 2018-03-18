<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$delete = $obj->deletePage($_POST['menu_id']);

	echo $delete;
?>