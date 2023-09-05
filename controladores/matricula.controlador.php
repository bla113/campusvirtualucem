<?php

class ControladorMatricula
{

    /*=============================================
	CREAR PREMATRICULA
	=============================================*/

    static public function ctrCrearPrematricula($datos)

    {
        $tabla = 'detalle_matricula';

        $respuesta = ModeloMatricula::mdlIngresarPrematricula($tabla, $datos);


        return $respuesta;
    }

    /*=============================================
	CREAR MATRICULA
	=============================================*/

    static public function ctrCreaMatricula()

    {


        if (isset($_POST['btnCrearMatricula'])) {
            $saldo = 0;

            $pagoMinimo = filter_var($_POST['TotalSeleccionado'], FILTER_SANITIZE_NUMBER_FLOAT);
            $tatalPrematricula = filter_var($_POST['montoSeleccionado'], FILTER_SANITIZE_NUMBER_FLOAT);

            $saldo = $tatalPrematricula - $pagoMinimo;


            $materias = ControladorMatricula::ctrMostrarPrematriculasparaMatricular($_POST['idEstudiante']);

            //Metodo para asignar el estudiante al curso 

           /* foreach ($materias as $materia) {


                $tablaCurso = 'curso_estudiante';

                $datosCurso = [
                    'ID_ESTUDIANTE' => $_POST['idEstudiante'],
                    'ID_HORARIO_OFERTA' => $materia['ID_HORARIO_OFERTA']
                ];
                $AsignarCurso = ModeloMatricula::mdlAsiganarCursoEstudiante($tablaCurso, $datosCurso);
                
            }*/
            $tabla = 'matriculas';





            //CAMBIAR EL ESTADO DEL DETALLE DE MATERIA a estado 2

            $datos = [
                'ID_ESTUDIANTE' => $_POST['idEstudiante'],
                'ID_PERIODO' => $_POST['idPerido'],
                'MATERIAS' => json_encode($materias, JSON_UNESCAPED_UNICODE),
                'SUB_TOTAL' => $_POST['subtotal'],
                'DESCUENTO' =>  $_POST['montoDescuento'],
                'TOTAL_MATRICULA' => $_POST['montoSeleccionado'],
                'ID_METODO_PAGO' => $_POST['metodoDePago'],
                'SALDO' =>  $saldo,
                'COMPROBANTE_MATRICULA' => NULL,
                'ID_USUARIO' => $_SESSION["id"]


            ];

            // return $datos;
            $respuesta = ModeloMatricula::mdlCrearMatricula($tabla, $datos);

            $cambiar = ControladorMatricula::ctrMostrarPrematriculas($_POST['idEstudiante']); //Mando allamar toas los detalles pendientes y les cambio el estado a 2


            foreach ($cambiar as $key => $valor) {

                $cabiarEstado = ModeloMatricula::mdlActualizarEstadodetalleMatricula($valor['ID_DETALLE_MATRICULA']);
            }

            if ($respuesta == "ok") {

                echo '<script>

                swal({
                      type: "success",
                      title: "Matricula Creada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "matriculas";

                                }
                            })

                </script>';
            }
        }
    }

    /*=============================================
	MOSTRAR TODAS LAS MATRICULAS
	=============================================*/


    public static function ctrMotrarMatriculas()
    {

        $tabla = "vista_matriculas";
        $item = null;
        $valor = null;

        $respuesta = ModeloMatricula::mdlMostrarMatriculas($tabla, $item, $valor);

        return $respuesta;
    }

       /*=============================================
	MOSTRAR TODAS LAS MATRICULAS
	=============================================*/


    public static function ctrMotrarMatriculasporEstudiantes($item,$valor)
    {

        $tabla = "vista_matriculas";
        //$item = null;
       // $valor = null;

        $respuesta = ModeloMatricula::mdlMostrarMatriculas($tabla, $item, $valor);

        return $respuesta;
    }


    /*=============================================
	MOSTRAR TODAS LAS MATRICULAS PARA APLICAR PAGO
	=============================================*/


    public static function ctrMotrarMatriculasParaplicarPago($valor)
    {

        $tabla = "vista_matriculas";

        $item ='ID_MATRICULA' ;
     

        $respuesta = ModeloMatricula::mdlMostrarMatriculasParaAplicarPago($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	VALIDAR COMPROBANTE
	=============================================*/

    public static function ctrMostrarComprobante($valor)
    {

        $tabla = "vista_matriculas";

        $item = 'ID_MATRICULA';

        $respuesta = ModeloMatricula::mdlMostrarMostrarComprobante($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIANTE
	=============================================*/

    static public function ctrMostrarPrematriculas($valor2)
    {

        $tabla = "vista_detalle_matricula";

        $item2 = 'ID_ESTUDIANTE';

        $valor1 = 1;

        $item1 = 'DETALLE_ESTADO';

        $respuesta = ModeloMatricula::mdlMostrarPrematriculaPorEstudiante($tabla, $item1, $valor1, $valor2, $item2);

        return $respuesta;
    }

    /*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIANTE PARA INSERTAR EN MATRICULA
	=============================================*/

    static public function ctrMostrarPrematriculasparaMatricular($valor2)
    {

        $tabla = "vista_detalle_matricula";

        $item2 = 'ID_ESTUDIANTE';

        $valor1 = 1;

        $item1 = 'DETALLE_ESTADO';

        $respuesta = ModeloMatricula::mdlMostrarPrematriculaPorEstudianteParaMatricular($tabla, $item1, $valor1, $valor2, $item2);

        return $respuesta;
    }


     /*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIANTE PARA ASIGNARLO AL CURSO VIRTUAL
	=============================================*/
    static public function ctrMostraMatriculasParaAsignarCurso($valor)
    {

        $tabla = "matriculas";

        $item = 'ID_MATRICULA';

        $respuesta = ModeloMatricula::mdlMostrarMatriculasParaCursoVirtual($tabla, $item, $valor );

        return $respuesta;
    }


     /*=============================================
	CANBIAR EL ESTADO A LA MATRICULA
	=============================================*/
    static public function ctrCambiarEstadoMatricula($valor)
    {

        $tabla = "matriculas";

       
      $datos=[
        'ESTADO_MATRICULA'=>2,
        'ID_MATRICULA'=>$valor
      ];
        

        $respuesta = ModeloMatricula::mdlCambiarEstadoMatricula($tabla,$datos );

        return $respuesta;
    }



    /*=============================================
	SELECCIONAR TODOS LOS ID DE HORARIOS MATRICULADOS POR ESTUDIANTE
	=============================================*/

    static public function ctrMostrarIdHorariosMtricula($valor1, $valor3)
    {

        $tabla = "detalle_matricula";

        $item1 = 'ID_ESTUDIANTE';
        //$valor1=3;

        //$item2 = 'ID_HORARIO_OFERTA';


        $item3 = 'ID_MATERIA';


        //$valor2=1;
        $respuesta = ModeloMatricula::mdlMostrarIdHorariosMtricula($tabla, $item1, $valor1, $item3, $valor3);

        return $respuesta;
    }


    /*=============================================
	MOSTRAR  MATRICULAS PDF
	=============================================*/
	static public function mdlMostrarMatriculasPDF($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
			$stmt->closeCursor();
		}



		$stmt = null;
	}

       /*=============================================
	MOSTRAR MATRICULA PARA PDF
	=============================================*/


    public static function ctrMotrarMatriculasPDF($item,$valor)
    {

        $tabla = "vista_matriculas";
        //$item = null;
        //$valor = null;

        $respuesta = ModeloMatricula::mdlMostrarMatriculasPDF($tabla, $item, $valor);

        return $respuesta;
    }


 


    static public function ctrBorrarDatella($valor)
    {


        $tabla = "detalle_matricula";


        $respuesta = ModeloMatricula::BorrarDetalle($tabla, $valor);

        return $respuesta;
    }
    /*=============================================
	BUSCAR ESTUDIANTE PARA MATRICULAR
	=============================================*/

    static public function ctrBucarEstudianteParaMatricular()
    {


        if (isset($_POST['btnBuscarEstudiante'])) {

            if ($_POST['buscarIdentificacion'] != "") {


                if ($_POST['buscarIdentificacion'] == 2) { //numero de carnet
                    $tabla = 'estudiante';

                    $item = 'IDENTIFICACION_ESTUDIANTE';

                    $valor = '603790355';


                    $respuesta = ModeloMatricula::mdlBuscarEstudianteParaMatricular($tabla, $item, $valor);

                    if ($respuesta) {

                        foreach ($respuesta as $estudiante) {

                            echo '<script>

								window.location = "index.php?ruta=expediente-estudiante&idEstudiante=' . $estudiante['ID_ESTUDIANTE'] . '&idCarrera=' . $estudiante['ID_CARRERA'] . '&idPlanCarrera=' . $estudiante['ID_PLAN_CARRERA'] . '";

							</script>';
                        }
                    }
                }
                if ($_POST['buscarIdentificacion'] === 2) {

                    $tabla = 'estudiantes';

                    $item = 'IDENTIFICACION_ESTUDIANTE';

                    $valor = filter_var($_POST['buscarEstudiante'], FILTER_SANITIZE_NUMBER_INT);


                    $respuesta = ModeloMatricula::mdlBuscarEstudianteParaMatricular($tabla, $item, $valor);
                }
            }/*else{
                echo '<script>

					swal({
						  type: "success",
						  title: "Teiene que locar bien los datos requeridos",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "matriculas";

									}
								})

					</script>';
            }*/
        }
    }
    
    /*=============================================
	CONSULTAR COSTOS DESDE LA TABLA CONFIGURACION
	=============================================*/
    static public function ctrConsulataCostos()
    {


        $tabla = "COSTOS_MATRICULAS";

        $valor = null;
        $item = null;
        $respuesta = ModeloMatricula::mdlConsultarCostos($tabla, $valor, $item);

        return $respuesta;
    }

    /*=============================================
	RESTAR CAPACIDAD AL HORARIO OFERTADO
	=============================================*/

    static public function ctrRestarCapacidadHorarioOfertado($valor){

        $tabla='horarios_oferta';

        $item='ID_HORARIO_OFERTA';


        $respuesta=ModeloMatricula::mdlRestarCapacidadHorarioOfertado($tabla,$item,$valor);

        return $respuesta;
    }


    
    /*=============================================
	CAMBIAR EL ESTADO DE LA MATERIA ESTUDIATE
	=============================================*/

    static public function ctrCambiarEstadoMateriaEstudiante($datos){


        $tabla='estudiante_materia';

      

        $respuesta=ModeloMatricula::mdlCambiarEstadoMateriaEstudiante($tabla, $datos);

        return $respuesta;

    }



}
