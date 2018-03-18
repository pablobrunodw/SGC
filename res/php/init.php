<?php
	
	//Inicio de sesión
	session_start();

	//Cargo el FrameWork Gestor de BD
	require 'medoo.php';

	//Utilizo el renombr
	use Medoo\Medoo;

	try{
		// Inicio
		$database = new Medoo([
	    	'database_type' => 'mysql',
	    	'database_name' => 'u105379333_sgc',
	    	'server' => 'mysql.hostinger.com.ar',
	    	'username' => 'u105379333_sgc',
			'password' => 'miejaPESTITA2604'
		]);
	}catch(PDOExeption $e){
		echo 'No se pudo conectar a la base de datos';
	}
	

?>