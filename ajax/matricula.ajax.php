<?php

require_once "../controladores/matricula.controlador.php";
require_once "../modelos/matricula.modelo.php";



class AjaxMatricula
{

    /*=============================================
	EDITAR HORARIO
	=============================================*/

    public $idHorariOferta;
    public $idEstudiante;
    public $idMateria;

    public function ajaxMatricula()
    {

        $valor1 = $this->idHorariOferta;
        $valor2 = $this->idEstudiante;
        $valor3 = $this->idMateria;


        $datos = [
            'ID_HORARIO_OFERTA' => $valor1 = $this->idHorariOferta,
            'ID_ESTUDIANTE' => $valor2 = $this->idEstudiante,
            'ID_MATERIA' => $valor3 = $this->idMateria,
        ];

        $respuestaCrearDetalle = ControladorMatricula::ctrCrearPrematricula($datos);

        if ($respuestaCrearDetalle) {
            $mesaje = [
                "Mensaje" => "OK",
                "mis_horarios" => 1

            ];
            echo json_encode($mesaje);
        } else {
            $mesaje = [
                "Mensaje" => "ERROR AL INSERTAR",


            ];
            echo json_encode($mesaje);
        }
    }
    /*=============================================
	VALIDAR SI YA TEINE MATRICULADA LA MATERIA
	=============================================*/
    //public $validarHorario;
    public $validarEstudiante;
    public $validarMateria;

    public  function ajaxValidarHorario()
    {
        //$valor1 =2;
        // $valor2 =1;
        $valor1 = $this->validarEstudiante;
        //$valor2 = $this->validarHorario;
        $valor3 = $this->validarMateria;
        $respuesta = ControladorMatricula::ctrMostrarIdHorariosMtricula($valor1, $valor3);

        echo json_encode($respuesta);
    }

    /*=============================================
	Eliminar Detalle de Oferta
	=============================================*/
    public $EliminarMateria;

    public  function ajaxEliminarMateria()
    {

        $valor = $this->EliminarMateria;
        $respuesta = ControladorMatricula::ctrBorrarDatella($valor);

        echo json_encode($respuesta);
    }


    /*=============================================
	VALIDAR COMRPOBANTE PAGO
	=============================================*/
    public $idValidarMatricula;

    public  function ajaxValidarComprobante()
    {

        $valor = $this->idValidarMatricula;
        $respuesta = ControladorMatricula::ctrMostrarComprobante($valor);

        echo json_encode($respuesta);
    }

    /*=============================================
	MOSTRAR DETALLE DE MATRICULA
	=============================================*/
    public $idMatricula;

    public  function  ajaxMostrarDetalleMatricula()
    {

        $valor = $this->idMatricula;

        $respuesta = ControladorMatricula::ctrMotrarMatriculasParaplicarPago($valor);

        echo json_encode($respuesta);
    }

    /*=============================================
	CAMBIAR EL ESTADO DEL AMATRICULA
	=============================================*/
    public $idMatriculaCambiEstdo;

    public  function  ajaxCambiarEstadoMatricula()
    {

        $valor = $this->idMatriculaCambiEstdo;

        $respuesta = ControladorMatricula::ctrCambiarEstadoMatricula($valor);

        echo json_encode($respuesta);
    }


    /*=============================================
	CAMBIAR EL ESTADO DEL AMATRICULA
	=============================================*/
    public $idMatriculaCapacidad;

    public  function  ajaxRestarCapacidadHorario()
    {

        $valor = $this->idMatriculaCapacidad;

        $respuesta = ControladorMatricula::ctrMotrarMatriculasParaplicarPago($valor);
        $datos = [];
        foreach ($respuesta as $horarios) {

            $array = json_decode($horarios['MATERIAS'], true);

            
                $HORARIOS_OFERTAS=array_column($array, 'ID_HORARIO_OFERTA');

               //$MATERIAS_ID=array_column($array, 'ID_MATERIA');
               foreach ($HORARIOS_OFERTAS as $key => $RestarCampo) {

                $valor=$RestarCampo;
                //echo json_encode($valor);
                $restar=ControladorMatricula::ctrRestarCapacidadHorarioOfertado($valor);
                echo json_encode($restar);
            }
            
        }

        



        //echo json_encode($HORARIOS_OFERTAS);

       
    }


    /*=============================================
	ASIGNAR EL ESTUDIANTE AL HORARIO OFERTADO
	=============================================*/

  

    public $idMatriculaCurso;
    public $idEstudianteCurso;

    public  function  ajaxAsignarEstudianteCurso()
    {

        $valor =  $this->idMatriculaCurso;
        $idEstudiante=$this->idEstudianteCurso;
        $materias = ControladorMatricula::ctrMostraMatriculasParaAsignarCurso($valor);

        
         //Metodo para asignar el estudiante al curso 

         

            foreach ($materias as $materia) {

                $array = json_decode($materia['MATERIAS'], true);

                foreach($array as $mate){

                    $tablaCurso = 'curso_estudiante';

                    $datosCurso = [
                        'ID_ESTUDIANTE' => $idEstudiante,
                        'ID_HORARIO_OFERTA' => $mate['ID_HORARIO_OFERTA']
                    ];
                    $AsignarCurso = ModeloMatricula::mdlAsiganarCursoEstudiante($tablaCurso, $datosCurso);
                    
                }

                echo json_encode($AsignarCurso);
                
            }
       
           
    
    } 
/*=============================================
CAMBIAR EL ESTADO DEL LA MATERIA ESTUDINATE A MATRICULADA
=============================================*/
public $idEstudianteCambio;
public $idMatriculaCambio;


public  function  ajaxCambiarEstadoMateriaEstudiante()
{

    $valor =  $this->idMatriculaCambio;
    $idEstudiante=$this->idEstudianteCambio;
    $materiasMtariculadas = ControladorMatricula::ctrMostraMatriculasParaAsignarCurso($valor);

    
     //Metodo para asignar el estudiante al curso 

     

        foreach ($materiasMtariculadas as $materia) {

            $matriculas = json_decode($materia['MATERIAS'], true);

            foreach($matriculas as $mate){

                $datos = [
                    'ID_ESTUDIANTE' => $idEstudiante,
                    'ID_MATERIA' => $mate['ID_MATERIA']
                ];
                $cambiarEstadoMateria = ControladorMatricula::ctrCambiarEstadoMateriaEstudiante($datos);
                
            }

            echo json_encode( $cambiarEstadoMateria);
            
        }
   
        //echo json_encode($materiasMtariculadas);
            

} 

        
}
    


/*=============================================
EDITAR HORARIO
=============================================*/
if (isset($_POST["idHorariOferta"])) {

    $agregar = new AjaxMatricula();
    $agregar->idHorariOferta = $_POST["idHorariOferta"];
    $agregar->idEstudiante = $_POST["idEstudiante"];
    $agregar->idMateria = $_POST["idMateria"];
    $agregar->ajaxMatricula();
}

/*=============================================
EDITAR HORARIO
=============================================*/

if (isset($_POST["ValidaMateria"])) {

    $valHorario = new AjaxMatricula();
    //$valHorario->validarHorario = $_POST["ValidadHorario"];
    $valHorario->validarEstudiante = $_POST["ValidaEstudiante"];
    $valHorario->validarMateria = $_POST["ValidaMateria"];
    $valHorario->ajaxValidarHorario();
}

/*=============================================
	VALIDAR SI YA TEINE MATRICULADA LA MATERIA
	=============================================*/

if (isset($_POST["idHorarioOfertaEliminar"])) {

    $Eliminar = new AjaxMatricula();
    $Eliminar->EliminarMateria = $_POST["idHorarioOfertaEliminar"];
    $Eliminar->ajaxEliminarMateria();
}


/*=============================================
	VALIDAR VALIDAR COMPROBANTE
	=============================================*/
if (isset($_POST["idValidarMatricula"])) {

    $validar = new AjaxMatricula();
    $validar->idValidarMatricula = $_POST["idValidarMatricula"];
    $validar->ajaxValidarComprobante();
}



/*=============================================
	MOTRAR DETALLE DE MATRICULA
	=============================================*/
if (isset($_POST["idMatricula"])) {

    $mostrar = new AjaxMatricula();
    $mostrar->idMatricula = $_POST["idMatricula"];
    $mostrar->ajaxMostrarDetalleMatricula();
}


/*=============================================
	CMABIAR EL ESTADO DEL LA MATRICULA
	=============================================*/
if (isset($_POST["idMatriculaCambiEstdo"])) {

    $cambiar = new AjaxMatricula();
    $cambiar->idMatriculaCambiEstdo = $_POST["idMatriculaCambiEstdo"];
    $cambiar->ajaxCambiarEstadoMatricula();
}

/*=============================================
	CMABIAR CAPACIDAD DE HORARIO OFERTA
	=============================================*/
if (isset($_POST["idMatriculaCapacidad"])) {

    $capacidad = new AjaxMatricula();
    $capacidad->idMatriculaCapacidad = $_POST["idMatriculaCapacidad"];
    $capacidad->ajaxRestarCapacidadHorario();
}
/*=============================================
	AGREGAR EL ESTUDIANTE AL CURSO OFERTADO
	=============================================*/

    if (isset($_POST["idMatriculaCurso"])) {

        $asignar = new AjaxMatricula();
        $asignar->idMatriculaCurso = $_POST["idMatriculaCurso"];
        $asignar->idEstudianteCurso = $_POST["idEstudianteCurso"];
        $asignar->ajaxAsignarEstudianteCurso();
    }


    /*=============================================
	CAMBIAR EL ESTADO DEL LA MATERIA ESTUDIANTE MATERIA
	=============================================*/

    if (isset($_POST["idEstudianteCambio"])) {

        $CambiaEstado = new AjaxMatricula();
        $CambiaEstado->idEstudianteCambio = $_POST["idEstudianteCambio"];
        $CambiaEstado->idMatriculaCambio = $_POST["idMatriculaCambio"];
        $CambiaEstado->ajaxCambiarEstadoMateriaEstudiante();
    }