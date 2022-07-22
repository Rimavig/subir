
<?php
include ("../../../conect.php");
include ("../../../autenticacion.php");
include ("../../../directorio.php");
?>

<div class="row " >
    <div class="col-md-12"> 
        <div class="panel-header panel-controls">
            <div class="col-md-12"> 
                <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <img id="Bpreguntas" data-src="" src='<?php  echo $Bpreguntas."?nocache=".time();; ?>' class="img-responsive" alt="NO IMAGEN">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail Bpreguntas"></div>
                    <div  style="margin-top: 5px!important; text-align:center;">
                        <button type="submit" class="btn btn-embossed btn-danger guardarBpreguntas" ><i class="fa fa-save"></i> Guardar</button>
                        <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Editar Imagen</span>
                        <span class="fileinput-exists">Cambiar</span>
                            <input type="file" id="archivoC" accept="image/png" name="...">
                        </span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>