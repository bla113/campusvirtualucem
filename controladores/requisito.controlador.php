<?php

class ControladorRequisito
{

    /*=============================================
	CREAR REQUISITO
	=============================================*/

    static public function ctrCrearRequisito()
    {

        if (isset($_POST["btnCrearRequisito"])) {


            $tabla = "requisitos";

            $datos = array(
                "ID_MATERIA" => $_POST["nuevaMateria"],
                "ID_CARRERA" => $_POST["nuevaCarrera"],
                "ID_PLAN_CARRERA" => $_POST["nuvoPlanCarrera"]
            );



            $respuesta = ModeloRequsito::mdlIngresarRequsito($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El requisito ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "requisitos";

									}
								})

					</script>';
            }
        }
    }

    /*=============================================
	MOSTRAR AULA
	=============================================*/

    static public function ctrMostrarRequisito($item, $valor)
    {

        $tabla = "vista_requisitos";

        $respuesta =  ModeloRequsito::mdlMostrarRequsito($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	EDITAR AULA
	=============================================*/

    static public function ctrEditarRequisito()
  
    {

        if (isset($_POST["btnEditarRequisito"])) {

            if ($_POST["editarMateria"]!=""){
                
                $IdMateria=$_POST["editarMateria"];
            }else{
                $IdMateria=$_POST["idMateria"];
            }//Fin Validar Id MAteria
            if ($_POST["editarCarrera"]!=""){
                
                $IdCarrera=$_POST["editarCarrera"];
            }else{
                $IdCarrera=$_POST["idCarrera"];
            }//Fin VAlidar el ID Carrera
            if ($_POST["editarPlanCarrera"]!=""){
                
                $IdPlanCarrera=$_POST["editarPlanCarrera"];

            }else{
                $IdPlanCarrera=$_POST["idPlanCarrera"];
            }//Fin VAlidar el ID Carrera
            

            $tabla = "requisitos";

            $datos = array(
                "ID_MATERIA" => $IdMateria,
                "ID_CARRERA" => $IdCarrera,
                "ID_PLAN_CARRERA" => $IdPlanCarrera,
                 "ID_REQUISITO"=>$_POST["idRequisito"]

                
            );


           // return $datos;

            $respuesta = ModeloRequsito::mdlEditarRequsito($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El requisito ha sido actualaizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "requisitos";

									}
								})

					</script>';
            }
        }
    }


    /*=============================================
	BORRAR REQUISITO
	=============================================*/

    static public function ctrBorrarRequisito()
    {

        if (isset($_GET["idRequisito"])) {

            $tabla = "requisitos";
            $datos = $_GET["idRequisito"];

            $respuesta = ModeloRequsito::mdlBorrarRequsito($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El requisito  ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "requisitos";

									}
								})

					</script>';
            }
        }
    }
}
