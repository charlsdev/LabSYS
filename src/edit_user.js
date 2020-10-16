$(document).ready(function(){
	
	"use strict";
	
	$("#EDITAR").click(function(){		
		//cogemos el valor del input
		var cedula = $("#cedulaEU").val();
		var apellidos = $("#apellidosEU").val();
		var nombres = $("#nombresEU").val();
		var edad = $("#edadEU").val();
		var direccion = $("#direccionEU").val();
		var genero = $("#generoEU").val();
		var telefono = $("#telefonoEU").val();
		var email = $("#emailEU").val();
      // var table = $("#listUser").val();
      
     //creamos array de parámetros que mandaremos por POST
		var parametros = {
			"cedula" : cedula,
			"apellidos" : apellidos,
			"nombres" : nombres,
			"edad" : edad,
			"direccion" : direccion,
			"genero" : genero,
			"telefono" : telefono,
			"email" : email
		};

		//llamada al fichero PHP con AJAX
		$.ajax({
			data:  parametros,
			url:   'edit_user.php',
			dataType: 'HTML',
			type:  'POST',
			success: function(data) {
				$("#EditUser").modal("hide");
				Swal.fire({
					title: 'Registro modificado con éxito!',
					text: "Thanks for me...",
					icon: 'success',
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'OK!'
				}).then((result) => {
					if (result.value) {
						location.reload();
						// table.ajax.reload(null, false);
					}
				})
			},
			error: function() {
				$("#EditUser").modal("hide");
				Swal.fire({
					title: 'Error inesperado!',
					text: "Registro modificado con éxito...",
					icon: 'success',
					confirmButtonColor: '#d33',
					confirmButtonText: 'OK!'
				}).then((result) => {
					if (result.value) {
						location.reload();
						// table.ajax.reload(null, false);
					}
				})
            
			}
		});


	});
		
	
});