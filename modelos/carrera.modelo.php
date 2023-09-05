<?php

require_once "conexion.php";

class ModeloCarrera{

	/*=============================================
	CREAR CARRERA
	=============================================*/

	static public function mdlIngresarCarrera($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(CODIGO_CARRERA,NOM_CARRERA) VALUES (:CODIGO_CARRERA,:NOM_CARRERA)");

		$stmt->bindParam(":CODIGO_CARRERA", $datos['COD_CARRERA'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_CARRERA", $datos['NOM_CARRERA'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		//$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CARRERA
	=============================================*/

	static public function mdlMostrarCarrera($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		//$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CARRERA
	=============================================*/

	static public function mdlEditarCarrera($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET CODIGO_CARRERA = :CODIGO_CARRERA,NOM_CARRERA=:NOM_CARRERA WHERE ID_CARRERA = :ID_CARRERA");

		$stmt -> bindParam(":CODIGO_CARRERA", $datos["CODIGO_CARRERA"], PDO::PARAM_STR);
		$stmt -> bindParam(":NOM_CARRERA", $datos["NOM_CARRERA"], PDO::PARAM_STR);
		$stmt -> bindParam(":ID_CARRERA", $datos["ID_CARRERA"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		//$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CARRERA
	=============================================*/

	static public function mdlBorrarCarrera($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_CARRERA = :ID_CARRERA");

		$stmt -> bindParam(":ID_CARRERA", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		//$stmt -> close();

		$stmt = null;

	}

}

