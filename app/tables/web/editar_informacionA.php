
<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
 
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getInformacionAdicional($var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    $preguntI =explode(',,,',$historial[0]);
    $id = $preguntI[0];
    $titulo = $preguntI[1];
    $orden =$preguntI[2];
}  
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar Información Adicional</h4>
            <input type="text"  id="EidObjetivo" class="esconder"  value="<?php echo $var1; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-2">
                    <label for="field-1" class="control-label">Orden</label>
                    <div class="form-group">
                        <input class="form-control input-sm" type="number" id="Iorden"  value="<?php echo $orden; ?>"   min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="field-1" class="control-label">Descripción</label>
                    <div class="form-group">
                        <textarea class="form-control" id="Idescripcion" rows="4"><?php echo $titulo; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_informacionA" ><i class="fa fa-check"></i> Editar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    