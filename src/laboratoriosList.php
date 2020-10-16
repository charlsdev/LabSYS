<?php 
   include ("../includes/DbConnect.php");
   $salida = '';
   
   include_once '../includes/user.php';
	include_once '../includes/user_session.php';
	$userSession = new UserSession();
	$user = new User();

   $db = new DbConnect();
   $con = $db->connect();
	
   $sql = " SELECT
               laboratorio.nombre_lab,
               laboratorio.direccion,
               laboratorista.cedula,
               laboratorista.apellidos,
               laboratorista.nombres,
               laboratorista.email,
               laboratorista.telefono 
            FROM
               laboratorio
               INNER JOIN laboratorista ON laboratorio.cedula = laboratorista.cedula";
						
	if(isset($_POST['consulta']))
	{
      $q = $con->real_escape_string($_POST['consulta']);
      $sql = " SELECT
                  laboratorio.nombre_lab,
                  laboratorio.direccion,
                  laboratorista.cedula,
                  laboratorista.apellidos,
                  laboratorista.nombres,
                  laboratorista.email,
                  laboratorista.telefono 
               FROM
                  laboratorio
                  INNER JOIN laboratorista ON laboratorio.cedula = laboratorista.cedula 
               WHERE
                  laboratorio.nombre_lab LIKE '".mysqli_real_escape_string($con, $q)."%'";		
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
         $nombre_lab = $fila['nombre_lab'];
			$direccion = $fila['direccion'];
			$cedula = $fila['cedula'];
			$apellidos = $fila['apellidos'];
			$nombres = $fila['nombres'];
         $email = $fila['email'];
         $telefono = $fila['telefono'];

         if ($a == 1 || $aux == $a) {
            $aux += 3;
            $salida.='  <div class="col-md-4">
                        <div class="card border-danger mb-3">
                           <div class="card-header bg-danger text-white">&nbsp;&nbsp;Laboratorio #' . $a .'</div>
                           <div class="card-body text-danger">
                              <h5 class="card-title">'. $nombre_lab .'</h5>
                              <p class="card-text"><b>Laboratorista:</b><br>&nbsp;&nbsp;' . $nombres . " " . $apellidos . '</p>
                              <p class="card-text"><b>Direccion:</b><br>&nbsp;&nbsp;' . $direccion . '</p>
                              <p class="card-text"><b>Telefono</b><br>&nbsp;&nbsp;' . $telefono . '</p>
                              <p class="card-text"><b>Correo:</b><br>&nbsp;&nbsp;' . $email . '</p>
                           </div>  

                           <div class="card-footer bg-transparent border-danger">
                              <center>
                                 <button type="submit" class="btn btn-outline-info btn-sm"><b>&nbsp;&nbsp;<i class="fab fa-facebook-f" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                                 &nbsp;&nbsp;
                                 <button type="submit" class="btn btn-outline-success btn-sm"><b>&nbsp;&nbsp;<i class="fab fa-whatsapp" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                                 &nbsp;&nbsp;
                                 <button type="submit" class="btn btn-outline-danger btn-sm"><b>&nbsp;&nbsp;<i class="fab fa-youtube" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                                 &nbsp;&nbsp;
                                 <button type="submit" class="btn btn-outline-secondary btn-sm"><b>&nbsp;&nbsp;<i class="fas fa-at" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                              </center>
                           </div>  
                           
                        </div>
                     </div>';
            
         }
         if ($a == 2 || $aux1 == $a) {
            $aux1 += 3;
            $salida.='  <div class="col-md-4">
                        <div class="card border-info mb-3">
                           <div class="card-header bg-info text-white">&nbsp;&nbsp;Laboratorio #' . $a .'</div>
                           <div class="card-body text-info">
                              <h5 class="card-title">'. $nombre_lab .'</h5>
                              <p class="card-text"><b>Laboratorista:</b><br>&nbsp;&nbsp;' . $nombres . " " . $apellidos . '</p>
                              <p class="card-text"><b>Direccion:</b><br>&nbsp;&nbsp;' . $direccion . '</p>
                              <p class="card-text"><b>Telefono</b><br>&nbsp;&nbsp;' . $telefono . '</p>
                              <p class="card-text"><b>Correo:</b><br>&nbsp;&nbsp;' . $email . '</p>
                           </div>  

                           <div class="card-footer bg-transparent border-info">
                              <center>
                                 <button type="submit" class="btn btn-outline-info btn-sm"><b>&nbsp;&nbsp;<i class="fab fa-facebook-f" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                                 &nbsp;&nbsp;
                                 <button type="submit" class="btn btn-outline-success btn-sm"><b>&nbsp;&nbsp;<i class="fab fa-whatsapp" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                                 &nbsp;&nbsp;
                                 <button type="submit" class="btn btn-outline-danger btn-sm"><b>&nbsp;&nbsp;<i class="fab fa-youtube" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                                 &nbsp;&nbsp;
                                 <button type="submit" class="btn btn-outline-secondary btn-sm"><b>&nbsp;&nbsp;<i class="fas fa-at" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                              </center>
                           </div>
                        </div>
                     </div>';

         }
         if ($a == 3 || $aux2== $a) {
            $aux2 += 3;
            $salida.='  <div class="col-md-4">
                        <div class="card border-success mb-3">
                           <div class="card-header bg-success text-white">&nbsp;&nbsp;Laboratorio #' . $a .'</div>
                           <div class="card-body text-success">
                              <h5 class="card-title">'. $nombre_lab .'</h5>
                              <p class="card-text"><b>Laboratorista:</b><br>&nbsp;&nbsp;' . $nombres . " " . $apellidos . '</p>
                              <p class="card-text"><b>Direccion:</b><br>&nbsp;&nbsp;' . $direccion . '</p>
                              <p class="card-text"><b>Telefono</b><br>&nbsp;&nbsp;' . $telefono . '</p>
                              <p class="card-text"><b>Correo:</b><br>&nbsp;&nbsp;' . $email . '</p>
                           </div>  

                           <div class="card-footer bg-transparent border-success">
                              <center>
                                 <button type="submit" class="btn btn-outline-info btn-sm"><b>&nbsp;&nbsp;<i class="fab fa-facebook-f" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                                 &nbsp;&nbsp;
                                 <button type="submit" class="btn btn-outline-success btn-sm"><b>&nbsp;&nbsp;<i class="fab fa-whatsapp" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                                 &nbsp;&nbsp;
                                 <button type="submit" class="btn btn-outline-danger btn-sm"><b>&nbsp;&nbsp;<i class="fab fa-youtube" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                                 &nbsp;&nbsp;
                                 <button type="submit" class="btn btn-outline-secondary btn-sm"><b>&nbsp;&nbsp;<i class="fas fa-at" style="font-size: 15px;"></i>&nbsp;&nbsp;</b></button>
                              </center>
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
		$salida.="<br><h1 style=\"color: #000;\">No existe este registro</h1>";
	}
	
	echo $salida;

   mysqli_free_result($resultado);
   // mysqli_close($con);
?>

