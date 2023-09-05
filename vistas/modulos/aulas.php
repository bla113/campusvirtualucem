<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar aulas

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar aulas</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAula">

                    Agregar aula

                </button>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre Aula</th>
                            <th>Código</th>
                            <th>Capacidad</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $Aulas = ControladorAula::ctrMostrarAula(null, null);
                        foreach ($Aulas as $Aula) { ?>

                            <tr>
                                <td><?php echo $Aula['ID_AULA'] ?></td>
                                <td><?php echo $Aula['NOM_AULA'] ?></td>
                                <td><?php echo $Aula['COD_AULA'] ?></td>
                                <td><?php echo $Aula['CAP_AULA'] ?></td>

                                <td>

                                    <div class="btn-group">

                                        <div class="btn-group">

                                            <button class="btn btn-warning btnEditarAula" idAula="<?php echo $Aula['ID_AULA'] ?>" data-toggle="modal" data-target="#modalEditarAula"><i class="fa fa-pencil"></i></button>

                                            <button class="btn btn-danger btnEliminarAula" idAula="<?php echo $Aula['ID_AULA'] ?>"><i class="fa fa-times"></i></button>


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
MODAL AGREGAR AULA
======================================-->

<div id="modalAgregarAula" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar aula</h4>

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

                                <input type="text" class="form-control input-lg" name="nuevoNomAula" placeholder="Ingresar nombre del Aula" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CODIGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoCodigoAula" placeholder="Ingresar código Aula" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CAPACIDAD -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="number" class="form-control input-lg" name="nuvoCapAula" placeholder="Ingresar capacidad del aula" required>

                            </div>

                        </div>





                    </div>

                </div>

                <!--=====================================
        PIE DEL MODAL
        ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnCrearAula" class="btn btn-primary">Guardar Aula</button>

                </div>

                <?php
                $CrearAula = new ControladorAula();
                $CrearAula->ctrCrearAula();

                ?>

            </form>

        </div>

    </div>

</div>


<!--=====================================
MODAL EDITAR AULA
======================================-->

<div id="modalEditarAula" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
                    CABEZA DEL MODAL
                    ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar aula</h4>

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

                                <input type="text" class="form-control input-lg" id="editaNomAula" name="editaNomAula" placeholder="Ingresar nombre del Aula" required>
                                <input type="hidden" name="IdAula" id="IdAula">
                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CODIGO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                <input type="text" class="form-control input-lg" id="editarCodigoAula" name="editarCodigoAula" placeholder="Ingresar código Aula" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CAPACIDAD -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="number" class="form-control input-lg" id="editarCapAula" name="editarCapAula" placeholder="Ingresar capacidad del aula" required>

                            </div>

                        </div>

                    </div>

                </div>

                            <!--=====================================
                            PIE DEL MODAL
                            ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" name="btnEditarAula" class="btn btn-primary">Guardar Aula</button>

                </div>

                <?php
                $EditarAula = new ControladorAula();
                $EditarAula->ctrEditarAula();
                ?>

            </form>

        </div>

    </div>

</div>


<?php
$EliminarAula= new ControladorAula();
$EditarAula->ctrBorrarAula();

?>