$(document).ready(function() {
   var verif = document.getElementById("codigoEXA").value; 
   var opcion;
   opcion = 1;

   // console.log(opcion);

   tableResultado = $("#listResultados").DataTable({
      "destroy": true,
      "ajax": {
         "method": "POST",
         "url": "laboratorista.resultadoBA.php",
         "data":{verif:verif, opcion:opcion},
      },
      "columns": [
         {"data": "id_paciente"},
         {"data": "tipo"},
         {"data": "ensayo"},
         {"data": "resultado"},
         {"data": "observaciones"},
      ],
      "language": idioma,
      "responsive": "true"
   });

   $("#BTNModal").click(function(){
      $('#OJOReac').modal('show');	    
   });

   $('#formRegisterEXA').submit(function(e){  
      opcion = 2;    //Registrar Reactivo                       
      e.preventDefault();
      codigoEXA = $.trim($('#codigoEXA').val());
      laboratorios = $.trim($('#laboratorios').val());
      resultadoEXAM = $.trim($('#resultadoEXAM').val());
      observacion = $.trim($('#observacion').val());
         
      $.ajax({
            url: "laboratorista.resultadoBA.php",
            type: "POST",
            datatype:"json",    
            data: {codigoEXA:codigoEXA, laboratorios:laboratorios, resultadoEXAM:resultadoEXAM, observacion:observacion, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == true) {
               Swal.fire(
                  'Resultado no registrado!',
                  'Upss! Registro ya guardado en la BD, verifique la tabla de valores...',
                  'error'
               )
            } else {
               if (respuesta == false) {
                  Swal.fire(
                     'Resultado registrado!',
                     'Resultado registrado con exito...',
                     'success'
                  )
               } else {
                  Swal.fire(
                     'Error al registrar!',
                     'Upss! Error 404 en la BD...',
                     'warning'
                  )
               }
            }
            // console.log(respuesta);
            tableResultado.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });

         //Limpiamos las cajas de texto
         $('#laboratorios').val('');
         $('#resultadoEXAM').val('');
         $('#observacion').val('');      			        
      											     			
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