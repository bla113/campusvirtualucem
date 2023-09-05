<?php
  require_once 'twilo/vendor/autoload.php';
  use Twilio\Rest\Client;

class ControladorSMSNotificaciones{


    /* Crecion de Estudiante */

    static public function crenotificacionCrearEstudiante($identificacion){

      
    
        $sid    = "AC6a5a3dc923eb8ff2cb199d30e9a568fc";
        $token  = "04faed05a54ffb47b6078ebdd5c5fc1e";
        $twilio = new Client($sid, $token);
    
        $message = $twilio->messages
          ->create("+50684226664", // to
            array(
              "from" => "+19793786528",
              "body" =>"Tu Cuaneta ha sido creada con exito, Su Identificaciones:.$identificacion",

            )
          );
    
    print($message->sid);

    }



}


?>