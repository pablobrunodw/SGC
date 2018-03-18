<?php 
	require 'res/php/app_top.php';
 ?>


<!DOCTYPE html>
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Hojas de Estilo -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link rel="stylesheet" type="text/css" href="/res/css/icons/icon.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	


	</head>
	<body>
		<?php require 'views/nav/main_nav.php'; ?>

		<?php 
			if (!isset($_GET['section'])) {
				require 'views/home.php';
			}elseif (
				isset($_GET['section'])
				&& $_GET['section'] == "article"
			) {
				require 'views/article.php';
			}elseif (
				isset($_GET['section'])
				&& $_GET['section'] == "register"
			) {
				require 'views/register.php';
			}elseif (
				isset($_GET['section'])
				&& $_GET['section'] == "log-in"
			) {
				require 'views/log-in.php';
			}elseif (
				isset($_GET['section'])
				&& $_GET['section'] == "page"
			) {
				require 'views/page.php';
			}
		 ?>

		<link rel="stylesheet" type="text/css" href="/res/css/style.css">
		<link rel="stylesheet" type="text/css" href="/res/css/grilla.css">
		<link rel="stylesheet" type="text/css" href="/res/css/grilla-prod.css">
		

		<!-- Hojas de Scripts -->

		<script type="text/javascript" src="/res/js/main.js"></script>

		<!-- Smartsupp Live Chat script -->
		<!--<script type="text/javascript">
			var _smartsupp = _smartsupp || {};
			_smartsupp.key = 'a4a050c103b9e4fa6dfde9393451f3b5a9c371c5';
			window.smartsupp||(function(d) {
			  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
			  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
			  c.type='text/javascript';c.charset='utf-8';c.async=true;
			  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
			})(document);
		</script>-->
		
	</body>
</html>