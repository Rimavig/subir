<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getAllReserva($_SESSION["id"]);
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
$text=' <a class="deleteReserva btn btn-sm btn-danger" style="margin: 0px;  " href="javascript:;"><i class="icon-trash"></i></a> ';      
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    if (isset($usuario[8])) {
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[7],$usuario[8],$usuario[9],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>