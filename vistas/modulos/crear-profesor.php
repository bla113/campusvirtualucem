<div class="content-wrapper">

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

                    <form action="" method="post">
                        <div class="col-md-4 ">

                            <div class="box box-primary">
                                <div class="box-header with-border">

                                    <h3 class="box-title">Datos Personales</h3>

                                </div>


                                <form class="form-horizontal">

                                    <div class="box-body">


                                        <div class="form-group">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                                <select class="form-control" name="tipoIdentificaicacion">

                                                    <option value="">Selecionar Tipo Identifiación</option>

                                                    <option value="1">Nacional T.S.E</option>

                                                    <option value="2">Numero de Pasaporte</option>

                                                    <option value="3">Número de Cedula de Residencia</option>

                                                </select>

                                            </div>

                                        </div>


                                        <div class="form-group">

                                            <div class="input-group">

                                                <input type="text" class="form-control" name="Identificacion" id="busquedaCedula" placeholder=" Numro de Identificacion">

                                                <span class="input-group-btn"><button class="btn btn-info" id="btnBuscarIdentificacion" type="button"><i class="fa fa-search"></i></button></span>

                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label>Nombre Completo</label>

                                            <div class="input-group">


                                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                                <input type="text" class="form-control" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre Completo">

                                            </div>

                                        </div>



                                        <div class="form-group">

                                            <label>Primer Apellido</label>

                                            <div class="input-group">


                                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                                <input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Primer Apellido">

                                            </div>

                                        </div>


                                        <div class="form-group">

                                            <label>Segundo Apellido</label>

                                            <div class="input-group">


                                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                                <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="segundoApellido">

                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label>Coreo Electrónico</label>

                                            <div class="input-group">


                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                                <input type="text" class="form-control" id="correoElectronico" name="correoElectronico" placeholder="correo@dominio.com">

                                            </div>

                                        </div>





                                    </div>




                            </div>


                        </div>

                        <div class="col-md-4 ">

                            <div class="box box-primary">
                                <div class="box-header with-border">

                                    <h3 class="box-title">Dirección</h3>

                                </div>




                                <div class="box-body">


                                    <div class="form-group">

                                        <label>Provincia</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                            <select id="slt-provincias" class="form-control" name="nuevaProvincia">

                                                <option value="">-- Seleccione una provincia --</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label>Cantón</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                            <select id="slt-cantones" class="form-control" name="nuevoCanton">

                                                <option value="">-- Seleccione un cantón --</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label>Ditrito</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                            <select id="slt-distritos" class="form-control" name="nuevoDistrito">

                                                <option value="">-- Seleccione un distrito --</option>

                                            </select>

                                        </div>

                                    </div>


                                    <div class="form-group">

                                        <label>Otras Señas</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-home""></i></span>
                                    

                                            <textarea class=" form-control" name="otrasSenas" id="" cols="5" rows="2" placeholder="Ingrese Dirección"></textarea>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label>Telefono Celular</label>

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-phone""></i></span>

                                            <input type=" text" class="form-control" name="telefonoCelular" id="telefonoCelular">

                                        </div>

                                    </div>






                                    <button type="submit" name="btnCreatProfesor" class="btn btn-block btn-lg btn-success btn-flat"><i class="fa fa-save" aria-hidden="true"></i> Guardar</button>


                                </div>




                            </div>


                        </div>
                        <?php
                        $CrearProfesor = new ControladorProfesor();
                        $CrearProfesor->ctrCrearProfesor();
                        ?>
                    </form>
                </div>


            </div>



        </div>

    </section>

</div>