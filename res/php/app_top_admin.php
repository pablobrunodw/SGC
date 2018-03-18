<?php

	//Cargo el archivo de Funciones 
	require 'Functions.php';

	//Genero un usuario
	$admin = new Admin_Actions();


	//Obtener todo para el main
	if (
		isset($_SESSION['admin']) && 
		!isset($_GET['section'])
	){
		$usersCount 		= $admin->getUsersCount();
		$artCount			= $admin->getArtCount();
		$sliderCount		= $admin->getSlidersCount();
		$pageCount			= $admin->getPageCount();
		$visitorCount		= $admin->getVisitsCount();
		$profile 			= $admin->getProfile($_SESSION['admin']);
		$lastVisitors		= $admin->getLastVisitors();
		$popularArticles	= $admin->getPopularArticles();
	}

	//Obtener Categorias
	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "categories"
	){
		$categories = $admin->getCategories();
		$profile 			= $admin->getProfile($_SESSION['admin']);
	}

	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "articles"
	){
		$articles = $admin->getArticles();
		$profile 			= $admin->getProfile($_SESSION['admin']);
	}

	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "pages"
	){
		$pages = $admin->getPages();
		$profile 			= $admin->getProfile($_SESSION['admin']);
	}

	//Obtener sliders
	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "sliders"
	){
		$sliders = $admin->getSliders();
		$profile 			= $admin->getProfile($_SESSION['admin']);
	}

	//Obtener categorías para el combo de agregar nuevo artículo
	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "add-article"
	){
		$categories = $admin->getCategories();
		$profile 			= $admin->getProfile($_SESSION['admin']);
	}

	//Obtener categoría de slider
	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "add-slider"
	){
		$categories = $admin->getSliderCategory();
		$profile 			= $admin->getProfile($_SESSION['admin']);
	}

	//Obtener categoría de paginas
	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "add-page"
	){
		$menu_types 		= $admin->getPageCategory();
		$profile 			= $admin->getProfile($_SESSION['admin']);
		$parents_menus		= $admin->getParentsMenu();
		$articles			= $admin->getArticles();
		$categories			= $admin->getCategories();
	}

	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "edit-page"
	){
		$menu_types 		= $admin->getPageCategory();
		$profile 			= $admin->getProfile($_SESSION['admin']);
		//$page 		= $admin->getPageToEdit();
		$page 		= $_SESSION['page'];
		$parents_menus		= $admin->getParentsMenu();
		$articles			= $admin->getArticles();
		$categories			= $admin->getCategories();
	}

	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "edit-article"
	){
		$article		= $_SESSION['page'];
		$categories = $admin->getCategories();
		$profile 			= $admin->getProfile($_SESSION['admin']);
	}

	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "users"
	){
		$users = $admin->getUsers();
		$profile 			= $admin->getProfile($_SESSION['admin']);
	}

	//Obtener configuraciones globales
	if (
		isset($_SESSION['admin']) && 
		isset($_GET['section']) &&
		$_GET['section'] == "configs"
	){
		$config = $admin->getSiteConfigs();
		$profile 			= $admin->getProfile($_SESSION['admin']);
	}

?>