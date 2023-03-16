<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");

$var1="";
$correo="";
$editar="";
if (isset($_POST["idCompra"])) {
    $var1 = $_POST['idCompra'];
}
$re = $client3->getGeneral("ticketCompra",$var1);
$resultado = "".$re;
$datos1 =explode(';;',$resultado);
$numero_tickets = sizeof($datos1);
?>
<div class="modal-dialog modal-mantenimiento">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Motivo <strong>Nota Crédito</strong> </h4>
            <input type="text" name="idCompra" id="idCompra" class="esconder"  value="<?php echo $var1; ?>" disabled>
            <input type="text" id="catidadTickets" class="esconder"  value="<?php echo $numero_tickets; ?>" disabled>
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
                    <div  class="col-md-12" style ="margin-bottom: 30px!important;">
                        <div class="input-group">
                            <div class="icheck-list">
                                <?php
                                    $va= 0;
                                    foreach($datos1 as $llave => $valores) {
                                        $usuario =explode(',,,',$valores);
                                        if (isset($usuario[1])) {
                                            $va= $va+1;
                                            ?>
                                            <label><input type="checkbox"  class="reservaP<?php echo $va; ?>"  id="<?php echo $usuario[0]?>"   data-checkbox="icheckbox_flat-blue">idTicket: <?php echo $usuario[0]." - Valor: ".$usuario[1]." - Descuento: ".$usuario[2]; ?></label>
                                            <?php
                                        } 
                                    } 
                                ?>
                            </div>
                        </div>    
                    </div> 
                </div>
                
                <div class="modal-footer text-center">
                    <button class="btn btn-primary btn-embossed bnt-square notaCreditoParcial"  ><i class="fa fa-check"></i> Crear</button>
                    <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                </div>
        </div>
        
    </div>
</div>
<?php
$transport3->close();
?>