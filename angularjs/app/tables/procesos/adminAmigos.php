
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllPuntos("1","amigos");
$resultado= "".$re;
$texto =explode(';;',$resultado);
foreach($texto as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $puntos=$datos[1];
        $recibe=$datos[2];
    }
} 
?>
<div>
    <div class="row " >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-content pagination2 table-responsive">
                    <div class="row">  
                        <div class="col-md-4">
                            <label for="field-1" class="control-label">Por cada (Puntos)</label>
                            <div class="form-group">
                                <input class="form-control input-sm" type="number" id="puntos"  value="<?php echo $puntos; ?>"   min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="field-1" class="control-label">Recibe ($)</label>
                            <div class="form-group">
                                <input class="form-control input-sm" type="number" id="recibe"  value="<?php echo $recibe; ?>"   min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary btn-embossed bnt-square adminAmigosB" ><i class="fa fa-check"></i> Guardar</button>
                </div>
            </div>
        </div>
    
    </div>
</div>
