<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar oferta académica

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar oferte académica</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="crear-oferta-academica" class="btn btn-primary btn-lg"><i class="fa fa-plus"> </i> Agregar Oferta Nueva</a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>
              <?php
              $ofertas = ControladorOfertaAcademica::ctrMostrarOfertaAcademica(null, null);
              $periodos= ControladorPeriodo::ctrMostrarPeriodo(null,null);
              //$respuesta =ControladorOfertaAcademica::ctrMostrarOfertaAcademica(null,null);
              //$gruposHorario = ControladorOfertaAcademica::ctrMostrarGruposHorarios();
              //print_r($periodos)
              ?>
              <th>Periodo</th>

              <th>Grupo Materia</th>
              <th>Materia</th>

              <th>Turno</th>

              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <tr>

              <?php
              foreach ($ofertas as $key => $oferta) {  ?>
                <td><?php echo $oferta['NOM_PERIODO'] ?></td>

                <td><?php echo $oferta['NOM_GRUPO'] ?></td>
                <td><?php echo $oferta['NOM_MATERIA'] ?></td>

                <td><?php

                    if ($oferta['TURNO_OFERTA'] == 'Diurno') {
                      echo '<button class="btn btn-warning btn-xs"><i class="fa fa-sun-o"></i> ' . $oferta['TURNO_OFERTA'] . '</button>';
                    }
                    if ($oferta['TURNO_OFERTA'] == 'Nocturno') {

                      echo '<button class="btn btn-facebook btn-xs"><i class="fa fa-moon-o"></i> ' . $oferta['TURNO_OFERTA'] . '</button>';
                    }


                    ?></td>

                <td>

                <div class="btn-group">

                  <button type="button" class="btn btn-warning"><i class="fa  fa-cog"></i></button>

                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">

                    <span class="caret"></span>

                    <span class="sr-only">Toggle Dropdown</span>

                  </button>

                  <ul class="dropdown-menu" role="menu">

                    <li><button class="btn btn-default flat btn-xs">Editar</button></li>

                    <li><button class="btn btn-default flat btn-xs btnEliminarOferta" idOferta="<?php echo $oferta['ID_OFERTA'] ?>">Eliminar</button></li>

                    <li><button class="btn btn-default flat btnCrearHorario btn-xs" idOferta="<?php echo $oferta['ID_OFERTA'] ?>" data-toggle="modal" data-target="#modalCrearHorario">Crear Horario</button></li>
                   
                    <li><button class="btn btn-default flat btn-xs btnVerHorarios" idOferta="<?php echo $oferta['ID_OFERTA'] ?>" data-toggle="modal" data-target="#modalHorariosOferta">Ver Horarios</button></li>
                    
                    <li class="divider"></li>
                    
                  </ul>

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

<?php
$grupos = ControladorOfertaAcademica::ctrMostrarGruposHorarios(null, null);
$profesores = ControladorProfesor::ctrMostrarProfesor(null, null);
$horarios = ControladorHorario::ctrMostrarHorario(null, null);
$aulas = ControladorAula::ctrMostrarAula(null, null);
$periodos = ControladorPeriodo::ctrMostrarPeriodo(null, null);
//print_r($grupos)
?>


<!--=====================================
MODAL AGREGAR HORARIO A OFERTA
======================================-->

<div id="modalCrearHorario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Crear Horario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE MATERIA -->

            <div class="form-group">

              <label for="">Creando el Horarario para la Materia ofertada</label>


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                <input type="text" class="form-control input-lg" id="nombreMateria" name="nombreMateria" disabled>

                <input type="hidden" name="idOferta" id="idOferta" value="">
                <input type="hidden" name="idMateria" id="idMateria" value="">

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">

              <label for="">Ingrse el Grupo del Horario</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="nuevoGrupoHorario">

                  <option value="">Selecionar Grupo</option>

                  <?php

                  foreach ($grupos as $key => $value) {
                    echo ' <option value="' . $value['ID_GRUPO_HORARIO'] . '">' . $value['NOMBRE_GRUPO'] . '</option>';
                  }
                  ?>
                </select>

              </div>

            </div>

            <div class="form-group">

              <h3 class="box-group">Seleccione Profesor</h3>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                <select class="form-control input-lg" name="profesorOferta" id="grupoMateria" required>

                  <option value="">Selecionar Profesor</option>
                  <?php

                  foreach ($profesores as $key => $profesor) {

                    echo '<option  value="' . $profesor['ID_PROFESOR'] . '">' . $profesor['NOMBRE_COMPLETO'] . ' ' . $profesor['PRIMER_APELLIDO'] . ' ' . $profesor['SEGUNDO_APELLIDO'] . '</option>';
                  }
                  ?>


                </select>

              </div>

            </div>

            <div class="form-group">

              <h3 class="box-group">Seleccione Horario</h3>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                <select class="form-control input-lg" name="horarioOferta" id="grupoMateria" required>

                  <option value="">Selecionar Horario</option>

                  <?php

                  foreach ($horarios as $key => $horario) {
                    echo '<option  value="' . $horario['ID_HORARIO'] . '">' . $horario['NOM_HORARIO'] . '</option>';
                  }
                  ?>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <h3 class="box-group">Seleccione el Día</h3>


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                <select class="form-control input-lg" name="diaOferta" id="" required>

                  <option value="">Selecionar Día</option>

                  <option value="LUNES">LUNES</option>

                  <option value="MARTES">MARTES</option>

                  <option value="MIERCOLES">MIERCOLES</option>

                  <option value="JUEVES">JUEVES</option>

                  <option value="VIERNES">VIERNES</option>

                  <option value="SABADO">SABADO</option>

                  <option value="DOMINGO">DOMINGO</option>


                </select>

              </div>

            </div>


            <div class="form-group">

              <h3 class="box-group">Seleccione Aula</h3>


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                <select class="form-control input-lg" name="aulaOferta" id="grupoMateria" required>

                  <option value="">Selecionar Aula </option>

                  <?php

                  foreach ($aulas as $key => $aula) {
                    echo '<option  value="' . $aula['ID_AULA'] . '">' . $aula['NOM_AULA'] . '</option>';
                  } ?>

                </select>

              </div>

            </div>


            <div class="form-group">

              <h3 class="box-group">Seleccione la Modalidad</h3>


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                <select class="form-control input-lg" name="modalidadOferta" id="" required>

                  <option value="">Selecionar Modalidad</option>

                  <option value="Presencial">Presencial</option>

                  <option value="Tutoría">Tutoría</option>

                  <option value="Suficiencia">Suficiencia</option>

                  <option value="Práctica">Práctica</option>

                </select>

              </div>

            </div>

            <div class="form-group">

              <label for="">Capacidad del Grupo</label>


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-book"></i></span>

                <input type="number" class="form-control input-lg" id="capacidadHorario" name="capacidadHorario" value="40" min="1" max="999" required>

              

              </div>

            </div>

            <div class="form-group">

              <h3 class="box-group">Seleccione Periodo</h3>


              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>

                <select class="form-control input-lg" name="idPeriodo" id="idPeriodo" required>

                  <option value="">Selecionar Periodo </option>

                  <?php

                  foreach ($periodos as $key => $periodo) {
                    echo '<option  value="' . $periodo['ID_PERIODO'] . '">' . $periodo['NOM_PERIODO'] . '</option>';
                  } ?>

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

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

      <?php 
      $CrearHorarioOferta= new ControladorOfertaAcademica();
      $CrearHorarioOferta->ctrCrearHorarioOfertaAcademica();
      ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalHorariosOferta" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Horarios Disponibles </h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body ">

                    <div class="box-body">




                        <table class="table table-bordered table-striped tablas horarios">

                            <thead>

                                <tr>
                                    <th>Grupo</th>
                                    <th>Materia</th>
                                    <th>Profesor</th>
                                    <th>Modaliad</th>
                                    <th>Aula</th>
                                    <th>Horario</th>
                                    <th>Capacidad</th>
                                    <th>Matricular</th>

                                </tr>

                            </thead>

                            <tbody id="horariosOferta">

 




                            </tbody>

                        </table>




                    </div>

                </div>

                <!--=====================================
                    PIE DEL MODAL
                    ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



                </div>



            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalEditarHorarioOfertado" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <h1>Hola vamos a editar el horario</h1>

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
$eliminarHorario= new ControladorOfertaAcademica();
$eliminarHorario->ctrBorrarHorarioMateriaOfertada();

$EliminarOferta= new ControladorOfertaAcademica();
$EliminarOferta->ctrBorrarOfertaAcademica();
?>

