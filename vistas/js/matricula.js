/*=============================================
CREAR CARRITO MATRICULA
=============================================*/
$(".tablas").on("click", ".btnMatricular", function () {
  var idHorariOferta = $(this).attr("idHorariOferta");
  var idEstudiante = $(this).attr("idEstudiante");
  var idMateria = $(this).attr("idMateria");
  var idCarrera = $(this).attr("idCarrera");
  var idPlanCarrera = $(this).attr("idPlanCarrera");

  var resultado = validarHorarioMatriculado(idEstudiante, idMateria);

  //console.log(resultado);
  //console.log(typeof resultado);

  if (resultado <= 0) {
    var datos = new FormData();

    datos.append("idHorariOferta", idHorariOferta);
    datos.append("idEstudiante", idEstudiante);
    datos.append("idMateria", idMateria);

    $.ajax({
      url: "ajax/matricula.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        if (respuesta) {
          swal({
            title: "Materia Matriculada Exitosamente",
            text: "¡Pude seguir agreganado mas materias!",
            type: "success",
            showCancelButton: false,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            // cancelButtonText: "Seguir Matriculando",
            // confirmButtonText: "Ver mi matricula!",
          }).then(function (result) {
            if (result.value) {
              /* window.location =
               "index.php?ruta=detalle-matricula&idEstudiante=" +
                idEstudiante +
                "&idHorariOferta=" +
                idHorariOferta +
                "$idCarrear=" +
                idCarrera +
                "&idPlanCarrera" +
                idPlanCarrera;*/
            }
          });
        }
        // console.log(respuesta);
        //console.log(resultado);
      },
    });
  } else {
    swal({
      title: "Existe un choque de Horarios",
      text: "¡Pude cancelar la accíón!",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, cancelar!",
    }).then(function (result) {});
  }
});

/*=============================================
ELIMINAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnElimiDetalleMatricula", function () {
  var idHorarioOfertaEliminar = $(this).attr("idHorarioOfertaEliminar");
  var idEstudiante = $(this).attr("idEstudiante");
  var idCarrera = $(this).attr("idCarrera");
  var idPlanCarrera = $(this).attr("idPlanCarrera");
  var datos = new FormData();
  datos.append("idHorarioOfertaEliminar", idHorarioOfertaEliminar);

  swal({
    title: "¿Está seguro desea quitar la materia?",
    text: "¡Si no lo está puede cancelar la accíón!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, quitar materia!",
  }).then(function (result) {
    if (result.value) {
      $.ajax({
        url: "ajax/matricula.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          if (respuesta) {
            //window.location ="index.php?ruta=detalle-matricula&idEstudiante=" + idEstudiante;
            window.location =
              "index.php?ruta=detalle-matricula&idEstudiante=" +
              idEstudiante +
              "&idCarrera=" +
              idCarrera +
              "&idPlanCarrera=" +
              idPlanCarrera;
          }
        },
      });
    }
  });
});

/*function validarHorarioMatriculado(idHorariOferta, idEstudiante, idMateria) {
  var idHorariOferta = parseInt(idHorariOferta);

  var idEstudiante = parseInt(idEstudiante);

  var idMateria = parseInt(idMateria);

  var datos = new FormData();

  var suma_horarios = "";

  datos.append("ValidadHorario", idHorariOferta);

  datos.append("ValidaEstudiante", idEstudiante);

  datos.append("ValidaMateria", idMateria);

  $.ajax({
    url: "ajax/matricula.ajax.php",
    method: "POST",
    async: false,
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log(respuesta);

      //return respuesta;
      //console.log(resultado);
      suma_horarios = respuesta.length;
    },
  });
 
  return suma_horarios;
}*/

function validarHorarioMatriculado(idEstudiante, idMateria) {
  //var idHorariOferta = parseInt(idHorariOferta);

  var idEstudiante = parseInt(idEstudiante);

  var idMateria = parseInt(idMateria);

  var datos = new FormData();

  var suma_horarios = "";

  // datos.append("ValidadHorario", idHorariOferta);

  datos.append("ValidaEstudiante", idEstudiante);

  datos.append("ValidaMateria", idMateria);

  $.ajax({
    url: "ajax/matricula.ajax.php",
    method: "POST",
    async: false,
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log(respuesta);

      //return respuesta;
      //console.log(resultado);
      suma_horarios = respuesta.length;
    },
  });

  return suma_horarios;
}

$(".tablas").on("click", ".btnValidarPago", function () {
  var idValidarMatricula = $(this).attr("idValidarMatricula");

  var datos = new FormData();

  datos.append("idValidarMatricula", idValidarMatricula);

  //console.log(idValidarMatricula);
  $.ajax({
    url: "ajax/matricula.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var iframe = document.createElement("iframe");

      iframe.width = "100%";
      iframe.height = "300px";
      iframe.src = respuesta[0][0]; //Aqui iría el src de tu archivo .PDF
      $(".showPDF").append(iframe);
    },
  });
});

/*=============================================
CALCULO TOTAL MATRICULA
=============================================*/
/*$("#selectMetodoPago").on("change", function(){

	///var totalPrematricula = $(this)('option:selected');

  var optionSelected = $(this).val('option:selected');
	

  console.log(optionSelected);

})*/

$("#selectMetodoPago").change(function () {
  var optionSelected = $(this).find("option:selected").attr("value");
  var metodo = $(this).find("option:selected").attr("id");
  var monto = $(this).find("option:selected").attr("monto");
  var descuento = $(this).find("option:selected").attr("descuento");
  var total = Math.round(optionSelected);
  $("#TotalSeleccionado").val(total);
  $("#metodoDePago").val(metodo);
  $("#montoSeleccionado").val(monto);
  $("#montoDescuento").val(descuento);
  //console.log(monto);
});

/*=============================================
EDITAR CARRERA
=============================================*/
$(".tablas").on("click", ".btnVerHorariosMaterias", function () {
  var idOferta = $(this).attr("idOferta");
  var idEstudiante = $(this).attr("idEstudiante");
  var idCarrera = $(this).attr("idCarrera");
  var idPlanCarrera = $(this).attr("idPlanCarrera");
  var datos = new FormData();

  datos.append("idOferta", idOferta);

  $.ajax({
    url: "ajax/horarios-oferta.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var html = "";
      var i;
      for (i = 0; i < respuesta.length; i++) {
        html +=
          "<tr>" +
          "<td>" +
          respuesta[i].NOMBRE_GRUPO +
          "</td>" +
          "<td>" +
          respuesta[i].NOM_MATERIA +
          "</td>" +
          "<td>" +
          respuesta[i].NOMBRE_PROFESOR +
          "</td>" +
          "<td>" +
          respuesta[i].MODALIDAD +
          "</td>" +
          "<td>" +
          respuesta[i].NOM_AULA +
          "</td>" +
          "<td>" +
          respuesta[i].NOM_HORARIO +
          "</td>" +
          "<td>" +
          respuesta[i].DIA +
          "</td>" +
          '<td><button class="btn btn-info btn-xs">' +
          respuesta[i].CAPACIDAD_DISPONIBLE +
          "</button></td>" +
          '<td> <button class="btn btn-danger btnMatricular" idMateria="' +
          respuesta[i].ID_MATERIA +
          '" idHorariOferta="' +
          respuesta[i].ID_HORARIO_OFERTA +
          '"  idEstudiante="' +
          idEstudiante +
          '" idCarrera="' +
          idCarrera +
          '" idPlanCarrera="' +
          idPlanCarrera +
          '">Matricular</button></td>' +
          "</tr>";
      }
      $("#horariosOferta").html(html);
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert("No se pudieron Cargar los Horarios...");
    },
  });
});

/*=============================================
MOSTRAR DETALLE MATRICULA
=============================================*/
$(".tablas").on("click", ".btnDetalleMatricula", function () {
  var idMatricula = $(this).attr("idMatricula");

  var datos = new FormData();

  datos.append("idMatricula", idMatricula);

  $.ajax({
    url: "ajax/matricula.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var i;
      for (i = 0; i < respuesta.length; i++) {
        var materias = JSON.parse(respuesta[i].MATERIAS);

        var html = "";
        var j;
        
        for (j = 0; j < materias.length; j++) {
          // creditos = creditos+materias[j].CREDITOS;
          //console.log();
          html +=
            "<tr>" +
            "<td>" +
            materias[j].NOM_MATERIA +
            "</td>" +
            "<td>" +
            materias[j].CREDITOS +
            "</td>" +
            "</tr>";
        }

        $("#detalledeMatricula").html(html);
      }
    },
  });
});
/*=============================================
CAMBIAR EL ESTADO DELA MATRICULA
=============================================*/

$("#btnAplicarPago").on("click", function () {
  var idMatricula = $(this).attr("idMatricula");
  var idEstudiante = $(this).attr("idEstudiante");
 

//console.log('ID_Estudiante'+idEstudiante);
 swal({
	  title: '¿Está seguro que quiere aplicar pago?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, aplicar pago!'
	}).then(function(result){
  
	  if(result.value){
      var cambioEstado= cambioEstadomateriaEstudiante(parseInt(idMatricula),parseInt(idEstudiante))//CAMBIAR EL ESTADO DE MATERIA ESTUDIANTE
      var cambio= cambiarEstadoMatricula(parseInt(idMatricula));//CAMBIAR EL ESTADO DE LA MATRICULA
      var capacidad=cambiarCapacidadHorarioOFerta(parseInt(idMatricula))//RESTAR CAPACIDAD DEL HORARIO OFERTA
     var asignarEstudianteCurso= asignarEstudiantealCurso(parseInt(idMatricula),parseInt(idEstudiante))//ASIGNAR EL ESTUDIANTE AL CURSO
      
      if(cambio == true && capacidad==true && cambioEstado==true && asignarEstudianteCurso==true ){
        swal({
		      title: "El pago ha sido aplicado",
		      type: "success",
		      confirmButtonText: "¡Cerrar!"
		    }).then(function(result) {
		        if (result.value) {

		        	window.location = "matriculas";

		        }


			});


      }
	  }
  
	})
  

  
});
/*=============================================
FUNCION CAMBIAR EL ESTADO DELA MATRICULA
=============================================*/
function cambiarEstadoMatricula(idMatricula) {
  var datos = new FormData();
  
  datos.append("idMatriculaCambiEstdo", idMatricula);

  $.ajax({
    url: "ajax/matricula.ajax.php",
    method: "POST",
    async: false,
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log(respuesta);
      
      
    },
  });

  return true;
}

/*=============================================
FUNCION CAMBIAR EL ESTADO DELA MATRICULA
=============================================*/
function cambiarCapacidadHorarioOFerta(idMatricula) {

  var datos = new FormData();

  datos.append("idMatriculaCapacidad", idMatricula);
  $.ajax({
    url: "ajax/matricula.ajax.php",
    method: "POST",
    async: false,
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
   
      //console.log(respuesta);
    },
  });

return true;

}

/*=============================================
ASINGNAR EL ESTUDIANTE AL CURSO
=============================================*/

function asignarEstudiantealCurso(idMatricula,idEstudiante) {
 // console.log('ID_Estudiante'+idEstudiante);
  var datos = new FormData();
  
  datos.append("idMatriculaCurso", idMatricula);
  datos.append("idEstudianteCurso", idEstudiante);
  

  $.ajax({
    url: "ajax/matricula.ajax.php",
    method: "POST",
    async: false,
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
      
      
    },
  });
  return true;
}


/*=============================================
FUNCION CAMBIAR EL ESTADO DE MATERIA ESTUDIANTE
=============================================*/

function cambioEstadomateriaEstudiante(idMatricula,idEstudiante) {
  // console.log('ID_Estudiante'+idEstudiante);
   var datos = new FormData();
   
   datos.append("idMatriculaCambio", idMatricula);
   datos.append("idEstudianteCambio", idEstudiante);
   
 
   $.ajax({
     url: "ajax/matricula.ajax.php",
     method: "POST",
     async: false,
     data: datos,
     cache: false,
     contentType: false,
     processData: false,
     dataType: "json",
     success: function (respuesta) {
       //console.log(respuesta);
       
       
     },
   });
   return true;
 }