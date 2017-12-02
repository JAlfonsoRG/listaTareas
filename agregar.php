<?php

require_once 'app/init.php';

if(isset($_POST['descripcion']))
{
	$name= trim($_POST['descripcion']);
	if(!empty($name))
	{
		$addedQuery = $db->prepare("
			INSERT INTO tareas (IdUsuario, descripcion, fecha)
			VALUES (:IdUsuario, :descripcion,NOW())
			");
		$addedQuery->execute([
			'descripcion'=>$name,
			'IdUsuario'=>$_SESSION['x']
			]);
	}
}
header('Location: tareas.php');
?>