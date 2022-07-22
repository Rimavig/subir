<?php
include ("../../conect.php");
include ("../../autenticacion.php");
include ("../../directorio.php");
$var1="";
$editar="";
$tipo="";
$promocion = trim($_POST['promocion']);
$tipo = trim($_POST['tipo']);
$re = $client->getAllReservaP($_SESSION["id"],$promocion,$tipo);
$resultado = "".$re;
$usuarios= explode(';;',$resultado);
$numero_plateas = sizeof($usuarios);

?>
<input type="text" id="catidadReserva" class="esconder"  value="<?php echo $numero_plateas; ?>" disabled>
<input type="text" id="promoSeleccionada" class="esconder"  value="<?php echo $promocion; ?>" disabled>
<input type="text" id="tipoPseleccionada" class="esconder"  value="<?php echo $tipo; ?>" disabled>
<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Seleccionar Eventos que desea aplicar la promoción</strong> </h4>
            
        </div>
        <div class="modal-body">
            <div class="row">
                <div  class="col-md-12" style ="margin-bottom: 30px!important;">
                    <div class="input-group">
                        <div class="icheck-list">
                            <?php
                                $va= 0;
                                foreach($usuarios as $llave => $valores) {
                                    $usuario =explode(',,,',$valores);
                                    if (isset($usuario[1])) {
                                        $va= $va+1;
                                        ?>
                                        <label><input type="checkbox"  class="reservaP<?php echo $va; ?>"  id="<?php echo $usuario[0]?>"   data-checkbox="icheckbox_flat-blue"><?php echo $usuario[0].": ".$usuario[1]; ?></label>
                                        <?php
                                    } 
                                } 
                            ?>
                        </div>
                    </div>    
                </div> 
            </div>
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square aplicar_promo" ><i class="fa fa-check"></i> Aplicar Promoción</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php

$transport->close();
?>    