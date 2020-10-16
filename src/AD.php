<?php
   include "../includes/DbConnect.php";
   $db = new DbConnect();
   $con = $db->connect();

   $cedula = $_POST['cedula'];
   $estadoN = $_POST['estado'];
   
   //Check connection
	if (!$con)
	{
		die("Conexion fallida: " . mysqli_connect_error($con));
   }
   
   $sql = "UPDATE login SET estado='$estadoN' WHERE username='$cedula'";
	
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