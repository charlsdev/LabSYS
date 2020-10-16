<?php
	$cedulaSession = $_SESSION['user'];
	
	include ("../includes/DbConnect.php");
	$db = new DbConnect();
	$con = $db->connect();

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
				<a class="navbar-brand" href="inicio_sesion.php"><b>LabSys</b></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="laboratorista.laboratorios.php"><b>&nbsp;<i class="fas fa-clinic-medical" style="color: #fff;"></i>&nbsp;&nbsp;Laboratorios</b></a>
                     </li>
                     
                     <li class="nav-item">
								<a class="nav-link" href="laboratorista.reactivos.php"><b>&nbsp;<i class="fas fa-prescription-bottle" style="color: #fff;"></i>&nbsp;&nbsp;Reactivos</b></a>
                     </li>
							
							<li class="nav-item">
								<a class="nav-link" href="laboratorista.resultado.php"><b>&nbsp;<i class="fab fa-medrt" style="color: #fff;"></i>&nbsp;&nbsp;Resultado Examen</b></a>
                     </li>
					
						</ul>

						<?php 

							$query = "SELECT * FROM laboratorista WHERE cedula = '$cedulaSession'";
							$result = mysqli_query($con, $query);

							while ($row = mysqli_fetch_assoc($result)) {
								$apellidoDB = $row['apellidos'];
								$nombreDB = $row['nombres'];
							}

							mysqli_free_result($result);
							// mysqli_close($con);

							$posicionApe = strpos($apellidoDB, " ");
							$posicionNom = strpos($nombreDB, " ");
							$usuarioApe = substr($apellidoDB,0,$posicionApe);
							$usuarioNom = substr($nombreDB,0,$posicionNom);
							
						?>

						<li class="nav-link dropdown">
							<a class="nav-link dropdown-toggle" style="color:#fff" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&nbsp;<i class="fas fa-user-md"></i>&nbsp;&nbsp;<b><?php echo $usuarioApe . " " . $usuarioNom; ?></b> </a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" id="ChangePass" data-toggle="modal"><i class="fas fa-key">&nbsp;</i>Change Password</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../includes/logout.php"><i class="fas fa-sign-out-alt">&nbsp;</i><b>Cerrar Sesion</b></a>
								
							</div>
									
						</li>
						
						<!-- <a class="nav-link" style="color:#fff" href="../includes/logout.php"><i class="fas fa-sign-out-alt">&nbsp;</i><b>Cerrar Sesion</b></a> -->
				</div>

			</nav>
		</div>

		<!-- Modal editar laboratorista -->
      <div class="modal fade" id="ChangePassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header" style="background: linear-gradient(to right, #6E5BA7, #38d39f, #6E5BA7); text-transform: uppercase;">
                  <center><h5 class="modal-title" style="color: #fff;"><b>Cambiar Contraseña</b></h5></center>
                  <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #fff;">&times;</button>
               </div>
               <form id="formChangePass">   
                  <div class="modal-body">
                     <!-- <label><label style="color:#000">Codigo Laboratorio : </label></b><br> -->
							<input type="hidden" class="form-control" id="codigoUsu" name="codigoUsu" value="<?php echo $_SESSION['user'];?>" readonly required>
							<!-- <hr> -->

                     <b><label style="color:#000">Contraseña Anterior : </<label></b><br>
							<div class="input-group">
								<input type="password" class="form-control" id="passAntigua" name="passAntigua" required>
								<!-- <div class="input-group-append">
									<button type="button" id="showPassAnt" class="btn btn-outline-warning"><i class="fas fa-eye"></i></button>
								</div> -->
							</div>

							<hr>
							<b><label style="color:#000">Contraseña Nueva : </label></b><br>
							<div class="input-group">
								<input type="password" class="form-control" id="passNueva" name="passNueva" required>
								<!-- <div class="input-group-append">
									<button type="button" class="btn btn-outline-info"><i class="fas fa-eye"></i></button>
								</div> -->
							</div>
							
							<hr>
							<b><label style="color:#000">Confirmar Contraseña : </label></b><br>
							<div class="input-group">
								<input type="password" class="form-control" id="passConfir" name="passConfir" required>
								<!-- <div class="input-group-append">
									<button type="button" class="btn btn-outline-danger"><i class="fas fa-eye"></i></button>
								</div> -->
							</div>
                     
                  </div>
                  
                  <div class="modal-footer" style="background:#D2D8D4;">
                     <button type="submit" class="btn btn-outline-info" value="Change" id="Change"><b>Change</b></button>
                  </div>
               </form>
            </div>
         </div>
      </div>