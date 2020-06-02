<!--MENU RESIDENTE-->
<?php
include ("autenticacion.php");
$GLOBALS['THRIFT_ROOT'] = 'C:\\Users\\rwiva\\Downloads\\thrift-0.11.0\\thrift-0.11.0\\lib\\php\\lib\\';

require_once 'servidor/Types.php';
require_once 'servidor/Servidor.php';

require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Protocol/TProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Transport/TBufferedTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Type/TMessageType.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Factory/TStringFuncFactory.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/StringFunc/TStringFunc.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/StringFunc/Core.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift/Type/TType.php';
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\TSocketPool;
use Thrift\Transport\TFramedTransport;
use Thrift\Transport\TBufferedTransport;

$host = '127.0.0.1';
$port = 7912;
$socket = new Thrift\Transport\TSocket($host,$port);
$transport = new TBufferedTransport($socket);
$socket->setRecvTimeout("5000");
$protocol = new TBinaryProtocol($transport);
$client = new ServidorClient($protocol);
$transport->open();
$resultado=$resultado1= "";
$resultado2= "";
if (isset($_GET["tipo"]) ) {
  $resultado2= $_GET["tipo"];
}
if (isset($_POST["tipo"]) ) {
  $resultado2= $_GET["tipo"];
}

if (isset($_GET["ciudadela"]) ) {
  $var1 = $_GET['ciudadela'];
    $_SESSION["ciudadela"]= $var1;
    $re = $client->registro("usuario, ".$_SESSION["usuario"].", ".$_SESSION["ciudadela"]);
    $resultado = "".$re;
    $dato = explode(',',$resultado);
      $cont = count($dato);
    if ($cont>6) {
      if (isset($dato[0])) {$_SESSION["id"]= $dato[0]; }
      if (isset($dato[1])) {$_SESSION["nombres"]= $dato[1]; }
      if (isset($dato[2])) {$_SESSION["apellidos"]= $dato[2]; }
      if (isset($dato[3])) {$_SESSION["genero"]= $dato[3]; }
      if (isset($dato[4])) {$_SESSION["correo"]= $dato[4]; }
      if (isset($dato[5])) {$_SESSION["telefono"]= $dato[5]; }
      if (isset($dato[6])) {$_SESSION["fecha_nacimiento"]= $dato[6]; }
      if (isset($dato[7])) {
        $_SESSION["status"]= $dato[7];
        if ($dato[7]!="A") {
          $resultado1="disable";
        }
      }
      if (isset($dato[8])) {
        $_SESSION["invitacion"]= $dato[8];
      }
      if (isset($dato[9])) {$_SESSION["ciudadelas"]= $dato[9]; }
    }else{
      if (isset($dato[0])) {$_SESSION["id"]= $dato[0]; }
      if (isset($dato[1])) {$_SESSION["nombres"]= $dato[1]; }
      if (isset($dato[2])) {$_SESSION["apellidos"]= $dato[2]; }
      if (isset($dato[3])) {$_SESSION["status"]= $dato[3]; }
      if (isset($dato[4])) {$_SESSION["ciudadelas"]= $dato[4]; }
    }
}
  $transport->close();
if(isset($_GET['link'])){
    $link=$_GET['link'];
    if ($link == '1'){
        session_destroy();
          header("Location: index.php");
        exit();
    }
}

?>
<!--MENU PRINCIPAL-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="css\bootstrap.css">

    <link rel="stylesheet" type="text/css" href="Estilos\styles_menu.css"/>
    <link rel="stylesheet" type="text/css" href="Estilos\fonts.css"/>
    <link rel="stylesheet" type="text/css" href="Estilos\estilos.css"/>
    <link rel="stylesheet" type="text/css" href="css\bootstrap-grid.css">

    <script  src="js\registration.js"></script>
    <script src="js\jquery-3.1.1.min.js"></script>
    <script  src="js\menu.js"></script>
</head>
<body >
  <header>
		<div class="menu_bar">
			<a class="bt-menu" href="#" style="font-size: 27px"><span class="icon-menu"></span>Codigo de acceso</a>
		</div>
    <nav class="nav_bar">
      <ul  >
				<li class=" menu_P">
          <a   href="#" id="menu" onclick="menu('<?php echo $_SESSION["ciudadelas"];?>')"><span class="icon-home" ></span>Inicio</a>
        </li>
        <li>
          <div class="menu1_bar menu_P">
    			   <a class="bt1-menu" href="#" id="codigo" onclick="intervalo('<?php echo $_SESSION["status"];?>')"><span class="icon-upload2"></span>Codigo De Acceso</a>
    		  </div>
        </li>
				<li>
          <div class="menu2_bar">
             <a class="bt2-menu" href="#" ><span class="icon-upload2"></span>Enviar Invitación</a>
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
	</header>
  <div class="prueba menu_P">
      <div class="container-fluid">
        <span class="error">
          <div class="container1" id="container1" >
          <div class="Image_container">
              <img src="images\logo manrique.png" alt="Avatar" class="logo">
          </div>
        </div>
      </span>
    </div>
  </div>
</body>
</html>
