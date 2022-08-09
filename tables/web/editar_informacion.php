
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

if ($_POST["tipo"]==="realizados") {
    $tipo="Eventos Realizados";
    $tipo2="realizados";
    $nombreT="la noticia";
}else if ($_POST["tipo"]==="espacios") {
    $tipo="Espacios";
    $tipo2="espacios";
    $nombreT="la noticia";
} else if ($_POST["tipo"]==="proyectos") {
    $tipo="Proyectos con el Teatro";
    $tipo2="proyectos";
    $nombreT="Proyectos con el Teatro";
}  
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getInformacionTabla($var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    $preguntI =explode(',,,',$historial[0]);
    $id = $preguntI[0];
    $titulo = $preguntI[1];
    $objetivo = $preguntI[2];
    $orden =$preguntI[3];
}  
?>
<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <label for="field-1" class="control-label">Imagen (324x160)</label>
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    
                    <div class="fileinput-new thumbnail">
                        <img id="Iimagen" data-src="" src='<?php  echo $intalacionesI.$var1.".png?nocache=".time();?>' class="img-responsive" alt="NO IMAGEN">
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
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-8">
                <label for="field-1" class="control-label">Nombre</label>
                <div class="form-group">
                    <input type="text" name="name" id="Inombre"  value="<?php echo $titulo; ?>"  class="form-control"  minlength="3" required>
                </div>
            </div>
            <div class="col-md-2">
                <label for="field-1" class="control-label">Orden</label>
                <div class="form-group">
                    <input class="form-control input-sm" type="number" id="Iorden"  value="<?php echo $orden; ?>"   min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
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
    <button type="submit" class="btn btn-embossed btn-danger editar_tabla" ><i class="fa fa-save"></i> Editar</button>
    <button type="button" class="btn btn-embossed btn-default cancelar " data-dismiss="modal" aria-hidden="true">Cancelar</button>
</div>
<?php
$transport->close();
?>    