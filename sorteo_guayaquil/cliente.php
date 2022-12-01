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
  ?>
  <div class="d-flex flex-column align-items-center2 padding-top-2 padding-left-2">
      <div class="content-image-employee d-flex">
          <img class="margin-auto" width="150" src="fotos/<?php echo $codigo; ?>.jpg" id="pic-employee" alt="" srcset="">
      </div>
      <div class="margin-top-1"></div>
      <h1 class="winner-text margin-top-1" id="names"><?php echo $nombre; ?></h1>
      <div class="margin-top-1"></div>
      <h1 class="winner-text margin-top-1" id="lastNames"><?php echo $apellido; ?></h1>
  </div>
  <div style="width: 100px"></div>
  <div class="content-info-user d-flex flex-column">
      <div style="padding: 30px 60px 0px 15px; display: flex; flex-direction: column;">
          <span class="info-label">Correo</span>
          <span class="info-user" id="email"><?php echo $correo; ?></span>
          <div class="margin-top-2"></div>
          <span class="info-label">Celular</span>
          <span class="info-user" id="phone"><?php echo $celular; ?></span>
          <div class="margin-top-2"></div>
          <span class="info-label">Ciudad</span>
          <span class="info-user" id="ciudad"><?php echo $ciudad; ?></span>
      </div>
      <div style="padding-bottom: 15px;"></div>
      <div style="width: auto; margin-bottom: -20px; display: flex; justify-content: center;"><img
          style="width: 250px;" src="images/decoracion.png" alt="" srcset=""></div>
  </div>

  <?php
}else{
  ?>
  <div class="d-flex flex-column width-100">

      <div class="d-flex flex-column">
          <div class="margin-top-1"></div>
          <h1 class="winner-name" id="names-winner">ERROR</h1>
          <div class="margin-top-1"></div>
          <h1 class="winner-label2"><?php echo $resultado; ?></h1>
      </div>
  </div>
    <?php
}

?>
