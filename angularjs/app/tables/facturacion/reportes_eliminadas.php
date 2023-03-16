<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"84");
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
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Ventas Eliminadas</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="row text-center" style="padding-bottom: 40px;">
                        <div class="col-lg-3 col-md-4 col-xs-6 text-center">
                            <label for="field-1" class="control-label">Fecha Inicial</label>
                            <input type="date" name="fechaI" class="form-control " id="fechaI" style="padding: 0px 10px; width:150px;" value ="<?php echo date("Y-m-d", strtotime(date('Y-m-d')."- 10 week")); ?>" placeholder="07/08/1995"  required>
                        </div>
                        <div class="col-lg-3 col-md-4  col-xs-6 text-center">
                            <label for="field-1" class="control-label">Fecha Final</label>
                            <input type="date" name="fechaF" class="form-control" id="fechaF" style="padding: 0px 10px; width:150px;" value ="<?php echo date("Y-m-d", strtotime("+1 day")); ?>" placeholder="07/08/1995"  required>
                        </div>
                        <div class="col-md-2  col-xs-12 ">
                            <button type="button" class="btn btn-primary btn-embossed bnt-square buscarRP" style="padding: 0px 10px;" > Buscar</button>
                        </div> 
                    </div>
                    <table class="table filter-footer reportesE_data table-dynamic table-reportesE "  
                    data-table-fechaf="<?php echo date("Y-m-d", strtotime("+1 day")); ?>"  data-table-fechai="<?php echo date("Y-m-d", strtotime(date('Y-m-d')."- 10 week")); ?>" data-table-name="Ventas" id="table-ventas" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>id_compra</th>
                                <th>id_nota</th>
                                <th>Factura</th>
                                <th>Nota Crèdito</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>id transa</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Sub total</th>
                                <th>Donación</th>
                                <th>Dolares canjeados</th>
                                <th>Descuento</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id_compra</th>
                                <th>id_nota</th>
                                <th>Factura</th>
                                <th>Nota Crèdito</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>id transa</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Sub total</th>
                                <th>Donación</th>
                                <th>Dolares canjeados</th>
                                <th>Descuento</th>
                                <th>Total</th>
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
<?php
$transport->close();
?>