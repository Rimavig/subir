<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$re = $client->getPerfilRol($_SESSION["id"],"67");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$eliminar="";
$estado="";
$reset="";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a class="editarVC btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
        <a class="editarTA btn btn-sm btn-success" style="margin: 5px 0px;  "  href="javascript:;"><i class="fa fa-ticket"></i></a>';
    }
}
if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client->getAllTickets($var1,"R");
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
    $fact="";
    $localidad="";
    if (isset($funcion[2])) {
        if ($funcion[9]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        if ($funcion[10]==="A" ) {
            $localidad="App";
        } 
        if ($funcion[10]==="W" ) {
            $localidad="Web";
        } 
        if ($funcion[10]==="T" ) {
            $localidad="Taquilla";
        } 
        if ($funcion[2]==="CORTESIA" ) {
            $fact="CORTESIA";
        } else{
            $fact=' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$funcion[2].'.pdf" target="_blank">'.$funcion[2].'</a>';
        }
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box"  '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';
        $data[]=array($funcion[0],$funcion[1],$fact,$funcion[21],$localidad,$funcion[3],$funcion[4],$funcion[5],$funcion[11],$funcion[12],$funcion[13],$funcion[14],$funcion[15],$funcion[17],$funcion[16],$funcion[18],$funcion[19],$funcion[6],$funcion[20],$funcion[7],$funcion[8],$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
?>