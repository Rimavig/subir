<?php
  //Inicio la sesión
  session_start();
  //COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
  if ($_SESSION["autenticado_eventos"] != "SI") {
  //si no existe, va a la página de autenticacion
  header("Location: login.php");
  //salimos de este script
  exit();
  }
?>