/*=============================================
EDITAR MATERIA
=============================================*/
$(".tablas").on("click", ".btnEditarMateria", function(){

	var idMateria = $(this).attr("idMateria");
	
	var datos = new FormData();
    
	datos.append("idMateria", idMateria);

	$.ajax({

		url:"ajax/materia.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombreMateria").val(respuesta["NOM_MATERIA"]);
			$("#editarcodigoMateria").val(respuesta["COD_MATERIA"]);
			$("#editarCreditosMateria").val(respuesta["CREDITOS"]);
			$("#grupoActual").val(respuesta["NOM_GRUPO"]);
			$("#IdgrupoActual").val(respuesta["ID_GRUPO"]);
			$("#requisitosActuales").val(respuesta["COD_REQUISITO"]);
			$("#IdMateria").val(respuesta["ID_MATERIA"]);
			
			
			

		}

	});

})




/*=============================================
ELIMINAR MATERIA
=============================================*/
$(".tablas").on("click", ".btnEliminarMateria", function(){

	var idMateria = $(this).attr("idMateria");
	
  
	swal({
	  title: '¿Está seguro de borrar la materia?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar materia!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=materias&idMateria="+idMateria;
  
	  }
  
	})
  
  })