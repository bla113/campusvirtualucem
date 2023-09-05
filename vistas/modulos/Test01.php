<!--=====================================
MODAL AGREGAR REQUISITO
======================================-->

<div id="modalAgregarRequisito" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar requisito</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL MATERIA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <select class="form-control input-lg" name="nuevaMateria">

                                    <option value="">Selecionar Materia</option>

                                    <?php

                                    $materias = ControladorMateria::ctrMostrarMateria(null, null);

                                    foreach ($materias as $materia) {

                                        echo ' <option value="' . $materia['ID_MATERIA'] . '">' . $materia['NOM_MATERIA'] . '</option>';
                                    }

                                    ?>

                                </select>


                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CARRERA -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <select class="form-control input-lg" name="nuevaCarrera">

                                    <option value="">Selecionar Carrera</option>

                                    <?php

                                    $carreraras = ControladorCarrera::ctrMostrarCarrera(null, null);

                                    foreach ($carreraras as $carrerara) {

                                        echo ' <option value="' . $carrerara['ID_CARRERA'] . '">' . $carrerara['NOM_CARRERA'] . '</option>';
                                    }

                                    ?>

                                </select>


                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PLAN DE CARRERA -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <select class="form-control input-lg" name="nuvoPlanCarrera">

                                    <option value="">Selecionar Plan de Carrera</option>

                                    <?php

                                    $PlanCarrras = ControladorPlanCarrera::ctrMostrarPlanCarrera(null, null);

                                    foreach ($PlanCarrras as $PlanCarrra) {

                                        echo ' <option value="' . $PlanCarrra['ID_PLAN_CARRERA'] . '">' . $PlanCarrra['NOM_PLAN'] . '</option>';
                                    }

                                    ?>

                                </select>


                            </div>

                        </div>


                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnCrearRequisito" class="btn btn-primary">Guardar requisito</button>

                </div>

                <?php
                $CrearRequisito = new ControladorRequisito();
                $CrearRequisito->ctrCrearRequisito();

                ?>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarRequisito" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar requisito</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL MATERIA -->

                        <div class="form-group">

                        <input type="hidden" id="idMateria" name="idMateria">
                            <input type="hidden" id="idRequisito" name="idRequisito">

                            <label class="form-control input-lg"> Materia Seleccionado: <input type="text" id="materiaSeleccionada" disabled> </label>


                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <select class="form-control input-lg" name="editarMateria">

                                    <option value="">Selecionar Nueva Materia</option>

                                    <?php

                                    $materias = ControladorMateria::ctrMostrarMateria(null, null);

                                    foreach ($materias as $materia) {

                                        echo ' <option value="' . $materia['ID_MATERIA'] . '">' . $materia['NOM_MATERIA'] . '</option>';
                                    }

                                    ?>

                                </select>


                            </div>

                        </div>

                        <hr>
                        <!-- ENTRADA PARA LA CARRERA -->

                        <div class="form-group">

                        <input type="hidden" id="idCarrera" name="idCarrera">
                            <label class="form-control input-lg">Carrera Seleccionado: <input type="text" id="carreraSeleccionada" disabled> </label>



                            <div class="input-group">



                                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                <select class="form-control input-lg" name="editarCarrera">

                                    <option value="">Selecionar Nueva Carrera</option>

                                    <?php

                                    $carreraras = ControladorCarrera::ctrMostrarCarrera(null, null);

                                    foreach ($carreraras as $carrerara) {

                                        echo ' <option value="' . $carrerara['ID_CARRERA'] . '">' . $carrerara['NOM_CARRERA'] . '</option>';
                                    }

                                    ?>

                                </select>


                            </div>

                        </div>

                        <hr>

                        <!-- ENTRADA PARA EL PLAN DE CARRERA -->
                        <div class="form-group">

                        <input type="hidden" id="idPlanCarrera" name="idPlanCarrera">


                            <label class="form-control input-lg">Plan de Carrera Seleccionado: <input type="text" id="planCarreraSeleccionado" disabled> </label>





                            <div class="input-group">



                                <select class="form-control input-lg" name="editarPlanCarrera">

                                    <option value="">Selecionar Plan de Carrera</option>

                                    <?php

                                    $PlanCarrras = ControladorPlanCarrera::ctrMostrarPlanCarrera(null, null);

                                    foreach ($PlanCarrras as $PlanCarrra) {

                                        echo ' <option value="' . $PlanCarrra['ID_PLAN_CARRERA'] . '">' . $PlanCarrra['NOM_PLAN'] . '</option>';
                                    }

                                    ?>

                                </select>


                            </div>

                        </div>


                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnEditarRequisito" class="btn btn-primary">Guardar requisito</button>

                </div>

                <?php
                $EditarRequisito = new ControladorRequisito();
                $EditarRequisito->ctrEditarRequisito();

                ?>

            </form>

        </div>

    </div>

</div>

<?php

$BorrarRequisito= new ControladorRequisito();
$BorrarRequisito->ctrBorrarRequisito();
?>