<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1="";
$editar="";
$tipo="";

$var1 = $_POST['var1'];
$re = $client->getAllPuntos($var1,"T");
$resultado = "".$re;
$puntos= explode(',,,',$resultado);

?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>    
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Donación</label>
                        <div class="form-group ">
                             <input class="form-control input-sm" id="donacionT" type="number" value="0" name="duracionE" placeholder="" >
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Puntos Acumulados-Amigo del Teatro</label>
                        <select class="form-control" id ="puntos_acumulados" style="width:100%;">
                    <?php 
                        foreach($puntos as $llave => $valores1) {
                            ?>
                            <option value="<?php echo  $valores1; ?>" ><?php echo $valores1; ?></option>
                            <?php 
                        } 
                    ?>
                        </select>
                    </div>
                </div>    
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square puntosAD" ><i class="fa fa-check"></i> Ingresar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    