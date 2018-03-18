<?php 
	require '../Functions.php';
	$obj = new Admin_Actions();

	
	$logo_path = "/img/" . $_FILES['logo_file']["name"];
	$frontend_path = "/img/" . $_FILES['frontend_file']["name"];
	$video_path = "/videos/" . $_FILES['video_file']["name"];

	$save = $obj->updateConfigs($_POST['txtId'],$_POST['txtSiteName'], $_POST['txtSiteDesc'], $_POST['txtSiteKW']);


	if($_FILES['logo_file']["name"] != "" ){
		
		$logo = $obj->updateLogo($_POST['txtId'],$logo_path );
		move_uploaded_file($_FILES['logo_file']["tmp_name"] , "../../../img/" . $_FILES["logo_file"]["name"]);
	};
	if($_FILES['frontend_file']["name"] != "" ){
		
		$logo = $obj->updateFrontEnd($_POST['txtId'],$frontend_path );
		move_uploaded_file($_FILES['frontend_file']["tmp_name"] , "../../../img/" . $_FILES["frontend_file"]["name"]);
	};
	if($_FILES['video_file']["name"] != "" ){
		
		$video = $obj->updateHomeVideos($_POST['txtId'],$video_path );
		move_uploaded_file($_FILES['video_file']["tmp_name"] , "../../../videos/" . $_FILES["video_file"]["name"]);
	};

	if ($save > 0) {
		echo "true";
	} else {
		echo "false";
	};
	
?>