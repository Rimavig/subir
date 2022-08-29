
<?php
include ("../../conect.php");
include ("../../autenticacion.php");


$var1="";
$editar="";
$tipo="";
if ($_POST["tipo"]==="categoria") {
    $tipo="Categoria";
    $tipo2="categoria";
    $nombreT="la categoría";
}else if ($_POST["tipo"]==="clasificacion") {
    $tipo="Clasificación";
    $tipo2="clasificacion";
    $nombreT="la clasificación";
}else if ($_POST["tipo"]==="espectaculo") {
    $tipo="Espectáculo";
    $tipo2="espectaculo";
    $nombreT="el espectáculo";
}else if ($_POST["tipo"]==="procedencia") {
    $tipo="Procedencia";
    $tipo2="procedencia"; 
    $nombreT="la procedencia";
} else if ($_POST["tipo"]==="evento") {
    $tipo="Tipo de Evento";
    $tipo2="evento";
    $nombreT="el tipo de evento";
} else if ($_POST["tipo"]==="sala") {
    $tipo="Sala";
    $tipo2="sala"; 
    $nombreT="la sala";
} else if ($_POST["tipo"]==="productora") {
    $tipo="Productora";
    $tipo2="productora"; 
    $nombreT="la productora";
} else if ($_POST["tipo"]==="promocion") {
    $tipo="Promoción";
    $tipo2="promocion"; 
    $nombreT="la promoción";
}          
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear <strong> <?php echo $tipo2; ?></strong> </h4>
            <input type="text" name="nombreT" id="nombreT" class="esconder"  value="<?php echo $nombreT; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombre De <?php echo $tipo; ?></label>
                        <div class="form-group prepend-icon">
                            <input type="text" name="name" id="nombres" class="form-control" placeholder="Cine" minlength="3" required>
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <?php
                if ($_POST["tipo"]==="categoria") {
                    
                ?>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Orden</label>
                        <div class="form-group prepend-icon">
                            <input class="form-control input-sm" type="number" id="orden"  min="1" pattern="^[0-9]+" name="duracionE" placeholder="Type a number" required>
                        </div>
                    </div>
                </div>
                <?php
               } 
                ?>
            </div>
            
            
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_categoria" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    