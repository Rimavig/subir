<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$editar="";
$eliminar="";
$estado="";
$reset="";
if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client->getAllPuntos($var1,"Reporte");
    $resultado= "".$re;
    $funciones =explode(';;',$resultado);
}
$datat=NULL;
$data=[];
foreach($funciones as $llave => $valores) {
    $funcion =explode(',,,',$valores);
    if (isset($funcion[2])) {
        $data[]=array($funcion[0],$funcion[1],$funcion[2],$funcion[3],$funcion[4],$funcion[5]);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
?>