<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$published = $obj->publishPage($_POST['menu_id']);

	echo $published;
?>