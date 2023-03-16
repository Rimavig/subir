
<?php
include ("../../../conect.php");
include ("../../../autenticacion.php");
include ("../../../directorio.php");
$re = $client->getImagen("10","banner");
$resultado = "".$re;
$historial= explode(';;',$resultado);
$datos =explode(',,,',$historial[0]);
$estado="";
$link="";
$estadoT="OFF";
if ($datos[4]==="A" ) {
    $link=$datos[2];
    $estado="checked";
    $estadoT="ON";
} 
?>

<div class="row " >
    <div class="col-md-12"> 
        <div class="panel-header panel-controls">
            <div class="col-md-12 col-sm-12">
                <div class="form-group" style="margin-top: 5px!important; text-align:center;" >
                    <input style="width: 600px;"  type="text" name="urlR" class="form-control" id="urlR" value="<?php echo $link; ?>" placeholder="https://teatrosanchezaguilar.org/" minlength="5" required> 
                    <a class="guardarUrl btn btn-sm btn-danger" style="margin: 5px 0px;" href="javascript:;"><i class="fa fa-save"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12"> 
                <div style="margin-top: 5px!important; text-align:center;"  class="form-group">
                    <label class="switch switch-green">
                        <input type="checkbox" class="switch-input" id="box"  value="<?php echo $datos[4]; ?>" <?php echo $estado; ?>  disabled>
                        <span class="switch-label" data-on="On" data-off='Off'></span>
                        <span class="switch-handle"></span>
                        <span id="estado" class="esconder"> <?php echo $estadoT; ?> </span>
                    </label>
                    <a class="estadoIP btn btn-sm btn-warning" style="margin: 5px 0px;" href="javascript:;"><i class="icon-lock"></i></a>
                </div>
            </div>
            <div class="col-md-12"> 
                <div style="margin-top: 5px!important; text-align:center;" class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <img id="imagenP" data-src="" src='<?php  echo $imagenP."?nocache=".time();; ?>' class="img-responsive" alt="NO IMAGEN">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail imagenP"></div>
                    <div  style="margin-top: 5px!important; text-align:center;">
                        <button type="submit" class="btn btn-embossed btn-danger guardarimagenP" ><i class="fa fa-save"></i> Guardar</button>
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
<?php
$transport->close();
?>