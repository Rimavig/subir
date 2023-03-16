<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
    $principal = $_POST['principal'];
    $esconder="";
    if($principal=="true"){
        $esconder="esconder";
        $re1 = $client3->getAllPlatea($var1);
        $resultado2= "".$re1;
        $plateas =explode(';;',$resultado2);
    }else{
        $id_funcion = $_POST['id_funcion'];
        $re1 = $client3->getPlateaFuncion("T", $id_funcion);
        $resultado2= "".$re1;
        $plateas =explode(';;',$resultado2);
    }
    
}
?>

<?php
$va= 0;
$numero_plateas = sizeof($plateas)+3;
if($numero_plateas<= 4){
    $cant=3;
}else if($numero_plateas<= 6){
    $cant=2;
}else{
    $cant=2;
}
foreach($plateas as $llave => $valores) {
    $usuario =explode(',,,',$valores);
    if (isset($usuario[3])) {
        $total= $usuario[3];
        $id= $usuario[0];
        $nombre= $usuario[1];
        $costo= $usuario[2];

        $va= $va+1;
        if($principal!="true"){
            $text=$nombre." ($".$costo.")"." -".$total;
            ?>
            <div class="col-md-1 mensaje2">
                <div class="form-group">
                    <label for="field-1" class="control-label"><?php echo $text; ?> </label>
                    <input class="form-control input-sm plateaA<?php echo $va; ?>" type="number" id="<?php echo  $id; ?>" name="duracionE" placeholder="" >
                </div>
            </div>
            <?php 
        }else{
            $text=$nombre." ($".$costo.")";
            ?>
            <div class="col-md-3 mensaje2">
                <div class="form-group" >
                    <label for="field-1" class="control-label"><?php echo $text; ?> </label>
                    <input class="select-tags form-control plateaA<?php echo $va; ?>" id="<?php echo  $id; ?> "  >
                </div>
            </div>
            <?php 
        }
    }
}
?>
<input type="text" id="catidadPlateas" class="esconder"  value="<?php echo $va; ?>" disabled>
<div class="col-md-1">
    <div class="form-group">
        <label for="field-1" class="control-label"></label>
        <a type="submit" class="reserva btn btn-primary btn-embossed bnt-square"  ><i class="fa fa-plus"></i> Agregar Evento</a>
    </div>
</div>   
<?php
$transport3->close();
?>