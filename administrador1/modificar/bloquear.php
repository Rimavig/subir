<!--BLOQUEA USUARIOS-->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");
$resultado="";
$var1 = $_POST['var1'];
$var2 = $_POST['var2'];
$usuario = $_SESSION["usuario"];
if(isset($_POST["var3"])){
    $re = $client->login("bloquear","".$var1.",".$var2);
}else{
    $re = $client->login("usuario","".$usuario.":".$var1.",".$var2);
    $resultado = "".$re;
    $noticias1 =explode(';',$resultado);
    $noticias =explode(',',$noticias1[0]);
}
$transport->close();

?>
  <div class="bloquear table-responsive text-nowrap"  >
    <div>
      <label for="nombres" ><b>Nombres</b></label>
      <input type="text" id="nombres" value="<?php echo $noticias[0];?>" disabled>
    </div>
    <div>
      <label for="apellidos"><b>Apellidos</b></label>
      <input type="text" id="apellidos" value="<?php echo $noticias[1];?>" disabled>
    </div>

    <div>
      <label for="email"><b>Email</b></label>
        <input type="email" id="email"  value="<?php echo $noticias[3];?>" disabled>
    </div>
    <div>
        <label for="contraseña"><b>Contraseña</b></label>
        <input type="password" id="contraseña" value="<?php echo $noticias[4];?>" disabled>
    </div>
    <div>
      <label for="celular"><b>Celular</b></label>
        <input type="text" id="celular" value="<?php echo $noticias[6];?>" disabled>
    </div>
    <div>
        <label for="departamento"><b>Departamento</b></label>
        <input type="text" id="departamento"value="<?php echo $noticias[8];?>" disabled >
    </div>
    <div>
      <label for="ciudadela" id="ciudadela" ><b>Ciudadela</b></label>
      <select name="ciudadela" title="Seleccione Ciudadela" disabled >
        <option value="<?php echo $noticias[9];?>" ><?php echo $noticias[9];?></option>
      </select>
    </div>
  <div class="botonA" >
      <button  class="tableB" onclick="Bbloquear()"><span class="icon-user-tie"></span>Bloquear</button >
      <button class="tableB" onclick="usuarios('0')" ><span class="icon-redo2"></span>Cancelar</button>

  </div >
</div >
