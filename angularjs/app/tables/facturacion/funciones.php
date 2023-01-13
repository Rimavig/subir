<?php
include ("../../conect.php");
include ("../../autenticacion.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $principal = $_POST['principal'];
    $esconder="";
    if($principal=="true"){
        $esconder="esconder";
    }
    $re = $client->getAllFuncion($var1,"G");
    $resultado= "".$re;
    $funciones =explode(';;',$resultado);

    $re1 = $client->getAllPlatea($var1);
    $resultado2= "".$re1;
    $plateas =explode(';;',$resultado2);
}
?>
<div class="col-md-4">
    <div class="form-group">
        <label for="field-1" class="control-label">Funciones</label>
        <select class="form-control funciones" style="width:100%;">
            <option value="none">Seleccione Función</option>
            <?php
            foreach($funciones as $llave => $valores) {
                $usuario =explode(',,,',$valores);
                if (isset($usuario[2])) {
            ?>
            <option value="<?php echo $usuario[0]; ?>"><?php echo $usuario[1]; ?></option>
            <?php
            }
            }
            ?> 
        </select>
    </div>
</div>
<div class="esconder" id="mapa"> 
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
</div>
<div class="hide plateasG" > 
</div>

