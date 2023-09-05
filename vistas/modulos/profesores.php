<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar profesores

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar profesores</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="crear-profesor" class="btn btn-primary btn-lg">Agregar profesor</a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>

              <th style="width:10px">Identificacion</th>
              <th>Nombre Completo</th>
              <th>Teléfono</th>
              <th>Correo</th>
              <th>Estado</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $Profeosores = ControladorProfesor::ctrMostrarProfesor(null, null);
            foreach ($Profeosores as $profesor) { ?>
              <tr>
                <td><?php echo $profesor['IDENTIFICACION_PROFESOR'] ?></td>
                <td><?php echo $profesor['NOMBRE_COMPLETO'] . " " . $profesor['PRIMER_APELLIDO'] . " " . $profesor['SEGUNDO_APELLIDO'] ?></td>
                <td><?php echo $profesor['CELULAR_PROFESOR'] ?></td>
                <td><?php echo $profesor['CORREO_PROFESOR'] ?></td>

                <td><?php if ($profesor["ESTADO"] === 1) {

                      echo '<button class="btn btn-info btn-xs">Activado</button>';
                    }
                    if ($profesor["ESTADO"] === 0) {

                      echo 'button class="btn btn-danger btn-xs ">Desactivado</button>';
                    }       ?></td>
                <td>

                  <div class="btn-group">

                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                    <button class="btn btn-danger btnEliminarProfesor" idProfesor="<?php echo $profesor['ID_PROFESOR'] ?>"><i class="fa fa-trash"></i></button>

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
$Eliminar=new ControladorProfesor();
$Eliminar->ctrBorrarProfesor();
?>