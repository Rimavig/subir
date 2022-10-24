<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$var1="";
$editar="";
$var1 = $_POST['var1'];
$re = $client->getGeneral("gratuito_correo", $var1);
$resultado = "".$re;
$historial1= explode(';;',$resultado);
$datos2 =explode(',,,',$historial1[0]);
$correo=$datos2[3];

?>
<div class="modal-dialog modal-mantenimiento">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar <strong>Correo</strong> </h4>
        </div>
        <div class="modal-body">
                <div class="row">
                    <input type="text" name="idCorreo" id="idCorreo" class="esconder"  value="<?php echo $var1; ?>" disabled>     
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="correo"  id="correo" value="<?php echo $correo; ?>"  class="form-control" placeholder="tsa@hotmail.com" minlength="5"  required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square editar_correoR"  ><i class="fa fa-check"></i> Editar</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>