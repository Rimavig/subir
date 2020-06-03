<!--BUSCA USUARIOS EN TODAS LAS CIUDADELAS-->
<?php
include ("autenticacion.php");
$id= "";
require "phpqrcode/phpqrcode/qrlib.php";

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('America/Guayaquil');
//Declaramos la ruta y nombre del archivo a generar
$filename ='test.png';
if ($_SESSION["ciudadelas"]=="Visitante") {
  $id= "2";
  $contenido =$_SESSION["id"].$id.date("dHis") ; //Texto
}else{
  $id= "0";
  $contenido =$_SESSION["id"].$id.date("dHis") ; //Texto
}
//$contenido=base64_encode($contenido1);
//echo $contenido;
//Parametros de Condiguración
$tamaño = 10000; //Tamaño de Pixel
$level = 'H'; //Precisión Baja
$framSize = 2; //Tamaño en blanco
$filename1 ='test.png?'.rand(1,10000);
      //Enviamos los parametros a la Función para generar código QR
QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
?>
<span class="error">
  <div class="container1 menu_P" id="container1" >
    <img src="<?php echo $filename1?>" alt="Avatar" class="logo" >
  </div >
</span>
