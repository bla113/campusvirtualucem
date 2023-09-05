/*=============================================
VRE HORARIOS DE MATERIAS OFERTADAS
=============================================*/
$(".tablas").on("click", ".btnVerHorarios", function () {

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
        
          var html = '';
          var i;
          for (i = 0; i < respuesta.length; i++) {
            html += '<tr>' +
              '<td>' + respuesta[i].NOMBRE_GRUPO + '</td>' +
              '<td>' + respuesta[i].NOM_MATERIA + '</td>' +
              '<td>' + respuesta[i].NOMBRE_PROFESOR + '</td>' +
              '<td>' + respuesta[i].MODALIDAD + '</td>' +
              '<td>' + respuesta[i].NOM_AULA + '</td>' +
              '<td>' + respuesta[i].NOM_HORARIO + '</td>' +
             
              '<td><button class="btn btn-info btn-xs">'+ respuesta[i].CAPACIDAD +'</button></td>' +
              '<td> <button class="btn btn-danger btnEliminarHorarioOfertado" type="button"  idHorariOferta="'+ respuesta[i].ID_HORARIO_OFERTA +'"  materiaNombre="'+ respuesta[i].ID_MATERIA +'"><i class="fa fa-trash"></i></button>' +
              '<a class="btn btn-warning" href="index.php?ruta=editar-horario-oferta&idHorariOferta='+ respuesta[i].ID_HORARIO_OFERTA +'&idMateria='+ respuesta[i].NOM_MATERIA +'" ><i class="fa fa-pencil"></i></a></td>' +
              '</tr>';
          }
          $('#horariosOferta').html(html);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('No se pudieron Cargar los Horarios...');
        }
             
            
      

      });

})*//*



/*=============================================
ELIMINAR HORARIOS DE MATERIAS OFERTADAS
=============================================*/
$(".horarios").on("click", ".btnEliminarHorarioOfertado", function () {

  var idHorariOferta = $(this).attr("idHorariOferta");
  var materiaNombre = $(this).attr("materiaNombre");

  console.log(materiaNombre);
 swal({
      title: '¿Está seguro de borrar el horario de la materia:'+materiaNombre +'?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar horario!'
  }).then(function (result) {

      if (result.value) {

          window.location = "index.php?ruta=oferta-academica&idHorariOferta=" + idHorariOferta;

      }

  })

})


/*=============================================
ELIMINAR HORARIOS DE MATERIAS OFERTADAS
=============================================*/
$(".horarios").on("click", ".btnEditarHorarioOfertado", function () {



console.log('vas a editar esta carambada');

});