<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$var1="";
$correo="";
$editar="";
if (isset($_POST["idCompra"])) {
    $var1 = $_POST['idCompra'];
    $re = $client->getGeneral("factura",$var1);
    $resultado = "".$re;
    $historial= explode(';;',$resultado);
    $correo=$historial[0];
}
?>
<div class="modal-dialog modal-mantenimiento">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar <strong>Facturación</strong> </h4>
        </div>
        <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo Fáctura</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="correo"  id="correoF"  class="form-control"  value="<?php echo $correo; ?>"  placeholder="tsa@hotmail.com"" minlength="5"  required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square editar_facturacion2"  ><i class="fa fa-check"></i> Editar</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>