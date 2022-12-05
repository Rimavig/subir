
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1="";
$editar="";
$nombreT="la imagen";
if ($_POST["tipo"]==="sala") {
    $tipo="Sala";
}else if ($_POST["tipo"]==="distribucion") {
    $tipo="Distribución";
}else if ($_POST["tipo"]==="logo") {
    $tipo="Logo";
}else if ($_POST["tipo"]==="banner") {
    $tipo="Banner";
}            
$re = $client->getAllSala();
$resultado = "".$re;
$historial= explode(';;',$resultado);

?>
<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear Imagen de <strong> <?php echo $tipo; ?></strong> </h4>
            <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombre de Imagen</label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="name" id="nombres" class="form-control" placeholder="Imagen" minlength="3" required>
                            <i class="icon-picture"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Descripción de Imagen</label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="name" id="descripcion" class="form-control" placeholder="Descripción" minlength="3" required>
                            <i class="icon-note"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <p><strong>Imagen</strong></p>
                        <div class="fileinput-new thumbnail">
          
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                            <span class="btn btn-default btn-file">
                            <span class="fileinput-new">Escoger Imagen</span>
                            <span class="fileinput-exists">Cambiar</span>
                                <input type="file" id="archivo" accept="image/png" name="...">
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_imagen" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>