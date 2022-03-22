<?php
include ("../conect.php");
include ("../autenticacion.php");
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$tipo = $_SESSION["tipo"];
$sucursal = $_SESSION["sucursal"];
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $_SESSION["var1"]=$var1;
    $re = $client->login("Estaciones", $tipo.",".$sucursal.",".$var1);
    $resultado = "".$re;
    $historial= explode(';',$resultado);
}else{
    $var1 = $_SESSION["var1"];
    $re = $client->login("Estaciones", $tipo.",".$sucursal.",".$var1);
    $resultado = "".$re;
    $historial= explode(';',$resultado);
}
foreach($historial as $llave => $valores) {
    $datos =explode(',',$valores);
    if (isset($datos[1])) {
?>
<tr>
    <td > <?php if (isset($datos[0])) {echo $datos[0]; }  ?> </td>
    <td > <?php if (isset($datos[1])) {echo $datos[1]; }  ?> </td>
</tr>
<?php
}}
$transport->close();
?>
