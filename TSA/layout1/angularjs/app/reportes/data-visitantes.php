<?php
include ("../conect.php");
include ("../autenticacion.php");
header("Content-type: application/json");
$re = $client->getAllInvitacionV($_SESSION["usuario"]);
$resultado= "".$re;
$usuarios =explode(';',$resultado);
$datat=NULL;
$data=[];
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado1="";
    $estadoT1="OFF";
    if (isset($usuario[2])) {
        $data[]=array($usuario[2],$usuario[1],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$usuario[8]);

    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
