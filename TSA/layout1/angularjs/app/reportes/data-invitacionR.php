<?php
include ("../conect.php");
include ("../autenticacion.php");
header("Content-type: application/json");
$re = $client->getAllInvitacionR($_SESSION["usuario"]);
$resultado= "".$re;
$usuarios =explode(';',$resultado);
$datat=NULL;
$data=[];
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado1="";
    $estadoT1="OFF";
    if (isset($usuario[10])) {
        if ($usuario[10]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[2],$usuario[1],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$usuario[8],$usuario[9],$est1);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
