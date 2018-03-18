<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$name_img = uniqid();

	$profile = $obj->getProfile($_SESSION['admin']);

	$save = $obj->saveArticle($_POST['txtTitle'], $_POST['txtAlias'], $_POST['txtCategory'], $_POST['txtArtIntro'], $_POST['artBody'], $_FILES["img_file"]["name"], $profile[0]['user_id'] );

	if ($save > 0) {
		move_uploaded_file($_FILES['img_file']["tmp_name"] , "../../img/img_articles/" .  $_FILES["img_file"]["name"]);

		echo "true";
	} else {
		echo "false";
	};
	
?>