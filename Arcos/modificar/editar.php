
<!--EDITA USUARIO DEL SISTEMA-->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");
$resultado="";
$var1 = $_POST['var1'];
if(isset($_POST["var3"])){
    $client->login("editar",$_POST["var3"]);
}else{
    $re = $client->login("seleccionar","".$var1);
    $resultado = "".$re;
    $noticias1 =explode(';',$resultado);
    $noticias =explode(',',$noticias1[0]);
}
$transport->close();
?>


  <div class="editar table-responsive text-nowrap"  >
    <div>
      <label for="id"><b>ID</b></label>
      <input type="text"  id="id" value="<?php echo $noticias[0];?>" disabled>
    </div>
    <div>
      <label for="nombres"><b>Nombres</b></label>
      <input type="text" placeholder="Ingrese su nombre" name="nombres" pattern="[A-Za-z ]{2,25}"  id="nombres" title="Ingrese sus 2 nombres" value="<?php echo $noticias[1];?>" disabled>
    </div>
    <div>
      <label for="cedula"><b>Cédula</b></label>
      <input type="text" placeholder="Ingrese cedula" name="cedula" pattern="[A-Za-z ]{2,25}"  id="cedula" title="Ingrese cedula" value="<?php echo $noticias[2];?>" disabled>
    </div>
    <div>
      <label for="cantidad"><b>Cantidad</b></label>
        <input type="text" placeholder="Ingrese cantidad" name="cantidad" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingrese cantidad correcta" id="cantidad"  value="<?php echo $noticias[3];?>" disabled>
    </div>
    <div>
        <label for="actividad"><b>Actividad</b></label>
        <input type="text" autocomplete="off" placeholder="Ingrese Actividad" name="actividad" pattern=".{6,}" id="actividad"  title="Ingrese Actividad "value="<?php echo $noticias[5];?>" required  >
    </div>
    <div>
        <label for="observaciones"><b>Observaciones</b></label>
        <input type="text" autocomplete="off" placeholder="Ingrese observaciones" name="observaciones"  pattern="[A-Za-z ]{2,25}"  id="observaciones"  title="Ingrese observaciones"value="<?php echo $noticias[6];?>" required  >
    </div>
    <div>
      <label for="Fecha"><b>Fecha</b></label>
        <input type="text" placeholder="Ingrese su Fecha" name="fecha" title="Ingrese fecha "  pattern="[0-9]{10}" id="fecha"value="<?php echo $noticias[4];?>" disabled >
    </div>
    <div>
      <label for="empresa"  ><b>Empresa</b></label>
      <select name="empresa" id="empresa" title="Seleccione empresa" disabled>
        <option value="<?php echo $noticias[8];?>" ><?php echo $noticias[8];?></option>
      </select>
    </div>
  <div class="botonA" >
      <button  class="tableB" onclick="Beditar('0')" ><span class="icon-user-tie"></span>Aceptar</button >
        <button  class="tableB" onclick="Beditar('1')" ><span class="icon-user-tie"></span>Rechazar</button >
      <button class="tableB" onclick="usuarios('0')" ><span class="icon-redo2"></span>Cancelar</button>

  </div >
</div >
