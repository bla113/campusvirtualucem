<?php

class ControladorPlan{

	/*=============================================
	CREAR CARRERA
	=============================================*/

	static public function ctrCrearPlan(){

		if(isset($_POST["nuevoCodigo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigo"])){

				$tabla = "plan";
				
				$datos = [
					'COD_PLAN'=>$_POST["nuevoCodigo"],
					'NOM_PLAN'=>$_POST["nuevoNombrePlan"],
					'FECHA_PLAN'=>$_POST["fechaPlan"]
				];
				
				

				$respuesta = ModeloPlan::mdlIngresarPlan($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El plan ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "plan";

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

							window.location = "plan";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CARRERA
	=============================================*/

	static public function ctrMostrarPlan($item, $valor){

		$tabla = "plan";

		$respuesta = ModeloPlan::mdlMostrarPlan($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR PLAN
	=============================================*/

	static public function ctrEditarPlan(){

		if(isset($_POST["btnEditarPlan"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarCodigo"])){

				$tabla="plan";

				$datos = [      "COD_PLAN"=>$_POST["editarCodigo"],
								"NOM_PLAN"=>$_POST["editarNombrePlan"],
								"FECHA_PLAN"=>$_POST["editarfechaPlan"],
							   "ID_PLAN"=>$_POST["IdPlan"]
							];

				//return $datos;		 
				$respuesta = ModeloPlan::mdlEditarPlan($tabla,$datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El plan ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "plan";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los campos no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "plan";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR PLAN
	=============================================*/

	static public function ctrBorrarPlan(){

		if(isset($_GET["idPlan"])){

			$tabla ="plan";
			$datos = $_GET["idPlan"];

			$respuesta = ModeloPlan::mdlBorrarPlan($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El plan ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "plan";

									}
								})

					</script>';
			}
		}
		
	}
}
