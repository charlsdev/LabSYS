<?php 

   include "../php/restriccion.php";

   // require '../includes/DbConnect.php';
   // $db = new DbConnect();
   // $con = $db->connect();

   include "public/head.admin.php";

?>

      <div class="container" style="color : #000">
         <br>
         
         <center><h2><b>Administradores registrados</b></h2></center>
         
         <div class="row">
            <div class="col-md-5">            
               <button id="btnNuevo" type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"><i class="far fa-address-book"></i>&nbsp;&nbsp;<b>Registrar</b></button>    
            </div>    
         </div>
         <br>

         <div class="table-responsive">
            <table id="listAdministrador" class="table table-striped table-bordered" style="color: #000">
               <thead class="table-warning">
                  <tr>
                     <th scope="col">Cedula</th>
                     <th scope="col">Apellidos</th>
                     <th scope="col">Nombres</th>
                     <th scope="col">Edad</th>
                     <th scope="col">Direccion</th>
                     <th scope="col">Genero</th>
                     <th scope="col">Telefono</th>
                     <!-- <th scope="col">Email</th>
                     <th scope="col">Cod.</th>
                     <th scope="col">Codigo</th>
                     <th scope="col">Codigo</th> -->
                     <th scope="col">Info</th>
                     <th scope="col">Edit</th>
                     <th scope="col">AD</th>
                  </tr>
               </thead>
                  
            </table>
         </div>

      </div>

      <br><br>
      <!-- Modal AD Administrador -->
      <div class="modal fade" id="AD_Administrador" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Activar o Desactivar Administrador</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
                  
               <div class="modal-body">
                  <form id="FormADAdmin">
                     <b><label style="color:#000">Cedula : </label></b><br>
                     <input type="text" class="form-control" id="cedulaA" name="cedulaA" readonly>
                     
                     <hr>
                     <b><label style="color:#000">Estado Actual : </label></b><br>
                     <input type="text" class="form-control" id="estadoA" name="estadoA" readonly>
                     
                     <hr>
                     <b><label style="color:#000">Estado Nuevo : </label></b><br>
                     <div class="grupo">
                        <select class="form-control" name="estadoAd" id="estadoAd" required>
                           <option value="Enabled">Activado</option>
                           <option value="Disabled">Desactivado</option>
                        </select>
                     </div>
                  </form>
               </div>

               <div class="modal-footer" style="background:#D2D8D4;">
                  <button type="submit" class="btn btn-outline-danger" value="GUARDAREstadoAdmin" id="GUARDAREstadoAdmin"><b>GUARDAR</b></button>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal Mas Info -->
      <div class="modal fade" id="Plus_Info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Activar o Desactivar Administrador</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
                  
               <div class="modal-body">
                  <b><label style="color:#000">Codigo : </label></b><br>
                  <input type="text" class="form-control" id="CodigoAPluss" name="CodigoAPluss" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Correo : </label></b><br>
                  <input type="text" class="form-control" id="EmailAPluss" name="EmailAPluss" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Privilegio : </label></b><br>
                  <input type="text" class="form-control" id="PrivilegioAPluss" name="PrivilegioAPluss" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Estado : </label></b><br>
                  <input type="text" class="form-control" id="EstadoAPluss" name="EstadoAPluss" readonly>
                  
               </div>

               <div class="modal-footer" style="background:#D2D8D4;">
                  <!-- <button type="submit" class="btn btn-outline-danger" value="GUARDAREstadoAdmin" id="GUARDAREstadoAdmin"><b>GUARDAR</b></button> -->
               </div>
            </div>
         </div>
      </div>

      <!-- Modal nuevo administrador -->
      <div class="modal fade" id="ADDAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Register Laboratorista</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formAdministrador">   
                  <div class="modal-body">
                     <b><label style="color:#000">Cedula : </label></b><br>
                     <input type="text" class="form-control" id="cedula" name="cedula" onkeypress="return numeros(event)" onkeyUp="return Cedula(this);" maxlength="10" required>
                     
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
                     <b><label style="color:#000">Telefono : </label></b><br>
                     <input type="text" class="form-control" id="telefono" name="telefono" onkeypress="return numeros(event)" maxlength="10" required>
                     
                     <hr>
                     <b><label style="color:#000">Correo : </label></b><br>
                     <input type="text" class="form-control" id="email" name="email" required>
                     &nbsp;&nbsp;<span id="text"></span>
                     
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

      <!-- Modal edit administrador -->
      <div class="modal fade" id="EDITAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Register Laboratorista</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formAdministradorEdit">   
                  <div class="modal-body">
                     <b><label style="color:#000">Cedula : </label></b><br>
                     <input type="text" class="form-control" id="cedulaAdmin" name="cedulaAdmin" onkeypress="return numeros(event)" onkeyUp="return Cedula(this);" maxlength="10" readonly required>
                     
                     <hr>
                     <b><label style="color:#000">Apellidos : </label></b><br>
                     <input type="text" class="form-control" id="apellidosAdmin" name="apellidosAdmin" onkeypress="return letra(event)" required>
                     
                     <hr>
                     <b><label style="color:#000">Nombres : </label></b><br>
                     <input type="text" class="form-control" id="nombresAdmin" name="nombresAdmin" onkeypress="return letra(event)" required>
                     
                     <hr>
                     <b><label style="color:#000">Edad : </label></b><br>
                     <input type="text" class="form-control" id="edadAdmin" name="edadAdmin" onkeypress="return numeros(event)" maxlength="3" required>

                     <hr>
                     <b><label style="color:#000">Direccion : </label></b><br>
                     <input type="text" class="form-control" id="direccionAdmin" name="direccionAdmin" required>
                     
                     <hr>
                     <b><label style="color:#000">Genero : </label></b><br>
                     <select class="form-control" name="generoAdmin" id="generoAdmin" required>
                        <option> Seleccionar... </option>
                        <option value="Masculino">Maculino</option>
                        <option value="Femenino">Femenino</option>			
                        <option value="NDefinido">No Defido</option>
                     </select>
                     
                     <hr>
                     <b><label style="color:#000">Telefono : </label></b><br>
                     <input type="text" class="form-control" id="telefonoAdmin" name="telefonoAdmin" onkeypress="return numeros(event)" maxlength="10" required>
                     
                     <hr>
                     <b><label style="color:#000">Correo : </label></b><br>
                     <input type="text" class="form-control" id="emailAdmin" name="emailAdmin" required>
                     &nbsp;&nbsp;<span id="textAdmin"></span>
                     
                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-danger" value="EDITAdmin" id="EDITAdmin"><b>EDITAR</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      
      <?php
         include "public/body.admin.php";
      ?>

      <script src="admin.adminLis.js"></script>
      <script src="../plugins/validation.js"></script>

   </body>
</html>