<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar periodos

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar periodos</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPeriodo">

                    Agregar periodo

                </button>

            </div>

           <?php
           //$res=ControladorPeriodo::ctrCrearPeriodo();
          //print_r($res);
           ?>



            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $periodos = ControladorPeriodo::ctrMostrarPeriodo(null, null);
                        foreach ($periodos as $periodo) { ?>


                            <tr>
                                <td><?php echo $periodo['ID_PERIODO'] ?></td>
                                <td><?php echo $periodo['COD_PERIODO'] ?></td>
                                <td><?php echo $periodo['NOM_PERIODO'] ?></td>
                                <td><?php
                                    if ($periodo['ESTADO_PERIODO'] == 1) {
                                        echo '<button class="btn btn-success btn-xs">Activo</button>';
                                    }
                                    if ($periodo['ESTADO_PERIODO'] == 2) {
                                        echo '<button class="btn btn-primary btn-xs">En Periodo Ordinario</button>';
                                    }
                                    if ($periodo['ESTADO_PERIODO'] == 3) {
                                        echo '<button class="btn btn-danger btn-xs">En Periodo  Extra Ordinario</button>';
                                    }
                                    if ($periodo['ESTADO_PERIODO'] == 4) {
                                        echo '<button class="btn btn-info btn-xs disabled">Terminado</button>';
                                    }
                                    ?></td>
                                <td>

                                    <div class="btn-group">

                                        <button class="btn btn-warning btnEditarPeriodo" idPeriodo="<?php echo $periodo['ID_PERIODO'] ?>" data-toggle="modal" data-target="#modalEditarPeriodo"><i class="fa fa-edit"></i></button>

                                        <button class="btn btn-danger btnEliminarPeriodo" idPeriodo="<?php echo $periodo['ID_PERIODO'] ?>"><i class="fa fa-times"></i></button>

                                    </div>

                                </td>

                            </tr>

                        <?php }
                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarPeriodo" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar periodo</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-gear"></i></span>

                                <input type="text" class="form-control input-lg" id="" name="nuevoPeriodo" placeholder="Ingresar nombre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CODIGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-gear"></i></span>

                                <input type="text" class="form-control input-lg" id="" name="nuevoCodigoPeriodo" placeholder="Ingresar Código Periodo" required>

                            </div>

                        </div>



                        <!-- ENTRADA PARA SELECCIONAR INICIO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha de Inicio</label>


                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="inicioPeriodo" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FIN -->

                        <div class="form-group">

                            <label class="form-control ">Fecha de Finaliza</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="finPeriodo" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR INICIO ORDINARIO -->

                        <div class="form-group">

                            <label class="form-control ">Inicia Ordinario</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="inicioOrdinario" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR DIN ORDINARIO -->

                        <div class="form-group">

                            <label class="form-control ">Finaliza Ordinario</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="finOrdinario" value="">

                            </div>

                        </div>


                        <!-- ENTRADA PARA SELECCIONAR INICIO EXTRA ORDINARIO -->

                        <div class="form-group">

                            <label class="form-control ">Inicia Extraordinario</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="inicioExtraOrdinario" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR INICIO EXTRA ORDINARIO -->

                        <div class="form-group">

                            <label class="form-control ">Finaliza Extraordinario</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="finExtraOrdinario" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FECHA PRIMER PAGO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha primer pago</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="primerPago" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FECHA SEGUNDO PAGO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha segundo pago</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="segundoPago" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FECHA TERCER PAGO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha tercer pago</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="tercerPago" value="">

                            </div>

                        </div>



                        <!-- ENTRADA PARA SELECCIONAR FECHA CUARTO PAGO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha cuarto pago</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="" name="cuartoPago" value="">

                            </div>

                        </div>


                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnCrearPeriodo" class="btn btn-primary">Guardar Periodo</button>

                </div>

                <?php

                //$CrearPriodo = new ControladorPeriodo();
                //$CrearPriodo->ctrCrearPeriodo();

                ?>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL MODIFICAR USUARIO
======================================-->

<div id="modalEditarPeriodo" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar periodo</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-gear"></i></span>

                                <input type="text" class="form-control input-lg" id="editarPeriodo" name="editarPeriodo" placeholder="Ingresar nombre" required>
                                <input type="hidden" name="IdPeriodo" id="IdPeriodo">
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CODIGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-gear"></i></span>

                                <input type="text" class="form-control input-lg" id="editarCodigoPeriodo" name="editarCodigoPeriodo" placeholder="Ingresar Código Periodo" required>

                            </div>

                        </div>



                        <!-- ENTRADA PARA SELECCIONAR INICIO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha de Inicio</label>


                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editarInicioPeriodo" name="editarInicioPeriodo" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FIN -->

                        <div class="form-group">

                            <label class="form-control ">Fecha de Finaliza</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editarfinPeriodo" name="editarfinPeriodo" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR INICIO ORDINARIO -->

                        <div class="form-group">

                            <label class="form-control ">Inicia Ordinario</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editarinicioOrdinario" name="editarinicioOrdinario" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR DIN ORDINARIO -->

                        <div class="form-group">

                            <label class="form-control ">Finaliza Ordinario</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editarfinOrdinario" name="editarfinOrdinario" value="">

                            </div>

                        </div>


                        <!-- ENTRADA PARA SELECCIONAR INICIO EXTRA ORDINARIO -->

                        <div class="form-group">

                            <label class="form-control ">Inicia Extraordinario</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editarinicioExtraOrdinario" name="editarinicioExtraOrdinario" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR INICIO EXTRA ORDINARIO -->

                        <div class="form-group">

                            <label class="form-control ">Finaliza Extraordinario</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editarfinExtraOrdinario" name="editarfinExtraOrdinario" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FECHA PRIMER PAGO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha primer pago</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editarprimerPago" name="editarprimerPago" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FECHA SEGUNDO PAGO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha segundo pago</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editarsegundoPago" name="editarsegundoPago" value="">

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR FECHA TERCER PAGO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha tercer pago</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editartercerPago" name="editartercerPago" value="">

                            </div>

                        </div>



                        <!-- ENTRADA PARA SELECCIONAR FECHA CUARTO PAGO -->

                        <div class="form-group">

                            <label class="form-control ">Fecha cuarto pago</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input class="form-control input-lg" type="datetime-local" id="editarcuartoPago" name="editarcuartoPago" value="">

                            </div>

                        </div>


                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnEditarPeriodo" class="btn btn-primary">Guardar Periodo</button>

                </div>

                <?php

                $EditarPriodo = new ControladorPeriodo();
                 $EditarPriodo->ctrEditarPeriodo();

                ?>

            </form>

        </div>

    </div>

</div>

<?php
$EliminarPeriodo = new ControladorPeriodo();
$EliminarPeriodo->ctrBorrarPeriodo();

?>