<?php

require_once "conexion.php";

class ModeloAsignarMaterias{

	/*=============================================
	CREAR AULA
	=============================================*/

	static public function mdlAsignarMaterias($tabla, $datos){
		
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_PLAN_CARRERA,ID_CARRERA,MATERIAS,ORDEN,PERIODO) VALUES (:ID_PLAN_CARRERA,:ID_CARRERA,:MATERIAS,:ORDEN,:PERIODO)");

		$stmt->bindParam(":ID_PLAN_CARRERA", $datos['ID_PLAN_CARRERA'], PDO::PARAM_INT);
		$stmt->bindParam(":ID_CARRERA", $datos['ID_CARRERA'], PDO::PARAM_INT);
		$stmt->bindParam(":MATERIAS", $datos['MATERIAS'], PDO::PARAM_INT);
		$stmt->bindParam(":PERIODO", $datos['PERIODO'], PDO::PARAM_INT);
		$stmt->bindParam(":ORDEN", $datos['ORDEN'], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}



	static public function mdMostrarMateriasPlnCarrera($tabla, $item, $valor){

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


	static public function mdMostrarMateriasPlanCarreraSeleccionadas($tabla, $item1, $valor1,$item2,$valor2){

		if($item1 != null && $item2 !=null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2=:$item2");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_INT);
			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();
           
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		}

		

		$stmt = null;

	}
}