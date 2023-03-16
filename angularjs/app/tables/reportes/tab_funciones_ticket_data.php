<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getPerfilRol($_SESSION["id"],"67");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$eliminar="";
$estado="";
$reset="";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a class="editarFuncionTicket btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
}
if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client->getAllFuncion($var1,"ticket");
    $resultado= "".$re;
    $funciones =explode(';;;',$resultado);
}

$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estado;   
foreach($funciones as $llave => $valores) {
    $funcion =explode(',,,',$valores);

    if (isset($funcion[2])) {
        $data[]=array($funcion[0],$funcion[1],$funcion[2],$funcion[3],$funcion[4],$funcion[5],$funcion[6],$funcion[7],$funcion[8],$funcion[9],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
?>