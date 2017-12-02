<?php
	$conexion=mysql_connect("localhost","root","") 
  		or die("Problemas en la conexion");
	mysql_select_db("lista_de_tareas",$conexion) or
  		die("Problemas en la seleccion de la base de datos");
	//Recibir valores
	$Iduser = $_POST['Id'];
	$password = $_POST['pass'];

	$consulta = @mysql_query('
	SELECT * FROM usuarios
	WHERE IdUsuario="'.mysql_real_escape_string($Iduser).'" AND Password="'.mysql_real_escape_string($password).'"
	');
	if(@mysql_fetch_object($consulta)==true)
	{
		session_start();
		$_SESSION['x']=$Iduser;
?>
		<script>		
			alert('LOS DATOS SON CORRECTOS,BIENVENIDO!!');
			window.location="tareas.php";
		</script>
<?php		
	}
	else
	{
?>
		<script>		
			alert('EL USUARIO O PASSOWORD SON INCORRECTOS');
			window.location="sesion.html";
		</script>
<?php
	}
?>