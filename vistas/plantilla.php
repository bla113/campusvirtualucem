<?php

session_start();


?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>CampusVirtualUCem</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="">

  <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="vistas/plugins/select2/select2.min.css">

  <link rel="stylesheet" href="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <script src="vistas/dist/js/pages/dashboard.js"></script>
  <script src="vistas/dist/js/pages/dashboard.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <link rel="stylesheet" href="vistas/plugins/select2/select2.min.css">

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

<!--  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="extenciones/ckeditor/config.js"></script>
<script src="https://kit.fontawesome.com/a0a34fa97e.js" crossorigin="anonymous"></script>
</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini hold-transition login-page">

  <?php

  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/
    

    
    if (isset($_GET["ruta"])) {

      if (
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "carreras" ||
        $_GET["ruta"] == "estudiantes" ||
        $_GET["ruta"] == "expediente-estudiante" ||
        $_GET["ruta"] == "crear-estudiante" ||
        $_GET["ruta"] == "crear-estudiante-ex" ||
        $_GET["ruta"] == "editar-estudiantes" ||
        $_GET["ruta"] == "planes-carrera" ||
        $_GET["ruta"] == "periodos" ||
        $_GET["ruta"] == "oferta-academica" ||
        $_GET["ruta"] == "horarios-oferta" ||
        $_GET["ruta"] == "editar-horario-oferta" ||
        $_GET["ruta"] == "crear-oferta-academica" ||
        $_GET["ruta"] == "asociar-materias-plan" ||
        $_GET["ruta"] == "materias" ||
        $_GET["ruta"] == "grupos-materia" ||
        $_GET["ruta"] == "crear-profesor" ||
        $_GET["ruta"] == "aulas" ||
        $_GET["ruta"] == "horarios" ||
        $_GET["ruta"] == "requisitos" ||
        $_GET["ruta"] == "matriculas" ||
        $_GET["ruta"] == "envioWatsapp" ||
        $_GET["ruta"] == "ver-materias-plan" ||
        $_GET["ruta"] == "asignar-materias-plan" ||
        $_GET["ruta"] == "agregar-materia" ||
        $_GET["ruta"] == "crear-cuenta" ||
        $_GET["ruta"] == "profesores" ||
        $_GET["ruta"] == "detalle-pre-matricula" ||
        $_GET["ruta"] == "detalle-matricula" ||
        $_GET["ruta"] == "cursos" ||
        $_GET["ruta"] == "detalle-curso" ||
        $_GET["ruta"] == "lecciones-curso" ||
        $_GET["ruta"] == "evaluaciones-curso" ||
        $_GET["ruta"] == "bandeja-correo" ||
        $_GET["ruta"] == "tareas-curso" ||
        $_GET["ruta"] == "calificaciones-curso" ||
        $_GET["ruta"] == "crear-examen" ||
        $_GET["ruta"] == "preguntas-examen" ||
        $_GET["ruta"] == "salir"
      ) {
        
        include "modulos/" . $_GET["ruta"] . ".php";
      } else {
        
        include "modulos/404.php";
      }
    } else {

      include "modulos/inicio.php";
    }
  
    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';
  } else {

    if (isset($_GET["ruta"]) && $_GET["ruta"] == "crear-cuenta") {

      include "modulos/crear-cuenta.php";

      
    } else {
      include "modulos/login.php";
    }

    //include "modulos/crear-cuenta.php";

  }



  ?>


  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/examen.js"></script>
   <script src="vistas/js/usuarios.js"></script>
  <script src="vistas/js/categorias.js"></script>
  <script src="vistas/js/profesor.js"></script>
  <script src="vistas/js/carrera.js"></script>
  <script src="vistas/js/distribucion-cr.js"></script>
  <script src="vistas/js/formulario.js"></script>
  <script src="vistas/js/estudiante.js"></script>
  <script src="vistas/js/periodos.js"></script>
  <script src="vistas/js/plan.js"></script>
  <script src="vistas/js/grupos.js"></script>
  <script src="vistas/js/aula.js"></script>
  <script src="vistas/js/horario.js"></script>
  <script src="vistas/js/plan-carrera.js"></script>
  <script src="vistas/js/materias.js"></script>
  <script src="vistas/js/requisitos.js"></script>
  <script src="vistas/js/matricula.js"></script>
  <script src="vistas/js/oferta-acdemica.js"></script>
  <script src="vistas/js/horarios-ofertas.js"></script>
  <script src="vistas/js/asignar-materias-plan.js"></script>
  <script src="vistas/js/cursos.js"></script>
  <script src="vistas/plugins/select2/select2.full.min.js"></script>
  <script src="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>




 




</body>

</html>