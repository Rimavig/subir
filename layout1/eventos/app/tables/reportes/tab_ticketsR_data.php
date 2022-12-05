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
$ver="";
$correo="";

if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client->getAllTickets($var1,"G");
    $resultado= "".$re;
    $funciones =explode(';;',$resultado);
}
foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="3"){
        $eliminar='<a class="deleteR btn btn-sm btn-danger" style="margin: 5px 0px;  " href="javascript:;"><i class="icon-trash"></i></a>';
    }
    if($valores1==="5"){
        $estado='<a class="estadoR btn btn-sm btn-warning" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>';
    }
    if($valores1==="21"){
        $ver='<a class="verR btn btn-sm btn-blue" style="margin: 5px 0px;" href="javascript:;"><i class="glyphicon glyphicon-qrcode"></i></a>';
    }
    if($valores1==="20"){
        $correo='<a class="correoR btn btn-sm btn-success" style="margin: 5px 0px;" href="javascript:;"><i class="icon-envelope"></i></a>';
    }
}
$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estado." ".$ver." ".$correo;   
foreach($funciones as $llave => $valores) {
    $funcion =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $fact="";
    $localidad="";
    if (isset($funcion[2])) {
        if ($funcion[11]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if ($funcion[7]==="A" ) {
            $localidad="App";
        } 
        if ($funcion[7]==="W" ) {
            $localidad="Web";
        } 
        if ($funcion[7]==="T" ) {
            $localidad="Taquilla";
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box"  '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($funcion[0],$funcion[1],$funcion[2],$funcion[3],$funcion[4],$funcion[5],$funcion[6],$localidad,$funcion[8],$funcion[9],$funcion[10],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
