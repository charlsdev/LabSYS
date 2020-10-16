<?php 

   include "../php/restriccion.php";

   // require '../includes/DbConnect.php';
   // $db = new DbConnect();
   // $con = $db->connect();

   include "public/head.admin.php";

?>

      <div class="container" style="color : #000">
         <br>
         
         <center><h2><b>Laboratoristas registrados</b></h2></center>
         
         <div class="row">
            <div class="col-md-5">            
               <button id="btnNuevo" type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"><i class="far fa-address-book"></i>&nbsp;&nbsp;<b>Registrar</b></button>    
            </div>    
         </div>
         <br>

         <div class="table-responsive">
            <table id="listLaboratoristas" class="table table-striped table-bordered" style="color: #000">
               <thead class="table-info">
                  <tr>
                     <th scope="col">Cedula</th>
                     <th scope="col">Apellidos</th>
                     <th scope="col">Nombres</th>
                     <th scope="col">Edad</th>
                     <th scope="col">Direccion</th>
                     <th scope="col">Genero</th>
                     <!-- <th scope="col">Email</th> -->
                     <th scope="col">Telefono</th>
                     <!-- <th scope="col">Cod.</th>
                     <th scope="col">Codigo</th>
                     <th scope="col">Codigo</th> -->
                     <th scope="col">Lab.</th>
                     <th scope="col">Edit</th>
                     <th scope="col">AD</th>
                  </tr>
               </thead>
                  
            </table>
         </div>

      </div>

      <br><br>

      <!-- Modal nuevo laboratorista -->
      <div class="modal fade" id="ADDLab" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Register Laboratorista</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formLaboratoristas">   
                  <div class="modal-body">
                     <b><label style="color:#000">Cedula : </label></b><br>
                     <input type="text" class="form-control" id="cedula" name="cedula" onkeypress="return numeros(event)" onkeyUp="return Cedula(this);" maxlength="10" required>
                     
                     <!-- <hr>
                     <b><label style="color:#000">Codigo : </label></b><br>
                     <input type="text" class="form-control" id="codigoEU" name="codigoEU" required> -->
                     
                     <hr>
                     <b><label style="color:#000">Apellidos : </label></b><br>
                     <input type="text" class="form-control" id="apellidos" name="apellidos" onkeypress="return letra(event)" required>
                     
                     <hr>
                     <b><label style="color:#000">Nombres : </label></b><br>
                     <input type="text" class="form-control" id="nombres" name="nombres" onkeypress="return letra(event)" required>
                     
                     <hr>
                     <b><label style="color:#000">Edad : </label></b><br>
                     <input type="text" class="form-control" id="edad" name="edad" onkeypress="return numeros(event)" maxlength="3" required>

                     <hr>
                     <b><label style="color:#000">Direccion : </label></b><br>
                     <input type="text" class="form-control" id="direccion" name="direccion" required>
                     
                     <hr>
                     <b><label style="color:#000">Genero : </label></b><br>
                     <select class="form-control" name="genero" id="genero" required>
                        <option> Seleccionar... </option>
                        <option value="Masculino">Maculino</option>
                        <option value="Femenino">Femenino</option>			
                        <option value="NDefinido">No Defido</option>
                     </select>
                     
                     <hr>
                     <b><label style="color:#000">Correo : </label></b><br>
                     <input type="text" class="form-control" id="email" name="email" required>
                     &nbsp;&nbsp;<span id="text"></span>

                     <hr>
                     <b><label style="color:#000">Telefono : </label></b><br>
                     <input type="text" class="form-control" id="telefono" name="telefono" onkeypress="return numeros(event)" maxlength="10" required>
                     
                     <hr>
                     <b><label style="color:#000">Password : </label></b><br>
                     <input type="password" class="form-control" id="password" name="password" minlength="6" maxlength="20" required>

                     
                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-danger" value="REGISTRAR" id="REGISTER" disabled><b>REGISTRAR</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <!-- Modal nuevo laboratorio y laboratorios por laboratorista -->
      <div class="modal fade" id="listLab" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Laboratorios</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formLaboratorios">   
                  <div class="modal-body">

                     <!-- <b><label style="color:#000">Cedula : </label></b><br> -->
                     <input type="hidden" class="form-control" id="cedulaLab" name="cedulaLab" maxlength="10" readonly>
                     
                     <b><label style="color:#000">Opcion : </label></b><br>
                     <select class="form-control" name="option" id="option" required>
                        <option> Seleccionar... </option>
                        <option value="0">Laboratorios</option>
                        <option value="1">Nuevo Laboratorio</option>
                     </select>
                     
                     <div id="contenido"></div>


                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-danger" value="REGISTRARLAB" id="REGISTERLAB"><b>REGISTRAR</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <!-- Modal AD -->
      <div class="modal fade" id="AD_Laboratorista" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Activar o Desactivar Laboratorista</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
                  
               <div class="modal-body">
                  <form id="FormAD">
                     <b><label style="color:#000">Cedula : </label></b><br>
                     <input type="text" class="form-control" id="cedulaL" name="cedulaL" readonly>
                     
                     <hr>
                     <b><label style="color:#000">Estado Actual : </label></b><br>
                     <input type="text" class="form-control" id="estadoL" name="estadoL" readonly>
                     
                     <hr>
                     <b><label style="color:#000">Estado Nuevo : </label></b><br>
                     <div class="grupo">
                        <select class="form-control" name="estadoLa" id="estadoLa" required>
                           <option value="Enabled">Activado</option>
                           <option value="Disabled">Desactivado</option>
                        </select>
                     </div>
                  </form>
               </div>

               <div class="modal-footer" style="background:#D2D8D4;">
                  <button type="submit" class="btn btn-outline-danger" value="GUARDAREstadoLab" id="GUARDAREstadoLab"><b>GUARDAR</b></button>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal editar laboratorista -->
      <div class="modal fade" id="EditLab" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Register Laboratorista</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formLaboratoristasEdit">   
                  <div class="modal-body">
                     <b><label style="color:#000">Cedula : </label></b><br>
                     <input type="text" class="form-control" id="cedulaLAB" name="cedulaLAB" onkeypress="return numeros(event)" onkeyUp="return Cedula(this);" maxlength="10" readonly required>
                     
                     <hr>
                     <b><label style="color:#000">Apellidos : </label></b><br>
                     <input type="text" class="form-control" id="apellidosLAB" name="apellidosLAB" onkeypress="return letra(event)" required>
                     
                     <hr>
                     <b><label style="color:#000">Nombres : </label></b><br>
                     <input type="text" class="form-control" id="nombresLAB" name="nombresLAB" onkeypress="return letra(event)" required>
                     
                     <hr>
                     <b><label style="color:#000">Edad : </label></b><br>
                     <input type="text" class="form-control" id="edadLAB" name="edadLAB" onkeypress="return numeros(event)" maxlength="3" required>

                     <hr>
                     <b><label style="color:#000">Direccion : </label></b><br>
                     <input type="text" class="form-control" id="direccionLAB" name="direccionLAB" required>
                     
                     <hr>
                     <b><label style="color:#000">Genero : </label></b><br>
                     <select class="form-control" name="generoLAB" id="generoLAB" required>
                        <option> Seleccionar... </option>
                        <option value="Masculino">Maculino</option>
                        <option value="Femenino">Femenino</option>			
                        <option value="NDefinido">No Defido</option>
                     </select>
                     
                     <hr>
                     <b><label style="color:#000">Correo : </label></b><br>
                     <input type="text" class="form-control" id="emailLAB" name="emailLAB" required>
                     &nbsp;&nbsp;<span id="textLAB"></span>

                     <hr>
                     <b><label style="color:#000">Telefono : </label></b><br>
                     <input type="text" class="form-control" id="telefonoLAB" name="telefonoLAB" onkeypress="return numeros(event)" maxlength="10" required>
                     
                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-danger" value="EDITAR" id="EDITAR"><b>GUARDAR</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <?php
         include "public/body.admin.php";
      ?>

      <script src="admin.laboratorios.js"></script>
      <script src="../plugins/validation.js"></script>

      <script language="javascript">
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
			
		</script>

      <script>
         $("#option").change(function() {
            $("#contenido").show();
            var selected_val = $("#option  option:selected").val();
            if (selected_val == 0){
               $("#contenido").load('admin.listLaboratorios.php');
               $("#REGISTERLAB").prop("disabled", true);
            }else{
               if (selected_val == 1){
                  $("#contenido").load('admin.registerLab.php');
                  $("#REGISTERLAB").prop("disabled", false);
               }
               else{
                  $("#REGISTERLAB").prop("disabled", true);
               }
            }
         });
      </script>

   </body>
</html>