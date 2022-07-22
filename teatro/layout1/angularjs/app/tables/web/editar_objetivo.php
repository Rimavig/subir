
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
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

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear objetivo</strong> </h4>
            <input type="text"  id="EidObjetivo" class="esconder"  value="<?php echo $var1; ?>" disabled>    
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-group prepend-icon">
                            <textarea class="form-control" id="Iobjetivo" rows="4"><?php echo $objetivo; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Orden</label>
                        <div class="form-group prepend-icon">
                            <input class="form-control input-sm" type="number" id="ordenObjetivo" value="<?php echo $orden; ?>"   min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_objetivo" ><i class="fa fa-check"></i> Editar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    