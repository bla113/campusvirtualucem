<?php

class ControladorMateria
{

    /*=============================================
	CREAR MATERIA
	=============================================*/

    static public function ctrCrearMateria()
    {

        if (isset($_POST["btnCrearMateria"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreMateria"])) {
              
               
               
             $Requisitos= json_encode($_POST["requisitosMateria"]);
                


                $tabla = "materias";

                $datos = array(
                    "NOM_MATERIA" => $_POST["nuevoNombreMateria"],
                    "COD_MATERIA" => $_POST["nuevoCodigoNateria"],
                    "CREDITOS" => $_POST["creditosMateria"],
                    "ID_GRUPO" => $_POST["grupoMateria"],
                    "COD_REQUISITO" => $Requisitos,
                );

              //  return $datos;


                $respuesta = ModeloMateria::mdlIngresarMateria($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "La materia ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "agregar-materia";

									}
								})

					</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡La materia no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "agregar-materia";

							}
						})

			  	</script>';
            }
        }
    }

    /*=============================================
	MOSTRAR MATERIA
	=============================================*/

    static public function ctrMostrarMateria($item, $valor)
    {

        $tabla = "vista_materias_grupos";

        $respuesta = ModeloMateria::mdlMostrarMateria($tabla, $item, $valor);

        return $respuesta;
    }


     /*=============================================
	MOSTRAR PREMATRICULAS POR ESTUDIANTE
	=============================================*/

    static public function ctrMostrarPrematriculas($valor1)
    {

        $tabla = "vista_detalle_matricula";
        
        //$valor1=2;
        $valor2=1;//estdo del detalle de matricula
        $item1='ID_ESTUDIANTE';
        
        $item2='DETALLE_ESTADO';

        $respuesta = ModeloMatricula::mdlMostrardetallesMatricula($tabla, $item1, $item2,$valor1,$valor2);

        return $respuesta;
    }

    static public function ctrMostrarMateriaPorGrupo($item, $valor)
    {

        $tabla = "materias";

        $respuesta = ModeloMateria::mdlMostrarMateriaPorGrupo($tabla, $item, $valor);

        return $respuesta;
    }

    

    /*=============================================
	EDITAR MATERIA
	=============================================*/

    static public function ctrEditarMateria()
    {

        if (isset($_POST["btnEditarMateria"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreMateria"])){
               

                $idGrupoMateria = $_POST["IdgrupoNuevo"]== "" ? $_POST["IdgrupoActual"]  : $_POST["IdgrupoNuevo"]  ;
                $requisitosMateria = $_POST["nuevosRequisitosMateria"]!= "" ?  $_POST["nuevosRequisitosMateria"]  : $_POST["requisitosActuales"]   ;
                



                $tabla = "materias";


              
                $datos = array(
                    "NOM_MATERIA" => $_POST["editarNombreMateria"],
                    "COD_MATERIA" => $_POST["editarcodigoMateria"],
                    "CREDITOS" => $_POST["editarCreditosMateria"],
                    "ID_GRUPO" => $idGrupoMateria,
                    "COD_REQUISITO" =>json_encode($requisitosMateria)  ,
                    "ID_MATERIA"=>$_POST["IdMateria"]
                );

                // return $datos;

                $respuesta = ModeloMateria::mdlEditarMateria($tabla, $datos);
                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "La materia  ha sido actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "materias";

									}
								})

					</script>';

                
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡La materia no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "materias";

							}
						})

			  	</script>';
            }
        }
    }

    /*=============================================
	BORRAR MATERIA
	=============================================*/

    static public function ctrBorrarMateria()
    {

        if (isset($_GET["idMateria"])) {

            $tabla = "materias";
            $datos = $_GET["idMateria"];

            $respuesta = ModeloMateria::mdlBorrarMateria($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "La materia  ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "materias";

									}
								})

					</script>';
            }
        }
    }


     /*=============================================
	MOSTRAR MATERIAS APROBADAS
	=============================================*/
    static public function ctrMostrarMateriasAprobadas($valor1)
    {

        $tabla = "vista_materia_estudiante";

        $item1= 'ID_ESTUDIANTE';

       //$valor1=3;//ID  ESTUDIANTE
        $valor2=2;//ID DEL ESTADO DE LA MATERIA

        $item2='ID_ESTADO_MATERIA';

        $respuesta = ModeloMateria::mdlMostrarMateriasAprobadas($tabla,$item1, $valor1,$item2,$valor2);

        return $respuesta;
    }


}
