<!--BUSCA LAS INVITACIONES ENVIADAS POR CIUDADELA-->
<?php
include ("../menu/autenticacion.php");
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
$socket->setRecvTimeout("5000");
$protocol = new TBinaryProtocol($transport);
$client = new ServidorClient($protocol);
$transport->open();

$resultado= "";
$re = $client->registro("ciudadela");
$resultado = "".$re;
$valor_array = explode(';',$resultado);
if (isset($_POST["var1"])) {
  $var1 = $_POST['var1'];
   if($var1=="normalE"){
      $var2= "EbuscarN()";
      $texto="Invitaciones Enviadas";
  }elseif($var1=="RecurrenteE") {
      $var2= "EbuscarR()";
      $texto="Invitaciones Enviadas";
  }elseif($var1=="RecurrenteR") {
      $var2= "RbuscarR()";
      $texto="Invitaciones Recibidas";
  }else{
      $var2= "RbuscarN()";
      $texto="Invitaciones Recibidas";
  }
}
?>
<span class="error">
  <div class="container1" id="container1">
      <div class="menu_container">
          <label for="ciudadela" class="tableA"><b>Ciudadelas</b></label>
            <button  class="tableA " onclick="<?php echo $var2; ?>" id="buscar"><span class="icon-users"></span>  Buscar</button>

      </div >
      <div class="buscar table-responsive text-nowrap" >
        <label  class="tableB" for="filtrar"><b>Filtrar</b></label>
        <input  class="tableB" id="searchTerm" type="text" onkeyup="doSearch()" />
        <div class="ventad" >
          <table class="table table-striped"   id="tciudadela">
              <thead>
                <tr>
                  <th>Ciudadela </th>
                </tr>
              </thead>
              <tbody >
                <?php
                //Leo cuantos elementos hay en el array
                $cont = count($valor_array);
                //Consulto las keys del array
                $keys = array_keys($valor_array);
                //Busco la ultima
                $ultima_key = $keys[$cont-1];

                foreach($valor_array as $llave => $valores) {
                    if($llave == $ultima_key){

                    }else{
                      ?>
                      <tr>
                      <td> <?php echo $valores; ?> </td>
                      </tr>
                      <?php

                    }
                }

                $transport->close();
                ?>

              </tbody>
            </table>
        </div >
          <div class="botonA" >
            <button  class="tableB " onclick="usuarios('2')" id="usuarios" ><span class="icon-users"></span><?php echo $texto; ?></button>
          </div >
      </div >
      <div class=" cont1" ></div >
      <div class="cont3" >
        <label class="tableC" id="texto"><b>Ciudadelas</b></label>
        <label class="tableC"><img src="..\images\aceptar.png" alt="Avatar" id="logoA" ></label>
        <div class="botonA" >
            <button class="tableB" onclick=" cargar()"  id="cargar"><span class="icon-users"></span>Aceptar</button>
        </div >
      </div >
  </div >
</span>
