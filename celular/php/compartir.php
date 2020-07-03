<?php
include ("autenticacion.php");?>
<div class="container12">
    <div class="col2">
        <h1>Invitación Generada</h1>
    </div>
    <div class="Image_container">
      <img src="images\logo.png" alt="Avatar" class="logoA" >
    </div>
    <div class="botonA" >
        <button  class="tableB" onclick="salir()">Salir</button>
        <?php  $resultado1="Hola, ".$_SESSION["nombres"]." te ha dado acceso a su ciudadela. Para obtener ese acceso, descarga nuestra app y regístrate: https://google.com"?>
        <button onclick="compartir1('<?php echo $resultado1;?>')" class="tableB">Compartir</button>
    </div >
</div>
