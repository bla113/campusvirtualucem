<?php

require_once "conexion.php";

class ModeloGrupo{

	/*=============================================
	CREAR GRUPO
	=============================================*/

	static public function mdlIngresarGrupo($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOM_GRUPO,COD_GRUPO) VALUES (:NOM_GRUPO,:COD_GRUPO)");

		$stmt->bindParam(":NOM_GRUPO", $datos['NOM_GRUPO'], PDO::PARAM_STR);
		$stmt->bindParam(":COD_GRUPO", $datos['COD_GRUPO'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
        
		$stmt = null;

	}

	/*=============================================
	MOSTRAR GRUPO
	=============================================*/

	static public function mdlMostrarGrupo($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		//$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR GRUPO
	=============================================*/

	static public function mdlEditarGrupo($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOM_GRUPO = :NOM_GRUPO,COD_GRUPO=:COD_GRUPO WHERE ID_GRUPO = :ID_GRUPO");

		$stmt -> bindParam(":NOM_GRUPO", $datos["NOM_GRUPO"], PDO::PARAM_STR);
		$stmt -> bindParam(":COD_GRUPO", $datos["COD_GRUPO"], PDO::PARAM_STR);
		$stmt -> bindParam(":ID_GRUPO", $datos["ID_GRUPO"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		//$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR GRUPO
	=============================================*/

	static public function mdlBorrarGrupo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_GRUPO = :ID_GRUPO");

		$stmt -> bindParam(":ID_GRUPO", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		//$stmt -> close();

		$stmt = null;

	}

}

