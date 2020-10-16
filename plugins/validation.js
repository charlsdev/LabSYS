function numeros(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "0123456789";
	especiales = [8];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial) 
	return false;
}

function letra(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";
	especiales = [8, 32];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial)
	return false;
}

function letraDR(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";
	especiales = [8, 32, 46];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial)
	return false;
}

//con punto
function numeros_date(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "0123456789";
	especiales = [8, 46];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial)
	return false;
}

function resultado(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "0123456789abcdefghijklmnopqrstuvwxyz";
	especiales = [8, 46, 32];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial)
	return false;
}

//Con coma
function numeros_precio(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "0123456789";
	especiales = [8, 44];

	tecla_especial = false
	for(var i in especiales){
		if(key == especiales[i]){
		tecla_especial = true;
		break;
		} 
	}

	if(letras.indexOf(tecla)==-1 && !tecla_especial)
	return false;
}

// document.getElementById('email').addEventListener('input', function() {
// 	campo = event.target;
// 	text = document.getElementById('text');

// 	emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
// 	//Se muestra un texto a modo de ejemplo, luego va a ser un icono
// 	if (emailRegex.test(campo.value)) {
// 		text.innerText = "Email es valido...";
// 		text.style.color = "#28B463";
// 	} else {
// 		text.innerText = "Email no valido...";
// 		text.style.color = "#ff0000";
// 	}
// });

// document.getElementById('emailLAB').addEventListener('input', function() {
// 	campo = event.target;
// 	text = document.getElementById('textLAB');

// 	emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
// 	//Se muestra un texto a modo de ejemplo, luego va a ser un icono
// 	if (emailRegex.test(campo.value)) {
// 		text.innerText = "Email es valido...";
// 		text.style.color = "#28B463";
// 	} else {
// 		text.innerText = "Email no valido...";
// 		text.style.color = "#ff0000";
// 	}
// });

// document.getElementById('emailAdmin').addEventListener('input', function() {
// 	campo = event.target;
// 	text = document.getElementById('textAdmin');

// 	emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
// 	//Se muestra un texto a modo de ejemplo, luego va a ser un icono
// 	if (emailRegex.test(campo.value)) {
// 		text.innerText = "Email es valido...";
// 		text.style.color = "#28B463";
// 	} else {
// 		text.innerText = "Email no valido...";
// 		text.style.color = "#ff0000";
// 	}
// });

// document.getElementById('emailEU').addEventListener('input', function() {
// 	campo = event.target;
// 	text = document.getElementById('textUser');

// 	emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
// 	//Se muestra un texto a modo de ejemplo, luego va a ser un icono
// 	if (emailRegex.test(campo.value)) {
// 		text.innerText = "Email es valido...";
// 		text.style.color = "#28B463";
// 	} else {
// 		text.innerText = "Email no valido...";
// 		text.style.color = "#ff0000";
// 	}
// });

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

		total = total % 10 ? 10 - total % 10 : 0;
		
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