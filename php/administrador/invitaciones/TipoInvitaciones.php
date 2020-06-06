<!--Escogue el tipo de invitaciones-->
<?php include ("../menu/autenticacion.php");?>
<?php if (isset($_POST["var1"])) {
  $var1 = $_POST['var1'];
   if($var1=="InvitacionesE"){
    $var2= "InormalE()";
    $var3= "IrecurrenteE()";
    $texto="Invitaciones Enviadas";
  }else{
    $var2= "InormalR()";
    $var3= "IrecurrenteR()";
    $texto="Invitaciones que Ingresaron";
  }
}
?>
<span class="error">
    <div class="container1" >
        <div class=" conti1" >

          <label class="tableD" id="texto"><b><?php echo $texto; ?></b></label>

          <div class="botonA" >
            <button  class="tableB " onclick="<?php echo $var2; ?>" ><span class="icon-upload2"></span>  Invitaciones<br>Normales</button>
            <button  class="tableB " onclick="<?php echo $var3; ?>" ><span class="icon-upload2"></span>  Invitaciones<br>Recurrentes</button>
          </div >
        </div >
  </div >
  <div class="conti2" ></div >
</span>
