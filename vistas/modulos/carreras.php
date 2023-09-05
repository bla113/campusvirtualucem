<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar carrera

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar carreras</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCarrera">

          Agregar carrera

        </button>

        <label for="" id="prueba"></label>

      </div>

      <div class="box-body">

        <?php
        $item = null;
        $valor = null;
        $carreras = ControladorCarrera::ctrMostrarCarrera($item, $valor);
        //  print_r($carreras);
        ?>

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Codigo Carrera</th>
              <th>Nombre Carrera</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>
            <?php foreach ($carreras as $key => $value) {

            ?>
              <tr>
                <td><?php echo $value['ID_CARRERA'] ?></td>
                <td><?php echo $value['CODIGO_CARRERA'] ?></td>
                <td><?php echo $value['NOM_CARRERA'] ?></td>

                <td>

                  <div class="btn-group">

                    <button class="btn btn-warning btnEditarCarrera" idCarrera="<?php echo $value['ID_CARRERA'] ?>" data-toggle="modal" data-target="#modalEditarCarrera"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger btnEliminarCarrera" idCarrera="<?php echo $value['ID_CARRERA'] ?>"><i class="fa fa-times"></i></button>
 

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

<!--=====================================
MODAL AGREGAR CARRERA
======================================-->

<div id="modalAgregarCarrera" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Carrera</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-book    "></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Código de la Carrera" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNomCarrera" placeholder="Ingresar Nombre Carrera" required>

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar carrera</button>

        </div>

        <?php
        $nuevaCarrera = ControladorCarrera::ctrCrearCarrera();
        ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL EDITAR CARRERA
======================================-->

<div id="modalEditarCarrera" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar carreras</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-book    "></i></span>

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" placeholder="Ingresar Código de la Carrera" required>
                <input type="hidden" id="IdCarrera" name="IdCarrera">
                
              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                <input type="text" class="form-control input-lg" id="editarCarrera" name="editarCarrera" placeholder="Ingresar Nombre Carrera" required>

              </div>

            </div>


          </div>

        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar carrera</button>

        </div>

        <?php

        $editarCarrera = new ControladorCarrera();
        $editarCarrera->ctrEditarCarrera();

        ?>

      </form>

    </div>

  </div>

</div>

<?php 


$borrarUsuario = new ControladorCarrera();
$borrarUsuario -> ctrBorrarCarrera();




?>