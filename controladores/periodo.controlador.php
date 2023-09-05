<?php


class ControladorPeriodo{

    static public function ctrMostrarPeriodo($item,$valor){

        $tabla='periodos';
      

        $respuesta = ModeloPeriodo::mdlMostrarPeriodo($tabla,$item,$valor);

        return $respuesta;


    }//Fin Controlador


    /*=============================================
	CREAR PERIODO
	=============================================*/

	static public function ctrCrearPeriodo(){

		if(isset($_POST["btnCrearPeriodo"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPeriodo"]) || 
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCodigoPeriodo"]) ){

				$tabla = "periodos";

				$datos = [
					'NOM_PERIODO'=>$_POST["nuevoPeriodo"],
					'COD_PERIODO'=>$_POST["nuevoCodigoPeriodo"],
					'INICIO_PERIODO'=>$_POST["inicioPeriodo"],
					'FIN_PERIODO'=>$_POST["finPeriodo"],
					'INICIO_ORDINARIO'=>$_POST["inicioOrdinario"],
					'FIN_ORDINARIO'=>$_POST["finOrdinario"],
					'INICIO_EXTRAORDINARIO'=>$_POST["inicioExtraOrdinario"],
					'FIN_EXTRAORDINARIO'=>$_POST["finExtraOrdinario"],
					'FECHA_PAGO1'=>$_POST["primerPago"],
					'FECHA_PAGO2'=>$_POST["segundoPago"],
					'FECHA_PAGO3'=>$_POST["tercerPago"],
					'FECHA_PAGO4'=>$_POST["cuartoPago"]
				];
	
				//return $datos;

			$respuesta = ModeloPeriodo::mdlCrearPeriodo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El periodo ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "periodos";

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

							window.location = "periodos";

							}
						})

			  	</script>';

			}

		}

	}

	 /*=============================================
	CREAR PERIODO
	=============================================*/

	static public function ctrEditarPeriodo(){

		if(isset($_POST["btnEditarPeriodo"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPeriodo"]) || 
               preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigoPeriodo"]) ){

				$tabla = "periodos";

				$datos = [
					'NOM_PERIODO'=>$_POST["editarPeriodo"],
					'COD_PERIODO'=>$_POST["editarCodigoPeriodo"],
					'INICIO_PERIODO'=>$_POST["editarInicioPeriodo"],
					'FIN_PERIODO'=>$_POST["editarfinPeriodo"],
					'INICIO_ORDINARIO'=>$_POST["editarinicioOrdinario"],
					'FIN_ORDINARIO'=>$_POST["editarfinOrdinario"],
					'INICIO_EXTRAORDINARIO'=>$_POST["editarinicioExtraOrdinario"],
					'FIN_EXTRAORDINARIO'=>$_POST["editarfinExtraOrdinario"],
					'FECHA_PAGO1'=>$_POST["editarprimerPago"],
					'FECHA_PAGO2'=>$_POST["editarsegundoPago"],
					'FECHA_PAGO3'=>$_POST["editartercerPago"],
					'FECHA_PAGO4'=>$_POST["editarcuartoPago"],
					'ID_PERIODO'=>$_POST["IdPeriodo"]
				];
	
			//return $datos;

			$respuesta = ModeloPeriodo::mdlEditarPeriodo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El periodo ha sido ctualizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "periodos";

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

							window.location = "periodos";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	BORRAR PERIODO
	=============================================*/

	static public function ctrBorrarPeriodo(){

		if(isset($_GET["idPeriodo"])){

			$tabla ="periodos";
			$datos = $_GET["idPeriodo"];

			$respuesta =ModeloPeriodo::mdlBorrarPeriodo($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El periodo ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "periodos";

									}
								})

					</script>';
			}
		}
		
	}



	static public function ctrPeriodoActual(){

		$tabla= 'periodos';

		$item='ID_PERIODO';

		$respuesta =  ModeloPeriodo::mdlPeriodoActual($tabla,$item);


		return $respuesta;
	}

}

?>