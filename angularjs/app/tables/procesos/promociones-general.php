<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"26");
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
    <div class="row">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de <strong>Promociónes</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <div class="m-b-20 <?php echo $crear; ?>" >
                        <div class="btn-group">
                            <button class="crear btn btn-sm btn-dark" ng-click="crear_general()"  href="javascript:;"><i class="fa fa-plus"></i> Agregar Promoción General</button>
                        </div>
                    </div>
                    <table class="table filter-footer promocionG-data <?php echo $exportar; ?> table-dynamic table-tools4 " data-table-name="Promociones" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>id_promocion</th>
                                <th>Nombre Promoción</th>
                                <th>Localidad</th>
                                <th>Tipo</th>
                                <th>Inicio</th>
                                <th>Término</th>
                                <th>Estado</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>id_promocion</th>
                                <th>Nombre Promoción</th>
                                <th>Localidad</th>
                                <th>Tipo</th>
                                <th>Inicio</th>
                                <th>Término</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade  Cpromocion" data-keyboard="false" data-backdrop="static" id="Cpromocion" aria-hidden="true">
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>