<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");

$var1="";
$correo="";
$editar="";
if (isset($_POST["idCompra"])) {
    $var1 = $_POST['idCompra'];
}
?>
<div class="modal-dialog modal-mantenimiento">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Motivo <strong>Nota Crédito</strong> </h4>
            <input type="text" name="idCompra" id="idCompra" class="esconder"  value="<?php echo $var1; ?>" disabled>
        </div>
        <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Motivo</label>
                            <div class="form-group">
                                <input type="text" name="motivo"  id="motivo"  class="form-control"  value=""  placeholder="" minlength="5"  required>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square notaCredito"  ><i class="fa fa-check"></i> Crear</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>