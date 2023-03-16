<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
header("Content-type: application/json");

$re = $client3->getAllGeneral("error_facturacion","","");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];

$re = $client3->getPerfilRol($_SESSION["id"],"71");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$correo="";


foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a title="Actualizar Factura" class="facturarA btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
}
$text=$editar." ".$correo;     

foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    if (isset($usuario[2])) {
        if ($usuario[8]==="A" ) {
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
        if (isset($usuario[4])) {
            $data[]=array($usuario[0],' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$usuario[1].'.pdf" target="_blank">'.$usuario[1].'</a>',$usuario[2],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$est1,$text);
        } 
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport3->close();
?>