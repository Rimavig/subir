<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$varF = $_GET['var1'];
$varI = $_GET['var2'];
$re = $client->getAllGeneral("compras_eliminadas",$varF,$varI);
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];

$re = $client->getPerfilRol($_SESSION["id"],"55");
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
    if (isset($usuario[19])) { 
        if ($usuario[18]=="0") { 
            $data[]=array($usuario[0],$usuario[18],' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$usuario[9].'.pdf" target="_blank">'.$usuario[9].'</a>',$usuario[19],$usuario[17],$usuario[10],$usuario[11],$usuario[16],$usuario[14],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[8]);
        } else{
            $data[]=array($usuario[0],$usuario[18],' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$usuario[9].'.pdf" target="_blank">'.$usuario[9].'</a>',"SI",$usuario[17],$usuario[10],$usuario[11],$usuario[16],$usuario[14],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[8]);
        }
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
?>