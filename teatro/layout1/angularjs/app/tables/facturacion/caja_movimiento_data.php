<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client->getAllCajaMovimiento($var1);
    $resultado= "".$re;
    $usuarios =explode(';;',$resultado);
}
$datat=NULL;
$data=[];
$text=' <a class="editarMV btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';

foreach($usuarios as $llave => $valores) {
    $usuario =explode(',',$valores);
    if (isset($usuario[2])) {
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$usuario[8],$usuario[9],$usuario[10],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>