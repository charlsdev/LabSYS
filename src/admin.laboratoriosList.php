<?php 

   include "../php/restriccion.php";

   // require '../includes/DbConnect.php';
   // $db = new DbConnect();
   // $con = $db->connect();

   include "public/head.admin.php";

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
                     <th scope="col">Edit</th>
                  </tr>
               </thead>
                  
            </table>
         </div>

      </div>

      <br><br>
      <!-- Modal editar laboratorista -->
      <div class="modal fade" id="EditLab" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Modificar Laboratorio</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formLaboratoriosEdit">   
                  <div class="modal-body">
                     <b><label style="color:#000">Codigo : </label></b><br>
                     <input type="text" class="form-control" id="codigoLAB" name="codigoLAB" readonly required>
                     
                     <hr>
                     <b><label style="color:#000">Cedula : </label></b><br>
                     <input type="text" class="form-control" id="cedulaLAB" name="cedulaLAB" readonly required>
                     
                     <hr>
                     <b><label style="color:#000">Laboratorio : </label></b><br>
                     <input type="text" class="form-control" id="nameLAB" name="nameLAB" required>
                     
                     <hr>
                     <b><label style="color:#000">Direccion : </label></b><br>
                     <input type="text" class="form-control" id="direccionLAB" name="direccionLAB" required>

                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-danger" value="EDITAR" id="EDITAR"><b>MODIFICAR</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <?php
         include "public/body.admin.php";
      ?>

      <script src="admin.laboratoriosList.js"></script>
      <script src="../plugins/validation.js"></script>

   </body>
</html>