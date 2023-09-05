<?php

require_once "../modelos/estudiante.modelo.php";
//require_once "../modelos/aula.modelo.php";

class AjaxBusquedaIdentificacion{

	/*=============================================
	BUSCAR iDENTIFICACION
	=============================================*/	

	public $identificacion;
 
	public function ajaxBuscarIdentificacion(){

		$item = "IDENTIFICACION";
		$valor = $this->identificacion;
        $tabla = "padron_electoral";
    
        $respuesta = ModeloEstudiante::mdlBuscarIdentificacion($tabla, $item, $valor);


		echo json_encode($respuesta);

	}

	

	
}

/*=============================================
BUSCAR IDENTIFICACION
=============================================*/
if(isset($_POST["BuscarIdentifiacion"])){

	$buscar = new AjaxBusquedaIdentificacion();
	$buscar -> identificacion = $_POST["BuscarIdentifiacion"];
	$buscar -> ajaxBuscarIdentificacion();

}

