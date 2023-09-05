<?php

require_once "../controladores/oferta-academica.controlador.php";
require_once "../modelos/oferta-academica.modelo.php";

class AjaxHorarioOferta{

	/*=============================================
	EDITAR HORARIO
	=============================================*/	

	public $idOferta;
 
	public function ajaxHorarioOferta(){

		$item = "ID_OFERTA";
		$valor = $this->idOferta;
		

		$respuesta =ControladorOfertaAcademica::ctrMostrarOfertaAcademica($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR HORARIO
=============================================*/
if(isset($_POST["idOferta"])){

	$buscar = new AjaxHorarioOferta();
	$buscar -> idOferta = $_POST["idOferta"];
	$buscar -> ajaxHorarioOferta();

}

