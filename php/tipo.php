<!--LUGAR DE  INICIO DE SESION-->
<?php

$GLOBALS['THRIFT_ROOT'] = '/var/www/html/php/thrift-0.11.0/lib/php/lib';

require_once 'servidor/Types.php';
require_once 'servidor/Servidor.php';

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
if (isset($_POST["var2"]) ) {
  $var1 = $_POST['var1'];
  $var2 = $_POST['var2'];
  $re = $client->login($var1,$var2);

  $resultado = "".$re;
}
 $transport->close();
 $texto =$texto=$texto2=  "";
if ($resultado=="") {
  $texto= 'ERROR';
  $texto1= 'Los datos ingresados son incorrectos';
  $dato1="0";
  $texto2= 'style="visibility:hidden"';
}else {
  $dato1="1";
  $texto= 'Bienvenido';
  $texto1= 'Escoga donde desea Ingresar';
}
session_start();
if ($dato1=="1"){
  $_SESSION["timeout"] = time();
  $_SESSION["autenticado"]= "SI";
  $_SESSION["usuario"]= $var1;
  $_SESSION["ciudadelas"]="";
  $_SESSION["invitacion"]="N";
  $_SESSION["ingreso"]="I";
} else {
  session_destroy();
}
?>
<div class="col2">
    <h1><?php echo  $texto; ?></h1>
    <p><?php echo  $texto1; ?></p>
</div>
    <span class="error">
      <select id="ciudadela" name="ciudadela" title="Seleccione" <?php echo  $texto2; ?> >
        <?php
          $valor_array = explode(';',$resultado);
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
               <option value=<?php echo $noticias[2]; ?>><?php if (isset($noticias[2])) {echo $noticias[2]; }  ?></option>
                <?php
              }
          }
        $transport->close();
        ?>
        </select>
        <div class="botonA" >
          <button  class="tableB " onclick="inicio('<?php echo $var1; ?>','<?php echo $dato1; ?>')" id="usuarios" >Aceptar</button>
        </div >

    </span>
</body>
