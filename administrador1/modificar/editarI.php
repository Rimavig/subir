<!--EDITA VISITANTE DEL SISTEMA-->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");

$resultado="";
$var1 = $_POST['var1'];
$var2 = $_POST['var2'];
if(isset($_POST["var3"])){
    $client->login("editarI",$_POST["var3"]);
}else{
    $re = $client->login("usuario","".$var1.",".$var2);
    $resultado = "".$re;
    $noticias1 =explode(';',$resultado);
    $noticias =explode(',',$noticias1[0]);
    if ($noticias[4]=="A") {
        $ingreso="checked";
    }else{
       $ingreso="";
    }
}
$transport->close();
?>
  <div class="editar table-responsive text-nowrap"  >
    <div>
      <label for="nombres"><b>Nombres</b></label>
      <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" value="<?php echo $noticias[0];?>" required>
    </div>
    <div>
      <label for="apellidos"><b>Apellidos</b></label>
      <input type="text" placeholder="Ingrese sus apellidos" name="apellidos" pattern="[A-Za-z ]{2,25}"  id="apellidos" title="Ingrese sus 2 apellidos" value="<?php echo $noticias[1];?>" required>
    </div>
    <div>
      <label for="celular"><b>Celular</b></label>
      <input type="text" placeholder="Ingrese su celular" name="celular" title="Ingrese celular correcto " pattern="[0-9]{10}" id="celular" value="<?php echo $noticias[2];?>"  disabled >
    </div>
    <div>
        <label for="contraseña"><b>Contraseña</b></label>
        <input type="password" autocomplete="off" placeholder="Ingrese su Contraseña" name="contraseña" pattern=".{6,}" id="contraseña"  title="Ingrese Contraseña (Mayor 6 caracteres)"value="<?php echo $noticias[3];?>" required  >
    </div>
    <div >
      <label for="ingreso"><b>Ingreso</b></label>
      <input class="apple-switch" type="checkbox" name="condiciones" value="ok" id="Mingreso" <?php echo $ingreso?>>
    </div>
  <div class="botonA" >
      <button  class="tableB" onclick="Beditar('1')" ><span class="icon-user-tie"></span>Editar</button >
      <button class="tableB" onclick="usuarios('1')" ><span class="icon-redo2"></span>Cancelar</button>

  </div >
</div >
