
<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once 'vendor/autoload.php';
    use Twilio\Rest\Client;

    $sid    = "AC6a5a3dc923eb8ff2cb199d30e9a568fc";
    $token  = "04faed05a54ffb47b6078ebdd5c5fc1e";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("+50684226664", // to
        array(
          "from" => "+19793786528",
          "body" =>" Hola Soy Una Prueba",
        )
      );

print($message->sid);