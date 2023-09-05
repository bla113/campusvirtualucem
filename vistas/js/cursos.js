$("#btnVerEstudiantesCurso").on("click", function () {
  var idCursoEstudiante = $(this).attr("idCursoEstudiante");

  var datos = new FormData();

  datos.append("idCursoEstudiante", idCursoEstudiante);


  $.ajax({
    url: "ajax/cursos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
  console.log(respuesta);
        
        var html = '';
        var i;
        for (i = 0; i < respuesta.length; i++) {
          html += '<tr>' +
            '<td>' + respuesta[i].IDENTIFICACION_ESTUDIANTE + '</td>' +
            '<td>' + respuesta[i].NOMBRE_COMPLETO   +' '+ respuesta[i].PRIMER_APELLIDO+' '+respuesta[i].SEGUNDO_APELLIDO+'</td>' +
            '<td>'+ respuesta[i].NUM_CARNE + '</td>' +
            '<td> <a class="btn btn-primary btn-xs"><i class="fa fa-check"></i></a></td>' +
            '</tr>';
        }
        $('#estudiantesCurso').html(html);
      },  
   
  });
});
