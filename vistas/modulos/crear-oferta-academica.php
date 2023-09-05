<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Crear ofertas de matriculas

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar ofertas de matriculas</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">



            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">

                        <div class="box box-success">
                            <?php
                            $grupos = ControladorGrupo::ctrMostrarGrupo(null, null);
                            $periodos = ControladorPeriodo::ctrMostrarPeriodo(null, null);
                            //print_r($grupos)
                            ?>

                            <form method="POST">

                                <div class="box-body">

                                    <div class="form-group">

                                        <h3 class="box-title">Seleccione Grupo de Materias</h3>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                            <select class="form-control input-lg" name="grupoMateriaOferta" id="grupoMateria" required>
                                                <option value="">Selecionar Grupo</option>
                                                <?php

                                                foreach ($grupos as $key => $grupo) {
                                                    echo '<option value="' . $grupo['ID_GRUPO'] . '" idGrupo="' . $grupo['ID_GRUPO'] . '">' . $grupo['NOM_GRUPO'] . '</option>';
                                                }
                                                ?>


                                            </select>

                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <h3 class="box-group">Seleccione Materias</h3>

                                        <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                            <select class="form-control input-lg" name="materiaOferta" id="materiaOferta" required>


                                            </select>
                                            <span class="input-group-btn">

                                                <button type="button" id="btnLimpiarSelect" class="btn btn-info btn btn-lg"><i class="fa fa-repeat"></i></button>

                                            </span>
                                        </div>

                                    </div>





                                </div>



                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box box-primary">


                            <h3 class="box-group">Seleccione Periodo Lectivo</h3>

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                    <select class="form-control input-lg" name="periodoOferta" id="grupoMateria" required>

                                        <option value="">Selecionar Periodo</option>

                                        <?php

                                        foreach ($periodos as $key => $periodo) {
                                            echo '<option  value="' . $periodo['ID_PERIODO'] . '">' . $periodo['NOM_PERIODO'] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                            </div>
                            <div class="form-group">



                            </div>

                            <div class="form-group">




                                <h3 class="box-group">Seleccione Turno</h3>


                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                                    <select class="form-control input-lg" name="turnoOferta" id="" required>

                                        <option value="">Selecionar turno</option>

                                        <option value="Nocturno" selected>Nocturno</option>

                                        <option value="Diurno">Diurno</option>

                                        <option value="Ambos">Ambos(Diurno/Nocturno)</option>

                                    </select>

                                </div>

                            </div>


                            <hr>
                            <div class="form form-group-sm py-2 m-3">

                                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Guardar</button>
                                <button class="btn btn-warning btn-lg"><i class="fa fa-retweet"></i> Salir</button>

                            </div>

                        </div>
                    </div>

                </div>

                <?php
                $nuevaOferta = new ControladorOfertaAcademica();
                $nuevaOferta->ctrCrearOfertaAcademica();


                ?>

                </form>
            </div>

        </div>

    </section>

</div>