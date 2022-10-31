<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1 = $_POST['var1'];
?>
<input type="text" id="CajaN" class="esconder"  value="<?php echo $var1; ?>" disabled>
<?php
?>    