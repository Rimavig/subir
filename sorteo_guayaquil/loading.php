<?php

//$GLOBALS['THRIFT_ROOT'] = '/var/www/html/php/thrift-0.11.0/lib/php/lib';
$GLOBALS['THRIFT_ROOT'] = 'C:\Users\Richard Vivanco\Downloads\thrift-0.11.0\thrift-0.11.0\lib\php\lib';
require_once $GLOBALS['THRIFT_ROOT'].'/Types.php';
require_once $GLOBALS['THRIFT_ROOT'].'/BANCOServer.php';
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
$port = 7932;
$socket = new Thrift\Transport\TSocket($host,$port);
$transport = new TBufferedTransport($socket);
$socket->setRecvTimeout("5000");
$protocol = new TBinaryProtocol($transport);
$client = new BANCOServerClient($protocol);
$transport->open();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$resultado= "";
$resultado = $client->getGeneral();
$valor_array = explode(',',$resultado);
$cont = count($valor_array);
if ($cont>6) {
  $codigo = $valor_array[0];
  $nombre = $valor_array[1];
  $apellido = $valor_array[2];
  $correo = $valor_array[3];
  $celular = $valor_array[4];
  $ciudad = $valor_array[5];
}
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sorteo</title>
</head>

<body>
    <img src="images/fondo-employee.png" class="backgorund-image-employee" alt="" srcset="">
    <div class="linea-fondo d-flex flex-column" style="justify-content: start;">
        <div class="d-flex flex-column align-items-center">
            <h1 style="margin-top: 120px;" class="selecting-text">Esperando al ganador</h1>
            <img src="images/adorno_ganador.png" style="width: 70%;" alt="" srcset="">
            <div class="d-flex flex-column sorteo2">
                <div class="content-image-winner d-flex margin-auto"  style="width: 180px; height: 180px; margin-top: 30px;">
                    <img class="margin-auto" width="150" src="fotos/<?php echo $codigo; ?>.jpg" id="pic-employee" alt="" srcset="">
                </div>
                <div class="margin-top-1"></div>
                <h1 class="winner-name" id="names-winner"><?php echo $nombre." ".$apellido; ?></h1>
            </div>
            <img src="images/loading.gif" style="width: 30%; margin-top: 40%; position: absolute;" alt="" srcset="">
        </div>
    </div>
    <script src="jquery.min.js"></script>
    <script src="sorteo.js"></script>
    <script>
    window.setTimeout(fetchWinenr, 4000);
    function fetchWinenr() {
        var xhttp = new XMLHttpRequest();
        xhttp.responseType = 'json';
        xhttp.onreadystatechange = function () {
            console.log(this.readyState);
            if (this.readyState == 4 && this.status == 200) {
                var names = xhttp.response.nombre + ' ' + xhttp.response.apellido;
                // document.getElementById('pic-employee').src = xhttp.response.imagen;
                window.location = ('winner.html?name=' + names + '&image=' + xhttp.response.imagen);
            }
        };

        xhttp.open('GET', 'http://104.154.225.61/apiRest1/corp/v1/ganador', true);
        xhttp.setRequestHeader('Authorization', 'Bearer ' + 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImNvcnBOYW1lIjoiQ09MRUdJTyJ9fQ.RW8qceXDKeJceYg-rL0pmyroF0k3ku2ot3sK4N-XyXk');
        xhttp.send();
    }
    </script>
</body>

</html>
