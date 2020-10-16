<?php 
   include ("../includes/DbConnect.php");
   $salida = '';
   $observacion = 'Realizado';

   include_once '../includes/user.php';
	include_once '../includes/user_session.php';
	$userSession = new UserSession();
	$user = new User();

   $db = new DbConnect();
   $con = $db->connect();
	
   $cedula = $_SESSION['user'];
   
   $sql = " SELECT
               informacion_examen.id_paciente,
               informacion_examen.cedula_pac,
               informacion_examen.cod_laboratorio,
               informacion_examen.medico_ref,
               informacion_examen.fech_examen,
               informacion_examen.cedula_lab,
               laboratorio.nombre_lab,
               laboratorio.direccion,
               laboratorista.apellidos,
               laboratorista.nombres,
               informacion_examen.observaciones 
            FROM
               informacion_examen
               INNER JOIN laboratorio ON informacion_examen.cod_laboratorio = laboratorio.cod_laboratorio
               INNER JOIN laboratorista ON informacion_examen.cedula_lab = laboratorista.cedula 
            WHERE
               informacion_examen.cedula_pac = '" . mysqli_escape_string($con, $cedula) . "' AND informacion_examen.observaciones = '".mysqli_real_escape_string($con, $observacion)."'";
						
	if(isset($_POST['consulta']))
	{
      $q = $con->real_escape_string($_POST['consulta']);
      $sql = " SELECT
               informacion_examen.id_paciente,
               informacion_examen.cedula_pac,
               informacion_examen.cod_laboratorio,
               informacion_examen.medico_ref,
               informacion_examen.fech_examen,
               informacion_examen.cedula_lab,
               laboratorio.nombre_lab,
               laboratorio.direccion,
               laboratorista.apellidos,
               laboratorista.nombres 
            FROM
               informacion_examen
               INNER JOIN laboratorio ON informacion_examen.cod_laboratorio = laboratorio.cod_laboratorio
               INNER JOIN laboratorista ON informacion_examen.cedula_lab = laboratorista.cedula 
            WHERE
               informacion_examen.cedula_pac = '" . mysqli_escape_string($con, $cedula) . "'AND informacion_examen.id_paciente LIKE '".mysqli_real_escape_string($con, $q)."%' AND informacion_examen.observaciones = '".mysqli_real_escape_string($con, $observacion)."'";		
	}
	
	// $resultado = $con->query($sql);
   $resultado = mysqli_query($con, $sql);
   
	if($resultado)
	{
      $a = 1;
      $aux = 1;
      $aux1 = 2;
      $aux2 = 3;
      // $aux3 = 4;

      $salida.= '<div class="card-group">';

		while($fila = mysqli_fetch_assoc($resultado))
		{
         $id_paciente = $fila['id_paciente'];
			$medico_ref = $fila['medico_ref'];
			$fech_examen = $fila['fech_examen'];
			$nombre_lab = $fila['nombre_lab'];
			$direccion = $fila['direccion'];
			$apellidos = $fila['apellidos'];
         $nombres = $fila['nombres'];

         if ($a == 1 || $aux == $a) {
            $aux += 3;
            $salida.='  <div class="col-md-4">
                        <div class="card border-danger mb-3">
                           <div class="card-header bg-danger text-white">&nbsp;&nbsp;' . $id_paciente .'</div>
                           <div class="card-body text-danger">
                              <h5 class="card-title">'. $nombre_lab .'</h5>
                              <p class="card-text"><b>Laboratorista:</b><br>&nbsp;&nbsp;' . $nombres . " " . $apellidos . '</p>
                              <p class="card-text"><b>Direccion:</b><br>&nbsp;&nbsp;' . $direccion . '</p>
                              <p class="card-text"><b>Fecha Exámen:</b><br>&nbsp;&nbsp;' . $fech_examen . '</p>
                              <p class="card-text"><b>Medico Solicitante:</b><br>&nbsp;&nbsp;' . $medico_ref . '<b><a href="pdf.php?idEXA='.$id_paciente.'&laboratorio='.$nombre_lab.'&medico='.$medico_ref.'&fecha='.$fech_examen.'&laboratorista='.$apellidos." ".$nombres.'" class="btn btn-outline-danger btn-sm float-right" target="_blank" scrollbars="NO"><i class="far fa-file-pdf" style="font-size: 20px;"></i></a></b></p>
                              
                           </div>
                        </div>
                     </div>';
            
         }
         if ($a == 2 || $aux1 == $a) {
            $aux1 += 3;
            $salida.='  <div class="col-md-4">
                        <div class="card border-info mb-3">
                           <div class="card-header bg-info text-white">&nbsp;&nbsp;' . $id_paciente .'</div>
                           <div class="card-body text-info">
                              <h5 class="card-title">'. $nombre_lab .'</h5>
                              <p class="card-text"><b>Laboratorista:</b><br>&nbsp;&nbsp;' . $nombres . " " . $apellidos . '</p>
                              <p class="card-text"><b>Direccion:</b><br>&nbsp;&nbsp;' . $direccion . '</p>
                              <p class="card-text"><b>Fecha Exámen:</b><br>&nbsp;&nbsp;' . $fech_examen . '</p>
                              <p class="card-text"><b>Medico Solicitante:</b><br>&nbsp;&nbsp;' . $medico_ref . '<b><a href="pdf.php?idEXA='.$id_paciente.'&laboratorio='.$nombre_lab.'&medico='.$medico_ref.'&fecha='.$fech_examen.'&laboratorista='.$apellidos." ".$nombres.'" class="btn btn-outline-danger btn-sm float-right" target="_blank"><i class="far fa-file-pdf" style="font-size: 20px;"></i></a></b></p>
                           </div>
                        </div>
                     </div>';

         }
         if ($a == 3 || $aux2== $a) {
            $aux2 += 3;
            $salida.='  <div class="col-md-4">
                        <div class="card border-success mb-3">
                           <div class="card-header bg-success text-white">&nbsp;&nbsp;' . $id_paciente .'</div>
                           <div class="card-body text-success">
                              <h5 class="card-title">'. $nombre_lab .'</h5>
                              <p class="card-text"><b>Laboratorista:</b><br>&nbsp;&nbsp;' . $nombres . " " . $apellidos . '</p>
                              <p class="card-text"><b>Direccion:</b><br>&nbsp;&nbsp;' . $direccion . '</p>
                              <p class="card-text"><b>Fecha Exámen:</b><br>&nbsp;&nbsp;' . $fech_examen . '</p>
                              <p class="card-text"><b>Medico Solicitante:</b><br>&nbsp;&nbsp;' . $medico_ref . '<b><a href="pdf.php?idEXA='.$id_paciente.'&laboratorio='.$nombre_lab.'&medico='.$medico_ref.'&fecha='.$fech_examen.'&laboratorista='.$apellidos." ".$nombres.'" class="btn btn-outline-danger btn-sm float-right" target="_blank"><i class="far fa-file-pdf" style="font-size: 20px;"></i></a></b></p>
                           </div>
                        </div>
                     </div>';

         }
         // if ($a == 4 || $aux3 == $a) {
         //    $aux3 += 4;
         //    $salida.='  <div class="col-md-3">
         //                <div class="card border-secondary mb-3">
         //                   <div class="card-header bg-secondary text-white">&nbsp;&nbsp;' . $id_paciente .'</div>
         //                   <div class="card-body text-secondary">
         //                      <h5 class="card-title">Primary card title</h5>
         //                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
         //                   </div>
         //                </div>
         //             </div>';

         // }

         $a++;
      }

      $salida.= '</div>';		
	}
	else
	{
		$salida.="<br><h3 style='color: #000'>No existe este registro</h3>";
	}
	
	echo $salida;

   mysqli_free_result($resultado);
   // mysqli_close($con);
?>

