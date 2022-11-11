<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"24");
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
    <div class="row Gcortesia">
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de Cortesias</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer cortesia_data <?php echo $exportar; ?>  table-dynamic  cortesia " data-table-name="Tabla de Cortesias" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id ticket</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Cantidad Ticket </th>
                                <th>Evento</th>
                                <th>Platea</th>
                                <th>Fecha Función</th>
                                <th>Estado</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id ticket</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Cantidad Ticket</th>
                                <th>Evento</th>
                                <th>Platea</th>
                                <th>Fecha Función</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="alerta" id="alerta" >
    </div>
    <div class="Ecortesia" id="Ecortesia" >
    </div>
    <div class="footer">
        <p class="copyright">
                <span>Copyright © 2022 </span><span> Teatro Sanchez Aguilar </span><span>- Powered by Vion IoT Solutions. All rights reserved.</span>
            </p>
    </div>
</div>