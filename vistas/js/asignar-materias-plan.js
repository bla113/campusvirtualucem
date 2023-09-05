/*=============================================
EDITAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnAsiganarMateria", function () {
  var idMateria = $(this).attr("idMateria");
  var IdCarrera = $(this).attr("IdCarrera");
  var IdPlanCarrera = $(this).attr("IdPlanCarrera");
  var Orden = $(this).attr("Orden");
  var Periodo = $(this).attr("Periodo");

  var datos = new FormData();

  datos.append("idMateria", idMateria);
  datos.append("IdCarrera", IdCarrera);
  datos.append("IdPlanCarrera", IdPlanCarrera);
  datos.append("Orden", Orden);
  datos.append("Periodo", Periodo);

  $.ajax({
    url: "ajax/asignarMateriasPlan.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      swal({
        type: "success",
        title: "Materia Agregada Con Éxito  al Plan de Carrera",
        showConfirmButton: false,
        confirmButtonText: "Cerrar",
      });
    },
  });
});

//Inicio
formulario = document.getElementById("formularioAsiganarMateria");

formulario.addEventListener("submit", function (e) {
  e.preventDefault();

  var datos = new FormData(formulario);

  var idMateriaSleccionada = datos.get("idMateriaSleccionada");
  var IdCarrera = datos.get("IdCarrera");
  var IdPlanCarrera = datos.get("IdPlanCarrera");
  var Orden = datos.get("ordenMateria");
  var Periodo = datos.get("periodoMateria");

  datos.append("idMateriaSleccionada", idMateriaSleccionada);
  datos.append("IdCarrera", IdCarrera);
  datos.append("IdPlanCarrera", IdPlanCarrera);
  datos.append("Orden", Orden);
  datos.append("Periodo", Periodo);

  $.ajax({
    url: "ajax/asignarMateriasPlan.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {

      if ( respuesta ) {
        swal({
          type: "success",
          title: "Materia Agregada Con Éxito  al Plan de Carrera",
          showConfirmButton: false,
          confirmButtonText: "Cerrar",
        });
        
        CierrModal();
      }
     
    },
  });
}); //Fin



function CierrModal() {
  $("#formularioAsiganarMateria").modal('hide');//ocultamos el modal

}

/*=============================================
SELECCIONAR MATERIA PARA MOSTRAR EN MODAL
=============================================*/

$(".tablas").on("click", ".btnElegirMateria", function () {
  var idMateria = $(this).attr("idMateria");

  var datos = new FormData();

  datos.append("idMateria", idMateria);

  $.ajax({
    url: "ajax/asignarMateriasPlan.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#codMateria").val(respuesta["COD_MATERIA"]);
      $("#nomMateria").val(respuesta["NOM_MATERIA"]);
      $("#idMateria").val(respuesta["ID_MATERIA"]);
    },
  });
});
