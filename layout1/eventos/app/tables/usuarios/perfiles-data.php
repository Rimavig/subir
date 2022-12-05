<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$re = $client->getAllPerfil();
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$re = $client->getPerfilRol($_SESSION["id"],"4");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$eliminar="";
$estado="";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a class="editarPerfil btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
    if($valores1==="3"){
        $eliminar='<a class="deletePerfil btn btn-sm btn-danger" style="margin: 0px;  " href="javascript:;"><i class="icon-trash"></i></a>';
    }
    if($valores1==="5"){
        $estado='<a class="estadoPerfil btn btn-sm btn-warning" style="margin: 0px;" href="javascript:;"><i class="icon-lock"></i></a>';
    }
}

$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estado;    
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $tipo="";
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
        $data[]=array($usuario[0],$usuario[1],$usuario[3],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>