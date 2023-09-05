/*=============================================
EDITAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEditarPlan", function(){

	var idPlan = $(this).attr("idPlan");
	
	var datos = new FormData();
    
	datos.append("idPlan", idPlan);

	$.ajax({

		url:"ajax/plan.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarCodigo").val(respuesta["COD_PLAN"]);
			$("#editarNombrePlan").val(respuesta["NOM_PLAN"]);
			$("#editarfechaPlan").val(respuesta["FECHA_PLAN"]);
			$("#IdPlan").val(respuesta["ID_PLAN"]);

			
			

		}

	});

})



/*=============================================
ELIMINAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEliminarPlan", function(){

	var idPlan = $(this).attr("idPlan");
	
  
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
  
		window.location = "index.php?ruta=plan&idPlan="+idPlan;
  
	  }
  
	})
  
  })