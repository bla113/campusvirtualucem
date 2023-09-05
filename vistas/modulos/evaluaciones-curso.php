<?php
if (isset($_GET['ruta']) && $_GET['ruta'] == 'evaluaciones-curso') {
    $idUsuario = $_GET['idHorarioOferta'];
    $idMateria = $_GET['idMateria'];
    $idHorarioOferta = $_GET['idHorarioOferta'];
}
?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Evaluaciones del Curso:

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar usuarios</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <a class="btn btn-app bg-aqua-gradient" href="index.php?ruta=detalle-curso&idCurso=1"><i class="fa fa-home"></i>Regresar</a>

                <button class="btn btn-app" id="btnCrearExamen" idHorarioOferta="<?php echo $idHorarioOferta ?>" idMateria="<?php echo $idMateria ?>" idUsuario="<?php echo $idUsuario ?>" data-toggle="modal" data-target="#modalCrearExamen"><i class="fa fa-plus"></i> Crear Examen</button>

            </div>



            <div class="box-body">

                <div class="col-md-12">

                    <div class="nav-tabs-custom">

                        <ul class="nav nav-tabs">

                            <li class="active bg-yellow-active"><a href="#evaluaciones-curso" data-toggle="tab">EXAMENES</a></li>
                            <?php if ($_SESSION['perfil'] !== 'SOPORTE') {
                                                            echo '  <li class=" accent-blue bg-yellow-active"><a href="#mis-resultdos" data-toggle="tab">MIS RESULTADOS</a></li>';
                                                        } ?>
                           

                        </ul>

                        <div class="tab-content">

                            <div class="active tab-pane" id="evaluaciones-curso">

                                <table class="table table-bordered table-striped tablas">


                                    <thead>

                                        <tr>

                                            <th style="width:10px">#</th>
                                            <th>Nombre Prueba</th>
                                            <th>Número de Preguntas</th>
                                            <th>Puntaje Mínimo</th>
                                            <th>Intentos</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>

                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php
                                        $item = 'ID_HORARIO_OFERTA';
                                        $valor = $idHorarioOferta;
                                        $examenes = ControladorExamen::ctrMostrarExamen($item, $valor);
                                        foreach ($examenes as $key => $examen) { ?>

                                            <tr>
                                                <td><?php echo $examen['ID_EXAMEN'] ?></td>
                                                <td><?php echo $examen['NOMBRE_EXAMEN'] ?></td>
                                                <td><?php echo count($examenes) ?></td>
                                                <td><?php echo $examen['PUNTAJE_MINIMO'] ?></td>
                                                <td><button class="btn btn-instagram btn-xs"><?php echo $examen['INTENTOS'] ?></button></td>
                                                <td><button class="btn btn-info btn-xs"><?php if ($examen['ESTADO'] == 1) {
                                                                                            echo 'Activo';
                                                                                        } else {
                                                                                            echo 'Deactivado';
                                                                                        } ?></button></td>
                                                <td>

                                                    <div class="btn-group">

                                                        <button class="btn btn-primary"><i class="fa-solid fa-door-open"></i></button>
                                                        <?php if ($_SESSION['perfil'] == 'SOPORTE') {
                                                            echo ' <a class="btn btn-success" href="preguntas-examen" ><i class="fa-solid fa-question"></i></a>';
                                                            echo '<button class="btn btn-danger btnEliminarExamen" idExamen="'.$examen['ID_EXAMEN'].'"  idHorarioOferta="'. $idHorarioOferta.'" idMateria="'.$idMateria.'" idUsuario="'.$idUsuario.'"><i class="fa fa-trash"></i></button>';
                                                        } ?>



                                                    </div>

                                                </td>

                                            </tr>

                                        <?php } ?>



                                    </tbody>

                                </table>



                            </div>

                            <div class="tab-pane" id="mis-resultdos">

                                <table class="table table-bordered table-striped tablas">


                                    <thead>

                                        <tr>

                                            <th style="width:10px">#</th>
                                            <th>Nombre Prueba</th>
                                            <th>Número de Preguntas</th>
                                            <th>Puntaje Obenido</th>
                                            <th>Intentos</th>
                                            <th>IP origen</th>


                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>I Examen Parcial</td>
                                            <td>30</td>
                                            <td><button class="btn btn-dropbox btn-xs">90%</button></td>
                                            <td><button class="btn btn-instagram btn-xs">1</button></td>
                                            <td><button class="btn btn-info btn-xs"> <?php
                                                                                        echo $ip_add = $_SERVER['REMOTE_ADDR'];

                                                                                        ?></button></td>


                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>II Examen Parcial</td>
                                            <td>30</td>
                                            <td><button class="btn btn-dropbox btn-xs">70%</button></td>
                                            <td><button class="btn btn-instagram btn-xs">1</button></td>
                                            <td><button class="btn btn-info btn-xs"><?php
                                                                                    echo $ip_add = $_SERVER['REMOTE_ADDR'];

                                                                                    ?></button></td>


                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>III Examen Parcial</td>
                                            <td>30</td>
                                            <td><button class="btn btn-google btn-xs">60%</button></td>
                                            <td><button class="btn btn-instagram btn-xs">1</button></td>
                                            <td><button class="btn btn-info btn-xs"><?php
                                                                                    echo $ip_add = $_SERVER['REMOTE_ADDR'];

                                                                                    ?></button></td>


                                        </tr>




                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<!--=====================================
MODAL CREAR EXAMEN
======================================-->

<div id="modalCrearExamen" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Crear Examen</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">
                            <label for="">Nombre de la Prueba</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" name="tituloExamen" placeholder="Ingresar nombre de la prueba" required>

                            </div>

                        </div>

                        <input type="hidden" id="idHorarioOferta" name="idHorarioOferta">
                        <input type="hidden" id="idMateriaExamen" name="idMateriaExamen">
                        <input type="hidden" id="idUsuario" name="idUsuario">

                        <!-- ENTRADA PARA PESO NOTA -->

                        <div class="form-group">


                            <label for="">Peso de la Nota</label>


                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa-solid fa-percent"></i></span>

                                <input type="number" class="form-control input-lg" name="pesoNota" placeholder="Ingresar el Peso de la Nota" required>

                            </div>

                        </div>



                        <!-- ENTRADA INTENTOS -->

                        <div class="form-group">


                            <label for="">Ingresar los Intentos permitidos</label>


                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa-solid fa-percent"></i></span>

                                <input type="number" class="form-control input-lg" name="intentosExamen" placeholder="Ingresar los intentos que para realizar el examen" required>

                            </div>

                        </div>



                        <!-- ENTRADA PUNTAJE MINIMO -->

                        <div class="form-group">


                            <label for="">Ingresar Puntaje Mínimo</label>


                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa-solid fa-percent"></i></span>

                                <input type="number" value="70" class="form-control input-lg" name="puntajeMinimoExamen" placeholder="Ingresar el puntaje minimo " required>

                            </div>

                        </div>

                        <!-- ENTRADA INICIO -->

                        <div class="form-group">

                            <label for="">Ingrese la fecha inicial en la que se aplicará la prueba</label>


                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                                <input type="datetime-local" class="form-control input-lg" name="fechaInicio" placeholder="Ingresar fecha y hora de Inicio" required>

                            </div>

                        </div>


                        <!-- ENTRADA FINAL -->

                        <div class="form-group">

                            <label for="">Ingrese la fecha final en la que se aplicará la prueba</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                                <input type="datetime-local" class="form-control input-lg" name="fechaFinal" placeholder="Ingresar fecha y hora de Final" required>

                            </div>

                        </div>

                    </div>

                </div>

                <!--=====================================
                    PIE DEL MODAL
                         ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnCrearExamen" class="btn btn-primary">Guardar prueba</button>

                </div>

                <?php
                $crearExamen = new ControladorExamen();
                $crearExamen->ctrCrearExamen();
                ?>

            </form>

        </div>

    </div>

</div>

<?php
$borrarExamen=new ControladorExamen();
$borrarExamen->ctrBorrarExamen();
?>