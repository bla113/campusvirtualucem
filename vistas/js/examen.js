/*=============================================
CREAR EXAMEN
=============================================*/

$("#btnCrearExamen").on("click", function () {
  var idHorarioOferta = $(this).attr("idHorarioOferta");
  var idMateria = $(this).attr("idMateria");
  var idUsuario = $(this).attr("idUsuario");

  $("#idHorarioOferta").val(idHorarioOferta);
  $("#idMateriaExamen").val(idMateria);
  $("#idUsuario").val(idUsuario);
});

/*=============================================
ELIMINAR EXAMEN 
=============================================*/
$(".tablas").on("click", ".btnEliminarExamen", function () {
  var idHorarioOferta = $(this).attr("idHorarioOferta");
  var idMateria = $(this).attr("idMateria");
  var idUsuario = $(this).attr("idUsuario");
  var idExamen = $(this).attr("idExamen");

  swal({
    title: "¿Está seguro de borrar el examen?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar examen!",
  }).then(function (result) {
    if (result.value) {
      window.location =
        "index.php?ruta=evaluaciones-curso&idHorarioOferta=" +
        idHorarioOferta +
        "&idMateria=" +
        idMateria +
        "&idUsuario=" +
        idUsuario +
        "&idExamen=" +
        idExamen;
    }
  });
});


/*=============================================
CREAR PREGUNTAS
=============================================*/