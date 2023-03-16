<?php
include ("../../conect.php");
include ("../../autenticacion.php");
if (isset($_POST["var1"])) {
    $var1 = $_POST['var1'];
}
$re = $client->getPerfilRol($_SESSION["id"],"67");
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
    if($valores1==="6"){
        $exportar="";
    }
}
?>
<div class="col-lg-12 portlets">
    <div class="panel">
        <div class="panel-header panel-controls">
            <h3><i class="fa fa-table"></i> Reporte de <strong>Ventas de <?php echo $var1; ?></strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
            <input type="text" name="FCid" id="FCid" class="esconder"  value="<?php echo $var1; ?>" disabled>
            <div class="row text-center" style="padding-bottom: 40px;">
                <div class="col-lg-3 col-md-4 col-xs-6 text-center">
                    <label for="field-1" class="control-label">Fecha Inicial</label>
                    <input type="date" name="fechaI" class="form-control " id="fechaI" style="padding: 0px 10px; width:150px;" value ="<?php echo date("Y-m-d", strtotime(date('Y-m-d')."- 1 month")); ?>" placeholder="07/08/1995"  required>
                </div>
                <div class="col-lg-3 col-md-4  col-xs-6 text-center">
                    <label for="field-1" class="control-label">Fecha Final</label>
                    <input type="date" name="fechaF" class="form-control" id="fechaF" style="padding: 0px 10px; width:150px;" value ="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" placeholder="07/08/1995"  required>
                </div>
                <div class="col-md-2  col-xs-12 ">
                    <button type="button" class="btn btn-primary btn-embossed bnt-square buscarRP2" style="padding: 0px 10px;" > Buscar</button>
                </div> 
            </div>
            <table class="table <?php echo $exportar; ?>" data-table-name="Reporte de Ventas Sala" data-table-fechaf="<?php echo date("Y-m-d", strtotime("+1 day")); ?>"  data-table-fechai="<?php echo date("Y-m-d", strtotime(date('Y-m-d')."- 1 month")); ?>" id="table-editable2" >
                <thead>
                    <tr>
                        <th>idTicket</th>
                        <th>idCompra</th>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Local</th>
                        <th>Nombre Cliente</th>
                        <th>Identificación Cliente</th>
                        <th>Correo Cliente</th>
                        <th>Id Transacción</th>
                        <th>Evento</th>
                        <th>Funciòn</th>
                        <th>Asientos</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                        <th>Puntos canjeados</th>
                        <th class="text-right">Editar</th>
                    </tr>
                </thead>
                
            </table>
            <div class="modal-footer text-center">
                <button type="reset" class="salirRCompra btn btn-embossed btn-danger">Salir</button>
            </div> 
        </div>
    </div>
</div>
<?php
$transport->close();
?>