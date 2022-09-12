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
            <h3><i class="fa fa-table"></i> Reporte de <strong>Tickets Asientos Vendidos</strong> </h3>
        </div>
        <div class="panel-content pagination2 table-responsive">
            <input type="text" name="FCid" id="FCid" class="esconder"  value="<?php echo $var1; ?>" disabled>
            <table class="table <?php echo $exportar; ?>" data-table-name="Tickets Asientos" id="table-editable4" >
                <thead>
                    <tr>
                        <th>idTicket_asiento</th>
                        <th>Platea</th>
                        <th>Precio</th>
                        <th>Asiento</th>
                        <th>Cantidad Ingresa</th>
                        <th>Fecha Ingreso</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                
            </table>
            <div class="modal-footer text-center">
                <button type="reset" class="atrasRCompra btn btn-embossed btn-default <?php echo  $var3; ?>" >Atras</button>
                <button type="reset" class="salirRCompra btn btn-embossed btn-danger">Salir</button>
            </div> 
        </div>
    </div>
</div>