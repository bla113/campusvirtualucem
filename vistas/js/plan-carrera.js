/*=============================================
EDITAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEditarPlanCarrrera", function(){

	var idPlanCarrera = $(this).attr("idPlanCarrera");
	
	var datos = new FormData();
    
	datos.append("idPlanCarrera", idPlanCarrera);

	$.ajax({

		url:"ajax/plan_carrera.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombreCarrera").val(respuesta["NOM_CARRERA"]);
			$("#IdCarreraSeleccinado").val(respuesta["ID_CARRERA"]);
			$("#editarPeriodoPlanCarrera").val(respuesta["NOM_PERIODO"]);
			$("#editarCodigoPlan").val(respuesta["COD_PLAN_CARRERA"]);
			$("#EditarnombrePlan").val(respuesta["NOM_PLAN"]);
			$("#EditarcantCreditos").val(respuesta["CREDITOS"]);
			$("#EditarcantPeriodos").val(respuesta["PERIODOS"]);
			$("#IdPlanSeleccionado").val(respuesta["ID_PLAN_CARRERA"]);
			
			
			
			
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