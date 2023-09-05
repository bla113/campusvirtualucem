<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Agregar Materia

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Agregar Materia</li>

        </ol>

    </section>

<?php 
$res=ControladorMateria::ctrCrearMateria();

print_r($res);
?>

    <section class="content">

        <div class="box">


            <div class="box-body">

                <div class="row">

                    <form action="" method="post">

                        <div class="col-md-6">

                            <div class="box box-success">

                                <div class="box-header with-border">

                                    <h3 class="box-title">Formulario Para Crear Materias</h3>

                                </div>

                                <div class="box-body">



                                    <!-- ENTRADA PARA NOMBRE MATERIA-->

                                    <div class="form-group">

                                        <label>Ingrese el Nombre de la Materia</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>

                                            <input type="text" class="form-control input-lg" name="nuevoNombreMateria" placeholder="Nombre Materia" required autofocus>

                                        </div>

                                    </div>

                                    <!-- PRIMER CODIGO MATERIA-->

                                    <div class="form-group">

                                        <label>Codigo de Materia</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-user""></i></span>
    
                                                     <input type="text" class="form-control input-lg" name="nuevoCodigoNateria" placeholder="Ingrese el Codigo de Materia" required>

                                        </div>

                                    </div>
                                    <!-- PRIMER SEGUNDO CREDITOS-->

                                    <div class="form-group">

                                        <label>SIngrese la Cantidad de Créditos</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-user""></i></span>
    
                                                    <input type="number" class="form-control input-lg" name="creditosMateria" placeholder="Ingrese Creditos de la Materia" required>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA SELECCIONAR PROVINCIA -->

                                    <div class="form-group">
                                        
                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-bookmark"></i></span>

                                            <select class="form-control input-lg" name="grupoMateria">

                                                <option value="">Selecionar Grupo</option>
                                                <?php
                                                $Grupos = ControladorGrupo::ctrMostrarGrupo(null, null);
                                                foreach ($Grupos as $grupo) {
                                                    echo '<option value="' . $grupo['ID_GRUPO'] . '">' . $grupo['NOM_GRUPO'] . '</option>';
                                                }
                                                ?>

                                            </select>

                                        </div>

                                    </div>





                                </div>


                            </div>

                        </div>




                        <div class="col-md-6">
                            <div class="box box-primary">

                                <div class="box-header with-border">


                                    <div class="form-group">

                                        <label>Seleccione los requisitos</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-bookmark"></i></span>

                                            <select multiple class="form-control input-lg" name="requisitosMateria[]" required>

                                            <option value="Admitida en U" selected>Admitida en Universidad</option>

                                                <?php
                                                $requisitos = ControladorMateria::ctrMostrarMateria(null, null);
                                                foreach ($requisitos as $requisito) {

                                                    echo '<option value="' . $requisito['COD_MATERIA'] . '">' . $requisito['COD_MATERIA'] . '-' . $requisito['NOM_MATERIA'] . '</option>';
                                                }
                                                ?>

                                            </select>

                                        </div>

                                        <div class="input-group">

                                            <div class="box-header with-border">

                                                <button name="btnCrearMateria" class="btn btn-primary btn-lg">Agregar materia</button>

                                            </div>

                                        </div>
                                        <div class="input-group">

                                            <div class="box-header with-border">

                                                <a href="materias" class="btn btn-success btn-lg">Regresar</a>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <?php
                        //$CrearMateria = new ControladorMateria();
                       // $CrearMateria->ctrCrearMateria();
                        ?>

                    </form>



                </div>

            </div>

        </div>


</div>

</section>

</div>