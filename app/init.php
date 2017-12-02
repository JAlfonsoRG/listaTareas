<?php

	session_start();

	$db = new PDO('mysql:dbname=lista_de_tareas; host=localhost', 'root', '');

	if(!isset($_SESSION['x']))
	{
		die('No has iniciado sesion');
	}
?>