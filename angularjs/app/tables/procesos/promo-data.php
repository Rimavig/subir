<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getAllEvento("P");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
      
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado2="Off";
    if (isset($usuario[16])) {
        if ($usuario[16]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if ($usuario[16]==="P" ) {
            $estadoT="OG";
            $estado2="PA";
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box"  value="'.$usuario[16].'" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off='.$estado2.'></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
 
        $text=' <a title="Ver promociones del evento" class="btn btn-sm btn-dark editar"  style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>'; 
        
        $data[]=array($usuario[0],$usuario[1],$usuario[10],$usuario[13],$usuario[6],$usuario[14],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
?>