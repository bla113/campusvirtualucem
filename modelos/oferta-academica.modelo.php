<?php

require_once "conexion.php";

class ModeloOfertaAcademica
{

	/*=============================================
	CREAR HORARIO OFERTA ACDEMICA
	=============================================*/

	static public function mdlIngresarHorarioOfertaAcademica($tabla, $datos)
	{


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_GRUPO_HORARIO,
                                                                  ID_OFERTA,
                                                                  ID_MATERIA,
                                                                  ID_PROFESOR,
																  ID_AULA,
																  ID_HORARIO,
																  MODALIDAD,
																  DIA,
																  CAPACIDAD,
																  ID_PERIODO) 
                                                                VALUES (
                                                                  :ID_GRUPO_HORARIO,
                                                                  :ID_OFERTA,
                                                                  :ID_MATERIA,
                                                                  :ID_PROFESOR,
																  :ID_AULA,
																  :ID_HORARIO,
																  :MODALIDAD,
																  :DIA,
																  :CAPACIDAD,
																  :ID_PERIODO)");

		$stmt->bindParam(":ID_GRUPO_HORARIO", $datos['ID_GRUPO_HORARIO'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_OFERTA", $datos['ID_OFERTA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_MATERIA", $datos['ID_MATERIA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_PROFESOR", $datos['ID_PROFESOR'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_AULA", $datos['ID_AULA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_HORARIO", $datos['ID_HORARIO'], PDO::PARAM_INT);
		$stmt->bindParam(":MODALIDAD", $datos['MODALIDAD'], PDO::PARAM_STR);
		$stmt->bindParam(":DIA", $datos['DIA'], PDO::PARAM_STR);
		$stmt->bindParam(":CAPACIDAD", $datos['CAPACIDAD'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_PERIODO", $datos['ID_PERIODO'], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}
	/*=============================================
	CREAR  OFERTA ACDEMICA
	=============================================*/

	static public function mdlIngresarOfertaAcademica($tabla, $datos)
	{



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_GRUPO_MATERIA,
                                                                  ID_MATERIA,
                                                                  ID_PERIODO,
                                                                  TURNO_OFERTA) 
                                                                VALUES (
                                                                  :ID_GRUPO_MATERIA,
																  :ID_MATERIA,
                                                                  :ID_PERIODO,
                                                                  :TURNO_OFERTA)");

		$stmt->bindParam(":ID_GRUPO_MATERIA", $datos['ID_GRUPO_MATERIA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_MATERIA", $datos['ID_MATERIA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_PERIODO", $datos['ID_PERIODO'], PDO::PARAM_INT);
		$stmt->bindParam(":TURNO_OFERTA", $datos['TURNO_OFERTA'], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR AULA
	=============================================*/

	static public function mdlMostrarOfertaAcademica($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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
	EDITAR OFERTA ACDEMICA
	=============================================*/

	static public function mdlEditarOfertaAcademica($tabla, $datos)
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
	BORRAR OFERTA ACDEMICA
	=============================================*/

	static public function mdlBorrarHorarioMateriaOfertada($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_HORARIO_OFERTA = :ID_HORARIO_OFERTA");

		$stmt->bindParam(":ID_HORARIO_OFERTA", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();

		$stmt = null;
	}


	static public function mdlMostrarOfertaPorEstudiante($tabla, $item, $valor)
	{


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->closeCursor();
	}


	static public function mdlMostrarRequisitosEstudianteAprobados($tabla, $item, $item2, $valor, $valor2)
	{


		$stmt = Conexion::conectar()->prepare("SELECT (COD_MATERIA) FROM $tabla WHERE $item = :$item AND $item2 = :$item2");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->closeCursor();
	}


	static public function mdlMostrarHorariosOfertaAcademica($tabla, $item, $valor)
	{


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->closeCursor();
	}

	/*=============================================

		BORRAR OFERTA ACDEMICA
	=============================================*/

	static public function mdlMostrarGruposHorarios($tabla, $item, $valor)
	{
		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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
	}


	/*=============================================
	EDITAR HORARIO OFERTA ACDEMICA
	=============================================*/

	static public function mdlEditarHorarioOfertaAcademica($tabla, $datos)
	{


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ID_GRUPO_HORARIO= :ID_GRUPO_HORARIO,
																 ID_PROFESOR= :ID_PROFESOR,
																 ID_AULA= :ID_AULA,
																 ID_HORARIO= :ID_HORARIO,
																 MODALIDAD= :MODALIDAD,
																 DIA= :DIA,
																
																 ID_PERIODO= :ID_PERIODO WHERE 
																 ID_HORARIO_OFERTA= :ID_HORARIO_OFERTA");

		$stmt->bindParam(":ID_GRUPO_HORARIO", $datos['ID_GRUPO_HORARIO'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_PROFESOR", $datos['ID_PROFESOR'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_AULA", $datos['ID_AULA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_HORARIO", $datos['ID_HORARIO'], PDO::PARAM_INT);
		$stmt->bindParam(":MODALIDAD", $datos['MODALIDAD'], PDO::PARAM_STR);
		$stmt->bindParam(":DIA", $datos['DIA'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_PERIODO", $datos['ID_PERIODO'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_HORARIO_OFERTA", $datos['ID_HORARIO_OFERTA'], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}



		/*=============================================
	BORRAR OFERTA ACADEMICA
	=============================================*/

	static public function mdlBorrarOfertaAcademica($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_OFERTA = :ID_OFERTA");

		$stmt -> bindParam(":ID_OFERTA", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		//$stmt -> close();

		$stmt = null;

	}
}
