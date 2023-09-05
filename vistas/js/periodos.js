/*=============================================
EDITAR PERIODO
=============================================*/
$(".tablas").on("click", ".btnEditarPeriodo", function(){

	var idPeriodo = $(this).attr("idPeriodo");
	
	var datos = new FormData();
    
	datos.append("idPeriodo", idPeriodo);

	$.ajax({

		url:"ajax/periodos.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
            
            
			
			$("#editarPeriodo").val(respuesta["NOM_PERIODO"]);
			$("#editarCodigoPeriodo").val(respuesta["COD_PERIODO"]);
			$("#editarInicioPeriodo").val(respuesta["INICIO_PERIODO"]);
			$("#editarfinPeriodo").val(respuesta["FIN_PERIODO"]);
            $("#editarinicioOrdinario").val(respuesta["INICIO_ORDINARIO"]);
			$("#editarfinOrdinario").val(respuesta["FIN_ORDINARIO"]);
			$("#editarinicioExtraOrdinario").val(respuesta["INICIO_EXTRAORDINARIO"]);
            $("#editarfinExtraOrdinario").val(respuesta["FIN_EXTRAORDINARIO"]);
			$("#editarprimerPago").val(respuesta["FECHA_PAGO1"]);
			$("#editarsegundoPago").val(respuesta["FECHA_PAGO2"]);
            $("#editartercerPago").val(respuesta["FECHA_PAGO3"]);
			$("#editarcuartoPago").val(respuesta["FECHA_PAGO4"]);
			$("#IdPeriodo").val(respuesta["ID_PERIODO"]);
		
			
			

		}

	});

})



/*=============================================
ELIMINAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEliminarPeriodo", function(){

	var idPeriodo = $(this).attr("idPeriodo");
	
  
	swal({
	  title: '¿Está seguro de borrar la periodo?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar periodo!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=periodos&idPeriodo="+idPeriodo;
  
	  }
  
	})
  
  })