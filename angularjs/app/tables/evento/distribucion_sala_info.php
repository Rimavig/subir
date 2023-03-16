<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$idSala=$_POST["id_sala"];
$idMapa=$_POST["idMapa"];
$distribucion=  explode(';;',"".$client->getAllSalaMapa($idSala));

?>
<div class="form-group">
    <label for="field-1" class="control-label">Distribución</label>
    <select class="form-control" id="Edistribucion" style="width:100%;">
    <?php
        foreach($distribucion as $llave => $valores) {
            $distribucion  =explode(',,,',$valores);
            if (isset($distribucion[1])) {
                if ($distribucion[6]==="A" ) {
                    if ($distribucion[2]==$id_Mapa) {?>
                        <option value="<?php echo $distribucion[0]; ?>" selected><?php echo $distribucion[4];; ?></option>
                    <?php
                    }else {
                        ?>
                        <option value="<?php echo $distribucion[0]; ?>"><?php echo $distribucion[4];; ?></option>
                        <?php
                    }    
                }
            }
        }
    ?> 
    </select>
</div>  
<?php
$transport->close();
?>