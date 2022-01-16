
<?php
include ("../conect.php");
include ("../autenticacion.php");
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$tipo = $_SESSION["tipo"];
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $_SESSION["var1"]=$var1;
    $re = $client->login("Principal", $tipo.",".$var1);
    $resultado = "".$re;
    $historial= explode('-',$resultado);
}else{
    $var1 = $_SESSION["var1"];
    $re = $client->login("Principal", $tipo.",".$var1);
    $resultado = "".$re;
    $historial= explode('-',$resultado);
}

foreach($historial as $llave => $valores) {
    $datos =explode(',',$valores);
    if (isset($datos[1])) {
?>


<tr>
    <td> <?php if (isset($datos[1])) {echo $datos[1]; }  ?> </td>
    <td > 
        <?php 
            if (isset($datos[0])) {
                if (($datos[0])=="ECO") {
                    ?>
                    <img data-src="" src="../../../assets/global/images/equipos/eco.png" class="img-responsive" alt="gallery 3">
                    <?php
                } 
                if (($datos[0])=="SUPER") {
                    ?>
                    <img data-src="" src="../../../assets/global/images/equipos/super.png" class="img-responsive" alt="gallery 3">
                    <?php
                } 
                if (($datos[0])=="DIESEL") {
                    ?>
                    <img data-src="" src="../../../assets/global/images/equipos/diesel.png" class="img-responsive" alt="gallery 3">
                    <?php
                } 
            }  
        ?> 
    </td>
    <td> <?php if (isset($datos[2])) {echo $datos[2]; }  ?> </td>
    <td> <?php if (isset($datos[3])) {echo $datos[3]; }  ?> </td>
    <td > <?php if (isset($datos[4])) {echo $datos[4]; }  ?> </td>
</tr>
<?php
}}
$transport->close();
?>

<script>
  setInterval(function() {
    $('#cont2').load('./dashboard/estaciones.php',function() {    
        $('.page-spinner-loader').addClass('hide');
        $('#esconder').removeClass('esconder');
        $('#esconder1').removeClass('esconder');
    });
  },120000);
</script>