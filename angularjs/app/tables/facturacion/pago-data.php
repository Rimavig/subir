<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client3->getAllEsperaPago($_SESSION["id"]);
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
$text=' <a class="deletePago btn btn-sm btn-danger" style="margin: 0px;  " href="javascript:;"><i class="icon-trash"></i></a> ';      
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',',$valores);
    if (isset($usuario[4])) {
        $data[]=array($usuario[0],$usuario[1],$usuario[3],$usuario[2],$usuario[4],$usuario[5],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport3->close();
?>