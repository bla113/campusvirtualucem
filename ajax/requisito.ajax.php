<?php

require_once "../controladores/requisito.controlador.php";
require_once "../modelos/requisito.modelo.php";

class AjaxRequisito{

	/*=============================================
	EDITAR REQUISITO
	=============================================*/	

	public $idRequisito;
 
	public function ajaxEditarRequisito(){

		$item = "ID_REQUISITO";
		$valor = $this->idRequisito;

		$respuesta =ControladorRequisito::ctrMostrarRequisito($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR REQUISITO
=============================================*/
if(isset($_POST["idRequisito"])){

	$editar = new AjaxRequisito();
	$editar -> idRequisito = $_POST["idRequisito"];
	$editar -> ajaxEditarRequisito();

}

