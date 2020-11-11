<!--MUESTRA LISTA DE RESITENTES QUE INGRESARON A LA CIUDADELA -->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");
$resultado="";
$re = $client->login("notificacion",$_SESSION["usuario"]);
$resultado = "".$re;
//echo $resultado ;
if ($resultado=="true") {
    echo "  <script>
  //setInterval(function() {
    Push.Permission.request();
    Push.create('Tiene una aprobación nueva!', {
    body: 'Favor ingrese a la aplicación.',
    icon: '../images/logo.png',
    vibrate: [100, 100, 100],    // An array of vibration pulses for mobile devices.
    onClick: function() {
      window.open('https://qr-ticket.app','_top')
    }
    });
  //},8000);   </script>";
  $resultado="false";
}else{

}

?>
