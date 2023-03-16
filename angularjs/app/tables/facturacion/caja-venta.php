<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
include ("../../directorio.php");

$re = $client3->getAllEvento("AV");
$resultado= "".$re;
$usuarios =explode(';;',$resultado);
?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="field-4" class="control-label">Evento </label>
            <select name ="eventoG" class="form-control" style="width:100%;" id="eventoG">
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
    <div id="funciones"> 
        
        <div class="col-md-2">
            <div class="form-group">
                <label for="field-1" class="control-label">Funciones</label>
                <select class="form-control" style="width:100%;">
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="field-1" class="control-label">Platea</label>
                <select class="form-control" style="width:100%;">
                </select>
            </div>
        </div>   
        <div class="col-md-1">
            <div class="form-group">
                <label for="field-1" class="control-label">Disponible</label>
                <input class="form-control input-sm" type="number" name="duracionE" placeholder="" disabled>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="field-1" class="control-label">Cantidad</label>
                <input class="form-control input-sm" type="number" name="duracionE" placeholder="" required>
            </div>
        </div>        
    </div>
    
      
</div>
<?php
$transport3->close();
?>