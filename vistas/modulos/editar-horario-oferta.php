<?php


if (isset($_GET['ruta']) && $_GET['idHorariOferta']) {
    $grupos = ControladorOfertaAcademica::ctrMostrarGruposHorarios(null, null);
    $profesores = ControladorProfesor::ctrMostrarProfesor(null, null);
    $horarios = ControladorHorario::ctrMostrarHorario(null, null);
    $aulas = ControladorAula::ctrMostrarAula(null, null);
    $periodos = ControladorPeriodo::ctrMostrarPeriodo(null, null);

    $valor = $_GET['idHorariOferta'];
    $item = 'ID_HORARIO_OFERTA';

    $HorarioOferta = ControladorOfertaAcademica::ctrMostrarHoariosOfertaEdiatar($item, $valor);
}

?>


<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Editando Horaio ofertado

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Editar Horario Ofertado</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">


                <div class="box-body">

                    <div class="col-md-6 ">

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Editando Horario de la Materia: </h3>
                            </div>


                            <?php

                            foreach ($HorarioOferta as $key => $Horario) {


                                //print_r($HorarioOferta);
                            ?>
                                <form role="form" method="POST">





                                    <!-- ENTRADA PARA EL NOMBRE MATERIA -->

                                    <div class="form-group">

                                        <label for="">Creando el Horarario para la Materia ofertada</label>


                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                            <input type="text" value="<?php echo  $Horario['NOM_MATERIA'] ?>" class="form-control" id="editarnombreMateria" name="editarnombreMateria" disabled>

                                            <input type="hidden" name="editaridOferta" id="idOferta" value="<?php echo $_GET['idHorariOferta'] ?>">


                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA EL USUARIO -->

                                    <div class="form-group">

                                        <label for="">Ingrse el Grupo del Horario</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                            <select class="form-control" name="editarGrupoHorario">

                                                <option value="">Selecionar Grupo</option>

                                                <option value="<?php echo  $Horario['ID_PERIODO'] ?>" selected><?php echo  $Horario['NOMBRE_GRUPO'] ?></option>

                                                <?php

                                                foreach ($grupos as $key => $value) {
                                                    echo ' <option value="' . $value['ID_GRUPO_HORARIO'] . '">' . $value['NOMBRE_GRUPO'] . '</option>';
                                                }
                                                ?>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <h3 class="box-group">Seleccione Profesor</h3>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                            <select class="form-control" name="editarProfesorOferta" id="" required>

                                                <option value="">Selecionar Profesor</option>



                                                <option value="<?php echo  $Horario['ID_PROFESOR'] ?>" selected><?php echo  $Horario['NOMBRE_PROFESOR'] . $Horario['APELLIDO_PROFESOR'] ?></option>

                                                <?php

                                                foreach ($profesores as $key => $profesor) {

                                                    echo '<option  value="' . $profesor['ID_PROFESOR'] . '">' . $profesor['NOMBRE_COMPLETO'] . ' ' . $profesor['PRIMER_APELLIDO'] . ' ' . $profesor['SEGUNDO_APELLIDO'] . '</option>';
                                                }
                                                ?>


                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <h3 class="box-group">Seleccione Horario</h3>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                            <select class="form-control" name="editarhorarioOferta" id="grupoMateria" required>

                                                <option value="">Selecionar Horario</option>

                                                <option value="<?php echo  $Horario['ID_HORARIO'] ?>" selected><?php echo  $Horario['NOM_HORARIO'] ?></option>

                                                <?php

                                                foreach ($horarios as $key => $horario) {
                                                    echo '<option  value="' . $horario['ID_HORARIO'] . '">' . $horario['NOM_HORARIO'] . '</option>';
                                                }
                                                ?>

                                            </select>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA SUBIR FOTO -->

                                    <div class="form-group">

                                        <h3 class="box-group">Seleccione el Día</h3>


                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                            <select class="form-control" name="editardiaOferta" id="" required>

                                                <option value="">Selecionar Día</option>

                                                <option value="<?php echo  $Horario['DIA'] ?>" selected><?php echo  $Horario['DIA'] ?></option>


                                                <option value="LUNES">LUNES</option>

                                                <option value="MARTES">MARTES</option>

                                                <option value="MIERCOLES">MIERCOLES</option>

                                                <option value="JUEVES">JUEVES</option>

                                                <option value="VIERNES">VIERNES</option>

                                                <option value="SABADO">SABADO</option>

                                                <option value="DOMINGO">DOMINGO</option>


                                            </select>

                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <h3 class="box-group">Seleccione Aula</h3>


                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                            <select class="form-control" name="editaraulaOferta" id="grupoMateria" required>

                                                <option value="">Selecionar Aula </option>

                                                <option value="<?php echo  $Horario['ID_AULA'] ?>" selected><?php echo  $Horario['NOM_AULA'] ?></option>


                                                <?php

                                                foreach ($aulas as $key => $aula) {
                                                    echo '<option  value="' . $aula['ID_AULA'] . '">' . $aula['NOM_AULA'] . '</option>';
                                                } ?>

                                            </select>

                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <h3 class="box-group">Seleccione la Modalidad</h3>


                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                            <select class="form-control" name="editarmodalidadOferta" id="" required>

                                                <option value="">Selecionar Modalidad</option>

                                                <option value="<?php echo  $Horario['MODALIDAD'] ?>" selected><?php echo  $Horario['MODALIDAD'] ?></option>


                                                <option value="Presencial">Presencial</option>

                                                <option value="Tutoría">Tutoría</option>

                                                <option value="Suficiencia">Suficiencia</option>

                                                <option value="Práctica">Práctica</option>

                                            </select>

                                        </div>

                                    </div>

                         

                                    <div class="form-group">

                                        <h3 class="box-group">Seleccione Periodo</h3>


                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                            <select class="form-control" name="editaridPeriodo" id="editaridPeriodo" required>

                                                <option value="">Selecionar Periodo </option>

                                                <option value="<?php echo  $Horario['ID_PERIODO'] ?>" selected><?php echo  $Horario['ID_PERIODO'] ?></option>
                                               


                                                <?php

                                                foreach ($periodos as $key => $periodo) {
                                                    echo '<option  value="' . $periodo['ID_PERIODO'] . '">' . $periodo['NOM_PERIODO'] . '</option>';
                                                } ?>

                                            </select>

                                        </div>

                                    </div>


                        </div>

                    </div>

                <button type="submit" name="btnEditar" class="btn btn-primary flat btn-lg"> Guardar Cambios</button>
                <a href="oferta-academica" class="btn btn-success flat btn-lg"> Regresar</a>


                <?php

                            }
                            $CrearHorarioOferta = new ControladorOfertaAcademica();
                            $CrearHorarioOferta->ctrEditarHoarioOfertaAcademica();

                          
                ?>

                </form>

                </div>



            </div>

        </div>

</div>

</section>

</div>