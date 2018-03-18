<?php 

	require 'Functions.php';
	$user	= new User_actions();

	$pages = $user->getSitePages();
	$config = $user->getSiteConfigs();

session_start();
if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
    
} else if(isset($_REQUEST['width']) AND isset($_REQUEST['height'])) {
    $_SESSION['screen_width'] = $_REQUEST['width'];
    $_SESSION['screen_height'] = $_REQUEST['height'];
    header('Location: ' . $_SERVER['PHP_SELF']);
} else {
    echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width+"&height="+screen.height;</script>';
}


	//Me fijo si no hay alguna vista ya seleccionada
	if (!isset($_GET['section'])) {
			//Obtengo novedades y slider

			$menuType = $user->getMenuType($_GET['alias']);
			if ($menuType[0]["mtype_id"] == 7) {
				$articles = $user->getFeatured();
			} elseif ($menuType[0]["mtype_id"] == 1) {
				$articles = $user->getRecentArticles($menuType[0]["element_id"]);
			} elseif ($menuType[0]["mtype_id"] == 2) {
				$article = $user->getHomeArticleInfo($menuType[0]["element_id"]);
			}
			
			
			$sliders = $user->getRecentSlider();
			$user->addVisitor($_SERVER["REMOTE_ADDR"]);


	}elseif (
		isset($_GET['section'])
		&& $_GET['section'] == "article"
	) {
		//Obtengo info de la puclicación
		$article = $user->getArticleInfo($_GET['alias']);
		$user->addVisit($_GET['alias']);

	}elseif (
		isset($_GET['section'])
		&& $_GET['section'] == "page"
	) {
		//Obtengo info de la puclicación
		$article = $user->getArticleInfo($_GET['alias']);

	}

?>