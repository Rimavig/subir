<!--REALIZA INVITACIONES NORMALES-->
<?php
include ("autenticacion.php");
include ("conect.php");
require "phpqrcode/phpqrcode/qrlib.php";
$resultado= "";
$registration[]=null;
$band = true;
$texto2="";
if(isset($_POST["nombres"]) && isset($_POST["apellidos"])&& isset($_POST["email"])){
  $registration[0]=$_SESSION["id"];
  if( $_POST['nombres']=="" || $_POST['apellidos']==""){
    $texto= 'ERROR';
    $texto1= 'Ingrese correctamente la invitación';
      $texto2= 'style="display: none "';
    $band=false;
  }else{
    $registration[1]=$_POST['nombres'];
    $registration[2]=$_POST['apellidos'];
    if ($_POST["email"]!="") {
      if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
          $registration[3]=$_POST['email'];
      }else{
        $texto= 'ERROR';
        $texto1= 'Email Incorrecto-Ingrese correctamente el registro';
        $texto2= 'style="display: none "';
        $band=false;
      }
    }else{
        $registration[3]="none";
    }
  }
  $registration[4]=$_SESSION["ciudadelas"];
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
    $re = $client->registro("invitacion,".implode(",", $registration));
    $resultado = "".$re;
    $mensaje="";
    if ($resultado=="true") {
      $texto= '';
      $texto1= 'Por favor compartir la imagen (Valido 1 persona)';

    }else{
      $texto= 'Errror';
      $texto1= 'Error-No se envio la invitacion';
      $texto2= 'style="display: none "';
    }
  }
}
?>
<div class="container1">
  <div class="col2">
      <h1><?php echo  $texto; ?></h1>
      <div >
        <img src="<?php echo $filename1?>" alt="Avatar" class="logoB"  <?php echo  $texto2; ?>>
        </div>
      <p class ="login"><?php echo  $texto1; ?></p>
  </div>
    <button onclick="aceptar1('<?php echo $resultado; ?>')">Aceptar</button>
</div>
