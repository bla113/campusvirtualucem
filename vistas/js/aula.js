/*=============================================
EDITAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEditarAula", function(){

	var idAula = $(this).attr("idAula");
	
	var datos = new FormData();
    
	datos.append("idAula", idAula);

	$.ajax({

		url:"ajax/aula.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarCodigoAula").val(respuesta["COD_AULA"]);
			$("#editaNomAula").val(respuesta["NOM_AULA"]);
			$("#editarCapAula").val(respuesta["CAP_AULA"]);
			$("#IdAula").val(respuesta["ID_AULA"]);
			
			

		}

	});

})



/*=============================================
ELIMINAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEliminarAula", function(){

	var idExamen = $(this).attr("idExamen");
	
  
	swal({
	  title: '¿Está seguro de borrar el examen?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar examen!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "evaluaciones-curso&idHorarioOferta=1&idMateria=4&idUsuario=1";
  
	  }
  
	})
  
  })