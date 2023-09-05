<?php
session_start();
ob_start();

require('../controladores/configuaracion.controlador.php');
require('../controladores/estudiante.controlador.php');
require('../controladores/factura.controlador.php');

require('../modelos/factura.modelo.php');
require('../modelos/configuracion.modelo.php');
require('../modelos/estudiante.modelo.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Imprimir</title>
  <link rel="stylesheet" href="style.css" media="all" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


  <style>
    @font-face {
      font-family: SourceSansPro;
      src: url(SourceSansPro-Regular.ttf);
    }

    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #0087C3;
      text-decoration: none;
    }

    body {
      position: relative;
      width: 20cm;
      height: 26.7cm;
      margin: 0 auto;
      color: #555555;
      background: #FFFFFF;
      font-family: Arial, sans-serif;
      font-size: 14px;
      font-family: SourceSansPro;
    }

    header {
      padding: 10px 0;
      margin-bottom: 20px;
      border-bottom: 1px solid #AAAAAA;
    }

    #logo {
      float: left;
      margin-top: 8px;
    }

    #logo img {
      height: 70px;
    }

    #company {
      float: right;
      text-align: right;
    }


    #details {
      margin-bottom: 50px;
    }

    #client {
      padding-left: 6px;
      border-left: 6px solid #0087C3;
      float: left;
    }

    #client .to {
      color: #777777;
    }

    h2.name {
      font-size: 1.4em;
      font-weight: normal;
      margin: 0;
    }

    #invoice {
      float: right;
      text-align: right;
    }

    #invoice h1 {
      color: #0087C3;
      font-size: 2.4em;
      line-height: 1em;
      font-weight: normal;
      margin: 0 0 10px 0;
    }

    #invoice .date {
      font-size: 1.1em;
      color: #777777;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table th,
    table td {
      padding: 20px;
      background: #EEEEEE;
      text-align: center;
      border-bottom: 1px solid #FFFFFF;
    }

    table th {
      white-space: nowrap;
      font-weight: normal;
    }

    table td {
      text-align: right;
    }

    table td h3 {
      color: #57B223;
      font-size: 1em;
      font-weight: normal;
      margin: 0 0 0.2em 0;
    }

    table .no {
      color: #FFFFFF;
      font-size: 1.2em;
      background: #57B223;
    }

    table .desc {
      text-align: left;
    }

    table .unit {
      background: #DDDDDD;
    }

    table .qty {
      background: #EEEEEE;
    }

    table .total {
      background: #57B223;
      color: #FFFFFF;
    }

    table td.unit,
    table td.qty,
    table td.total {
      font-size: 1.2em;
    }

    table tbody tr:last-child td {
      border: none;
    }

    table tfoot td {
      padding: 10px 20px;
      background: #FFFFFF;
      border-bottom: none;
      font-size: 1.2em;
      white-space: nowrap;
      border-top: 1px solid #AAAAAA;
    }

    table tfoot tr:first-child td {
      border-top: none;
    }

    table tfoot tr:last-child td {
      color: #57B223;
      font-size: 1.4em;
      border-top: 1px solid #57B223;

    }

    table tfoot tr td:first-child {
      border: none;
    }

    #thanks {
      font-size: 2em;
      margin-bottom: 50px;
    }

    #notices {
      padding-left: 6px;
      border-left: 6px solid #0087C3;
    }

    #notices .notice {
      font-size: 1.2em;
    }

    footer {
      color: #777777;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #AAAAAA;
      padding: 8px 0;
      text-align: center;
    }
  </style>
</head>

<body>

  <?php
  $item = 'IDFACTURA';
  $valor = $_POST['btnImprimirFactura'];
 
  $Facturas = ControladorFactura::ctrMostrarFactura();
  //print_r($Facturas);

  $universidad = ControladorConfiguracion::ctrMostrarConfiguracion();


  foreach ($universidad as $key => $Uvalue) {

  ?>


    <header class="clearfix">
      <div id="logo">
        <?php
        /*SE TRANSFORMA LA IMAGEN A BASE 64 PARA MOSTRAR EN EL PDF */
        $nombreImagen = "../vistas/images/teacher-8.jpg";
        $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
        ?>
        <img src="<?php echo $imagenBase64 ?>" alt="Logo">
      </div>
      <div id="company">

        <h2 class="name"><?php echo $Uvalue['nombre_empresa'] ?></h2>
        <div><?php echo $Uvalue['provincia'] . ", " . $Uvalue['canton'] . " ," . $Uvalue['distrito'] ?></div>
        <div><?php echo $Uvalue['telefono'] ?></div>
        <div><a href="mailto:<?php echo $Uvalue['correo'] ?>"><?php echo $Uvalue['correo'] ?></a></div>
      </div>
      </div>
    </header>
  <?php
    //echo  $_SERVER['HTTP_HOST'];
  }

  ?>


  <main>
    <?php
    foreach ($Facturas as $key => $Fvalue) { ?>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Estudiante:</div>
          <h2 class="name"><?php echo $Fvalue['nombre_completo'] . " " . $Fvalue['primer_apellido'] . "" . $Fvalue['segundo_apellido'] ?></h2>
          <div class="address">Identificación:<?php echo $Fvalue['identificacion'] ?></div>
          <div class="text">Carnet:<?php echo $Fvalue['carnet'] ?></div>
        </div>
        <div id="invoice">
          <h1>N° Factura:00000000<?php echo $Fvalue['IDFACTURA'] ?></h1>
          <div class="date">Fecha: <?php echo $Fvalue['fecha'] ?></div>
          <div class="date">Vence: <strong><?php echo $Fvalue['fecha_vencimiento'] ?></strong></div>
          <div class="date">Saldo Colones</i> <?php echo number_format($Fvalue['saldo'], 2)  ?></div>
        </div>
      </div>

      <table border="0" cellspacing="0" cellpadding="0">
        <thead>


          <tr>
            <th class="no">CREDITOS</th>
            <th class="desc">MATERIA</th>
            <th class="unit">AULA-HORARIO</th>
            <th class="qty">PROFESOR</th>
            <th class="total">DIA</th>
          </tr>
        </thead>
        <tbody>
        <?php  } ?>
        <?php


        $array = json_decode($Fvalue['materias'], true);

        foreach ($array as $materias => $materia) {
        ?>
          <tr>
            <td class="no"> <?php echo $materia['MATERIA'] ?></td>
            <td class="desc"><?php echo $materia['CREDITOS'] ?></td>
            <td class="unit"><?php echo $materia['HORARIO'] . '/ Aula:' . $materia['AULA'] ?></td>

            <td class="qty"><?php echo $materia['PROFESOR'] ?></td>
            <td class="total"><?php echo $materia['DIA'] ?></td>
          </tr>
        <?php } ?>





        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>C/.<?php echo number_format($Fvalue['total_sin_descuento'], 2)  ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">IVA 2%</td>
            <td>C/. 00,0</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">DESC.</td>
            <td>C/.<?php echo number_format($Fvalue['total_descuento'], 2)  ?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>C/.<?php echo number_format($Fvalue['total'], 2)  ?></td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Invertir en su futuro!</div>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Se realizará un cargo por financiamiento del 1,5% sobre los saldos impagos después de 30 días</div>
      </div>
  </main>
  <footer>
    La factura se creó en una computadora y es válida sin la firma y el sello.
  </footer>
</body>

</html>

<?php
$html = ob_get_clean();
//echo $html;
require '../pdf/vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();


$options = $dompdf->getOptions();

$options->set(array('isRemoteEnabled' => true));

$dompdf->setOptions($options);
$dompdf->loadhtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream($Fvalue['identificacion'] . '_' . $Fvalue['IDFACTURA'] . '_factura.pdf', array("Attachment" => false));



?>