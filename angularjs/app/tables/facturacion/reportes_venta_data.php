<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$re = $client->getAllCompras();
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];

$re = $client->getPerfilRol($_SESSION["id"],"55");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$correo="";


foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a class="editarVC btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
    if($valores1==="20"){
        $correo='<a class="correoR btn btn-sm btn-success" style="margin: 5px 0px;" href="javascript:;"><i class="icon-envelope"></i></a>';
    }
}
$text=$editar." ".$correo;     

foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado1="";
    $estadoT1="OFF";
    if (isset($usuario[2])) {
        if ($usuario[15]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        }
        if ($usuario[13]==="A" ) {
            $estado1="checked";
            $estadoT1="ON";
        }
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $est2='<div class="form-group">
            <label class="switch switch-green">
                <input type="checkbox" class="switch-input" id="box" '.$estado1.' disabled>
                <span class="switch-label" data-on="On" data-off="Off"></span>
                <span class="switch-handle"></span>
                <span id="estado" class="esconder"> '.$estadoT1.' </span>
            </label>
        </div>';
        $data[]=array($usuario[0],' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$usuario[9].'.pdf" target="_blank">'.$usuario[9].'</a>',$usuario[17],$usuario[16],$usuario[14],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[8],$usuario[12],$est2,$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
