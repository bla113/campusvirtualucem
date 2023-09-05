<?php



$numro_carnet = ControladorEstudiante::ctrMostraProximoCarnet();

$hoy = date("Y");

foreach ($numro_carnet as $key => $carnet) {

    $cont =  $carnet['NUMERO_CARNET'] + 1;

    $numero_carnet = $hoy  . "-" . $cont;
}



?><div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar estudiantes

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar estudiantes</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">


            <div class="box-body">

                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data">

                    <div class="col-md-3">

                        <div class="box box-primary">

                            <div class="box-header with-border">

                            </div>

                            <!-- INICIO DEL FORMULARIO -->
                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                    <select class="form-control" name="nuevoTipoIentificacion">

                                        <option value="">Selecionar Tipo Identifiación</option>

                                        <option value="1">Nacional T.S.E</option>

                                        <option value="2">Numero de Pasaporte</option>

                                        <option value="3">Número de Cedula de Residencia</option>

                                    </select>

                                </div>

                            </div>

                            <input type="text" name="consecutivoCarnet" value="<?php echo $cont?>" id="">


                            <div class="form-group">

                                <div class="input-group">

                                    <input type="text" class="form-control" name="nuevaIdentifiacion" id="busquedaCedula" placeholder=" Numro de Identificacion">

                                    <span class="input-group-btn"><button class="btn btn-info" id="btnBuscarIdentificacion" type="button"><i class="fa fa-search"></i></button></span>

                                </div>

                            </div>
                            <div class="form-group">

                                <label>Nombre Completo</label>

                                <div class="input-group">


                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                    <input type="text" class="form-control" id="nombreCompleto" name="nuevoNombre" placeholder="Nombre Completo">

                                </div>

                            </div>



                            <div class="form-group">

                                <label>Primer Apellido</label>

                                <div class="input-group">


                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                    <input type="text" class="form-control" id="primerApellido" name="nuevoApellido1" placeholder="Primer Apellido">

                                </div>

                            </div>


                            <div class="form-group">

                                <label>Segundo Apellido</label>

                                <div class="input-group">


                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                    <input type="text" class="form-control" id="segundoApellido" name="nuevoApellido2" placeholder="segundoApellido">

                                </div>

                            </div>



                            <div class="form-group">

                                <label>Correo Electrónico</label>

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-at"></i></span>

                                    <input type="email" class="form-control" value="" name="nuevoCorreoEstudiante" placeholder="Ingrese Correo Electrónico" required>

                                </div>

                            </div>





                        </div>

                    </div>




                    <div class="col-md-3">

                        <div class="box box-success">

                            <div class="box-header with-border">

                                <h3 class="box-title">Datos Personales</h3>

                            </div>

                            <div class="box-body">


                                <!-- ENTRADA PARA SELECCIONAR PROVINCIA -->

                                <div class="form-group">

                                    <label>Provincia</label>

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                        <select id="slt-provincias" class="form-control" name="nuevaProvincia">

                                            <option value="">-- Seleccione una provincia --</option>

                                        </select>

                                    </div>

                                </div>


                                <!-- ENTRADA PARA SELECCIONAR CANTON -->

                                <div class="form-group">

                                    <label>Cantón</label>

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                        <select id="slt-cantones" class="form-control" name="nuevoCanton">

                                            <option value="">-- Seleccione un cantón --</option>

                                        </select>

                                    </div>

                                </div>
                                <!-- ENTRADA PARA SELECCIONAR DISTRITO -->

                                <div class="form-group">

                                    <label>Ditrito</label>

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                        <select id="slt-distritos" class="form-control" name="nuevoDistrito">

                                            <option value="">-- Seleccione un distrito --</option>

                                        </select>

                                    </div>

                                </div>

                                <!-- OTRAS SEÑAS-->

                                <div class="form-group">

                                    <label>Otras Señas</label>

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-home""></i></span>
                                                                        
                                                                        <input type=" text" class="form-control" id=" otrasSenas" name="otrasSenas" placeholder="Ingrese Dirección " required>


                                    </div>

                                </div>

                                <!-- OTRAS TELEFONO-->

                                <div class="form-group">

                                    <label>Teléfono Fijo</label>

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-phone""></i></span>
                                    
                                                                                <input type=" text" class="form-control" name="nuevoTelefono" placeholder="Telefono de Trabajo/ Habitación" required>

                                    </div>

                                </div>

                                <!-- OTRAS CELULAR-->

                                <div class="form-group">

                                    <label>Teléfono Celular</label>

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-phone""></i></span>
                                    
                                                                                    <input type=" text" class="form-control" name="nuevoCelular" placeholder="Número de Celular" required>

                                    </div>

                                </div>

                                <!-- FECHA DE NACIMIENTO-->

                                <div class="form-group">
                                    <label>Fecha de Nacimiento</label>

                                    <div class="input-group">



                                        <span class="input-group-addon"><i class="fa fa-birthday-cake""></i></span>
                                    
                                                                                    <input type="date" class="form-control" name="nuevofNacimiento" placeholder="Ingrese la fecha de Nacimiento" required>

                                    </div>

                                </div>



                                <!-- ENTRADA PARA ESTADO CIVIL -->

                                <div class="form-group">

                                    <label>Estado Civil</label>

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-legal"></i></span>

                                        <select class="form-control" name="nuevoEstadoCivil" required>

                                            <option value="">Selecionar Estado Civil</option>

                                            <option value="Soltero">Soltero</option>

                                            <option value="Casado">Casado</option>

                                            <option value="Divorciado">Divorciado</option>

                                            <option value="Unión Libre">Unión Libre</option>

                                        </select>

                                    </div>

                                </div>



                            </div>


                        </div>

                    </div>




                    <div class="col-md-3">

                        <div class="box box-primary">

                            <div class="box-header with-border">

                                <h2 class="box-title">Datos Acádemicos</h2>

                            </div>






                            <div class="form-group">
                                <label for="">Número de Carnet</label>

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>

                                    <input type="text" class="form-control" name="nuevoCarnetEstudiante" value="<?php echo $numero_carnet ?>" readonly required>


                                </div>

                            </div>

                            <div class="form-group">
                                <label for="">Seleccione si posee empleo</label>

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                    <select class="form-control" name="nuevoTrabajo" required>

                                        <option value="">¿Trabaja actualmente?</option>

                                        <option value="SI">Si</option>

                                        <option value="NO">No</option>

                                        <option value="OTRO">OTRO</option>


                                    </select>

                                </div>

                            </div>
                            <div class="form-group">

                                <label for="">Turno de interés</label>

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-moon-o"></i></span>

                                    <select class="form-control" name="nuevoTurno" required>

                                        <option value="">¿Turno de Interés?</option>

                                        <option value="DIURNO">Diurno</option>

                                        <option value="NOCTURNO">Nocturno</option>

                                        <option value="AMBOS">Ambos</option>


                                    </select>

                                </div>

                            </div>
                            <div class="form-group">

                                <label for="">Seleccione procedencia</label>

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-refresh"></i></span>

                                    <select class="form-control" name="procedeExtudante" required>

                                        <option value="">¿De donde proveine?</option>

                                        <option value="Academico">Academico</option>

                                        <option value="Tecnico por Madurez">Tecnico por Madurez</option>

                                        <option value="Otro">Otro</option>

                                    </select>

                                </div>

                            </div>



                            <div class="box box-primary">

                                <div class="box-header with-border">

                                    <div class="card card-blue">

                                        <div class="form-group">

                                            <label for="">Seleccione la Carrera</label>

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

                                        </div>
                                        <div class="form-group">

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
                            </div>




                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <div class="form-group">

                                    <h3 class="panel">Subir Titulo de Bachillerato</h3>

                                    <input type="file" class="nuevoTitulo" name="nuevoTituloEstudiante" accept="application/pdf" >

                                    <p class="help-block">Peso máximo de la foto 2MB</p>


                                </div>
                            </div>

                            <div class="form-group">

                                <div class="input-group">

                                    <h3 class="panel">Cedula de Identificación</h3>

                                    <input type="file" class="nuevaCedula" name="nuevoCedulaEstudiante" accept="application/pdf"  />

                                    <p class="help-block">Peso máximo del archivo 2MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">

                        <button type="submit" name="btnGuardarEstudiante" class="btn btn-primary btn-lg"><i class="fa fa-save"></i></button>
                        <a href="estudiantes" class="btn btn-success btn-lg"><i class="fa fa-refresh"></i></a>

                    </div>


                     </div>






                    <?php
                    $crearEstudiante = new ControladorEstudiante();
                    $crearEstudiante->ctrCrearEstudiante();
                    ?>

                </form>
                <!-- FIN DEL FORMULARIO -->










            </div>



        </div>

</div>


</div>

</section>

</div>