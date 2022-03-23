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
    $historial= explode(';',$resultado);
    $imagenH=$var1."H.png";
    $imagenC=$var1."C.png";
    $imagenV=$var1."V.png";
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
            <div class="form-group">
                <label for="field-1" class="control-label">Link del Video</label>
                <input type="text" name="nombreE" class="form-control" id="video" value="<?php echo $video; ?>" placeholder="Teatro Sanchez Aguilar" minlength="5" required> 
                <input type="text" id="MnombreT" class="esconder"  value="<?php echo $MnombreT; ?>" disabled>  
                <input type="text" id="id_evento" class="esconder"  value="<?php echo $var1; ?>" disabled>  
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" name="EimagenC" id="Eimagen" class="esconder"  value="<?php echo $imagenC; ?>" disabled>  
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <p  style="margin-top: 5px!important; text-align:center;"><strong>Imagen Cuadrada (760 x 760)</strong></p>
                <div class="fileinput-new thumbnail">
                    <img id="imagenC" data-src="" src='<?php  echo $path_imagen.$tipo1."/".$imagenC; ?>' class="img-responsive" alt="NO IMAGEN">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail EimagenCA"></div>
                <div>
                    <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Editar Imagen</span>
                    <span class="fileinput-exists">Cambiar</span>
                        <input type="file" id="archivoC" accept="image/png" name="...">
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                    <a class="editar_imagenC btn btn-embossed btn-danger" href="javascript:;"><i class="fa fa-save"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" name="EimagenV" id="Eimagen" class="esconder"  value="<?php echo $imagenV; ?>" disabled>  
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <p  style="margin-top: 5px!important; text-align:center;"><strong>Imagen Vertical (542 x 722) </strong></p>
                <div class="fileinput-new thumbnail">
                    <img id="imagenV" data-src="" src='<?php  echo $path_imagen.$tipo1."/".$imagenV; ?>' class="img-responsive" alt="NO IMAGEN">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail EimagenVA"></div>
                <div>
                    <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Editar Imagen</span>
                    <span class="fileinput-exists">Cambiar</span>
                        <input type="file" id="archivoV" accept="image/png" name="...">
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                    <a class="editar_imagenV btn btn-embossed btn-danger" href="javascript:;"><i class="fa fa-save"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" name="EimagenH" id="EimagenH" class="esconder"  value="<?php echo $imagenH; ?>" disabled>  
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <p  style="margin-top: 5px!important; text-align:center;"><strong>Imagen Horizontal (690 x 306)</strong></p>
                <div class="fileinput-new thumbnail">
                    <img id="imagenH" data-src="" src='<?php  echo $path_imagen.$tipo1."/".$imagenH; ?>' class="img-responsive" alt="NO IMAGEN">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail EimagenHA"></div>
                <div>
                    <span class="btn btn-default btn-file">
                    <span class="fileinput-new ">Editar Imagen</span>
                    <span class="fileinput-exists">Cambiar</span>
                        <input type="file" id="archivoH" accept="image/png" name="...">
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                    <a class="editar_imagenH btn btn-embossed btn-danger" href="javascript:;"><i class="fa fa-save"></i></a>
                </div>
            </div>
        </div>

    </div>
    <div class="modal-footer text-center">
            <button type="submit" class="btn btn-primary btn-embossed bnt-square editarMultimedia " ><i class="fa fa-check"></i> Editar Video</button>
            <button type="reset" class="btn btn-embossed btn-default">Limpiar</button>
            <button type="button" class="btn btn-embossed btn-default cancelar " data-dismiss="modal" aria-hidden="true">Cancelar</button>
    </div>
</form>