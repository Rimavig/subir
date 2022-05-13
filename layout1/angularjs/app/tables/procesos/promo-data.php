<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getAllEvento("P");
$resultado= "".$re;
$usuarios =explode(';',$resultado);
$datat=NULL;
$data=[];
      
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    if (isset($usuario[16])) {
        if ($usuario[16]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        }
 
        $text=' <a class="btn btn-sm btn-dark editar"  style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>'; 
        
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[1],$usuario[3],$usuario[4],$usuario[6],$usuario[14],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>