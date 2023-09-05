<?php

require_once "../controladores/grupo.controlador.php";
require_once "../modelos/grupo.modelo.php";

class AjaxGrupo{

	/*=============================================
	EDITAR GRUPO
	=============================================*/	

	public $idGrupo;
 
	public function ajaxEditarGrupo(){

		$item = "ID_GRUPO";
		$valor = $this->idGrupo;

		$respuesta = ControladorGrupo::ctrMostrarGrupo($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR GRUPO
=============================================*/
if(isset($_POST["idGrupo"])){

	$editar = new AjaxGrupo();
	$editar -> idGrupo = $_POST["idGrupo"];
	$editar -> ajaxEditarGrupo();

}

