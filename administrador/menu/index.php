<!--PAGINA DE INICIO DE SESION-->
<?php
$GLOBALS['THRIFT_ROOT'] = '/var/www/html/php/thrift-0.11.0/lib/php/lib';

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
$port = 7911;
$socket = new Thrift\Transport\TSocket($host,$port);
$transport = new TBufferedTransport($socket);
$protocol = new TBinaryProtocol($transport);
$socket->setRecvTimeout("5000");
$client = new ServidorClient($protocol);
$transport->open();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes" target-densityDpi="dpi" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <title>Login</title>
    <script  src="..\js\registration.js"></script>
    <link rel = "stylesheet" type="text/css"  href = "..\Estilos\styles_login.css"/>
</head>
<body >
		<div class="container">
        <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
            <div class="Image_container">
                <img src="..\images\logo manrique.png" alt="Avatar" class="logo">
            </div>
            <label for="username"><b>Usuario o Email</b></label>
            <input type="text" placeholder="Ingrese Usuario o Email" name="username"  id="username" required>
            <label for="password"><b>Contraseña</b></label>
            <input type="Password" placeholder="Ingrese Contraseña" name="password" id="password"  required>
            <button type="submit" >INGRESAR</button>

        </form>
        <?php
          $dato1  =$password=$username= "";
          if(isset($_POST["username"]) && isset($_POST["password"])){
            $username = $_POST['username'];
            $password = $_POST['password'];
          }
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $re = $client->login($username,$password);
              $resultado = "";
              $resultado = "".$re;
        ?>
          <script type="text/javascript"> function_alert( "<?php echo $resultado; ?>" )  </script>

        <?php
              session_start();
              if ($resultado=="true"){
                $_SESSION["timeout"] = time();
                $_SESSION["autenticado"]= "SI";
              } else {
                session_destroy();
              }
          }
        ?>
		</div>
</body>
