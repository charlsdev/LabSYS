// JavaScript Document
function generar(val1,val2){
	"use strict";
	var parametros = {
		"val1":val1,
		"val2":val2
	};
	
	$.ajax({
		url: '../includes/generar.php',
		type: 'POST',
		dataType: 'HTML',
		data: parametros,	
	})
	
	//Mostramos el resultado en donde queramos
	.done(function(data){
		//$('#res').text(data);
		$('#ID_User').val(data);
	});
	
}

$(document).ready(function() 
{
	"use strict";
	$('#Generar').click(function()
	{
		var val1 = document.getElementById('cedula').value;
		var val2 = document.getElementById('apellidos').value;
		generar(val1, val2);
	});
		
});
	

