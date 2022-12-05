<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"67");
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
    <div class="row editarEvento" id="editarEvento" >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Reporte de <strong>Ventas de Eventos</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer venta_dataR <?php echo $exportar; ?> table-dynamic table-tools2R  " data-table-name="Eventos Venta" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id_evento</th>
                                <th class="text-center">Nombres</th>
                                <th class="text-center">Sala</th>
                                <th class="text-center">Total Vendido</th>
                                <th class="text-center">Total Descuento</th>  
                                <th class="text-center">Total Puntos Canjeados</th>
                                <th class="text-center">Estado</th>    
                                <th class="text-center">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Sala</th>
                                <th>Total Vendido</th>
                                <th>Total Descuento</th>  
                                <th>Total Puntos Canjeados</th>
                                <th>Estado</th>     
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    <div class="funcionesR" id="funcionesR" >
    </div>
    <div class="ticketsR" id="ticketsR" >
    </div>
    <div class="row taquillaMV hide">
        
    </div>
    <div class="row infoCompraMV hide">
        
    </div>
    <div class="modal fade  Cevento" id="Cevento"  data-keyboard="false" data-backdrop="static" aria-hidden="true">
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>