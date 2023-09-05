<?php
if (isset($_GET['ruta'])) {

  $itemP = 'ID_PLAN_CARRERA';

  $valorP = $_GET['idPlanCarrera'];

  $planCarrera = ControladorPlanCarrera::ctrMostrarPlanCarrera($itemP, $valorP);

  //print_r($planCarrera);

  $itemC = 'ID_CARRERA';

  $valorC = $_GET['idCarrera'];

  $Cararreras = ControladorCarrera::ctrMostrarCarrera($itemC, $valorC);

  $item1 = 'ID_CARRERA';

  $item2 = 'ID_PLAN_CARRERA';


  $valor1 = $_GET['idCarrera'];

  $valor2 = $_GET['idPlanCarrera'];

  $respuesta = ControladorAsociarMateriasPlan::ctrMostrarMateriasSeleccionadas($item1, $valor1, $item2, $valor2);
  $total=0;

  //print_r($respuesta);
}
?>

<div class="content-wrapper">



  <section class="content">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->




      <!-- Main content -->
      <section class="invoice ">
        <!-- title row -->

        <!-- info row -->
        <div class="row invoice-info">

          <div class="col-sm-12 m-auto invoice-col">

            <div class="box">

              <div class="box-header">

                <h3 class="box-title">Detalles del Plan de Carrera</h3>

              </div><br>
              <!-- this row will not appear when printing -->
              <div class="row no-print">

                <div class="col-xs-12">

                  <a href="" target="" class="btn btn-warning"><i class="fa fa-print"></i> Imprimir</a>

                  <button type="button" class="btn btn-success pull-right"><i class="fa fa-file-excel-o"></i> Generar Excel

                  </button>

                  <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">

                    <i class="fa fa-download"></i> Generate PDF

                  </button>

                </div>

              </div>

              <hr>
              <!-- /.box-header -->
              <div class="box-body no-padding">

                <table class="table table-striped">

                  <tr>

                    <th>Carrera</th>

                    <th>Plan Carrera</th>

                    <th>Código del Plan</th>

                    <th>Total Creditos</th>

                    <th>Total de Periodos</th>

                    <th>Fecha de Creacion</th>

                    <th>Estado</th>


                  </tr>



                  <tr>
                    <?php



                    foreach ($Cararreras as $Cararrera) { ?>

                      <td> <strong class="text text-bold "><?php echo $Cararrera['NOM_CARRERA'] ?></strong> </td>
                    <?php } ?>



                    <?php foreach ($planCarrera as $planC) { ?>

                      <td> <strong class="text text-bold "><?php echo $planC['NOM_PLAN'] ?></strong> </td>
                      <td> <strong class="text text-bold "><?php echo $planC['COD_PLAN_CARRERA'] ?></strong> </td>
                      <td> <strong class="text text-bold "><?php $total = array_sum(array_column($respuesta, 'CREDITOS'));
              echo $total; ?></strong> </td>
                      <td> <strong class="text text-bold "><?php echo $planC['PERIODOS'] ?></strong> </td>
                      <td> <strong class="text text-bold "><?php echo $planC['FECHA_CREACION'] ?></strong> </td>
                      <td> <strong class="text text-bold "><?php
                                                            if ($planC['ESTADO_PLAN']) {
                                                              echo '<button class="btn btn-info btn-xs">Activado</button>';
                                                            } else {
                                                              echo '<button class="btn btn-danger btn-xs">Desactivado</button>';
                                                            }
                                                            ?></strong> </td>
                    <?php } ?>
                    <td>



                    </td>


                  </tr>




                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <!-- /.col -->




        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-bordered table-striped dt-responsive tablas">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Materia</th>
                  <th>Créditos</th>
                  <th>Requisitos</th>
                  <th>Orden</th>
                  <th>Cuatrimestre</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $totalCreditos = 0;
                foreach ($respuesta as $key => $value) { ?>


                  <tr>
                    <td> <?php echo $value['COD_MATERIA'] ?></td>
                    <td><?php echo $value['NOM_MATERIA'] ?></td>
                    <td><?php echo $value['CREDITOS'] ?></td>
                    <td><?php $array = json_decode($value['COD_REQUISITO'], true);

                        foreach ($array as $requisitos => $requisito) {

                          echo '<button class="btn btn-success btn-xs">' . $requisito . '</button>';
                        }
                        ?></td>
                    <td><?php echo $value['ORDEN'] ?></td>
                    <td><?php echo $value['PERIODO'] ?>° Cuatrimestre</td>
                    <td> <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button> </td>

                  </tr>

                <?php
               
             // $total= array_sum($value['CREDITOS']);
              
              }
              
              ?>

              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>



      </section>
      <!-- /.content -->

      <div class="clearfix"></div>

    </div>
    <!-- /.content-wrapper -->



</div>

</section>

</div>