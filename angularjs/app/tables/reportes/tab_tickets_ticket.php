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
            <h3><i class="fa fa-table"></i> Reporte de <strong>Asientos Vendidos</strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
            <input type="text" name="FCid" id="FCid" class="esconder"  value="<?php echo $var1; ?>" disabled>
            <table class="table <?php echo $exportar; ?>" data-table-name="Funciones" id="table-editable2" >
                <thead>
                    <tr>
                        <th>idTicket</th>
                        <th>idCompra</th>
                        <th>Factura</th>
                        <th>Local</th>
                        <th>Nombre Cliente</th>
                        <th>Identificación Cliente</th>
                        <th>Correo Cliente</th>
                        <th>Platea</th>
                        <th>Cantidad Tickets</th>
                        <th>Cantidad Ingreso</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th class="text-right">Editar</th>
                    </tr>
                </thead>
                
            </table>
            <div class="modal-footer text-center">
                <button type="reset" class="btn btn-embossed btn-default cancelarTicket" >Atras</button>
                <button type="reset" class="salirRCompra btn btn-embossed btn-danger">Salir</button>
            </div> 
        </div>
    </div>
</div>
<?php
$transport->close();
?>