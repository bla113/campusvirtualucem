<?php
require_once 'extenciones/twilio-php/src/Twilio/autoload.php';

use Twilio\Rest\Client;

class ControladorNotificacionWathsapp
{


    static public function ctrNotificacionPrueba()
    {

        if (isset($_POST['btnWhatsapp'])) {


            $Mensaje = $_POST['asuntoMensaje'];
            $Mi_Numero = '+50684226664';
            $sid    = "ACbe89db6c03321dee0479c4060ecd7efd";
            $token  = "c5d8d407d28c91d435ddbaaa75f38866";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
                ->create(
                    "whatsapp:$Mi_Numero", // to
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" =>  $Mensaje
                    )
                );

            echo '<script>
    
                        swal({
    
                            type: "success",
                            title: "¡Mensaje Enviado correctamente  ' . $message->sid . '!",
                            
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                        }).then(function(result){
    
                            if(result.value){
                            
                                window.location = "envioWatsapp";
    
                            }
    
                        });
                    
    
                        </script>';
        }
    }
}
