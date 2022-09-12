<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"41");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
$var1="";
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="6"){
        $exportar="";
    }
}
?>
<div class="col-lg-12 portlets">
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> Tabla de <strong>Movimiento de Caja</strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
            <table class="table filter-footer cajaTMV_data <?php echo $exportar; ?>  table-dynamic table-cajaMV " data-table-name="Movimiento de Caja" data-table-id="<?php echo $var1; ?>" id="table-movimiento" style="table-layout: fixed;">
                <thead>
                    <tr>
                        <th>id_caja_movimiento</th>
                        <th>id_compra</th>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Sub total</th>
                        <th>Donacion</th>
                        <th>Dolares canjeados</th>
                        <th>Descuento</th>
                        <th>Total</th>
                        <th>Total Efectivo</th>
                        <th>Total Tarjeta</th>
                        <th class="text-right">Editar</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id_caja_movimiento</th>
                        <th>id_compra</th>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Sub_total</th>
                        <th>Donacion</th>
                        <th>Dolares_canjeados</th>
                        <th>Descuento</th>
                        <th>Total</th>
                        <th>Total Efectivo</th>
                        <th>Total Tarjeta C</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer text-center">
    <button type="reset" class="salirRCompra btn btn-embossed btn-danger">Salir</button>
</div>    