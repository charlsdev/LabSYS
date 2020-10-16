$(document).ready(function() {
   var user_id, opcion;
   opcion = 1;

   tableLaboratorios = $("#listLaboratorios").DataTable({
      "destroy": true,
      "ajax": {
         "method": "POST",
         "url": "admin.laboratoriosLista.php",
         "data":{opcion:opcion},
      },
      "columns": [
         {"data": "cod_laboratorio"},
         {"data": "nombre_lab"},
         {"data": "cedula"},
         {"data": "direccion"},
         {"data": "apellidos"},
         {"data": "nombres"},
         {"defaultContent": "<center><button type='button' class='Edit_Lab btn btn-outline-primary'><i class='fas fa-vials'></i></button></center>"}
      ],
      "language": idioma,
      "responsive": "true"
   });

   $(document).on("click", ".Edit_Lab", function(){		        
      fila = $(this).closest("tr");	        
      codigoLAB = fila.find('td:eq(0)').text();
      nameLAB = fila.find('td:eq(1)').text();
      cedulaLAB = parseInt(fila.find('td:eq(2)').text());
      if (cedulaLAB < 999999999) {
         var cero = "0";
         cedulaLAB = cero.concat(cedulaLAB);
      }		            
      direccionLAB = fila.find('td:eq(3)').text();
      $("#codigoLAB").val(codigoLAB);
      $("#nameLAB").val(nameLAB);
      $("#cedulaLAB").val(cedulaLAB);
      $("#direccionLAB").val(direccionLAB);	
      $('#EditLab').modal('show');		   
   });

   $('#formLaboratoriosEdit').submit(function(e){  
      opcion = 2;    //Editar Laboratorio                       
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      codigoLAB = $.trim($('#codigoLAB').val());    
      nameLAB = $.trim($('#nameLAB').val());
      direccionLAB = $.trim($('#direccionLAB').val());    
         $.ajax({
            url: "admin.laboratoriosLista.php",
            type: "POST",
            datatype:"json",    
            data: {codigoLAB:codigoLAB, nameLAB:nameLAB, direccionLAB:direccionLAB, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == false) {
               Swal.fire(
                  'Laboratorio no modificado!',
                  'Upss! Registro no modificado en la BD...',
                  'error'
               )
            } else {
               Swal.fire(
                  'Laboratorio modificado!',
                  'Registro modificado con exito...',
                  'success'
               )
            }
            tableLaboratorios.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#EditLab').modal('hide');											     			
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