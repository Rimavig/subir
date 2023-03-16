<?php
include ("../../conect_taquilla.php");
include ("../../autenticacion.php");
$re = $client3->getPerfilRol($_SESSION["id"],"72");
$resultado = "".$re;
$usuarios= explode(',',$resultado);

$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {

    if($valores1==="6"){
        $exportar="";
    }
}
?>
<div>
    <div class="row editarEvento">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Reporte Error <strong>Pagos</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer  error_pago_data <?php echo $exportar; ?> table-dynamic table-paymentez2 " data-table-name="Paymentez" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Id Transacción</th>
                                <th>Nombre </th>
                                <th>Correo </th>
                                <th>Tipo Tarjeta</th>
                                <th>Monto</th>
                                <th>Estado</th>    
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Id Transacción</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Tipo Tarjeta</th>
                                <th>Monto</th>
                                <th>Estado</th>  
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>
<?php
$transport3->close();
?>