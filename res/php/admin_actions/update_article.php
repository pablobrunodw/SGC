<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	$name_img = uniqid();

	$profile = $obj->getProfile($_SESSION['admin']);

	if($_FILES['img_file']["name"] != ""){
		
		$save = $obj->updateArticle($_POST['txtId'],$_POST['txtTitle'],$_POST['txtAlias'], $_POST['txtCategory'], $_POST['txtArtIntro'], $_POST['artBody'],$_FILES["img_file"]["name"], $profile[0]['user_id'] );
		move_uploaded_file($_FILES['img_file']["tmp_name"] , "../../img/img_articles/" . $_FILES["img_file"]["name"]);
	}else{
		$save = $obj->updateArticleNoImg($_POST['txtId'],$_POST['txtTitle'], $_POST['txtAlias'], $_POST['txtCategory'], $_POST['txtArtIntro'], $_POST['artBody'],$profile[0]['user_id'] );

	};

	if ($save > 0) {
		

		echo "true";
	} else {
		echo "false";
	};
	
?>