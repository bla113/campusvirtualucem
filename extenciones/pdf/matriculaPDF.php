<?php
if (isset($_GET['idMtricula'])) {

	require_once '../../controladores/matricula.controlador.php';
	require_once '../../modelos/matricula.modelo.php';

	$item = 'ID_MATRICULA';

	$valor = $_GET['idMtricula'];
	$matriculas = ControladorMatricula::ctrMotrarMatriculasPDF($item, $valor);





	$ID_PRUEBA = $_GET['idMtricula'];
} else {

	echo '<script>

	swal({
		  type: "error",
		  title: "¡No puede ingresar!",
		  showConfirmButton: true,
		  confirmButtonText: "Cerrar"
		  }).then(function(result){
			if (result.value) {

			window.location = "usuarios";

			}
		})

  </script>';
}
ob_start();

include 'imagen.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Impimir_matriucula_000<?php echo $_GET['idMtricula'];?></title>

	<style>
		.invoice-box {
			max-width: 800px;
			margin: auto;
			padding: 30px;
			border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 10px;
			text-align: center;
			font-size: 14px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			line-height: 2px solid #eee;
			font-weight: bold;
		}

		@media only screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.invoice-box.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.invoice-box.rtl table {
			text-align: right;
		}

		.invoice-box.rtl table tr td:nth-child(2) {
			text-align: left;
		}
	</style>
</head>

<body>
	<div class="invoice-box">
		<table cellpadding="0" cellspacing="0">
			<?php 
			$nombreImagen = "ucem_logo.png";
			$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
			
			foreach ($matriculas as $key => $matricula) { ?>
				<tr class="top">
					<td colspan="6">
						<table>
							<tr>
								<td class="title">
									<img src="" style="width: 70%; max-width: 150px" />
								</td>

								<td >
									N° MATRÍCULA: MA- <?php echo $matricula['NOM_PERIODO'] .'-'. $matricula['ID_MATRICULA'] ?><br />
									Periodo: <?php echo $matricula['NOM_PERIODO'] ?><br />
									Fecha de Emisión: <?php echo $matricula['FECHA_CREACION'] ?><br />
									Vence:  <?php echo date("Y-m-d", strtotime($matricula['FECHA_CREACION'] . "+ 1 month")); ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				</tr>

				<tr class="information">
					<td colspan="6">
						<table>
							<tr>
								<td>
									Universidad UCEM<br/>
									Calle Ancha, Alajuela<br/>
									Telefono: 2443-4545<br/>
									Whatsapp: 8425-1212<br/>
								</td>

								<td>
									Estudiante: <?php echo $matricula['NOMBRE_COMPLETO'].' '. $matricula['PRIMER_APELLIDO'].' '. $matricula['SEGUNDO_APELLIDO'] ?><br />
									Carnete: <?php echo $matricula['NUM_CARNE'] ?><br />
									Identificación: <?php echo $matricula['IDENTIFICACION_ESTUDIANTE'] ?><br>
									Telefono:<?php echo $matricula['TELEFONO_ESTUDIANTE'] ?><br>
									Correo:<?php echo $matricula['CORREO_ESTUDIANTE'] ?>
								</td>
							</tr>
						</table>
					</td>
				<?php }


				?>
				<tr class="heading">
					<td>Día</td>
					<td>Horario</td>
					<td>Materia</td>
					<td>Créditos</td>
					<td>Profesor</td>
					<td>Modalida</td>

				</tr>
				<?php $materias = json_decode($matricula['MATERIAS'], true);
				foreach ($materias as $key => $materia) {?>
				<tr class="details">
					<td><?php echo $materia['DIA'] ?></td>
					<td><?php echo $materia['NOM_HORARIO'] ?></td>
					<td><?php echo $materia['NOM_MATERIA'] ?></td>
					<td><?php echo $materia['CREDITOS'] ?></td>
					<td><?php echo $materia['NOMBRE_PROFESOR'] ?></td>
					<td><?php echo $materia['MODALIDAD'] ?></td>
					

				</tr>
				<?php }?>
				
			

				<tr class="heading">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Detalles</td>
				</tr>

				<tr class="item">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Sub Total</td>
					<td>C/.<?php echo number_format( $matricula['SUB_TOTAL'],2) ?></td>

				</tr>
				<tr class="item">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Descuentos</td>
					<td>C/.<?php echo number_format( $matricula['DESCUENTO'],2) ?></td>

				</tr>
				<tr class="item">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Total</td>
					<td>C/.<?php echo number_format( $matricula['TOTAL_MATRICULA'],2) ?></td>

				</tr>
				

				<tr class="total">
					<td></td>
					<td></td>
					<td></td>
					<td></td>


					<td>
						<h4></h4> Saldo: C/.<?php echo number_format( $matricula['SALDO'],2) ?>
						<h4 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
						Forma de pago: <?php
						if( $matricula['ID_METODO_PAGO']==1){
								echo 'Contado';
						}else{
							echo 'Crédito Ucem';
						}
						?> </h4> 
					</td>
				</tr>
		</table>
	</div>
</body>



</html>



<?php

$html = ob_get_clean();

//echo $html;
require '../pdf/vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);


$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
//$dompdf->setPaper('A4','landscape');

$dompdf->render();
$dompdf->stream("archivo_.pdf", array("Attachment" => false))
?>