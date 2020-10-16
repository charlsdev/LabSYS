$(document).ready(function() {
   var opcion;
   opcion = 1;

   tableResultado = $("#listResultados").DataTable({
      "destroy": true,
      "ajax": {
         "method": "POST",
         "url": "laboratorista.resultadoList.php",
         "data":{opcion:opcion},
      },
      "columns": [
         {"data": "id_paciente"},
         {"data": "cedula_pac"},
         {"data": "cod_laboratorio"},
         {"data": "medico_ref"},
         {"data": "fech_examen"},
         {"data": "precio"},
         {"data": "observaciones"},
         {"defaultContent": "<center><button type='button' class='Register_RES btn btn-outline-info'><i class='fab fa-reacteurope'></i></button></center>"},
         {"defaultContent": "<center><button type='button' class='AD_Notificacion btn btn-outline-primary'><i class=\"far fa-bell\"></i></button></center>"}
      ],
      "language": idioma,
      "responsive": "true"
   });

   $("#btnGenerar").click(function(){
      opcion = 1; //alta           
      $("#REGISTER").prop('disabled', true);
      $("#formGenerar").trigger("reset");
      $('#ADDGenerar').modal('show');	    
   });

   $('#formGenerar').submit(function(e){  
      opcion = 2;    //Registrar Reactivo                       
      e.preventDefault();
      codigoGen = $.trim($('#codigoGen').val());
      cedulaPAC = $.trim($('#cedula').val());
      cedulaLAB = $.trim($('#cedulaLAB').val());
      laboratoriosCOD = $.trim($('#laboratorios').val());
      medicoTRA = $.trim($('#medico').val());
      fechaEXA = $.trim($('#fecha').val());
      precioEXA = $.trim($('#precio').val());
      observacionesEXA = $.trim($('#observaciones').val());
         
      $.ajax({
            url: "laboratorista.resultadoList.php",
            type: "POST",
            datatype:"json",    
            data: {codigoGen:codigoGen, cedulaPAC:cedulaPAC, cedulaLAB:cedulaLAB, laboratoriosCOD:laboratoriosCOD, medicoTRA:medicoTRA, fechaEXA:fechaEXA, precioEXA:precioEXA, observacionesEXA:observacionesEXA, opcion:opcion},    
            
         })
         .done(function(respuesta){
            if (respuesta == false) {
               Swal.fire({
                  title: 'Exámen no generado!',
                  text: "Upss! Error al generar el exámen...",
                  icon: 'error',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK!'
               }).then((result) => {
                  if (result.value) {
                    location.reload();
                  }
               })
            } else {
               Swal.fire({
                  title: 'Exámen generado!',
                  text: "Examen generado con exito...",
                  icon: 'success',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'OK!'
               }).then((result) => {
                  if (result.value) {
                    location.reload();
                  }
               })
            }
            tableResultado.ajax.reload(null, false);
         })
         
         .fail(function(){
            console.log("Error");
         });
         			        
      $('#ADDGenerar').modal('hide');											     			
   });

   $(document).on("click", ".Register_RES", function(){
      fila = $(this).closest("tr");	        
      codigoRES = fila.find('td:eq(0)').text();
      cedulaRES = fila.find('td:eq(1)').text();
      codigoLRES = fila.find('td:eq(2)').text();
      medicoRES = fila.find('td:eq(3)').text();
      fechaRES = fila.find('td:eq(4)').text();

      var codigoRESUL = $.trim(codigoRES); 
      var cedulaPACI = $.trim(cedulaRES); 
      var codigoLABO = $.trim(codigoLRES); 
      var medicoREFE = $.trim(medicoRES); 
      var fechaEXA = $.trim(fechaRES); 
      // alert(codigoRESUL);
      
      window.open('laboratorista.registerRES.php?codigoRESUL='+ codigoRESUL +'&cedulaPACI='+ cedulaPACI +'&medicoREFE='+ medicoREFE +'&codigoLABO='+ codigoLABO +'&fechaEXA='+ fechaEXA, "_blank");
      
   });

   $(document).on("click", ".AD_Notificacion", function(){
      $("#formModificarNotificacion").trigger("reset");
      
      fila = $(this).closest("tr");	        
      codigoEXA = fila.find('td:eq(0)').text();
      observacionEXA = fila.find('td:eq(6)').text();
      $("#codigoExamen").val(codigoEXA);
      $("#observacionesExamen").val(observacionEXA);

      $('#ADNotificacion').modal('show');		   
   });

   $('#formModificarNotificacion').submit(function(e){  
      opcion = 3;    //Registrar Reactivo                       
      e.preventDefault();
      examenCOD = $.trim($('#codigoExamen').val());
      examenOBS = $.trim($('#observacionesExamen').val());
      
      $.ajax({
         url: "laboratorista.resultadoList.php",
         type: "POST",
         datatype:"json",    
         data: {examenCOD:examenCOD, examenOBS:examenOBS, opcion:opcion},
      })
      .done(function(respuesta){
         if (respuesta == false) {
            Swal.fire(
               'Notificación no generada!',
               'Upss! La notificacion no se generó...',
               'error'
            )
         } else {
            Swal.fire(
               'Notificación generada!',
               'La notificación se generó con exito...',
               'success'
            )
         }
         tableResultado.ajax.reload(null, false);
      })
      
      .fail(function(){
         console.log("Error");
      });
         			        
      $('#ADNotificacion').modal('hide');											     			
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