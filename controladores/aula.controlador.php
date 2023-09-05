<?php

class ControladorAula
{

    /*=============================================
	CREAR AULA
	=============================================*/

    static public function ctrCrearAula()
    {

        if (isset($_POST["btnCrearAula"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigoAula"])) {

                $tabla = "aulas";

                $datos = array(
                    "COD_AULA" => $_POST["nuevoCodigoAula"],
                    "NOM_AULA" => $_POST["nuevoNomAula"],
                    "CAP_AULA" => $_POST["nuvoCapAula"]
                );



                $respuesta = ModeloAula::mdlIngresarAula($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El aula ha sido guardada correctamente",
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
	MOSTRAR AULA
	=============================================*/

    static public function ctrMostrarAula($item, $valor)
    {

        $tabla = "aulas";

        $respuesta = ModeloAula::mdlMostrarAula($tabla, $item, $valor);

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
	BORRAR AULA
	=============================================*/

    static public function ctrBorrarAula()
    {

        if (isset($_GET["idAula"])) {

            $tabla = "aulas";
            $datos = $_GET["idAula"];

            $respuesta = ModeloAula::mdlBorrarAula($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El aula  ha sido borrada correctamente",
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
}
