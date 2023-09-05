<?php

require_once "../controladores//materia.controlador.php";
require_once "../modelos/materia.modelo.php";

class AjaxMateria{

	/*=============================================
	EDITAR MATERIA
	=============================================*/	

	public $idMateria;
	
 
	public function ajaxEditarMateria(){

		$item = "ID_MATERIA";
		$valor = $this->idMateria;

		$respuesta =ControladorMateria::ctrMostrarMateria($item, $valor);

		

		echo json_encode($respuesta);

	}

	public $idGrupo;
	public function ajaxTraerMateriaPorGrupo(){

		$item = "ID_GRUPO";

		$valor = $this->idGrupo;

		$respuesta =ControladorMateria::ctrMostrarMateriaPorGrupo($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
EDITAR MATERIA
=============================================*/
if(isset($_POST["idMateria"])){

	$editar = new AjaxMateria();
	$editar -> idMateria = $_POST["idMateria"];
	$editar -> ajaxEditarMateria();

}

/*=============================================
TRAER MATERIAS POR GRUPO
=============================================*/
if(isset($_POST["idGrupo"])){

	$consultar = new AjaxMateria();
	$consultar -> idGrupo = $_POST["idGrupo"];
	$consultar -> ajaxTraerMateriaPorGrupo();

}