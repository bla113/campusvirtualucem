/*=============================================
AGEREGAR HORARIO OFERTA
=============================================*/
$(".tablas").on("click", ".btnCrearHorario", function () {
  var idOferta = $(this).attr("idOferta");

  var datos = new FormData();

  datos.append("idOferta", idOferta);

  $.ajax({
    url: "ajax/oferta-acadmica.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {


      $("#idOferta").val(respuesta[0]['ID_OFERTA']);
			$("#idMateria").val(respuesta[0]['ID_MATERIA']);
			$("#nombreMateria").val(respuesta[0]['NOM_MATERIA']);

    },
  });
});

/*=============================================
CARGAR MATERIAS DEL GRUPO SELECCIONADO
=============================================*/
$("#grupoMateria").change(function () {
  var idGrupo = $("option:selected", this).attr("idGrupo");

  var datos = new FormData();

  datos.append("idGrupo", idGrupo);

  $.ajax({
    url: "ajax/materia.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      respuesta.forEach(function (item, index, array) {
        //$("#materiaOferta").empty();

        document.getElementById("materiaOferta").innerHTML +=
          "<option value='" + item[0] + "'>" + item[2] + "</option>";
      });
    },
  });
});
$("#btnLimpiarSelect").click(function () {
  $("#materiaOferta").empty();
});



/*=============================================
ELIMINAR OFRTA ACADEMICA
=============================================*/
$(".tablas").on("click", ".btnEliminarOferta", function(){

	var idOferta = $(this).attr("idOferta");
	
  
	swal({
	  title: '¿Está seguro de borrar la oferta académica?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar oferta académica!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=oferta-academica&idOferta="+idOferta;
  
	  }
  
	})
  
  })