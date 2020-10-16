$(document).ready(function() {
   var opcion;
   opcion = 1;

   tableLaboratorios = $("#listLaboratorios").DataTable({
      "destroy": true,
      "ajax": {
         "method": "POST",
         "url": "laboratorista.laboratoriosList.php",
         "data":{opcion:opcion},
      },
      "columns": [
         {"data": "cod_laboratorio"},
         {"data": "nombre_lab"},
         {"data": "cedula"},
         {"data": "direccion"},
         {"data": "apellidos"},
         {"data": "nombres"},
         {"defaultContent": "<center><button type='button' class='Edit_Reac btn btn-outline-info'><i class='fab fa-reacteurope'></i></button></center>"}
      ],
      "language": idioma,
      "responsive": "true"
   });

   $(document).on("click", ".Edit_Reac", function(){
      $("#formReactivo").trigger("reset");
      $("#contenido").hide();		        
      fila = $(this).closest("tr");	        
      codigoReac = fila.find('td:eq(0)').text();
      $("#codigo").val(codigoReac);
      $('#ADDReactivo').modal('show');		   
   });

   $('#formReactivo').submit(function(e){  
      opcion = 2;    //Registrar Reactivo                       
      e.preventDefault();
      codigoLab = $.trim($('#codigo').val());
      tipoR = $.trim($('#tipoR').val());
      reactivo = $.trim($('#reactivo').val());
      
      if (tipoR == "Sangre") {
         refMenor = $.trim($('#refMenor').val());
         refMayor = $.trim($('#refMayor').val());
         referencia = 0;
      } else {
         refMenor = 0.00;
         refMayor = 0.00;
         referencia = $.trim($('#referencia').val());
      }
          
      $.ajax({
            url: "laboratorista.laboratoriosList.php",
            type: "POST",
            datatype:"json",    
            data: {codigoLab:codigoLab, tipoR:tipoR, reactivo:reactivo, refMenor:refMenor, refMayor:refMayor, referencia:referencia, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == true) {
               Swal.fire(
                  'Reactivo no registrado!',
                  'Upss! Reactivo registrado en la BD...',
                  'error'
               )
            } else {
               Swal.fire(
                  'Reactivo registrado!',
                  'Registro de reactivo añadido con exito...',
                  'success'
               )
            }
            tableLaboratorios.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#ADDReactivo').modal('hide');											     			
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