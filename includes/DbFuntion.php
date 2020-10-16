<?php
 
	class DbOperation
	{
		private $con;

		function __construct()
		{
			require_once dirname(__FILE__) . '/DbConnect.php';
			$db = new DbConnect();
			$this->con = $db->connect();
		}
	
		//Registra nuevo usuario 
		public function insertUser($cedula, $apellidos, $nombres, $edad, $direccion, $genero, $telefono, $email, $password, $privilegio, $estado, $codigo){
			$stmt = $this->con->prepare("INSERT INTO user(cedula, apellidos, nombres, edad, direccion, genero, telefono, email, codigo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssssss", $cedula, $apellidos, $nombres, $edad, $direccion, $genero, $telefono, $email, $codigo);

			$stmtt = $this->con->prepare("INSERT INTO login(username, password, privilegio, estado) VALUES (?, ?, ?, ?)");
			$stmtt->bind_param("ssss", $cedula, $password, $privilegio, $estado);
			
			if($stmt->execute() && $stmtt->execute())
				return true; 
			return false;
		}

		//Verifica que no este en la BD 
		public function exitUser($cedula){
			$stmt = $this->con->prepare("SELECT * FROM login WHERE username=?");
			$stmt->bind_param('s', $cedula);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 1) {
				return true;
			} else {
				return false;
			}
		}

		//Registra nuevo laboratorista 
		public function insertLab($cedula, $apellidos, $nombres, $edad, $direccion, $genero, $telefono, $email, $encPass, $privilegio, $estado, $codigo){
			$stmt = $this->con->prepare("INSERT INTO laboratorista(cedula, apellidos, nombres, edad, direccion, genero, telefono, email, codigo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssssss", $cedula, $apellidos, $nombres, $edad, $direccion, $genero, $telefono, $email, $codigo);

			$stmtt = $this->con->prepare("INSERT INTO login(username, password, privilegio, estado) VALUES (?, ?, ?, ?)");
			$stmtt->bind_param("ssss", $cedula, $encPass, $privilegio, $estado);
			
			if($stmt->execute() && $stmtt->execute()) {
				return true;
			} else {
				return false;
			} 
		}

		//Verifica que no exista el laboratorio en la BD 
		public function exitLab($codigoLab){
			$stmt = $this->con->prepare("SELECT * FROM laboratorio WHERE cod_laboratorio=?");
			$stmt->bind_param('s', $codigoLab);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 1) {
				return true;
			} else {
				return false;
			}
		}

		//Registra nuevo laboratorio 
		public function insertLaboratorio($codigoLab, $cedula, $nameLab, $direccionLab){
			$stmt = $this->con->prepare("INSERT INTO laboratorio(cod_laboratorio, cedula, nombre_lab, direccion) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $codigoLab, $cedula, $nameLab, $direccionLab);
			
			if($stmt->execute()) {
				return true;
			} else {
				return false;
			} 
		}

		//Registra nuevo administrador 
		public function insertAdmin($cedula, $apellidos, $nombres, $edad, $direccion, $genero, $telefono, $email, $encPass, $privilegio, $estado, $codigo){
			$stmt = $this->con->prepare("INSERT INTO administrador(cedula, apellidos, nombres, edad, direccion, genero, telefono, email, codigo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssssss", $cedula, $apellidos, $nombres, $edad, $direccion, $genero, $telefono, $email, $codigo);

			$stmtt = $this->con->prepare("INSERT INTO login(username, password, privilegio, estado) VALUES (?, ?, ?, ?)");
			$stmtt->bind_param("ssss", $cedula, $encPass, $privilegio, $estado);
			
			if($stmt->execute() && $stmtt->execute())
				return true; 
			return false;
		}

		//Verifica que no exista el reactivo en la BD 
		public function exitReac($codigoReact){
			$stmt = $this->con->prepare("SELECT * FROM parametros_reactivo WHERE cod_ensayo=?");
			$stmt->bind_param('s', $codigoReact);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 1) {
				return true;
			} else {
				return false;
			}
		}

		//Registra nuevo reactivo 
		public function insertReactivo($codigoReact, $codigo, $tipo, $reactivoR, $refeMenor, $refeMayor, $referenciaR){
			$stmt = $this->con->prepare("INSERT INTO parametros_reactivo(cod_ensayo, cod_laboratorio, tipo, ensayo, ref_menor, ref_mayor, referencia) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sssssss", $codigoReact, $codigo, $tipo, $reactivoR, $refeMenor, $refeMayor, $referenciaR);
			
			if($stmt->execute()) {
				return true;
			} else {
				return false;
			} 
		}

		//Verifica que no contraseña sea igual a la antigua en la DB 
		public function exitPass($encPassAnt, $cedula){
			$stmt = $this->con->prepare("SELECT * FROM login WHERE username=? AND password=?");
			$stmt->bind_param('ss', $cedula, $encPassAnt);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 1) {
				return true;
			} else {
				return false;
			}
		}

		//Cambio de contraseña
		public function changePass($encPassNue, $cedula){
			$stmt = $this->con->prepare("UPDATE login SET password=? WHERE username=?");
			$stmt->bind_param('ss', $encPassNue, $cedula);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		}

		//Registra nuevo examen 
		public function insertExamen($codigoGen, $cedulaPAC, $cedulaLAB, $laboratoriosCOD, $medicoTRA, $fechaEXA, $precioEXA, $observacionesEX){
			$stmt = $this->con->prepare("INSERT INTO informacion_examen(id_paciente, cedula_pac, cedula_lab, cod_laboratorio, medico_ref, fech_examen, precio, observaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssssss", $codigoGen, $cedulaPAC, $cedulaLAB, $laboratoriosCOD, $medicoTRA, $fechaEXA, $precioEXA, $observacionesEX);
			
			if($stmt->execute()) {
				return true;
			} else {
				return false;
			} 
		}

		//Verifica que no exista el resultado registrado en la BD 
		public function exitRES($codigoREA, $codigoEXA){
			$stmt = $this->con->prepare("SELECT * FROM resultado_examen WHERE cod_ensayo=? AND id_paciente=?");
			$stmt->bind_param('ss', $codigoREA, $codigoEXA);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows == 1) {
				return true;
			} else {
				return false;
			}
		}

		//Registra nuevo resultado 
		public function insertRES($codigoEXA, $codigoREA, $observacionRES, $resultadoEXAM){
			$stmt = $this->con->prepare("INSERT INTO resultado_examen(id_paciente, cod_ensayo, observaciones, resultado) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $codigoEXA, $codigoREA, $observacionRES, $resultadoEXAM);
			
			if($stmt->execute()) {
				return true;
			} else {
				return false;
			} 
		}

		//AD notificación o exámen
		public function examenAD($idPaciente, $update){
			$stmt = $this->con->prepare("UPDATE informacion_examen SET observaciones=? WHERE id_paciente=?");
			$stmt->bind_param('ss', $update, $idPaciente);
			
			if($stmt->execute()) {
				return true;
			} else {
				return false;
			} 
		}

	}

?>