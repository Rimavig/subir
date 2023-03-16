<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$re = $client3->getAllGeneral("error_compras","","");
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
    if (isset($usuario[2])) {
        if ($usuario[8]==="1" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if ($usuario[6]==="vi" ) {
            $tarjeta="Visa";
        }
        if ($usuario[6]==="mc" ) {
            $tarjeta="Mastercard";
        }
        if ($usuario[6]==="ax" ) {
            $tarjeta="American Express";
        }
        if ($usuario[6]==="di" ) {
            $tarjeta="Diners";
        }
        if ($usuario[6]==="dc" ) {
            $tarjeta="Discover";
        }
        if ($usuario[6]==="ms" ) {
            $tarjeta="Maestro";
        }

        
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box"  value="'.$usuario[8].'" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off='.$estado2.'></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$usuario[1].'.pdf" target="_blank">'.$usuario[1].'</a>',$usuario[2],$usuario[3],$usuario[4],$usuario[5],$tarjeta,$usuario[7],$est1);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport3->close();
?>