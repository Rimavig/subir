
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getInformacionGaleria($var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    $preguntI =explode(',,,',$historial[0]);
    $id = $preguntI[0];
    $orden =$preguntI[1];
}
?>
<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar Galería </h4>
            <input type="text"  id="EidGaleria" class="esconder"  value="<?php echo $var1; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="field-1" class="control-label">Orden</label>
                    <div class="form-group">
                        <input class="form-control input-sm" type="number" id="IordenG" value="<?php echo $orden; ?>"  min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="field-1" class="control-label">Imagen(499x304)</label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        
                        <div class="fileinput-new thumbnail">
                            <img id="IimagenGaleria" data-src="" src='<?php  echo $galeriaI.$var1.".png?nocache=".time();?>' class="img-responsive" alt="NO IMAGEN">
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
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_galeria" ><i class="fa fa-check"></i> Editar</button>
                <button type="button" class="btn btn-embossed btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php
$transport->close();
?>    