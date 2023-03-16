<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
if (isset($_GET["var1"])) {
    $var1 = $_GET['var1'];
    $re = $client3->getAllCajaMovimiento($var1);
    $resultado= "".$re;
    $usuarios =explode(';;',$resultado);
}
$datat=NULL;
$data=[];
$re = $client3->getPerfilRol($_SESSION["id"],"41");
$resultado = "".$re;
$usuarios1= explode(',',$resultado);
$editar="";
$correo="";

foreach($usuarios1 as $llave => $valores1) {
    if($valores1==="2"){
        $editar='<a title="Ver Compra" class="editarMV btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
    }
    if($valores1==="20"){
        $correo='<a title="Enviar correo" class="correoR1 btn btn-sm btn-success" style="margin: 5px 0px;" href="javascript:;"><i class="icon-envelope"></i></a>';
    }
}
$text=$editar." ".$correo;     

foreach($usuarios as $llave => $valores) {
    $usuario =explode(',',$valores);
    if (isset($usuario[2])) {
        $data[]=array($usuario[0],$usuario[1],' <a class=" btn-sm " style="margin: 0px;" href="http://www.tsa.arhena.com.ec/produccion/archivos/factura/'.$usuario[2].'.pdf" target="_blank">'.$usuario[2].'</a>',$usuario[3],$usuario[4],$usuario[5],$usuario[6],$usuario[7],$usuario[8],$usuario[9],$usuario[10],$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
<?php
$transport3->close();
?>