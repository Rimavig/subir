<!--REGISTRA VISITANTE-->
<?php
include ("conect.php");

$resultado= "";
$registration[]=null;

?>
  <span class="error">
  <div class="cont2">
    <div class="container1">
      <div class="Image_container">
          <img src="..\images\logo.png" alt="Avatar" class="logoA" >
      </div>
        <label class="registro" for="nombres"><b>Nombres</b></label>
        <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" required>
        <label class="registro" for="apellidos"><b>Apellidos</b></label>
        <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" pattern="[A-Za-z ]{2,25}"  id="apellidos" title="Ingrese sus 2 apellidos" required>
        <label class="registro" for="celular"><b>Celular</b></label>
        <input type="text" placeholder="Ingrese su celular" name="cedula" title="Ingrese celular correcto " pattern="[0-9]{10}" id="celular" required >
        <label class="registro" for="contraseña"><b>Contraseña</b></label>
        <input type="password" placeholder="Ingrese su Contraseña" name="contraseña" pattern=".{6,}" id="contraseña"  title="Ingrese Contraseña (Mayor 6 caracteres)" required  >
        <label class="registro" for="contraseña1"><b>Contraseña</b></label>
        <input type="password" placeholder="Confirmar contraseña" name="contraseña1" pattern=".{6,}" id="contraseña1"  title="Ingrese Contraseña nuevamente (Mayor 6 caracterequiredres)" required >
        <button type="submit" onclick="registrarseV()">REGISTRARSE</button>
    </div>
  </div>
  <div class="cont1">
  </div>
  </span>
