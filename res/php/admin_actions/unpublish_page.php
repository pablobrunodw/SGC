<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$unpublished = $obj->unpublishPage($_POST['menu_id']);

	echo $unpublished;
?>