<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar materias

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar materias</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="agregar-materia" class="btn btn-primary">Agregar materia</a>

      </div>

      
      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Codigo</th>
              <th>Nombre de la Materia</th>
              <th>Grupo</th>
              <th>Créditos</th>
              <th>Requisito</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>
            <?php
            $Materias = ControladorMateria::ctrMostrarMateria(null, null);
            foreach ($Materias  as $materia) { ?>


              <tr>
                <td><?php echo $materia['ID_MATERIA'] ?></td>
                <td><?php echo $materia['COD_MATERIA'] ?></td>
                <td><?php echo $materia['NOM_MATERIA'] ?></td>
                <td><?php echo $materia['NOM_GRUPO'] ?></td>
                <td><?php echo $materia['CREDITOS'] ?></td>
                <td><?php
                    if ($materia['COD_REQUISITO']=="" || $materia['COD_REQUISITO'] == null || empty($materia['COD_REQUISITO'] )  ) {

                      echo '<button class="btn btn-success btn-xs">Admitido en U</button>';
                    } else {

                      $array = json_decode($materia['COD_REQUISITO'], true);

                      foreach ($array as $requisitos => $requisito) {

                        echo '<button class="btn btn-primary btn-xs">' . $requisito . '</button>';
                      }
                    }
                    ?></td>

                <td>

                  <div class="btn-group">

                    <button class="btn btn-warning btnEditarMateria" idMateria="<?php echo $materia['ID_MATERIA'] ?>" data-toggle="modal" data-target="#modalEditarMateria"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger btnEliminarMateria" idMateria="<?php echo $materia['ID_MATERIA'] ?>"><i class="fa fa-times"></i></button>

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
MODAL EDITAR MATERIA
======================================-->

<div id="modalEditarMateria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar materia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <label for=""> Ingrese el Nombre de la Matria</label>


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarNombreMateria" id="editarNombreMateria" placeholder="Ingresar nombre de Materia" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">

              <label for=""> Ingrese el Código de la Matria</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="editarcodigoMateria" id="editarcodigoMateria" placeholder="Ingresar Código Materia" required>

              </div>

            </div>

       

            <div class="form-group">

              <label for=""> Ingrese los créditos de la Matria</label>


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="number" class="form-control input-lg" name="editarCreditosMateria" id="editarCreditosMateria" placeholder="Ingresar Cantidad de Creditos" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU GRUPO -->

            <div class="form-group">

              <label for="">Grupo actual de la Matria</label>

              <input type="text" class="form-control input-lg" name="grupoActual" id="grupoActual" disabled>
              <input type="hidden" name="IdgrupoActual" id="IdgrupoActual">
              <input type="hidden" name="IdMateria" id="IdMateria">
              <hr>
              <label for="">Seleccione el Nuevo Grupo</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>


                <select class="form-control input-lg" name="IdgrupoNuevo">

                  <option value="" selected>Selecionar Grupo</option>

                  <?php
                  $Grupos = ControladorGrupo::ctrMostrarGrupo(null, null);
                  foreach ($Grupos as $grupo) {
                    echo '<option value="' . $grupo['ID_GRUPO'] . '">' . $grupo['NOM_GRUPO'] . '</option>';
                  }
                  ?>

                </select>

              </div>

            </div>
            <hr>
            <div class="form-group">

              <label for=""> Requisitos Actuales</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                <input type="text" class="form-control input-lg" name="requisitosActuales" id="requisitosActuales" >

              </div>

            </div>

            <hr>
            <!-- ENTRADA PARA SELECCIONAR SU CREDITOS -->

            <div class="form-group">

            <label for=""> Selccione los Nuevos Requisitos</label>


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>


                <select multiple class="form-control input-lg" name="nuevosRequisitosMateria[]">

                <option  value="Admitido en U" selected >Admitido en Universidad</option>

                  <option  value="Admitido en U" >Sin Requisitos</option>

                  <?php

                  $requisitos = ControladorMateria::ctrMostrarMateria(null, null);
                  foreach ($requisitos as $requisito) {
                    echo '<option value="' . $requisito['COD_MATERIA'] . '">' . $requisito['COD_MATERIA'] . '</option>';
                  }
                  ?>

                </select>

              </div>

            </div>



         

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" name="btnEditarMateria" class="btn btn-primary">Guardar Cambios</button>

        </div>

        <?php 
        $EditarMateria= new ControladorMateria();
        $EditarMateria->ctrEditarMateria();
        ?>

      </form>

    </div>

  </div>

</div>

<?php 

$EliminarMateria= new ControladorMateria();
$EliminarMateria->ctrBorrarMateria()

?>