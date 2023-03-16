<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../conect_dashboard.php");
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
if (!isset($_GET["var2"])) {
    $varI = date("Y-m-d", strtotime("+1 day"));
    $varF = date("Y-m-d", strtotime(date('Y-m-d')."- 1 month"));
}else{
    $varF = $_GET['var2'];
    $varI = $_GET['var3'];
}
if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client2->getGeneral4("getTotalSala",$var1,$varF,$varI);
    $resultado= "".$re;
    $funciones =explode(';;',$resultado);
}

$datat=NULL;
$data=[];
$text=$editar." ".$eliminar." ".$estado;   
foreach($funciones as $llave => $valores) {
    $funcion =explode(',,,',$valores);
    $fact="";
    $localidad="";
    if (isset($funcion[2])) {
        if ($funcion[4]==="A" ) {
            $localidad="App";
        } 
        if ($funcion[4]==="W" ) {
            $localidad="Web";
        } 
        if ($funcion[4]==="T" ) {
            $localidad="Taquilla";
        } 
        if ($funcion[2]==="CORTESIA" ) {
            $fact="CORTESIA";
        } else{
            $fact=' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$funcion[2].'.pdf" target="_blank">'.$funcion[2].'</a>';
        }
        $data[]=array($funcion[0],$funcion[1],$fact,$funcion[3],$localidad,$funcion[5],$funcion[6],$funcion[7],$funcion[8],$funcion[9],$funcion[10],$funcion[11],$funcion[12],$funcion[13],$funcion[14],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport->close();
$transport2->close();
?>