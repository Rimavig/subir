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
<div class="col-md-2">
    <div class="form-group">
        <label for="field-1" class="control-label">Funciones</label>
        <select class="form-control funciones" style="width:100%;">
            <option value="none">Seleccione Función</option>
            <?php
            foreach($funciones as $llave => $valores) {
                $usuario =explode(',,,',$valores);
                if (isset($usuario[2])) {
            ?>
            <option value="<?php echo $usuario[0]; ?>"><?php echo $usuario[2].": ".$usuario[1]; ?></option>
            <?php
            }
            }
            ?> 
        </select>
    </div>
</div>
<div class="col-md-2 <?php echo $esconder; ?>" >
    <div class="form-group">
        <label for="field-1" class="control-label">Plateas</label>
        <select class="form-control plateas" style="width:100%;">
            <?php
                if($principal!="true"){
                    ?>
                    <option value="none">Seleccione Platea</option>
                    <?php 
                }
            ?>
          
            <?php
            foreach($plateas as $llave => $valores) {
                $usuario =explode(',,,',$valores);
                if (isset($usuario[2])) {
                    $total= $usuario[3];
            ?>
            <option value="<?php echo $usuario[0]; ?>"><?php echo  $total.": ".$usuario[1]; ?></option>
            <?php
            }
            }
            ?> 
        </select>
    </div>
</div>