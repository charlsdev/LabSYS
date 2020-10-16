<?php
   include "../php/restriccion.php";

   $cedulaGen = $_SESSION['user'];

   include "public/head.laboratorista.php";

   $sql = "SELECT id FROM informacion_examen ORDER BY id DESC LIMIT 1";
   $resultado = mysqli_query($con, $sql);

   $row = mysqli_fetch_array($resultado);
   $maxcodigo = $row['id'];

   if ($maxcodigo < 9) {
      $maxcodigo = $maxcodigo + 1;
      $CodigoGEN = 'PAC000' . $maxcodigo;
   } else {
      if ($maxcodigo < 99) {
         $maxcodigo = $maxcodigo + 1;
         $CodigoGEN = 'PAC00' . $maxcodigo;
      } else {
         if ($maxcodigo < 999) {
            $maxcodigo = $maxcodigo + 1;
            $CodigoGEN = 'PAC0' . $maxcodigo;
         } else {
            if ($maxcodigo < 9999) {
               $maxcodigo = $maxcodigo + 1;
               $CodigoGEN = 'PAC' . $maxcodigo;
            } else {
               $CodigoGEN = "Maximo de registro alcanzado";
            }
         }
         
      }
   }

   mysqli_free_result($resultado);

   //Hora del servidor...
   // echo date('d/m/Y H:i:s');

?>

      <div class="container" style="color : #000">
         <br>
         <center><h2 style="color: black"><b>Resultados de Exámenes</b></h2></center>

         <div class="row">
            <div class="col-md-5">            
               <button id="btnGenerar" type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"><i class="fab fa-get-pocket"></i>&nbsp;&nbsp;<b>Generar</b></button>    
            </div>    
         </div>

         <br>

         <div class="table-responsive">
            <table id="listResultados" class="table table-striped table-bordered" style="color: #000">
               <thead class="table-success">
                  <tr>
                     <th scope="col">ID Pac.</th>
                     <th scope="col">Cedula</th>
                     <th scope="col">Cod. Lab.</th>
                     <th scope="col">Medico Ref.</th>
                     <th scope="col">Fecha</th>
                     <th scope="col">Precio</th>
                     <th scope="col">Observaciones</th>
                     <th scope="col">Add. Res.</th>
                     <th scope="col">AD. Notifi.</th>
                  </tr>
               </thead>
                  
            </table>
         </div>

      </div>
      
      <br><br>

      <!-- Modal generar nuevo examen -->
      <div class="modal fade" id="ADDGenerar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Generar examen</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formGenerar">   
                  <div class="modal-body">
                     <!-- <b><label style="color:#000">Cedula Laboratorista : </label></b><br> -->
                     <input type="hidden" class="form-control" id="cedulaLAB" name="cedulaLAB" value="<?php echo $_SESSION['user'];?>" readonly required>
                     
                     <!-- <hr> -->
                     <b><label style="color:#000">Codigo : </label></b><br>
                     <input type="text" class="form-control" id="codigoGen" name="codigoGen" value="<?php echo $CodigoGEN;?>" readonly required>
                     
                     <hr>
                     <b><label style="color:#000">Cedula : </label></b><br>
                     <input type="text" class="form-control" id="cedula" name="cedula" onkeypress="return numeros(event)" onkeyUp="return Cedula(this);" maxlength="10" required>

                     <hr>
                     <b><label style="color:#000">Laboratorios : </label></b> 
                     <select class="form-control" name="laboratorios" id="laboratorios" required>
                        <?php 
                           if (!$con)
                           {
                              die("Conexion fallida: " . mysqli_connect_error());
                           }
                           
                           $sql = "SELECT * FROM laboratorio WHERE laboratorio.cedula = '" . $cedulaGen . "'";
                           $result = mysqli_query($con, $sql);
                        ?>

                        <option disabled selected value="">Seleccionar...</option>

                        <?php
                           while ($ver = mysqli_fetch_assoc($result))
                           {
                              ?>
                              <option value="<?=$ver["cod_laboratorio"]?>">
                                 <?= utf8_encode($ver["nombre_lab"])?>
                              </option>
                              <?php
                           }
                        ?>
                     </select>
                     
                     <hr>
                     <b><label style="color:#000">Medico : </label></b><br>
                     <input type="text" class="form-control" id="medico" name="medico" onkeypress="return letraDR(event)" required>
                     
                     <hr>
                     <b><label style="color:#000">Fecha : </label></b><br>
                     <input type="date" class="form-control" id="fecha" name="fecha" min=<?php $hoy=date("Y-m-d"); echo $hoy;?> required>
                     
                     <hr>
                     <b><label style="color:#000">Precio : </label></b><br>
                     <input type="text" class="form-control" id="precio" name="precio" onkeypress="return numeros_date(event)" maxlength="6" required>
                     
                     <hr>
                     <b><label style="color:#000">Observaciones : </label></b><br>
                     <select name="observaciones" id="observaciones" required class="form-control">
                        <option disabled selected value="">Seleccionar...</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Realizado">Realizado</option>
                     </select>
                     <!-- <textarea class="form-control" rows="5" id="observaciones" name="observaciones" onkeypress="return letra(event)" required></textarea> -->

                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-danger" value="REGISTRAR" id="REGISTER" disabled><b>REGISTRAR</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <!-- Modal AD notificacion o examen -->
      <div class="modal fade" id="ADNotificacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Activar o desactivar notificacion</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formModificarNotificacion">   
                  <div class="modal-body">
                     <b><label style="color:#000">Codigo Examen: </label></b><br>
                     <input type="text" class="form-control" id="codigoExamen" name="codigoExamen" readonly required>
                     
                     <hr>
                     <b><label style="color:#000">Observaciones : </label></b><br>
                     <select name="observacionesExamen" id="observacionesExamen" required class="form-control">
                        <option disabled selected value="">Seleccionar...</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Realizado">Realizado</option>
                     </select>
                     
                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-success btn-sm" value="Notificacion" id="Notificacion"><b>ENVIAR NOTIFICACION</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      
      <?php
         include "public/body.admin.php";
      ?>
      
      <script src="laboratorista.resultadoList.js"></script>
      <script src="../plugins/validation.js"></script>

      <!-- <script language="javascript">
			$(document).ready(function(){
				$("#option").change(function () {
               $("#option option:selected").each(function () {
						var LAB = $('#cedulaLab').val();
						$.post("admin.listLabSelect.php", { LAB: LAB }, function(data){
							$("#laboratorios").html(data);
						});            
					});
				})
			});
			
		</script> -->

   </body>
</html>