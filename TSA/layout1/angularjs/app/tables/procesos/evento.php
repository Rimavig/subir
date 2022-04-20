<?php
include ("../../conect.php");
include ("../../autenticacion.php");
$re = $client->getAllEvento("P");
$resultado= "".$re;
$usuarios =explode(';',$resultado);

?>
<div>
    <div class="row editarEvento" id="editarEvento" >
        <div class="col-lg-12 portlets">
            <div class="panel">
                <div class="panel-header panel-controls">
                    <h3><i class="fa fa-table"></i> Tabla de Eventos</strong> </h3>
                </div>
                <div class="panel-content pagination2 table-responsive">
                    <table class="table filter-footer table-dynamic table-tools2  " data-table-name="Eventos Venta" id="table-editable" style="table-layout: fixed;">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
                                <th>Sala</th>  
                                <th>Tickets Vendidos</th>
                                <th>Estado</th>    
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($usuarios as $llave => $valores) {
                                $usuario =explode(',,,',$valores);
                                $estado="";
                                $estadoT="OFF";
                                if (isset($usuario[2])) {
                            ?>
                            <tr>
                                <td id="fila0"> <?php if (isset($usuario[0])) {echo $usuario[0]; }  ?> </td>
                                <td> <?php if (isset($usuario[1])) {echo $usuario[1]; }  ?> </td>
                                <td> <?php if (isset($usuario[3])) {echo $usuario[3]; }  ?> </td>
                                <td> <?php if (isset($usuario[4])) {echo $usuario[4]; }  ?> </td>
                                <td> <?php if (isset($usuario[6])) {echo $usuario[6]; }  ?> </td>
                                <td> <?php if (isset($usuario[14])) {echo $usuario[14]; }  ?> </td>
                                <th>
                                    <?php 
                                        if ($usuario[16]==="A" ) {
                                            $estado="checked";
                                            $estadoT="ON";
                                        } 
                                    ?> 
                                    <div class="form-group">
                                        <label class="switch switch-green">
                                            <input type="checkbox" class="switch-input"  id="box" <?php echo $estado; ?> disabled>
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                            <span id="estado" class="esconder"><?php echo $estadoT; ?></span>
                                        </label>
                                    </div>
                                </th>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-dark" ng-click="editar('<?php echo $usuario[0]?>','<?php echo $usuario[1]?>')"   style="margin: 5px;"  href="javascript:;"><i class="icon-note"></i></a>
                                </td>
                            </tr>
                            <?php
                             }
                            }
                            ?> 
                         
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
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
                    <div class="m-b-20">
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
                                Factor de Compra
                            </tab-heading>
                            <div class="compra" id="compra">
                            </div>
                        </tab>
                        <tab>
                            <tab-heading>
                                Factor de Pago
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
    <div class="modal fade  Cpromocion" id="Cpromocion" aria-hidden="true">
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