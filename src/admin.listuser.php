<?php 

   include "../php/restriccion.php";

   // require '../includes/DbFuntion.php';
   // $db = new DbOperation();

   include "public/head.admin.php";

?>
      <div class="container" style="color : #000">
         <br>
         <center><h2><b>Usuarios registrados</b></h2></center>
         
         <div class="table-responsive">
            <!-- class="table table-striped table-bordered display nowrap"  cellspacing="0" -->
            <table id="listUser" class="table table-striped table-bordered" style="color: #000">
               <thead class="table-success">
                  <tr>
                     <th scope="col">Cedula</th>
                     <th scope="col">Apellidos</th>
                     <th scope="col">Nombres</th>
                     <th scope="col">Edad</th>
                     <th scope="col">Direccion</th>
                     <th scope="col">Genero</th>
                     <th scope="col">Telefono</th>
                     <!-- <th scope="col">Email</th> -->
                     <!-- <th scope="col">Codigo</th> -->
                     <!-- <th scope="col">Codigo</th>
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
      <!-- Modal datos inexados -->
      <div class="modal fade" id="datos_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Datos Anexados</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
                  
               <div class="modal-body">
                  <b><label style="color:#000">Cedula : </label></b><br>
                  <input type="text" class="form-control" id="cedula" name="cedula" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Codigo : </label></b><br>
                  <input type="text" class="form-control" id="codigo" name="codigo" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Correo : </label></b><br>
                  <input type="text" class="form-control" id="email" name="email" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Privilegio : </label></b><br>
                  <input type="text" class="form-control" id="privilegio" name="privilegio" readonly>

                  <hr>
                  <b><label style="color:#000">Estado : </label></b><br>
                  <input type="text" class="form-control" id="estado" name="estado" readonly>
               </div>

               <div class="modal-footer" style="background:#D2D8D4;">
                  
               </div>
               <!-- <div class="modal-footer" style="background:#D2D8D4;">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
               </div> -->
            </div>
         </div>
      </div>

      <!-- Modal AD -->
      <div class="modal fade" id="AD_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Activar o Desactivar Usuario</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
                  
               <div class="modal-body">
                  <b><label style="color:#000">Cedula : </label></b><br>
                  <input type="text" class="form-control" id="cedulaU" name="cedulaU" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Estado Actual : </label></b><br>
                  <input type="text" class="form-control" id="estadoU" name="estadoU" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Estado Nuevo : </label></b><br>
                  <div class="grupo">
                     <select class="form-control" name="estadoM" id="estadoM" required>
                        <!-- <option selected>Seleccionar...</option> -->
                        <option value="Enabled">Activado</option>
                        <option value="Disabled">Desactivado</option>			
                        <!-- <option value="NDefinido">No Defido</option> -->
                     </select>
                  </div>
               </div>

               <div class="modal-footer" style="background:#D2D8D4;">
                  <button type="submit" class="btn btn-outline-danger" value="GUARDAR" id="GUARDAR"><b>GUARDAR</b></button>
               </div>
               <!-- <div class="modal-footer" style="background:#D2D8D4;">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
               </div> -->
            </div>
         </div>
      </div>

      <!-- Modal editar usuario -->
      <div class="modal fade" id="EditUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Datos Anexados</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
                  
               <div class="modal-body">
                  <b><label style="color:#000">Cedula : </label></b><br>
                  <input type="text" class="form-control" id="cedulaEU" name="cedulaEU" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Codigo : </label></b><br>
                  <input type="text" class="form-control" id="codigoEU" name="codigoEU" readonly>
                  
                  <hr>
                  <b><label style="color:#000">Apellidos : </label></b><br>
                  <input type="text" class="form-control" id="apellidosEU" name="apellidosEU" onkeypress="return letra(event)" required>
                  
                  <hr>
                  <b><label style="color:#000">Nombres : </label></b><br>
                  <input type="text" class="form-control" id="nombresEU" name="nombresEU" onkeypress="return letra(event)" required>
                  
                  <hr>
                  <b><label style="color:#000">Edad : </label></b><br>
                  <!-- <input type="date" class="form-control" id="edadCEU" name="edadCEU" max=<?php $hoy=date("Y-m-d"); echo $hoy;?>  onblur="calc()" required> -->
                  <input type="text" class="form-control" id="edadEU" name="edadEU" onkeypress="return numeros(event)" maxlength="3" required>

                  <hr>
                  <b><label style="color:#000">Direccion : </label></b><br>
                  <input type="text" class="form-control" id="direccionEU" name="direccionEU" required>
                  
                  <hr>
                  <b><label style="color:#000">Genero : </label></b><br>
                  <select class="form-control" name="generoEU" id="generoEU" required>
                     <!-- <option> Seleccionar... </option> -->
                     <option value="Masculino">Maculino</option>
                     <option value="Femenino">Femenino</option>			
                     <option value="NDefinido">No Defido</option>
                  </select>
                  
                  <hr>
                  <b><label style="color:#000">Telefono : </label></b><br>
                  <input type="text" class="form-control" id="telefonoEU" name="telefonoEU" onkeypress="return numeros(event)" maxlength="10" required>

                  <hr>
                  <b><label style="color:#000">Correo : </label></b><br>
                  <input type="text" class="form-control" id="emailEU" name="emailEU" required>
                  &nbsp;&nbsp;<span id="textUser"></span>
                  
               </div>

               <div class="modal-footer" style="background:#D2D8D4;">
                  <button type="submit" class="btn btn-outline-danger" value="EDITAR" id="EDITAR"><b>GUARDAR</b></button>
               </div>
            </div>
         </div>
      </div>

      <?php
         include "public/body.admin.php";
      ?>

      <script>
         $(document).ready(function() {
            listar();
         });

         var listar = function() {
            var table = $("#listUser").DataTable({
               "destroy": true,
               "ajax": {
                  "method": "POST",
                  "url": "../php/listarUser.php"
               },
               "columns": [
                  {"data": "cedula"},
                  {"data": "apellidos"},
                  {"data": "nombres"},
                  {"data": "edad"},
                  {"data": "direccion"},
                  {"data": "genero"},
                  {"data": "telefono"},
                  // {"data": "email"},
                  // {"data": "codigo"},
                  // {"data": "privilegio"},
                  // {"data": "estado"},
                  {"defaultContent": "<button type='button' class='modalU btn btn-outline-info' data-toggle='modal' data-target='#datos_usuario'><i class='fas fa-plus'></i></button>"},
                  {"defaultContent": "<button type='button' class='ED_User btn btn-outline-danger' data-toggle='modal' data-target='#EditUser'><i class='far fa-edit'></i></button>"},
                  {"defaultContent": "<button type='button' class='AD_User btn btn-outline-secondary'data-toggle='modal' data-target='#AD_Usuario'><i class='fas fa-audio-description'></i></button>"}
               ],
               "language": idioma,
               "responsive": "true"
               // ,
               // "dom": 'Bfrtilp',
               // "buttons": [
               //    {
               //       "extend": 'excel',
               //       "text": '<i class="far fa-file-excel"></i>',
               //       "titleAttr": 'Exportar a Excel',
               //       "className": 'btn btn-success'
               //    },
               //    {
               //       "extend": 'pdf',
               //       "text": '<i class="far fa-file-pdf"></i>',
               //       "titleAttr": 'Exportar a PDF',
               //       "className": 'btn btn-danger'
               //    }
               // ]
               
            });

            datos_Indexados("#listUser tbody", table);
            AD_User("#listUser tbody", table);
            Edit_User("#listUser tbody", table);

         }

         var datos_Indexados = function (tbody, table) {
            $(tbody).on("click", "button.modalU", function () {
               var data = table.row($(this).parents("tr")).data();
               
               var cedulaU = $("#cedula").val(data.cedula),
                  idusuario = $("#codigo").val(data.codigo),
                  correo = $("#email").val(data.email),
                  privilegio = $("#privilegio").val(data.privilegio),
                  estado = $("#estado").val(data.estado);

               // console.log(cedulaU);
            });
         }

         var AD_User = function (tbody, table) {
            $(tbody).on("click", "button.AD_User", function () {
               var data = table.row($(this).parents("tr")).data();
               
               var cedulaU = $("#cedulaU").val(data.cedula),
                  estado = $("#estadoU").val(data.estado),
                  estadoM = $("#estadoM").val(data.estado);

               // console.log(cedulaU);
            });
         }

         var Edit_User = function (tbody, table) {
            $(tbody).on("click", "button.ED_User", function () {
               var data = table.row($(this).parents("tr")).data();
               
               var cedulaEU = $("#cedulaEU").val(data.cedula),
                  apellidosEU = $("#apellidosEU").val(data.apellidos),
                  nombresEU = $("#nombresEU").val(data.nombres),
                  edadEU = $("#edadEU").val(data.edad),
                  direccionEU = $("#direccionEU").val(data.direccion),
                  generoEU = $("#generoEU").val(data.genero),
                  telefonoEU = $("#telefonoEU").val(data.telefono),
                  emailEU = $("#emailEU").val(data.email),
                  codigoEU = $("#codigoEU").val(data.codigo);

               console.log(codigoEU);
            });
         }

         var idioma = {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
               "sFirst":    "Primero",
               "sLast":     "Último",
               "sNext":     "Siguiente",
               "sPrevious": "Anterior"
            },
            "oAria": {
               "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
               "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
               "copy": "Copiar",
               "colvis": "Visibilidad"

            }
         }
      </script>

      <script src="AD.js"></script>
      <script src="edit_user.js"></script>
      <script src="../plugins/validation.js"></script>

   </body>
</html>