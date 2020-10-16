$(document).ready(function() {
   
   $("#ChangePass").click(function(){
      $("#formChangePass").trigger("reset");
      $('#ChangePassModal').modal('show');	    
   });

   //Añade nuevo Administrador
   $('#formChangePass').submit(function(e){                         
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      cedulaUsuario = $.trim($('#codigoUsu').val());    
      passAntigua = $.trim($('#passAntigua').val());
      passNueva = $.trim($('#passNueva').val());    
      passConfir = $.trim($('#passConfir').val());    
         $.ajax({
            url: "change.password.php",
            type: "POST",
            datatype:"json",    
            data: {cedulaUsuario:cedulaUsuario, passAntigua:passAntigua, passNueva:passNueva, passConfir:passConfir},    
            
         })
         .done(function(respuesta){
            if (respuesta === '1') {
               Swal.fire({
                  title: 'Contraseña cambiada!',
                  text: "Contraseña cambiada con exito en la BD...",
                  icon: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK!'
               }).then((result) => {
                  if (result.value) {
                     window.location="../includes/logout.php";
                  }
               })

            } else {
               if (respuesta === '0') {
                  Swal.fire(
                     'Contraseña incorrecta!',
                     'La contraseña antigua no es la correcta...',
                     'error'
                  )
               } else {
                  if (respuesta === '3') {
                     Swal.fire(
                        'Contraseñas no coinciden!',
                        'Las contraseñas nuevas no coinciden...',
                        'warning'
                     )
                  } else {
                     Swal.fire(
                        'Contraseñas iguales!',
                        'La contraseña nueva no debe de coincidir con la antigua...',
                        'info'
                     )
                  }
               }
               // Swal.fire(
               //    'Administrador añadido!',
               //    'Registro añadido con exito...',
               //    'success'
               // )
            }
            console.log(respuesta);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      // $('#ADDAdmin').modal('hide');											     			
   });

});