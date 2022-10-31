<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getPerfilRol($_SESSION["id"],"19");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$eliminar="";
$estado="";
$reset="";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a class="editar btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
}
$re = $client->getAllEvento("Ventas");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estado;   
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado2="Off";
    if (isset($usuario[2])) {
        if ($usuario[7]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if ($usuario[7]==="P" ) {
            $estadoT="OG";
            $estado2="PA";
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box"  value="'.$usuario[6].'" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off='.$estado2.'></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[1],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>