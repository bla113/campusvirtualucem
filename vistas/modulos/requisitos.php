<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Requisitos

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar requisitos</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

         
           

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Materia</th>
                            <th>Carrera</th>
                            <th>Plan de Carrera</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $requisitos = ControladorRequisito::ctrMostrarRequisito(null, null);
                        foreach ($requisitos as $requisito) { ?>



                            <tr>
                                <td><?php echo $requisito['ID_REQUISITO'] ?></td>
                                <td><?php echo $requisito['NOM_MATERIA'] ?></td>
                                <td><?php echo $requisito['NOM_CARRERA'] ?></td>
                                <td><?php echo $requisito['NOM_PLAN'] ?></td>
                                <td>

                                    <div class="btn-group">

                                        <a href="index.php?ruta=crear-requisito&idPlan=<?php echo $requisito['ID_PLAN_CARRERA'] ?>" class="btn btn-primary"><i class="fa  fa-check-square-o" onmouseover="Agregar Requisitos"></i></a>

                                        <button class="btn btn-warning btnEditarRequisito" idRequisito="<?php echo $requisito['ID_REQUISITO'] ?>" data-toggle="modal" data-target="#modalEditarRequisito"><i class="fa fa-pencil"></i></button>

                                        <button class="btn btn-danger btnEliminarRequisito" idRequisito="<?php echo $requisito['ID_REQUISITO'] ?>"><i class="fa fa-times"></i></button>

                                        

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

