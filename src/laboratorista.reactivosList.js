$(document).ready(function() {
   var opcion;
   opcion = 1;

   tableHecesReactivos = $("#listHecesReactivos").DataTable({
      "destroy": true,
      "ajax": {
         "method": "POST",
         "url": "laboratorista.reactivosList.php",
         "data":{opcion:opcion},
      },
      "columns": [
         // {"data": "cedula"},
         {"data": "nombre_lab"},
         {"data": "cod_ensayo"},
         {"data": "tipo"},
         {"data": "ensayo"},
         {"data": "ref_menor"},
         {"data": "ref_mayor"},
         {"data": "referencia"},
         {"defaultContent": "<center><button type='button' class='Edit_Reac btn btn-outline-danger'><i class='fab fa-react'></i></button></center>"}
      ],
      "language": idioma,
      "responsive": "true"
   });

   $(document).on("click", ".Edit_Reac", function(){		        
      fila = $(this).closest("tr");	        
      codigo = fila.find('td:eq(1)').text();
      tipoR = fila.find('td:eq(2)').text();
      reactivo = fila.find('td:eq(3)').text();
      refMenor = fila.find('td:eq(4)').text();
      refMayor = fila.find('td:eq(5)').text();
      referencia = fila.find('td:eq(6)').text();
      $("#codigo").val(codigo);
      $("#tipoR").val(tipoR);
      $("#reactivo").val(reactivo);
      $("#refMenor").val(refMenor);
      $("#refMayor").val(refMayor);	
      $("#referencia").val(referencia);	
      $('#EditRHeces').modal('show');		   
   });

   $('#formRHeces').submit(function(e){ 
      opcion = 2;                        
      e.preventDefault();                    //evita el comportambiento normal del submit, es decir, recarga total de la página
      codigoR = $.trim($('#codigo').val());    
      tipo = $.trim($('#tipoR').val());
      reactivo = $.trim($('#reactivo').val());    
      refeMenor = $.trim($('#refMenor').val());    
      refeMayor = $.trim($('#refMayor').val());
      referenciaR = $.trim($('#referencia').val());                            
         $.ajax({
            url: "laboratorista.reactivosList.php",
            type: "POST",
            datatype:"json",    
            data: {codigoR:codigoR, tipo:tipo, reactivo:reactivo, refeMenor:refeMenor, refeMayor:refeMayor, referenciaR:referenciaR, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == false) {
               Swal.fire(
                  'Reactivo no modificado!',
                  'Upss! Registro no modificado en la BD...',
                  'error'
               )
            } else {
               if (respuesta == true) {
                  Swal.fire(
                     'Reactivo modificado!',
                     'Registro modificado con exito...',
                     'success'
                  )
               } else {
                  Swal.fire(
                     'Error al modificar!',
                     'Upss! Error 404 en la BD...',
                     'warning'
                  )
               }
            }
            // console.log(respuesta);
            tableHecesReactivos.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#EditRHeces').modal('hide');											     			
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