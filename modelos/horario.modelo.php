<?php

require_once "conexion.php";

class ModeloHorario{

	/*=============================================
	CREAR HORARIO
	=============================================*/

	static public function mdlIngresaHorario($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(COD_HORARIO,NOM_HORARIO) VALUES (:COD_HORARIO,:NOM_HORARIO)");

		$stmt->bindParam(":COD_HORARIO", $datos['COD_HORARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_HORARIO", $datos['NOM_HORARIO'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR HORARIO
	=============================================*/

	static public function mdlMostrarHorario($tabla, $item, $valor){

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
	EDITAR HORARIO
	=============================================*/

	static public function mdlEditarHorario($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET COD_HORARIO = :COD_HORARIO,NOM_HORARIO=:NOM_HORARIO WHERE ID_HORARIO = :ID_HORARIO");

		$stmt->bindParam(":COD_HORARIO", $datos['COD_HORARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_HORARIO", $datos['NOM_HORARIO'], PDO::PARAM_STR);
		$stmt -> bindParam(":ID_HORARIO", $datos["ID_HORARIO"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	BORRAR HORARIO
	=============================================*/

	static public function mdlBorrarHorario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_HORARIO = :ID_HORARIO");

		$stmt -> bindParam(":ID_HORARIO", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> closeCursor();

		$stmt = null;

	}

}

