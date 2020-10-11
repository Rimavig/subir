<!--REALIZA INVITACIONES RECURRENTES-->
<?php
include ("autenticacion.php");
date_default_timezone_set('America/Guayaquil');
$min=date("Y-m-d") ;
//sumo 1 mes
$max=date("Y-m-d",strtotime($min."+ 10 days"));
$max1=date("Y-m-d",strtotime($min."+ 30 days"));
?>
<div class="container1">
    <div class="Image_container">
      <img src="images\logo.png" alt="Avatar" class="logoA" >
    </div>
    <label for="nombres"><b>Nombres*</b></label>
    <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" required>
    <label for="apellidos"><b>Apellidos*</b></label>
    <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" pattern="[A-Za-z ]{2,25}"  id="apellidos" title="Ingrese sus 2 apellidos" required>
    <label for="email"><b>Correo</b></label>
    <input type="email" placeholder="Ingrese su email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingrese email correcto" id="email"  autocomplete="email">
    <label for="celular"><b>Celular*</b></label>
    <input type="text" placeholder="Ingrese su celular" name="celular" title="Ingrese celular correcto " pattern="[0-9]{10}" id="celular" required >
    <div class="col2">
        <h1>Fecha de Permiso</h1>
    </div>
    <div>
      <label for="inicio"><b> Inicio*</b></label>
      <input type="datetime-local" id="inicio" name="inicio" value="<?php echo $min;?>T00:00" min="<?php echo $min;?>T00:00" max="<?php echo $max;?>T00:00" title="Ingrese Fecha de inicio "  required >
    </div>
    <div>
      <label for="termino"><b>Término*</b></label>
      <input type="datetime-local" id="termino" name="termino" value="<?php echo $min;?>T00:00" min="<?php echo $min;?>T00:00" max="<?php echo $max1;?>T00:00" title="Ingrese Fecha de termino "  required >
    </div>
    <label class="campos" ><b> Campos con * son obligadorios</b></label>
    <div class="botonA" >
        <button class="tableB" onclick="enviarR()">Enviar</button>
    </div >
</div>
<div class="invitacion-enviar">
  </div>
