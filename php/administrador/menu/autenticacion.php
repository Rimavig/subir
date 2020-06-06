<!--VERIFICA SI EL USUARIO SE AUTENTICO Y TIENE TIEMPO DE CADUCIDAD-->

<?php
  //Inicio la sesión
  session_start();
  //COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
  if ($_SESSION["autenticado"] != "SI") {
  //si no existe, va a la página de autenticacion
  header("Location: ../menu/index.php");
  //salimos de este script
  exit();
  }
  $inactividad = 600;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
              header("Location: ../menu/index.php");
            exit();
        }
    }
    // El siguiente key se crea cuando se inicia sesión

?>
