<?php
if (isset($_GET['ruta']) && $_GET['idCurso']) {

    $item = "ID_HORARIO_OFERTA";
    $valor = $_GET['idCurso'];
    /*$respuesta = ControladorCursos::ctrMostrarEstudiantesCursos($item, $valor);
    $cantAlumnos = count($respuesta);*/

    $CurososVirtuales = ControladorCursos::ctrMostrarDetallesCurso($item, $valor);

    foreach ($CurososVirtuales as $curso) {
    }

     
}
?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Detalle del Curso: <?php echo $curso['NOM_MATERIA'] ?>

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar detalle del curso</li>

        </ol>

    </section>


    <?php  //print_r($CurososVirtuales);?>

    <section class="content">

        <div class="content-wrapper">

            <div class="container">

                <section class="content-header">


                    <!-- Main content -->
                    <section class="content">

                        <div class="row">



                            <div class="col-md-9">

                                <div class="box box-primary">

                                    <div class="box-header with-border">

                                        <h3 class="box-title">Contenido del Curso:</h3>

                                        <div class="box-tools pull-right">

                                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>

                                            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
                                        </div>

                                    </div>

                                    <div class="box-body no-padding">

                                        <div class="mailbox-read-info">

                                            <h3>Nombre del Curso: <?php echo $curso['NOM_MATERIA'] ?></h3>

                                            </h5>
                                        </div>

                                        <div class="mailbox-controls with-border">

                                          <textarea  id="ckeditor" class="ckeditor" readonly  disabled><?php echo $curso['DESCRIPCION_CURSO'] ?></textarea>



                                           

                                        </div>

                                        <div class="box-footer ">
                                            <a href="lecciones-curso" class="btn btn-app"><span class="badge bg-yellow">14</span><i class="fa fa-book"></i>Lecciones</a>
                                            <a href="calificaciones-curso" class="btn btn-app"><span class="badge bg-danger-subtle">Si</span><i class="fa fa-percent"></i>Calificaciones</a>
                                            <a href="<?php echo $curso['ENLACES'] ?>" class="btn btn-app"><i class="fa fa-link"></i>Enlaces</a>

                                            <a href="tareas-curso" class="btn btn-app bg-blue-gradient"><span class="badge bg-red-active">0</span><i class="fa fa-bookmark-o"></i>Tereas</a>
                                            <a class="btn btn-app" href="index.php?ruta=evaluaciones-curso&idHorarioOferta=<?php echo $curso['ID_HORARIO_OFERTA']?>&idMateria=<?php echo $curso['ID_MATERIA']?>&idUsuario=<?php echo $_SESSION['id']?>" ><span class="badge bg-red-active">0</span><i class="fa fa-bookmark"></i>Evaluaciones</a>
                                            <a href="bandeja-correo" class="btn btn-app"><i class="fa fa-envelope"></i>Enviar Correo</a>

                                                <hr>
                                            <div class="box-footer">

                                            <a href="crear-examen" class="btn btn-app"><i class="fa fa-plus"></i>Crear</a>
                                              
                                            </div>
                                            <!-- /. box -->
                                        </div>





                                    </div>
                    </section>
                    <!-- /.content -->
            </div>
            <!-- /.container -->
        </div>

    </section>

</div>


<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalEstudiantesCurso" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Estudiantes del Curso</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <table class="table table-bordered table-striped tablas">

                            <thead>

                                <tr>
                                    <th>Identificación</th>
                                    <th>Nombre Completo</th>
                                    <th> N° Carnet </th>
                                    <th>Acciones</th>


                                </tr>

                            </thead>

                            <tbody id="estudiantesCurso">






                            </tbody>

                        </table>



                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>

                </div>

            </form>

        </div>

    </div>

</div>