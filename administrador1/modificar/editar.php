
<!--EDITA USUARIO DEL SISTEMA-->
<?php
include ("../menu/autenticacion.php");
include ("../menu/conect.php");
$resultado="";
$var1 = $_POST['var1'];
$var2 = $_POST['var2'];
$usuario = $_SESSION["usuario"];
if(isset($_POST["var3"])){
    $client->login("editar",$_POST["var3"]);
}else{
    $re = $client->login("usuario","".$usuario.":".$var1.",".$var2);
    $resultado = "".$re;
    $noticias1 =explode(';',$resultado);
    $noticias =explode(',',$noticias1[0]);
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
      <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Ingrese su email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingrese email correcto" id="email"  value="<?php echo $noticias[3];?>" required>
    </div>
    <div>
        <label for="contraseña"><b>Contraseña</b></label>
        <input type="password" autocomplete="off" placeholder="Ingrese su Contraseña" name="contraseña" pattern=".{6,}" id="contraseña"  title="Ingrese Contraseña (Mayor 6 caracteres)"value="<?php echo $noticias[4];?>" required  >
    </div>
    <div>
        <label for="departamento"><b>Departamento</b></label>
        <input type="text" autocomplete="off" placeholder="Ingrese el Departamento" name="departamento"  pattern="[A-Za-z ]{2,25}"  id="departamento"  title="Ingrese Departamento"value="<?php echo $noticias[8];?>" required  >
    </div>
    <div>
      <label for="celular"><b>Celular</b></label>
        <input type="text" placeholder="Ingrese su celular" name="celular" title="Ingrese celular(09########) "  pattern="[0-9]{10}" id="celular"value="<?php echo $noticias[6];?>" disabled >
    </div>
    <div>
      <label for="ciudadela"  ><b>Ciudadela</b></label>
      <select name="ciudadela" id="ciudadel" title="Seleccione Ciudadela" disabled>
        <option value="<?php echo $noticias[9];?>" ><?php echo $noticias[9];?></option>
      </select>
    </div>
  <div class="botonA" >
      <button  class="tableB" onclick="Beditar()" ><span class="icon-user-tie"></span>Editar</button >
      <button class="tableB" onclick="usuarios('0')" ><span class="icon-redo2"></span>Cancelar</button>

  </div >
</div >
