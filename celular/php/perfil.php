<!--PERDIL DE RESIDENTE-->
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
        <label for="email"><b>Email</b></label>
          <input type="email" id="email"  value="<?php echo $_SESSION["correo"];?>" disabled>
      </div>
      <div>
        <label for="cedula"><b>Cédula</b></label>
        <input type="text" id="cedula" value="<?php echo $_SESSION["id"];?>"  disabled >
      </div>
      <div>
        <label for="celular"><b>Celular</b></label>
          <input type="text" id="celular" value="<?php echo $_SESSION["telefono"];?>" disabled>
      </div>
      <div>
          <label for="nacimiento"><b> Nacimiento</b></label>
          <input type="date" id="nacimiento"  value="<?php echo $_SESSION["fecha_nacimiento"];?>" disabled>
      </div>
      <div>
        <label for="sexo" id="sexo"  ><b>Sexo</b></label>
        <select name="sexo" disabled>
          <option value="<?php echo $_SESSION["genero"];?>" ><?php echo $_SESSION["genero"];?></option>
        </select>
      </div>
      <div>
        <label for="ciudadela" id="ciudadela" ><b>Ciudadela</b></label>
        <select name="ciudadela" title="Seleccione Ciudadela" disabled >
          <option value="<?php echo $_SESSION["ciudadelas"];?>" ><?php echo $_SESSION["ciudadelas"];?></option>
        </select>
      </div>
    </div >
  </div>
