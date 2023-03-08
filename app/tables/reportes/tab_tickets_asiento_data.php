<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$editar="";
$eliminar="";
$estado="";
$reset="";
if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client->getAllTickets($var1,"Asiento");
    $resultado= "".$re;
    $funciones =explode(';;',$resultado);
}

$datat=NULL;
$data=[]; 
foreach($funciones as $llave => $valores) {
    $funcion =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $fact="";
    $localidad="";
    if (isset($funcion[2])) {
        if ($funcion[6]==="A" ) {
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
        $data[]=array($funcion[0],$funcion[1],$funcion[2],$funcion[3],$funcion[4],$funcion[5],$est1);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>