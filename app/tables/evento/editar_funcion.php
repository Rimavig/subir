
<?php
include ("../../conect.php");
include ("../../autenticacion.php");

$tipo="Venta";
$FCnombreT="la función";
$tipo2="venta";

if ($_POST["tipo"]==="venta") {
    $tipo="Venta";
    $FCnombreT="la función";
    $tipo2="venta";
    if (isset($_POST["id_funcion"])) {
        $var1 = $_POST['id_funcion'];
        $re = $client->getFuncion($var1);
        $resultado = "".$re;
        $historial= explode(';;',$resultado);
    }
}

foreach($historial as $llave => $valores) {
    $datos =explode(',,,',$valores);
    if (isset($datos[1])) {
        $idfuncion=$datos[0];
        $timestamp = strtotime($datos[1]); 
        $fecha = date("d/m/Y H:i", $timestamp );
        
        $aforo=$datos[2]; 
        $cantidad_vendida=$datos[3];
        $idEvento=$datos[5];
    }
}  
?>

<div class="modal-dialog modal-lg modal-mantenimiento">
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
            <h4 class="modal-title">Editar Función</strong> </h4>
            <input type="text" name="FCnombreT" id="FCnombreT" class="esconder"  value="<?php echo $FCnombreT; ?>" disabled>  
            <input type="text" name="tipo" id="tipo" class="esconder"  value="<?php echo $tipo2; ?>" disabled> 
            <input type="text" id="id_funcion" class="esconder"  value="<?php echo $idfuncion; ?>" disabled>  
            <input type="text" id="id_evento" class="esconder"  value="<?php echo $idEvento; ?>" disabled>  
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="field-1" class="control-label">Fecha de Función</label>
                        <input type="text" name="datetimepicker"  id="fechaFuncion" class="form-control input-sm datepicker" value="<?php echo $fecha; ?>" placeholder="Choose a date..." required>
                    </div>
                </div>
            </div>
            
            
            <div class="modal-footer text-center">
                <button type="submit" class="btn btn-primary btn-embossed bnt-square editar_funcion" ><i class="fa fa-check"></i> Guardar</button>
                <button type="button" class="btn btn-embossed btn-default " data-dismiss="modal" aria-hidden="true">Cancelar</button>
            </div>
        </div>
        
    </div>
</div>
<?php
$transport->close();
?>    