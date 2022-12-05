<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"2");
$resultado = "".$re;
$usuarios= explode(',',$resultado);
$crear="hide";
$exportar="no-descargar";
if($resultado==""){
    ?>
    <a ng-click="reload()">
    <?php
}
foreach($usuarios as $llave => $valores1) {
    if($valores1==="1"){
        $crear="";
    }
    if($valores1==="6"){
        $exportar="";
    }
}
?>
<div>
    <div class="row taquillaG">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Ventas</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer reportesV_data table-dynamic table-reportesV " data-table-name="Ventas" id="table-ventas" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>id_compra</th>
                                <th>Factura</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Sub total</th>
                                <th>Donacion</th>
                                <th>Dolares canjeados</th>
                                <th>Descuento</th>
                                <th>Total</th>
                                <th>Estado Pago</th>
                                <th>Estado Factura</th>
                                <th>Estado Compra</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id_compra</th>
                                <th>Factura</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Sub total</th>
                                <th>Donacion</th>
                                <th>Dolares canjeados</th>
                                <th>Descuento</th>
                                <th>Total</th>
                                <th>Estado Pago</th>
                                <th>Estado Factura</th>
                                <th>Estado Compra</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row taquillaMV hide">
        
    </div>
    <div class="row infoCompraMV hide">
        
    </div>
    <div class="modal fade Cusuarios"  data-keyboard="false" data-backdrop="static" id="Cusuarios" aria-hidden="true">
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>