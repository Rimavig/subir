<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$varF = $_GET['var1'];
$varI = $_GET['var2'];
$re = $client->getAllGeneral("compras_notas",$varF,$varI);
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];

$re = $client->getPerfilRol($_SESSION["id"],"85");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$correo="";


foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a title="Actualizar nota Crédito" class="updateNotaCredito btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
}
$text=$editar." ".$correo;     

foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado1="";
    $estadoT1="OFF";
    if (isset($usuario[5])) { 
        $data[]=array($usuario[0],$usuario[1],' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$usuario[2].'.pdf" target="_blank">'.$usuario[2].'</a>',' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/nc/'.$usuario[3].'.pdf" target="_blank">'.$usuario[3].'</a>',$usuario[4],$usuario[5],$usuario[6],$usuario[7],$usuario[8],$usuario[9],$usuario[10],$usuario[11],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
?>