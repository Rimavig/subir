<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$re = $client->getPerfilRol($_SESSION["id"],"68");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$eliminar="";
$estado="";
$reset="";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a class="editarRegistro btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
}
if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client->getAllFuncion($var1,"R");
    $resultado= "".$re;
    $funciones =explode(';;',$resultado);
}

$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estado;   
foreach($funciones as $llave => $valores) {
    $funcion =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    if (isset($funcion[2])) {
        if ($funcion[9]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box"  '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($funcion[0],$funcion[1],$funcion[2],$funcion[3],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>