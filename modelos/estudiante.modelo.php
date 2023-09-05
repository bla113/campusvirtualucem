<?php

require_once "conexion.php";

class ModeloEstudiante
{

    /*=============================================
BUSCAR IDENTIFICICACION
=============================================*/

    static public function mdlBuscarIdentificacion($tabla, $item, $valor)
    {

 

        $stmt =  ApiPadronElectoral::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();



        $stmt->closeCursor();

        $stmt = null;
    }
    
    /*=============================================
CONSECUTIVO DE CARNET
=============================================*/
    static public function mdlNuvoCarnet($tabla, $item)
    {



        $stmt =  Conexion::conectar()->prepare("SELECT MAX($item) as NUMERO_CARNET FROM $tabla  LIMIT 1");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->closeCursor();

        $stmt = null;
    }


    /*=============================================
CONSECUTIVO DE CARNET
=============================================*/
    static public function mdlGuardarConsecutivoCarnet($tabla,$valor)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NUMERO_CARNET) VALUES (:NUMERO_CARNET)");

        $stmt->bindParam(":NUMERO_CARNET", $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        }


        $stmt->closeCursor();

        $stmt = null;
    }

 /*=============================================
MUESTRA TODAS LAS MATERIAS DEL ESTUDIANTE  DEL PLAN SELECCIONADO
=============================================*/
    static public function mdlMostrarMateriasEstudiante($tabla, $item1, $valor1, $item2, $valor2)
    {

       
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 ");

            $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
         
            $stmt->execute();

            return $stmt->fetchAll();
       



    }

 /*=============================================
MUESTRA TODAS LAS MATERIAS DEL ESTUDIANTE  EN TODOS LOS ESTADOS APROBADAS, MATRICULADAS CONVALIDADA
=============================================*/

    static public function mdlMostrarMateriasEstudianteAll($tabla,$item1, $valor1)
    {

      
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1");
            //SELECT * FROM `estudiante_materia` WHERE ID_ESTUDIANTE=1
            
            $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
            
           

            $stmt->execute();

            return $stmt->fetchAll();
        



    }

 /*=============================================
MUESTRA TODAS LAS MATERIAS APROBADAS DEL ESTUDIANTE  
=============================================*/
    static public function mdlMostrarMatriasAprobadasEstudiante($tabla,$item1, $valor1, $item2, $valor2)
    {

      
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 ");

            
            $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
           

            $stmt->execute();

            return $stmt->fetchAll();
        



    }

     /*=============================================
MUESTRA TODAS LAS MATERIAS APROBADAS DEL ESTUDIANTE 
=============================================*/

    static public function mdlMostrarMatriasConvalidasEstudiante($tabla,$item1, $valor1, $item2, $valor2)
    {

      

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 ");

            
        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

           

            $stmt->execute();

            return $stmt->fetchAll();
        



    }
    /*=============================================
MUESTRA TODAS LAS MATERIAS MATRICULADAS DEL ESTUDIANTE 
=============================================*/
    static public function mdlMostrarMatriasMatriculadasEstudiante($tabla,$item1, $valor1, $item2, $valor2)
    {

      

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2 ");

            
        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);

           

            $stmt->execute();

            return $stmt->fetchAll();
        



    }



    
    /*=============================================
MUESTRA TODOS LOS  ESTUDIANTE 
=============================================*/
    static public function mdlMostrarEstudiantes($tablaE, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaE WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaE");

            $stmt->execute();

            return $stmt->fetchAll();
        }


        //$stmt -> closeCursor();

        $stmt = null;
    }



    /*=============================================
CREAR ESTUDIANTE NUEVO DESDE FORMULARIO
=============================================*/
    static public function mdlCrearEstudiante($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOMBRE_COMPLETO,
                                                            PRIMER_APELLIDO,
                                                            SEGUNDO_APELLIDO,
                                                            TIPO_IDENTIFICACION,
                                                            IDENTIFICACION_ESTUDIANTE,
                                                            PROVINCIA_ESTUDIANTE,
                                                            CANTON_ESTUDIANTE,
                                                            DISTRITO_ESTUDIANTE,
                                                            OTRAS_SENAS_ESTUDIANTE,
                                                            TELEFONO_ESTUDIANTE,
                                                            CELULAR_ESTUDIANTE,
                                                            LABORA_ESTUDIANTE,
                                                            FECHA_NACIMIENTO,
                                                            ESTADO_CIVIL,
                                                            ID_PLAN_CARRERA,
                                                            PROCEDE_ESTUDIANTE,
                                                            ID_CARRERA,
                                                            TITULO_ESTUDIANTE,
                                                            CEDULA_ESTUDIANTE,
                                                            TURNO,
                                                            NUM_CARNE,
                                                            CORREO_ESTUDIANTE)
                                                         VALUES (:NOMBRE_COMPLETO,
                                                            :PRIMER_APELLIDO,
                                                            :SEGUNDO_APELLIDO,
                                                            :TIPO_IDENTIFICACION,
                                                            :IDENTIFICACION_ESTUDIANTE,
                                                            :PROVINCIA_ESTUDIANTE,
                                                            :CANTON_ESTUDIANTE,
                                                            :DISTRITO_ESTUDIANTE,
                                                            :OTRAS_SENAS_ESTUDIANTE,
                                                            :TELEFONO_ESTUDIANTE,
                                                            :CELULAR_ESTUDIANTE,
                                                            :LABORA_ESTUDIANTE,
                                                            :FECHA_NACIMIENTO,
                                                            :ESTADO_CIVIL,
                                                            :ID_PLAN_CARRERA,
                                                            :PROCEDE_ESTUDIANTE,
                                                            :ID_CARRERA,
                                                            :TITULO_ESTUDIANTE,
                                                            :CEDULA_ESTUDIANTE,
                                                            :TURNO,
                                                            :NUM_CARNE,
                                                            :CORREO_ESTUDIANTE)");

        $stmt->bindParam(":NOMBRE_COMPLETO", $datos["NOMBRE_COMPLETO"], PDO::PARAM_STR);
        $stmt->bindParam(":PRIMER_APELLIDO", $datos["PRIMER_APELLIDO"], PDO::PARAM_STR);
        $stmt->bindParam(":SEGUNDO_APELLIDO", $datos["SEGUNDO_APELLIDO"], PDO::PARAM_STR);
        $stmt->bindParam(":TIPO_IDENTIFICACION", $datos["TIPO_IDENTIFICACION"], PDO::PARAM_STR);
        $stmt->bindParam(":IDENTIFICACION_ESTUDIANTE", $datos["IDENTIFICACION_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":PROVINCIA_ESTUDIANTE", $datos["PROVINCIA_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":CANTON_ESTUDIANTE", $datos["CANTON_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":DISTRITO_ESTUDIANTE", $datos["DISTRITO_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":OTRAS_SENAS_ESTUDIANTE", $datos["OTRAS_SENAS_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":TELEFONO_ESTUDIANTE", $datos["TELEFONO_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":CELULAR_ESTUDIANTE", $datos["CELULAR_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":LABORA_ESTUDIANTE", $datos["LABORA_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":FECHA_NACIMIENTO", $datos["FECHA_NACIMIENTO"], PDO::PARAM_STR);
        $stmt->bindParam(":ESTADO_CIVIL", $datos["ESTADO_CIVIL"], PDO::PARAM_STR);
        $stmt->bindParam(":PROCEDE_ESTUDIANTE", $datos["PROCEDE_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_CARRERA", $datos["ID_CARRERA"], PDO::PARAM_INT);
        $stmt->bindParam(":CEDULA_ESTUDIANTE", $datos["CEDULA_ESTUDIANTE"], PDO::PARAM_STR); 
        $stmt->bindParam(":TITULO_ESTUDIANTE", $datos["TITULO_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_PLAN_CARRERA", $datos["ID_PLAN_CARRERA"], PDO::PARAM_INT);
        $stmt->bindParam(":TURNO", $datos["TURNO"], PDO::PARAM_STR);
        $stmt->bindParam(":NUM_CARNE", $datos["NUM_CARNE"], PDO::PARAM_STR);
        $stmt->bindParam(":CORREO_ESTUDIANTE", $datos["CORREO_ESTUDIANTE"], PDO::PARAM_STR);



        if ($stmt->execute()) {

            return "ok";
        }
        if (!$stmt->execute()) {

            return "error";
        }

        $stmt->closeCursor();

        $stmt = null;
    }

    static public function mdlASignarMateriasaEstudiante($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_estudiante,id_materia) VALUES (:id_estudiante,:id_materia)");

        $stmt->bindParam(":id_estudiante", $datos["id_estudiante"], PDO::PARAM_INT);
        $stmt->bindParam(":id_materia", $datos["id_materia"], PDO::PARAM_INT);



        if ($stmt->execute()) {

            return "ok";
        }
        if (!$stmt->execute()) {

            return "error";
        }

        $stmt->closeCursor();

        $stmt = null;
    }


    /*=============================================
	ASISGNAR CARRERA ESTUDIANTE
	=============================================*/

    static public function mdlAsiganarCarreraEstudiante($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET carrera = :carrera WHERE id = :id");

        $stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        //$stmt->close();
        $stmt = null;
    }



    /*=============================================
	EDITAR ESTUDIANTE
	=============================================*/

    static public function mdlEditarEstudiante($tabla, $datos)
    {





        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                         PROVINCIA_ESTUDIANTE = :PROVINCIA_ESTUDIANTE, 
                                                         CANTON_ESTUDIANTE = :CANTON_ESTUDIANTE, 
                                                         DISTRITO_ESTUDIANTE = :DISTRITO_ESTUDIANTE,
                                                         OTRAS_SENAS_ESTUDIANTE = :OTRAS_SENAS_ESTUDIANTE,
                                                         TELEFONO_ESTUDIANTE = :TELEFONO_ESTUDIANTE,
                                                         CELULAR_ESTUDIANTE = :CELULAR_ESTUDIANTE,
                                                         LABORA_ESTUDIANTE = :LABORA_ESTUDIANTE,
                                                         FECHA_NACIMIENTO = :FECHA_NACIMIENTO,
                                                         ESTADO_CIVIL = :ESTADO_CIVIL,
                                                         PROCEDE_ESTUDIANTE= :PROCEDE_ESTUDIANTE
                                                          WHERE ID_ESTUDIANTE = :ID_ESTUDIANTE");

        $stmt->bindParam(":PROVINCIA_ESTUDIANTE", $datos["PROVINCIA_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":CANTON_ESTUDIANTE", $datos["CANTON_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":DISTRITO_ESTUDIANTE", $datos["DISTRITO_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":OTRAS_SENAS_ESTUDIANTE", $datos["OTRAS_SENAS_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":TELEFONO_ESTUDIANTE", $datos["TELEFONO_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":CELULAR_ESTUDIANTE", $datos["CELULAR_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":LABORA_ESTUDIANTE", $datos["LABORA_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":FECHA_NACIMIENTO", $datos["FECHA_NACIMIENTO"], PDO::PARAM_STR);
        $stmt->bindParam(":ESTADO_CIVIL", $datos["ESTADO_CIVIL"], PDO::PARAM_STR);
        $stmt->bindParam(":PROCEDE_ESTUDIANTE", $datos["PROCEDE_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_ESTUDIANTE", $datos["ID_ESTUDIANTE"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->closeCursor();

        $stmt = null;
    }


    /*=============================================
	ACTUALIZAR ESTUDIANTE
	=============================================*/

    static public function mdlActualizarEstudiante($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->closeCursor();

        $stmt = null;
    }

    /*=============================================
	BORRAR ESTUDIANTE
	=============================================*/

    static public function mdlBorrarEstudiante($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID_ESTUDIANTE = :ID_ESTUDIANTE");

        $stmt->bindParam(":ID_ESTUDIANTE", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->closeCursor();

        $stmt = null;
    }

    
	/*=============================================
	MOSTRAR TIPO D EINDENTIFICACION
	=============================================*/

	static public function mdlMostrarIdentificacion($tabla){

	

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();
            $stmt -> closeCursor();
		

		

		$stmt = null;

	}
}
