<?php
   require '../includes/DbConnect.php';
   $db = new DbConnect();
   $con = $db->connect();

   $ID = $_POST['LAB'];

	$sql = "SELECT * FROM laboratorio WHERE laboratorio.cedula = '" . $ID . "'";

	$result = mysqli_query($con, $sql);

	$cadena = "<option value='0'>Seleccionar...</option>";

	while ($ver = $result->fetch_assoc()) {
		$cadena = $cadena . '<option value='. $ver["cod_laboratorio"]. '>'
								. utf8_encode($ver["nombre_lab"]) .
							'</option>';
	}
	
	echo  $cadena."</select>";
	
?>