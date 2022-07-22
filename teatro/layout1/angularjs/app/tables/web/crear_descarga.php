
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
?>
<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear Información Descargable </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <label for="field-1" class="control-label">Nombre</label>
                    <div class="form-group">
                        <input type="text" name="name" id="InombreD" class="form-control"  minlength="3" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="field-1" class="control-label">Orden</label>
                    <div class="form-group">
                        <input class="form-control input-sm" type="number" id="IordenD" value="0"  min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="field-1" class="control-label">Archivo</label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput">
                            <i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span>
                        </div>
                        <span class="input-group-addon btn btn-default btn-file">
                            <span class="fileinput-new">Escoger</span>
                            <span class="fileinput-exists">Cambiar</span>
                            <input type="file" id="archivo1" accept="application/pdf" name="...">
                        </span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_descarga" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php
$transport->close();
?>    