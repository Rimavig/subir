<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$var1="";
$editar="";
$re = $client->getAllGeneral("correos","","");
$resultado = "".$re;
$historial= explode(';;',$resultado);
$var1 = $_POST['var1'];
$re = $client->getGeneral("destinatarios", $var1);
$resultado = "".$re;
$historial1= explode(';;',$resultado);
$datos2 =explode(',,,',$historial1[0]);
$correo=$datos2[1];
$idPlantilla=$datos2[2];

?>
<div class="modal-dialog modal-mantenimiento">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong>Destinatario</strong> </h4>
        </div>
        <div class="modal-body">
                <div class="row">
                    <input type="text" name="idDestino" id="idDestino" class="esconder"  value="<?php echo $var1; ?>" disabled>   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Tipo Correo</label>
                            <select name ="tipo" class="form-control" style="width:100%;" id="tipo">
                                <?php
                                foreach($historial as $llave => $valores1) {
                                    $datos1 =explode(',,,',$valores1);
                                    if (isset($datos1[1])) {
                                        if ($idPlantilla==$datos1[0]) {
                                        ?>
                                        <option value="<?php echo $datos1[0]; ?>" selected><?php echo $datos1[1]; ?></option>
                                        <?php
                                        }else{
                                        ?>
                                        <option value="<?php echo $datos1[0]; ?>"><?php echo $datos1[1]; ?></option>
                                        <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo</label>
                            <div class="form-group prepend-icon">
                                <input type="email" name="correo"  id="correo" value="<?php echo $correo; ?>"  class="form-control" placeholder="tsa@hotmail.com"" minlength="5"  required>
                                <i class="icon-map"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square editar_destinatario"  ><i class="fa fa-check"></i> Editar</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>