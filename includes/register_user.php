<?php
	require_once 'DbFuntion.php';
	
	/*recuperamos la variables*/
	$cedula = $_POST['cedula'];
	$apellidos = $_POST['apellidos'];
	$nombres = $_POST['nombres'];
	$edad = $_POST['edad'];
	$direccion = $_POST['direccion'];
	$genero = $_POST['genero'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$privilegio = 'Usuario';
	$estado = 'Enabled';

	$cedF = substr($cedula, -3);
	$apeF = substr($apellidos, 0, 3);
	$apeF = strtoupper($apeF);
	
	$codigo = $apeF . $cedF;

	$db = new DbOperation;
	// $result = $db->exitUser($cedula);
	
	if ($db->exitUser($cedula)) {
      echo '<script type="text/javascript">
					alert("Usuario ya existe en el registro...");
					window.location="../src/inicio_sesion.php";
				</script>';
		// header('Refresh: 10; URL:../src/register.php');

   } else {
		if($db->insertUser($cedula, $apellidos, $nombres, $edad, $direccion, $genero, $telefono, $email, $password, $privilegio, $estado, $codigo)) {
			echo '<script type="text/javascript">
						alert("Registro guardado con exito...");
						window.location="../src/inicio_sesion.php";
					</script>';
			// header('location:../src/inicio_sesion.php');

		}else{
			echo '<script type="text/javascript">
						alert("No se pudo registrar...");
						window.location="../src/inicio_sesion.php";
					</script>';
			// header('location:../src/inicio_sesion.php');
			
		}
   }
	
?>