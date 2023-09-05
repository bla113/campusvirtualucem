<?php

class ControladorAsiganrPlanEstudiante
{



    static public function ctrAsignarPlanEstudiante($IdPlanCarrera)
    {

        /*=============================================
                ASIGNAR MATERIAS AL ESTUDIANTE DEL PLAN DE CARRERA SELECCIONADA
                =============================================*/
        if (isset($_GET['idEstudiantePlan'])) {

            $materias = ControladorEstudiante::ctrMostrarMateriasEstudianteAll($_GET['idEstudiantePlan']);

            if (count($materias) <= 0) {



                $tabla = "estudiante_materia";

                $MateriasPlan = ControladorPlanCarrera::ctrMostrarMateriasPlanCarrera($IdPlanCarrera);

                $PeriodoActual = ControladorPeriodo::ctrPeriodoActual();

                foreach ($MateriasPlan as $materiaP) {

                    $datos = [
                        'ID_ESTUDIANTE' => $_GET['idEstudiantePlan'],
                        'ID_PERIODO' => $PeriodoActual[0],
                        'ID_MATERIA' => $materiaP['ID_MATERIA'],
                        'ID_ESTADO_MATERIA' => 1,
                        'NOTA' => 0,
                        'FECHA_CREACION' => null
                    ];



                    $respuesta = ModeloAsignarPlnaEstudiante::mdlAsignarPlanEstudiante($tabla, $datos);
                }
                //return  $MateriasPlan;
                if ($respuesta == "ok") {

                    echo '<script>
    
                        swal({
                              type: "success",
                              title: "Se agrego el Estudiante al Plan de Carrera",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "estudiantes";
    
                                        }
                                    })
    
                        </script>';
                }
            }else{
                echo '<script>

                swal({
                      type: "error",
                      title: "¡El estudiante ya cuenta con las materias del plan configurado!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "estudiantes";

                        }
                    })

              </script>';
            
            }
        }
    }
}
