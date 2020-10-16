// JavaScript Document
$(buscar_datos());

function buscar_datos(consulta){
	"use strict";
	$.ajax({
		url: 'laboratoriosList.php',
		type: 'POST',
		dataType: 'HTML',
		data: {consulta: consulta},	
	})
	
	.done(function(respuesta){
		$('#resultadoEXA').html(respuesta);
	})
	
	.fail(function(){
		console.log("Error");
	});
	
}

$(document).on('keyup', '#busquedaCOD', function(){
	"use strict";
	var valor = $(this).val();
	if(valor !== "")
	{
		buscar_datos(valor);
	}
	else
	{
		buscar_datos();
	}
});