<!--REGISTRA RESIDENTE-->
<?php
include ("conect.php");

$resultado= "";
$re = $client->registro("ciudadela");
$resultado = "".$re;
$valor_array = explode(';',$resultado);
?>
<span class="error">
<div class="cont2">
  <div class="container1">
      <div class="Image_container">
        <img src="images\logo.png" alt="Avatar" >
      </div>
      <label class="registro" for="nombres"><b>Nombres*</b></label>
      <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" required>
      <label class="registro" for="apellidos"><b>Apellidos*</b></label>
      <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" pattern="[A-Za-z ]{2,25}"  id="apellidos" title="Ingrese sus 2 apellidos" required>
      <label class="registro" for="email"><b>Correo</b></label>
      <input type="email" placeholder="Ingrese su email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingrese email correcto" id="email"  autocomplete="email" >
      <span class="error" aria-live="polite"></span>
      <label class="registro" for="contraseña"><b>Contraseña*</b></label>
      <input type="password" placeholder="Ingrese su Contraseña" name="contraseña" pattern=".{6,}" id="contraseña"  title="Ingrese Contraseña (Mayor 6 caracteres)" required  >
      <label class="registro" for="contraseña1"><b>Contraseña*</b></label>
      <input type="password" placeholder="Confirmar contraseña" name="contraseña1" pattern=".{6,}" id="contraseña1"  title="Ingrese Contraseña nuevamente (Mayor 6 caracterequiredres)" required >
      <label class="registro" for="celular"><b>Celular*</b></label>
      <input type="text" placeholder="Ingrese su celular" name="celular" title="Ingrese celular(09########) "  pattern="[0-9]{10}" id="celular" required >
      <div>
      <label class="registro" for="ciudadela"  ><b>Ciudadela*</b></label>
      <select name="ciudadela" title="Seleccione Ciudadela" id="ciudadela" >
        <?php
        //Leo cuantos elementos hay en el array
        $cont = count($valor_array);
        //Consulto las keys del array
        $keys = array_keys($valor_array);
        //Busco la ultima
        $ultima_key = $keys[$cont-1];
        foreach($valor_array as $llave => $valores) {
            if($llave != $ultima_key){
              ?>
                 <option value='<?php echo $valores; ?>'><?php echo $valores; ?></option>
                 <?php
            }
        }
        $transport->close();
        ?>
      </select>
      </div>
      <label class="campos" ><b> Campos con * son obligadorios</b></label>
      <button type="submit" onclick="registrarse()">REGISTRARSE</button>
      <button onclick="location.href='login.php'">ATRAS</button>
      </div>
</div>
<div class="cont1">
</div>
</span>
