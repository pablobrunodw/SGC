<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();
		echo '<script>console.log($save)</script>';
	$save = $obj->savePage($_POST['txtTitle'],$_POST['txtAlias'],$_POST['txtTypeMenu'],$_POST['txtParent']);

	echo $save;
?>