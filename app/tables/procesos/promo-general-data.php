<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getPerfilRol($_SESSION["id"],"26");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$eliminar="";
$estad="";
$reset="";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a class="btn btn-sm btn-dark editar_general"  style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>';
    }
    if($valores1==="3"){
        $eliminar='<a class="btn btn-sm btn-danger delete_general" style="margin: 5px;"  href="javascript:;"><i class="icon-trash"></i></a>';
    }
    if($valores1==="5"){
        $estad='<a class="btn btn-sm btn-blue estado_general"  style="margin: 5px;"  style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>';
    }
}
$re = $client->getAllPromociones();
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estad;  
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    if (isset($usuario[2])) {
        if ($usuario[8]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        }
        if ($usuario[4]=="T") {
            $localidad="TODAS";
        }else if ($usuario[4]=="W") {
            $localidad="WEB";
        }else if ($usuario[4]=="A") {
            $localidad="APP";
        }else if ($usuario[4]=="V") {
            $localidad="TAQUILLA";
        }else if ($usuario[4]=="WA") {
            $localidad="WEB/APP";
        }else if ($usuario[4]=="WV") {
            $localidad="WEB/TAQUILLA";
        }else if ($usuario[4]=="AV") {
            $localidad="APP/TAQUILLA";
        }      
        
        
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$localidad,$usuario[5],$usuario[6],$usuario[7],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>