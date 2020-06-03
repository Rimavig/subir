<!--EDITA VISITANTE DEL SISTEMA-->
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
$var1 = $_POST['var1'];
$var2 = $_POST['var2'];
if(isset($_POST["var3"])){
    $client->login("editarI",$_POST["var3"]);
}else{
    $re = $client->login("usuario","".$var1.",".$var2);
    $resultado = "".$re;
    $noticias1 =explode(';',$resultado);
    $noticias =explode(',',$noticias1[0]);
    if ($noticias[4]=="A") {
        $ingreso="checked";
    }else{
       $ingreso="";
    }
}
$transport->close();
?>
  <div class="editar table-responsive text-nowrap"  >
    <div>
      <label for="nombres"><b>Nombres</b></label>
      <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" value="<?php echo $noticias[0];?>" required>
    </div>
    <div>
      <label for="apellidos"><b>Apellidos</b></label>
      <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" pattern="[A-Za-z ]{2,25}"  id="apellidos" title="Ingrese sus 2 apellidos" value="<?php echo $noticias[1];?>" required>
    </div>
    <div>
      <label for="cedula"><b>Cedula</b></label>
      <input type="text" placeholder="Ingrese su cedula" name="cedula" title="Ingrese cedula correcta " pattern="[0-9]{10}" id="cedula" value="<?php echo $noticias[2];?>"  disabled >
    </div>
    <div>
        <label for="contraseña"><b>Contraseña</b></label>
        <input type="password" autocomplete="off" placeholder="Ingrese su Contraseña" name="contraseña" pattern=".{6,}" id="contraseña"  title="Ingrese Contraseña (Mayor 6 caracteres)"value="<?php echo $noticias[3];?>" required  >
    </div>
    <div >
      <label for="ingreso"><b>Ingreso</b></label>
      <input class="apple-switch" type="checkbox" name="condiciones" value="ok" id="Mingreso" <?php echo $ingreso?>>
    </div>
  <div class="botonA" >
      <button  class="tableB" onclick="Beditar('1')" ><span class="icon-users"></span>Editar</button >
      <button class="tableB" onclick="usuarios('1')" ><span class="icon-users"></span>Cancelar</button>

  </div >
</div >
