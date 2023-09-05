<?php

require_once "conexion.php";

class ModeloMateria{

	/*=============================================
	CREAR MATERIA
	=============================================*/

	static public function mdlIngresarMateria($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(COD_MATERIA,NOM_MATERIA,ID_GRUPO,CREDITOS,COD_REQUISITO) VALUES (:COD_MATERIA,:NOM_MATERIA,:ID_GRUPO,:CREDITOS,:COD_REQUISITO)");

		$stmt->bindParam(":COD_MATERIA", $datos['COD_MATERIA'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_MATERIA", $datos['NOM_MATERIA'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_GRUPO", $datos['ID_GRUPO'], PDO::PARAM_INT);
		$stmt->bindParam(":CREDITOS", $datos['CREDITOS'], PDO::PARAM_STR);
		$stmt->bindParam(":COD_REQUISITO", $datos['COD_REQUISITO'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR MATERIA
	=============================================*/

	static public function mdlMostrarMateria($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
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
	EDITAR MATERIA
	=============================================*/


	static public function mdlMostrarMateriaPorGrupo($tabla, $item, $valor){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		

		

	}

	/*=============================================
	EDITAR MATERIA
	=============================================*/

	static public function mdlEditarMateria($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET COD_MATERIA = :COD_MATERIA,
																NOM_MATERIA=:NOM_MATERIA,
																ID_GRUPO =:ID_GRUPO,
																CREDITOS = :CREDITOS,
																COD_REQUISITO = :COD_REQUISITO
															 WHERE ID_MATERIA = :ID_MATERIA");

		$stmt->bindParam(":COD_MATERIA", $datos['COD_MATERIA'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_MATERIA", $datos['NOM_MATERIA'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_GRUPO", $datos['ID_GRUPO'], PDO::PARAM_INT);
		$stmt->bindParam(":CREDITOS", $datos['CREDITOS'], PDO::PARAM_STR);
		$stmt->bindParam(":COD_REQUISITO", $datos['COD_REQUISITO'], PDO::PARAM_STR);
		$stmt -> bindParam(":ID_MATERIA", $datos["ID_MATERIA"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	BORRAR MATERIA
	=============================================*/

	static public function mdlBorrarMateria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_MATERIA = :ID_MATERIA");

		$stmt -> bindParam(":ID_MATERIA", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> closeCursor();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR MATERIAS APROBADAS
	=============================================*/

	static public function mdlMostrarMateriasAprobadas($tabla,$item1, $valor1,$item2,$valor2){

		if($item1 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 and  $item2 = :$item2");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		}
		

		

		$stmt = null;

	}

	

}

