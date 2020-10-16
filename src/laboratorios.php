<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--<meta http-equiv="Refresh" content="30"/>-->
		
		<title>Laboratorio Clinico LabSys</title>
		
		<script src="../lib/jquery.min.js"></script>
		<script src="../lib/js/bootstrap.min.js"></script>
		
		<link href="../img/LabSys.ico" type="image/x-icon" rel="shortcut icon" />
		<link href="../lib/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="../lib/estilo_g.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="../plugins/fontawesome/css/all.css" crossorigin="anonymous">
		  		
   </head>
    
   <body>
		<div class="row-cols-12">
		   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				&nbsp;
				<img src="../img/LabSys.png" id="img_logo"/>
				
				&nbsp;&nbsp;&nbsp;
				<a class="navbar-brand" href="../index.php"><b>LabSys</b></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item">
								<a class="nav-link" href="laboratorios.php"><b>Laboratorios</b></a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="team.php"><b>Equipo de Trabajo</b></a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="inicio_sesion.php" target="_blank"><b>Log in</b></a>
							</li>
					
                  </ul>
                  
                  <form class="form-inline my-2 my-lg-0">
                     <input class="form-control mr-sm-2" type="text" name="busquedaCOD" id="busquedaCOD" placeholder="Search" aria-label="Search">&nbsp;&nbsp;&nbsp;
                     <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                  </form>
						
				</div>
			</nav>
      </div>
      
		<div class="container">
         <br>
         <center><h2 style="color: #000;"><b>Laboratorios LabSys</b></h2></center>
         
         <br>
         
         <!-- <div class="row">
            <div class="col-md-12">
               <div class="col-md-4">
                  <input type="text" name="busquedaCOD" id="busquedaCOD" class="form-control" placeholder="Digitar codigo" maxlength="7" step="1"/>
               </div>
            </div>
         </div> -->

         <div class="row">
            <div class="col-md-12">
               <!-- <div class="card-group"> -->
                  <div id="resultadoEXA">

			         </div>
                  
               <!-- </div> -->
            </div>
			
		</div>
		
      <br><br>
      
      <script src="laboratoriosList.js"></script>

   </body>
</html>