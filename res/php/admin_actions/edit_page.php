<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$page = $obj->editPage($_POST['menu_id']);

	$_SESSION['page'] = $page;

	echo print_r($page);
?>