<?php
include ("autenticacion.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>QR TICKET</title>
    <link rel="stylesheet" type="text/css" href="css\bootstrap.css">

    <link rel="stylesheet" type="text/css" href="Estilos\styles_menu.css"/>
    <link rel="stylesheet" type="text/css" href="Estilos\fonts.css"/>
    <link rel="stylesheet" type="text/css" href="Estilos\estilos.css"/>
    <link rel="stylesheet" type="text/css" href="css\bootstrap-grid.css">
    <link rel ="icon" type="text/css"  href = "images\logo.ico"/>
    <script  src="js\registration.js"></script>
    <script src="js\jquery-3.1.1.min.js"></script>
    <script  src="js\menu.js"></script>

</head>
<body >
  <header>
    <div class="menu_bar">
      <a class="bt-menu" href="#" style="font-size: 27px"><span class="icon-menu"></span>QR TICKET</a>
    </div>
    <nav class="nav_bar">
      <ul  >
        <li class=" menu_P">
          <a  href="main.php" id="menu" onclick="menu('<?php echo $_SESSION["ciudadelas"];?>')"><span class="icon-home" ></span>Inicio</a>
        </li>
        <li>
          <div class="menu1_bar menu_P">
             <a class="bt1-menu" href="#" id="codigo" onclick="intervalo('<?php echo $_SESSION["status"];?>')"><span class="icon-list2"></span>Código De Acceso</a>
          </div>
        </li>
        <li>
          <div class="menu2_bar">
             <a class="bt2-menu" href="#" onclick="limpiar()"><span class="icon-uusers"></span>Enviar Invitación</a>
          </div>
        </li>
        <li>
          <div class="menu4_bar menu_P">
             <a class="bt4-menu" href="#"  id="perfil" onclick="perfil('<?php echo $_SESSION["ciudadelas"];?>')"><span class="icon-user-tie"></span>Perfil</a>
          </div>
        </li>
        <li><a href="?link=1" name="link1" id="link1" onclick="limpiar()"><span class="icon-exit"></span>Cerrar Sesión</a></li>
      </ul>
    </nav>
    <nav class="nav2_bar">
      <ul class=" menu_P">
        <li><a  href="#" id="enviados" onclick="invitacionN('<?php echo $_SESSION["invitacion"];?>')" ><span class="icon-upload2"></span>Normal</a></li>
        <li><a href="#" id="recibidos" onclick="invitacionR('<?php echo $_SESSION["invitacion"];?>')" ><span class="icon-upload2"></span>Recurrente</a></li>
      </ul>
    </nav>
  </li>
	</header>
  <div class="prueba menu_P">
    <div class="container-fluid">
      <div class="container12">
          <div class="col2">
              <h1>Invitación Generada</h1>
          </div>
          <div class="Image_container">
            <img src="images\logo.png" alt="Avatar" class="logoA" >
          </div>
          <div class="botonA" >
              <button  class="tableB" onclick="salir()">Salir</button>
              <?php  $resultado1="Hola, ".$_SESSION["nombres"]." te ha dado acceso a su ciudadela. Para obtener ese acceso, descarga nuestra app y regístrate: https://google.com"?>
              <button onclick="compartir1('<?php echo $resultado1;?>')" class="tableB">Compartir</button>
          </div >
      </div>
    </div>
  </div>
</body>
</html>
