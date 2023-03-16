
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client->getAllPuntos("2","amigos");
$resultado= "".$re;
$texto =explode(';;',$resultado);
foreach($texto as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $puntos=$datos[2];
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
                            <label for="field-1" class="control-label">% Descuento</label>
                            <div class="form-group">
                                <input class="form-control input-sm" type="number" id="cumple"  value="<?php echo $puntos; ?>"   min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary btn-embossed bnt-square adminCumpleB" ><i class="fa fa-check"></i> Guardar</button>
                </div>
            </div>
        </div>
    
    </div>
</div>
<?php
$transport->close();
?>