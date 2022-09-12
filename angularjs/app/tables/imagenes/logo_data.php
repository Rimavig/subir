<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
header("Content-type: application/json");
$editar="";
$eliminar="";
$estado="";
$reset="";
if (isset($_GET["id"])) {
    $var1 = $_GET['id'];
    if($var1=="logo"){
        $re = $client->getPerfilRol($_SESSION["id"],"18");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllImagen("logo");
        $tipo2="logo";
    }else if($var1=="sala"){
        $re = $client->getPerfilRol($_SESSION["id"],"15");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllImagen("sala");
        $tipo2="sala";
    }else if($var1=="distribucion"){
        $re = $client->getPerfilRol($_SESSION["id"],"16");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllImagen("distribucion");
        $tipo2="distribucion";
    }else if($var1=="banner"){
        $re = $client->getPerfilRol($_SESSION["id"],"17");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllImagen("banner");
        $tipo2="banner";
    }
    $resultado= "".$re;
    $usuarios =explode(';;',$resultado);
    foreach($usuarios1 as $llave => $valores1) {
        if($valores1==="2"){
            $editar='<a class="editar btn btn-sm btn-dark" style="margin: 5px 0px;  "  href="javascript:;"><i class="icon-note"></i></a>';
        }
        if($valores1==="3"){
            $eliminar='<a class="delete btn btn-sm btn-danger" style="margin: 5px 0px;  " href="javascript:;"><i class="icon-trash"></i></a>';
        }
        if($valores1==="5"){
            $estado='<a class="estado btn btn-sm btn-warning" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>';
        }
    }
}
$datat=NULL;
$data=[];

$text=$editar." ".$eliminar." ".$estado;     
foreach($usuarios as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    $estado="";
    $estadoT="OFF";
    $estado2="Off";
    if (isset($usuario[2])) {
        if ($usuario[4]==="A" ) {
            $estado="checked";
            $estadoT="ON";
        } 
        $est1='<div class="form-group">
                <label class="switch switch-green">
                    <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                    <span class="switch-label" data-on="On" data-off="off"></span>
                    <span class="switch-handle"></span>
                    <span id="estado" class="esconder"> '.$estadoT.' </span>
                </label>
            </div>';

        $est='<img id="ver_imagen" data-src="" src="'.$path_imagen.$tipo2."/".$usuario[3]."?nocache=".time().'" class="img-responsive" alt="gallery 3">';
        $data[]=array($usuario[0],$usuario[1],$usuario[2],$est,$est1,$text);
    } 
} 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
