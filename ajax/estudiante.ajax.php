<?php

require_once "../controladores/estudiante.controlador.php";
require_once "../controladores/asignarPlanEstudiante.controlador.php";
require_once "../modelos/estudiante.modelo.php";
require_once "../modelos/asignarPlanEstudiante.modelo.php";

class AjaxEstudiante
{

	/*=============================================
	EDITAR ESTUDIANTE
	=============================================*/

	public $idEstudiante;



	public function ajaxEditarEstudiante()
	{

		$item = "ID_ESTUDIANTE";
		$valor = $this->idEstudiante;

		$respuesta = ControladorEstudiante::ctrMostrarEstudiante($item, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/

	public $activarEstudiante;
	public $activarId;


	public function ajaxActivarEstudiante()
	{

		$tabla = "estudiante";

		$item1 = "ESTADO";
		$valor1 = $this->activarEstudiante;

		$item2 = "ID_ESTUDIANTE";
		$valor2 = $this->activarId;

		$respuesta = ModeloEstudiante::mdlActualizarEstudiante($tabla, $item1, $valor1, $item2, $valor2);
	}

	/*=============================================
	VALIDAR NO REPETIR ESTUDIANTE
	=============================================*/

	public $validarIdentificacion;

	public function ajaxValidarIdentificicacion()
	{

		$item = "IDENTIFICACION_ESTUDIANTE";
		$valor = $this->validarIdentificacion;

		$respuesta = ControladorEstudiante::ctrMostrarEstudiante($item, $valor);

		echo json_encode($respuesta);
	}




	/*=============================================
	ASIGNAR MATERIAS DEL PLAN DE CARRERA
	=============================================*/
	public $IdEstudiantePlan;
	public $idPlanCarrera;

	public function ajaxAsignarMateriasEstudiante()
	{

		$IdEstudiante = $this->IdEstudiantePlan;
		$IdPlanCarrera = $this->idPlanCarrera;



		$respuesta = ControladorAsiganrPlanEstudiante::ctrAsignarPlanEstudiante($IdPlanCarrera, $IdEstudiante);

		echo json_encode($respuesta);
	}

	/*=============================================
	BUSCAR IDENTIFICACION
	=============================================*/
	public $Identificacion;

	public function ajaxBuscarIdentificacion()
	{

		$valor = $this->Identificacion;

		$tabla = "padron_electoral";

		$item = "IDENTIFICACION";

		$respuesta = ModeloEstudiante::mdlBuscarIdentificacion($tabla, $item, $valor);


		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR ESTUDIANTE
=============================================*/
if (isset($_POST["idEstudiante"])) {

	$editar = new AjaxEstudiante();
	$editar->idEstudiante = $_POST["idEstudiante"];
	$editar->ajaxEditarEstudiante();
}

/*=============================================
ACTIVAR USUARIO
=============================================*/

if (isset($_POST["activarEstudiante"])) {

	$activarEstudiante = new AjaxEstudiante();
	$activarEstudiante->activarEstudiante = $_POST["activarEstudiante"];
	$activarEstudiante->activarId = $_POST["activarId"];
	$activarEstudiante->ajaxActivarEstudiante();
}

/*=============================================
VALIDAR NO REPETIR ESTUDIANTE
=============================================*/

if (isset($_POST["validarIdentificacion"])) {

	$valIdentificacion = new AjaxEstudiante();
	$valIdentificacion->validarIdentificacion = $_POST["validarIdentificacion"];
	$valIdentificacion->ajaxValidarIdentificicacion();
}


/*=============================================
ASIGNAR LAS MATERIAS DEL PLAN DE CARREA
=============================================*/

if (isset($_POST["idEstudiantePlan"])) {

	$asignar = new AjaxEstudiante();
	$asignar->IdEstudiantePlan = $_POST["idEstudiantePlan"];
	$asignar->idPlanCarrera = $_POST["idPlanCarrera"];
	$asignar->ajaxAsignarMateriasEstudiante();
}


if (isset($_POST["numeroIdentificacion"])) {

	$buscar = new AjaxEstudiante();
	$buscar->Identificacion = $_POST["numeroIdentificacion"];
	$buscar->ajaxBuscarIdentificacion();
}
