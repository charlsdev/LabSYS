<?php
   include "../php/restriccion.php";

   // require '../includes/DbFuntion.php';
   // $db = new DbOperation();

   include "public/head.laboratorista.php";
?>

      <div class="container" style="color : #000">
         <br>
         <center><h2 style="color: black"><b>Reactivos Registrados</b></h2></center>
         <!-- <div class="row">
            <div class="col-md-5">            
               <button id="btnNuevo" type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"><i class="far fa-address-book"></i>&nbsp;&nbsp;<b>Registrar Reactivo</b></button>    
            </div>    
         </div> -->
         <br>

         <div class="table-responsive">
            <table id="listHecesReactivos" class="table table-striped table-bordered" style="color: #000">
               <thead class="table-warning">
                  <tr>
                     <th scope="col">Laboratorio</th>
                     <th scope="col">Cod. Reactivo</th>
                     <th scope="col">Tipo</th>
                     <th scope="col">Reactivo</th>
                     <th scope="col">V. Ref. -</th>
                     <th scope="col">V. Ref. +</th>
                     <th scope="col">V. Ref.</th>
                     <th scope="col">Edit</th>
                  </tr>
               </thead>
                  
            </table>
         </div>

      </div>
      
      <br><br>

      <!-- Modal nuevo laboratorista -->
      <div class="modal fade" id="EditRHeces" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Register Laboratorista</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formRHeces">   
                  <div class="modal-body">
                     <input type="hidden" class="form-control" id="codigo" name="codigo" readonly required>

                     <b><label style="color:#000">Tipo de Reactivo : </label></b><br>
                     <select class="form-control" name="tipoR" id="tipoR" required>
                        <option> Seleccionar... </option>
                        <option value="Sangre">Sangre</option>
                        <option value="Orina">Orina</option>			
                        <option value="Heces">Heces</option>
                     </select>
                     
                     <hr>
                     <b><label style="color:#000">Reactivo : </label></b><br>
                     <input type="text" class="form-control" id="reactivo" name="reactivo" onkeypress="return letra(event)" required>

                     <hr>
                     <b><label style="color:#000">Referencia Menor : </label></b><br>
                     <input type="text" class="form-control" id="refMenor" name="refMenor" onkeypress="return numeros_date(event)" maxlength="5" required>

                     <hr>
                     <b><label style="color:#000">Referencia Mayor : </label></b><br>
                     <input type="text" class="form-control" id="refMayor" name="refMayor" onkeypress="return numeros_date(event)" maxlength="5" required>
                     
                     <hr>
                     <b><label style="color:#000">Referencia : </label></b><br>
                     <input type="text" class="form-control" id="referencia" name="referencia" maxlength="15" required>
                     
                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-danger" value="REGISTRAR" id="REGISTER"><b>REGISTRAR</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      
      <?php
         include "public/body.admin.php";
      ?>
      
      <script src="laboratorista.reactivosList.js"></script>
      <script src="../plugins/validation.js"></script>

   </body>
</html>