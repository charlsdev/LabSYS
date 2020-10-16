<?php
	include ("../includes/DbFuntion.php");

   $db = new DbOperation;

   //Datos insert laboratorista
   $cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
   $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
   $nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
   $edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
   $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
   $genero = (isset($_POST['genero'])) ? $_POST['genero'] : '';
   $email = (isset($_POST['email'])) ? $_POST['email'] : '';
   $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
   $password = (isset($_POST['password'])) ? $_POST['password'] : '';
   $encPass = md5($password);

	$privilegio = 'Usuario';
	$estado = 'Enabled';

	$cedF = substr($cedula, -3);
	$apeF = substr($apellidos, 0, 3);
	$apeF = strtoupper($apeF);
	
	$codigo = $apeF . $cedF;

	$res = $db->exitUser($cedula);
	if ($res == false) {
		$db->insertUser($cedula, $apellidos, $nombres, $edad, $direccion, $genero, $telefono, $email, $encPass, $privilegio, $estado, $codigo);
		$res = false;
      echo $res;
   } else {
		// if($res == true) {
			echo $res;
		// }else{
		// 	echo 3;
		// }
   }
	
?>