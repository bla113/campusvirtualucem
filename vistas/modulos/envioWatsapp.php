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
                        <form role="form" method="post">

                            <div class="box-body">


                                <div class="form-group">

                                    <label for="exampleInputPassword1">Mensaje Whatsapp</label>

                                    <div class="box">

                                        <div class="box-header">
                                            <!-- /.box-header -->
                                            <div class="box-body pad">

                                                <textarea class="textarea" name="asuntoMensaje" placeholder="Ingrese el asunto" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                            </div>

                                        </div>

                                    </div>




                                </div>


                                <div class="box-footer">

                                    <button type="submit" name="btnWhatsapp" class="btn btn-success"><i class="fa fa-whatsapp"></i> Enviar Whats</button>

                                </div>

                                <?php
                                $EnviarWhast = new ControladorNotificacionWathsapp();
                                $EnviarWhast->ctrNotificacionPrueba();
                                ?>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>