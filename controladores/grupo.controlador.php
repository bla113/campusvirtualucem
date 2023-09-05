<?php

class ControladorGrupo{

	/*=============================================
	CREAR GRUPO
	=============================================*/

	static public function ctrCrearGrupo(){

		if(isset($_POST["btnCrearGrupo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreGrupo"] )||
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigoGrupo"])){

				$tabla = "grupos";

				$datos = [
					'NOM_GRUPO'=>$_POST["nuevoNombreGrupo"],
					'COD_GRUPO'=>$_POST["nuevoCodigoGrupo"]
				];
				
				

				$respuesta = ModeloGrupo::mdlIngresarGrupo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El grupo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "grupos-materia";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El grupo no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "grupos-materia";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR GRUPO
	=============================================*/

	static public function ctrMostrarGrupo($item, $valor){

		$tabla = "grupos";

		$respuesta = ModeloGrupo::mdlMostrarGrupo($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR GRUPO
	=============================================*/

	static public function ctrEditarGrupo(){

		if(isset($_POST["btnEditarGrupo"])){

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreGrupo"] )||
               preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigoGrupo"])){

				$tabla = "grupos";

				$datos = [
					'NOM_GRUPO'=>$_POST["editarNombreGrupo"],
					'COD_GRUPO'=>$_POST["editarCodigoGrupo"],
					'ID_GRUPO'=>$_POST["IdGrupo"],

				];

							  
				$respuesta = ModeloGrupo::mdlEditarGrupo($tabla,$datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El grupo ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "grupos-materia";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los campos no puede ir vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "grupos-materia";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR GRUPO
	=============================================*/

	static public function ctrBorrarGrupo(){

		if(isset($_GET["idGrupo"])){

			$tabla ="grupos";
			$datos = $_GET["idGrupo"];

			$respuesta =ModeloGrupo::mdlBorrarGrupo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El grupo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "grupos-materia";

									}
								})

					</script>';
			}
		}
		
	}
}
