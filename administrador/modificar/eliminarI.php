<!--ELIMINA USUARIOS-->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");
$resultado="";
$registration[]=null;
$var1 = $_POST['var1'];
$var2 = $_POST['var2'];

if(isset($_POST["var3"])){
    $re = $client->login("eliminar","".$var1.",".$var2);
}else{
    $re = $client->login("usuario","".$var1.",".$var2);
    $resultado = "".$re;
    $noticias1 =explode(';',$resultado);
    $noticias =explode(',',$noticias1[0]);
}
  $transport->close();
?>
  <div class="eliminar table-responsive text-nowrap"  >
    <div>
      <label for="nombres" ><b>Nombres</b></label>
      <input type="text" id="nombres" value="<?php echo $noticias[0];?>" disabled>
    </div>
    <div>
      <label for="apellidos"><b>Apellidos</b></label>
      <input type="text" id="apellidos" value="<?php echo $noticias[1];?>" disabled>
    </div>
    <div>
      <label for="cedula"><b>Cedula</b></label>
      <input type="text" placeholder="Ingrese su cedula" name="cedula" title="Ingrese cedula correcta " pattern="[0-9]{10}" id="cedula" value="<?php echo $noticias[2];?>"  disabled >
    </div>
    <div>
        <label for="contraseña"><b>Contraseña</b></label>
        <input type="password" id="contraseña" value="<?php echo $noticias[3];?>" disabled>
    </div>
  <div class="botonA" >
      <button  class="tableB" onclick="Beliminar('1')" ><span class="icon-user-minus"></span>Eliminar</button >
      <button class="tableB" onclick="usuarios('1')" ><span class="icon-redo2"></span>Cancelar</button>

  </div >
</div >
