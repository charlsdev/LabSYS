<?php
   include ("../includes/DbConnect.php");
   include ("../includes/DbFuntion.php");

   $db = new DbConnect();
   $ver = new DbOperation;
   $con = $db->connect();

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
   
   $privilegio = 'Administrador';
	$estado = 'Enabled';
   
   //Codigo Laboratorista
	$cedF = substr($cedula, -3);
	$apeF = substr($apellidos, 0, 3);
	$apeF = strtoupper($apeF);
	$codigo = $apeF . $cedF;

   //Estado de login
   $cedulaA = (isset($_POST['cedulaA'])) ? $_POST['cedulaA'] : '';
   $estadoAd = (isset($_POST['estadoAd'])) ? $_POST['estadoAd'] : '';

   //Recibe opcion
   $opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

   switch($opcion){
      case 1:    
            $query = "SELECT
                        administrador.cedula,
                        administrador.apellidos,
                        administrador.nombres,
                        administrador.edad,
                        administrador.direccion,
                        administrador.genero,
                        administrador.telefono,
                        administrador.email,
                        administrador.codigo,
                        login.privilegio,
                        login.estado 
                     FROM
                        login
                        INNER JOIN administrador ON administrador.cedula = login.username 
                     ORDER BY
                        administrador.apellidos ASC";
            
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
            $sql = "UPDATE administrador SET apellidos='$apellidos', nombres='$nombres', edad='$edad', direccion='$direccion', genero='$genero', telefono='$telefono', email='$email' WHERE cedula='$cedula'";
            if ($res = mysqli_query($con, $sql))
            {
               $query = "SELECT
                           administrador.cedula,
                           administrador.apellidos,
                           administrador.nombres,
                           administrador.edad,
                           administrador.direccion,
                           administrador.genero,
                           administrador.telefono,
                           administrador.email,
                           administrador.codigo,
                           login.privilegio,
                           login.estado 
                        FROM
                           login
                           INNER JOIN administrador ON administrador.cedula = login.username
                        WHERE cedula='$cedula' 
                        ORDER BY
                           administrador.apellidos ASC";
            
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

               echo $res;
            }
            else
            {
               echo $res;
            }
         
         break;

         case 3:        
               $sql = "UPDATE login SET estado='$estadoAd' WHERE username='$cedulaA'";
               if ($res = mysqli_query($con, $sql))
               {
                  echo $res;
               }
               else
               {
                  echo $res;
               }                          
            break;

         case 4:
               $res = $ver->exitUser($cedula);
               if ($res == false) {
                  $ver->insertAdmin($cedula, $apellidos, $nombres, $edad, $direccion, $genero, $telefono, $email, $encPass, $privilegio, $estado, $codigo);
                  $res = false;
                  echo $res;
                  
               } else {
                  echo $res;
               }       
            break;
   }   
      
   mysqli_close($con);
  
?>