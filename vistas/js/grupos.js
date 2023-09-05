/*=============================================
EDITAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEditarGrupo", function(){

	var idGrupo = $(this).attr("idGrupo");
	
	var datos = new FormData();
    
	datos.append("idGrupo", idGrupo);

	$.ajax({

		url:"ajax/grupo.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarCodigoGrupo").val(respuesta["COD_GRUPO"]);
			$("#editarNombreGrupo").val(respuesta["NOM_GRUPO"]);
			$("#IdGrupo").val(respuesta["ID_GRUPO"]);
			
			

		}

	});

})



/*=============================================
ELIMINAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnEliminarGrupo", function(){

	var idGrupo = $(this).attr("idGrupo");
	
  
	swal({
	  title: '¿Está seguro de borrar la el grupo?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar grupo!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=grupos&idGrupo="+idGrupo;
  
	  }
  
	})
  
  })