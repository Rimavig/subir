<!--MUESTRA USUARIOS-->
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
$protocol = new TBinaryProtocol($transport,1024,1024);

$client = new ServidorClient($protocol);
$transport->open();
$resultado="";
if (isset($_POST["var1"])) {
  $var1 = $_POST['var1'];
  $re = $client->registro("".$var1);
  $resultado = "".$re;
  $valor_array = explode(';',$resultado);
}

?>
<div class="usuarios table-responsive text-nowrap" >
  <label  class="tableB" for="filtrar"><b>Filtrar</b></label>
  <input  type="text" class="tableB" id="searchTerm1" autocomplete="off" type="text" onkeyup="doSearch1()" />
  <div class="ventad" >
    <table class="table table-striped"  id="tusuarios"  >
        <thead>
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cedula</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
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
                $noticias =explode(',',$valores);
               ?>
               <tr>
               <td> <?php if (isset($noticias[0])) {echo $noticias[0]; }  ?> </td>
               <td> <?php if (isset($noticias[1])) {echo $noticias[1]; }  ?> </td>
               <td> <?php if (isset($noticias[2])) {echo $noticias[2]; }  ?> </td>
               <td> <?php if (isset($noticias[4])) {
                 if ($noticias[4]=="A") {
                  echo "Activo";
                }else{
                  echo "Inactivo";
                }
                 }  ?> </td>

               </tr>
                <?php
              }
          }
          $transport->close();
          ?>
          <tr class='noSearch hide'>
             <td colspan="5"></td>
         </tr>
          </tbody>
    </table>
  </div >

  <div class="botonA" >
      <button class="tableB" onclick=" editar('1')"  id="editar"><span class="icon-user-tie"></span>Editar</button>
      <button class="tableB" onclick=" eliminar('1')"  id="eliminar"><span class="icon-user-minus"></span>Eliminar</button>
  </div >

</div >
<div class=" cont2" ></div >

<div class=" cont4" ></div >
<div class=" cont5" ></div >
