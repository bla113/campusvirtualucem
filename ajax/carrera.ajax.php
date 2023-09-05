<?php

require_once "../controladores/carrera.controlador.php";
require_once "../modelos/carrera.modelo.php";

class AjaxCarrera{

	/*=============================================
	EDITAR CARRERA
	=============================================*/	

	public $idCarrera;
 
	public function ajaxEditarCarrera(){

		$item = "ID_CARRERA";
		$valor = $this->idCarrera;

		$respuesta =ControladorCarrera::ctrMostrarCarrera($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR CARRERA
=============================================*/
if(isset($_POST["idCarrera"])){

	$editar = new AjaxCarrera();
	$editar -> idCarrera = $_POST["idCarrera"];
	$editar -> ajaxEditarCarrera();

}

