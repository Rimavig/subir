<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getPerfilRol($_SESSION["id"],"2");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$eliminar="";
$estado="";
$reset="";
$facturacion="";
$correo="";
foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a title="Editar" class="editarC btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
    if($valores1==="3"){
        $eliminar='<a title="Eliminar" class="deleteC btn btn-sm btn-danger" style="margin: 5px 0px;  " href="javascript:;"><i class="icon-trash"></i></a>';
    }
    if($valores1==="5"){
        $estado='<a title="Activar/inactivar" class="estadoC btn btn-sm btn-warning" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>';
    }
    if($valores1==="4"){
        $reset='<a title="Enviar Correo de reseteo" class="claveC btn btn-sm btn-blue" style="margin: 5px 0px;" href="javascript:;"><i class="icon-key"></i></a>';
    }
    if($valores1==="15"){
        $facturacion='<a title="Datos de facturaciòn" class="facturacion btn btn-sm btn-info" style="margin: 5px 0px;" href="javascript:;"><i class="icon-credit-card"></i></a>';
    }
    if($valores1==="20"){
        $correo='<a title="Enviar Correo de activaciòn cuenta"class="correoR btn btn-sm btn-success" style="margin: 5px 0px;" href="javascript:;"><i class="icon-envelope"></i></a>';
    }
}
$re = $client->getAllUsuarioCliente();
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estado." ".$reset." ".$facturacion." ".$correo;       
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado2="Off";
    if (isset($usuario[2]) && $usuario[0] !=1 ) {
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