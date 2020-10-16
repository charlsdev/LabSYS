<?php
   include ("../includes/DbConnect.php");
   include ("../includes/DbFuntion.php");

   $db = new DbConnect();
   $ver = new DbOperation;
   $con = $db->connect();

   //Datos del laboratorio
   $codigoEXA = (isset($_POST['codigoEXA'])) ? $_POST['codigoEXA'] : '';
   $codigoREA = (isset($_POST['laboratorios'])) ? $_POST['laboratorios'] : '';
   $resultadoEXAM = (isset($_POST['resultadoEXAM'])) ? $_POST['resultadoEXAM'] : '';
   $observacionRES = (isset($_POST['observacion'])) ? $_POST['observacion'] : '';
   
   //Recibe opcion
   $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
   $verif = (isset($_POST['verif'])) ? $_POST['verif'] : '';

   switch($opcion){
      case 1:
         $query = "SELECT
                     resultado_examen.id_paciente,
                     resultado_examen.resultado,
                     resultado_examen.observaciones,
                     parametros_reactivo.tipo,
                     parametros_reactivo.ensayo 
                  FROM
                     parametros_reactivo
                     INNER JOIN resultado_examen ON resultado_examen.cod_ensayo = parametros_reactivo.cod_ensayo
                  WHERE resultado_examen.id_paciente='" . $verif . "'
                  ORDER BY
                     resultado_examen.id_paciente ASC";
         
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
         $res = $ver->exitRES($codigoREA, $codigoEXA);
         if ($res == false) {
            $ver->insertRES($codigoEXA, $codigoREA, $observacionRES, $resultadoEXAM);
            $res = false;
            echo $res;
         } else {
            echo $res;
         }  
      break;
   }
      
   mysqli_close($con);
  
?>