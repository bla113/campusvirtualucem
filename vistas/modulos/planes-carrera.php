<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Planes de Carrera

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Planes de Carrera</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPlanCarrera">

                    Agregar Planes de Carrera

                </button>
              


            </div>
<?php
//$res=ControladorPlanCarrera::ctrCrearPlanCarrera();
//print_r($res)
?>
            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                        <tr>
                            <th style="width:100px">Carrera</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th style="width:100px">Créditos</th>
                            <th style="width:100px">Periodos</th>
                            <th>Fecha de Creación</th>
                            
                            <th>Asignar Materias</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>
                        <?php $plan_carreras = ControladorPlanCarrera::ctrMostrarPlanCarrera(null, null);
                        foreach ($plan_carreras as $planes) { ?>

                            <tr>
                                <td><?php echo $planes['NOM_CARRERA'] ?></td>
                                <td><?php echo $planes['COD_PLAN_CARRERA'] ?></td>
                                <td><?php echo $planes['NOM_PLAN'] ?></td>
                                <td><?php echo $planes['CREDITOS'] ?></td>
                                <td><?php echo $planes['PERIODOS'] ?></td>
                                <td><?php echo $planes['FECHA_CREACION'] ?></td>
                                <td><a href="index.php?ruta=asignar-materias-plan&idPlanCarrera=<?php  echo $planes['ID_PLAN_CARRERA'] ?>&idCarrera=<?php  echo $planes['ID_CARRERA'] ?> " class="btn btn-primary">Asiganar Materias</a></td>
                                

                                <td>

                                    <div class="btn-group">

                                        <button class="btn btn-warning btnEditarPlanCarrrera" idPlanCarrera="<?php echo  $planes['ID_PLAN_CARRERA'] ?>" data-toggle="modal" data-target="#modalEditarPlanCarrera"><i class="fa fa-pencil"></i></button>

                                        <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                                        
                                        <a href=" " class="btn btn-success"><i class="fa fa-eye" ></i></a>

                                    </div>

                                </td>

                            </tr>
                        <?php } ?>


                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>


<!--=====================================
MODAL AGREGAR PLAN CARRERA
======================================-->

<div id="modalAgregarPlanCarrera" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
                CABEZA DEL MODAL
                 ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Plan de carrera</h4>

                </div>

                <!--=====================================
                 CUERPO DEL MODAL
                 ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR CARRERA -->

                        <form action="" method="post">

                            <div class="form-group">
                                <label for="">Seleccione la Carrera</label>

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <select class="form-control input-lg" name="carreraPlan">

                                        <option value="">Selecionar Carrera</option>
                                        <?php
                                        $carreras = ControladorCarrera::ctrMostrarCarrera(null, null);
                                        foreach ($carreras as $carrera) {
                                            echo '<option value="' . $carrera['ID_CARRERA'] . '">' . $carrera['CODIGO_CARRERA'] . '-' . $carrera['NOM_CARRERA'] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>

                            <!-- ENTRADA PARA EL CODIGO -->

                            <div class="form-group">

                            <label for="">Ingrese el Código del Plan de Carrera</label>


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                    <input type="text" class="form-control input-lg" name="codigoPlan" placeholder="Ingresar Código Plan" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA NOMBRE PLAN -->

                            <div class="form-group">

                            <label for="">Ingrese el Nombre del Plande Carrera</label>


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                    <input type="text" class="form-control input-lg" name="nombrePlan" placeholder="Ingresar Nombre Plan" required>

                                </div>

                            </div>
                            <!-- ENTRADA PARA CANTIDAD DE CRÉDITOS -->

                            <div class="form-group">

                            <label for="">Ingrese la Cantidad de Créditos del Plan de Carrera</label>


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa  fa-bookmark-o"></i></span>

                                    <input type="number" class="form-control input-lg" name="cantCreditos" value="128" min="0" max="200" placeholder="Ingresar cantidad de Créditos" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA CANTIDAD DE PERIODOS -->

                            <div class="form-group">


                            <label for="">Ingrese la Cantidad de Periodos del Plan de Carrera</label>

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                    <input type="number" class="form-control input-lg" name="cantPeriodos" value="8" placeholder="Ingresar cantidad de Periodos" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA SELECCIONAR SU PERIODO -->

                            <div class="form-group">

                            <label for="">Fecha de Inicio</label>


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                    <input type="date" class="form-control input-lg" name="fechaInicioPlan" required>
                             

                                </div>

                            </div>


                    </div>

                </div>

                <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnGuardarPlanCarrera" class="btn btn-primary">Guardar Plan Carrera</button>

                </div>

                <?php
                $CrearPlanCarrera= new ControladorPlanCarrera();
                $CrearPlanCarrera->ctrCrearPlanCarrera();
                
                ?>

            </form>

        </div>

    </div>

</div>


<!--=====================================
MODAL EDITAR PLAN CARRERA
======================================-->

<div id="modalEditarPlanCarrera" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
                CABEZA DEL MODAL
                 ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Plan de carrera</h4>

                </div>

                <!--=====================================
                 CUERPO DEL MODAL
                 ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR CARRERA -->

                        <form action="" method="post">

                            <div class="form-group">

                                <div class="input-group">

                                    <input type="text" class="form-control input-lg" id="editarNombreCarrera" name="editarCarrera" disabled required>
                                    <input type="hidden" id="IdCarreraSeleccinado" name="IdCarreraSeleccinado">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                        <select class="form-control input-lg" name="editadoCarreraPlan">

                                            <option value="">Selecionar la nueva Carrera</option>
                                            <?php
                                            $carreras = ControladorCarrera::ctrMostrarCarrera(null, null);
                                            foreach ($carreras as $carrera) {
                                                echo '<option value="' . $carrera['ID_CARRERA'] . '">' . $carrera['CODIGO_CARRERA'] . '-' . $carrera['NOM_CARRERA'] . '</option>';
                                            }
                                            ?>

                                        </select>

                                    </div>


                                </div>

                            </div>

                            <!-- ENTRADA PARA EL CODIGO -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                    <input type="text" class="form-control input-lg" id="editarCodigoPlan" name="editarCodigoPlan" placeholder="Ingresar Código Plan" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA NOMBRE PLAN -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                    <input type="text" class="form-control input-lg" id="EditarnombrePlan" name="EditarnombrePlan" placeholder="Ingresar Nombre Plan" required>

                                </div>

                            </div>
                            <!-- ENTRADA PARA CANTIDAD DE CRÉDITOS -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa  fa-square"></i></span>

                                    <input type="number" class="form-control input-lg" id="EditarcantCreditos" name="EditarcantCreditos" placeholder="Ingresar cantidad de Créditos" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA CANTIDAD DE PERIODOS -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-square"></i></span>

                                    <input type="number" class="form-control input-lg" id="EditarcantPeriodos" name="EditarcantPeriodos" value="8" placeholder="Ingresar cantidad de Periodos" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA SELECCIONAR SU PERIODO -->

                            <div class="form-group">

                            <input type="text" class="form-control input-lg" id="editarPeriodoPlanCarrera" name="editarPeriodoPlanCarrera" disabled required>
                            <input type="hidden" id="IdPlanSeleccionado" name="IdPlanSeleccionado">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-square"></i></span>

                                    <select class="form-control input-lg" name="EditarPeriodoPlan" >
                                        <option value="">Selecionar nevo periodo</option>
                                        <?php
                                        $periodos = ControladorPeriodo::ctrMostrarPeriodo(null, null);
                                        foreach ($periodos as $periodo) {
                                            echo '<option value="' . $periodo['ID_PERIODO'] . '">' . $periodo['NOM_PERIODO'] . '</option>';
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

                    <button type="submit" name="btnEditarPlanCarrera" class="btn btn-primary">Guardar Plan Carrera</button>

                </div>

            </form>

        </div>

    </div>

</div>