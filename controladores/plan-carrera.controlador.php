<?php

class ControladorPlanCarrera
{

	/*=============================================
	CREAR CARRERA
	=============================================*/

	static public function ctrCrearPlanCarrera()
	{

		if (isset($_POST["btnGuardarPlanCarrera"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["codigoPlan"]) ||
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombrePlan"])
			) {

				$tabla = "plan_carrera";

				$datos = [
					'ID_CARRERA' => $_POST["carreraPlan"],
					'COD_PLAN_CARRERA' => $_POST["codigoPlan"],
					'NOM_PLAN' => $_POST["nombrePlan"],
					'CREDITOS' => $_POST["cantCreditos"],
					'PERIODOS' => $_POST["cantPeriodos"],
					'FECHA_CREACION' => $_POST["fechaInicioPlan"],

				];


				//return $datos;

				$respuesta = ModeloPlanCarrera::mdlIngresarPlanCarrera($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "El plan de carrera ha sido agregada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "planes-carrera";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La carrera no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "planes-carrera";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR CARRERA
	=============================================*/

	static public function ctrMostrarPlanCarrera( $valor)
	{
		$item='ID_PLAN_CARRERA';

		$tabla = "vista_plan_carrera";

		$respuesta = ModeloPlanCarrera::mdlMostrarPlanCarrera($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR MATERIAS DEL PLAN DE CARRERA
	=============================================*/

	static public function ctrMostrarMateriasPlanCarrera($valor)
	{

		$tabla = "vista_materias_del_plan_carrera";

		$item = 'ID_PLAN_CARRERA';

		$respuesta = ModeloPlanCarrera::mdlMostrarMateriasPlanCarrera($tabla, $item, $valor);

		return $respuesta;
	}


	

	

	/*=============================================
	EDITAR CARRERA
	=============================================*/

	static public function ctrEditarPlanCarrera()
	{

		if (isset($_POST["editarCarrera"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCarrera"])) {

				$tabla = "carreras";

				$datos = array(
					"CODIGO_CARRERA" => $_POST["editarCodigo"],
					"NOM_CARRERA" => $_POST["editarCarrera"],
					"ID_CARRERA" => $_POST["IdCarrera"]
				);

				// return print_r($datos);

				$respuesta = ModeloPlanCarrera::mdlEditarPlanCarrera($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La carrera ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "planes-carrera";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "planes-carrera";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	BORRAR CARRERA
	=============================================*/

	static public function ctrBorrarPlanCarrera()
	{

		if (isset($_GET["idCarrera"])) {

			$tabla = "carreras";
			$datos = $_GET["idCarrera"];

			$respuesta = ModeloPlanCarrera::mdlBorrarPlanCarrera($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal({
						  type: "success",
						  title: "La carrera ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "planes-carrera";

									}
								})

					</script>';
			}
		}
	}
}
