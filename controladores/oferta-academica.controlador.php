<?php

class ControladorOfertaAcademica
{

    /*=============================================
	CREAR OFERTA ACDEMICA
	=============================================*/

    static public function ctrCrearOfertaAcademica()
    {

        if (isset($_POST["grupoMateriaOferta"]) && $_POST["grupoMateriaOferta"] != null) {

            $tabla = "oferta_academica";

            $datos = array(
                "ID_GRUPO_MATERIA" => $_POST["grupoMateriaOferta"],
                "ID_MATERIA" => $_POST["materiaOferta"],
                "ID_PERIODO" => $_POST["periodoOferta"],
                "TURNO_OFERTA" => $_POST["turnoOferta"]
            );
            // print_r($datos) ;

            $respuesta = ModeloOfertaAcademica::mdlIngresarOfertaAcademica($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "Oferta de Matrícula ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "oferta-academica";

									}
								})

					</script>';
            }
        }
    }

    /*=============================================
	CREAR HORARIO DE OFERTA ACDEMICA
	=============================================*/

    static public function ctrCrearHorarioOfertaAcademica()
    {

        if (isset($_POST["nuevoGrupoHorario"]) && $_POST["nuevoGrupoHorario"] != null) {

            $tabla = "horarios_oferta";

            $datos = array(
                "ID_GRUPO_HORARIO" => $_POST["nuevoGrupoHorario"],
                "ID_OFERTA" => $_POST["idOferta"],
                "ID_MATERIA" => $_POST["idMateria"],
                "ID_PROFESOR" => $_POST["profesorOferta"],
                "ID_AULA" => $_POST["aulaOferta"],
                "ID_HORARIO" => $_POST["horarioOferta"],
                "MODALIDAD" => $_POST["modalidadOferta"],
                "DIA" => $_POST["diaOferta"],
                "CAPACIDAD" => $_POST["capacidadHorario"],
                "ID_PERIODO" => $_POST["idPeriodo"],

            );
            // print_r($datos) ;

            $respuesta = ModeloOfertaAcademica::mdlIngresarHorarioOfertaAcademica($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "Se ha creado Correctamente el Horario a la Materia",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "oferta-academica";

									}
								})

					</script>';
            }
        }
    }


    /*=============================================
	MOSTRAR OFERTA ACDEMICA
	=============================================*/

    static public function ctrMostrarOfertaAcademica($item, $valor)
    {

        $tabla = "vista_ofertas_academicas";

        $respuesta = ModeloOfertaAcademica::mdlMostrarOfertaAcademica($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	MOSTRA OFERTAS  POR ESTUDIANTE
	=============================================*/
    static public function ctrMostrarOfertaPorEstudiante($valor)
    {

        $tabla = "vista_ofertas_estudiante";


        $item = "ID_ESTUDIANTE";



        $respuesta = ModeloOfertaAcademica::mdlMostrarOfertaPorEstudiante($tabla, $item, $valor);


        return  $respuesta;
    }
    /*=============================================
	MOSTRA REQUISITOS APROBADOS POR ESTUDIANTE
	=============================================*/
    static public function ctrMostrarRequisitosEstudianteAprobados($valor)
    {

        $tabla = "vista_requisitos_aprobados_estudiante";


        $item = "ID_ESTUDIANTE";

        $item2 = "ID_ESTADO_MATERIA";


        $valor2 = 2;



        $respuesta = ModeloOfertaAcademica::mdlMostrarRequisitosEstudianteAprobados($tabla, $item, $item2, $valor, $valor2);

        return $respuesta;
    }




    /*=============================================
	EDITAR OFERTA ACDEMICA
	=============================================*/

    static public function ctrEditarOfertaAcademica()
    {

        if (isset($_POST["btnEditarAula"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editaNomAula"])) {

                $tabla = "aulas";

                $datos = array(
                    "COD_AULA" => $_POST["editarCodigoAula"],
                    "NOM_AULA" => $_POST["editaNomAula"],
                    "CAP_AULA" => $_POST["editarCapAula"],
                    "ID_AULA" => $_POST["IdAula"]
                );

                // return print_r($datos);

                $respuesta = ModeloOfertaAcademica::mdlEditarOfertaAcademica($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El aula  ha sido actualaizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "oferta-academica";

									}
								})

					</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El aula no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "oferta-academica";

							}
						})

			  	</script>';
            }
        }
    }

    /*=============================================
	BORRAR OFERTA ACDEMICA
	=============================================*/

    static public function ctrBorrarHorarioMateriaOfertada()
    {

        if (isset($_GET["idHorariOferta"])) {

            $tabla = "horarios_oferta";

            $datos = $_GET["idHorariOferta"];

            $respuesta = ModeloOfertaAcademica::mdlBorrarHorarioMateriaOfertada($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El horario de la materia ofertada ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "oferta-academica";

									}
								})

					</script>';
            }
        }
    }



    /*=============================================
	MOSTRAR HORARIOS DE LA OFERTA ACADEMICA
	=============================================*/



    static public function ctrMostrarHorariosOfertaAcademica($valor)
    {

        $tabla = "vista_horario_oferta";


        $item = "ID_OFERTA";



        $respuesta = ModeloOfertaAcademica::mdlMostrarHorariosOfertaAcademica($tabla, $item, $valor);


        return  $respuesta;
    }

    /*=============================================
	MOSTRAR HORARIOS PARA EDITAR
	=============================================*/

    static public function ctrMostrarHoariosOfertaEdiatar($item, $valor)
    {

        $tabla = "vista_horario_oferta";


        $respuesta = ModeloOfertaAcademica::mdlMostrarHorariosOfertaAcademica($tabla, $item, $valor);


        return  $respuesta;
    }

    /*=============================================
	MOSTRAR GRUPOS HORARIO
	=============================================*/


    static public function ctrMostrarGruposHorarios()
    {
        $tabla = "grupo_horario";

        $item = null;
        $valor = null;

        $respuesta = ModeloOfertaAcademica::mdlMostrarGruposHorarios($tabla, $item, $valor);

        return  $respuesta;
    }



    /*=============================================
	EDITAR HORARIO DE OFERTA ACDEMICA
	=============================================*/

    static public function ctrEditarHoarioOfertaAcademica()

    {

        if (isset($_POST['btnEditar'])) {


            $tabla = "horarios_oferta";

            $datos = array(
                "ID_GRUPO_HORARIO" => $_POST["editarGrupoHorario"],
                "ID_PROFESOR" => $_POST["editarProfesorOferta"],
                "ID_AULA" => $_POST["editaraulaOferta"],
                "ID_HORARIO" => $_POST["editarhorarioOferta"],
                "MODALIDAD" => $_POST["editarmodalidadOferta"],
                "DIA" => $_POST["editardiaOferta"],
                "ID_PERIODO" => $_POST["editaridPeriodo"],
                "ID_HORARIO_OFERTA"=>$_POST["editaridOferta"]

            );
            $respuesta = ModeloOfertaAcademica::mdlEditarHorarioOfertaAcademica($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "Se ha actualizado el horario corectamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "oferta-academica";

									}
								})

					</script>';
            }
        }
    }



    /*=============================================
	BORRAR OFERTA ACADEMICA
	=============================================*/

	static public function ctrBorrarOfertaAcademica(){

		if(isset($_GET["idOferta"])){

			$tabla ="oferta_academica";

			$datos = $_GET["idOferta"];

			$respuesta = ModeloOfertaAcademica::mdlBorrarOfertaAcademica($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La oferta académica ha  sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "oferta-academica";

									}
								})

					</script>';
			}
		}
		
	}
}
