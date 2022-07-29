
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
            <textarea class="form-control" id="Idescripcion" rows="4"><?php echo $objetivo; ?></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <label for="field-1" class="control-label">Imagen</label>
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
 <div class="col-md-12"> 
    <div class="panel-header panel-controls">
        <div class="col-md-3"> 
            <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                    <img id="imagenC" data-src="" src='<?php  echo $intalacionesI.$var; ?>.png' class="img-responsive" alt="NO IMAGEN">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail EimagenCA"></div>
                <div  style="margin-top: 5px!important; text-align:center;">
                    <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Editar Imagen</span>
                    <span class="fileinput-exists">Cambiar</span>
                        <input type="file" id="archivoC" accept="image/png" name="...">
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row " >
                <div class="col-md-12">
                    <label for="field-1" class="control-label">Nombre</label>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="nombreE" class="form-control" id="video" value="<?php  echo $preguntI[1]; ?>" placeholder=" email@outlook.com " minlength="5" required> 
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <button type="submit" class="btn btn-embossed btn-danger editarMultimedia" ><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <textarea class="form-control" id="informacionT" rows="5"><?php echo $preguntI[2]; ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-dialog modal-lg ">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar </strong><?php echo $tipo; ?> </h4>
            <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
            <input type="text" name="nombreT" id="tipo2" class="esconder"  value="<?php echo $tipo2; ?>" disabled>  
            <input type="text"  id="EidObjetivo" class="esconder"  value="<?php echo $var1; ?>" disabled> 
        </div>
        <div class="modal-body">
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
                        <textarea class="form-control" id="Idescripcion" rows="4"><?php echo $objetivo; ?></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="field-1" class="control-label">Imagen</label>
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
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_tabla" ><i class="fa fa-check"></i> Editar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    