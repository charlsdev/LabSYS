$(document).ready(function(){
	
	"use strict";
	
	$("#GUARDAR").click(function(){	
		//cogemos el valor del input
		var cedula = $("#cedulaU").val();
		var estado = $("#estadoM").val();
		// var table = $("#listUser").val();

		//creamos array de parámetros que mandaremos por POST
		var parametros = {
			"cedula" : cedula,
			"estado" : estado
      };
      
      //llamada al fichero PHP con AJAX
		$.ajax({
			data:  parametros,
			url:   'AD.php',
			dataType: 'HTML',
			type:  'POST',
			success: function(data) {
				$("#AD_Usuario").modal("hide");
				Swal.fire({
               title: 'Proceso exitoso!',
               text: "Usuario modificado con exito!",
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
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				Swal.fire(
					'Status!' + textStatus,
					'Error : ' + errorThrown,
					'error'
				) 
		  	} 
		});


	});
		
	
});