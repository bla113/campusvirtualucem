<?php

require_once "../controladores/aula.controlador.php";
require_once "../modelos/aula.modelo.php";

class AjaxAula{

	/*=============================================
	EDITAR AULA
	=============================================*/	

	public $idAula;
 
	public function ajaxEditarAula(){

		$item = "ID_AULA";
		$valor = $this->idAula;

		$respuesta =ControladorAula::ctrMostrarAula($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR AULA
=============================================*/
if(isset($_POST["idAula"])){

	$editar = new AjaxAula();
	$editar -> idAula = $_POST["idAula"];
	$editar -> ajaxEditarAula();

}

