<?php
include ("../conect.php");
include ("../autenticacion.php");
header("Content-type: application/json");
$re = $client->getAllResidentes($_SESSION["usuario"]);
$resultado= "".$re;
$usuarios =explode(';',$resultado);
$datat=NULL;
$data=[];

$text='<a class="editar btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
<a class="estado btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>';      
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado1="";
    $estadoT1="OFF";
    if (isset($usuario[2])) {
        if ($usuario[7]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if ($usuario[8]==="S" ) {
            $estado1="checked";
            $estadoT1="ON";
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $est='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box1" '.$estado1.' disabled>
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado1" class="esconder"> '.$estadoT1.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[2]." ".$usuario[3],$usuario[1],$usuario[5],$usuario[4],$usuario[6],$est1, $est,$text);

    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
