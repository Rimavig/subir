<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$re = $client3->getPerfilRol($_SESSION["id"],"41");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$estado=false;

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a title="Ver movimientos" class="editarMT btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
    if($valores1==="27"){
        $estado=true;
    }
}
if($estado){
    $re = $client3->getAllCajaTaquilla("T");
    $resultado= "".$re;
    $usuarios =explode(';;',$resultado);
}else{
    $re = $client3->getAllCajaTaquilla($_SESSION["id"]);
    $resultado= "".$re;
    $usuarios =explode(';;',$resultado);
}
$datat=NULL;
$data=[];
$text=$editar;  

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
<?php
$transport3->close();
?>