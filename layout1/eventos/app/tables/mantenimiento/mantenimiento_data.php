<?php
include ("../../conect.php");
include ("../../autenticacion.php");
header("Content-type: application/json");
$var1="";
$editar="";
$eliminar="";
$estado="";
$reset="";
if (isset($_GET["id"])) {
    $var1 = $_GET['id'];
    if($var1=="categoria"){
        $re = $client->getPerfilRol($_SESSION["id"],"5");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllCategoria();
    }else if($var1=="clasificacion"){
        $re = $client->getPerfilRol($_SESSION["id"],"6");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllClasificacion();
    }else if($var1=="espectaculo"){
        $re = $client->getPerfilRol($_SESSION["id"],"7");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllTipoEspectaculo();
    }else if($var1=="procedencia"){
        $re = $client->getPerfilRol($_SESSION["id"],"8");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllProcedencia();
    }else if($var1=="productora"){
        $re = $client->getPerfilRol($_SESSION["id"],"11");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllProductora();
    }else if($var1=="promocion"){
        $re = $client->getPerfilRol($_SESSION["id"],"12");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllNombrePromocion();
    }else if($var1=="evento"){
        $re = $client->getPerfilRol($_SESSION["id"],"9");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllTipoEvento();
    }else if($var1=="sala"){
        $re = $client->getPerfilRol($_SESSION["id"],"10");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllSala();
    }else if($var1=="principal"){
        $re = $client->getPerfilRol($_SESSION["id"],"13");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllSalaMapa("1");
    }else if($var1=="secundario"){
        $re = $client->getPerfilRol($_SESSION["id"],"14");
        $resultado = "".$re;
        $usuarios1= explode(',',$resultado);
        $re = $client->getAllSalaMapa("total");
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
if($var1=="promocion"){
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(',,,',$valores);
        $estado="";
        $estadoT="OFF";
        if (isset($usuario[1])) {
            if (trim($usuario[1]) !="No aplica" ) {
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
                    $data[]=array($usuario[0],$usuario[2],$est1,$text);
            }      
        } 
    }
}else if($var1=="sala"){
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(',,,',$valores);
        $estado="";
        $estadoT="OFF";
        if (isset($usuario[1])) {
            if (trim($usuario[1]) !="No aplica" ) {
                if ($usuario[5]==="A" ) {
                    $estado="checked";
                    $estadoT="ON";
                } 
                $est=' <button class="Smapa btn btn-sm btn-dark" value="'.$usuario[4].'" id="Smapa"><i class="fa fa-plus"></i> Ver Mapa</button>';
                $text='<a class="editar btn btn-sm btn-dark" style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>
                <a class="estado btn btn-sm btn-blue" style="margin: 5px;" href="javascript:;"><i class="icon-key"></i></a>';
                $est1='<div class="form-group">
                        <label class="switch switch-green">
                            <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                            <span id="estado" class="esconder"> '.$estadoT.' </span>
                        </label>
                    </div>';
                    $data[]=array($usuario[0],$usuario[1],$est,$est1,$text);
            }      
        } 
    }
}else if($var1=="principal"){
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(',,,',$valores);
        $estado="";
        $estadoT="OFF";
        if (isset($usuario[1])) {
            if ($usuario[1] === "1") {
                if (trim($usuario[2]) !="1" ) {
                    if ($usuario[6]==="A" ) {
                        $estado="checked";
                        $estadoT="ON";
                    } 
                    $est=' <button class="mapaP btn btn-sm btn-dark" value="1.png" id="mapaP"><i class="fa fa-plus"></i> Ver Sala</button>';
                    $text=' <a class="editarMP btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                    <a class="estado btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>';
                    $est1='<div class="form-group">
                            <label class="switch switch-green">
                                <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                <span class="switch-handle"></span>
                                <span id="estado" class="esconder"> '.$estadoT.' </span>
                            </label>
                        </div>';
                    $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$est,$est1,$text);
                }
            }      
        } 
    }
}else if($var1=="secundario"){
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(',,,',$valores);
        $estado="";
        $estadoT="OFF";
        if (isset($usuario[1])) {
            if ($usuario[1] != "1") {
                if (trim($usuario[2]) !="1" ) {
                    if ($usuario[6]==="A" ) {
                        $estado="checked";
                        $estadoT="ON";
                    } 
                    $est=' <button class="mapa btn btn-sm btn-dark" value="'.$usuario[5].'" id="mapa"><i class="fa fa-plus"></i> Ver Mapa</button>';
                    $text=' <a class="editarMS btn btn-sm btn-dark" style="margin: 0px;  "  href="javascript:;"><i class="icon-note"></i></a>
                    <a class="delete btn btn-sm btn-danger" href="javascript:;"><i class="icon-trash"></i></a>
                    <a class="estado btn btn-sm btn-blue" style="margin: 0px;" href="javascript:;"><i class="icon-key"></i></a>';
                    $est1='<div class="form-group">
                            <label class="switch switch-green">
                                <input type="checkbox" class="switch-input" id="box" '.$estado.' disabled>
                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                <span class="switch-handle"></span>
                                <span id="estado" class="esconder"> '.$estadoT.' </span>
                            </label>
                        </div>';
                    $data[]=array($usuario[0],$usuario[1],$usuario[2],$usuario[3],$usuario[4],$est,$est1,$text);
                }
            }      
        } 
    }
}else{
    foreach($usuarios as $llave => $valores) {
        $usuario =explode(',,,',$valores);
        $estado="";
        $estadoT="OFF";
        if (isset($usuario[1])) {
            if (trim($usuario[1]) !="No aplica" ) {
                if ($usuario[3]==="A" ) {
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
                if($var1=="categoria"){
                    $data[]=array($usuario[0],$usuario[1],$usuario[2],$est1,$text);
                }else{
                    $data[]=array($usuario[0],$usuario[1],$est1,$text);
                }
               
            }      
        } 
    }
}   
 
$dataT['data']=$data;   
echo json_encode($dataT,JSON_PRETTY_PRINT); 
?>
