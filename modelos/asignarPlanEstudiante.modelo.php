<?php

class ModeloAsignarPlnaEstudiante
{


                /*=============================================
                ASIGNAR MATERIAS AL ESTUDIANTE DEL PLAN DE CARRERA SELECCIONADA
                =============================================*/

    static public function mdlAsignarPlanEstudiante($tabla, $datos)
    {


        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_ESTUDIANTE,ID_MATERIA,ID_PERIODO,ID_ESTADO_MATERIA,NOTA,FECHA_CREACION) VALUES (:ID_ESTUDIANTE,:ID_MATERIA,:ID_PERIODO,:ID_ESTADO_MATERIA,:NOTA,:FECHA_CREACION)");

        $stmt->bindParam(":ID_ESTUDIANTE", $datos['ID_ESTUDIANTE'], PDO::PARAM_INT);
        $stmt->bindParam(":ID_MATERIA", $datos['ID_MATERIA'], PDO::PARAM_INT);
        $stmt->bindParam(":ID_PERIODO", $datos['ID_PERIODO'], PDO::PARAM_INT);
        $stmt->bindParam(":ID_ESTADO_MATERIA", $datos['ID_ESTADO_MATERIA'], PDO::PARAM_INT);
        $stmt->bindParam(":NOTA", $datos['NOTA'], PDO::PARAM_STR);
        $stmt->bindParam(":FECHA_CREACION", $datos['FECHA_CREACION'], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {
 
            return "error";
        }

        $stmt->closeCursor();
        $stmt = null;
    }
}
