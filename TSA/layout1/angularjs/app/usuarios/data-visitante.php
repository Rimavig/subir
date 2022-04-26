<?php
include ("../conect.php");
include ("../autenticacion.php");
header("Content-type: application/json");
$re = $client->getAllVisitantes($_SESSION["usuario"]);
$resultado= "".$re;
$usuarios =explode(';',$resultado);
$datat=NULL;
$data=[];

$text=' <a class="deleteV btn btn-sm btn-danger" href="javascript:;"><i class="icons-office-52"></i></a>
<a class="editarV btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
<a class="estadoV btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>';      
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado1="";
    $estadoT1="OFF";
    if (isset($usuario[2])) {
        if ($usuario[4]==="A" ) {
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
        $data[]=array($usuario[0],$usuario[2],$usuario[3],$usuario[1],$est1,$text);

    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
