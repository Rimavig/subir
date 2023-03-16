<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$idPlatea = $_POST['platea'];
$idFuncion = $_POST['funcion'];

$re1 = $client->getPlateaFuncion($idPlatea,$idFuncion);
$resultado2= "".$re1;
$plateas =explode(';;',$resultado2);
foreach($plateas as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    if (isset($usuario[2])) {
?>
<div class="col-md-3" id="vendidosG">
    <div class="form-group">
        <label for="field-1" class="control-label">Cantidad B/Vendidos</label>
        <input type="text" name="nombre" id="vendidos" value="<?php echo $usuario[4]; ?>" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
    </div>
</div>
<div class="col-md-3" id="bloqueadosG">
    <div class="form-group">
        <label for="field-1" class="control-label">Cantidad B/Bloqueados</label>
        <input type="text" name="nombre" id="bloqueados" value="<?php echo $usuario[5]; ?>"  class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
    </div>
</div>
<div class="col-md-3" id="cortesiaG">
    <div class="form-group">
        <label for="field-1" class="control-label">Cantidad B/Cortesia</label>
        <input type="text" name="nombre" id="cortesia" value="<?php echo $usuario[6]; ?>"  class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
    </div>
</div>
<div class="col-md-3" id="esperaG">
    <div class="form-group">
        <label for="field-1" class="control-label">Cantidad B/Reserva Compra</label>
        <input type="text" name="nombre" id="cortesia" value="<?php echo $usuario[7]; ?>"  class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" disabled>
    </div>
</div>
<?php
}}
?> 
<?php
$transport->close();
?>