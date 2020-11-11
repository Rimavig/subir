<!--MENU PRINCIPAL-->
<?php include ("autenticacion.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>QR TICKET</title>
    <link rel="stylesheet" type="text/css" href="..\css\bootstrap.css">

    <link rel="stylesheet" type="text/css" href="..\Estilos\styles_menu.css"/>
    <link rel="stylesheet" type="text/css" href="..\Estilos\fonts.css"/>
    <link rel="stylesheet" type="text/css" href="..\Estilos\estilos.css"/>
    <link rel="stylesheet" type="text/css" href="..\css\bootstrap-grid.css">
    <link rel ="icon" type="text/css"  href = "..\images\loco.ico"/>
    <link rel ="apple-touch-icon" type="text/css"  href = "..\images\loco.ico"/>
    <script  src="..\js\registration.js"></script>
    <script src="..\js\jquery-3.1.1.min.js"></script>
    <script  src="..\js\menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
    <script>
      setInterval(function() {
      	$('.notificacion').load('notificacion.php');
      },20000);
    </script>
</head>
<body>
  <header>
    <div class="notificacion">
    </div>
		<div class="menu_bar">
			<a class="bt-menu" href="#" style="font-size: 27px"><span class="icon-menu"></span>QR-TICKET</a>
		</div>

    <nav class="nav_bar">
      <ul >
				<li><a href="#" id="menu" class="prueba"><span class="icon-home"></span>Inicio</a></li>
        <li>
          <div class="menu1_bar">
    			   <a class="bt1-menu" href="#" id="aprobar"><span class="icon-search"></span>Aprobar</a>
    		  </div>
        </li>
				<li>
          <div class="menu2_bar">
             <a class="bt2-menu" href="#"><span class="icon-upload2"></span>Invitaciones</a>
          </div>
        </li>
        <li><a href="?link=1" name="link1" id="link1"><span class="icon-exit"></span>Cerrar Sesión</a></li>
			</ul>
    </nav>
    <nav class="nav2_bar prueba">
      <ul>
        <li><a href="#" id="aprobados" ><span class="icon-upload2"></span>Aprobadas</a></li>
        <li><a href="#" id="rechazados" ><span class="icon-download2"></span>Rechazadas</a></li>
        <!--li><a href="#" id="invitacion"><span class="icon-download2"></span>Crear</a></li-->
      </ul>
    </nav>
  </li>
    <?php
      if(isset($_GET['link'])){
          $link=$_GET['link'];
          if ($link == '1'){
              session_destroy();
              header("Location: login.php");
              exit();
          }
      }
    ?>
	</header>
  <div class="prueba">
  <div class="container-fluid">
    <div class="container1">
      <div class="Image_container">
          <img src="..\images\logo.png" alt="Avatar" class="logoB">
      </div>
    </div>
    </div>
  </div>
</body>
</html>
