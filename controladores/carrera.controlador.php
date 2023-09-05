<?php

class ControladorCarrera{

	/*=============================================
	CREAR CARRERA
	=============================================*/

	static public function ctrCrearCarrera(){

		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigo"])){

				$tabla = "carreras";

				$datos = [
					'COD_CARRERA'=>$_POST["nuevoCodigo"],
					'NOM_CARRERA'=>$_POST["nuevoNomCarrera"]
				];
				
				

				$respuesta = ModeloCarrera::mdlIngresarCarrera($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La carrera ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "carreras";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La carrera no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "carreras";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CARRERA
	=============================================*/

	static public function ctrMostrarCarrera($item, $valor){

		$tabla = "carreras";

		$respuesta = ModeloCarrera::mdlMostrarCarrera($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CARRERA
	=============================================*/

	static public function ctrEditarCarrera(){

		if(isset($_POST["editarCarrera"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCarrera"])){

				$tabla = "carreras";

				$datos = array("CODIGO_CARRERA"=>$_POST["editarCodigo"],
								"NOM_CARRERA"=>$_POST["editarCarrera"],
							   "ID_CARRERA"=>$_POST["IdCarrera"]);

							  // return print_r($datos);

				$respuesta = ModeloCarrera::mdlEditarCarrera($tabla,$datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La carrera ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "carreras";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CARRERA
	=============================================*/

	static public function ctrBorrarCarrera(){

		if(isset($_GET["idCarrera"])){

			$tabla ="carreras";
			$datos = $_GET["idCarrera"];

			$respuesta =ModeloCarrera::mdlBorrarCarrera($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La carrera ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "carreras";

									}
								})

					</script>';
			}
		}
		
	}
}
