<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$varF = $_GET['var1'];
$varI = $_GET['var2'];
$re = $client->getAllGeneral("Regalo",$varF,$varI);
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
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box"  value="'.$usuario[9].'" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off='.$estado2.'></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$usuario[8].'.pdf" target="_blank">'.$usuario[8].'</a>',$est1);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
?>