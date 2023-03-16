<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getAllPreguntas();
$resultado= "".$re;
$usuarios =explode(';;',$resultado);

$datat=NULL;
$data=[];

foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    if (isset($usuario[1])) {
        $text=' <a class="editarPregunta btn btn-sm btn-dark" style="margin: 5px;  "  href="javascript:;"><i class="icon-note"></i></a>
        <a class="eliminarPregunta btn btn-sm btn-danger" style="margin: 5px;  "  href="javascript:;"><i class="icon-trash"></i></a>'; 
        
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
?>