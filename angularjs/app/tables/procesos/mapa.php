<?php
include ("../../conect.php");
include ("../../autenticacion.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $re = $client->getAllFuncion($var1,"G");
    $resultado= "".$re;
    $funciones =explode(';;',$resultado);
}
?>
<div class="col-md-2">
    <div class="form-group">
        <div class="row">  
            <div class="col-md-12">
                <label for="field-1" class="control-label">Mapa</label>
            </div>
        </div>
        <button class="mapa btn btn-sm btn-dark" value="1.png" id="mapa"><i class="fa fa-plus"></i> Ver Sala</button>
    </div>
</div>
<?php
$transport->close();
?>