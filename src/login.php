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
		<link href="../lib/login.css" rel="stylesheet" type="text/css" />
		<link href="../plugins/poppins/css/Poppins_LT.css" rel="stylesheet" type="text/css" />
		<link href="../plugins/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
		
   </head>

	<body>
		<img class="wave" src="../img/w.png">
		<div class="container">
			<div class="img">
				<img src="../img/LabSys.png">
			</div>
			<div class="login-content">
				<form action="" method="post">

					<img src="../img/perfiles.svg">
					<h2 class="title">Welcome</h2>

					<div class="box">
						<select name="privilegio" id="privilegio">
							<option selected>Seleccionar...</option>
							<option value="Usuario">Usuarios</option>
							<option value="Laboratorista">Laboratoristas</option> 
							<!-- <option value="Coordinacion">Coordinacion</option>  -->
							<option value="Administrador">Administrador</option> 
						</select>
						</div>

					<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Username</h5>
							<input type="text" class="input" name="username" maxlength="10" onkeypress="return numeros(event)">
						</div>
					</div>
						
						<div class="input-div pass">
								<div class="i"> 
								<i class="fas fa-lock"></i>
								</div>
								<div class="div">
								<h5>Password</h5>
								<input type="password" class="input" name="password">
								</div>
						</div>
					<a href="#" class="enlace">Forgot Password?</a>
					<input type="submit" class="btn" value="Login">
					<i><p>No tienes una cuenta? <a href="register.php">Registrarse</a> .</p></i>
					<?php /*?><?php */?>
					</form>
			</div>
		</div>

		
		<script type="text/javascript" src="../lib/js/main.js"></script>
		<script type="text/javascript" src="../plugins/validation.js"></script>
		
	</body>
</html>