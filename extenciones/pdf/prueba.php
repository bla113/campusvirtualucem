<?php

ob_start();

include 'imagen.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>matricula</title>

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
				border-bottom: 2px solid #ddd;
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
				<tr class="top">
					<td colspan="6">
						<table>
							<tr>
								<td class="title" >
									<img src="<?php echo $image?>" style="width: 70%; max-width: 150px" />
								</td>

								<td  >
									Matrícula #: 123<br />
									Fecha de Emisión: January 1, 2015<br />
									Vence: 10/10/2023
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="6">
						<table>
							<tr >
								<td >
									Universidad UCEM<br />
									Calle Ancha, Alajuela<br />
									Telefono: 2443-4545 
                                    Whatsapp: 8425-1212
								</td>

								<td>
									Estudiante: Jose Bladimir Rojas Ruiz<br />
									Carnete: 4173-2023<br />
									Identificación: 603790355
                                    Telefono: 8422-6664
                                    Correo:bla_113@hotmail.com
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading" >
					<td>Materia</td>
					<td>Modalidad</td>
					<td>Aula</td>
                    <td>Profesor</td>
                    <td>Créditos</td>
                    <td>otro campo</td>

				</tr>

				<tr class="details" >
					<td>Calculo I</td>
					<td>Virtual</td>
					<td>Zoom</td>
					<td>JOSE ROJAS</td>
					<td>4</td>
					<td>4</td>

					
				</tr>
                <tr class="details" >
					<td>Calculo I</td>
					<td>Virtual</td>
					<td>Zoom</td>
					<td>JOSE ROJAS</td>
					<td>4</td>
					<td>4</td>


					
				</tr>
             
                <tr class="details" >
					<td>Calculo I Calculo I Calculo I</td>
					<td>Virtual</td>
					<td>Zoom</td>
					<td>JOSE ROJAS</td>
					<td>4</td>
					<td>4</td>

					
				</tr>
                <tr class="details" >
					<td>Calculo I</td>
					<td>Virtual</td>
					<td>Zoom</td>
					<td>JOSE ROJAS</td>
					<td>4</td>
					<td>4</td>

					
				</tr>

				<tr class="heading" >
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
					<td>Detalles</td>
					<td>Sub Total</td>
				</tr>

				<tr class="item">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
					<td>Descuento</td>
					<td>$300.00</td>
                    
				</tr>
                <tr class="item">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
					<td>Créditos</td>
					<td>$300.00</td>
                    
				</tr>

				<tr class="item last">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    
					<td>Matrícula</td>

					<td>$40,000</td>
				</tr>

				<tr class="total">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    

					<td ><h4></h4> Total: 385.00</td>
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