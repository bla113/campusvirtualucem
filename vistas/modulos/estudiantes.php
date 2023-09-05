<?php


if (isset($_GET['idPlanCarrera'])) {

  if ($_GET['idPlanCarrera'] !== null) {

    $IdPlanCarrera = $_GET['idPlanCarrera'];
    $AsignarPlanEstudiante = ControladorAsiganrPlanEstudiante::ctrAsignarPlanEstudiante($IdPlanCarrera);
  }
}

?>
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

      <div class="box-header with-border">

        <a class="btn btn-primary" href="crear-estudiante">

          Agregar Estudiante

</a>


      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>

              <th style="width:10px">Identificación</th>
              <th>Nombre Completo</th>
              <th>Carrera</th>
              <th>Plan de Carrera</th>
              <th>Celular</th>
              <th>Estado</th>
              <th>Fecha de Ingreso</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>
            <?php
            $Estudiantes = ControladorEstudiante::ctrMostrarEstudiante(null, null);



            foreach ($Estudiantes as $estudiante) {

              $materias = ControladorEstudiante::ctrMostrarMateriasEstudianteAll($estudiante['ID_ESTUDIANTE']);

              //print_r($materias);

            ?>
              <tr>
                <td><?php echo $estudiante['IDENTIFICACION_ESTUDIANTE'] ?></td>
                <td><?php echo $estudiante['NOMBRE_COMPLETO'] . $estudiante['PRIMER_APELLIDO'] . $estudiante['SEGUNDO_APELLIDO'] ?></td>
                <td><?php echo $estudiante['NOM_CARRERA'] ?></td>
                <td><?php
                    if (count($materias) <= 0) {
                      echo '<button class="btn btn-danger btn-xs btnAsignarPlanEstudiante" idEstudiantePlan="' . $estudiante['ID_ESTUDIANTE'] . '"  idPlanCarrera="' . $estudiante['ID_PLAN_CARRERA'] . '">Si Materias Asociadas</button>';
                    } else {
                      echo '<button class="btn btn-success btn-xs"> ' . $estudiante['NOM_PLAN'] . '</button>';
                    }
                    ?></td>
                <td><?php echo $estudiante['CELULAR_ESTUDIANTE'] ?></td>
                <td><?php if ($estudiante["ESTADO"] === 1) {

                      echo '<button class="btn btn-success btn-xs btnActivar" idEstudiante="' . $estudiante["ID_ESTUDIANTE"] . '" estadoEstudiante="0">Activado</button>';
                    }
                    if ($estudiante["ESTADO"] === 0) {

                      echo 'button class="btn btn-danger btn-xs btnActivar" idEstudiante="' . $estudiante["ID_ESTUDIANTE"] . '" estadoEstudiante="1">Desactivado</button>';
                    }       ?></td>


                <td><?php echo $estudiante['FECHA_CREACION'] ?></td>
                <td>

                  <div class="btn-group">


                    <button class="btn btn-adn  btnEliminarEstudiante" idEstudiante="<?php echo $estudiante['ID_ESTUDIANTE'] ?>"><i class="fa fa-trash"></i></button>


                    <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                    
                    <a href="index.php?ruta=expediente-estudiante&idEstudiante=<?php echo  $estudiante['ID_ESTUDIANTE'] ?>&idCarrera=<?php echo  $estudiante['ID_CARRERA'] ?>&idPlanCarrera=<?php echo  $estudiante['ID_PLAN_CARRERA'] ?>" class="btn btn-primary" ><i class="fa fa-eye"></i></a>

                  </div>

                </td>

              </tr>

            <?php  }



            ?>



          </tbody>

        </table>

      </div>

  </section>

</div>




<!--=====================================
MODAL ESDITAR ESTUDIANTE
======================================-->

<div id="modalEditarEstudiante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Estudiante</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <label>Identificación</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                <input type="text" class="form-control input-lg" id="editarIdentificacion" name="editarIdentificacion" value="">

                <input type="hidden" value="1" name="editarTipoIentificacion">

              </div>

            </div>
            <!-- ENTRADA PARA NOMBRE-->

            <div class="form-group">

              <label>Nombre Completo</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user-md"></i></span>

                <input type="text" class="form-control input-lg" id="editarnuevoNombre" name="editarnuevoNombre" value="" required>

              </div>

            </div>
            <!-- PRIMER APELLIDO-->

            <div class="form-group">

              <label>Primer Apellido</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user""></i></span>

                    <input type=" text" class="form-control input-lg" id="editarnuevoApellido1" name="editarnuevoApellido1" value="" required>

              </div>

            </div>


            <!-- PRIMER SEGUNDO APELLIDO-->

            <div class="form-group">

              <label>Segundo Apellido</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user""></i></span>

                  <input type=" text" class="form-control input-lg" id="editarnuevoApellido2" ate name="editarnuevoApellido2" value="" required>

              </div>

            </div>




            <!-- ENTRADA PARA SELECCIONAR PROVINCIA -->

            <div class="form-group">

              <label>Provincia</label>



              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <select id="slt-provincias" class="form-control input-lg" name="editarnuevaProvincia">

                  <option value="">-- Seleccione una provincia --</option>

                </select>

              </div>

            </div>
            <!-- ENTRADA PARA SELECCIONAR CANTON -->

            <div class="form-group">

              <label>Cantón</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <select id="slt-cantones" class="form-control input-lg" name="editarnuevoCanton">

                  <option value="">-- Seleccione un cantón --</option>

                </select>

              </div>

            </div>
            <!-- ENTRADA PARA SELECCIONAR DISTRITO -->

            <div class="form-group">

              <label>Ditrito</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home"></i></span>

                <select id="slt-distritos" class="form-control input-lg" name="editarnuevoDistrito">

                  <option value="">-- Seleccione un distrito --</option>

                </select>

              </div>

            </div>

            <!-- OTRAS SEÑAS-->

            <div class="form-group">

              <label>Otras Señas</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-home""></i></span>

                   <input type=" text" class="form-control input-lg" id="otrasSenas" name="editarotrasSenas" placeholder="Otras Señas">

              </div>

            </div>

            <!-- OTRAS TELEFONO-->

            <div class="form-group">

              <label>Teléfono Fijo</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone""></i></span>

                 <input type=" text" class="form-control input-lg" name="editarnuevoTelefono" placeholder="Telefono de Trabajo/ Habitación" required>

              </div>

            </div>

            <!-- OTRAS CELULAR-->

            <div class="form-group">

              <label>Teléfono Celular</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone""></i></span>

                  <input type=" text" class="form-control input-lg" name="editarnuevoCelular" placeholder="Número de Celular" required>

              </div>

            </div>

            <!-- FECHA DE NACIMIENTO-->

            <div class="form-group">

              <label>Fecha de Nacimiento</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-birthday-cake""></i></span>

                 <input type=" date" class="form-control input-lg" name="editarnuevofNacimiento" placeholder="Ingrese la fecha de Nacimiento" required>

              </div>

            </div>



            <!-- ENTRADA PARA ESTADO CIVIL -->

            <div class="form-group">

              <label>Estado Civil</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-legal"></i></span>

                <select class="form-control input-lg" name="editarnuevoEstadoCivil" required>

                  <option value="">Selecionar Estado Civil</option>

                  <option value="Soltero">Soltero</option>

                  <option value="Casado">Casado</option>

                  <option value="Divorciado">Divorciado</option>

                  <option value="Unión Libre">Unión Libre</option>

                </select>

              </div>

            </div>


            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                <select class="form-control input-lg" name="editarnuevoTrabajo" required>

                  <option value="">¿Trabaja actualmente?</option>

                  <option value="SI">Si</option>

                  <option value="NO">No</option>

                  <option value="OTRO">OTRO</option>


                </select>

              </div>

            </div>



            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                <select class="form-control input-lg" name="editarnuevaCarrera" required>

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

                <select class="form-control input-lg" name="editarprocedeExtudante" required>

                  <option value="">¿De donde proveine?</option>

                  <option value="Academico">Academico</option>

                  <option value="Tecnico por Madurez">Tecnico por Madurez</option>

                  <option value="Otro">Otro</option>

                </select>

              </div>

            </div>

          </div>

        </div>


        <div class="box-body">


          <!-- ENTRADA PARA SUBIR FOTO -->

          <div class="form-group">

            <div class="panel">SUBIR FOTO</div>

            <input type="file" class="nuevaFoto" name="editarFotoEstudiante">

            <p class="help-block">Peso máximo de la foto 2MB</p>

            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">



          </div>


        </div>




        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

      </form>

    </div>

  </div>

</div>



<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalasignarPlanEstudiante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Asignar Plan de Carrera al Estudiante</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">



            <div class="form-group">

              <label for="">Seleccionar Plan de Carrera</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="planCarrera">

                  <?php
                  $planesCarrera = ControladorPlanCarrera::ctrMostrarMateriasPlanCarrera(null, null);

                  foreach ($planesCarrera as $planCarrera) {
                    echo '<option value="Administrador">Administrador</option>';
                  }
                  ?>



                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" id="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 200 MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

      </form>

    </div>

  </div>

</div>

<?php
$EliminarEstudiante = new ControladorEstudiante();
$EliminarEstudiante->ctrBorrarEstudiante();




?>