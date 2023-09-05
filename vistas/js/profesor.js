/*=============================================
EDITAR CARRERA
=============================================*/
$("#btnBuscarIdentificacion").on("click", function(){


    var identificacion = document.getElementById('busquedaCedula').value;

    //console.log( identificacion);
	//var identificacion = $(this).attr("identificacion");
	
	var datos = new FormData();
    
	datos.append("BuscarIdentifiacion", identificacion);

	$.ajax({

		url:"ajax/buscarIdentificacion.ajax.php", 
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			

            if(respuesta !== false){
                $("#busquedaCedula").val(respuesta['IDENTIFICACION']);
                $("#nombreCompleto").val(respuesta['NOMBRE_COMPLETO']);
                $("#primerApellido").val(respuesta['PRIMER_APELLIDO']);
                $("#segundoApellido").val(respuesta['SEGUNDO_APELLIDO']);
                
            }else{

                $("#busquedaCedula").val("");

                swal({
                    title: "La Identificación es válida",
                    text: "¡Vuelva a ingresar una identificación!",
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                  });

                  
            }
            
			
			

		}

	});

})


/*=============================================
ELIMINAR PROFESOR
=============================================*/
$(".tablas").on("click", ".btnEliminarProfesor", function(){

	var idProfesor = $(this).attr("idProfesor");
	
  
	swal({
	  title: '¿Está seguro de borrar al profesor?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar profesor!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=profesores&idProfesor="+idProfesor;
  
	  }
  
	})
  
  })