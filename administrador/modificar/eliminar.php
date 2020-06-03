<!--ELIMINA USUARIOS-->
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

$resultado="";
$registration[]=null;
$var1 = $_POST['var1'];
$var2 = $_POST['var2'];

if(isset($_POST["var3"])){
    $re = $client->login("eliminar","".$var1.",".$var2);
}else{
    $re = $client->login("usuario","".$var1.",".$var2);
    $resultado = "".$re;
    $noticias1 =explode(';',$resultado);
    $noticias =explode(',',$noticias1[0]);
}
  $transport->close();
?>
  <div class="eliminar table-responsive text-nowrap"  >
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
        <input type="email" id="email"  value="<?php echo $noticias[3];?>" disabled>
    </div>
    <div>
        <label for="contraseña"><b>Contraseña</b></label>
        <input type="password" id="contraseña" value="<?php echo $noticias[4];?>" disabled>
    </div>
    <div>
      <label for="cedula"><b>Cedula</b></label>
      <input type="text" id="cedula" value="<?php echo $noticias[5];?>"  disabled >
    </div>
    <div>
      <label for="celular"><b>Celular</b></label>
        <input type="text" id="celular" value="<?php echo $noticias[6];?>" disabled>
    </div>
    <div>
        <label for="nacimiento"><b> Nacimiento</b></label>
        <input type="date" id="nacimiento"  value="<?php echo $noticias[7];?>" disabled>
      </div>
      <div>
      <label for="sexo" id="sexo"  ><b>Sexo</b></label>
      <select name="sexo" disabled>
        <option value="<?php echo $noticias[8];?>" ><?php echo $noticias[8];?></option>
      </select>
      </div>
      <div>
      <label for="ciudadela" id="ciudadela" ><b>Ciudadela</b></label>
      <select name="ciudadela" title="Seleccione Ciudadela" disabled >
        <option value="<?php echo $noticias[9];?>" ><?php echo $noticias[9];?></option>
      </select>
      </div>

  <div class="botonA" >
      <button  class="tableB" onclick="Beliminar('0')" ><span class="icon-users"></span>Eliminar</button >
      <button class="tableB" onclick="usuarios('0')" ><span class="icon-users"></span>Cancelar</button>

  </div >
</div >
