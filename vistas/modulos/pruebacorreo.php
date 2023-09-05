<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar usuarios

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar usuarios</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">



            <div class="box-body">
                <?php
                //$Enviar = new ControladorCorreos();
                //  $Enviar->ctrEnviarCorreo();
                ?>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">

                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="post" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-at"></i></span>

                                        <input type="email" class="form-control input-lg" id="correoDestino" name="correoDestino" placeholder="Ingresar Correo Electronico" required>
                                       
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="exampleInputPassword1">Comentario</label>
                                    
                                    <div class="box">

                                        <div class="box-header">
                                            <!-- /.box-header -->
                                            <div class="box-body pad">

                                                <textarea class="textarea" name="asuntoCorreo" placeholder="Ingrese el asunto" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">Adjuntar Archivo</label>

                                        <input type="file" id="archivoCorreo" name="archivoCorreo">

                                       
                                        <p class="help-block">Archivos menores a los 2MB.</p>
                                    
                                    </div>


                                </div>
                            

                                <div class="box-footer">

                                    <button type="submit" name="btnEnviarCorreo" class="btn btn-primary">Enviar Correo</button>
                                
                                </div>

                                <?php
                                $EnviarCorreo= new ControladorCorreos();
                                $EnviarCorreo->creEnviarCorreoConAdjunto()
                                ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>