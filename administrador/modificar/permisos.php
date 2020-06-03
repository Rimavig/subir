<!--EDITA PERMISOS DE USUARIO-->
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
$protocol = new TBinaryProtocol($transport);
$socket->setRecvTimeout("5000");
$client = new ServidorClient($protocol);
$transport->open();

$resultado="";
$invitar="";
$ingreso="";
$var1 = $_POST['var1'];
$var2 = $_POST['var2'];

if(isset($_POST["var3"])){
    $var3 = $_POST['var3'];
    $var4 = $_POST['var4'];
    $client->login("permisos","".$var1.",".$var2.",".$var3.",".$var4);
}else{
    $re = $client->login("permisos","".$var1.",".$var2);
    $resultado = "".$re;
    $noticias1 =explode(';',$resultado);
    $noticias =explode(',',$noticias1[0]);
    if ($noticias[6]=="A") {
        $ingreso="checked";
    }
    if ($noticias[5]=="S") {
        $invitar="checked";
    }


}
$transport->close();
?>
  <div class="permisos table-responsive text-nowrap"  >
    <div>
      <label for="nombres" ><b>Nombres</b></label>
      <input type="text" id="nombres" value="<?php echo $noticias[0];?>" disabled>
    </div>
    <div>
      <label for="apellidos"><b>Apellidos</b></label>
      <input type="text" id="apellidos" value="<?php echo $noticias[1];?>" disabled>
    </div>
    <div>
      <label for="email"><b>Email</b></label>
        <input type="email" id="email"  value="<?php echo $noticias[2];?>" disabled>
    </div>
    <div>
      <label for="cedula"><b>Cedula</b></label>
      <input type="text" id="cedula" value="<?php echo $noticias[3];?>"  disabled >
    </div>
    <div>
      <label for="celular"><b>Celular</b></label>
        <input type="text" id="celular" value="<?php echo $noticias[4];?>" disabled>
    </div>
      <div >
        <label ><b>Invitación</b></label>
				<input class="apple-switch" type="checkbox" name="condiciones1"  value="ok1" id="Minvitacion" <?php echo $invitar?>>
      </div>
      <div >
        <label for="ingreso"><b>Ingreso</b></label>
				<input class="apple-switch" type="checkbox" name="condiciones" value="ok" id="Mingreso" <?php echo $ingreso?>>
      </div>


  <div class="botonA" >
      <button  class="tableB" onclick="Bpermisos()"  ><span class="icon-users"></span>Editar</button >
      <button class="tableB" onclick="usuarios('0')" ><span class="icon-users"></span>Cancelar</button>

  </div >
</div >
