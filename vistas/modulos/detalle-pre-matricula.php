<?php
if (isset($_GET['ruta'])) {

  $idEstudiante = $_GET['idEstudiante'];
  $IdPlanCarrera = $_GET['idPlanCarrera'];
  $IdCarrera = $_GET['idCarrera'];


  $detalles = ControladorMatricula::ctrMostrarPrematriculas($idEstudiante);
  $araceles = ControladorMatricula::ctrConsulataCostos();
  $item = 'ID_ESTUDIANTE';
  $catidadMaterias = count($detalles);

  $valor = $_GET['idEstudiante'];
  $estudiantes = ControladorEstudiante::ctrMostrarEstudiante($item, $valor);
  $subTotal = 0;
  $descuento = 0;
  $descuentoCredito = 0;
  $totalContado = 0;
  $cuota = 0;
  $granTotalCredito = 0;
  // print_r($detalles);
}
?>



<div class="content-wrapper">

  <section class="content-header">

    <h1>


    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i></a></li>

      <li class="active"></li>

    </ol>

  </section>

  <section class="invoice">
    <!-- title row -->
    <div class="row">

      <div class="col-xs-6">
        <h2 class="page-header">
          <i class="fa fa-university"></i> UCEM LA
          <small class="pull-right">Fecha: <?php echo $fecha_actual = date("d-m-Y ");  ?></small>
        </h2>




      </div>



      <?php { {
          // print_r($detalles);
        }
      } ?>
      <!-- /.col -->
    </div>

    <?php // print_r($estudiantes);
    ?>
    <!-- info row -->
    <div class="row invoice-info">

      <div class="col-sm-4 invoice-col">
        UCEM
        <address>
          <strong>Periodo IIC-2023 </strong><br>
          Correo: info@almasaeedstudio.com <br>
          Cuenta IBAN BCT: CR27010720102104696521 <br>
          Numero SINPE: 8344-6379
        </address>
      </div>
      <?php foreach ($estudiantes as $key => $estudiante) { ?>
        <div class="col-sm-4 invoice-col">
          <strong class="text text-uppercase">Datos del Estudiante</strong>
          <address>
            <?php echo $estudiante['NOMBRE_COMPLETO'] . " " . $estudiante['PRIMER_APELLIDO'] . " " . $estudiante['SEGUNDO_APELLIDO'] ?><br>
            Identificación: <?php echo $estudiante['IDENTIFICACION_ESTUDIANTE'] ?><br>
            Numero de Carnet: <?php echo $estudiante['NUM_CARNE'] ?><br>
            Correo:<?php echo $estudiante['CORREO_ESTUDIANTE'] ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b> Prematricula #007612</b><br>
          <br>
          <b>Usuario:</b> <?php echo $_SESSION["nombre"] ?><br>
          <b>Ultimo dia para pagar con descuento:</b> 2/22/2014<br>

        </div>
      <?php } ?>
    </div>
    <!-- /.row -->

    <!-- Table row -->





    <div class="row">
      <div class="col-xs-12 table-responsive">


        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>
              <th style="width:20px">Dia</th>
              <th>Materia</th>
              <th style="width:10px">Créditos</th>
              <th style="width:30px">Modalidad</th>
              <th style="width:40px">Horario</th>
              <th>Aula</th>
              <th>Profesor</th>
              <th style="width:10px">Acción</th>

            </tr>


          </thead>

          <tbody>
            <?php
            $creditos = 0;
            foreach ($detalles as $key => $detalles) { ?>
              <tr>
                <td><?php echo $detalles['DIA'] ?></td>
                <td><?php echo $detalles['NOM_MATERIA'] ?></td>
                <td><?php echo $detalles['CREDITOS'] ?></td>
                <td><?php echo $detalles['MODALIDAD'] ?></td>
                <td><?php echo $detalles['NOM_HORARIO'] ?></td>
                <td><?php echo $detalles['NOM_AULA'] ?></td>
                <td><?php echo $detalles['NOMBRE_PROFESOR'] ?></td>
                <td>
                  <button class="btn btn-danger accent-gray btnElimiDetalleMatricula" idHorarioOfertaEliminar="<?php echo $detalles['ID_DETALLE_MATRICULA'] ?>" idEstudiante="<?php echo $idEstudiante ?>" idCarrera="<?php echo $IdCarrera ?>" idPlanCarrera="<?php echo $IdPlanCarrera ?>"><i class="fa fa-trash"></i></button>
                </td>

              </tr>

            <?php
              $creditos =  $creditos + $detalles['CREDITOS'];
            }; ?>

          </tbody>

        </table>
      </div>

    </div>


    <div class="row">

      <div class="col-md-3">

        <h3>Prematricula Contado 50% descuento</h3>

        <div class="box box-primary">

          <div class="box-header with-border">

            <div class="table-responsive">

              <table class="table">

                <tr>



                  <?php
                  //$total = array_sum(array_column($detalles, 'CREDITOS'));
                  $sub_total = $creditos *  21490;


                  ?>
                  <th style="width:50%">Subtotal:</th>
                  <td>₡<?php echo number_format($sub_total, 2);  ?></td>


                </tr>

                <tr>
                  <th>Matrícula:</th>
                  <?php
                  foreach ($araceles as $key => $aracel) {

                    echo '<td>₡ ' . number_format($aracel['COSTO_MATRICULA'], 2) . '</td>';
                  }
                  ?>



                </tr>

                <tr>
                  <th>Sub Total:</th>
                  <td><?php

                      $subTotal = $aracel['COSTO_MATRICULA'] + $sub_total;
                      echo number_format($subTotal, 2);

                      ?></td>
                  <input type="hidden" name="totalMatricula" value="0">

                </tr>

                <tr>
                  <th>Tatal del Descuento</th>
                  <td>
                    <h5> ₡
                      <?php

                      if ($catidadMaterias < 2) {
                        $mostrarDescuent=0;
                        $descuento = $subTotal * 0.0;
                        echo number_format($descuento, 2);
                      } elseif ($catidadMaterias == 2) {
                        $mostrarDescuent=20;
                        $descuento = $subTotal * 0.2;
                        echo number_format($descuento, 2);
                      } elseif ($catidadMaterias == 3) {
                        $mostrarDescuent=30;
                        $descuento = $subTotal * 0.3;
                        echo number_format($descuento, 2);
                      } elseif ($catidadMaterias > 3) {
                        $mostrarDescuent=50;
                        $descuento = $subTotal * 0.50;
                        echo number_format($descuento, 2);
                      }

                      ?>
                    </h5>
                  </td>

                </tr>
                <tr>
                  <th>TOTAL A PAGAR:</th>
                  <td style="background-color:aqua;">
                    <h5>₡ <?php $totalContado = $subTotal - $descuento;
                          echo number_format($totalContado, 2); ?> </h5>
                  </td>


                </tr>

              </table>

            </div>



          </div>
        </div>






      </div>
      <!-- FIN CONTADO -->
      <div class="col-md-3">

        <h3>Prematricula Crédito</h3>

        <div class="box box-primary">

          <div class="box-header with-border">

            <div class="table-responsive">

              <table class="table">

                <tr>



                  <?php
                  //$total = array_sum(array_column($detalles, 'CREDITOS'));
                  $sub_total = $creditos *  21490;


                  ?>
                  <th style="width:50%">Subtotal:</th>
                  <td>₡<?php echo number_format($sub_total, 2);  ?></td>


                </tr>

                <tr>
                  <th>Matrícula:</th>
                  <?php
                  foreach ($araceles as $key => $aracel) {

                    echo '<td>₡ ' . number_format($aracel['COSTO_MATRICULA'], 2) . '</td>';
                  }
                  ?>



                </tr>

                <tr>
                  <th>Sub Total:</th>
                  <td><?php

                      $subTotal = $aracel['COSTO_MATRICULA'] + $sub_total;
                      echo number_format($subTotal, 2);

                      ?></td>

                </tr>

                <tr>
                  <th>Tatal del Descuento</th>
                  <td>
                    <h5> ₡
                      <?php

                      if ($catidadMaterias < 0) {
                        $descuentoCredito = $subTotal * 0.0;
                        echo number_format($descuento, 2);
                      } elseif ($catidadMaterias == 3) {
                        $descuentoCredito = $subTotal * 0.2;
                        echo number_format($descuento, 2);
                      } elseif ($catidadMaterias > 3) {
                        $descuentoCredito = $subTotal * 0.2;
                        echo number_format($descuentoCredito, 2);
                      } else {
                        echo 0;
                      }




                      ?>
                    </h5>
                  </td>

                </tr>
                <tr>
                  <th>TOTAL A PAGAR:</th>
                  <td>
                    ₡ <?php $granTotalCredito = $subTotal - $descuentoCredito;
                      echo number_format($granTotalCredito, 2); ?>
                  </td>


                </tr>

                <tr>
                  <th>CUOTA MENSUAL:</th>
                  <td style="background-color:aqua;">
                    <h5>₡ <?php $cuota = $granTotalCredito / 3;
                          echo number_format($cuota, 2); ?> </h5>
                  </td>


                </tr>

              </table>

            </div>



          </div>
        </div>


      </div>



      <!-- DETALLES -->

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="col-md-4">

          <h3>Detalle Prematrícula</h3>

          <div class="box box-primary">

            <div class="box-header with-border">

              <div class="table-responsive">

                <table class="table">
                  <tr>
                    <th>Seleccione</th>

                    <td>
                      <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>

                        <select class="form-control" name="metodoDePago" id="selectMetodoPago" required>

                          <option value="">Selecionar Método </option>

                          <option value="<?php echo $totalContado ?>" id="1" Monto="<?php echo $totalContado  ?>" descuento="<?php echo $descuento ?>">Contado</option>

                          <option value="<?php echo $cuota; ?>" id="2" Monto="<?php echo $granTotalCredito ?>" descuento="<?php echo $descuentoCredito ?>">Crédito</option>

                        </select>



                      </div>
                    </td>

                  </tr>
                  <tr>
                    <th>Pago Mínimo Hoy</th>
                    <td>
                      <div class="form-group">

                        <div class="input-group">

                          <span class="input-group-addon">₡</span>

                          <input style="background-color: aqua;" class="form-control input-lg" type="number" name="TotalSeleccionado" id="TotalSeleccionado">
                          <span class="input-group-addon">,00</span>

                        </div>

                      </div>

                    </td>

                  </tr>

                  <tr>
                    <th>Adjuntar Comprobante</th>
                    <td><input class="form-control" type="file" name="comprobantePago" id="comprobantePago"></td>

                  </tr>

                  <tr>
                    <th>Acciones</th>
                    <td>


                      <a href="index.php?ruta=expediente-estudiante&idEstudiante=<?php echo $idEstudiante ?>&idCarrera=<?php echo $IdCarrera ?>&idPlanCarrera=<?php echo $IdPlanCarrera ?>" class="btn btn-success btn-lg" style="margin-right: 5px;">Regresar</a>
                      <button type="submit" name="btnCrearMatricula" class="btn btn-primary btn-lg">Crear Prematricula</button>


                    </td>
                  </tr>
                  <tr>
                    <th>Medios de Pago</th>
                    <td><img src="vistas/img/credit/unnamed.png" height="35px" width="35px" alt="SinpeMovil">
                      <img src="vistas/img/credit/mastercard.png" alt="Mastercard">
                      <img src="vistas/img/credit/american-express.png" alt="American Express">
                      <img src="vistas/img/credit/paypal2.png" alt="Paypal">
                    </td>

                  </tr>




                </table>

              </div>



            </div>
          </div>
          <input type="hidden" name="idEstudiante" value="<?php echo $_GET['idEstudiante'] ?>">
          <input type="hidden" name="idPerido" value="<?php echo $detalles['ID_PERIODO']  ?>">
          <input type="hidden" name="subtotal" value="<?php echo $sub_total  ?>">

          <input type="hidden" name="metodoDePago" id="metodoDePago">
          <input type="hidden" name="montoSeleccionado" id="montoSeleccionado">
          <input type="hidden" name="montoDescuento" id="montoDescuento">







        </div>

        <?php

        /*  $CrearMatricula= new ControladorMatricula();

        $CrearMatricula->ctrCreaMatricula();*/
        $res = ControladorMatricula::ctrCreaMatricula();

        print_r($res)
        ?>
      </form>

    </div>
  </section>

</div>