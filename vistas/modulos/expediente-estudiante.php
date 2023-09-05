<?php


$Estudiantes = ControladorEstudiante::ctrMostrarEstudiante($_SESSION["usuario"]);
foreach ($Estudiantes as $estudiante) {
}
$planCarrera = ControladorPlanCarrera::ctrMostrarPlanCarrera($estudiante['ID_PLAN_CARRERA']);
//print_r($planCarrera);

$materiasPlan = ControladorAsociarMateriasPlan::ctrMostrarMateriasSeleccionadas($estudiante['ID_CARRERA'], $estudiante['ID_PLAN_CARRERA']);

?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>

            Expediente Estudiante

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Expediente estudiantes</li>

        </ol>
    </section>


    <section class="content">

        <div class="row">

            <div class="col-md-2">


                <div class="box box-primary">
                    <?php // print_r($materiasPlan);
                    ?>

                    <div class="box-body box-profile">

                        <img class="profile-user-img img-responsive img-circle" src="vistas/img/estudiantes/207140318/459.png" alt="User profile picture">

                        <h3 class="profile-username text-center"></h3>

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered">

                            <li class="list-group-item">

                                <b>Identificación: <?php $estudiante['IDENTIFICACION_ESTUDIANTE'] ?></b> <a class="pull-right"></a>

                            </li>

                            <li class="list-group-item">

                                <b>Fecha de Ingreso: <?php $estudiante['FECHA_CREACION'] ?></b> <a class="pull-right"></a>


                            </li>

                            <li class="list-group-item">

                                <b>Número de Carnet: <?php $estudiante['NUM_CARNE'] ?> </b> <a class="pull-right"></a>


                            </li>

                            <li class="list-group-item">

                                <b>Estado: <?php echo $resultado = $estudiante['ESTADO'] > 0 ? 'Activo' : 'Desactivado'; ?></b> <a class="pull-right"></a>

                            </li>

                            <li class="list-group-item">

                                <b>Total de Creditos: <?php $total = array_sum(array_column($materiasPlan, 'CREDITOS'));
                                                        echo $total; ?></b> <a class="pull-right"></a>

                            </li>

                            <li class="list-group-item">

                                <b>Total de Creditos Aprobados: <?php $total = array_sum(array_column($materiasPlan, 'CREDITOS'));
                                                                echo $total; ?></b> <a class="pull-right"></a>

                            </li>
                            <li class="list-group-item">
                                <b>Progreso:</b>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                                <b>50 %: !Felicidades¡</b>

                            </li>


                        </ul>

                        <a href="#" class="btn btn-success btn-block"><b><i class=" fa fa-whatsapp"></i>Ponerme en contacto </b></a>



                        <a href="#" class="btn btn-primary btn-block"><b><i class="fa fa-send"></i>Enviar Correo</b></a>

                        <a href="#" class="btn btn-primary btn-block"><b><i class="fa fa-id-badge"></i> Solicitar Carnet Virtual</b></a>

                    </div>

                </div>




            </div>
            <!-- /.col -->
            <div class="col-md-9">

                <div class="nav-tabs-custom">

                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#PlandeEstudios" data-toggle="tab">Plan de Estudios</a></li>

                        <li><a href="#Materiasaprobadas" data-toggle="tab">Materias Aprobadas</a></li>

                        <li><a href="#Materiaspendientes" data-toggle="tab">Materias Pendientes</a></li>

                        <li><a href="#MateriasMatriculadas" data-toggle="tab">Materias Matriculadas</a></li>

                        <li><a href="#OfertaMatricula" data-toggle="tab">Oferta Matricula</a></li>

                        

                    </ul>

                    <div class="tab-content">
                        <!-- PANEL DE PLAN DE ESTUDIOS -->
                        <div class="active tab-pane" id="PlandeEstudios">


                            <table class="table table-bordered table-striped  tablas">

                                <thead>

                                    <tr>
                                        <th>Código</th>
                                        <th>Materia</th>
                                        <th>Créditos</th>
                                        <th>Requisitos</th>
                                        <th>Orden</th>
                                        <th>Cuatrimestre</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    foreach ($materiasPlan as $Materias) { ?>


                                        <tr>
                                            <td> <?php echo $Materias['COD_MATERIA'] ?></td>
                                            <td><?php echo $Materias['NOM_MATERIA'] ?></td>
                                            <td><?php echo $Materias['CREDITOS'] ?></td>
                                            <td><?php $array = json_decode($Materias['COD_REQUISITO'], true);

                                                foreach ($array as $requisitos => $requisito) {

                                                    echo '<button class="btn btn-primary btn-xs">' . $requisito . '</button>';
                                                }
                                                ?></td>
                                            <td><?php echo $Materias['ORDEN'] ?>°</td>

                                            <td><?php echo $Materias['PERIODO'] ?>°Cuatrimestre </td>


                                        </tr>

                                    <?php  } ?>

                                </tbody>
                            </table>



                        </div>
                        <!-- FIN PANEL DE PLAN DE ESTUDIOS -->


                        <!-- INICIO PANEL  MATERIAS APROBADAS -->

                        <div class="tab-pane" id="Materiasaprobadas">

                            <!-- Materias Aprobadas  del Estudiante -->
                            <section class="content">

                                <div class="box">


                                    <div class="box-body">

                                        <table class="table table-bordered table-striped tablas">

                                            <thead>

                                                <tr>
                                                    <th>Código</th>
                                                    <th>Materia</th>
                                                    <th>Créditos</th>
                                                    <th>Requisitos</th>
                                                    <th>Estado</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $IdEstudiante =$estudiante['ID_ESTUDIANTE'];
                                                
                                                $MateriasAprobadas = ControladorEstudiante::ctrMostrarMateriasAprobadasEstudiante($IdEstudiante);


                                                

                                                foreach ($MateriasAprobadas as $MateriasA) { ?>


                                                    <tr>
                                                        <td> <?php echo $MateriasA['COD_MATERIA'] ?></td>
                                                        <td><?php echo $MateriasA['NOM_MATERIA'] ?></td>
                                                        <td><?php echo $MateriasA['CREDITOS'] ?></td>
                                                        <td><?php $Aprobadas_array = json_decode($MateriasA['COD_REQUISITO'], true);

                                                            foreach ($Aprobadas_array as $requisitos => $requisito) {

                                                                echo '<button class="btn btn-success btn-xs">' . $requisito . '</button>';
                                                            }
                                                            ?></td>
                                                        <td>
                                                            <button class="btn btn-warning btn-xs"><?php echo $MateriasA['NOMBRE_ESTADO'] ?></button>
                                                        </td>


                                                    </tr>

                                                <?php  } ?>

                                            </tbody>
                                        </table>


                                    </div>

                                </div>

                            </section>
                        </div>


                        <div class="tab-pane" id="Materiaspendientes">

                            <!-- Todas las Materias del Estudiante -->

                            <section class="content">

                                <div class="box">


                                    <div class="box-body">

                                        <table class="table table-bordered table-striped tablas">

                                            <thead>

                                                <tr>
                                                    <th>Código</th>
                                                    <th>Materia</th>
                                                    <th>Créditos</th>
                                                    <th>Requisitos</th>
                                                    <th>Estado</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php


                                                $valor = $estudiante['ID_ESTUDIANTE'];


                                                $MateriasEstudiante = ControladorEstudiante::ctrMostrarMateriasEstudiante($valor);

                                                //print_r($MateriasEstudiante);

                                                foreach ($MateriasEstudiante as $Materias) { ?>


                                                    <tr>
                                                        <td> <?php echo $Materias['COD_MATERIA'] ?></td>
                                                        <td><?php echo $Materias['NOM_MATERIA'] ?></td>
                                                        <td><?php echo $Materias['CREDITOS'] ?></td>
                                                        <td><?php $array = json_decode($Materias['COD_REQUISITO'], true);

                                                            foreach ($array as $requisitos => $requisito) {

                                                                echo '<button class="btn btn-primary btn-xs">' . $requisito . '</button>';
                                                            }
                                                            ?></td>
                                                        <td> <button class="btn btn-danger btn-xs"><?php echo $Materias['NOMBRE_ESTADO'] ?></button></td>


                                                    </tr>

                                                <?php  } ?>

                                            </tbody>
                                        </table>


                                    </div>

                                </div>

                            </section>
                        </div>

                        <!-- FIN PANEL DE  MATERIAS APROBADAS -->
                        <div class="tab-pane" id="OfertaMatricula">
                            <section class="content">

                                <div class="box">


                                    <div class="box-body">

                                        <div class="box-header with-border ">

                                            <a class="btn btn-app bg-aqua-active pull-right" href="index.php?ruta=detalle-pre-matricula&idEstudiante=<?php echo $estudiante['ID_ESTUDIANTE']?>&idPlanCarrera=<?php echo $estudiante['ID_PLAN_CARRERA']?>&idCarrera=<?php echo $estudiante['ID_CARRERA']?>">

                                                <i class="fa fa-cart-plus"></i> Ver Mátricula
                                            </a>


                                            <a class="btn btn-app bg-aqua-active" id="numeroMatriculas">
                                                <span class="badge bg-teal">0</span>
                                                <i class="fa fa-file-pdf-o"></i>
                                            </a>

                                        </div>
                                        <?php
                                        $valor = $estudiante['ID_ESTUDIANTE'] ;
                                        $respuestaO = ControladorOfertaAcademica::ctrMostrarOfertaPorEstudiante($valor);
                                        $mis_requsitos = ControladorOfertaAcademica::ctrMostrarRequisitosEstudianteAprobados($valor);

                                        ?>




                                        <table class="table table-bordered table-striped tablas">

                                            <thead>

                                                <tr>
                                                    <th>Periodo</th>
                                                    <th>Materia</th>
                                                    <th>Requisitos</th>
                                                    <th style="width:10px">Créditos</th>
                                                    <th>Matricular</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php





                                                foreach ($respuestaO as $oferta) { ?>


                                                    <tr>
                                                        <td> <?php echo $oferta['NOM_PERIODO'] ?></td>
                                                        <td><?php echo $oferta['NOM_MATERIA'] ?></td>
                                                        <td><?php $array = json_decode($oferta['COD_REQUISITO'], true);

                                                            foreach ($array as $requisitos => $requisito) {

                                                                echo '<button class="btn btn-primary btn-xs">' . $requisito . '</button>';
                                                            }
                                                            ?></td>
                                                        <td><?php echo $oferta['CREDITOS'] ?></td>


                                                        <td>
                                                            <?php

                                                            $array_requisitos = json_decode($oferta['COD_REQUISITO'], true);

                                                            foreach ($array_requisitos as $array_requisito) {

                                                                //Buscamos en los requisitos aprobados exista en la collecion requsitos de oferta

                                                                $found_key = array_search($array_requisito, array_column($mis_requsitos, 'COD_MATERIA'));
                                                                // echo  $found_key;

                                                                if ($found_key != "") { //Si existe un dato le habilitamos la matricula

                                                                    echo '<button class="btn btn-instagram accent-gray btnVerHorariosMaterias" idOferta=" ' . $oferta['ID_OFERTA'] . '" idEstudiante="' . $IdEstudiante . '" idCarrera="'.  $estudiante['ID_CARRERA'] .'" idPlanCarrera="'.  $estudiante['ID_PLAN_CARRERA'] .'" data-toggle="modal" data-target="#modalHorariosOferta">Ver Horarios</button>';
                                                                }
                                                                if ($found_key == "") {

                                                                    if (in_array("Admitida en U", $array_requisitos)) {

                                                                        echo '<button class="btn btn-success accent-gray btnVerHorariosMaterias" idOferta=" ' . $oferta['ID_OFERTA'] . '" idEstudiante="' . $IdEstudiante . '" idCarrera="'. $estudiante['ID_CARRERA'] .'" idPlanCarrera="'. $estudiante['ID_PLAN_CARRERA'] .'" data-toggle="modal" data-target="#modalHorariosOferta">Ver Horarios</button>';
                                                                    } else {
                                                                        echo '<button class="btn btn-danger accent-gray" disabled >Faltan Requisitos</button>';
                                                                    }
                                                                }

                                                                break;
                                                            }

                                                            ?>

                                                        </td>

                                                    </tr>

                                                <?php  } ?>

                                            </tbody>
                                        </table>



                                    </div>

                                </div>

                            </section>
                        </div>

                        <div class="tab-pane" id="MateriasMatriculadas">
                            <section class="content">

                                <div class="box">



                                    <div class="box-body">

                                        <table class="table table-bordered table-striped tablas">

                                            <thead>

                                                <tr>
                                                    <th>Código</th>
                                                    <th>Materia</th>
                                                    <th>Créditos</th>
                                                    <th>Requisitos</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php


                                                $valor = $estudiante['ID_ESTUDIANTE'] ;
                                                $total = 0;

                                                $MateriasEstudiante = ControladorEstudiante::ctrMostrarMateriasMatriculadasEstudiante($valor);

                                                //print_r($MateriasEstudiante);

                                                foreach ($MateriasEstudiante as $Materias) { ?>


                                                    <tr>
                                                        <td> <?php echo $Materias['COD_MATERIA'] ?></td>
                                                        <td><?php echo $Materias['NOM_MATERIA'] ?></td>
                                                        <td><?php echo $Materias['CREDITOS'] ?></td>
                                                        <td><?php $array = json_decode($Materias['COD_REQUISITO'], true);

                                                            foreach ($array as $requisitos => $requisito) {

                                                                echo '<button class="btn btn-success btn-xs">' . $requisito . '</button>';
                                                            }
                                                            ?></td>
                                                        <td> <button class="btn btn-success btn-xs"><?php echo $Materias['NOMBRE_ESTADO'] ?></button></td>
                                                        <td>
                                                            <button class="btn btn-danger"><i class="fa fa-book"></i></button>
                                                            <button class="btn btn-danger"><i class="fa fa-check-circle"></i></button>
                                                        </td>

                                                    </tr>

                                                <?php  } ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </section>
                        </div>

                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>

<!--=====================================
MODAL VER HORARIOS OFERTADOS
======================================-->

<div id="modalHorariosOferta" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Horarios Disponibles </h4>

            </div>

            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

            <div class="modal-body ">

                <div class="box-body">




                    <table class="table table-bordered table-striped tablas">

                        <thead>

                            <tr>
                                <th>Grupo</th>
                                <th>Materia</th>
                                <th>Profesor</th>
                                <th>Modaliad</th>
                                <th>Aula</th>
                                <th>Horario</th>
                                <th>Día</th>
                                <th>Capacidad</th>
                                <th>Matricular</th>

                            </tr>

                        </thead>

                        <tbody id="horariosOferta">






                        </tbody>

                    </table>




                </div>

            </div>

            <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>



            </div>



        </div>

    </div>

</div>