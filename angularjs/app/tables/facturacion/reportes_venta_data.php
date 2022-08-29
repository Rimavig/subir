<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$re = $client->getAllCompras();
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
$text=' <a class="editarVC btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';      

foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    if (isset($usuario[2])) {
        $data[]=array($usuario[0],' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/archivos/factura/'.$usuario[9].'.pdf" target="_blank">'.$usuario[9].'</a>',$usuario[17],$usuario[16],$usuario[14],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[8],$usuario[15],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>