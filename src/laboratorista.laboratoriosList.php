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

   //Datos del reactivo
   $codigo = (isset($_POST['codigoLab'])) ? $_POST['codigoLab'] : '';
   $tipo = (isset($_POST['tipoR'])) ? $_POST['tipoR'] : '';
   $reactivoR = (isset($_POST['reactivo'])) ? $_POST['reactivo'] : '';
   $refeMenor = (isset($_POST['refMenor'])) ? $_POST['refMenor'] : '';
   $refeMayor = (isset($_POST['refMayor'])) ? $_POST['refMayor'] : '';
   $referenciaR = (isset($_POST['referencia'])) ? $_POST['referencia'] : '';

   $reaCod = substr($reactivoR, 0, 3);
   $reaCod = strtoupper($reaCod);
	$codigoReact = $codigo . $reaCod;

   //Recibe opcion
   $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

   switch($opcion){
      case 1:    
            $query = "SELECT
                        laboratorio.cod_laboratorio,
                        laboratorio.cedula,
                        laboratorio.nombre_lab,
                        laboratorio.direccion,
                        laboratorista.apellidos,
                        laboratorista.nombres 
                     FROM
                        laboratorio
                        INNER JOIN laboratorista ON laboratorio.cedula = laboratorista.cedula
                     WHERE laboratorio.cedula='" . $cedulaSession . "'
                     ORDER BY
                        laboratorio.nombre_lab ASC";
            
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
            $res = $ver->exitReac($codigoReact);
            if ($res == false) {
               $ver->insertReactivo($codigoReact, $codigo, $tipo, $reactivoR, $refeMenor, $refeMayor, $referenciaR);
               $res = false;
               echo $res;
            } else {
               echo $res;
            }                         
         break;
   }   
      
   mysqli_close($con);
  
?>