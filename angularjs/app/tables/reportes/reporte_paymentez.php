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
                    <div class="row text-center" style="padding-bottom: 40px;">
                        <div class="col-lg-3 col-md-4 col-xs-6 text-center">
                            <label for="field-1" class="control-label">Fecha Inicial</label>
                            <input type="date" name="fechaI" class="form-control " id="fechaI" style="padding: 0px 10px; width:150px;" value ="<?php echo date("Y-m-d", strtotime(date('Y-m-d')."- 1 month")); ?>" placeholder="07/08/1995"  required>
                        </div>
                        <div class="col-lg-3 col-md-4  col-xs-6 text-center">
                            <label for="field-1" class="control-label">Fecha Final</label>
                            <input type="date" name="fechaF" class="form-control" id="fechaF" style="padding: 0px 10px; width:150px;" value ="<?php echo date('Y-m-d'); ?>" placeholder="07/08/1995"  required>
                        </div>
                        <div class="col-md-2  col-xs-12 ">
                            <button type="button" class="btn btn-primary btn-embossed bnt-square buscarRP" style="padding: 0px 10px;" > Buscar</button>
                        </div> 
                    </div>
                    <table class="table filter-footer  paymentez_data <?php echo $exportar; ?> table-dynamic table-paymentez " 
                    data-table-fechaf="<?php echo date('Y-m-d'); ?>"  data-table-fechai="<?php echo date("Y-m-d", strtotime(date('Y-m-d')."- 1 month")); ?>" data-table-name="Paymentez" id="table-editable" style="table-layout: fixed;">
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
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>