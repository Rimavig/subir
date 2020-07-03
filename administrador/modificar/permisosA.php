<!--EDITA PERMISOS DE USUARIO-->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");

$resultado="";
$invitar="";
$ingreso="";
$var1 = $_POST['var1'];
$var2 = $_POST['var2'];

if(isset($_POST["var3"])){
    $var3 = $_POST['var3'];
    $var4 = $_POST['var4'];
    $client->login("permisosA","".$var1.",".$var2.",".$var3.",".$var4);
}else{
    $re = $client->login("permisos","".$var1.",".$var2);
    $resultado = "".$re;
    $noticias1 =explode(';',$resultado);
    $noticias =explode(',',$noticias1[0]);
    if ($noticias[6]=="A") {
        $ingreso="checked";
    }
    if ($noticias[5]=="S") {
        $invitar="checked";
    }


}
$transport->close();
?>
  <div class="permisos table-responsive text-nowrap"  >
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
        <input type="email" id="email"  value="<?php echo $noticias[2];?>" disabled>
    </div>
    <div>
      <label for="cedula"><b>Cedula</b></label>
      <input type="text" id="cedula" value="<?php echo $noticias[3];?>"  disabled >
    </div>
    <div>
      <label for="celular"><b>Celular</b></label>
        <input type="text" id="celular" value="<?php echo $noticias[4];?>" disabled>
    </div>
      <div >
        <label ><b>Invitación</b></label>
				<input class="apple-switch" type="checkbox" name="condiciones1"  value="ok1" id="Minvitacion" <?php echo $invitar?>>
      </div>
      <div >
        <label for="ingreso"><b>Ingreso</b></label>
				<input class="apple-switch" type="checkbox" name="condiciones" value="ok" id="Mingreso" <?php echo $ingreso?>>
      </div>


  <div class="botonA" >
      <button  class="tableB" onclick="Bpermisos('1')"  ><span class="icon-user-tie"></span>Editar</button >
      <button class="tableB" onclick="usuarios('0')" ><span class="icon-redo2"></span>Cancelar</button>

  </div >
</div >
