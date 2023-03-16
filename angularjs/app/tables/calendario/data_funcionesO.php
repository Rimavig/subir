
<?php
include ("../../conect_dashboard.php");
header("Content-type: application/json");
date_default_timezone_set("America/Lima"); 
$re = $client2->getGeneral2("eventosO","");
$resultado = "".$re;
$usuarios= explode(';;',$resultado);
$acum=0;
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    if (isset($usuario[1])) {
        $data2["id"]=$usuario[0];
        $data2["title"]=$usuario[1];
        $data2["start"]=$usuario[3];
        $data2["end"]=$usuario[4];
        $data2["className"]=$usuario[5];
        $data[]=$data2;
    } 
} 
echo json_encode($data,JSON_PRETTY_PRINT); 
?>
<?php
$transport2->close();
?>