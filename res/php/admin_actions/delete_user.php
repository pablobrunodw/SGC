<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$delete = $obj->deleteUser($_POST['user_id']);

	echo $delete;
?>