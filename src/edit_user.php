<?php
	// require_once 'DbFuntion.php';
	include '../includes/DbConnect.php';
	$db = new DbConnect();
   $con = $db->connect();
	
	/*recuperamos la variables*/
	$cedula = $_POST['cedula'];
	$apellidos = $_POST['apellidos'];
	$nombres = $_POST['nombres'];
	$edad = $_POST['edad'];
	$direccion = $_POST['direccion'];
	$genero = $_POST['genero'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];

	//Check connection
	if (!$con)
	{
		die("Conexion fallida: " . mysqli_connect_error($con));
   }
	
	$sql = "UPDATE user SET apellidos='$apellidos', nombres='$nombres', edad='$edad', direccion='$direccion', genero='$genero', telefono='$telefono', email='$email' WHERE cedula='$cedula'";

	if (mysqli_query($con, $sql))
	{
		//header ('location:user_notificaciones.php');
		
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
		
	}
	
	mysqli_close($con);
	
?>