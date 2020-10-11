<!--PERDIL DE VISITANTE-->
<?php
include ("autenticacion.php");?>
<div class="container1">
  <div class="bloquear table-responsive text-nowrap"  >
    <div>
      <label for="nombres" ><b>Nombres</b></label>
      <input type="text" id="nombres" value="<?php echo $_SESSION["nombres"];?>" disabled>
    </div>
    <div>
      <label for="apellidos"><b>Apellidos</b></label>
      <input type="text" id="apellidos" value="<?php echo $_SESSION["apellidos"];?>" disabled>
    </div>
    <div>
      <label for="celular"><b>Cédula</b></label>
      <input type="text" id="celular" value="0<?php echo $_SESSION["id"];?>"  disabled >
    </div>
  </div >
</div>
