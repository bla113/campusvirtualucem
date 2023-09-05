<?php
$Estudiantes = ControladorEstudiante::ctrMostrarEstudiante($_SESSION["usuario"]);
foreach ($Estudiantes as $estudiante) {
}
$valor = $estudiante['ID_ESTUDIANTE'];
$item = 'ID_ESTUDIANTE';
$MateriasEstudiante = ControladorCursos::ctrMostrarCusos($item, $valor);

//ya teniendo las materias hay que extraer los id de las materias para consulatar los 
//ir a la tabla curso_esudiante y traerse los cursos que sean del estudiante y qu tengan el id de la materia 


?>


<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Mis Cursos

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Cusos Activos</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">
        <?php // print_r($MateriasEstudiante);
        ?>



        <!-- =========================================================== -->

        <div class="row">
            <?php foreach ($MateriasEstudiante as $cursos) { ?>
                <div class="col-md-3">

                    <div class="box box-info box-solid">

                        <div class="box-header with-border">

                            <h3 class="box-title"><?php echo $cursos['NOM_MATERIA'] ?></h3>

                            <div class="box-tools pull-right">

                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>

                                </button>

                            </div>

                            <!-- /.box-tools -->
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="box box-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-aqua-active">

                                    <h3 class="widget-user-username">Docente: <?php echo $cursos['NOMBRE_PROFESOR'] ?></h3>

                                    <h5 class="widget-user-desc"><?php echo $cursos['APELLIDO_PROFESOR'] ?></h5>

                                </div>

                                <div class="widget-user-image">

                                    <img class="img-circle" src="vistas/img/usuarios/julio/100.png" alt="User Avatar">

                                </div>

                                <div class="box-footer">

                                    <div class="row">

                                        <div class="col-sm-4 border-right">

                                            <div class="description-block">

                                                <h5 class="description-header"><?php echo $cursos['CREDITOS'] ?></h5>

                                                <span class="description-text">Créditos</span>

                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">

                                            <div class="description-block">
                                                <span class="description-text">MODALIDIADAD</span>

                                                <h5 class="description-header"><?php echo $cursos['MODALIDAD'] ?></h5>

                                            </div>

                                        </div>

                                        <div class="col-sm-4">


                                            <div class="description-block">

                                                <h5 class="description-header"><?php echo $cursos['NOM_HORARIO'] ?> Horas</h5>

                                                <span class="description-text">Horario</span>

                                            </div>


                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        
                        <a href="index.php?ruta=detalle-curso&idCurso=<?php echo  $cursos['ID_HORARIO_OFERTA']  ?>" type="button" class="btn bg-maroon btn-flat margin ">Ir a Curso</a>





                    </div>


                </div>


            <?php } ?>

        </div>




    </section>

</div>