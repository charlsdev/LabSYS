<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--<meta http-equiv="Refresh" content="30"/>-->
		<link href="../img/LabSys.ico" type="image/x-icon" rel="shortcut icon" />
		
		<title>Laboratorio Clinico LabSys</title>
		
		<link type="text/css" href="../lib/estilos_formulario.css" rel="stylesheet" />
		<link type="text/css" href="../plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" />
		
	</head>
	
	<body OnLoad="NoBack();">
		<!-- <form id="form" method="POST" action="../includes/register_user.php" > -->
		<form id="form" method="POST" action="register_user.php">
			<h1>Formulario de Registro</h1>
			<!-- <div class="grupo">
				<input type="text" name="" id="ID_User" maxlength="6" required readonly> <span class="barra"></span>
				<label>Codigo</label>
			</div> -->
			<div class="grupo">
				<input type="text" name="cedula" id="cedula" onkeypress="return numeros(event)" maxlength="10" onkeyUp="return Cedula(this);" required> <span class="barra"></span>
				<label>Cedula</label>
			</div>
			<div class="grupo">
				<input type="text" name="apellidos" id="apellidos" onkeypress="return letra(event)" required> <span class="barra"></span>
				<label>Apellidos</label>
			</div>
			<div class="grupo">
				<input type="text" name="nombres" id="nombres" onkeypress="return letra(event)" required> <span class="barra"></span>
				<label>Nombres</label>
			</div>
			<div class="grupo">
				<!-- <input type="number" name="" id="" required> <span class="barra"></span>
				<label>Edad</label> -->
				<input type="date" name="fecha" id="fecha" required max=<?php $hoy=date("Y-m-d"); echo $hoy;?>  onblur="calc()"> <span class="barra"></span>
				<label>Edad</label>
				<input type="hidden" name="edad" id="edad" readonly>
				<input type="text" name="tiempo" id="tiempo" readonly> 
			</div>
			<div class="grupo">
				<input type="text" name="direccion" id="direccion" required> <span class="barra"></span>
				<label>Direccion</label>
			</div>
			<div class="grupo">
				<select name="genero" id="genero" required class="form-control">
					<option disabled selected value=""> </option>
					<option value="Masculino">Maculino</option>
					<option value="Femenino">Femenino</option>			
					<option value="NDefinido">No Defido</option>
				</select><span class="barra"></span>
				<label>Genero</label>
			</div>
			<div class="grupo">
				<input type="text" name="telefono" id="telefono" onkeypress="return numeros(event)" maxlength="10" required> <span class="barra"></span>
				<label>Telefono</label>
			</div>
			<div class="grupo">
				<input type="email" name="email" id="email" required> <span class="barra"></span>
				<label>Email</label>
				<span id="text"></span>
			</div>
			<div class="grupo">
				<input type="password" name="contrasena" id="contrasena" required> <span class="barra"></span>
				<label>Password</label>
				<div id="toggle">
					<input type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"> <p>ShowPass</p> <br>
				</div>
			</div>

			<button type="submit" value="REGISTER" id="REGISTER" disabled><b>REGISTRAR</b></button>
		
		</form>
		
		<script src="../lib/jquery.min.js"></script>
		<script src="register_user.js"></script>
		<script src="../lib/moment.js"></script>
		<script src="../lib/js/popper.min.js"></script>
		<script src="../plugins/validation.js"></script>
		<!-- <script src="../lib/ID.js"></script> -->
		<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
		<script src="../lib/js/bootstrap.min.js"></script>
		
		<script>
			$(document).ready(function () {
				$('#mostrar_contrasena').click(function () {
					if ($('#mostrar_contrasena').is(':checked')) {
						$('#contrasena').attr('type', 'text');
					} else {
						$('#contrasena').attr('type', 'password');
					}
				});
			});
		</script>

		<script>
			document.getElementById('email').addEventListener('input', function() {
				campo = event.target;
				text = document.getElementById('text');

				emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
				//Se muestra un texto a modo de ejemplo, luego va a ser un icono
				if (emailRegex.test(campo.value)) {
					text.innerText = "Email es valido...";
					text.style.color = "#28B463";
				} else {
					text.innerText = "Email no valido...";
					text.style.color = "#ff0000";
				}
			});
		</script>

		<script>
			function calc() {
				var fechacalcular = $('#fecha').val();
				var fechafixed = fechacalcular.replace("/","-");
				var fixing = moment(fechafixed).format("DD-MM-YYYY");
				var today = moment();
				var nac = moment(fixing,'DD-MM-YYYY');
				var inputDate = moment(nac, 'DD-MM-YYYY');
				//AÑOS
				var birth= moment(nac).format("YYYY");
				var tday= moment(today).format("YYYY");
				
				//MESES
				var birthmonth= moment(nac).format("MM-YYYY");
				var tdaymonth= moment(today).format("MM-YYYY");
				//DIAS
				var birthday= moment(nac).format("MM-YYYY");
				var tdayday= moment(today).format("MM-YYYY");
				
				if(inputDate===today){
					var diff = today.diff(nac, 'hours');
					$('#edad').val(diff);
					// $('#tiempo').val('horas');
					$('#tiempo').val(diff+' hours');
					console.log(diff+' hours old');
				}
				else if(birthmonth===tdaymonth){
					var diff = today.diff(nac, 'days');
					$('#edad').val(diff);
					// $('#tiempo').val('dias');
					$('#tiempo').val(diff+' dias');
					console.log(diff+' days old');
				}
				else if(birth===tday){
					var diff = today.diff(nac, 'months');
					$('#edad').val(diff);
					// $('#tiempo').val('meses');
					$('#tiempo').val(diff+' meses');
					console.log(diff+' months old');
				}
				else if(birth!=tday && today.diff(nac, 'months')<12 ){
					var diff = today.diff(nac, 'months');
					$('#edad').val(diff);
					// $('#tiempo').val('meses');
					$('#tiempo').val(diff+' meses');
					console.log(diff+' months old');
				}
				else{
					var diff = today.diff(nac, 'years');
					$('#edad').val(diff);
					// $('#tiempo').val('años');
					$('#tiempo').val(diff+' años');
					console.log(diff+' years old');
				}
			};
					
		</script>

		<script type="text/javascript">
			function validar(cad) {
				var total = 0;
				var longitud = cad.length;
				var longcheck = longitud - 1;

				if (cad !== "" && longitud === 10){
					for(i = 0; i < longcheck; i++){
						if (i%2 === 0) {
						var aux = cad.charAt(i) * 2;
						if (aux > 9) aux -= 9;
						total += aux;
					} else {
						total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
					}
					}

					console.log(total);
					
					total = total % 10 ? 10 - total % 10 : 0;
					console.log(total);
					
					if (cad.charAt(longitud-1) == total) {
						// alert("Cedula Válida");
						Swal.fire(
						'Cedula Válida',
						'Thanks for me...',
						'success'
						)
						document.getElementById("REGISTER").disabled = true;
						$('button[type="submit"]').removeAttr('disabled');
						return document.getElementById('cedula').value = cad;
					}else{
						// alert("Cedula Inválida");
						Swal.fire(
							'Cedula Inválida',
							'Por favor proporcionar una cedula válida...',
							'error'
						)
						document.getElementById('REGISTER').disabled = false;
						$('button[type="submit"]').attr('disabled','disabled');
						return document.getElementById('cedula').value = cad;
					}
				}
			}
			
			function Cedula(Control){
				var cad = document.getElementById('cedula').value.trim();
				var longitud = cad.length;
				if(longitud === 10){
					Control.value = validar(Control.value);
				}
			}
					
		</script>

		<script language="javascript">
			function NoBack() {
				history.go(1)
			}
		</script>

	</body>
</html>