<?php
include ("../../../conect.php");
include ("../../../conect_dashboard.php");
include ("../../../autenticacion.php");
header("Content-type: application/json");
$var1="";
$re = $client->getPerfilRol($_SESSION["id"],"73");
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
        $eliminar='<a class="deleteN btn btn-sm btn-danger" style="margin: 5px ;  " href="javascript:;"><i class="icon-trash"></i></a>';
    }
}
$re = $client2->getGeneral("notificacion");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$datat=NULL;
$data=[];
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    if (isset($usuario[1])) {
        if ($usuario[8]==="A" ) {
            $estado="checked";
            $estadoT="ON";
            $text=$eliminar;    
        }else{
            $text="";    
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="Off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($usuario[0],$usuario[2],$usuario[1],$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$est1,$text);   
    } 
}
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
$transport2->close();
?>