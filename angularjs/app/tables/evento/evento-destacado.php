
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$tipo="Venta";
$PnombreT="el precio";
$tipo2="venta";
$esconder="";
$aforoM="";
$re = $client->getEventoDestacado();
$resultado= "".$re;
$destacado =explode(';;',$resultado);
foreach($destacado as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[15])) {
        $id=$datos[0];
        $nombre=$datos[1];
        $tipo=$datos[15];
    }
} 
$re = $client->getAllEvento("AV");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
$imagen=$path_imagen1."evento"."/1C.png";
if(file_exists($imagen)){
    $imagen=$path_imagen."evento"."/".$id."H.png?nocache=".time();
}else{
    $imagen="";
}
?>
<div>
    <div class="row editarEvento" id="editarEvento" >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Evento Destacado</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-1" class="control-label">Evento Antiguo</label>
                                        <input type="text" name="nombreE" id="eventoA" value="<?php  echo $nombre; ?>" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img id="imagenA" data-src="" src='<?php  echo $imagen; ?>' class="img-responsive" alt="Seleccione Evento">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="field-4" class="control-label">Evento Nuevo</label>
                                        <select name ="eventoN" class="form-control" style="width:100%;" id="eventoN">
                                            <option value="0">Seleccione Evento</option>
                                            <?php
                                            foreach($usuarios as $llave => $valores) {
                                                $usuario =explode(',,,',$valores);
                                                if (isset($usuario[2])) {
                                            ?>
                                            <option value="<?php echo $usuario[0]; ?>"><?php echo $usuario[6].": ".$usuario[1]; ?></option>
                                            <?php
                                            }
                                            }
                                            ?> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12"> 
                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img id="imagenN" data-src="" src='' class="img-responsive"  alt="NO IMAGEN">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_destacado" ><i class="fa fa-check"></i> Guardar</button>
                </div>
            </div>
        </div>
    
    </div>

    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>
<?php
$transport->close();
?>