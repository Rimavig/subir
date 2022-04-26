<?php
  //Inicio la sesión
  session_start();
  //COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
  if ($_SESSION["autenticado"] != "SI") {
    //si no existe, va a la página de autenticacion
    session_destroy();
    header("Location: /qrticket/TSA-Frontend/TSA/layout1/angularjs/app/login.php");
    exit();
  }else{
    if ($_SESSION["autenticado"] != "SI") {
      //si no existe, va a la página de autenticacion
      session_destroy();
      header("Location: /qrticket/TSA-Frontend/TSA/layout1/angularjs/app/login.php");
      exit();
    }
  }
?>