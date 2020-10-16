<?php
   include ("../includes/DbConnect.php");
   include ("../includes/DbFuntion.php");

   include_once '../includes/user.php';
	include_once '../includes/user_session.php';
	$userSession = new UserSession();
	$user = new User();

   $cedulaSession = $_SESSION['user'];

   $db = new DbConnect();
   $ver = new DbOperation;
   $con = $db->connect();

   //Datos del examen generar
   $codigoGen = (isset($_POST['codigoGen'])) ? $_POST['codigoGen'] : '';
   $cedulaPAC = (isset($_POST['cedulaPAC'])) ? $_POST['cedulaPAC'] : '';
   $cedulaLAB = (isset($_POST['cedulaLAB'])) ? $_POST['cedulaLAB'] : '';
   $laboratoriosCOD = (isset($_POST['laboratoriosCOD'])) ? $_POST['laboratoriosCOD'] : '';
   $medicoTRA = (isset($_POST['medicoTRA'])) ? $_POST['medicoTRA'] : '';
   $fechaEXA = (isset($_POST['fechaEXA'])) ? $_POST['fechaEXA'] : '';
   $precioEXA = (isset($_POST['precioEXA'])) ? $_POST['precioEXA'] : '';
   $observacionesEXA = (isset($_POST['observacionesEXA'])) ? $_POST['observacionesEXA'] : '';
   
   //AD notificacion o examen
   $examenCOD = (isset($_POST['examenCOD'])) ? $_POST['examenCOD'] : '';
   $examenOBS = (isset($_POST['examenOBS'])) ? $_POST['examenOBS'] : '';
   
   //Recibe opcion
   $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

   switch($opcion){
      case 1:    
            $query = "SELECT
                        informacion_examen.id,
                        informacion_examen.id_paciente,
                        informacion_examen.cedula_pac,
                        informacion_examen.cedula_lab,
                        informacion_examen.cod_laboratorio,
                        informacion_examen.medico_ref,
                        informacion_examen.fech_examen,
                        informacion_examen.precio,
                        informacion_examen.observaciones 
                     FROM
                        informacion_examen
                     WHERE informacion_examen.cedula_lab='" . $cedulaSession . "'
                     ORDER BY
                        informacion_examen.id_paciente ASC";
            
            $resultado = mysqli_query($con, $query);
         
            if (!$resultado) {
               die("ERROR");
            } else {
               $arreglo["data"] = [];
               while($data = mysqli_fetch_assoc($resultado)) {
                  $arreglo["data"][] = $data;
               }
               
               echo json_encode($arreglo);
            }

            mysqli_free_result($resultado);
         break;

         case 2:        
            $res = $ver->insertExamen($codigoGen, $cedulaPAC, $cedulaLAB, $laboratoriosCOD, $medicoTRA, $fechaEXA, $precioEXA, $observacionesEXA);
            if ($res == false) {
               echo $res;
            } else {
               echo $res;
            }                         
         break;

         case 3:        
            $res = $ver->examenAD($examenCOD, $examenOBS);
            if ($res == false) {
               echo $res;
            } else {
               echo $res;
            }                         
         break;
      
   }   
      
   mysqli_close($con);
  
?>