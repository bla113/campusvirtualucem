<?php

require_once "../controladores/plan-carrera.controlador.php";
require_once "../modelos/plan-carrera.modelo.php";

class AjaxPlanCarrera{

	/*=============================================
	EDITAR pLAN CARRERA
	=============================================*/	

	public $idPlanCarrera;
 
	public function ajaxEditarPlanCarrera(){

		$item = "ID_PLAN_CARRERA";
		$valor = $this->idPlanCarrera;

		$respuesta =ControladorPlanCarrera::ctrMostrarPlanCarrera($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR PLAN CARRERA
=============================================*/
if(isset($_POST["idPlanCarrera"])){

	$editar = new AjaxPlanCarrera();
	$editar -> idPlanCarrera = $_POST["idPlanCarrera"];
	$editar -> ajaxEditarPlanCarrera();

}

