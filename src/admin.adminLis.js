$(document).ready(function() {
   var user_id, opcion;
   opcion = 1;

   tableAdmin = $("#listAdministrador").DataTable({
      "destroy": true,
      "ajax": {
         "method": "POST",
         "url": "admin.adminLis.php",
         "data":{opcion:opcion},
      },
      "columns": [
         {"data": "cedula"},
         {"data": "apellidos"},
         {"data": "nombres"},
         {"data": "edad"},
         {"data": "direccion"},
         {"data": "genero"},
         {"data": "telefono"},
         {"defaultContent": "<center><button type='button' class='Plus_Admin btn btn-outline-secondary'><i class='far fa-plus-square'></i></button></center>"},
         {"defaultContent": "<center><button type='button' class='Edit_Admin btn btn-outline-primary'><i class='fas fa-users-cog'></i></button></center>"},
         {"defaultContent": "<center><button type='button' class='AD_Admin btn btn-outline-success'><i class='fas fa-unlock-alt'></i></button></center>"}
      ],
      "language": idioma,
      "responsive": "true"
   });

   //Abre modal ADD
   $("#btnNuevo").click(function(){
      opcion = 4; //alta           
      user_id=null;
      $("#formAdministrador").trigger("reset");
      $('#ADDAdmin').modal('show');	    
   });

   //Añade nuevo Administrador
   $('#formAdministrador').submit(function(e){                         
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      cedula = $.trim($('#cedula').val());    
      apellidos = $.trim($('#apellidos').val());
      nombres = $.trim($('#nombres').val());    
      edad = $.trim($('#edad').val());    
      direccion = $.trim($('#direccion').val());
      genero = $.trim($('#genero').val());                            
      email = $.trim($('#email').val());
      telefono = $.trim($('#telefono').val());                            
      password = $.trim($('#password').val());                            
         $.ajax({
            url: "admin.adminLis.php",
            type: "POST",
            datatype:"json",    
            data: {cedula:cedula, apellidos:apellidos, nombres:nombres, edad:edad, direccion:direccion, genero:genero, email:email, telefono:telefono, password:password, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == true) {
               Swal.fire(
                  'Administrador existente!',
                  'Registro existente en la BD...',
                  'error'
               )
            } else {
               Swal.fire(
                  'Administrador añadido!',
                  'Registro añadido con exito...',
                  'success'
               )
            }
            // console.log(respuesta);
            tableAdmin.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#ADDAdmin').modal('hide');											     			
   });

   //Mas informacion
   $(document).on("click", ".Plus_Admin", function(){		        
      var data = tableAdmin.row($(this).parents("tr")).data();
      $("#Plus_Info").trigger("reset");
      $("#CodigoAPluss").val(data.codigo);	
      $("#EmailAPluss").val(data.email);	
      $("#PrivilegioAPluss").val(data.privilegio);	
      $("#EstadoAPluss").val(data.estado);	
      $('#Plus_Info').modal('show');		   
   });

   //Activar o descativar administrador
   $(document).on("click", ".AD_Admin", function(){		        
      var data = tableAdmin.row($(this).parents("tr")).data();
      fila = $(this).closest("tr");	        
      cedula = parseInt(fila.find('td:eq(0)').text()); //capturo la cedula

      if (cedula < 999999999) {
         var cero = "0";
         cedula = cero.concat(cedula);
      }
      
      $("#FormADAdmin").trigger("reset");
      $("#cedulaA").val(cedula);	
      $("#estadoA").val(data.estado);	
      $("#estadoAd").val(data.estado);	
      $('#AD_Administrador').modal('show');	   
   });

   //Guardar estado
   $("#GUARDAREstadoAdmin").click(function(e){
      opcion = 3;       //AD Laboratorista                         
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      cedulaA = $.trim($('#cedulaA').val());    
      estadoAd = $.trim($('#estadoAd').val());                            
         $.ajax({
            url: "admin.adminLis.php",
            type: "POST",
            datatype:"json",    
            data: {cedulaA:cedulaA, estadoAd:estadoAd, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == false) {
               Swal.fire(
                  'Administrador no modificado!',
                  'Upss! Error al modificar el administrador...',
                  'error'
               )
            } else {
               Swal.fire(
                  'Administrador modificado!',
                  'Modificado el estado del administrador...',
                  'success'
               )
            }
            tableAdmin.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#AD_Administrador').modal('hide');											     			
   });

   //Lenado de caja del modal editar
   $(document).on("click", ".Edit_Admin", function(){		        
      var data = tableAdmin.row($(this).parents("tr")).data();
      fila = $(this).closest("tr");	        
      cedulaLAB = parseInt(fila.find('td:eq(0)').text());
      if (cedulaLAB < 999999999) {
         var cero = "0";
         cedulaLAB = cero.concat(cedulaLAB);
      }		            
      apellidosLAB = fila.find('td:eq(1)').text();
      nombresLAB = fila.find('td:eq(2)').text();
      edadLAB = fila.find('td:eq(3)').text();
      direccionLAB = fila.find('td:eq(4)').text();
      generoLAB = fila.find('td:eq(5)').text();
      telefonoLAB = fila.find('td:eq(6)').text();
      $("#cedulaAdmin").val(cedulaLAB);
      $("#apellidosAdmin").val(apellidosLAB);
      $("#nombresAdmin").val(nombresLAB);
      $("#edadAdmin").val(edadLAB);
      $("#direccionAdmin").val(direccionLAB);
      $("#generoAdmin").val(generoLAB);
      $("#telefonoAdmin").val(telefonoLAB);
      $("#emailAdmin").val(data.email);	
      $('#EDITAdmin').modal('show');		   
   });

   //Editar administrador
   $('#formAdministradorEdit').submit(function(e){  
      opcion = 2;    //Editar Laboratorista                       
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      cedula = $.trim($('#cedulaAdmin').val());    
      apellidos = $.trim($('#apellidosAdmin').val());
      nombres = $.trim($('#nombresAdmin').val());    
      edad = $.trim($('#edadAdmin').val());    
      direccion = $.trim($('#direccionAdmin').val());
      genero = $.trim($('#generoAdmin').val());                            
      email = $.trim($('#emailAdmin').val());
      telefono = $.trim($('#telefonoAdmin').val());                            
         $.ajax({
            url: "admin.adminLis.php",
            type: "POST",
            datatype:"json",    
            data: {cedula:cedula, apellidos:apellidos, nombres:nombres, edad:edad, direccion:direccion, genero:genero, email:email, telefono:telefono, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == true) {
               Swal.fire(
                  'Administrador no modificado!',
                  'Upss! Registro no modificado en la BD...',
                  'error'
               )
            } else {
               Swal.fire(
                  'Administrador modificado!',
                  'Registro modificado con exito...',
                  'success'
               )
            }
            tableAdmin.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#EDITAdmin').modal('hide');											     			
   });

});

var idioma = {
   "sProcessing":     "Procesando...",
   "sLengthMenu":     "Mostrar _MENU_ registros",
   "sZeroRecords":    "No se encontraron resultados",
   "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
   "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
   "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
   "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
   "sInfoPostFix":    "",
   "sSearch":         "Buscar:",
   "sUrl":            "",
   "sInfoThousands":  ",",
   "sLoadingRecords": "Cargando...",
   "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
   },
   "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
   },
   "buttons": {
      "copy": "Copiar",
      "colvis": "Visibilidad"

   }
}