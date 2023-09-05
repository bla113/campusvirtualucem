<?php

require_once "conexion.php";
 
class ModeloPlanCarrera{

	/*=============================================
	CREAR CARRERA
	=============================================*/

	static public function mdlIngresarPlanCarrera($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(COD_PLAN_CARRERA,NOM_PLAN,ID_CARRERA,CREDITOS,PERIODOS,FECHA_CREACION) VALUES (:COD_PLAN_CARRERA,:NOM_PLAN,:ID_CARRERA,:CREDITOS,:PERIODOS,:FECHA_CREACION)");
		$stmt->bindParam(":FECHA_CREACION", $datos['FECHA_CREACION'], PDO::PARAM_INT);
		$stmt->bindParam(":COD_PLAN_CARRERA", $datos['COD_PLAN_CARRERA'], PDO::PARAM_STR);
		$stmt->bindParam(":NOM_PLAN", $datos['NOM_PLAN'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_CARRERA", $datos['ID_CARRERA'], PDO::PARAM_INT);
		$stmt->bindParam(":CREDITOS", $datos['CREDITOS'], PDO::PARAM_STR);
		$stmt->bindParam(":PERIODOS", $datos['PERIODOS'], PDO::PARAM_STR);
		


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

	static public function mdlMostrarPlanCarrera($tabla, $item, $valor){

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

	static public function mdlEditarPlanCarrera($tabla, $datos){
		
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

	static public function mdlBorrarPlanCarrera($tabla, $datos){

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


	/*=============================================
	MOSTRAR CARRERA
	=============================================*/

	static public function mdlMostrarMateriasPlanCarrera($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT ID_MATERIA FROM $tabla WHERE $item = :$item");

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

}

