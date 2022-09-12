<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$var1="";
$re = $client->getPerfilRol($_SESSION["id"],"24");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$eliminar="";
$estado="";
$ticket=false;
$facturacion="";
$correo="";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a class="editar btn btn-sm btn-dark" style="margin: 5px ;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
    if($valores1==="3"){
        $eliminar='<a class="delete btn btn-sm btn-danger" style="margin: 5px ;  " href="javascript:;"><i class="icon-trash"></i></a>';
    }
    if($valores1==="20"){
        $correo='<a class="correoR btn btn-sm btn-success" style="margin: 5px ;" href="javascript:;"><i class="icon-envelope"></i></a>';
    }
    if($valores1==="21"){
        $ticket=true;
    }
}
$re = $client->getAllCortesia();
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estado." ".$facturacion." ".$correo;    
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    if (isset($usuario[1])) {
        if ($usuario[7]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if($ticket){
            $est2='<a class="btn btn-sm btn-blue" style="margin: 5px;" href="https://teatrosanchezaguilar.org/plantilla/pdf/ticket'.$usuario[0].'.pdf" target="_blank"><i class="fa fa-check-square"></i></a>';
        }else{
            $est2="";
        }
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$est1,$text.$est2);   
    } 
}
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
