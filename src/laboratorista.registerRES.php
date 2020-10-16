<?php
   
   include ("../includes/DbConnect.php");
	$db = new DbConnect();
   $con = $db->connect();
   
   $codigoGen = $_GET['codigoRESUL'];
   $cedulaPAC = $_GET['cedulaPACI'];
   $medicoREF = $_GET['medicoREFE'];
   $codigoLAB = $_GET['codigoLABO'];
   $fechaEX = $_GET['fechaEXA'];

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--<meta http-equiv="Refresh" content="30"/>-->
		
		<title>Laboratorio Clinico LabSys</title>
		
		<link href="../img/LabSys.ico" type="image/x-icon" rel="shortcut icon" />
		<link href="../lib/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="../plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
		<link href="../plugins/datatables/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="../lib/estilo_g.css" rel="stylesheet" type="text/css" />
		<link href="../lib/card.admin.css" rel="stylesheet" type="text/css" />
		<link href="../lib/style_clock.css" rel="stylesheet" type="text/css" />
		<link href="../plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

		<link rel="stylesheet" href="../plugins/fontawesome/css/all.css" crossorigin="anonymous">
		  		
   </head>
    
   <body>

      <div class="row-cols-12">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				&nbsp;&nbsp;&nbsp;
				<img src="../img/LabSys.png" id="img_logo"/>
				
				&nbsp;&nbsp;&nbsp;
				<a class="navbar-brand"><b>LabSys</b></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
				
			</nav>
		</div>

      <div class="container" style="color: #000;">
         <br>
         <center><h2 style="color: black"><b>Resultados de Exámenes</b></h2></center>
         <br>

         <div class="col-md-12">
            <form id="formRegisterEXA">
               <div class="form-row">
                  <div class="col-md-2 mb-3">
                     <b><label>&nbsp;&nbsp;Codigo Examen</label></b>
                     <input type="text" class="form-control" id="codigoEXA" value="<?php echo $codigoGen; ?>" readonly required>
                     <div class="invalid-feedback">
                        Please choose a username.
                     </div>
                  </div>

                  <div class="col-md-2 mb-3">
                     <b><label>&nbsp;&nbsp;Cedula Paciente</label></b>
                     <input type="text" class="form-control" id="cedulaPACI" value="<?php echo $cedulaPAC; ?>" readonly required>
                     <div class="invalid-feedback">
                        Please choose a username.
                     </div>
                  </div>

                  <div class="col-md-3 mb-3">
                     <b><label>&nbsp;&nbsp;Medico</label></b>
                     <input type="text" class="form-control" id="medicoREFE" value="<?php echo $medicoREF; ?>" readonly required>
                     <div class="invalid-feedback">
                        Please choose a username.
                     </div>
                  </div>

                  <div class="col-md-2 mb-3">
                     <b><label>&nbsp;&nbsp;Codigo Laboratorio</label></b>
                     <input type="text" class="form-control" id="codigoLABOR" value="<?php echo $codigoLAB; ?>" readonly required>
                     <div class="invalid-feedback">
                        Please choose a username.
                     </div>
                  </div>

                  <div class="col-md-3 mb-3">
                     <b><label>&nbsp;&nbsp;Fecha Examen</label></b>
                     <input type="text" class="form-control" id="fechaEXAM" value="<?php echo $fechaEX; ?>" readonly required>
                     <div class="invalid-feedback">
                        Please choose a username.
                     </div>
                  </div>
               
               </div>

               <div class="form-row">
                  <div class="col-md-3 mb-3">
                     <b><label style="color:#000">&nbsp;&nbsp;Reactivos del Laboratorios : </label></b> 
                     <select class="form-control" name="laboratorios" id="laboratorios" required>
                        <?php 
                           if (!$con)
                           {
                              die("Conexion fallida: " . mysqli_connect_error());
                           }
                           
                           $sql = "SELECT * FROM parametros_reactivo WHERE parametros_reactivo.cod_laboratorio = '" . $codigoLAB . "'";
                           $result = mysqli_query($con, $sql);
                        ?>

                        <option disabled selected value="">Seleccionar...</option>

                        <?php
                           while ($ver = mysqli_fetch_assoc($result))
                           {
                              ?>
                              <option value="<?=$ver["cod_ensayo"]?>">
                                 <?= utf8_encode($ver["tipo"]) . " ==> " . utf8_encode($ver["ensayo"])?> 
                              </option>
                              <?php
                           }
                        ?>
                     </select>
                     <div class="invalid-feedback">
                        Please, escoja la opcion.
                     </div>
                  </div>
                  
                  <div class="col-md-3 mb-3">
                     <b><label>&nbsp;&nbsp;Resultado Examen</label></b>
                     <input type="text" class="form-control" id="resultadoEXAM" onkeypress="return resultado(event)" required>
                     <div class="invalid-feedback">
                        Please, rellene el campo.
                     </div>
                  </div>

                  <div class="col-md-3 mb-3">
                     <b><label style="color:#000">&nbsp;&nbsp;Observaciones : </label></b> 
                     <select name="observacion" id="observacion" required class="form-control">
                        <option disabled selected value="">Seleccionar...</option>
                        <option value="Alto">Alto</option>
                        <option value="Normal">Normal</option>			
                        <option value="Bajo">Bajo</option>
                        <option value="Escasas">Escasas</option>
                        <option value="Positivo">Positivo</option>
                        <option value="Negativo">Negativo</option>
                     </select><span class="barra"></span>
                     <div class="invalid-feedback">
                        Please, escoja la opcion.
                     </div>
                  </div>

               </div>
               
               <!-- <br> -->
               <button class="btn btn-outline-info" type="submit" value="REGISTER" id="REGISTER">&nbsp;&nbsp;&nbsp;<i class="fab fa-creative-commons-sampling-plus"></i>&nbsp;&nbsp;&nbsp;REGISTRAR&nbsp;&nbsp;&nbsp;</button>
            </form>

         </div>
         
         <br><br>

         <center><h2 style="color: black"><b>Valores Registrados - Exámenes</b></h2></center>
         <!-- <br> -->

         <div class="table-responsive">
            <table id="listResultados" class="table table-striped table-bordered" style="color: #000">
               <thead class="table-success">
                  <tr>
                     <th scope="col">ID Pac.</th>
                     <th scope="col">Tipo</th>
                     <th scope="col">Ensayo</th>
                     <th scope="col">Resultado</th>
                     <th scope="col">Observaciones</th>
                     
                  </tr>
               </thead>
                  
            </table>
         </div>
      </div>

      <br><br>

      

      <?php
         include "public/body.admin.php";
      ?>

      <script src="laboratorista.resultadoBA.js"></script>
      <script src="../plugins/validation.js"></script>

   </body>
</html>