<!--PERDIL DE VISITANTE-->
<?php include ("autenticacion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="..\css\bootstrap.css">

    <link rel="stylesheet" type="text/css" href="..\Estilos\styles_menu.css"/>
    <link rel="stylesheet" type="text/css" href="..\Estilos\fonts.css"/>
    <link rel="stylesheet" type="text/css" href="..\Estilos\estilos.css"/>
    <link rel="stylesheet" type="text/css" href="..\css\bootstrap-grid.css">

    <script  src="..\js\registration.js"></script>
    <script src="..\js\jquery-3.1.1.min.js"></script>
    <script  src="..\js\menu.js"></script>
</head>
<body >
  <header>
    <div class="menu_bar">
      	<a class="bt-menu" href="#" style="font-size: 27px"><span class="icon-menu"></span>Codigo de acceso</a>
    </div>
    <nav class="nav_bar">
      <ul  >
        <li class=" menu_P">
          <a  href="#" id="menu" onclick="menu('<?php echo $_SESSION["ciudadelas"];?>')"><span class="icon-home" ></span>Inicio</a>
        </li>
        <li>
          <div class="menu1_bar menu_P">
             <a class="bt1-menu" href="#" id="codigo" onclick="intervaloV('<?php echo $_SESSION["status"];?>')"><span class="icon-upload2"></span>Invitaciones</a>
          </div>
        </li>
        <li>
          <div class="menu4_bar menu_P">
             <a class="bt4-menu" href="#"  id="perfil" onclick="perfil('<?php echo $_SESSION["ciudadelas"];?>')"><span class="icon-upload2"></span>Perfil</a>
          </div>
        </li>
        <li><a href="?link=1" name="link1" id="link1" onclick="limpiar()"><span class="icon-cross"></span>Cerrar Sesión</a></li>
      </ul>
    </nav>
    <nav class="nav2_bar">
      <ul class=" menu_P">
        <li><a  href="#" id="enviados" onclick="invitacionN('<?php echo $_SESSION["invitacion"];?>')" ><span class="icon-upload2"></span>Normal</a></li>
        <li><a href="#" id="recibidos" onclick="invitacionR('<?php echo $_SESSION["invitacion"];?>')" ><span class="icon-download2"></span>Recurrente</a></li>
      </ul>
    </nav>
  </li>
    <?php
      if(isset($_GET['link'])){
          $link=$_GET['link'];
          if ($link == '1'){
              session_destroy();
              header("Location: index.php");
              exit();
          }
      }
    ?>
	</header>
  <div class="prueba menu_P">
  <div class="container-fluid">
    <div class="container1">
      <div class="bloquear table-responsive text-nowrap"  >
        <div>
          <label for="nombres" ><b>Nombres</b></label>
          <input type="text" id="nombres" value="<?php echo $_SESSION["nombres"];?>" disabled>
        </div>
        <div>
          <label for="apellidos"><b>Apellidos</b></label>
          <input type="text" id="apellidos" value="<?php echo $_SESSION["apellidos"];?>" disabled>
        </div>
        <div>
          <label for="cedula"><b>Cedula</b></label>
          <input type="text" id="cedula" value="<?php echo $_SESSION["id"];?>"  disabled >
        </div>
    </div >
    </div>
    </div>
  </div>
</body>
</html>
