
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getInformacionTabla("127");
$resultado = "".$re;
$historial= explode(';;',$resultado);
$preguntI =explode(',,,',$historial[0]);
$id = $preguntI[0];
$titulo = $preguntI[1];
$objetivo = $preguntI[2];
$orden =$preguntI[3];
?>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <label for="field-1" class="control-label">Nombre</label>
                <div class="form-group">
                    <input type="text" name="name" id="Inombre"  value="<?php echo $titulo; ?>"  class="form-control"  minlength="3" required>
                </div>
            </div>
            <div class="col-md-12">
                <label for="field-1" class="control-label">Descripción</label>
                <div class="form-group">
                    <textarea class="form-control" rows="10" id="cke-editor" data-sample-short><?php echo $objetivo; ?></textarea>
                </div>
            </div>
        </div>   
    </div>
</div>
<div class="modal-footer text-center">
    <button type="submit" class="btn btn-embossed btn-danger editar_cafe" ><i class="fa fa-save"></i> Editar</button>
</div>
<?php
$transport->close();
?>    