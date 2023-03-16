
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear objetivo</strong> </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-group prepend-icon">
                            <textarea class="form-control" id="Iobjetivo" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Orden</label>
                        <div class="form-group prepend-icon">
                            <input class="form-control input-sm" type="number" id="ordenObjetivo" value="0"  min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_objetivo" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    