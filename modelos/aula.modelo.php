<?php

require_once "conexion.php";

class ModeloAula{

	/*=============================================
	CREAR AULA
	=============================================*/

	static public function mdlIngresarAula($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(COD_AULA,NOM_AULA,CAP_AULA) VALUES (:COD_AULA,:NOM_AULA,:CAP_AULA)");

		$stmt->bindParam(":COD_AULA", $datos['COD_AULA'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_AULA", $datos['NOM_AULA'], PDO::PARAM_STR);
		$stmt->bindParam(":CAP_AULA", $datos['CAP_AULA'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR AULA
	=============================================*/

	static public function mdlMostrarAula($tabla, $item, $valor){

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

	static public function mdlBorrarAula($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_AULA = :ID_AULA");

		$stmt -> bindParam(":ID_AULA", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> closeCursor();

		$stmt = null;

	}

}

