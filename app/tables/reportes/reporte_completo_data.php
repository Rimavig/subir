<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$varF = $_GET['var1'];
$varI = $_GET['var2'];
$re = $client->getAllGeneral("Completo",$varF,$varI);
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$mensaje="OTRO";
$tarjeta="OTRA";
$data=[];     
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado2="Off";
    if (isset($usuario[9])) {
        if ($usuario[9]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        }
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$usuario[8],
        $usuario[9],$usuario[10],$usuario[11],$usuario[12],$usuario[13],$usuario[14],$usuario[15],$usuario[16],$usuario[17],$usuario[18],
        $usuario[19],$usuario[20],$usuario[21],$usuario[22],$usuario[23],$usuario[24],$usuario[25],$usuario[26],$usuario[27],$usuario[28],
        $usuario[29],$usuario[30],$usuario[31],$usuario[32],$usuario[33],$usuario[34],$usuario[35],$usuario[36],$usuario[37],$usuario[38],
        $usuario[39],$usuario[40],$usuario[41],$usuario[42],$usuario[43],$usuario[44],$usuario[45],$usuario[46],$usuario[47],
        $usuario[48],$usuario[49],$usuario[50],$usuario[51],$usuario[52],$usuario[53],$usuario[54],$usuario[55],$usuario[56],$usuario[57],
        $usuario[58],$usuario[59]);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>