<?php

require_once "../controladores/periodo.controlador.php";
require_once "../modelos/periodo.modelo.php";

class AjaxPeriodo{

	/*=============================================
	EDITAR PERIODO
	=============================================*/	

	public $idPeriodo;
 
	public function ajaxEditarPeriodo(){

		$item = "ID_PERIODO";
		$valor = $this->idPeriodo;

		$respuesta =ControladorPeriodo::ctrMostrarPeriodo($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR CARRERA
=============================================*/
if(isset($_POST["idPeriodo"])){

	$editar = new AjaxPeriodo();
	$editar -> idPeriodo = $_POST["idPeriodo"];
	$editar -> ajaxEditarPeriodo();

}

