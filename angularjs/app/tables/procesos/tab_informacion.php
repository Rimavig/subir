<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$re = $client->getInformacion();
$informacion= "".$re;
?>

<div class="panel-header panel-controls">
    <textarea class="form-control" id="informacionT" rows="18"><?php echo $informacion; ?></textarea>
</div>
<div class="modal-footer text-center">
    <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_informacion" ><i class="fa fa-check"></i> Guardar</button>
</div>