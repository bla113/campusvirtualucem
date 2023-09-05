<?php

require_once "../controladores/materia.controlador.php";
require_once "../controladores/asignarMateria.controlador.php";
require_once "../modelos/asignarMateria.modelo.php";
require_once "../modelos//materia.modelo.php";

class AjaxMateriaPlan{

	/*=============================================
	Agregar Materia Plan
	=============================================*/	

	public $idMateria;
	public $IdCarrera;
	public $IdPlanCarrera;
	public $Orden;
	public $Periodo;
 
	public function ajaxAgregarMateriaPlan(){

		$idMateria = $this->idMateria;

		$IdCarrera =$this->IdCarrera;

		$IdPlanCarrera=$this->IdPlanCarrera;

		$Orden=$this->Orden;

		$Periodo=$this->Periodo;

		$tabla = 'materias_plan_carrera';

		$datos=[
			'ID_PLAN_CARRERA'=>$IdPlanCarrera,
			'ID_CARRERA'=>$IdCarrera,
			'MATERIAS'=>$idMateria,
			'ORDEN'=>$Orden,
			'PERIODO'=>$Periodo,
		];

		$respuesta=ModeloAsignarMaterias::mdlAsignarMaterias($tabla,$datos);


			echo json_encode($respuesta);

			/*$tabla= 'vista_materias_del_plan_carrera';

			$item1='ID_CARRERA';

			$item2='ID_PLAN_CARRERA';


			$valor1=$IdCarrera;

			$valor2=$IdPlanCarrera;
			
			$respuesta=ModeloAsignarMaterias::mdMostrarMateriasPlanCarreraSeleccionadas($tabla, $item1, $valor1,$item2,$valor2);*/
			
			
		
	}
//EsteBloque Muestra la Materia en el Modal//
	public function ajaxElegirMateriaPlan(){

		$item = "ID_MATERIA";

		$valor = $this->idMateria;

		$respuesta =ControladorMateria::ctrMostrarMateria($item, $valor);

		echo json_encode($respuesta);

	}


	

	
}

/*=============================================
AGREGAR MATERIA
=============================================*/

if(isset($_POST["idMateriaSleccionada"])){

	$agregar = new AjaxMateriaPlan();
	$agregar -> idMateria = $_POST["idMateriaSleccionada"];
	$agregar -> IdCarrera = $_POST["IdCarrera"];
	$agregar -> IdPlanCarrera = $_POST["IdPlanCarrera"];
	$agregar -> Orden = $_POST["Orden"];
	$agregar -> Periodo = $_POST["Periodo"];
	
	$agregar -> ajaxAgregarMateriaPlan();

}

//EsteBloque Muestra la Materia en el Modal//
if(isset($_POST["idMateria"])){

	$agregar = new AjaxMateriaPlan();
	$agregar -> idMateria = $_POST["idMateria"];
	
	
	$agregar -> ajaxElegirMateriaPlan();

}
//EsteBloque Muestra la Materia en el Modal//


	
