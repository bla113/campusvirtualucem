/*=============================================
EDITAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEditarRequisito", function(){

	var idRequisito = $(this).attr("idRequisito");
	
	var datos = new FormData();
    
	datos.append("idRequisito", idRequisito);

	$.ajax({

		url:"ajax/requisito.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#materiaSeleccionada").val(respuesta["NOM_MATERIA"]);
			$("#carreraSeleccionada").val(respuesta["NOM_CARRERA"]);
			$("#planCarreraSeleccionado").val(respuesta["NOM_PLAN"]);
			$("#idMateria").val(respuesta["ID_MATERIA"]);
			$("#idCarrera").val(respuesta["ID_CARRERA"]);
			$("#idPlanCarrera").val(respuesta["ID_PLAN_CARRERA"]);
			$("#idRequisito").val(respuesta["ID_REQUISITO"]);
			
			
			

		}

	});

})



/*=============================================
ELIMINAR REQUISITO
=============================================*/
$(".tablas").on("click", ".btnEliminarRequisito", function(){

	var idRequisito = $(this).attr("idRequisito");
	
  
	swal({
	  title: '¿Está seguro de borrar el aula?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar el requsito!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=requisitos&idRequisito="+idRequisito;
  
	  }
  
	})
  
  })