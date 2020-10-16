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
		<!-- <link href="../plugins/datatables/responsive.dataTables.min.css" rel="stylesheet" type="text/css" /> -->

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
								<a class="nav-link" href="admin.listuser.php"><b>&nbsp;<i class="fas fa-users" style="color: #fff;"></i>&nbsp;&nbsp;Usuarios</b></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="admin.laboratorios.php"><b>&nbsp;<i class="fas fa-user-md" style="color: #fff;"></i>&nbsp;&nbsp;Laboratoristas</b></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="admin.laboratoriosList.php"><b>&nbsp;<i class="fas fa-clinic-medical" style="color: #fff;"></i>&nbsp;&nbsp;Laboratorios</b></a>
							</li>
							<?php 
								$salida = '';
								if($_SESSION['user'] === '1315767200') {
									$salida.='<li class="nav-item">
													<a class="nav-link" href="admin.admin.php"><b>&nbsp;<i class="fas fa-users-cog" style="color: #fff;"></i>&nbsp;&nbsp;Administradores</b></a>
												</li>';
								} 
								echo $salida;
							?>
					
						</ul>

						<?php 

							$query = "SELECT * FROM administrador WHERE cedula = '$cedulaSession'";
							$result = mysqli_query($con, $query);

							while ($row = mysqli_fetch_assoc($result)) {
								$apellidoDB = $row['apellidos'];
								$nombreDB = $row['nombres'];
							}

							mysqli_free_result($result);
							mysqli_close($con);

							$posicionApe = strpos($apellidoDB, " ");
							$posicionNom = strpos($nombreDB, " ");
							$usuarioApe = substr($apellidoDB,0,$posicionApe);
							$usuarioNom = substr($nombreDB,0,$posicionNom);
							
						?>

						<li class="nav-link dropdown">
							<a class="nav-link dropdown-toggle" style="color:#fff" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users-cog"></i>&nbsp;&nbsp;</i><b><?php echo $usuarioApe . " " . $usuarioNom; ?></b> </a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="../includes/logout.php"><i class="fas fa-sign-out-alt">&nbsp;</i><b>Cerrar Sesion</b></a>
								<!-- <div class="dropdown-divider"></div>
								<a class="dropdown-item" href="laboratorista.reactivosOrina.php">Orina</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="laboratorista.reactivosSangre.php">Sangre</a> -->
							
							</div>
									
						</li>
						
						<!-- <a class="nav-link" style="color:#fff" href="../includes/logout.php"><i class="fas fa-sign-out-alt">&nbsp;</i><b>Cerrar Sesion</b></a> -->
				</div>

			</nav>
		</div>