<?php 

   include "../php/restriccion.php";

   // require '../includes/DbConnect.php';
   // $db = new DbConnect();
   // $con = $db->connect();

   include "public/head.user.php";

?>

      <div class="container" style="color : #000">
         <br>
         
         <center><h2><b>Resultado de exámenes</b></h2></center>
         
         <br>
         
         <div class="row">
            <div class="col-md-12">
               <div class="col-md-4">
                  <input type="text" name="busquedaCOD" id="busquedaCOD" class="form-control" placeholder="Digitar codigo" maxlength="7" step="1"/>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <!-- <div class="card-group"> -->
                  <div id="resultadoEXA">

                  </div>
                  
               <!-- </div> -->
            </div>
         </div>

      </div>

      <br><br> 
      
      <?php
         include "public/body.admin.php";
      ?>
      
      <script src="user.resultadoBA.js"></script>

   </body>
</html>