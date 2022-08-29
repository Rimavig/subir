<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$re = $client->getAllCajaTaquilla($_SESSION["id"]);
$resultado= "".$re;
$usuarios =explode(';;',$resultado);

$datat=NULL;
$data=[];
$text=' <a class="editarMT btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';

foreach($usuarios as $llave => $valores) {
    $usuario =explode(',',$valores);
    $estado="";
    $estadoT="OFF";
    $tipo="";
    if (isset($usuario[2])) {
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>