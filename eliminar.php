<?php

	require_once 'app/init.php';

	if(isset($_GET['as'], $_GET['tarea']))
	{
		$as = $_GET['as'];
		$tarea = $_GET['tarea'];

		switch ($as)
		{
			case 'terminada':
				$consultaTerminar = $db-> prepare("
				DELETE FROM tareas
				WHERE IdTarea = :IdTarea
				AND IdUsuario = :IdUsuario
				");

				$consultaTerminar-> execute([
				'IdTarea'=>$tarea,
				'IdUsuario'=> $_SESSION['x']
				]);
			break;
		}
	}
header ('Location: tareas.php');
?>