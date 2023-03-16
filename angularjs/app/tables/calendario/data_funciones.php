
<?php
include ("../../conect_dashboard.php");
header("Content-type: application/json");
date_default_timezone_set("America/Lima"); 
$re = $client2->getGeneral2("eventos","");
$resultado = "".$re;
$usuarios= explode(';;',$resultado);
$acum=0;
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    if (isset($usuario[1])) {
        $dateTime = new DateTime($usuario[2]);
        $dateTime->modify("+".intval($usuario[3])."minutes");
        $result = $dateTime->format('Y-m-d H:i:s');
        $data2["title"]=$usuario[1];
        $data2["start"]=$usuario[2];
        $data2["end"]=$result;
        $data2["urlG"]="https://teatrosanchezaguilar.org/web-tsa/evento/".$usuario[0];
        $data2["className"]="bg-dark";
        $data2["imageUrl"]="https://teatrosanchezaguilar.org/imagenes/evento/".$usuario[0]."H.png";
        $data[]=$data2;
    } 
} 
echo json_encode($data,JSON_PRETTY_PRINT); 
?>
<?php
$transport2->close();
?>