<?php

class ControladorExamen
{

    /*=============================================
	CREAR EXAMEN
	=============================================*/

    static public function ctrCrearExamen()
    {

        if (isset($_POST["btnCrearExamen"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloExamen"])) {

                $tabla = "examenes";

                $datos = array(
                    "ID_HORARIO_OFERTA" => $_POST["idHorarioOferta"],
                    "ID_MATERIA" => $_POST["idMateriaExamen"],
                    "NOMBRE_EXAMEN" => $_POST["tituloExamen"],
                    "PESO_NOTA" => $_POST["pesoNota"],
                    "FECHA_INICIO" => $_POST["fechaInicio"],
                    "INTENTOS" => $_POST["intentosExamen"],
                    "PUNTAJE_MINIMO" => $_POST["puntajeMinimoExamen"],
                    "FECHA_FINAL" => $_POST["fechaFinal"]
                );
                


                $respuesta = ModeloExamen::mdlIngresarExamen($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "Examen Creado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "index.php?ruta=evaluaciones-curso&idHorarioOferta='.$_POST["idHorarioOferta"].'&idMateria='.$_POST["idMateriaExamen"].'&idUsuario='.$_POST["idUsuario"].'";

									}
								})

					</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El aula  no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "aulas";

							}
						})

			  	</script>';
            }
        }
    }

    /*=============================================
	MOSTRAR EXAMENES
	=============================================*/

    static public function ctrMostrarExamen($item, $valor)
    {

        $tabla = "examenes";

        $respuesta = ModeloExamen::mdlMostrarExamen($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	EDITAR AULA
	=============================================*/

    static public function ctrEditarAula()
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

                $respuesta = ModeloAula::mdlEditarAula($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El aula  ha sido actualaizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "aulas";

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

							window.location = "aulas";

							}
						})

			  	</script>';
            }
        }
    }

    /*=============================================
	BORRAR EXAMEN
	=============================================*/

    static public function ctrBorrarExamen()
    {

        if (isset($_GET["idExamen"])) {
            
           

            $tabla = "examenes";

            $datos = $_GET["idExamen"];

            $respuesta = ModeloExamen::mdlBorrarExamen($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El examen  ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

                                        window.location = "index.php?ruta=evaluaciones-curso&idHorarioOferta='.$_GET["idHorarioOferta"].'&idMateria='.$_GET["idMateria"].'&idUsuario='.$_GET["idUsuario"].'";
  
                                        

									}
								})

					</script>';
            }
        }
    }
}
