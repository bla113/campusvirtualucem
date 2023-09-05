/*=============================================
EDITAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEditarCarrera", function(){

	var idCarrera = $(this).attr("idCarrera");
	
	var datos = new FormData();
    
	datos.append("idCarrera", idCarrera);

	$.ajax({

		url:"ajax/carrera.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarCodigo").val(respuesta["CODIGO_CARRERA"]);
			$("#editarCarrera").val(respuesta["NOM_CARRERA"]);
			$("#IdCarrera").val(respuesta["ID_CARRERA"]);
			
			

		}

	});

})



/*=============================================
ELIMINAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEliminarCarrera", function(){

	var idCarrera = $(this).attr("idCarrera");
	
  
	swal({
	  title: '¿Está seguro de borrar la carrera?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar carrera!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=carreras&idCarrera="+idCarrera;
  
	  }
  
	})
  
  })