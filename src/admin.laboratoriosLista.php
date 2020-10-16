<?php
   include ("../includes/DbConnect.php");
   include ("../includes/DbFuntion.php");

   $db = new DbConnect();
   $ver = new DbOperation;
   $con = $db->connect();

   //Datos del laboratorio
   $codigoLAB = (isset($_POST['codigoLAB'])) ? $_POST['codigoLAB'] : '';
   $nameLAB = (isset($_POST['nameLAB'])) ? $_POST['nameLAB'] : '';
   $direccionLAB = (isset($_POST['direccionLAB'])) ? $_POST['direccionLAB'] : '';

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
                     -- WHERE laboratorio.cedula='0954142949'
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
            $sql = "UPDATE laboratorio SET nombre_lab='$nameLAB', direccion='$direccionLAB' WHERE cod_laboratorio='$codigoLAB'";
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