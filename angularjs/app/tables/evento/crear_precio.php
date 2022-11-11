
<?php
include ("../../conect.php");
include ("../../autenticacion.php");


$var1="";
$editar="";
$tipo="";      
$PnombreT="el precio";
$id_evento = $_POST['id_evento'];

$re = $client->getEvento($id_evento,"venta");
$resultado = "".$re;
$historial= explode(';;',$resultado);

foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $aforo=$datos[13];
    }
}
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Crear Precio</strong> </h4>
            <input type="text" name="PnombreT" id="PnombreT" class="esconder"  value="<?php echo $PnombreT; ?>" disabled>  
            <input type="text" id="id_evento" class="esconder"  value="<?php echo $id_evento; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombre de Platea</label>
                        <input type="text" name="nombreE" id="Pnombre" class="form-control" placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Precio ($)</label>
                        <input class="form-control input-sm" type="number" id="Pprecio"  step="0.05" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Aforo </label>
                        <input class="form-control input-sm" type="number" id="Paforo" step="1" min="0" max="100" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Aforo máximo </label>
                        <input class="form-control input-sm" type="number" id="PaforoM" value="<?php echo $aforo; ?>"  step="1" min="0" max="100" name="duracionE" placeholder="Type a number" disabled required>
                    </div>
                </div>
            </div>
            
            
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square crear_precio" ><i class="fa fa-check"></i> Crear</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    