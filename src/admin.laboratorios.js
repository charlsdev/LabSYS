$(document).ready(function() {
   var user_id, opcion;
   opcion = 4;

   tableLaboratoristas = $("#listLaboratoristas").DataTable({
      "destroy": true,
      "ajax": {
         "method": "POST",
         "url": "admin.laboratoristas.php",
         "data":{opcion:opcion},
         // "dataSrc":""
      },
      "columns": [
         {"data": "cedula"},
         {"data": "apellidos"},
         {"data": "nombres"},
         {"data": "edad"},
         {"data": "direccion"},
         {"data": "genero"},
         // {"data": "email"},
         {"data": "telefono"},
         // {"data": "codigo"},
         // {"data": "privilegio"},
         // {"data": "estado"},
         {"defaultContent": "<button type='button' class='listLab btn btn-outline-info'><i class='fas fa-vials'></i></i></button>"},
         {"defaultContent": "<button type='button' class='ED_Labo btn btn-outline-danger'><i class='far fa-edit'></i></button>"},
         {"defaultContent": "<button type='button' class='AD_Lab btn btn-outline-secondary'><i class='fas fa-audio-description'></i></button>"}
      ],
      "language": idioma,
      "responsive": "true"
   });

   var fila; //captura la fila

   $('#formLaboratoristas').submit(function(e){                         
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
            url: "admin.laboratoristas.php",
            type: "POST",
            datatype:"json",    
            data: {cedula:cedula, apellidos:apellidos, nombres:nombres, edad:edad, direccion:direccion, genero:genero, email:email, telefono:telefono, password:password, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == true) {
               Swal.fire(
                  'Laboratorista existente!',
                  'Registro existente en la BD...',
                  'error'
               )
            } else {
               Swal.fire(
                  'Laboratorista añadido!',
                  'Registro añadido con exito...',
                  'success'
               )
            }
            // console.log(respuesta);
            tableLaboratoristas.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#ADDLab').modal('hide');											     			
   });

   $("#btnNuevo").click(function(){
      opcion = 1; //alta           
      user_id=null;
      $("#formLaboratoristas").trigger("reset");
      $('#ADDLab').modal('show');	    
   });

   $(document).on("click", ".listLab", function(){		        
      fila = $(this).closest("tr");	        
      cedula = parseInt(fila.find('td:eq(0)').text()); //capturo la cedula
      if (cedula < 999999999) {
         var cero = "0";
         cedula = cero.concat(cedula);
      }		      
      $("#contenido").hide();                      //Ocultar div
      $("#formLaboratorios").trigger("reset");     //Reseteo del formulario
      $("#cedulaLab").val(cedula);
      $('#listLab').modal('show');		   
   });

   $(document).on("click", ".AD_Lab", function(){		        
      var data = tableLaboratoristas.row($(this).parents("tr")).data();
      fila = $(this).closest("tr");	        
      cedula = parseInt(fila.find('td:eq(0)').text()); //capturo la cedula

      if (cedula < 999999999) {
         var cero = "0";
         cedula = cero.concat(cedula);
      }
      
      $("#FormAD").trigger("reset");
      $("#cedulaL").val(cedula);	
      $("#estadoL").val(data.estado);	
      $("#estadoLa").val(data.estado);	
      $('#AD_Laboratorista').modal('show');	   
   });
   
   $("#GUARDAREstadoLab").click(function(e){
      opcion = 3;       //AD Laboratorista                         
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      cedulaL = $.trim($('#cedulaL').val());    
      estadoLa = $.trim($('#estadoLa').val());                            
         $.ajax({
            url: "admin.laboratoristas.php",
            type: "POST",
            datatype:"json",    
            data: {cedulaL:cedulaL, estadoLa:estadoLa, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == false) {
               Swal.fire(
                  'Laboratorista no modificado!',
                  'Error al modificar el estado del laboratorista...',
                  'error'
               )
            } else {
               Swal.fire(
                  'Laboratorista modificado!',
                  'Modificado el estado del laboratorista...',
                  'success'
               )
            }
            tableLaboratoristas.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#AD_Laboratorista').modal('hide');											     			
   });

   $(document).on("click", ".ED_Labo", function(){		        
      var data = tableLaboratoristas.row($(this).parents("tr")).data();
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
      $("#cedulaLAB").val(cedulaLAB);
      $("#apellidosLAB").val(apellidosLAB);
      $("#nombresLAB").val(nombresLAB);
      $("#edadLAB").val(edadLAB);
      $("#direccionLAB").val(direccionLAB);
      $("#generoLAB").val(generoLAB);
      $("#telefonoLAB").val(telefonoLAB);
      $("#emailLAB").val(data.email);	
      $('#EditLab').modal('show');		   
   });

   $('#formLaboratoristasEdit').submit(function(e){  
      opcion = 2;    //Editar Laboratorista                       
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      cedula = $.trim($('#cedulaLAB').val());    
      apellidos = $.trim($('#apellidosLAB').val());
      nombres = $.trim($('#nombresLAB').val());    
      edad = $.trim($('#edadLAB').val());    
      direccion = $.trim($('#direccionLAB').val());
      genero = $.trim($('#generoLAB').val());                            
      email = $.trim($('#emailLAB').val());
      telefono = $.trim($('#telefonoLAB').val());                            
         $.ajax({
            url: "admin.laboratoristas.php",
            type: "POST",
            datatype:"json",    
            data: {cedula:cedula, apellidos:apellidos, nombres:nombres, edad:edad, direccion:direccion, genero:genero, email:email, telefono:telefono, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == true) {
               Swal.fire(
                  'Laboratorista no modificado!',
                  'Registro no modificado en la BD...',
                  'error'
               )
            } else {
               Swal.fire(
                  'Laboratorista modificado!',
                  'Registro modificado con exito...',
                  'success'
               )
            }
            tableLaboratoristas.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#EditLab').modal('hide');											     			
   });

   $('#formLaboratorios').submit(function(e){  
      opcion = 5;    //Registrar Laboratorio                       
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      cedulaLab = $.trim($('#cedulaLab').val());
      name = $.trim($('#nameLab').val());
      direcLab = $.trim($('#direccionLabo').val());    
      $.ajax({
            url: "admin.laboratoristas.php",
            type: "POST",
            datatype:"json",    
            data: {cedulaLab:cedulaLab, name:name, direcLab:direcLab, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == true) {
               Swal.fire(
                  'Laboratorio no registrado!',
                  'Upss! Error al registrar laboratorio en la BD...',
                  'error'
               )
            } else {
               Swal.fire(
                  'Laboratorio registrado!',
                  'Registro añadido con exito...',
                  'success'
               )
            }
            tableLaboratoristas.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#listLab').modal('hide');											     			
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