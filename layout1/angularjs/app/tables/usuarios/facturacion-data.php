<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client->getAllFacturacion($var1);
    $resultado= "".$re;
    $usuarios =explode(';;',$resultado);
}

$datat=NULL;
$data=[];
$text=' <a class="editarF btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
<a class="deleteF btn btn-sm btn-danger" style="margin: 0px;  " href="javascript:;"><i class="icon-trash"></i></a>
<a class="estadoF btn btn-sm btn-warning" style="margin: 0px;" href="javascript:;"><i class="icon-lock"></i></a>';      
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $tipo="";
    if (isset($usuario[2])) {
        if ($usuario[8]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if (isset($usuario[5])) {
            if ($usuario[5]==="C" ) {
                $tipo="Cédula"; 
            }
            if ($usuario[5]==="P" ) {
                $tipo="Pasaporte"; 
            }
            if ($usuario[5]==="R" ) {
                $tipo="Razón social"; 
            }
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[1],$tipo,$usuario[3],$usuario[7],$usuario[6],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>