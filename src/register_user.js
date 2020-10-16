$(document).ready(function() {
   $('#form').submit(function(e){ 
      e.preventDefault(); 
   // $("#REGISTER").click(function(){                       
      cedula = $.trim($('#cedula').val());    
      apellidos = $.trim($('#apellidos').val());
      nombres = $.trim($('#nombres').val());    
      edad = $.trim($('#edad').val());    
      direccion = $.trim($('#direccion').val());
      genero = $.trim($('#genero').val());                            
      email = $.trim($('#email').val());
      telefono = $.trim($('#telefono').val());                            
      password = $.trim($('#contrasena').val());                            
         $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            datatype:$(this).serialize(),    
            data: {cedula:cedula, apellidos:apellidos, nombres:nombres, edad:edad, direccion:direccion, genero:genero, email:email, telefono:telefono, password:password},
         })
         .done(function(respuesta){
            if (respuesta == true) {
               Swal.fire({
                  title: 'Usuario existente!',
                  text: "Upss! Registro existente en la BD...",
                  icon: 'error',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK!'
               }).then((result) => {
                  if (result.value) {
                     window.location="inicio_sesion.php";
                  }
               })
            } else {
               // if (respuesta == false) {
                  Swal.fire({
                     title: 'Usuario registrado!',
                     text: "Registro añadido con exito...",
                     icon: 'success',
                     confirmButtonColor: '#3085d6',
                     confirmButtonText: 'OK!'
                  }).then((result) => {
                     if (result.value) {
                        window.location="inicio_sesion.php";
                     }
                  })
               // } else {
               //    Swal.fire({
               //       title: 'Error al conectar a la BD!',
               //       text: "Upss! Error al ingresar datos...",
               //       icon: 'warning',
               //       confirmButtonColor: '#3085d6',
               //       confirmButtonText: 'OK!'
               //    }).then((result) => {
               //       if (result.value) {
               //          window.location="../src/inicio_sesion.php";
               //       }
               //    })
               // }
            }
         })
         
         .fail(function(){
            console.log("Error");
         });											     			
   });

});