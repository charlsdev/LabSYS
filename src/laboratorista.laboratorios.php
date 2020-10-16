<?php 

   include "../php/restriccion.php";

   // require '../includes/DbConnect.php';
   // $db = new DbConnect();
   // $con = $db->connect();

   include "public/head.laboratorista.php";

?>

      <div class="container" style="color : #000">
         <br>
         
         <center><h2><b>Laboratorios registrados</b></h2></center>
         
         <br>

         <div class="table-responsive">
            <table id="listLaboratorios" class="table table-striped table-bordered" style="color: #000">
               <thead class="table-danger">
                  <tr>
                     <th scope="col">Codigo</th>
                     <th scope="col">Laboratorio</th>
                     <th scope="col">Cedula</th>
                     <th scope="col">Direccion</th>
                     <th scope="col">Apellidos</th>
                     <th scope="col">Nombres</th>
                     <th scope="col">R. Reactivo</th>
                  </tr>
               </thead>
                  
            </table>
         </div>

      </div>

      <br><br>
      <!-- Modal editar laboratorista -->
      <div class="modal fade" id="ADDReactivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Añadir Reactivo</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formReactivo">   
                  <div class="modal-body">
                     <!-- <label><label style="color:#000">Codigo Laboratorio : </label></b><br> -->
                     <input type="hidden" class="form-control" id="codigo" name="codigo" readonly required>

                     <!-- <hr> -->
                     <b><label style="color:#000">Tipo de Reactivo : </label></b><br>
                     <select class="form-control" name="tipoR" id="tipoR" required>
                        <option> Seleccionar... </option>
                        <option value="Sangre">Sangre</option>
                        <option value="Orina">Orina</option>			
                        <option value="Heces">Heces</option>
                     </select>

                     <div id="contenido"></div>
                     
                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-danger" value="EDITAR" id="EDITAR" disabled><b>GUARDAR</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <?php
         include "public/body.admin.php";
      ?>

      <script src="laboratorista.laboratoriosList.js"></script>
      <script src="../plugins/validation.js"></script>

      <script>
         $("#tipoR").change(function() {
            $("#contenido").show();
            var selected_val = $("#tipoR  option:selected").val();
            if (selected_val == "Sangre"){
               $("#contenido").load('laboratorista.SSelect.php');
               $("#EDITAR").prop("disabled", false);
            }else{
               if (selected_val == "Orina" || selected_val == "Heces"){
                  $("#contenido").load('laboratorista.HOSelect.php');
                  $("#EDITAR").prop("disabled", false);
               }
               else{
                  $("#contenido").load('admin.white.php');
                  $("#EDITAR").prop("disabled", true);
               }
            }
         });
      </script>

   </body>
</html>