
/*=============================================
ASIGNAR PLAN  ESTUDIANTE
=============================================*/
$(".tablas").on("click", ".btnAsignarPlanEstudiante", function(){
	

	var idEstudiantePlan = $(this).attr("idEstudiantePlan");
	var idPlanCarrera = $(this).attr("idPlanCarrera");
	
	swal({
		title: '¿Está seguro que desea agreagr el Plan de Carreaa al estudiante?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si, asignar!'
	  }).then(function(result){
	
		if(result.value){
	
		  window.location = "index.php?ruta=estudiantes&idEstudiantePlan="+idEstudiantePlan+"&idPlanCarrera="+idPlanCarrera;
	
		}
	
	  })

	

})
 





/*=============================================
REVISAR SI EL ESTUDIANTE YA ESTÁ REGISTRADO
=============================================*/

$("#buscarIdentificacion").change(function(){

	$(".alert").remove();

	var Identificacion = $(this).val();

	var datos = new FormData();
	datos.append("validarIdentificacion", Identificacion);

	 $.ajax({
	    url:"ajax/estudiante.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){

			var cuenta=(respuesta.length)
	    	
	    	if(cuenta>0){

	    		$("#Error1").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#Error1").val("");

	    	}else{
				$("#btnBuscar").parent().after('');
			}

	    }

	})
})

/*=============================================
ELIMINAR ESTUDIANTE
=============================================*/
$(".tablas").on("click", ".btnEliminarEstudiante", function(){

  var idEstudiante = $(this).attr("idEstudiante");


  swal({
    title: '¿Está seguro de borrar el estudiante?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar estudiante!'
  }).then(function(result){

    if(result.value){

	window.location = "index.php?ruta=estudiantes&idEstudiante="+idEstudiante;

    }

  })

})


/*=============================================
EDITAR ESTUDIANTE
=============================================*/
$(".tablas").on("click", ".btnEditarEstudiante", function(){

	var idEstudiante = $(this).attr("idEstudiante");

	var fotoEstudiante = $(this).attr("fotoEstudiante");
	swal({
		title: '¿Está seguro de editar el estudiante?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si, editar estudiante!'
	  }).then(function(result){
	
		if(result.value){
	
		  window.location = "index.php?ruta=editar-estudiantes&idEstudiante="+idEstudiante+"&fotoEstudiante="+fotoEstudiante;
	
		}
	
	  })

	

})

/*=============================================
ASIGNAR PLAN  ESTUDIANTE
=============================================*/
/*$(".tablas").on("click", ".btnAsignarPlanEstudiante", function(){
	

	var idEstudiantePlan = $(this).attr("idEstudiantePlan");
	var idPlanCarrera = $(this).attr("idPlanCarrera");
	
	swal({
		title: '¿Está seguro que desea agreagr el Plan de Carreaa al estudiante?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si, asignar!'
	  }).then(function(result){
	
		if(result.value){
	
		  window.location = "index.php?ruta=estudiantes&idEstudiantePlan="+idEstudiantePlan+"&idPlanCarrera="+idPlanCarrera;
	
		}
	
	  })

	

})
*/
