<?php

require_once "../controladores/cursos.controlador.php";
require_once "../modelos/cursos.modelo.php";

class AjaxCursos{

	/*=============================================
	MOSTRAR ESTUDIANTES DEL CURSO MATRICULDO
	=============================================*/	

	public $idCursoEstudiante;
 
	public function ajaxMostrarestudiantescurso(){

		$item = "ID_HORARIO_OFERTA";

		$valor = $this->idCursoEstudiante;

		$respuesta =ControladorCursos::ctrMostrarEstudiantesCursos($item, $valor);

		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
MOSTRAR ESTUDIANTES DEL CURSO MATRICULDO
=============================================*/
if(isset($_POST["idCursoEstudiante"])){

	$mostrar = new AjaxCursos();
	$mostrar -> idCursoEstudiante = $_POST["idCursoEstudiante"];
	$mostrar -> ajaxMostrarestudiantescurso();

}

