<!--VERIFICA SI EL USUARIO SE AUTENTICO Y TIENE TIEMPO DE CADUCIDAD-->

<?php
  //Inicio la sesión
  session_start();
  //COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
  if ($_SESSION["autenticado"] != "SI") {
  //si no existe, va a la página de autenticacion
  header("Location: ../menu/login.php");
  //salimos de este script
  exit();
  }

?>
