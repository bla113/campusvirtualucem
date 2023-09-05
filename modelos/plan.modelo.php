<?php

require_once "conexion.php";

class ModeloPlan{

	/*=============================================
	CREAR CARRERA
	=============================================*/

	static public function mdlIngresarPlan($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(COD_PLAN,NOM_PLAN,FECHA_PLAN) VALUES (:COD_PLAN,:NOM_PLAN,:FECHA_PLAN)");

		$stmt->bindParam(":COD_PLAN", $datos['COD_PLAN'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_PLAN", $datos['NOM_PLAN'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_PLAN", $datos['FECHA_PLAN'], PDO::PARAM_STR);


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

	static public function mdlMostrarPlan($tabla, $item, $valor){

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
	EDITAR CARRERA
	=============================================*/

	static public function mdlEditarPlan($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET COD_PLAN = :COD_PLAN, NOM_PLAN = :NOM_PLAN, FECHA_PLAN = :FECHA_PLAN  WHERE ID_PLAN = :ID_PLAN");

		$stmt -> bindParam(":COD_PLAN", $datos["COD_PLAN"], PDO::PARAM_STR);
		$stmt -> bindParam(":NOM_PLAN", $datos["NOM_PLAN"], PDO::PARAM_STR);
		$stmt -> bindParam(":FECHA_PLAN", $datos["FECHA_PLAN"], PDO::PARAM_STR);
		$stmt -> bindParam(":ID_PLAN", $datos["ID_PLAN"], PDO::PARAM_INT);

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

	static public function mdlBorrarPlan($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_PLAN = :ID_PLAN");

		$stmt -> bindParam(":ID_PLAN", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		//$stmt -> close();

		$stmt = null;

	}

}

