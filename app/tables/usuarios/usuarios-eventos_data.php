<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getPerfilRol($_SESSION["id"],"3");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$eliminar="";
$estado="";
$reset="";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a class="editarE btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
    if($valores1==="3"){
        $eliminar='<a class="deleteE btn btn-sm btn-danger" style="margin: 5px 0px;  " href="javascript:;"><i class="icon-trash"></i></a>';
    }
    if($valores1==="5"){
        $estado='<a class="estadoE btn btn-sm btn-warning" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>';
    }
    if($valores1==="4"){
        $reset='<a class="claveE btn btn-sm btn-blue" style="margin: 5px 0px;" href="javascript:;"><i class="icon-key"></i></a>';
    }
}
$re = $client->getAllUsuarioEvento();
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estado." ".$reset;  
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado2="Off";
    if (isset($usuario[2])) {
        if ($usuario[12]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if ($usuario[12]==="P" ) {
            $estadoT="PV";
            $estado2="PV";
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box"  value="'.$usuario[12].'" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off='.$estado2.'></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[6],$usuario[7],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
