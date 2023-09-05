<?php

require_once "conexion.php";

class ModeloPeriodo
{

	/*=============================================
	MOSTRAR PERIODOS
	=============================================*/

	static public function mdlMostrarPeriodo($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}



		$stmt = null;
	}

/*=============================================
	MOSTRAR PERIODO ACTUAL
	=============================================*/


	static public function mdlPeriodoActual($tabla,$item){

		$stmt = Conexion::conectar()->prepare("SELECT MAX($item) from $tabla");

			$stmt->execute();

			return $stmt->fetch();

	}


	/*=============================================
	CREAR PERIODO
	=============================================*/
	static public function mdlCrearPeriodo($tabla, $datos)
	{



		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOM_PERIODO,
                                                                  COD_PERIODO,
                                                                  INICIO_PERIODO,
                                                                  FIN_PERIODO,
                                                                  INICIO_ORDINARIO,
                                                                  FIN_ORDINARIO,
                                                                  INICIO_EXTRAORDINARIO,
                                                                  FIN_EXTRAORDINARIO,
                                                                  FECHA_PAGO1,
                                                                  FECHA_PAGO2,
                                                                  FECHA_PAGO3,
                                                                  FECHA_PAGO4) 
                                                                  VALUES 
                                                                  (:NOM_PERIODO,
                                                                  :COD_PERIODO,
                                                                  :INICIO_PERIODO,
                                                                  :FIN_PERIODO,
                                                                  :INICIO_ORDINARIO,
                                                                  :FIN_ORDINARIO,
                                                                  :INICIO_EXTRAORDINARIO,
                                                                  :FIN_EXTRAORDINARIO,
                                                                  :FECHA_PAGO1,
                                                                  :FECHA_PAGO2,
                                	                              :FECHA_PAGO3,
                                                                  :FECHA_PAGO4
                                                                  )");

		$stmt->bindParam(":NOM_PERIODO", $datos['NOM_PERIODO'], PDO::PARAM_STR);
		$stmt->bindParam(":COD_PERIODO", $datos['COD_PERIODO'], PDO::PARAM_STR);
		$stmt->bindParam(":INICIO_PERIODO", $datos['INICIO_PERIODO'], PDO::PARAM_STR);
		$stmt->bindParam(":FIN_PERIODO", $datos['FIN_PERIODO'], PDO::PARAM_STR);
		$stmt->bindParam(":INICIO_ORDINARIO", $datos['INICIO_ORDINARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":FIN_ORDINARIO", $datos['FIN_ORDINARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":INICIO_EXTRAORDINARIO", $datos['INICIO_EXTRAORDINARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":FIN_EXTRAORDINARIO", $datos['FIN_EXTRAORDINARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_PAGO1", $datos['FECHA_PAGO1'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_PAGO2", $datos['FECHA_PAGO2'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_PAGO3", $datos['FECHA_PAGO3'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_PAGO4", $datos['FECHA_PAGO4'], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		//$stmt->close();
		$stmt = null;
	}

	/*=============================================
	EDITAR PERIODO
	=============================================*/


	static public function mdlEditarPeriodo($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NOM_PERIODO = :NOM_PERIODO,
																COD_PERIODO =:COD_PERIODO,
																INICIO_PERIODO =:INICIO_PERIODO,
																FIN_PERIODO = :FIN_PERIODO,
																INICIO_ORDINARIO = :INICIO_ORDINARIO,
																FIN_ORDINARIO= :FIN_ORDINARIO,
																INICIO_EXTRAORDINARIO = :INICIO_EXTRAORDINARIO,
                                                                FIN_EXTRAORDINARIO = :FIN_EXTRAORDINARIO,
																FECHA_PAGO1 = :FECHA_PAGO1,
                                                                FECHA_PAGO2 =  :FECHA_PAGO2,
                                                                FECHA_PAGO3 = :FECHA_PAGO3,
																FECHA_PAGO4 = :FECHA_PAGO4
												  WHERE ID_PERIODO = :ID_PERIODO");

		$stmt->bindParam(":NOM_PERIODO", $datos['NOM_PERIODO'], PDO::PARAM_STR);
		$stmt->bindParam(":COD_PERIODO", $datos['COD_PERIODO'], PDO::PARAM_STR);
		$stmt->bindParam(":INICIO_PERIODO", $datos['INICIO_PERIODO'], PDO::PARAM_STR);
		$stmt->bindParam(":FIN_PERIODO", $datos['FIN_PERIODO'], PDO::PARAM_STR);
		$stmt->bindParam(":INICIO_ORDINARIO", $datos['INICIO_ORDINARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":FIN_ORDINARIO", $datos['FIN_ORDINARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":INICIO_EXTRAORDINARIO", $datos['INICIO_EXTRAORDINARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":FIN_EXTRAORDINARIO", $datos['FIN_EXTRAORDINARIO'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_PAGO1", $datos['FECHA_PAGO1'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_PAGO2", $datos['FECHA_PAGO2'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_PAGO3", $datos['FECHA_PAGO3'], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA_PAGO4", $datos['FECHA_PAGO4'], PDO::PARAM_STR);
		$stmt->bindParam(":ID_PERIODO", $datos['ID_PERIODO'], PDO::PARAM_STR);
		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		//$stmt->close();
		$stmt = null;
	}

	/*=============================================
	BORRAR PERIODO
	=============================================*/

	static public function mdlBorrarPeriodo($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID_PERIODO = :ID_PERIODO");

		$stmt->bindParam(":ID_PERIODO", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->Closecursor();

		$stmt = null;
	}
}
