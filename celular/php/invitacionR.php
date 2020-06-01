<!--REALIZA INVITACIONES RECURRENTES-->
<?php
include ("autenticacion.php");
$GLOBALS['THRIFT_ROOT'] = 'C:\\Users\\rwiva\\Downloads\\thrift-0.11.0\\thrift-0.11.0\\lib\\php\\lib\\';

require_once '../servidor/Types.php';
require_once '../servidor/Servidor.php';
require "../phpqrcode/phpqrcode/qrlib.php";

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


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$host = '127.0.0.1';
$port = 7911;
$socket = new Thrift\Transport\TSocket($host,$port);
$transport = new TBufferedTransport($socket);
$protocol = new TBinaryProtocol($transport);
$socket->setRecvTimeout("5000");
$client = new ServidorClient($protocol);
$transport->open();
$resultado= "";
$registration[]=null;

if(isset($_POST["nombres"]) && isset($_POST["apellidos"])&& isset($_POST["email"])
&&isset($_POST["cedula"]) && isset($_POST["inicio"])&& isset($_POST["termino"])){
  $registration[0]=$_SESSION["id"];
  $registration[1]=$_POST['cedula'];
  $registration[2]=$_POST['nombres'];
  $registration[3]=$_POST['apellidos'];
  if ($_POST['email']=="") {
      $registration[4]="none";
  }else {
      $registration[4]=$_POST['email'];
  }
  $registration[5]=$_POST["inicio"];
  $registration[6]=$_POST['termino'];
  $registration[7]=$_SESSION["ciudadelas"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Declaramos la ruta y nombre del archivo a generar
  $filename ='../php/test.png';
  $id= "1";
  date_default_timezone_set('America/Guayaquil');
  $contenido =$_SESSION["id"].$id.date("dHis") ; //Texto
  //Parametros de Condiguración
  $tamaño = 10000; //Tamaño de Pixel
  $level = 'H'; //Precisión Baja
  $framSize = 2; //Tamaño en blanco
  $filename1 ='../php/test.png?'.rand(1,10000);
        //Enviamos los parametros a la Función para generar código QR
  QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
  $re = $client->registro("invitacionR,".implode(",", $registration));
  $resultado = "".$re;
}
if(isset($_GET['link'])){
    $link=$_GET['link'];
    if ($link == '1'){
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
date_default_timezone_set('America/Guayaquil');
$min=date("Y-m-d") ;
//sumo 1 mes
$max=date("Y-m-d",strtotime($min."+ 10 days"));
$max1=date("Y-m-d",strtotime($min."+ 30 days"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <title>Invitacón Recurrente</title>
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
      <a class="bt-menu" href="#" style="font-size: 27px"><span class="icon-menu"></span>Codigo de Acceso</a>
    </div>
    <nav class="nav_bar">
      <ul  >
        <li class=" menu_P">
          <a  href="main.php" id="menu" onclick="menu('<?php echo $_SESSION["ciudadelas"];?>')"><span class="icon-home" ></span>Inicio</a>
        </li>
        <li>
          <div class="menu1_bar menu_P">
             <a class="bt1-menu" href="#" id="codigo" onclick="intervalo('<?php echo $_SESSION["status"];?>')"><span class="icon-upload2"></span>Codigo De Acceso</a>
          </div>
        </li>
        <li>
          <div class="menu2_bar">
             <a class="bt2-menu" href="#" onclick="limpiar()"><span class="icon-upload2"></span>Enviar Invitación</a>
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
      <div class="container1">
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validacion1()" >
              <div class="Image_container">
                <img src="..\..\images\espol.png" alt="Avatar" >
              </div>
              <label for="nombres"><b>Nombres</b></label>
              <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" required>
              <label for="apellidos"><b>Apellidos</b></label>
              <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" pattern="[A-Za-z ]{2,25}"  id="apellidos" title="Ingrese sus 2 apellidos" required>
              <label for="email"><b>Correo</b></label>
              <input type="email" placeholder="Ingrese su email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingrese email correcto" id="email"  autocomplete="email">
              <label for="cedula"><b>Cedula</b></label>
              <input type="text" placeholder="Ingrese su cedula" name="cedula" title="Ingrese cedula correcta " pattern="[0-9]{10}" id="cedula" required >
              <div class="col2">
                  <h1>Fecha de Permiso</h1>
              </div>
              <div>
                <label for="inicio"><b> Inicio</b></label>
                <input type="datetime-local" id="inicio" name="inicio" min="<?php echo $min;?>T00:00" max="<?php echo $max;?>T00:00" title="Ingrese Fecha de inicio "  required >
              </div>
              <div>
                <label for="termino"><b>Termino</b></label>
                <input type="datetime-local" id="termino" name="termino"min="<?php echo $min;?>T00:00" max="<?php echo $max1;?>T00:00" title="Ingrese Fecha de termino "  required >
              </div>
              <script type="text/javascript"> function_alert3( "<?php echo $resultado; ?>" )  </script>
              <div class="botonA" >
                  <button class="tableB" type="submit">Enviar</button>
              </div >
          </form>
    </div>
  </div>
</body>
</html>
