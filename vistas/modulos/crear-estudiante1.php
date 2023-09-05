<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    <h1>
      
      Estudiante Nuevo
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear Estudiante</li>
    
    </ol>

  </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary col-4">

                <?php
                $resp=ControladorEstudiante::ctrmostrarIDAprobadas();
//$array1 = array("a" => "green", "red", "blue");
//$array2 = array("b" => "green", "yellow", "red");
//$result = array_intersect($array1, $array2);
print_r($resp);
?>
                <form action="" method="post">

                    <div class="box-header with-border">
                        <h3 class="box-title">Formulario Nuevo Estudiante</h3>
                    </div>
                    <div class="box box-solid bg-gradient-white">
                    <div class="box-header">
                        <i class="fa fa-th"></i>



                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Seleccione el tipo de Identificación</label>
                            <select class="form-control">
                                <?php
                                $Identificacion = ControladorEstudiante::ctrMostrarIdentificacion();
                                //print_r($Identificacion);
                                foreach ($Identificacion as $key => $Tipo) {
                                    echo '<option value"' . $Tipo['ID_TIPO_IDEN'] . '">' . $Tipo['NOM_IDENTIFICACION'] . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                        <form role="form" method="post">
                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="text" class="form-control busqueda" placeholder="Identificación" name="buscarIdentificacion" id="buscarIdentificacion">

                                <span class="input-group-btn">
                                    <button type="submit" name="btnBuscarCedula" class="btn btn-info btn-flat">Validar!</button>
                                </span>

                                <?php
                                $Identificacion = ControladorEstudiante::ctrBuscarEstudiante();
                                //print_r($Identificacion);


                                ?>

                            </div>
                        </form>
                        <hr>
                        <?php


                        if ($Identificacion != null || !empty($Identificacion)) {



                            foreach ($Identificacion as $key => $value) {



                        ?>
                                <div class="form-group ">
                                    <label>Identificación</label>
                                    <input type="text" class="form-control" value="<?php echo $value['IDENTIFICACION'] ?>">
                                </div>

                                <div class="form-group ">
                                    <label>Nombre Completo</label>
                                    <input type="text" class="form-control" value="<?php echo $value['NOMBRE_COMPLETO'] ?>">
                                </div>

                                <div class="form-group ">
                                    <label>Segundo Apellido</label>
                                    <input type="text" class="form-control" value="<?php echo $value['PRIMER_APELLIDO'] ?>">
                                </div>
                                <div class="form-group ">
                                    <label>Nombre Completo</label>
                                    <input type="text" class="form-control" value="<?php echo $value['SEGUNDO_APELLIDO'] ?>">
                                </div>

                        <?php }
                        }
                        ?>

                    </div>


                </div>




                </div>
                <!-- /.box -->

                <div class="box box-solid bg-gradient-white">
                    <div class="box-header">
                        <i class="fa fa-th"></i>



                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Form Element sizes -->
                    <div class="box box-success">

                        <div class="box-header with-border">

                            <h3 class="box-title">Detalles de la Dirección</h3>

                        </div>

                        <div class="box-body">

                            <label>Provincia</label>

                            <div class="input-group">




                                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                <select id="slt-provincias" class="form-control" name="nuevaProvincia">

                                    <option value="">-- Seleccione una provincia --</option>

                                </select>

                            </div>

                        </div>
                        <div class="box-body">

                            <label>Cantón</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                <select id="slt-cantones" class="form-control" name="nuevoCanton">

                                    <option value="">-- Seleccione un cantón --</option>

                                </select>

                            </div>

                        </div>

                        <div class="box-body">

                            <label>Ditrito</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                <select id="slt-distritos" class="form-control" name="nuevoDistrito">

                                    <option value="">-- Seleccione un distrito --</option>

                                </select>

                            </div>

                        </div>

                        <div class="box-body">

                            <label>Otras Señas</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-home""></i></span>

        <textarea class=" form-control" id="otrasSenas" name="otrasSenas" placeholder="Otras Señas" cols="5" rows="2"></textarea>
                            </div>

                        </div>


                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->




                </div>
                <div class="box box-solid bg-gradient-white">

                    <div class="box-header">

                        <i class="fa fa-th"></i>

                        <div class="box-header with-border">

                            <h3 class="box-title">Detalles de Contacto</h3>

                        </div>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">

                            <label>Teléfono Fijo</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-at""></i></span>

                                <input type=" email" class="form-control" name="nuevoCorreo" placeholder="correo@dominio.com" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label>Teléfono Fijo</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone""></i></span>

                                <input type=" text" class="form-control" name="nuevoTelefono" placeholder="Telefono de Trabajo/ Habitación" required>

                            </div>

                        </div>

                        <div class="form-group">

                            <label>Teléfono Celular</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone""></i></span>
    
                                <input type=" text" class="form-control" name="nuevoCelular" placeholder="Número de Celular" required>

                            </div>

                        </div>




                        <!-- FECHA DE NACIMIENTO-->

                        <div class="form-group">

                            <label>Contacto Emergencia</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone-square""></i></span>
    
                                <input type=" text" class="form-control" name="nuevoCelular" placeholder="Número de Celular" required>

                            </div>

                        </div>

                        <!-- FECHA DE NACIMIENTO-->

                        <div class="form-group">

                            <label>Fecha de Nacimiento</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-birthday-cake""></i></span>
    
                                   <input type=" date" class="form-control" name="nuevofNacimiento" placeholder="Ingrese la fecha de Nacimiento" required>

                            </div>

                        </div>


                        <!-- ENTRADA PARA ESTADO CIVIL -->

                        <div class="form-group">

                            <label>Estado Civil</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-legal"></i></span>

                                <select class="form-control " name="nuevoEstadoCivil" required>

                                    <option value="">Selecionar Estado Civil</option>

                                    <option value="Soltero">Soltero</option>

                                    <option value="Casado">Casado</option>

                                    <option value="Divorciado">Divorciado</option>

                                    <option value="Unión Libre">Unión Libre</option>

                                </select>

                            </div>

                        </div>



                        <div class="form-group">
                            <label>Trabaja Actualmente</label>


                            <div class="input-group">



                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                <select class="form-control" name="nuevoTrabajo" required>

                                    <option value="">¿Trabaja actualmente?</option>

                                    <option value="SI">Si</option>

                                    <option value="NO">No</option>

                                    <option value="OTRO">OTRO</option>


                                </select>

                            </div>

                        </div>

                        <div class="form-group">
                            <label>De donde proviene</label>


                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                <select class="form-control " name="procedeExtudante" required>

                                    <option value="">¿De donde proveine?</option>

                                    <option value="Academico">Academico</option>

                                    <option value="Tecnico por Madurez">Tecnico por Madurez</option>

                                    <option value="Otro">Otro</option>

                                </select>

                            </div>

                        </div>


                    </div>


                </div>

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">


                <!-- /.box -->
                <!-- general form elements disabled -->
                <div class="box box-solid bg-gradient-white">
                    <div class="box-header">
                        <i class="fa fa-th"></i>



                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <h3 class="box-title">Detalles Acádemicos</h3>

                        <label>Seleccione la Carrera</label>


                        <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                            <select class="form-control" name="nuevaCarrera" required>

                                <option value="">Selccione la Carrera</option>

                                <?php
                                $carreraras = ControladorCarrera::ctrMostrarCarrera(null, null);
                                foreach ($carreraras as $carrerara) {

                                    echo '<option value="' . $carrerara['ID_CARRERA'] . '">' . $carrerara['NOM_CARRERA'] . '</option>';
                                }

                                ?>


                            </select>

                        </div>


                        <div class="form-group">

                            <label>Seleccione El Plan de Carrera</label>


                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                <select class="form-control" name="nuevoPlanCarrera" required>

                                    <option value="">Selccione Plan Carrera</option>

                                    <?php
                                    $Pcarreraras = ControladorPlanCarrera::ctrMostrarPlanCarrera(null, null);
                                    foreach ($Pcarreraras as $Pcarrerara) {

                                        echo '<option value="' . $Pcarrerara['ID_PLAN_CARRERA'] . '">' . $Pcarrerara['NOM_PLAN'] . '</option>';
                                    }

                                    ?>


                                </select>

                            </div>

                        </div>
                    </div>


                </div>

                <div class="box box-solid bg-gradient-white">
                    <div class="box-header">
                        <i class="fa fa-th"></i>



                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="box-header with-border">

                            <h2 class="box-title">Documentos Adjuntos</h2>

                        </div>


                        <div class="form-group">

                            <label>Titulo de Bachillerato</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-upload""></i></span>

                                <input type=" file" class="form-control" name="">

                            </div>

                        </div>

                        <div class="form-group">

                            <label>Cédula de Indetidad por ambos lados</label>

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-upload""></i></span>

                                <input type=" file" class="form-control" name="">

                            </div>

                        </div>





                    </div>


                </div>


                <div class="box box-solid bg-gradient-white">

                    <div class="box-body">

                    <button class="btn btn-app"><span class="badge bg-yellow">1</span><i class="fa fa-refresh"></i> Regresar</button>
                    <button type="submit" class="btn btn-app"><span class="badge bg-aqua">0</span><i class="fa fa-save"></i> Guardar</button>
                        <button class="btn btn-app"><span class="badge bg-green">33</span><i class="fa fa-trash-o"></i> Limpiar</button>


                    </div>


                </div>
                                </form>


                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->