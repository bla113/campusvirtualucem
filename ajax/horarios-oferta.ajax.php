<?php

require_once "../controladores/oferta-academica.controlador.php";
require_once "../modelos/oferta-academica.modelo.php";

class AjaxHorariosOferta{

	/*=============================================
	EDITAR AULA
	=============================================*/	

	public $idOferta;
 
	public function ajaxMostrarHorariosOferta(){

		//$item = "ID_OFERTA";
		$valor = $this->idOferta;

		$respuesta =ControladorOfertaAcademica::ctrMostrarHorariosOfertaAcademica($valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR AULA
=============================================*/
if(isset($_POST["idOferta"])){

	$mostrar = new AjaxHorariosOferta();
	$mostrar -> idOferta = $_POST["idOferta"];
	$mostrar -> ajaxMostrarHorariosOferta();

}

