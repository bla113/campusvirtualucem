<?php

require_once "conexion.php";

class ModeloMatricula
{

	/*=============================================
	CREAR PREMATRICULA
	=============================================*/

	static public function mdlIngresarPrematricula($tabla, $datos)
	{



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_HORARIO_OFERTA,ID_ESTUDIANTE,ID_MATERIA) VALUES (:ID_HORARIO_OFERTA,:ID_ESTUDIANTE,:ID_MATERIA)");

		$stmt->bindParam(":ID_HORARIO_OFERTA", $datos['ID_HORARIO_OFERTA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_ESTUDIANTE", $datos['ID_ESTUDIANTE'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_MATERIA", $datos['ID_MATERIA'], PDO::PARAM_INT);

		if ($stmt->execute()) {

			$mesaje = [
				"Mensaje" => "Ok"
			];

			return $mesaje;
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}
	/*=============================================
	CREAR MATRICULA ESTUDIANTE
	=============================================*/
	static public function mdlCrearMatricula($tabla, $datos)
	{


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_ESTUDIANTE,
																  MATERIAS,
																  ID_PERIODO,
																  SUB_TOTAL,
																  DESCUENTO,
																  SALDO,
																  TOTAL_MATRICULA,
																  ID_METODO_PAGO,
																  COMPROBANTE_MATRICULA,
																  ID_USUARIO)
																 VALUES
																(:ID_ESTUDIANTE,
																:MATERIAS,
																:ID_PERIODO,
																:SUB_TOTAL,
																:DESCUENTO,
																:SALDO,
																:TOTAL_MATRICULA,
																:ID_METODO_PAGO,
																:COMPROBANTE_MATRICULA,
																:ID_USUARIO)");

		$stmt->bindParam(":ID_ESTUDIANTE", $datos['ID_ESTUDIANTE'], PDO::PARAM_INT);
		$stmt->bindParam(":MATERIAS", $datos['MATERIAS'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_PERIODO", $datos['ID_PERIODO'], PDO::PARAM_INT);
		$stmt->bindParam(":SUB_TOTAL", $datos['SUB_TOTAL'], PDO::PARAM_INT);
		$stmt->bindParam(":DESCUENTO", $datos['DESCUENTO'], PDO::PARAM_INT);
		$stmt->bindParam(":SALDO", $datos['SALDO'], PDO::PARAM_INT);
		$stmt->bindParam(":TOTAL_MATRICULA", $datos['TOTAL_MATRICULA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_METODO_PAGO", $datos['ID_METODO_PAGO'], PDO::PARAM_INT);
		$stmt->bindParam(":COMPROBANTE_MATRICULA", $datos['COMPROBANTE_MATRICULA'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_USUARIO", $datos['ID_USUARIO'], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

			//return $mesaje;
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}




	/*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIATE
	=============================================*/

	/*static public function mdlMostrarPrematriculaPorEstudiante($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		}

		

		$stmt = null;

	}*/

	/*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIATE
	=============================================*/

	static public function mdlMostrarPrematriculaPorEstudiante($tabla, $item1, $valor1, $valor2, $item2)
	{

		if ($item1 != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 ");

			$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
			$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		}



		$stmt = null;
	}


	/*=============================================
	CONSULTAR COSOTOS UCEM
	=============================================*/

	static public function mdlConsultarCostos($tabla, $item, $valor)
	{



		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->closeCursor();




		$stmt = null;
	}

	/*=============================================
	MOSTRAR COMPROBANTE
	=============================================*/
	static public function mdlMostrarMostrarComprobante($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT COMPROBANTE_MATRICULA,ID_MATRICULA,NOMBRE_COMPLETO,PRIMER_APELLIDO,SEGUNDO_APELLIDO,NUM_CARNE,IDENTIFICACION_ESTUDIANTE FROM $tabla WHERE $item = :$item ");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		}



		$stmt = null;
	}

	/*=============================================
	CAMBIAR ESTADO MATRICULA 
	=============================================*/

	static public function mdlCambiarEstadoMatricula($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ESTADO_MATRICULA = :ESTADO_MATRICULA WHERE ID_MATRICULA = :ID_MATRICULA");

		$stmt->bindParam(":ESTADO_MATRICULA", $datos['ESTADO_MATRICULA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_MATRICULA", $datos['ID_MATRICULA'], PDO::PARAM_INT);



		if ($stmt->execute()) {
			$respuesta = [
				'mensaje' => 'ok'
			];
			return $respuesta;
		} else {

			$respuesta = [
				'mensaje' => 'false'
			];
			return $respuesta;
		}

		$stmt->closeCursor();
		$stmt = null;
	}


	/*=============================================
	SELECCIONAR TODOS LOS ID DE HORARIOS MATRICULADOS POR ESTUDIANTE
	=============================================*/
	static public function mdlMostrarIdHorariosMtricula($tabla, $item1,  $valor1, $item3, $valor3)
	{

		$stmt = Conexion::conectar()->prepare("SELECT (ID_HORARIO_OFERTA) FROM $tabla WHERE $item1 = :$item1 and   $item3 = :$item3 ");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
		//$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
		$stmt->bindParam(":" . $item3, $valor3, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetchAll();
	}



	static public function mdlEditarAula($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET COD_AULA = :COD_AULA,NOM_AULA=:NOM_AULA,CAP_AULA =:CAP_AULA WHERE ID_AULA = :ID_AULA");

		$stmt->bindParam(":COD_AULA", $datos['COD_AULA'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_AULA", $datos['NOM_AULA'], PDO::PARAM_STR);
		$stmt->bindParam(":CAP_AULA", $datos['CAP_AULA'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_AULA", $datos["ID_AULA"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}

	/*=============================================
	BORRAR AULA
	=============================================*/

	static public function mdlBorrarAula($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_AULA = :ID_AULA");

		$stmt->bindParam(":ID_AULA", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();

		$stmt = null;
	}


	/*=============================================
	BORRAR DETALLE DE MATRICULA
	=============================================*/

	static public function BorrarDetalle($tabla, $valor)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_DETALLE_MATRICULA = :ID_DETALLE_MATRICULA");

		$stmt->bindParam(":ID_DETALLE_MATRICULA", $valor, PDO::PARAM_INT);

		if ($stmt->execute()) {

			$respuesta = [
				"mensaje" => "Eliminiado Correctamente"
			];

			return $respuesta;
		} else {

			return "error";
		}

		$stmt->closeCursor();

		$stmt = null;
	}


	/*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIATE PARA MATRICULAR
	=============================================*/

	static public function mdlMostrarPrematriculaPorEstudianteParaMatricular($tabla, $item1, $valor1, $valor2, $item2)
	{

		if ($item1 != null) {

			$stmt = Conexion::conectar()->prepare("SELECT NOM_MATERIA,CREDITOS,ID_HORARIO_OFERTA,ID_MATERIA FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 ");

			$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
			$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		}



		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR ESTADO DEL DETALLE DE MATRICULA
	=============================================*/

	static public function mdlActualizarEstadodetalleMatricula($valor)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE vista_detalle_matricula SET DETALLE_ESTADO=2 WHERE ID_DETALLE_MATRICULA =:ID_DETALLE_MATRICULA");

		$stmt->bindParam(":ID_DETALLE_MATRICULA", $valor, PDO::PARAM_INT);
		//$stmt->bindParam(":ID_DETALLE_MATRICULA", 2, PDO::PARAM_INT);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}


	/*=============================================
	MOSTRAR TODAS MATRICULAS
	=============================================*/
	static public function mdlMostrarMatriculas($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		}



		$stmt = null;
	}


	/*=============================================
	MOSTRAR  MATRICULAS POR ESTUDIANTE PARA AGREGAR AL CURSO VIRTUAL
	=============================================*/
	static public function mdlMostrarMatriculasParaCursoVirtual($tabla, $item, $valor)
	{

		
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt->bindParam(":" .$item, $valor, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		



		$stmt = null;
	}


	/*=============================================
	BUSCAR ESTUDIANTE PARA MATRICULAR
	=============================================*/
	static public function mdlBuscarEstudianteParaMatricular($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT ID_ESTUDIANTE,ID_PLAN_CARRERA,ID_CARRERA FROM $tabla WHERE $item = :$item ");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		}



		$stmt = null;
	}

	/*=============================================
	INSCRIBIR ESTUDIANTE A UN GRUPO DEL HORARI ESTABLECIDO
	=============================================*/

	static public function mdlAsiganarCursoEstudiante($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_ESTUDIANTE,ID_HORARIO_OFERTA) VALUES (:ID_ESTUDIANTE,:ID_HORARIO_OFERTA)");

		$stmt->bindParam(":ID_ESTUDIANTE", $datos['ID_ESTUDIANTE'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_HORARIO_OFERTA", $datos['ID_HORARIO_OFERTA'], PDO::PARAM_INT);

		if ($stmt->execute()) {

			$mesaje = [
				"Mensaje" => "Estudiante Asociado al los cursos"
			];

			return $mesaje;
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}

   /*=============================================
	CAMBIAR EL ESTADO DE LA MATERIA ESTUDIATE
	=============================================*/

	static public function mdlCambiarEstadoMateriaEstudiante($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ID_ESTADO_MATERIA=3 WHERE ID_ESTUDIANTE = :ID_ESTUDIANTE AND ID_MATERIA = :ID_MATERIA");
		
		$stmt->bindParam(":ID_ESTUDIANTE", $datos['ID_ESTUDIANTE'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_MATERIA", $datos['ID_MATERIA'], PDO::PARAM_INT);
		

		
		if ($stmt->execute()) {

			$mesaje = [
				"Mensaje" => "ok"
			];

			return $mesaje;
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR MATRICULAS PARA APLICAR PAGO
	=============================================*/


	static public function mdlMostrarMatriculasParaAplicarPago($tabla, $item, $valor)
	{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->closeCursor();
	}


	/*=============================================
	RESTAR CAPACIDAD AL HORARIO OFERTADO
	=============================================*/



	static public function mdlRestarCapacidadHorarioOfertado($tabla, $item, $valor)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET CAPACIDAD = CAPACIDAD - 1 WHERE $item = :$item ");

		$stmt->bindParam(":" .$item, $valor, PDO::PARAM_INT);

		if ($stmt->execute()) {

			$mesaje = [
				"Mensaje" => "Ok"
			];

			return $mesaje;
		} else {

			return "error";
		}

		
		$stmt->closeCursor();
	}


	/*=============================================
	MOSTRAR  MATRICULAS PDF
	=============================================*/
	static public function mdlMostrarMatriculasPDF($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		}



		$stmt = null;
	}

}
