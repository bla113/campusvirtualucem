<?php

class ControladorProfesor
{

    /*=============================================
	CREAR PROFESOR
	=============================================*/

    static public function ctrCrearProfesor()
    {

        if (isset($_POST["btnCreatProfesor"])) {

           

                $tabla = "profesor";

                $datos = array(
                    "NOMBRE_COMPLETO" => $_POST["nombreCompleto"],
                    "PRIMER_APELLIDO" => $_POST["primerApellido"],
                    "SEGUNDO_APELLIDO" => $_POST["segundoApellido"],
                    "TIPO_IDENTIFICACION" => $_POST["tipoIdentificaicacion"],
                    "IDENTIFICACION_PROFESOR" => $_POST["Identificacion"],
                    "PROVINCIA_PROFESOR" => $_POST["nuevaProvincia"],
                    "CANTON_PROFESOR" => $_POST["nuevoCanton"],
                    "DISTRITO_PROFESOR" => $_POST["nuevoDistrito"],
                    "OTRAS_SENAS_PROFESOR" => $_POST["otrasSenas"],
                    "CELULAR_PROFESOR" => $_POST["telefonoCelular"],
                    "CORREO_PROFESOR" => $_POST["correoElectronico"],
                );



                $respuesta = ModeloProfesor::mdlCrearProfesor($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "Profesor creado correctamente correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "profesores";

									}
								})

					</script>';
                }
          
        }
    }

    /*=============================================
	MOSTRAR PROFESOR
	=============================================*/

    static public function ctrMostrarProfesor($item, $valor)
    {

        $tabla = "profesor";

        $respuesta = ModeloProfesor::mdlMostrarProfesor($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	EDITAR PROFESOR
	=============================================*/

   /* static public function ctrEditarProfesor()
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

                $respuesta = ModeloAula::mdlEditarProfesor($tabla, $datos);

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
    }*/

    /*=============================================
	BORRAR PROFESOR
	=============================================*/

    static public function ctrBorrarProfesor()
    {

        if (isset($_GET["idProfesor"])) {

            $tabla = "profesor";
			
            $datos = $_GET["idProfesor"];

            $respuesta = ModeloProfesor::mdlBorrarProfesor($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El profesor ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "profesores";

									}
								})

					</script>';
            }
        }
    }
}
