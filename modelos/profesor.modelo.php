<?php

require_once "conexion.php";

class ModeloProfesor{

	/*=============================================
	CREAR AULA
	=============================================*/

	static public function mdlCrearProfesor($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOMBRE_COMPLETO,
																PRIMER_APELLIDO,
																SEGUNDO_APELLIDO,
																TIPO_IDENTIFICACION,
																IDENTIFICACION_PROFESOR,
																PROVINCIA_PROFESOR,
																CANTON_PROFESOR,
																DISTRITO_PROFESOR,
																OTRAS_SENAS_PROFESOR,
																CELULAR_PROFESOR,
																CORREO_PROFESOR)
																 VALUES (
																:NOMBRE_COMPLETO,
																:PRIMER_APELLIDO,
																:SEGUNDO_APELLIDO,
																:TIPO_IDENTIFICACION,
																:IDENTIFICACION_PROFESOR,
																:PROVINCIA_PROFESOR,
																:CANTON_PROFESOR,
																:DISTRITO_PROFESOR,
																:OTRAS_SENAS_PROFESOR,
																:CELULAR_PROFESOR,
																:CORREO_PROFESOR
																)");

		$stmt->bindParam(":NOMBRE_COMPLETO", $datos['NOMBRE_COMPLETO'], PDO::PARAM_STR);
		$stmt->bindParam(":PRIMER_APELLIDO", $datos['PRIMER_APELLIDO'], PDO::PARAM_STR);
		$stmt->bindParam(":SEGUNDO_APELLIDO", $datos['SEGUNDO_APELLIDO'], PDO::PARAM_STR);
		$stmt->bindParam(":TIPO_IDENTIFICACION", $datos['TIPO_IDENTIFICACION'], PDO::PARAM_INT);
		$stmt->bindParam(":IDENTIFICACION_PROFESOR", $datos['IDENTIFICACION_PROFESOR'], PDO::PARAM_STR);
		$stmt->bindParam(":PROVINCIA_PROFESOR", $datos['PROVINCIA_PROFESOR'], PDO::PARAM_STR);
		$stmt->bindParam(":CANTON_PROFESOR", $datos['CANTON_PROFESOR'], PDO::PARAM_STR);
		$stmt->bindParam(":DISTRITO_PROFESOR", $datos['DISTRITO_PROFESOR'], PDO::PARAM_STR);
		$stmt->bindParam(":OTRAS_SENAS_PROFESOR", $datos['OTRAS_SENAS_PROFESOR'], PDO::PARAM_STR);
		$stmt->bindParam(":CELULAR_PROFESOR", $datos['CELULAR_PROFESOR'], PDO::PARAM_STR);
		$stmt->bindParam(":CORREO_PROFESOR", $datos['CORREO_PROFESOR'], PDO::PARAM_STR);

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

	static public function mdlMostrarProfesor($tabla, $item, $valor){

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

	static public function mdlEditarProfesor($tabla, $datos){
		
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
	BORRAR PROFESOR
	=============================================*/

	static public function mdlBorrarProfesor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE  ID_PROFESOR = :ID_PROFESOR");

		$stmt -> bindParam(":ID_PROFESOR", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> closeCursor();

		$stmt = null;

	}

}

