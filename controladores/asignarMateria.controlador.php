<?php

class ControladorAsociarMateriasPlan
{

    static public function ctrAasiganarMaterias()
    {

        if (isset($_POST["btnAgregarMateria"])) {

                if (!isset($_SESSION["materias"])) {
    
    
                    $_SESSION["materias"] = [];
    
                    
                    $materias = [
    
                        'ID_MATERIA' =>$_POST["IdMateria"],
                        'COD_MATERIA' => $_POST["CodMateria"],
                        'NOM_MATERIA'=>$_POST["NomMateria"],
                        'PERIODO'=>$_POST["periodo"],
                        'ORDEN'=>$_POST["orden"]
                        
                    ];
    
                    $_SESSION["materias"][0] = $materias;

                    return json_encode($_SESSION["materias"]);
                    
    
                } else {

                    foreach($_SESSION["materias"] as $indice => $materia){

                        if($materia['ID_MATERIA']==$_POST["IdMateria"] ){

                          
                        return 0;
                
                        }

                    }
    
                    $CantidadMaterias = count($_SESSION["materias"]);
    
                    $materias = [
    
                        'ID_MATERIA' =>$_POST["IdMateria"],
                        'COD_MATERIA' => $_POST["CodMateria"],
                        'NOM_MATERIA'=>$_POST["NomMateria"],
                        'PERIODO'=>$_POST["periodo"],
                        'ORDEN'=>$_POST["orden"]
                    ];
                    $_SESSION["materias"][$CantidadMaterias] = $materias;

                    return json_encode($_SESSION["materias"]);
                
                }
    
        
            }

           
        
    
}


    static public function ctrQuitarMaterias()
    {
        if (isset($_POST["btnQuitarMateria"])) {
            $ID_MATERIA=$_POST["IdMateria"];

            foreach($_SESSION["materias"] as $indice => $materia){

                if($materia['ID_MATERIA']== $ID_MATERIA){
                    unset($_SESSION["materias"][$indice]);
                }
            }

        }


    }


    static public function ctrAsignarMateriasPlan($idMateria){

        //if (isset($_POST["btnAsignarMaterias"])) {*/

            //$materias= json_encode($_SESSION["materias"]);

            $tabla= 'materias_plan_carrera';

            $datos=[

                'ID_CARRERA'=> 1,

                'ID_PLAN_CARRERA'=>1,

                'MATERIAS'=>$idMateria


            ];


            $respuesta=ModeloAsignarMaterias::mdlAsignarMaterias($tabla,$datos);

            /*if($respuesta == "ok"){

                echo '<script>

                swal({

                    type: "success",
                    title: "¡Se ha  guardado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    if(result.value){
                    
                        window.location = "planes-carrera";

                    }

                });
            

                </script>';


            }	*/



        //}//

    
    }

    static public function ctrMostrarMateriasPlanCarrera($item,$valor){

        $tabla= 'vista_materias_del_plan_carrera';

        $respuesta = ModeloAsignarMaterias::mdMostrarMateriasPlnCarrera($tabla, $item, $valor);


        return $respuesta;
    } 

    static public function ctrMostrarMateriasSeleccionadas( $valor1,$valor2){

        $item1 = 'ID_CARRERA';

        $item2 = 'ID_PLAN_CARRERA';
        
        $tabla= 'vista_materias_del_plan_carrera';

			//$item1='ID_CARRERA';

			//$item2='ID_PLAN_CARRERA';


			//$valor1=3;

			//$valor2=3;
			
			$respuesta=ModeloAsignarMaterias::mdMostrarMateriasPlanCarreraSeleccionadas($tabla, $item1, $valor1,$item2,$valor2);
			
			return	$respuesta;
    }



}