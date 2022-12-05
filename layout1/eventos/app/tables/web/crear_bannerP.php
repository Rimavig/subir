
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
?>

<div class="modal-dialog modal-lg ">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear Banner Principal </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <label for="field-1" class="control-label">Título</label>
                    <div class="form-group">
                        <input type="text" name="name" id="Inombre" class="form-control"  minlength="3" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="field-1" class="control-label">Nombre Botón</label>
                    <div class="form-group">
                        <input type="text" name="name" id="InombreB"   class="form-control"  minlength="3" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="field-1" class="control-label">Orden</label>
                    <div class="form-group">
                        <input class="form-control input-sm" type="number" id="Iorden"  min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="field-1" class="control-label">Descripción</label>
                    <div class="form-group">
                        <textarea class="form-control" id="Idescripcion" rows="2"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="field-1" class="control-label">Link</label>
                    <div class="form-group">
                        <input type="text" name="link" id="Ilink"    class="form-control"  minlength="3" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="field-1" class="control-label">Imagen</label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        
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
                <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_bannerP" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    