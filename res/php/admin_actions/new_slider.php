<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$name_img = uniqid();

	$profile = $obj->getProfile($_SESSION['admin']);

	$save = $obj->saveArticle($_POST['txtTitle'], $_POST['txtCategory'], $_POST['txtArtIntro'], $_POST['artBody'],$name_img, $profile[0]['admin_id'] );

	if ($save > 0) {
		move_uploaded_file($_FILES['img_file']["tmp_name"] , "../../img/img_articles/" . $name_img . ".png");

		echo "true";
	} else {
		echo "false";
	};
	
?>