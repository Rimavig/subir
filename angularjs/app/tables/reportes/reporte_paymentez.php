<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"69");
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
                    <h3><i class="fa fa-table"></i> Reporte <strong>Paymentez</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer  paymentez_data <?php echo $exportar; ?> table-dynamic table-paymentez " data-table-name="Paymentez" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Id Transacción</th>
                                <th>Nombre </th>
                                <th>Correo </th>
                                <th>Tipo Tarjeta</th>
                                <th>Monto</th>
                                <th>Motivo</th>
                                <th>Estado</th>    
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Id Transacción</th>
                                <th>Nombre Usuario</th>
                                <th>Correo Usuario</th>
                                <th>Tipo Tarjeta</th>
                                <th>Monto</th>
                                <th>Motivo</th>
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
        <div class="copyright">
            <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">&copy;</span> 2016 </span>
                <span>THEMES LAB</span>.
                <span>All rights reserved. </span>
            </p>
            <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
            </p>
        </div>
    </div>
</div>