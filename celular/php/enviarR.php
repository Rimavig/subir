<!--REALIZA INVITACIONES NORMALES-->
<?php
include ("autenticacion.php");
include ("conect.php");
require "phpqrcode/phpqrcode/qrlib.php";
$resultado= "";
$registration[]=null;
$band = true;
$texto2="";
$texto3="";
if(isset($_POST["nombres"]) && isset($_POST["apellidos"])&& isset($_POST["email"])
&&isset($_POST["cedula"]) && isset($_POST["inicio"])&& isset($_POST["termino"])){
  $registration[0]=$_SESSION["id"];
  if( $_POST['nombres']=="" || $_POST['apellidos']=="" || $_POST['cedula']==""
  || $_POST['inicio']=="" || $_POST['termino']==""){
    $texto= 'ERROR';
    $texto1= 'Ingrese correctamente la invitación';
    $texto2= 'style="display: none "';
    $band=false;
  }else{
    if (strlen($_POST['cedula'])==10 && is_numeric($_POST['cedula'])) {
      $registration[1]=$_POST['cedula'];
    }else{
      $texto= 'ERROR';
      $texto1= 'Cedula Incorrecta-Ingrese correctamente el registro';
      $band=false;
    }
    $registration[2]=$_POST['nombres'];
    $registration[3]=$_POST['apellidos'];
    if ($_POST["email"]!="") {
      if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $registration[4]=$_POST['email'];
      }else{
        $texto= 'ERROR';
        $texto1= 'Email Incorrecto-Ingrese correctamente el registro';
        $texto2= 'style="display: none "';
        $band=false;
      }
    }else{
        $registration[4]="none";
    }
    if ($_POST["tiempo"]=="mal" ) {
      $texto= 'ERROR';
      $texto1= 'Fechas incorrectas-Ingrese correctamente el registro';
      $texto2= 'style="display: none "';
      $band=false;
    }else{
      $registration[5]=$_POST["inicio"];
      $registration[6]=$_POST['termino'];
    }
    $registration[7]=$_SESSION["ciudadelas"];
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Declaramos la ruta y nombre del archivo a generar
  $filename ='test.png';
  $id= "1";
  date_default_timezone_set('America/Guayaquil');
  $contenido1 =$_SESSION["id"].$id.date("dHis") ; //Texto
  $contenido=base64_encode($contenido1);
  //Parametros de Condiguración
  $tamaño = 10000; //Tamaño de Pixel
  $level = 'H'; //Precisión Baja
  $framSize = 2; //Tamaño en blanco
  $filename1 ='test.png?'.rand(1,10000);
        //Enviamos los parametros a la Función para generar código QR
  QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
  if ($band) {
    $re = $client->registro("invitacionR,".implode(",", $registration));
    $resultado = "".$re;
    $mensaje="";
    if ($resultado=="true") {
      $texto= '';
      $texto1= 'Por favor compartir la imagen (Valido 1 persona)';
      $texto3= 'style="display: none "';

    }else{
      $texto= 'Errror';
      $texto1= 'Error-El Registro ya existe';
      $texto2= 'style="display: none "';
    }
  }
}
?>
<div class="container1"  <?php echo  $texto3; ?>>
  <div class="col2">
      <h1><?php echo  $texto; ?></h1>
      <p class ="login"><?php echo  $texto1; ?></p>
  </div>
    <button onclick="aceptar1('<?php echo $resultado; ?>')">Aceptar</button>
</div>

<div class="container12" <?php echo  $texto2; ?>>
    <div class="col2">
        <h1>Invitación Generada</h1>
    </div>
    <div class="Image_container">
      <img src="images\logo.png" alt="Avatar" class="logoA" >
    </div>
    <div class="botonA" >
        <button  class="tableB" onclick="salir()">Salir</button>
        <?php  $resultado1="Hola, ".$_SESSION["nombres"]." te ha dado acceso a su ciudadela. Para obtener ese acceso, descarga nuestra app y regístrate: https://qr-ticket.app"?>
        <button onclick="compartir1('<?php echo $resultado1;?>')" class="tableB">Compartir</button>
    </div >
</div>
