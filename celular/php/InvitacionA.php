<!--MUESTRA TODAS LAS INVITACIONES RECURRENTES-->
<?php
include ("autenticacion.php");
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
$socket->setRecvTimeout("5000");
$transport = new TBufferedTransport($socket);
$protocol = new TBinaryProtocol($transport);
$client = new ServidorClient($protocol);
$transport->open();

$dato1 =$password=$username=$resultado= "";
$var1 = $_SESSION["id"];
$var2 = $_SESSION["ciudadelas"];
$re = $client->login($var1,$var2);
$resultado = "".$re;
$valor_array = explode(';',$resultado);
$texto =$texto=$texto2=  "";
?>
<span class="error">
  <div class="container4">
    <div class="table-responsive text-nowrap" >
        <label  class="tableB" for="filtrar"><b>Filtrar</b></label>
        <input  class="tableB" id="searchTerm" type="text" onkeyup="doSearch()" />
        <table  class="table table-striped"  id="tciudadela">
          <tbody>
            <?php
            //Leo cuantos elementos hay en el array
            $cont = count($valor_array);
            //Consulto las keys del array
            $keys = array_keys($valor_array);
            //Busco la ultima
            $ultima_key = $keys[$cont-1];
            foreach($valor_array as $llave => $valores) {
                if($llave != $ultima_key){
                  $noticias =explode(',',$valores);
                  $_SESSION["recurrente"]=$noticias[4];
                 ?>
                 <tr>
                   <td>
                     <button  onclick="codigo('<?php echo $noticias[3];?>')" class="option " >
                       <div class="col4">
                           <div class="col5">
                               <h3> <?php if (isset($noticias[0])) {echo $noticias[0]; }  ?> </h3>
                               <?php
                               if (($noticias[3])=="Activa"){
                                 $estilo='style="color: #06070e; font-weight: 700;"';
                               }else {
                                 $estilo='style="color: #f40606; font-weight: 700;"';
                               }
                               ?>
                               <h4 <?php echo $estilo ?>> <?php if (isset($noticias[3])) {echo $noticias[3]; }  ?> </h4>
                            </div>
                           <p class="invit"> <?php if (isset($noticias[1])) {echo $noticias[1]; }  ?> </p>
                           <p class="hora"> <?php if (isset($noticias[2])) {echo $noticias[2]; }  ?> </p>

                       </div>
                     </button>
                   </td>
               </tr>
                  <?php

                }
            }

            $transport->close();
            ?>
            </tbody>
        </table>
    </div >
  </div >
</span>
