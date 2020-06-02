<!--REGISTRA VISITANTE-->
<?php

$GLOBALS['THRIFT_ROOT'] = 'C:\\Users\\rwiva\\Downloads\\thrift-0.11.0\\thrift-0.11.0\\lib\\php\\lib\\';

require_once '../servidor/Types.php';
require_once '../servidor/Servidor.php';

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
$protocol = new TBinaryProtocol($transport);
$socket->setRecvTimeout("5000");
$client = new ServidorClient($protocol);
$transport->open();
$resultado= "";
$registration[]=null;

if(isset($_POST["nombres"]) && isset($_POST["apellidos"])&& isset($_POST["contraseña"])
&& isset($_POST["contraseña1"])&& isset($_POST["cedula"])){

  $registration[0]=$_POST['nombres'];
  $registration[1]=$_POST['apellidos'];
  $registration[2]=$_POST['cedula'];
  if($_POST['contraseña']==$_POST['contraseña1']){
    $encryptPass = password_hash($_POST['contraseña'],PASSWORD_DEFAULT);
    $registration[3]=$encryptPass;
  }

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $re = $client->registro("registroV,".implode(",", $registration));
    $resultado = "".$re;
}
if(isset($_GET['link'])){
    $link=$_GET['link'];
    if ($link == '1'){
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>
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
  <span class="error">
  <div class="prueba">

    <div class="container3">
        <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  onsubmit="return validacion()" >
            <div class="Image_container">
              <img src="..\..\images\espol.png" alt="Avatar" >
            </div>
            <label for="nombres"><b>Nombres</b></label>
            <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" required>
            <label for="apellidos"><b>Apellidos</b></label>
            <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" pattern="[A-Za-z ]{2,25}"  id="apellidos" title="Ingrese sus 2 apellidos" required>
            <label for="cedula"><b>Cedula</b></label>
            <input type="text" placeholder="Ingrese su cedula" name="cedula" title="Ingrese cedula correcta " pattern="[0-9]{10}" id="cedula" required >
            <label for="contraseña"><b>Contraseña</b></label>
            <input type="password" placeholder="Ingrese su Contraseña" name="contraseña" pattern=".{6,}" id="contraseña"  title="Ingrese Contraseña (Mayor 6 caracteres)" required  >
            <label for="contraseña1"><b>Contraseña1</b></label>
            <input type="password" placeholder="Confirmar contraseña" name="contraseña1" pattern=".{6,}" id="contraseña1"  title="Ingrese Contraseña nuevamente (Mayor 6 caracterequiredres)" required >
            <script type="text/javascript"> function_alert1( "<?php echo $resultado; ?>" )  </script>
            <button type="submit">REGISTRARSE</button>
            <button onclick="location.href='index.php'">ATRAS</button>
        </form>
        </div>

  </div>
  </span>
</body>
</html>
