<?php 
	require '../Functions.php';


	$user = new User_Actions;

	//Datos de logueo
	$login = $user->logIn($_POST['email'],$_POST['pass']);

	if ($login) {
		//Inicio de Sesión
		$_SESSION['user'] = $_POST['email'];
		echo "true";
	}else{
		echo "false";
	};
?>