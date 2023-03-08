<?php
  //Inicio la sesión
  session_start();
  //COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
  if (isset($_SESSION['autenticado'])) {
    if ($_SESSION["autenticado"] != "SI") {
    //si no existe, va a la página de autenticacion
    header("Location: login.php");
    //salimos de este script
    exit();
    }
  }else{
    header("Location: login.php");
    //salimos de este script
    exit();
  }
?>