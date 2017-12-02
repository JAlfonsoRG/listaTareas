<?php

require_once 'app/init.php';

$consultatareas= $db-> prepare("
    SELECT IdTarea, descripcion
    FROM tareas
    WHERE IdUsuario=:IdUsuario
");

$consultatareas->execute([
  'IdUsuario' => $_SESSION['x']
]);

$lista = $consultatareas->rowCount() ? $consultatareas: [];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <title> Lista de Tareas </title>
  </head>
  <body>
    <div class="list">
      <h1 class="header"> Lista de Tareas </h1>
      <?php if(!empty($lista)):?>
        <ul class="items">
          <?php foreach($lista as $tarea):?>
          <li> 
            <span class="item"> <?php echo $tarea['descripcion']?> </span>
            <?php if($tarea['IdTarea']): ?>
            <a href="eliminar.php?as=terminada&tarea=<?php echo $tarea['IdTarea']; ?>" class="done-button"> Tarea realizada</a>
            <?php endif;?>
          </li>
          <?php endforeach;?>
        </ul>
      <?php else: ?>
      <p>No tienes ninguna tarea agregada</p>
      <?php endif; ?>
      <br>
      <form method="post" action="agregar.php"> 
         <input type="text" name="descripcion" placeholder="Escribe una nueva tarea!" class="input" autocomplete="off" required>
         <input type="submit" value="Agregar" class="submit">
      </form>
      <br>
      <a href="sesion.html" class="exit">Salir</a>
    </div>
  </body>
</html>