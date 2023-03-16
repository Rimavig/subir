<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$idSala=$_POST["id_sala"];
$tipo=$_POST["tipo"];
$distribucion=  explode(';;',"".$client->getAllSalaMapa($idSala));

?>
<div class="row">  
    <div class="col-md-6">
        <div class="form-group">
            
            <input type="text" name="idSala" id="idSala" class="esconder"  value="<?php echo $idSala; ?>" disabled> 
            <?php
                if($tipo=="gratuito" | $tipo=="informativo" ){
                    ?>
                <select class="form-control esconder" id="distribucion"  style="width:100%;">
            <?php        
                    foreach($distribucion as $llave => $valores) {
                        $distribucion  =explode(',,,',$valores);
                        if (isset($distribucion[1])) {
                            if ($distribucion[6]==="A" ) {
                    ?>
                    <option value="<?php echo $distribucion[0]; ?>"><?php echo $distribucion[4];; ?></option>
                    <?php
                            }
                        }
                    }
                }else{
                ?>
                <label for="field-1" class="control-label">Distribución</label>
                <select class="form-control" id="distribucion"  style="width:100%;">
                    <option value="none">Seleccione Distribución</option>
                <?php 
                    foreach($distribucion as $llave => $valores) {
                        $distribucion  =explode(',,,',$valores);
                        if (isset($distribucion[1])) {
                            if ($distribucion[6]==="A" && trim($distribucion[2]) !="1" ) {
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
    </div>
    <div class="col-md-6">
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
<?php
$transport->close();
?>