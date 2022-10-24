<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$var1="";
$re = $client->getPerfilRol($_SESSION["id"],"40");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$movil=false;
$b1=false;
$b2=false;
$recepcion=false;

$estado="";

if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="16"){
        $movil=true;
    }
    if($valores1==="17"){
        $b1=true;
    }
    if($valores1==="18"){
        $b2=true;
    }
    if($valores1==="19"){
        $recepcion=true;
    }

    if($valores1==="5"){
        $estado='<a class="estado btn btn-sm btn-warning" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>';
    }
}
$re = $client->getAllCaja($_SESSION["id"]);
$resultado = "".$re;
$usuarios= explode(';;',$resultado);
$datat=NULL;
$data=[];

$text=' <a class="editar btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>'." ".$estado;      
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
   
    if (isset($usuario[1])) {
        $idCaja="OFF";
        $band2=false;
        if ($usuario[5]==="100" && $movil) {
            $band2=true;
            $idCaja="1";
        } else if ($usuario[5]==="101" && $b1) {
            $band2=true;
            $idCaja="2";
        } else if ($usuario[5]==="102" && $b2) {
            $band2=true;
            $idCaja="3";
        } else if ($usuario[5]==="103" && $recepcion) {
            $band2=true;
            $idCaja="4";
        } 
        if ($band2) { 
            if ($usuario[7]==="A" ) {
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
            $data[]=array($usuario[0],$idCaja,$usuario[1],$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6], $est1,$text);   
        }
    } 
}
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
