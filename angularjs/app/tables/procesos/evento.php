<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getPerfilRol($_SESSION["id"],"25");
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
    <div class="row editarEvento" id="editarEvento" >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de Eventos</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer promo_data <?php echo $exportar; ?> table-dynamic table-tools2  " data-table-name="Eventos Venta" id="table-editable" style="table-layout: fixed;">
                    <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Categoria</th>
                                <th>Aforo Disponible</th>
                                <th>Sala</th>  
                                <th>Tickets Vendidos</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Categoria</th>
                                <th>Aforo Disponible</th>
                                <th>Sala</th>  
                                <th>Tickets Vendidos</th>
                                <th>Estado</th>     
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    <div class="row hide tabEventos" id="tabEventos" >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de Promociones del Evento ({{message2}})</strong> </h3>
                </div>
                <div class="panel-content pagination2 ">
                    <div class="m-b-20 <?php echo $crear; ?>">
                        <div class="btn-group">
                            <input type="text" ng-model="message" name="idPromo" id="idEvento" value="{{message}}" class="esconder"  disabled>
                            <input type="text" ng-model="message2" name="idPromo2" id="nombreEvento"  value="{{message2}}" class="esconder"  disabled>
                            <button class="crearPromocion  btn btn-sm btn-dark"  ng-click="crear()"  href="javascript:;"><i class="fa fa-plus"></i> Agregar Promoción</button>
                        </div>
                    </div>
                    <tabset class="tab-fade-in" >
                        <tab>
                            <tab-heading>
                                Código Promocional
                            </tab-heading>
                            <div class="codigo" id="codigo">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Factor de Compra/Pago
                            </tab-heading>
                            <div class="compra" id="compra">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Boletos
                            </tab-heading>
                            <div class="pago" id="pago">
                               
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Forma de Pago
                            </tab-heading>
                            <div class="tarjeta" id="tarjeta">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Eventos Cruzados
                            </tab-heading>
                            <div class="cruzados" id="cruzados">
                            </div>
                        </tab>
                    </tabset>
                    <div class="modal-footer text-center">
                        <button type="button"  class="btn btn-embossed btn-default cancelar " data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    </div> 
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
<?php
$transport->close();
?>