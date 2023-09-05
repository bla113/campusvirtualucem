<?php

require_once "../controladores/plan.cotrolador.php";
require_once "../modelos/plan.modelo.php";

class AjaxPlan{

	/*=============================================
	EDITAR PLAN
	=============================================*/	

	public $idPlan;
 
	public function ajaxEditarPlan(){

		$item = "ID_PLAN";
		$valor = $this->idPlan;

		$respuesta =ControladorPlan::ctrMostrarPlan($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR CARRERA
=============================================*/
if(isset($_POST["idPlan"])){

	$editar = new AjaxPlan();
	$editar -> idPlan = $_POST["idPlan"];
	$editar -> ajaxEditarPlan();

}

