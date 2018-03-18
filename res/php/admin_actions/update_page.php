<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

		switch ($_POST['txtTypeMenu']) {
		case '1':
			$element = $_POST['txtCategories'];
			break;
		case '2':
			$element = $_POST['txtArticles'];
			break;
		
		default:
			$element = $_POST['txtCategories'];
			break;
	}

	$save = $obj->updatePage($_POST['txtId'], $_POST['txtTitle'], $_POST['txtAlias'], $_POST['txtTypeMenu'], $element, $_POST['txtParent']);

	echo $save;
	
?>