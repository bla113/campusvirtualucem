/*=============================================
EDITAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEditarHorario", function(){

	var idHorario = $(this).attr("idHorario");
	
	var datos = new FormData();
    
	datos.append("idHorario", idHorario);

	$.ajax({

		url:"ajax/horario.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarCodigoHorario").val(respuesta["COD_HORARIO"]);
			$("#editaNomHorario").val(respuesta["NOM_HORARIO"]);
			$("#IdHorario").val(respuesta["ID_HORARIO"]);
			
		}

	});

})



/*=============================================
ELIMINAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEliminarHorario", function(){

	var idHorario = $(this).attr("idHorario");
	
  
	swal({
	  title: '¿Está seguro de borrar el horario?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar horario!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=horarios&idHorario="+idHorario;
  
	  }
  
	})
  
  })