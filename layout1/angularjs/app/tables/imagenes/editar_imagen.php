<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1="";
$editar="";
$tipo="";
$tipo1=$_POST["tipo"];
$nombreT="la imagen";
if ($_POST["tipo"]==="sala") {
    $tipo="Sala";
    $tipo2="Esala";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getImagen($var1,$_POST["tipo"]);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
}else if ($_POST["tipo"]==="distribucion") {
    $tipo="Distribución";
    $tipo2="Edistribucion";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getImagen($var1,$_POST["tipo"]);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
}else if ($_POST["tipo"]==="logo") {
    $tipo="Logo";
    $tipo2="Elogo";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getImagen($var1,$_POST["tipo"]);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
}else if ($_POST["tipo"]==="banner") {
    $tipo="Banner";
    $tipo2="Ebanner";
    if (isset($_POST["var1"])) {
        $var1 = $_POST['var1'];
        $re = $client->getImagen($var1,$_POST["tipo"]);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
}
foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $imagen=$datos[0].".png";
        $nombre=$datos[1];
        $descripcion=$datos[2];
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar Imagen de <strong> <?php echo $tipo; ?></strong> </h4>
            
        </div>
        <div class="modal-body">
            <div class="row">
                <input type="text" name="Etipo" id="Etipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled>    
                <input type="text" name="Eid" id="Eid" class="esconder"  value="<?php echo $var1; ?>" disabled>
                <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombre De Imagen</label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="Ename" id="Enombres" class="form-control" value="<?php echo $nombre; ?>" placeholder="Cine" minlength="3" required>
                            <i class="icon-picture"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Descripción De Imagen</label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="Ename" id="Edescripcion" class="form-control" value="<?php echo $descripcion; ?>" placeholder="Cine" minlength="3" required>
                            <i class="icon-note"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <input type="text" name="Eimagen" id="Eimagen" class="esconder"  value="<?php echo $imagen; ?>" disabled>  
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <p><strong>Imagen</strong></p>
                        <div class="fileinput-new thumbnail">
                            <img id="imagen" data-src="" src='<?php  echo $path_imagen.$tipo1."/".$imagen; ?>' class="img-responsive" alt="gallery 3">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Editar Imagen</span>
                            <span class="fileinput-exists">Cambiar</span>
                                <input type="file" id="Earchivo" accept="image/png" name="...">
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_imagen" ><i class="fa fa-check"></i> Guardar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
}}
$transport->close();
?>    