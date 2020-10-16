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

   //Datos del laboratorio
   $codigo = (isset($_POST['codigoR'])) ? $_POST['codigoR'] : '';
   $tipoR = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
   $reactivoR = (isset($_POST['reactivo'])) ? $_POST['reactivo'] : '';
   $refMenor = (isset($_POST['refeMenor'])) ? $_POST['refeMenor'] : '';
   $refMayor = (isset($_POST['refeMayor'])) ? $_POST['refeMayor'] : '';
   $referencia = (isset($_POST['referenciaR'])) ? $_POST['referenciaR'] : '';

   //Recibe opcion
   $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

   switch($opcion){
      case 1:    
            $query = "SELECT
                        laboratorio.cedula,
                        parametros_reactivo.cod_ensayo,
                        parametros_reactivo.tipo,
                        parametros_reactivo.ensayo,
                        parametros_reactivo.ref_menor,
                        laboratorio.nombre_lab,
                        parametros_reactivo.ref_mayor,
                        parametros_reactivo.referencia 
                     FROM
                        parametros_reactivo
                        INNER JOIN laboratorio ON parametros_reactivo.cod_laboratorio = laboratorio.cod_laboratorio 
                     WHERE
                        laboratorio.cedula = '" . $cedulaSession . "'";
            
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
            $sql = "UPDATE parametros_reactivo SET tipo='$tipoR', ensayo='$reactivoR', ref_menor='$refMenor', ref_mayor='$refMayor', referencia='$referencia' WHERE cod_ensayo='$codigo'";
            
            if ($res = mysqli_query($con, $sql))
            {
               echo $res;
            }
            else
            {
               echo $res;
            }                          
         break;
   }   
      
   mysqli_close($con);
  
?>