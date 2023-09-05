<?php

require_once "conexion.php";

class ModeloExamen{

	/*=============================================
	CREAR EXAMEN
	=============================================*/

	static public function mdlIngresarExamen($tabla, $datos){
		
		
      
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_HORARIO_OFERTA,
                                                                    ID_MATERIA,
                                                                    NOMBRE_EXAMEN,
                                                                    PESO_NOTA,
                                                                    FECHA_INICIO,
                                                                    FECHA_FINAL,
                                                                    INTENTOS,
																	PUNTAJE_MINIMO) 
                                                                    VALUES
                                                                   (:ID_HORARIO_OFERTA,
                                                                    :ID_MATERIA,
                                                                    :NOMBRE_EXAMEN,
                                                                    :PESO_NOTA,
                                                                    :FECHA_INICIO,
                                                                    :FECHA_FINAL,
                                                                    :INTENTOS,
																	:PUNTAJE_MINIMO)");

		$stmt->bindParam(":ID_HORARIO_OFERTA", $datos['ID_HORARIO_OFERTA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_MATERIA", $datos['ID_MATERIA'], PDO::PARAM_INT);
		$stmt->bindParam(":NOMBRE_EXAMEN", $datos['NOMBRE_EXAMEN'], PDO::PARAM_STR);
		$stmt->bindParam(":PESO_NOTA", $datos['PESO_NOTA'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_INICIO", $datos['FECHA_INICIO'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_FINAL", $datos['FECHA_FINAL'], PDO::PARAM_STR);
		$stmt->bindParam(":INTENTOS", $datos['INTENTOS'], PDO::PARAM_INT);
		$stmt->bindParam(":PUNTAJE_MINIMO", $datos['PUNTAJE_MINIMO'], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR EXAMENES
	=============================================*/

	static public function mdlMostrarExamen($tabla, $item, $valor){

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

	}

	/*=============================================
	EDITAR AULA
	=============================================*/

	static public function mdlEditarAula($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET COD_AULA = :COD_AULA,NOM_AULA=:NOM_AULA,CAP_AULA =:CAP_AULA WHERE ID_AULA = :ID_AULA");

		$stmt->bindParam(":COD_AULA", $datos['COD_AULA'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_AULA", $datos['NOM_AULA'], PDO::PARAM_STR);
		$stmt->bindParam(":CAP_AULA", $datos['CAP_AULA'], PDO::PARAM_STR);
		$stmt -> bindParam(":ID_AULA", $datos["ID_AULA"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	BORRAR AULA
	=============================================*/

	static public function mdlBorrarExamen($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_EXAMEN = :ID_EXAMEN");

		$stmt -> bindParam(":ID_EXAMEN", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> closeCursor();

		$stmt = null;

	}

}

