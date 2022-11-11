
<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$tipo="Venta";
$PnombreT="el precio";
$tipo2="venta";
$esconder="";
$aforoM="";

if ($_POST["tipo"]==="venta") {
    $tipo="Venta";
    $PnombreT="el precio";
    $tipo2="venta";
    $id_evento = $_POST['id_evento'];
    $re = $client->getEvento($id_evento,"venta");
    $resultado = "".$re;
    $historial= explode(';;',$resultado);

    foreach($historial as $llave => $valores) {
        $datos =explode(',,,',$valores);
        if (isset($datos[1])) {
            $aforoM=$datos[13];
        }
    }
    if (isset($_POST["id_precio"])) {
        $var1 = $_POST['id_precio'];
        $re = $client->getPlatea($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
    if (isset($_POST["principal"])) {
        if ($_POST["principal"]=="true"){
            $valor="";
            $esconder="disabled";
        }

    }
}

foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $idprecio=$datos[0];
        $nombre=$datos[1];
        $costo=$datos[2];
        $aforo=$datos[3]; 
        $cantidad_vendida=$datos[4];
        $idEvento=$datos[5];
    }
}  
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar Función</strong> </h4>
            <input type="text" name="FCnombreT" id="PnombreT" class="esconder"  value="<?php echo $PnombreT; ?>" disabled>  
            <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled> 
            <input type="text" id="id_precio" class="esconder"  value="<?php echo $idprecio; ?>" disabled>  
            <input type="text" id="id_evento" class="esconder"  value="<?php echo $idEvento; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Nombre de Platea</label>
                        <input type="text" name="nombreE" id="Pnombre" class="form-control"  value="<?php echo $nombre; ?>"  placeholder="Teatro Sanchez Aguilar" minlength="5" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Precio ($)</label>
                        <input class="form-control input-sm" type="number" id="Pprecio"   value="<?php echo $costo; ?>" step="0.05" name="duracionE" placeholder="Type a number" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Aforo </label>
                        <input class="form-control input-sm" type="number" id="EPaforo"  value="<?php echo $aforo; ?>" step="1" min="0" max="100" name="duracionE" placeholder="Type a number"  <?php echo $esconder; ?> required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-3" class="control-label">Aforo máximo </label>
                        <input class="form-control input-sm" type="number" id="EPaforoM" value="<?php echo $aforoM; ?>"  step="1" min="0" max="100" name="duracionE" placeholder="Type a number" disabled required>
                    </div>
                </div>
            </div>
            
            
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_precio" ><i class="fa fa-check"></i> Guardar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    