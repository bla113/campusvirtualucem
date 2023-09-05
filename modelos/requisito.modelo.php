<?php

require_once "conexion.php";

class ModeloRequsito{

	/*=============================================
	CREAR REQUISITOS
	=============================================*/

	static public function mdlIngresarRequsito($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_MATERIA,ID_CARRERA,ID_PLAN_CARRERA) VALUES (:ID_MATERIA,:ID_CARRERA,:ID_PLAN_CARRERA)");

		$stmt->bindParam(":ID_MATERIA", $datos['ID_MATERIA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_CARRERA", $datos['ID_CARRERA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_PLAN_CARRERA", $datos['ID_PLAN_CARRERA'], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR REQUISITOS
	=============================================*/

	static public function mdlMostrarRequsito($tabla, $item, $valor){

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
	EDITAR REQUISITOS
	=============================================*/

	static public function mdlEditarRequsito($tabla, $datos){
      
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ID_MATERIA = :ID_MATERIA,ID_CARRERA = :ID_CARRERA,ID_PLAN_CARRERA =:ID_PLAN_CARRERA WHERE ID_REQUISITO = :ID_REQUISITO");

		$stmt->bindParam(":ID_MATERIA", $datos['ID_MATERIA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_CARRERA", $datos['ID_CARRERA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_PLAN_CARRERA", $datos['ID_PLAN_CARRERA'], PDO::PARAM_INT);
		$stmt -> bindParam(":ID_REQUISITO", $datos["ID_REQUISITO"], PDO::PARAM_INT);

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

	static public function mdlBorrarRequsito($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_REQUISITO = :ID_REQUISITO");

		$stmt -> bindParam(":ID_REQUISITO", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> closeCursor();

		$stmt = null;

	}

}

