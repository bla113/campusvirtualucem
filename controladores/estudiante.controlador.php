<?php


class ControladorEstudiante
{


    /*=============================================
  MOSTRAR ESTUDIANTE
=============================================*/

    static public function ctrMostrarEstudiante($valor)
    {
        $item='IDENTIFICACION_ESTUDIANTE';

        $tabla = "vista_estudiante";

        $respuesta = ModeloEstudiante::mdlMostrarEstudiantes($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    MOSTRAR PROXIMO NUMERO DE CARNET
=============================================*/
    static public function ctrMostraProximoCarnet()
    {

        $tabla = "carnet_estudiante";

        $item = 'NUMERO_CARNET';

        $respuesta = ModeloEstudiante::mdlNuvoCarnet($tabla, $item);

        return $respuesta;
    }

    /*=============================================
    GUARDAR CONSECUTIVO DE CARNET
=============================================*/
    static public function ctrGuardarConsecutivoCarnet($valor)
    {

        $tabla = "carnet_estudiante";



        $respuesta = ModeloEstudiante::mdlGuardarConsecutivoCarnet($tabla, $valor);

        return $respuesta;
    }


    /*=============================================
    MOSTRAR TODAS LAS MATERIAS DEL ETUDIANTE
=============================================*/

    static public function ctrMostrarMateriasEstudianteAll($valor1)
    {

        $item1 = 'ID_ESTUDIANTE';

        $tabla = 'estudiante_materia';

        $respuesta = ModeloEstudiante::mdlMostrarMateriasEstudianteAll($tabla, $item1, $valor1);

        return $respuesta;
    }

    /*=============================================
    MOSTRAR TODAS LAS PENDIENTES MATERIAS DEL ETUDIANTE
=============================================*/


    static public function ctrMostrarMateriasEstudiante($valor1)
    {

        $item1 = 'ID_ESTUDIANTE';

        $item2 = 'ID_ESTADO_MATERIA';

        $tabla = 'vista_estudiante_materia';

        $valor2 = 1; //ID DE MATERIAS PENDIENTES

        $respuesta = ModeloEstudiante::mdlMostrarMateriasEstudiante($tabla, $item1, $valor1, $item2, $valor2);

        return $respuesta;
    }


    /*=============================================
    MOSTRAR TODAS LAS MATERIAS APROBADAS DEL ETUDIANTE
=============================================*/


    static public function ctrMostrarMateriasAprobadasEstudiante($valor1)
    {

        $item1 = 'ID_ESTUDIANTE';

        $item2 = 'ID_ESTADO_MATERIA';

        $tabla = 'vista_estudiante_materia';

        $valor2 = 2; //ID DE MATERIAS APROBADAS

        // $tabla = 'vista_materia_estudiante';

        $respuesta = ModeloEstudiante::mdlMostrarMatriasAprobadasEstudiante($tabla, $item1, $valor1, $item2, $valor2);

        return $respuesta;
    }

    /*=============================================
    MOSTRAR TODAS LAS MATERIAS CONVALIDADAS DEL ETUDIANTE
=============================================*/


    static public function ctrMostrarMateriasConvalidadasEstudiante($valor1)
    {


        $item1 = 'ID_ESTUDIANTE';

        $item2 = 'ID_ESTADO_MATERIA';

        $tabla = 'vista_estudiante_materia';

        $valor2 = 3; //ID DE MATERIAS CONVALIDADAS

        //$tabla = 'vista_materia_estudiante';

        $respuesta = ModeloEstudiante::mdlMostrarMatriasConvalidasEstudiante($tabla, $item1, $valor1, $item2, $valor2);

        return $respuesta;
    }

   /*=============================================
    MOSTRAR TODAS LAS MATERIAS MATRICULADAS DEL ETUDIANTE
=============================================*/
    static public function ctrMostrarMateriasMatriculadasEstudiante($valor1)
    {


        $item1 = 'ID_ESTUDIANTE';

        $item2 = 'ID_ESTADO_MATERIA';

        $tabla = 'vista_estudiante_materia';

        $valor2 = 3; //ID DE MATERIAS MATRICULADAS

        //$tabla = 'vista_materia_estudiante';

        $respuesta = ModeloEstudiante::mdlMostrarMatriasMatriculadasEstudiante($tabla, $item1, $valor1, $item2, $valor2);

        return $respuesta;
    }
    /*=============================================
  BUSCAR ESTUDIANTE
=============================================*/
    static public function ctrBuscarEstudiante()
    {
 
        if (isset($_POST["BTNBUSCARCEDULA"])) {

            if (preg_match('/^[0-9]+$/', $_POST["buscarIdentificacion"])) {

                $tabla = "padron_electoral";

                $item = "IDENTIFICACION";

                $valor =  $_POST["buscarIdentificacion"];




                $respuesta = ModeloEstudiante::mdlBuscarIdentificacion($tabla, $item, $valor);


                if ($respuesta != "" || !empty($respuesta) || $respuesta != null) {
                    return $respuesta;
                }
            } else {

                echo '<script>

                swal({
                      type: "error",
                      
                      title: "¡La cedula no puede ir vacía o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "crear-estudiante1";

                        }
                    })

              </script>';
            }
        }
    }

    /*=============================================
CREAR ESTUDIANTE
=============================================*/
    static public function ctrCrearEstudiante()
    {

        if (isset($_POST['btnGuardarEstudiante'])) {

            $Identificacion = $_POST['nuevaIdentifiacion'];

            $ruta = "";
            $TITULO = 'BACHILLERATO';
            $CEDULA = 'CEDULA';
            /*=============================================
				VALIDAR TITULO 
				=============================================*/

            $rutaTitulo = '';
            //Recogemos el archivo enviado por el formulario
            $archivo = $_FILES['nuevoTituloEstudiante']['name'];

            //Si el archivo contiene algo y es diferente de vacio
            if (isset($archivo) && $archivo != "") {

                //Obtenemos algunos datos necesarios sobre el archivo
                $tipo = $_FILES['nuevoTituloEstudiante']['type'];

                $tamano = $_FILES['nuevoTituloEstudiante']['size'];

                $temp = $_FILES['nuevoTituloEstudiante']['tmp_name'];
                //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                if (!((strpos($tipo, "pdf")) && ($tamano < 2000000))) {

                    echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                      - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                } else {
                    //Si la imagen es correcta en tamaño y tipo
                    //Se intenta subir al servidor
                    //$aleatorio = mt_rand(100,999);
                    if (!file_exists('adjuntos/' . $Identificacion)) {
                        mkdir('adjuntos/' . $Identificacion, 077);
                    }

                    if (move_uploaded_file($temp, 'adjuntos/' . $Identificacion . '/' . $Identificacion . '_' . $TITULO . ".pdf")) {


                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod('adjuntos/' . $Identificacion . '/' . $Identificacion . '_' . $TITULO . ".pdf", 0777);
                        $rutaTitulo = 'adjuntos/' . $Identificacion . '/' . $Identificacion . '_' . $TITULO . ".pdf";
                        //Mostramos el mensaje de que se ha subido co éxito

                    } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                    }
                }
            } /* TERMINA VALIDAR TITULO*/

            /*=============================================
				VALIDAR CEDULA 
				=============================================*/
            $rutaCedula = '';
            //Recogemos el archivo enviado por el formulario
            $archivo = $_FILES['nuevoCedulaEstudiante']['name'];

            //Si el archivo contiene algo y es diferente de vacio
            if (isset($archivo) && $archivo != "") {

                //Obtenemos algunos datos necesarios sobre el archivo
                $tipo = $_FILES['nuevoCedulaEstudiante']['type'];

                $tamano = $_FILES['nuevoCedulaEstudiante']['size'];

                $temp = $_FILES['nuevoCedulaEstudiante']['tmp_name'];
                //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                if (!((strpos($tipo, "pdf")) && ($tamano < 2000000))) {

                    echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                          - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                } else {
                    //Si la imagen es correcta en tamaño y tipo
                    //Se intenta subir al servidor
                    //$aleatorio = mt_rand(100,999);
                    if (!file_exists('adjuntos/' . $Identificacion)) {
                        mkdir('adjuntos/' . $Identificacion, 077);
                    }

                    if (move_uploaded_file($temp, 'adjuntos/' . $Identificacion . '/' . $Identificacion . '_' . $CEDULA . ".pdf")) {


                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod('adjuntos/' . $Identificacion . '/' . $Identificacion . '_' . $CEDULA . ".pdf", 0777);
                        $rutaCedula = 'adjuntos/' . $Identificacion . '/' . $Identificacion . '_' . $CEDULA . ".pdf";
                        //Mostramos el mensaje de que se ha subido co éxito

                    } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                    }
                }
            } /* TERMINA VALIDAR TITULO*/





            $tabla = "estudiante";


            $datos = [
                'NOMBRE_COMPLETO' => rtrim($_POST['nuevoNombre']),
                'PRIMER_APELLIDO' => rtrim($_POST['nuevoApellido1']),
                'SEGUNDO_APELLIDO' => rtrim($_POST['nuevoApellido2']),
                'TIPO_IDENTIFICACION' => rtrim($_POST['nuevoTipoIentificacion']),
                'IDENTIFICACION_ESTUDIANTE' => rtrim($_POST['nuevaIdentifiacion']),
                'PROVINCIA_ESTUDIANTE' => $_POST['nuevaProvincia'],
                'CANTON_ESTUDIANTE' => $_POST['nuevoCanton'],
                'DISTRITO_ESTUDIANTE' => $_POST['nuevoDistrito'],
                'OTRAS_SENAS_ESTUDIANTE' => $_POST['otrasSenas'],
                'TELEFONO_ESTUDIANTE' => $_POST['nuevoTelefono'],
                'CELULAR_ESTUDIANTE' => $_POST['nuevoCelular'], 
                'LABORA_ESTUDIANTE' => $_POST['nuevoTrabajo'],
                'FECHA_NACIMIENTO' => $_POST['nuevofNacimiento'],
                'ESTADO_CIVIL' => $_POST['nuevoEstadoCivil'],
                'PROCEDE_ESTUDIANTE' => $_POST['procedeExtudante'],
                'ID_CARRERA' => $_POST['nuevaCarrera'],
                'ID_PLAN_CARRERA' => $_POST['nuevoPlanCarrera'],
                'TURNO' => $_POST['nuevoTurno'],
                'TITULO_ESTUDIANTE' => $rutaTitulo,
                'CEDULA_ESTUDIANTE' => $rutaCedula,
                'NUM_CARNE' => $_POST['nuevoCarnetEstudiante'],
                'CORREO_ESTUDIANTE' => $_POST['nuevoCorreoEstudiante'],


            ];
            





            $Consecutivo_carnet = ControladorEstudiante::ctrGuardarConsecutivoCarnet($_POST['consecutivoCarnet']);

            $TIPO_IDENTIFICACION = rtrim($_POST['nuevaIdentifiacion']);

            //return $datos;


            $respuesta = ModeloEstudiante::mdlCrearEstudiante($tabla, $datos);

            if ($respuesta == "ok") {

                $NombreUsuario = rtrim($_POST['nuevoNombre']);
                $Identificacion = rtrim($_POST['nuevaIdentifiacion']);
                $CorreoEstudiante= $_POST['nuevoCorreoEstudiante'];
                
                //  $Notificacion = ControladorSMSNotificaciones::crenotificacionCrearEstudiante($TIPO_IDENTIFICACION);
                $crearUsuario = ControladorUsuarios::ctrCrearDesdeRegistro($NombreUsuario, $Identificacion, $CorreoEstudiante);

                if ($crearUsuario == "ok") {
                    echo '<script>
    
                        swal({
    
                            type: "success",
                            title: "¡El estudiante ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                        }).then(function(result){
    
                            if(result.value){
                            
                                window.location = "estudiantes";
    
                            }
    
                        });
                    
    
                        </script>';


                    //return   $datos;
                }
            }
        }
    }


    /*=============================================
                EDITAR ESTUDIANTE
                =============================================*/
    static public function ctrEditarEstudiante()
    {

        if (isset($_POST["btnEditarEstudiante"])) {



            $tabla = "estudiante";



            $datos = [
                'PROVINCIA_ESTUDIANTE' => $_POST['editarProvincia'],
                'CANTON_ESTUDIANTE' => $_POST['editarCanton'],
                'DISTRITO_ESTUDIANTE' => $_POST['editarDistrito'],
                'OTRAS_SENAS_ESTUDIANTE' => $_POST['editarOtrasSenas'],
                'TELEFONO_ESTUDIANTE' => $_POST['editarTelefono'],
                'CELULAR_ESTUDIANTE' => $_POST['editarCelular'],
                'LABORA_ESTUDIANTE' => $_POST['editarTrabajo'],
                'FECHA_NACIMIENTO' => $_POST['editarfNacimiento'],
                'ESTADO_CIVIL' => $_POST['editarEstadoCivil'],
                'PROCEDE_ESTUDIANTE' => $_POST['editarprocedeExtudante'],
                'ID_ESTUDIANTE' => $_POST['idEstudiante']
            ];


            //return $datos;


            $respuesta = ModeloEstudiante::mdlEditarEstudiante($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

					swal({
						  type: "success",
						  title: "El estudiante ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estudiantes";

									}
								})

					</script>';
            }
        }
    }


    /*=============================================
	BORRAR ESTUDIANTE
	=============================================*/

    static public function ctrBorrarEstudiante()
    {

        if (isset($_GET["idEstudiante"])) {

            $tabla = "estudiante";
            $datos = $_GET["idEstudiante"];

       
            $respuesta = ModeloEstudiante::mdlBorrarEstudiante($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El estudiante ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "estudiantes";

								}
							})

				</script>';
            }
        }
    }




    /*=============================================
	MOSTRAR MOSTRAR IDENTIFICACION
	=============================================*/

    static public function ctrMostrarIdentificacion()
    {

        $tabla = 'tipo_identificacion';

        $respuesta = ModeloEstudiante::mdlMostrarIdentificacion($tabla);

        return $respuesta;
    }


    /*=============================================
	MOSTRAR MATERIAS APROBADAS SOLO ID
	=============================================*/

    static public function ctrmostrarIDAprobadas()
    {

        $valor1 = 4;
        $item1 = 'ID_ESTUDIANTE';

        $item2 = 'ID_ESTADO_MATERIA';

        $tabla = 'vista_estudiante_materia';

        $valor2 = 1; //ID DE MATERIAS APROBADAS



        $respuesta = ModeloEstudiante::mdlMostrarMatriasAprobadasEstudiante($tabla, $item1, $valor1, $item2, $valor2);



        $valor1 = 4;
        $item1 = 'ID_ESTUDIANTE';

        $item2 = 'ID_ESTADO_MATERIA';

        $tabla = 'vista_estudiante_materia';

        $valor2 = 2; //ID DE MATERIAS APROBADAS



        $Pendiente = ModeloEstudiante::mdlMostrarMatriasAprobadasEstudiante($tabla, $item1, $valor1, $item2, $valor2);






        foreach ($respuesta as $key => $materiasA) {

            $materiasAp[] = $materiasA['ID_MATERIA'];
        }


        foreach ($Pendiente as $key => $materiasPE) {

            $materiasP[] = $materiasPE['ID_MATERIA'];
        }


        $result = array_intersect($materiasAp, $materiasP);


        return $result;
        //return $materiasAp;
        //return $materiasP;
        //echo json_encode($marerias);



    }
}
