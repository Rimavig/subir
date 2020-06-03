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
    <title>Menu</title>
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
			<a class="bt-menu" href="#" style="font-size: 27px"><span class="icon-menu"></span>Menu</a>
		</div>

    <nav class="nav_bar">
      <ul >
				<li><a href="#" id="menu"><span class="icon-home"></span>Inicio</a></li>
        <li>
          <div class="menu1_bar">
    			   <a class="bt1-menu" href="#"><span class="icon-upload2"></span>Buscar</a>
    		  </div>
        </li>
				<li>
          <div class="menu2_bar">
             <a class="bt2-menu" href="#"><span class="icon-upload2"></span>Invitaciones</a>
          </div>
        </li>
        <!--li>
          <div class="menu3_bar">
             <a class="bt3-menu" href="#"><span class="icon-upload2"></span>Estadistica</a>
          </div>
        </li-->
        <li>
          <div class="menu4_bar">
             <a class="bt4-menu" href="#"><span class="icon-upload2"></span>Generar</a>
          </div>
        </li>
        <li><a href="?link=1" name="link1" id="link1"><span class="icon-cross"></span>Cerrar Sesión</a></li>
			</ul>
    </nav>
    <nav class="nav1_bar">
      <ul >
				<li><a href="#" id="ciudadela" ><span class="icon-upload2"></span>Ciudadela</a></li>
        <li><a href="#" id="usuarioB" ><span class="icon-download2"></span>Usuario</a></li>
        <li><a href="#" id="familia"><span class="icon-download2"></span>Visitantes</a></li>
        <li><a href="#" id="ingreso"><span class="icon-download2"></span>Ingreso</a></li>
			</ul>
    </nav>
    <nav class="nav2_bar">
      <ul>
        <li><a href="#" id="enviados" ><span class="icon-upload2"></span>Enviadas</a></li>
        <li><a href="#" id="recibidos" ><span class="icon-download2"></span>Ingresadas</a></li>
        <!--li><a href="#" id="invitacion"><span class="icon-download2"></span>Crear</a></li-->
      </ul>
    </nav>
    <nav class="nav3_bar">
      <ul>
        <li><a href="#" id="resumida" ><span class="icon-upload2"></span>Resumida</a>
        <li><a href="#" id="global" ><span class="icon-download2"></span>Global</a></li>
      </ul>
    </nav>
    <nav class="nav4_bar">
      <ul>
        <li><a href="registration.php" ><span class="icon-users"></span>Residente</a>
        <li><a href="registrationV.php" ><span class="icon-users"></span>Visitante</a>
        <li><a href="#" id="aprobacion" ><span class="icon-users"></span>Aprobación</a>
        <!--li><a href="#" id="codigo"><span class="icon-users"></span>Codigo</a-->
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
  <div class="prueba">
  <div class="container-fluid">
    <div class="container1">
      <div class="Image_container">
          <img src="..\images\espol.png" alt="Avatar" class="logo">
      </div>
    </div>
    </div>
  </div>
</body>
</html>
