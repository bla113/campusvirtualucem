<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Editar estudiante

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Editar estudiante</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">


            <div class="box-body">

                <div class="row">

                    <?php




                    if (isset($_GET["idEstudiante"])) {



                        $item = 'ID_ESTUDIANTE';
                        $valor = $_GET["idEstudiante"];
                        $Estudainte = ControladorEstudiante::ctrMostrarEstudiante($item, $valor);
                        //print_r($Estudainte);
                        $resp=ControladorEstudiante::ctrEditarEstudiante();
                         print_r($resp);
                        foreach ($Estudainte as $estudiante) { ?>





                            <!-- INICIO DEL FORMULARIO -->
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="col-md-4">

                                    <div class="box box-success">

                                        <div class="box-header with-border">

                                            <h3 class="box-title">Formulario de Nuevo Ingreso</h3>

                                        </div>

                                        <div class="box-body">

                                            <!-- ENTRADA PARA LA IDENTIFIACION -->

                                            <div class="form-group">

                                                <label>Identificación</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                                    <input type="text" class="form-control" value="<?php echo $estudiante['IDENTIFICACION_ESTUDIANTE'] ?>" name="editarIdentifiacion" placeholder="Identificación" disabled>
                                                    <input type="hidden" value="1" name="editarTipoIentificacion">
                                                </div>

                                            </div>

                                            <!-- ENTRADA PARA NOMBRE-->

                                            <div class="form-group">

                                                <label>Nombre Completo</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>

                                                    <input type="text" class="form-control" value="<?php echo $estudiante['NOMBRE_COMPLETO'] ?>" name="editarNombre" placeholder="Nombre Completo" disabled>

                                                </div>

                                            </div>

                                            <!-- PRIMER APELLIDO-->

                                            <div class="form-group">

                                                <label>Primer Apellido</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-user""></i></span>
    
                                                     <input type=" text" class="form-control" value="<?php echo $estudiante['PRIMER_APELLIDO'] ?>" name="editarApellido1" placeholder="Primer Apellido" disabled>

                                                </div>

                                            </div>
                                            <!-- PRIMER SEGUNDO APELLIDO-->

                                            <div class="form-group">

                                                <label>Segundo Apellido</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-user""></i></span>
    
                                             <input type=" text" class="form-control" value="<?php echo $estudiante['SEGUNDO_APELLIDO'] ?>" name="ditarApellido2" placeholder="Segundo Apellido" disabled>

                                                </div>

                                            </div>

                                            <!-- ENTRADA PARA SELECCIONAR PROVINCIA -->

                                            <div class="form-group">

                                                <label>Provincia</label>

                                                

                                                <div class="input-group">

                                                

                                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                                    <select id="slt-provincias" class="form-control" name="editarProvincia">
                                                        <option value="<?php echo $estudiante['PROVINCIA_ESTUDIANTE'] ?>"><?php echo $estudiante['PROVINCIA_ESTUDIANTE'] ?></option>
                                                        <option value="">-- Seleccione una provincia --</option>

                                                    </select>

                                                </div>

                                            </div>
                                            <!-- ENTRADA PARA SELECCIONAR CANTON -->

                                            <div class="form-group">

                                                <label>Cantón</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                                    <select id="slt-cantones" class="form-control" name="editarCanton">

                                                    <option value="<?php echo $estudiante['CANTON_ESTUDIANTE'] ?>"><?php echo $estudiante['CANTON_ESTUDIANTE'] ?></option>

                                                        <option value="">-- Seleccione un cantón --</option>

                                                    </select>

                                                </div>

                                            </div>
                                            <!-- ENTRADA PARA SELECCIONAR DISTRITO -->

                                            <div class="form-group">

                                                <label>Ditrito</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                                    <select id="slt-distritos" class="form-control" name="editarDistrito">
                                                    
                                                    <option value="<?php echo $estudiante['DISTRITO_ESTUDIANTE'] ?>"><?php echo $estudiante['DISTRITO_ESTUDIANTE'] ?></option>


                                                        <option value="">-- Seleccione un distrito --</option>

                                                    </select>

                                                </div>

                                            </div>

                                            <!-- OTRAS SEÑAS-->

                                            <div class="form-group">

                                                <label>Otras Señas</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-home""></i></span>
    
                                                  <input type=" text" class="form-control" id="otrasSenas" value="<?php echo $estudiante['OTRAS_SENAS_ESTUDIANTE'] ?>" name="editarOtrasSenas" placeholder="Otras Señas">

                                                </div>

                                            </div>

                                            <!-- OTRAS TELEFONO-->

                                            <div class="form-group">

                                                <label>Teléfono Fijo</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-phone""></i></span>
    
                                                  <input type=" text" class="form-control" value="<?php echo $estudiante['TELEFONO_ESTUDIANTE'] ?>" name="editarTelefono" placeholder="Telefono de Trabajo/ Habitación" required>

                                                </div>

                                            </div>

                                            <!-- OTRAS CELULAR-->

                                            <div class="form-group">

                                                <label>Teléfono Celular</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-phone""></i></span>
    
                                                    <input type=" text" class="form-control" value="<?php echo $estudiante['CELULAR_ESTUDIANTE'] ?>" name="editarCelular" placeholder="Número de Celular" required>

                                                </div>

                                            </div>

                                            <!-- FECHA DE NACIMIENTO-->

                                            <div class="form-group">
                                                <label>Fecha de Nacimiento</label>

                                                <div class="input-group">



                                                    <span class="input-group-addon"><i class="fa fa-birthday-cake""></i></span>
    
                                                     <input type="date" class="form-control" value="<?php echo $estudiante['FECHA_NACIMIENTO'] ?>" name="editarfNacimiento" placeholder="Ingrese la fecha de Nacimiento" required>

                                                </div>

                                            </div>



                                            <!-- ENTRADA PARA ESTADO CIVIL -->

                                            <div class="form-group">

                                                <label>Estado Civil</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-legal"></i></span>

                                                    <select class="form-control" name="editarEstadoCivil" required>
                                                        
                                                        <option value="<?php echo $estudiante['ESTADO_CIVIL'] ?>" selected><?php echo $estudiante['ESTADO_CIVIL'] ?></option>

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




                                <div class="col-md-4 ">

                                    <div class="box box-primary">

                                        <div class="box-header with-border">

                                            <h2 class="box-title">Datos Adicionales</h2>

                                        </div>



                                        <!-- LABORA-->




                                        <div class="form-group">

                                        <label for="">¿Trabaja actualmente?</label>

                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                                <select class="form-control" name="editarTrabajo" required>

                                                  

                                                    <option value="<?php echo $estudiante['LABORA_ESTUDIANTE'] ?>" selected><?php echo $estudiante['LABORA_ESTUDIANTE'] ?></option>

                                                    <option value="NO">No</option>

                                                    <option value="Si">Si</option>

                                                    <option value="OTRO">OTRO</option>


                                                </select>

                                            </div>

                                        </div>

                                        <hr>
                                        <div class="form-group">

                                        <label for="">Selccione la Carrera</label>


                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                                <select class="form-control" name="editarCarrera" required>

                                                   
                                                    <option value="<?php echo $estudiante['ID_CARRERA'] ?>" selected><?php echo $estudiante['ID_CARRERA'] ?></option>

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

                                            
                                        <label for="">¿De donde proveine?</label>

                                            <div class="input-group">
                                            

                                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                                

                                                <select class="form-control" name="editarprocedeExtudante" required>

                                                    

                                                    <option value="<?php echo $estudiante['PROCEDE_ESTUDIANTE'] ?>" selected ><?php echo $estudiante['PROCEDE_ESTUDIANTE'] ?></option>

                                                    <option value="Academico">Academico</option>

                                                    <option value="Tecnico por Madurez">Tecnico por Madurez</option>

                                                    <option value="Otro">Otro</option>

                                                </select>

                                            </div>

                                        </div>







                                        <div class="box-body">


                                            <!-- ENTRADA PARA SUBIR FOTO -->

                                            <div class="form-group">

                                                <div class="panel">SUBIR FOTO</div>

                                                <input type="file" class="nuevaFoto" name="editarFotoEstudiante">

                                               
                                                <input type="hidden" value="<?php echo $_GET["fotoEstudiante"] ?>" name="fotoActual" id="fotoActual">
                                                <input type="hidden" value="<?php echo $_GET["idEstudiante"] ?>" name="idEstudiante" id="idEstudiante">

                                                <p class="help-block">Peso máximo de la foto 2MB</p>

                                                <img src="<?php echo $_GET["fotoEstudiante"] ?>" class="img-thumbnail previsualizar"  width="100px">



                                            </div>


                                        </div>

                                        <!-- /.box-body -->



                                        <div class="box-footer">

                                            <button type="submit" name="btnEditarEstudiante" class="btn btn-primary btn-lg"><i class="fa fa-save"></i>Guardar Estudiante</button>

                                        </div>

                                        <div class="box-footer">

                                            <a href="estudiantes" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Salir sin Guardar</a>

                                        </div>


                            </form>
                            <!-- FIN DEL FORMULARIO -->





                    <?php  }
                    } else {
                        echo '<script>

                            window.location = "inicio";

                        </script>';
                    } ?>


                </div>

            </div>

        </div>


</div>

</section>

</div>