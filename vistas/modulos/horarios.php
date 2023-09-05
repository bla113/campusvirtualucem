<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar horarios

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar horario</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarHorario">

                    Agregar horario

                </button>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre Horario</th>
                            <th>Código</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $Horarios = ControladorHorario::ctrMostrarHorario(null, null);
                        foreach ($Horarios as $Horario) { ?>

                            <tr>
                                <td><?php echo $Horario['ID_HORARIO'] ?></td>
                                <td><?php echo $Horario['NOM_HORARIO'] ?></td>
                                <td><?php echo $Horario['COD_HORARIO'] ?></td>
                               

                                <td>

                                    <div class="btn-group">

                                        <div class="btn-group">

                                            <button class="btn btn-warning btnEditarHorario" idHorario="<?php echo $Horario['ID_HORARIO'] ?>" data-toggle="modal" data-target="#modalEditarHorario"><i class="fa fa-pencil"></i></button>

                                            <button class="btn btn-danger btnEliminarHorario" idHorario="<?php echo $Horario['ID_HORARIO'] ?>"><i class="fa fa-times"></i></button>


                                        </div>

                                    </div>

                                </td>

                            </tr>

                        <?php  }  ?>
                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR HORARIO
======================================-->

<div id="modalAgregarHorario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Horario</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoNomHorario" placeholder="Ingresar nombre Horario" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CODIGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoCodigoHoario" placeholder="Ingresar código Horario" required>

                            </div>

                        </div>

                       




                    </div>

                </div>

                <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnCrearHorario" class="btn btn-primary">Guardar Horario</button>

                </div>

                <?php
                $CrearHorario = new ControladorHorario();
                $CrearHorario->ctrCrearHorario();

                ?>

            </form>

        </div>

    </div>

</div>


<!--=====================================
MODAL EDITAR HORARIO
======================================-->

<div id="modalEditarHorario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar horario</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                <input type="text" class="form-control input-lg" id="editaNomHorario" name="editaNomHorario" placeholder="Ingresar nombre del Horario" required>
                                <input type="hidden" name="IdHorario" id="IdHorario">
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CODIGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                <input type="text" class="form-control input-lg" id="editarCodigoHorario" name="editarCodigoHorario" placeholder="Ingresar código Horario" required>

                            </div>

                        </div>

                       

                    </div>

                </div>

                            <!--=====================================
                            PIE DEL MODAL
                            ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnEditarHorario" class="btn btn-primary">Guardar Horario</button>

                </div>

                <?php
                $EditarHorario = new ControladorHorario();
                $EditarHorario->ctrEditarHorario();
                ?>

            </form>

        </div>

    </div>

</div>


<?php
$EliminarHorario= new ControladorHorario();
$EditarHorario->ctrBorrarHorario();

?>