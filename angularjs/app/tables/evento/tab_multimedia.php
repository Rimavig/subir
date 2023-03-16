<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$tipo1="evento";
$MnombreT="la imagen";
if (isset($_POST["var1"])) {
    $var1 = trim($_POST['var1']);
    $re = $client->getEvento_multimedia($var1,"venta");
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    $imagenH=$path_imagen1."evento"."/".trim($var1)."H.png";
    $imagenC=$path_imagen1."evento"."/".trim($var1)."C.png";
    $imagenV=$path_imagen1."evento"."/".trim($var1)."V.png";
    if(file_exists($imagenH)){
        $imagenH=$path_imagen."evento"."/".trim($var1)."H.png?nocache=".time();
    }else{
        $imagenH="";
    }
    if(file_exists($imagenC)){
        $imagenC=$path_imagen."evento"."/".trim($var1)."C.png?nocache=".time();
    }else{
        $imagenC="";
    }
    if(file_exists($imagenV)){
        $imagenV=$path_imagen."evento"."/".trim($var1)."V.png?nocache=".time();
    }else{
        $imagenV="";
    }
}
$multimedia="hide";
if ($_POST["tipo"]==="venta") {
    $nombreT="el evento venta";
    $tipo2="Eventa";
    $re = $client->getPerfilRol($_SESSION["id"],"19");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="9"){
            $multimedia="";
        }
    }
}else if ($_POST["tipo"]==="gratuito") {
    $tipo2="Egratuito";
    $nombreT="el evento gratuito";
    $re = $client->getPerfilRol($_SESSION["id"],"20");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="9"){
            $multimedia="";
        }
    }
}else if ($_POST["tipo"]==="informativo") {
    $tipo2="Einformativo";
    $nombreT="el evento informativo";
    $esconder="";
    $re = $client->getPerfilRol($_SESSION["id"],"21");
    $resultado = "".$re;
    $usuarios= explode(',',$resultado);
    foreach($usuarios as $llave => $valores1) {
        if($valores1==="9"){
            $multimedia="";
        }
    }
}
foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $id=$datos[0];
        $video=$datos[1];
    }
} 
?>
<form role="form" class=" form-validation">
    <div class="row">
        <div class="col-md-12">
            <label for="field-1" class="control-label">Link del Video</label>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="nombreE" class="form-control" id="video" value="<?php echo $video; ?>" placeholder="Teatro Sanchez Aguilar" minlength="5" required> 
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <button type="submit" class="btn btn-embossed btn-danger editarMultimedia <?php echo $multimedia; ?>" ><i class="fa fa-save"></i> Guardar Video</button>
                    </div>
                </div>
                <input type="text" id="MnombreT" class="esconder"  value="<?php echo $MnombreT; ?>" disabled>  
                <input type="text" id="id_evento" class="esconder"  value="<?php echo $var1; ?>" disabled>  
            </div>
        </div>

        <div class="col-md-4">
            <input type="text" name="EimagenC" id="Eimagen" class="esconder"  value="<?php echo $imagenC; ?>" disabled>  
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <p  style="margin-top: 5px!important; text-align:center;"><strong>Imagen Cuadrada (760 x 760)</strong></p>
                <div class="fileinput-new thumbnail">
                    <img id="imagenC" data-src="" src='<?php  echo $imagenC; ?>' class="img-responsive" alt="NO IMAGEN">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail EimagenCA"></div>
                <div class="<?php echo $multimedia; ?>">
                    <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Editar Imagen</span>
                    <span class="fileinput-exists">Cambiar</span>
                        <input type="file" id="archivoC" accept="image/png" name="...">
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" name="EimagenV" id="Eimagen" class="esconder"  value="<?php echo $imagenV; ?>" disabled>  
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <p  style="margin-top: 5px!important; text-align:center;"><strong>Imagen Vertical (542 x 722) </strong></p>
                <div class="fileinput-new thumbnail">
                    <img id="imagenV" data-src="" src='<?php  echo $imagenV; ?>' class="img-responsive" alt="NO IMAGEN">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail EimagenVA"></div>
                <div class="<?php echo $multimedia; ?>">
                    <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Editar Imagen</span>
                    <span class="fileinput-exists">Cambiar</span>
                        <input type="file" id="archivoV" accept="image/png" name="...">
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" name="EimagenH" id="EimagenH" class="esconder"  value="<?php echo $imagenH; ?>" disabled>  
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <p  style="margin-top: 5px!important; text-align:center;"><strong>Imagen Horizontal (690 x 306)</strong></p>
                <div class="fileinput-new thumbnail">
                    <img id="imagenH" data-src="" src='<?php  echo $imagenH; ?>' class="img-responsive" alt="NO IMAGEN">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail EimagenHA"></div>
                <div class="<?php echo $multimedia; ?>">
                    <span class="btn btn-default btn-file">
                    <span class="fileinput-new ">Editar Imagen</span>
                    <span class="fileinput-exists">Cambiar</span>
                        <input type="file" id="archivoH" accept="image/png" name="...">
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                </div>
            </div>
        </div>

    </div>
    <div class="modal-footer text-center">
            <button type="submit" title="Guardar Imagenes" class="btn btn-embossed btn-danger editar_imagenH <?php echo $multimedia; ?>" ><i class="fa fa-save"></i> Guardar Imagen</button>
            <button type="button" class="btn btn-embossed btn-default cancelar " data-dismiss="modal" aria-hidden="true">Salir</button>
    </div>
</form>
<?php
$transport->close();
?>